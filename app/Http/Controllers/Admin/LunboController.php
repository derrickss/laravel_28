<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Storage;


class LunboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $total = count(DB::table('lunbo')->get());

        $info = DB::table('lunbo')->get();

        return view('Admin.Lunbo.lunbo',['info'=>$info,'total'=>$total,'request'=>$request->all()]);
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
        // dd($request->all());
        //1.检测是否具有文件上传
        if($request->hasFile('relpic')){
            //初始化文件名字
            $name=time()+rand(1,10000);
            //获取上传文件后缀
            $ext=$request->file("relpic")->getClientOriginalExtension();
            //2.将上传的文件移动到指定的目录下
            $request->file("relpic")->move("./uploads/".date("Y-m-d")."/",$name.".".$ext);

            //准备入库
            $data['pic'] = "./uploads/".date("Y-m-d")."/".$name.".".$ext;
            $data['name'] = $request->name;
            $data['cate'] = $request->cate;
            $data['status'] = $request->status;

            if(DB::table('lunbo')->insert($data)) {
                return redirect('/lunbo')->with('success',1);
            }else{
                return redirect('/lunbo')->with('error',0);
            }

        }else{

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
        // echo $id;
        //获取当前对象的的信息
        $info = DB::table('lunbo')->where('id','=',$id)->first();

        return view('Admin.Lunbo.edit',['info'=>$info]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());die;
        $id = $request->id;
        $info = DB::table('lunbo')->where('id','=',$id)->first();

        if ($info->name == $request->name && $info->cate == $request->cate && $info->pic == $request->pic) {

            // echo '我进来了';

            return redirect('/lunbo/'.$id.'/edit')->with('success',1);
        }
        // die;
        // echo '我出来了';die;
        $oldpic = $info->pic;
        // $arr = (explode('/',$oldpic));
        // $filename = end($arr);
        // $dir = $arr[count($arr)-2];
        // $url = "./uploads/".$dir."/".$filename;
        // dd($url);die;

        // dd($url);
        //1.检测是否具有文件上传
        if($request->hasFile('relpic')){

            //初始化文件名字
            $name=time()+rand(1,10000);
            //获取上传文件后缀
            $ext=$request->file("relpic")->getClientOriginalExtension();
            //2.将上传的文件移动到指定的目录下
            $request->file("relpic")->move("./uploads/".date("Y-m-d")."/",$name.".".$ext);
            //删除原来那个文件

                unlink($oldpic);
            $data['pic'] = "./uploads/".date("Y-m-d")."/".$name.".".$ext;
        }else{

            $data['pic'] = $request->pic;
        }

            $data['name'] = $request->name;
            $data['cate'] = $request->cate;
            $data['status'] = $request->status;

        if (DB::table('lunbo')->where('id','=',$request->id)->update($data)) {


                return redirect('/lunbo/'.$id.'/edit')->with('success',1);

            }else{

                return redirect('/lunbo/'.$id.'/edit')->with('error',0);
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

    //轮播图,广告ajax删除
    public function del($id) {

        $info = DB::table('lunbo')->where('id','=',$id)->first();
        $pic = $info->pic;
        if(DB::table('lunbo')->where('id','=',$id)->delete()) {
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

        if(DB::table('lunbo')->where("id",'=',$id)->update($data)){

            return 1;

        }else{

            return 0;
        }
    }


}
