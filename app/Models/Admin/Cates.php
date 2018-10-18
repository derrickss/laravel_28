<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Cates extends Model
{
     //定义与模型关联的数据表
    protected $table = "goods_cates";
    //主键
    protected $primaryKey = "id";
    //设置是否需要自动维护时间戳
    public $timestamps = false;

    //可以被批量赋值的属性
    protected $fillable = ['name','pid','path','display'];

    //修改器的方法
    //对完成的状态做自动处理
    public function getDisplayAttribute($value){
    	$display=[0=>'已停用',1=>'已启用'];
    	return $display[$value];
    }
}
