<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // var_dump($request);
    	// return response('设置cookie方法一')->withCookie('jack',10,10);
    	// 获取cookie
    	// $cookie = $request->cookie('jack');
    	// 设置cookie2
    	// \Cookie::queue('tom','haha',10);
    	// 获取cookie2
    	// $cookie = \Cookie::get('tom');
    	// var_dump($cookie);

    	//session
    	// session(['admin'=>'sss']);
    	//huoqu1
    	// $value = session('admin');
    	// var_dump($value);
    	//获取所有session
    	// $data = $request->session()->all();
    	// 判断某个session 是否存在
    	// $data=$request->session()->has('admin');
    	// $request->session()->push('name','amy');
    	// $data = $request->session()->all();

    	//返回json
    	// return response()->json(['a'=>100,'b'=>200]);
    	// 下载文件
    	// return response()->download('web.config');
    	// var_dump($data);
    	// 页面跳转
    	// return redirect('/file/create');
    	return view('file',['data'=>array(array('id'=>10,'name'=>'jack'),array('id'=>20,'name'=>'ken'))]);
    	//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // echo 1111;
        return view("file");
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
        // var_dump($request);
        if($request->hasFile('pic')){
        	//初始化名字
        	$name=time()+rand(1,1000);
        	//获取上传文件后缀
        	$ext = $request->file('pic')->getClientOriginalExtension();
        	// var_dump($ext);
        	// 移动到指定目录下
        	$request->file('pic')->move('./uploads/'.date('Y-m-d'),$name.'.'.$ext);
        }
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
