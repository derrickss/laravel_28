<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class GoodInfoController extends Controller
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
        $cate=$this->getCatesBypid(0);
        // foreach($cate as $value){
        //     $pid = $value->id;
        //     //导航左侧限制二级分类数
        //     // $value->dev = DB::table('goods_cates')->where('pid','=',$pid)->where('display','=',1)->skip(0)->take(3)->get();
        //     //导航右侧二级分类数
        //     $value->dev1 = $this->getCatesBypid($pid);
        //     // foreach($value->dev as $val){
        //     // $pid = $val->id;
        //     // $val->dev = DB::table('goods_cates')->where('pid','=',$pid)->where('display','=',1)->get();
        //     // }
        //     // foreach($value->dev1 as $val1){
        //     // $pid = $val1->id;
        //     // $val1->dev = DB::table('goods_cates')->where('pid','=',$pid)->where('display','=',1)->get();
        //     // }
        // }
        // dd($cate);


        $data_=DB::table('goods')->where('id','=',$id)->first();
        // var_dump($data);
        // $gid = $data->id;
        $style_=DB::table('norms')->where('pid','=',$data_->template)->get();
        foreach($style_ as $key=>$val){
        	$val->dev=DB::table('norms_data')->where('pid','=',$val->id)->where('good_id','=',$id)->get();
            if(!count($val->dev)){
                unset($style_[$key]);
            }
        	// DB::table('norms_data') ->join('contacts', 'users.id', '=', 'contacts.user_id') ->get();
        }
        // dd($style_);
        // $style_2 = DB::table('goods_style')->where('gid','=',$gid)->get();



        //查找id对应商品的详情信息
        $data=DB::table('goods')->where('id','=',$id)->get();
        $gid = $data[0]->id;
        // $style = DB::table('goods_style')->where('gid','=',$gid)->get();
        // $res=array();
        // foreach($style as $key=>$value){
        //     $table=$value->table;
        //     $value->dev = DB::table("$table")->where('gid','=',$gid)->get();
        // }

        //查找评论表
        $comment = DB::table('comment')->where('g_id','=',$gid)->get();
        // dd($comment);
        //
        // var_dump($style);
        // dd($style);

        // //查找商品父类信息
        // $c_id=$data[0]->c_id;
        // $info = $this->getCatesBypid(0);
        // dd($info);
        return view('Home.GoodInfo.goodinfo',['cate'=>$cate,'data'=>$data,'style'=>$style_,'comment'=>$comment]);
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
    public function create(Request $request)
    {

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
