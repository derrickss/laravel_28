<!DOCTYPE HTML>
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
<link rel="stylesheet" type="text/css" href="/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/static/admins/css/my.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<style>
	 .dataTables_paginate{
                display: none;
            }


            .page{
                position: relative;
            }
            .pagination{
                position: absolute;
                top:10px;
                right:10px;
            }
            .pagination li{
                border:1px solid #ccc;cursor:pointer;display:inline-block;margin-left:2px;text-align:center;text-decoration:none;color:#666;height:26px;line-height:26px;text-decoration:none;margin:0 0 6px 6px;padding:0 10px;font-size:14px
            }
            .pagination li a{


                text-decoration: none;
            }
            .disabled,.active{border:1px solid #ccc;cursor:pointer;display:inline-block;margin-left:2px;text-align:center;text-decoration:none;color:#fff;height:26px;line-height:26px;text-decoration:none;margin:0 0 6px 6px;padding:0 10px;font-size:14px}
            .active{
                background: #5a98de;
                color: #fff;
            }
            .active span{
                font-size:20px;
            }
            .disabled:hover{
                background: #5a98de;
                color: #fff;
            }
            .pagination li:hover{
                background: #5a98de;
                color: #fff;
            }
</style>
<title>分类管理</title>
</head>
<body style="background:white;">

<div class="page-container" >
	<div class="text-c">
		<form action="/cate/list" method="get">
		<input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="keywords" value="{{$request['keywords'] or ''}}">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜分类</button>
		</form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="/javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="member_add('添加分类','/product-cate/create','','310')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加分类</a></span><span class="r">共有数据：<strong>88</strong>条</span></div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="80">ID</th>
				<th width="100">分类</th>
				<th width="40">pid</th>
				<th width="90">path</th>
				<th width="90">状态</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($cate as $row)
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td>{{$row->id}}</td>
				<td><u style="cursor:pointer" class="text-primary" onclick="member_show('张三','member-show.html','10001','360','400')">{{$row->name}}</u></td>
				<td>{{$row->pid}}</td>
				<td>{{$row->path}}</td>
				<td style="display: none;">/td>
				<td class="text-l" style="display: none;"></td>
				<td style="display: none;"></td>
				<td class="td-status">
					@if($row->display == '已启用')
					<span class="label label-success radius">{{$row->display}}</span></td>
					@else
					<span class="label label-defaunt radius">{{$row->display}}</span></td>
					@endif
				<td class="td-manage">
					<!-- 判断分类状态 -->
					@if($row->display == '已启用')
					<a style="text-decoration:none" onClick="member_stop(this,{{$row->id}})" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>
					@else
					<a style="text-decoration:none" onClick="member_start(this,{{$row->id}})" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe631;</i></a>
					@endif
					<a title="编辑" href="javascript:;" onclick="member_edit('编辑','/product-cate/{{$row->id}}/edit','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="change_password('修改密码','change-password.html','10001','600','270')" href="/javascript:;" title="修改密码"><i class="Hui-iconfont">&#xe63f;</i></a> <a title="删除" href="javascript:;" onclick="" class="ml-5 del" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>

     <div class="page">{{$cate->appends($request)->render()}}</div>

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
<script type="text/javascript" src="/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$(function(){
	$('.table-sort').dataTable({
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,8,9]}// 制定列不参与排序
		]
	});

});
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*用户-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*用户-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$.ajax({
			type: 'GET',
			url: '/cate-stop/'+id,
			dataType: 'json',
			success: function(data){
				// alert(data);
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,'+data+')" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
				$(obj).remove();
				layer.msg('已停用!',{icon: 5,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}

/*用户-启用*/
function member_start(obj,id){
	// alert(id);
	layer.confirm('确认要启用吗？',function(index){
		$.ajax({
			type: 'GET',
			url: '/cate-start/'+id,
			dataType: 'json',
			success: function(data){
				// alert(data);
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,'+data+')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
				$(obj).remove();
				layer.msg('已启用!',{icon: 6,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}
/*用户-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*密码-修改*/
function change_password(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*用户-删除*/
function member_del(obj,id){

}
$('.del').click(function(){
	id=$(this).parents("tr").find("td:first").next().html();
	s=$(this).parents("tr");

layer.confirm('确认要删除吗？',function(index){
		$.get("/cate-del/"+id,function(data){
			// alert(data);
			if(data==0){
				parent.layer.alert('此分类还有子类');
				layer.close(index);
			}else if(data==1){
				parent.layer.alert('删除成功');
				s.remove();
				layer.close(index);
			}else{
				parent.layer.alert('删除失败');
				layer.close(index);
			}
			});
	});

});



</script>
</body>
</html>