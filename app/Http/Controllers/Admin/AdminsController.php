<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入模型类
use App\Models\Admin\Admins;
use Hash;
use DB;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //获取搜索的参数
        $k = $request->input('keywords');

        $total = count(Admins::get());

        // dd($total);
        //获取数据 分页
        $admin = Admins::where("admin_name","like","%".$k."%")->paginate(3);

        // dd($request->all());

        return view('Admin.Admins.admin-list',['admin'=>$admin,'total'=>$total,'request'=>$request->all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // echo '这是管理添加页面';
        // 查询角色表有哪些角色传输过去
        $info = DB::select("select * from role");
        // dd($info);die;
        return view('Admin.Admins.admin-add',['info'=>$info]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo '执行添加';
        // dd($request->all());

         $data = $request->except(['repassword','_token']);

         $data['password']=Hash::make($data['password']);

         // $data['levle']=3;

        $data['add_time'] =date('Y-m-d H:i:s');
        // dd($data);die;
        if(DB::table('admin')->insert($data)) {
            //如果添加成功,获取刚刚添加的数据的信息
            $info = Admins::where('admin_name','=',$data['admin_name'])->first();
            // dd($info->id);die;
            //准备信息添加进入user_role表
            $data2['uid'] = $info->id;

            $data2['rid'] = $info->level;

            // dd($data2);die;

            //判断是否添加进user_role表
            if(DB::table('user_role')->insert($data2)) {

                return redirect("/admin-list/create")->with('success',1);

            }else{
                    //如果没有添加成功,删除admin表刚添加的那条数据 回到添加页面
                    Admins::where('id','=',$info->id)->delete();

                    return redirect("/admin-list/create")->with('error',0);
                }

        }else{

            return redirect("/admin-list/create")->with('error',0);

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
        // echo $id;
         // 查询角色表有哪些角色传输到修改页面遍历
        $role = DB::select("select * from role");
        //查询用户单条信息到修改页面
        $info=Admins::where("id",'=',$id)->first();
        // dd($info->status);
        //加载模板
        return view("Admin.Admins.admin-edit",['info'=>$info,'role'=>$role]);
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
        //获取修改后的数据
        // dd($id);
        // dd($request->all());die;
        //准备修改admin数据
        $data=$request->except(['_token','_method']);

        //准备修改user_role表数据

        $data2['rid'] = $data['level'];
        // dd($data2);die;

        if (Admins::where('id','=',$id)->update($data) && DB::table('user_role')->where('uid','=',$id)->update($data2)) {

            return redirect('/admin-list/'.$id.'/edit')->with('success','1');

        }else{

            return redirect('/admin-list/'.$id.'/edit')->with('error',"0");
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


//ajax删除操作
 public function del(Request $request){

        $id=$request->input("id");
        // echo $id;
        if(Admins::where("id",'=',$id)->delete() && DB::table('user_role')->where('uid','=',$id)->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }

    //管理员状态修改
 public function status(Request $request){

        $id = $request->input("id");

        $sta = $request->input("sta");

        // $info = Admins::where("id",'=',$id)->first();

        // echo $id;
        // dd($info);

        $data['status'] = $sta;

        if(Admins::where("id",'=',$id)->update($data)){

            return 1;

        }else{

            return 0;
        }
    }

    //管理员密码修改
    // public function change($id) {
    //     // echo "这是密码修改操作";
    //     // dd($id);
    //      // $id = $request->input("id");
    //     $info = Admins::where('id','=',$id)->first();

    //     return view('Admin.Admins.change-password',['info'=>$info]);

    // }

    // //执行管理员密码修改
    // public function dochange() {

    //     // dd($request->all());
    //     echo "执行密码修改";
    // }


}
