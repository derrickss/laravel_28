<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入要调用的模型类
// use App\Models\User\Users;
// use App\Http\Requests\AdminGoodsinsert;
use DB;
//引入模型
use App\Models\Admin\Cates;
use Config;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function getcates(){
       //连贯方法结合原始表达式 防止sql语句注入
        $cate=DB::table("goods_cates")->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy('paths')->get();

        //加分割符
        //遍历
        foreach($cate as $key=>$value){
            // echo $value->path."<br>";
            //转换为数组
            $arr=explode(",",$value->path);
            // echo "<pre>";
            // var_dump($arr);
            //获取逗号个数
            $len=count($arr)-1;
            //给当前分类添加分割符
            $cate[$key]->name=str_repeat("--|",$len).$value->name;
        }
        return $cate;
    }

    public function index(Request $request)
    {
        //获取分类
        $cates=DB::table('goods_cates')->get();
        //获取搜索参数
        $key=$request->input("KeyWord");
    	//获取数据 显示分页
    	$page=DB::table('goods')->where("name",'like',"%".$key."%")->orderBy('id', 'desc')->paginate(5);
    	//显示总条数
    	$count=DB::table('goods')->count();
    	// echo $count;exit;
        $data=DB::table('goods')->get();
        // var_dump($result);exit;
        // echo "商品列表";
		return view('Admin.Goods.product-list',['cates'=>$cates,'count'=>$count,'data'=>$data,'page'=>$page,'request'=>$request->all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //添加商品（跳转）
    public function create()
    {
    	//分类
        $cate=$this->getcates();
        //模板id
        $template=DB::table('template')->get();

        return view('Admin.Goods.product-add',['cate'=>$cate,'template'=>$template]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *///添加商品到数据库
    public function store(Request $request)
    {
        //获取分类信息
        $data=$request->all();
        // var_dump($data);exit;
        // var_dump($_POST);exit;
        foreach($data as $key=>$val){
            //为norms的值进来
            if(substr($key,0,5)=='norms'){
                //不为空的传值
                if (!$val=='') {
                    //去掉norms
                    $datainfo[substr($key,5)]=$val;
                }
            }
        }
        //分割字符串为数组，通过下表读取类别id，并插入数据库
        $i=0;
        foreach($datainfo as $k=>$v){
            $norms[]=explode("_",$k);
                $good_id[]=DB::table('norms_data')->insertGetId(['pid'=>$norms[$i][0],'text'=>$v]);
            $i+=1;
        }
    	//检测是否具有文件上传
        if($request->hasFile('g_pic')){
            //初始化文件名字
            $name=time()+rand(1,10000);
            //获取上传文件后缀
            $ext=$request->file("g_pic")->getClientOriginalExtension();
            //2.将上传的文件移动到指定的目录下
            // $data = array();
            $path=$request->file("g_pic")->move("./uploads/".date("Y-m-d")."/",$name.".".$ext);
            // foreach ($path as $key => $value) {
            //   $data[] = $value;
            $a = "/uploads/".date("Y-m-d")."/".$name.".".$ext;
            // dd($a);die;
            // var_dump($path);exit;
            // $path_pic = $path;
            // var_dump($path_pic->pathName);exit;
            // echo ltrim('.',$path_pic);exit;
             $data=$request->except(['_token']);
                // var_dump($data);exit;
             
            //获取商品id 更新到norms_data表中
            $result = DB::table('goods')->insertGetId( ['name' => $data['name'],'c_id'=>$data['c_id'],'price'=>$data['price'],'g_pic'=>$a,'g_desc'=>$data['g_desc'], 'display' => 1,'template'=>$data['template']]);
            // echo $result;
            foreach ($good_id as $key => $value) {
                DB::table('norms_data') ->where('id','=', $value) ->update(['good_id' => $result]);
            }
             if($result){
                // session(['success','1']);
                return redirect('/product-list')->with('success','1');
            }
        }else{
        	return back('/product-list/create')->with('success','0');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //商品详情页  ajax
    public function show($id)
    {
       $data=DB::table("norms")->where("pid","=",$id)->get();
       // var_dump($data);
       return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cate=$this->getcates();

        $data = DB::table('goods')->where('id','=',$id)->first();
        // var_dump($data);exit;
		return view('Admin.Goods.product-edit',['cate'=>$cate,'id'=>$id,'name'=>$data->name,'g_desc'=>$data->g_desc,'price'=>$data->price,'display'=>$data->display]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //获取需要修改的数据
        $info=DB::table("goods")->where("id",'=',$id)->first();
        $data=$request->except(['_token','_method']);
        // echo $id;
        //判断
        if($request->hasFile("g_pic")){
            //新图上传
            //初始化图片名字
            $name=time()+rand(1,10000);
            //获取后缀
            $ext=$request->file("g_pic")->getClientOriginalExtension();
            //移动文件到指定的目录下
            $request->file("g_pic")->move(Config::get('app.app_uploads'),$name.".".$ext);
            //封装$data
            $data['g_pic']=trim(Config::get('app.app_uploads')."/".$name.".".$ext,'.');
            if(DB::table("goods")->where("id",'=',$id)->update($data)){
                //老图删除
                unlink(".".$info->g_pic);
               return redirect("/product-list")->with("success",'1'); 
            }
            
        }else{
            //图片没有修改
           if(DB::table("goods")->where("id",'=',$id)->update($data)){
           		return redirect("/product-list")->with("success",'1'); 
        	}

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	// $input = $request->all();
        echo "string";

        //
        // var_dump($input);
       	// return redirect('/product-list')->with('error','数据添加失败');

    }
    public function plus($id)
    {
    	$res=DB::table("goods")->where('id','=',$id)->delete();
    	if($res){
       	// return redirect('/product-list')->with('error','数据添加失败');
    		echo "1";
    	}else{
    		echo "0";
    	}
        // var_dump($input);
       	// return redirect('/product-list')->with('error','数据添加失败');

    }

        //会员状态管理--->禁用
    public function stop($id){
        // echo $id;
        $data['display'] = 0;
        DB::table('goods')->where('id','=',$id)->update($data);
        echo $id;
    }

    //会员状态管理--->禁用
    public function start($id){
        $data['display'] = 1;
        DB::table('goods')->where('id','=',$id)->update($data);
        echo $id;
    }

    public function ajax($id){
        // echo "1";
        // return redirect('/product-list/create');
        echo $id.'yy';

    }
}
