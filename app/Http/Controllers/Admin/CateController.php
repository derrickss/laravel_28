<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入DB类
use DB;
//引入模型
use App\Models\Admin\Cates;

class CateController extends Controller
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


    public function index()
    {
        // echo 222;
        return view('Admin.Cates.product-category');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //获取所有分类信息
        $cate=$this->getcates();
        //加载模板
        return view('Admin.Cates.product-category-add',['cate'=>$cate]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取需要添加的数据
        $data=$request->only(['name','pid']);

        //默认分类显示
        $data['display'] = 1;
        //获取pid
        $pid=$request->input('pid');
        //添加顶级分类信息
        if($pid==0){
        //拼接path
        $data['path']='0';
        }else{
        //获取父类信息
        $info=DB::table("goods_cates")->where('id','=',$pid)->first();
        //拼接path
        $data['path']=$info->path.",".$info->id;
        }
        // dd($data);
        //执行数据库的插入
        // $res=DB::table("goods_cates")->insert($data);
        if(DB::table("goods_cates")->insert($data)){
        return redirect("/product-cate/create")->with('success',1);
        }else{
        return back()->with("error",'分类添加失败');
        }
        // var_dump($data);
        // return view('Admin.Cates.product-category-list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('Admin.Cates.product-category-add');


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //分类修改
        // echo $id;
        $cate=DB::table("goods_cates")->where('id','=',$id)->get();
         $res=$this->getcates();
        // dd($res);
        return view('Admin.Cates.product-category-edit',['cate'=>$cate,'res'=>$res]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //无线递归修改子类
    public function getCatesBypid($pid,$path){
        $s=DB::table("goods_cates")->where("pid",'=',$pid)->get();
        // var_dump($s);
        //遍历
        if($s){
            $data=[];
        foreach($s as $key=>$value){
            $value->dev=$this->getCatesBypid($value->id,$path.','.$pid);
            $data[]=$value;
            $value->path=$path.','.$pid;
            DB::table("goods_cates")->where('id','=',$value->id)->update(['path' => $value->path]);
            // var_dump($value);
        }
        return $data;
        }

    }

    public function update(Request $request, $id)
    {
        // dd($id);
        //获取需要添加的数据
        $data=$request->only(['name','pid']);

        //默认分类显示
        $data['display'] = 1;
        //获取pid
        $pid=$request->input('pid');

        //添加顶级分类信息
        if($pid==0){
        //拼接path
        $data['path']='0';

        $path=0;
        //获取id ,查询其子分类,并修改
        $id = $request->input('id');
        // echo $id;
        $res=$this->getCatesBypid($id,$path);

        }else{
        //获取父类信息
        $info=DB::table("goods_cates")->where('id','=',$pid)->first();
        //拼接path
        $data['path']=$info->path.",".$info->id;
        $path=$info->path.",".$info->id;
        //获取id ,查询其子分类,并修改
        $id = $request->input('id');
        // echo $id;
        $res=$this->getCatesBypid($id,$path);
        }
        // dd($data);
        //执行数据库的插入
        if(DB::table("goods_cates")->where('id','=',$id)->update($data)){
        return redirect("/product-cate/$id/edit")->with('success',1);
        }else{
        return back()->with("error",'分类添加失败');
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
        //
    }
     public function list(Request $request)
     {
        //获取搜索的关键词
        $k=$request->input('keywords');
       //连贯方法结合原始表达式 防止sql语句注入
        $cate=Cates::select(DB::raw('*,concat(path,",",id) as paths'))->where('name','like',"%".$k."%")->orderBy('paths')->paginate(3);

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
        return view('Admin.Cates.product-category-list',['cate'=>$cate,'request'=>$request->all()]);
    }

    //状态管理-->禁用
    public function stop($id){
        $data['display'] = 0;
        DB::table('goods_cates')->where('id','=',$id)->update($data);
        // echo 1;
        echo $id;
    }
    //状态管理-->启用
    public function start($id){
        $data['display'] = 1;
        DB::table('goods_cates')->where('id','=',$id)->update($data);
        echo $id;
    }

    //Ajax 删除
    public function del($id){
        // echo $id;
        //获取删除分类的子类个数
        $res=DB::table("goods_cates")->where('pid','=',$id)->count();
        // echo $res;
        //判断
        if($res>0){
        echo 0;
        }else{
         if(DB::table("goods_cates")->where("id",'=',$id)->delete()){
        echo 1;
        }else{
        echo 2;
        }
        }


    }
}
