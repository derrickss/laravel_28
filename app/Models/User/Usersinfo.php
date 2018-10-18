<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Usersinfo extends Model
{
    //
    //定义与模型关联的数据表
    protected $table = "user_info";
    //主键
    protected $primaryKey = "id";
    //设置是否自动维护时间戳
    public $timestamps = false;

    protected $fillable = ['u_id','user_name','age','level','pic'];
}
