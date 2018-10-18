<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class GoodListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        //公共模板的分类导航栏内容
        //首页导航遍历
        $cate=DB::table('goods_cates')->where('pid','=','0')->where('display','=',1)->skip(0)->take(7)->get();
        foreach($cate as $value){
            $pid = $value->id;
            //导航左侧限制二级分类数
            $value->dev = DB::table('goods_cates')->where('pid','=',$pid)->where('display','=',1)->skip(0)->take(3)->get();
            //导航右侧二级分类数
            $value->dev1 = DB::table('goods_cates')->where('pid','=',$pid)->where('display','=',1)->get();
            foreach($value->dev as $val){
            $pid = $val->id;
            $val->dev = DB::table('goods_cates')->where('pid','=',$pid)->where('display','=',1)->get();
            }
            foreach($value->dev1 as $val1){
            $pid = $val1->id;
            $val1->dev = DB::table('goods_cates')->where('pid','=',$pid)->where('display','=',1)->get();
            }
        }

        //判断是否是三级分类
        $res1 =DB::table('goods_cates')->where('pid','=',$id)->first();
        if(!$res1){
            // 这里为三级分类的商品
            $list[]=DB::table('goods')->where('c_id','=',$id)->get();
            return view('Home.GoodList.goodlist',['list'=>$list,'cate'=>$cate]);exit;
        }

        //查找其子类
        $res = DB::table('goods_cates')->where('pid','=',$id)->get();
        // var_dump($res);exit;
        //如果有子集则继续遍历
        if($res){
            foreach($res as $value){
                $value->dev=DB::table('goods_cates')->where('pid','=',$value->id)->get();
                //二级分类的商品列表
                $list[]=DB::table('goods')->where('c_id','=',$value->id)->get();
                // var_dump($data);
                if($value->dev){
                    foreach($value->dev as $val){
                        $val->dev=DB::table('goods_cates')->where('pid','=',$val->id)->get();
                        //利用分类id 查找对应的商品c_id的商品列表
                        //一级分类的商品列表
                        $list[]=DB::table('goods')->where('c_id','=',$val->id)->get();
                        // var_dump($val->id);
                    }
                }
            }

        }
        // dd($res);
        return view('Home.GoodList.goodlist',['list'=>$list,'cate'=>$cate]);
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
