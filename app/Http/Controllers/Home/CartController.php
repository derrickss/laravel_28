<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //判断是否已登录
        if($request->session()->has('id')){
            //已登录情况下查找购物车表获取购物车信息
            //查找user_id
            $user_id = session('id');
            $data = DB::table('gw_cart')->where('user_id','=',$user_id)->get();
            foreach($data as $key=>$val){
                $gid=$val->gid;
                $res=DB::table('goods')->where('id','=',$gid)->get();
                foreach($res as $v){
                    $val->price = $v->price;
                }
            }
            // dd($data);
            return view('Home.Cart.cart',['data'=>$data]);
        }else{
            //此为 未登录情况下 遍历session
            $data = session('cart');
            foreach($data as $key=>$val){
                $gid=$val['gid'];
                $res=DB::table('goods')->where('id','=',$gid)->get();
                foreach($res as $v){
                    $data[$key]['price'] = $v->price;
                }
            }
            var_dump($data);
            return view('Home.Cart.cart',['data'=>$data]);
        }

    }
    //商品数量 减
    public function cartsub(Request $request)
    {
        //判断是否登录了
      if($request->session()->has('id')){
        $id = $request->input('id');
        $num = $request->input('num');
        //num 减一
        $data['num'] = $num -1;
        if($num -1 <1){
            $data['num'] = 1;
            $num = 2;
        }
        //更新购物表数量
        $res = DB::table('gw_cart')->where('id','=',$id)->update($data);
        if($res){
            echo $num-1;
        }
        // echo $num;
    }else{
        //未登录情况下
        $data = session('cart');
        $id = $request->input('id');
        $num = $request->input('num');
        foreach($data as $key=>$val){
            if($id == $val['gid'].$val['style']){
                $s = $val['num']-1;
                $data[$key]['num']=$s;
                //判断
                if($data[$key]['num']<1){
                    $data[$key]['num']=1;
                }
            }
        }
        // 重新给session赋值
        session(['cart'=>$data]);
        echo $s;
    }

    }

    //商品数量 加
    public function cartadd(Request $request)
    {
      //判断是否登录了
      if($request->session()->has('id')){
        $id = $request->input('id');
        $num = $request->input('num');
        //num 减一
        $data['num'] = $num +1;
        //更新购物表数量
        $res = DB::table('gw_cart')->where('id','=',$id)->update($data);
        if($res){
            echo $num+1;
        }
    }else{
        //未登录情况下
        $data = session('cart');
        $id = $request->input('id');
        $num = $request->input('num');
        foreach($data as $key=>$val){
            if($id == $val['gid'].$val['style']){
                $s = $val['num']+1;
                $data[$key]['num']=$s;
                //判断
            }
        }
        // 重新给session赋值
        session(['cart'=>$data]);
        echo $s;
    }

    }
    //删除
    public function cartdel(Request $request)
    {
        //判断是否登录
        if($request->session()->has('id')){
            $id = $request->input('id');
            //删除数据表
            $res = DB::table('gw_cart')->where('id','=',$id)->delete();
            if($res){
                echo 1;
            }
        }else{
            $data = session('cart');
            $id = $request->input('id');
            $num = $request->input('num');
            foreach($data as $key=>$val){
            if($id == $val['gid'].$val['style']){
                unset($data[$key]);
                //判断
            }
        }
        // 重新给session赋值
        session(['cart'=>$data]);
        echo 1;
        }
    }

    //购物车全选删除
    public function delall(Request $request)
    {
        if($request->session()->has('id')){
            //已经登录
            //删除gw_cart表
            $id = $request->input('id');
            foreach($id as $val){
                DB::table('gw_cart')->where('id','=',$val)->delete();
            }
            //
            echo 1;

        }else{
            //未登录
            // 删除session cart
            $id = $request->input('id');
            //获取当前session
            $data = session('cart');

            foreach ($data as $key=>$val){
                foreach($id as $v){
                if($val['gid'].$val['style']==$v){
                    unset($data[$key]);
                }

                }
            }
            //重新写入session
            session(['cart' => $data]);
            echo 1;
            // exit;
        }
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
        //
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
