<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class RolelistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取role表数据
        $role = DB::table('role')->get();

        //获取admin表数据
        // $admin = DB::table('admin')->get();

        // dd($role);die;

        return view("Admin.Admins.admin-role",['role'=>$role]);
    }

    //分配权限
    public function auth($id) {
        // echo $id;
        // echo '权限分配';
        //获取当前角色
        $role = DB::table('role')->where('id','=',$id)->first();

        //获取所有的权限
        $auth = DB::table('node')->get();

        //获取当前角色已有的权限列表
        $data = DB::table('role_node')->where('rid','=',$id)->get();
        // dd($data);die;

        //判断当前角色有无权限列表
        if (count($data)) {
            //遍历
            foreach ($data as $key => $value) {
                //用空数组把当前用户在role_node的权限 nid 装起来
                $nids[] = $value->nid;
            }
            //加载分配权限列表
            return view("Admin.Admins.admin-role-edit",['role'=>$role,'auth'=>$auth,'nids'=>$nids]);

        }else{
            //加载分配权限列表
            return view("Admin.Admins.admin-role-edit",['role'=>$role,'auth'=>$auth,'nids'=>array()]);
        }
    }

    //保存权限
    public function saveauth(Request $request) {
        // echo "执行保存权限";
        // $data = $request->all();
        //获取传过来的rid nid
        $rid = $request->input('rid');
        $nids = $request->input('nids');
         // dd($rid);die;
        // dd($nids);die;
        //删除当前角色已有的权限信息在重新添加
        DB::table("role_node")->where("rid",'=',$rid)->delete();
        //遍历
        foreach($nids as $key=>$value){
            //入库操作
            $data['rid']=$rid;
            $data['nid']=$value;
            //插入
            DB::table("role_node")->insert($data);
        }

        return redirect("/rolelist")->with('success',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // echo '添加角色页面';
        //获取所有权限
        $auth = DB::table('node')->get();

        // dd($auth);die;

         return view("Admin.Admins.admin-role-add",['auth'=>$auth,'nids'=>array()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //执行添加操作
        // dd($request->all());die;
        //获取传递过来的选中的权限
        $nids = $request->input('nids');
        //为role添加数据做准备
        $data['name'] = $request->name;
        $data['status'] = $request->status;
        $data['remark'] = $request->remark;


        if(DB::table('role')->insert($data)) {
            //如果传递过来的权限不为空
            if (!empty($nids)) {
                //获取刚刚添加的数据的id
                $info = DB::table('role')->where('name','=',$data['name'])->first();
                // dd($info);die;
                foreach ($nids as $key => $value) {
                    //入库操作
                    $data2['rid']=$info->id;
                    $data2['nid']=$value;
                    //插入
                    DB::table("role_node")->insert($data2);
                }

                return redirect("/rolelist")->with('success',1);
            }

            return redirect("/rolelist")->with('success',1);

        }else{

             return redirect("/rolelist")->with('error',0);
        }
        // dd($data);die;
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

    //删除role角色同时删除改角色在role_node表相关的信息
    public function roledel($id) {
        // echo '角色删除';
        if (DB::table('role')->where('id','=',$id)->delete()){
            //判断该角色在role_node表中是否有数据,有的话删除
            $info = DB::table('role_node')->where('rid','=',$id)->first();
            // var_dump($info);exit;
            if(!empty($info)){
                DB::table('role_node')->where('rid','=',$id)->delete();
            }

            //判断该角色在admin表中是否有数据,有的话删除
            $list = DB::table('admin')->where('level','=',$id)->first();
            // var_dump($list);
            if(!empty($list)){
                DB::table('admin')->where('level','=',$id)->delete();
                //判断该角色在user_role表中是否有数据,有的话删除
                $data = DB::table('user_role')->where('rid','=',$id)->first();
                if(!empty($data)){
                    DB::table('user_role')->where('rid','=',$id)->delete();
                }
            }

            return 1;
        }

    }


}
