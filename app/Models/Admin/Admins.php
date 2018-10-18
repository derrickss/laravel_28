<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    //
    //指定数据表 admin
    protected $table = "admin";
    //指定主键
    protected $primaryKey = "id";
    //该模型是否需要时间戳维护 false =》不需要  true -》需要
    public $timestamps = false;
    //在模型类里面指定下模型可以给数据表赋值的字段
    protected $fillable = ['admin_name','password','status','levle','token','add_time'];

    //修改器 对获取到的status值 做处理
    public function getStatusAttribute($value){

		$status=[0=>"已禁用",1=>"已启用"];

		return $status[$value];
}

	  //修改器 对获取到的levle值 做处理
//     public function getLevelAttribute($value){

// 		$level=[0=>"栏目编辑",1=>"栏目主编",2=>"总编",3=>"超级管理员"];

// 		return $level[$value];
// }

}
