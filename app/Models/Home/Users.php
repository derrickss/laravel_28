<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    //定义与模型关联的数据表
    protected $table = "user";
    //主键
    protected $primaryKey = "id";
    //设置是否需要自动维护时间戳
    public $timestamps = true;

    //可以被批量赋值的属性
    protected $fillable = ['user_name','password','email','status','emailyz','phone','pic','sex'];

    //修改器的方法
    //对完成的状态做自动处理
    public function getStatusAttribute($value){
    	$status=[0=>'禁用',1=>'激活'];
    	return $status[$value];
    }

     public function getSexAttribute($value){
        $sex=[0=>'女',1=>'男'];
        return $sex[$value];
    }

    //获取与用户关联的详情信息
    public function info(){
    	return $this->hasOne('App\Models\User\Usersinfo','user_id');
    }
}
