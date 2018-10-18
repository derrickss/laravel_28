<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入DB类
use DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //首页导航遍历
        $cate=$this->getCatesBypid(0);
        //首页中部模块遍历
        $data = DB::table('goods_cates')->where('pid','=',0)->where('display','=',1)->get();
        //寻找id=13 对应的二级分类
        foreach($data as $dd){
            $dd->dev = DB::table('goods_cates')->where('pid','=',$dd->id)->where('display','=',1)->skip(0)->take(1)->get();
            foreach($dd->dev as $d){
                $d->dev = DB::table('goods_cates')->where('pid','=',$d->id)->where('display','=',1)->get();
                //查询分类对应的商品列表
                foreach($d->dev as $good){
                    $good->dev = DB::table('goods')->where('c_id','=',$good->id)->get();
                }
            }
        }

        // dd($data);
        // $data->dev = DB::table('goods_cates')->where('pid','=',22)->where('display','=',1)->get();
        // dd($data);exit;
       return view('Home.index',['cate'=>$cate,'data'=>$data]);
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
