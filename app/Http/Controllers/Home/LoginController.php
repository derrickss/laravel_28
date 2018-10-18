<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引用DB
use DB;
//引用HASH
use Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //销毁session
        $request->session()->pull('id');
        $request->session()->pull('user_name');
        //回到登录页
        return redirect('/login/create');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载登录模板
        return view('Home.Login.login');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取用户名和密码
        // dd($request->all());
        //根据输入的用户名获取用户信息
        $user=DB::table('user')->where('user_name','=',$request->input('user_name'))->first();
        //检测用户名
        if($user){
            // 检测密码
            if(Hash::check($request->input('password'),$user->password)){
                // echo 'ok';
                // 把用户信息写入到session
                session(['id'=>$user->id]);
                session(['user_name'=>$user->user_name]);
                //跳转首页
                return redirect("/")->with('success','登录成功');
            }else{
                // $request->flashOnly('error',1);
                return back()->with('error','1');
            }
        }else{
            return back()->with('error1','1');
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
