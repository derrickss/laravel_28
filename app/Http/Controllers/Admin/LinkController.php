<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total = count(DB::table('link')->get());
        $info = DB::table('link')->get();

        return view('Admin.Link.link',['info'=>$info,'total'=>$total]);
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
        // dd($request->all());
        //检测是否具有上传的图片
        if ($request->hasFile('relpic')) {
            //初始化文件名
            $name = time()+rand(1,10000);
            //获取上传文件后缀
            $ext = $request->file('relpic')->getClientOriginalExtension();
            //将上传的文件移动到指定的目录下
            $request->file('relpic')->move("./uploads/".date("Y-m-d")."/",$name.".".$ext);
            //准备入库
            $data['pic'] = "./uploads/".date("Y-m-d")."/".$name.".".$ext;
            $data['name'] = $request->name;
            $data['status'] = $request->status;
            $data['url'] = $request->url;

            if (DB::table('link')->insert($data)) {

                return 1;
                // return redirect('/lunbo')->with('success',1);
            } else {

                return redirect('/lunbo')->with('error',0);
            }

        } else {

            return back()->with('error',0);
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

        $info = DB::table('link')->where('id','=',$id)->first();

        return view('Admin.Link.edit',['info'=>$info]);
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
        // dd($request->all());
        //获取需要修改的数据
        $info=DB::table("link")->where("id",'=',$id)->first();
        $data=$request->except(['_token','_method','relpic']);
        // dd($data);die;
        //判断
        if($request->hasFile("relpic")){
            //新图上传
            //初始化图片名字
            $name=time()+rand(1,10000);
            //获取后缀
            $ext=$request->file("relpic")->getClientOriginalExtension();
            //移动文件到指定的目录下
             $request->file('relpic')->move("./uploads/".date("Y-m-d")."/",$name.".".$ext);
            //封装$data
           $data['pic'] = "./uploads/".date("Y-m-d")."/".$name.".".$ext;
            if(DB::table("link")->where("id",'=',$id)->update($data)){
                //老图删除
                unlink($info->pic);
               return redirect("/link/".$id."/edit")->with("success",1);
            }

        }else{
            //图片没有修改
           if (DB::table("link")->where("id",'=',$id)->update($data)) {

                return redirect("/link/".$id."/edit")->with("success",1);
            }

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

     //删除
    public function del($id) {
        // dd($id);
        $info = DB::table('link')->where('id','=',$id)->first();
        // dd($info);
        $pic = $info->pic;

        if(DB::table('link')->where('id','=',$id)->delete()) {
            unlink($pic);
            return 1;

        }else{

            return 0;
        }
    }

    //状态修改
 public function status(Request $request){

        $id = $request->input("id");

        $sta = $request->input("sta");

        $data['status'] = $sta;

        // dd($data);

        if(DB::table('link')->where("id",'=',$id)->update($data)){

            return 1;

        }else{

            return 0;
        }
    }


}
