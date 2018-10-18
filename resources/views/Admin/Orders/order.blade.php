﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/lib/html5shiv.js"></script>
<script type="text/javascript" src="/lib/respond.min.js"></script>
<![endif]-->
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<link rel="stylesheet" type="text/css" href="/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="static/admins/css/my.css" />
<link rel="stylesheet" type="text/css" href="/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>订单管理</title>
</head>
<body style="background:white">
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 订单管理 <span class="c-gray en">&gt;</span> 查看订单 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a></span> <span class="r">共有数据：<strong>{{$total}}</strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-sort">
			<thead>

				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="30">ID</th>
					<th width="100">订单号</th>
					<th width="50">用户id</th>
					<th width="50">收货地址</th>
					<th width="80">电话</th>
					<th width="50">商品ID</th>
					<th >商品信息</th>
					<th width="50">数量</th>
					<th width="30">单价</th>
					<th width="30">总价</th>
					<th width="50">状态</th>
					<th width="70">下单时间</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>

				@foreach($info as $k)
				<tr class="text-c">
					<td><input name="" type="checkbox" value=""></td>
					<td class="">{{$k->id}}</td>
					<td class="">{{$k->o_id}}</td>
					<td class="">{{$k->u_id}}</td>
					<td class="">{{$k->address}}</td>
					<td class="">{{$k->phone}}</td>
					<td class="">{{$k->g_id}}</td>
					<td class="td-manage">"小米8,魅蓝色,128G"</td>
				 	<td >{{$k->num}}</td>
				 	<td >{{$k->price}}</td>
					<td class="">{{$k->total}}</td>
					<td ><span class="label label-success radius td-status">
					@if($k->status == 0)
					待付款
					@elseif($k->status == 1)
					待发货
					@elseif($k->status == 2)
					待收货
					@else($k->status == 3)
					已收货
					@endif
					</span></td>
					<td class="text-l">2018-10-16</td>
					<td class="f-14 product-brand-manage">

					@if($k->status == 1)
					<a style="text-decoration:none" onclick="order_change(this,{{$k->id}},2)" href="javascript:;" title="发货"><i class="Hui-iconfont">&#xe615;</i></a>
					@else
					<i class="Hui-iconfont">&#xe615;</i>
					@endif
				      <!-- <a style="text-decoration:none" onclick="admin_stop(this,id,0)" href="javascript:;" title="待付款"><i class="Hui-iconfont">&#xe615;</i></a>
 -->
					<!-- <a onClick="admin_start(this,id,1)" href="javascript:;" title="待发货" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a> -->

					<!-- <a style="text-decoration:none" onClick="product_brand_edit('轮播图广告编辑','url','id','1000','170')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> -->
					@if($k->status == 3)
					<a style="text-decoration:none" class="ml-5" onClick="active_del(this,{{$k->id}})" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
					@else
					<i class="Hui-iconfont">&#xe6e2;</i>
					@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$('.table-sort').dataTable({
	"aaSorting": [[ 2, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,13]}// 制定列不参与排序
	]
});
@if(session('error'))
     layer.msg('请上传图片');
@endif



/*修改*/
function product_brand_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}

/*删除*/
function active_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'GET',
			url: '/orderdel/'+id,
			dataType: 'json',
			success: function(data){
				// alert(data);
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}


//发货
function order_change(obj,id,sta){
	layer.confirm('确认已发货了吗？',function(index){
		// alert(id);
		$.get('/orderstatus',{id:id,sta:sta},function(data) {

			if(data == 1) {

				//此处请求后台程序，下方是成功后的前台处理……

				$(obj).parents("tr").find(".product-brand-manage").prepend('<i class="Hui-iconfont">&#xe615;</i>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">待收货</span>');
				$(obj).remove();
				layer.msg('已发货!',{icon: 6,time:1000});
			}
		});

	});
}
</script>
</body>
</html>
