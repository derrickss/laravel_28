<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Useraddress extends Model
{
    //
    //定义与模型关联的数据表
    protected $table = "user_address";
    //主键
    protected $primaryKey = "id";
    //设置是否自动维护时间戳
    public $timestamps = false;

    protected $fillable = ['u_id','adds','name','phone','path','isdefault'];
}
