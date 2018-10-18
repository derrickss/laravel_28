<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// //后台首页
// Route::get('/admin', function () {

//     return view('Admin.Public.index');

// });
// //后台首页
// Route::get('/welcome',function(){
//     return view('Admin.Public.welcome');
// });

// //后台会员列表
// Route::resource('/member-list','Admin\UserController');
// //后台会员Ajax删除
// Route::get('/member-del/{id}','Admin\UserController@del');
// //后台会员状态管理--->禁用
// Route::get('member-stop/{id}','Admin\UserController@stop');
// //后台会员状态管理--->激活
// Route::get('member-start/{id}','Admin\UserController@start');


// //后台分类管理

// Route::resource('/product-cate','Admin\CateController');
// Route::get('/cate/{list}','Admin\CateController@list');
// //后台分类状态 禁用 管理
// Route::get('/cate-stop/{id}','Admin\CateController@stop');
// //后台分类状态 禁用 管理
// Route::get('/cate-start/{id}','Admin\CateController@start');
// //后台分类Ajax删除
// Route::get('/cate-del/{id}','Admin\CateController@del');




//前台登录路由
Route::resource('/login','Home\LoginController');

//前台注册路由
Route::resource('/register','Home\RegisterController');
//前台注册  用户名检测是否重复 Ajax
Route::get('/checked_name','Home\RegisterController@checked');

//前台首页
Route::resource('/','Home\IndexController');

//前台商品列表页
Route::get('/goodlist/{id}','Home\GoodListController@index');

//前台商品详情页
Route::get('/goodinfo/{id}','Home\GoodInfoController@index');

//前台加入购物车页
Route::resource('/addcart','Home\AddCartController');

//前台购物车页
Route::resource('/cart','Home\CartController');

//购物车数量 减少
Route::get('/cartsub','Home\CartController@cartsub');
//购物车数量 增加
Route::get('/cartadd','Home\CartController@cartadd');
//购物车数量 删除
Route::get('/cartdel','Home\CartController@cartdel');
//购物车全选删除
Route::get('/delall','Home\CartController@delall');

// //云之讯路由
// Route::get('/message/{tel}','Admin\UserController@message');

// //支付宝接口路由
// Route::get('/alipay','Home\PayController@pay');
// //支付宝返回
// Route::get('/return_url','Home\PayController@return');
//




//后台登录和退出
Route::resource('/adminlogin','Admin\AdminLoginController');


//后台管理模块结合中间件
Route::group(['middleware'=>'adminlogin'] , function () {

	//后台首页
	Route::resource('/admin','Admin\AdminController');


	//后台会员列表
	Route::resource('/member-list','Admin\UserController');
	//后台会员Ajax删除
	Route::get('/member-del/{id}','Admin\UserController@del');
	//后台会员状态管理--->禁用
	Route::get('member-stop/{id}','Admin\UserController@stop');
	//后台会员状态管理--->激活
	Route::get('member-start/{id}','Admin\UserController@start');
	//后台用户地址详情
	Route::get('member-address/{id}','Admin\UserController@address');

	//后台分类管理

	Route::resource('/product-cate','Admin\CateController');
	Route::get('/cate/{list}','Admin\CateController@list');
	//后台分类状态 禁用 管理
	Route::get('/cate-stop/{id}','Admin\CateController@stop');
	//后台分类状态 禁用 管理
	Route::get('/cate-start/{id}','Admin\CateController@start');
	//后台分类Ajax删除
	Route::get('/cate-del/{id}','Admin\CateController@del');


	//后台管理员列表
	Route::resource('/admin-list','Admin\AdminsController');
	//后台管理员ajax删除
	Route::get("/admin-listdel","Admin\AdminsController@del");
	//后台管理员修改密码
	Route::resource("/admin-listchange","Admin\PasswordController");
	//后台管理员执行密码修改
	// Route::get("/admin-listdochange/","Admin\PasswordController");
	//后台管理员状态
	Route::get("/admin-liststatus","Admin\AdminsController@status");
	//后台管理员角色管理
	Route::resource("/rolelist","Admin\RolelistController");
	//后台管理角色删除
	Route::get('/roledel/{id}',"Admin\RolelistController@roledel");


	// Route::resource("/rolelist","Admin\RolelistController");
	//分配权限
	Route::get("/auth/{id}","Admin\RolelistController@auth");
	//保存权限
	Route::post("/saveauth","Admin\RolelistController@saveauth");
	//后台管理权限管理
	Route::resource("/nodelist","Admin\NodelistController");

	//后台商品列表
	Route::resource('/product-list','Admin\GoodsController');
	Route::get('/product-lists/{id}','Admin\GoodsController@plus');

	//后台商品状态管理--->禁用
	Route::get('product-stop/{id}','Admin\GoodsController@stop');
	//后台商品状态管理--->激活
	Route::get('product-start/{id}','Admin\GoodsController@start');

	//后台评价列表
	Route::resource('/comment','Admin\CommentController');

	//轮播图and广告呀
	Route::resource('/lunbo','Admin\LunboController');
	//轮播图广告ajax删除
	Route::get('/lunbodel/{id}','Admin\LunboController@del');

	Route::get('/lunbostatus','Admin\LunboController@status');
	//轮播图广告修改
	// Route::get('/lunbodoedit',"Admin\LunboController@doedit");

	//订单
	Route::resource('/order','Admin\OrdersController');

	Route::get('/orderstatus','Admin\OrdersController@status');

	Route::get('/orderdel/{id}','Admin\OrdersController@del');


	//友情链接
	Route::resource('/link','Admin\LinkController');
	//友情链接删除操作
	Route::get('/linkdel/{id}','Admin\LinkController@del');

	Route::get('/linkstatus','Admin\LinkController@status');

	//不在中间件里面的



});

//验证码
	Route::resource('/code','Admin\CodeController');

	//前台订单->个人中心页面
	Route::resource('/homeorder','Home\OrderController');