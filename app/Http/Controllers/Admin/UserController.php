<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
//引入Hash 类
use Hash;
//导入User检验类
use App\Http\Requests\AdminUserinsert;

//导入要调用的模型类
use App\Models\User\Users;
//引入云之讯类
use Ucpaas;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         //获取搜索的关键词
        $k=$request->input('keywords');
        $data = Users::where('user_name','like',"%".$k."%")->paginate(3);
        // dd($data);
        return view('Admin.Users.member-list',['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //用户添加
        return view('Admin.Users.member-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $res = $request->all();
        // $data1 = $_POST;
        // dd($res);
        $data = $request->except(['_token','_method','uploadfile','file-2','beizhu','city']);
        $data['status']=1;
        // var_dump($data);
       Users::create($data);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // echo $id;
        $info = Users::find($id)->info;
        // var_dump($info);exit;
        return view('Admin.Users.member-show',['info'=>$info]);

    }

    //用户地址信息
    public function address($id)
    {
        $address=Users::find($id)->useraddress;
        return view('Admin.Users.member-address',['address'=>$address]);
        // dd($address);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=DB::table('user')->where("id","=",$id)->first();
        // var_dump($data);
        return view('Admin.Users.member-edit',['data'=>$data]);
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
        // echo '修改成功';
        // dd($request->all());
        $data = $request->except(['_token','_method','uploadfile','file-2','beizhu']);
        // dd($data);
        Users::where('id','=',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
    // 会员Ajax删除
    public function del($id){
        $res=DB::table('user')->where('id','=',$id)->delete();
        if($res){
          echo $id;
      }else{
          echo 0;
      }

    }

    //会员状态管理--->禁用
    public function stop($id){
        // echo $id;
        $data['status'] = 0;
        DB::table('user')->where('id','=',$id)->update($data);
        echo $id;
    }

    //会员状态管理--->禁用
    public function start($id){
        $data['status'] = 1;
        DB::table('user')->where('id','=',$id)->update($data);
        echo $id;
    }

}
