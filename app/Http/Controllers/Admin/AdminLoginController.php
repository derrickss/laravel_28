<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //执行退出
        $request->session()->pull('name');

        return redirect("/adminlogin/create");

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载后台登录的模板
        return view("Admin.Login.login");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取输入的验证码 strtolower将英文转为小写
        $vcode = strtolower($request->input('vcode'));
        //获取系统生成的验证码
        $fcode = session('fcode');

        //获取数据

        $name = $request->input('name');

        $password = $request->input('password');

        //检测用户名
        $info = DB::table('admin')->where("admin_name",'=',$name)->first();

        if ($info) {
            // echo 'ok';
            //检测密码
            if (Hash::check($password,$info->password)) {
                //判断验证码
                if ($vcode == $fcode) {
                    //将后台登录的信息存储在session里面
                    session(['name'=>$name]);
                    //1.获取当前登录用户的所有权限信息
                    $list = DB::select("select n.name,n.mname,n.aname from user_role as ur,role_node as rn,node as n where ur.rid=rn.rid and rn.nid=n.id and uid={$info->id}");
                    // echo '<pre>';
                    // var_dump($list);die;
                    $nodelist['AdminController'][]="index";
                    $nodelist['AdminController'][]="create";
                    //遍历
                    foreach ($list as $key=>$value) {
                        $nodelist[$value->mname][]=$value->aname;
                        //如果具有create方法 添加store  如果具有edit 方法 添加 update
                        //2.初始化权限,所有的管理员都可以访问后台首页
                        //如果具有create方法 ,就要添加store方法,同理有edit就要添加update
                        if ($value->aname=="create") {
                            $nodelist[$value->mname][]="store";
                        }

                        if ($value->aname=="edit") {

                            $nodelist[$value->mname][]="update";
                        }
                    }
                    // echo "<pre>";
                    // var_dump($nodelist);die;
                    //3.把所有的权限信息 存储在session里
                    session(['nodelist'=>$nodelist]);
                    //跳转到后台首页
                    return redirect('/admin');

                }else{
                    //验证码错误
                    $request->flashOnly('name',$name);
                    return back()->with('errorcode','验证码有误');
                }


            }else{
                //密码错误将输入的用户名存入闪存
                $request->flashOnly('name',$name);
                return back()->with('error','管理员名字或者密码有误');
            }

        }else{
            //用户名不存在
            return back()->with('error','管理员名字或者密码有误');
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
