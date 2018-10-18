<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入DB类
use DB;

class AddCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //公共模板的分类导航栏内容
        //首页导航遍历
        $cate=$this->getCatesBypid(0);
        //首先判断是立即购买还是加入购物车,  立即购买 mai------>1 ,  加入购物车 mai---->2
        $mai = $request->input('mai');
        if($mai==2){
            //加入购物车
            $data = $request->except(['_token','mai']);

            $t = implode(',', $data['style']);
            $data['style']=$t;
            $gid = $data['gid'];
            $style=$data['style'];
            $num = $data['num'];
            // var_dump($data);exit;
            //判断是否登录
            //如果已经登录
            if(session('id')){
                $user_id = session('id');
                //先查询该用户的购物车
                $user_cart=DB::table('gw_cart')->where('user_id','=',$user_id)->get();
                // var_dump($user_cart);
                //判断用户的购物车gid是否和当前加入购物车的gid重复
                foreach($user_cart as $val){
                    //当gid 和style 与添加进购物车的gid和style完全相同,数量+1
                    if(($val->gid==$gid) && ($val->style==$style)){
                        //让购物车数量+1
                        $new['num'] = $val->num +$num;
                        // var_dump($val);
                        //更新数据库
                        DB::table('gw_cart')->where('id','=',"$val->id")->update($new);
                        return view('Home.AddCart.addcart',['data'=>$data,'cate'=>$cate]);
                        exit;
                    }
                }
                 //其余情况则普通入库
                $data['user_id'] = $user_id;
                // var_dump($data);
                DB::table('gw_cart')->insert($data);
                return view('Home.AddCart.addcart',['data'=>$data,'cate'=>$cate]);
            }else{
                //这里为 未登录状态.讲购物车信息存进session
                $gid = $data['gid'];
                $style = $data['style'];
                // var_dump($data);
                //判断session值是否存在
                $res=session('cart');
                if($request->session()->has('cart')){
                    foreach($res as $key=>$value){
                        if($gid==$value['gid'] && $style==$value['style']){
                            $res[$key]['num'] = $value['num']+$num;
                            //重新赋值
                            session(['cart'=>$res]);
                            return view('Home.AddCart.addcart',['data'=>$data,'cate'=>$cate]);
                        }

                    }
                }
                    //不存在则存一个新的session
                    // var_dump($data);
                    $request->session()->push('cart',$data);
                    $res = $request->session()->all();
                    // $request->session()->pull('cart');
                    // var_dump($res);exit;
                    // return redirect('/addcart');
                    return view('Home.AddCart.addcart',['data'=>$data,'cate'=>$cate]);
            }
        }else{
            //立即购买

        }


    }

    //无线遍历寻找子类
    public function getCatesBypid($pid)
    {
        $s=DB::table("goods_cates")->where("pid",'=',$pid)->where('display','=',1)->get();
        if($s){
            $data=array();
            foreach($s as $value){
                $data[] = $value;
                $value->dev=$this->getCatesBypid($value->id);
            }
          }
        return $data;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
}
