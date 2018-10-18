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
<title>友情链接管理</title>
</head>
<body style="background:white">
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 友情链接 <span class="c-gray en">&gt;</span> 友情链接列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		<form class="Huiform" id="form-admin-add" method="post" action="" target="_self" enctype="multipart/form-data">

			<input type="text" name="name" placeholder="名称" value="" class="input-text" style="width:120px">
			<span class="btn-upload form-group">
			<input class="input-text upload-url" type="text" name="pic" id="uploadfile-2" readonly style="width:100px">
			<a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 上传图片</a>
			<input type="file" multiple name="relpic" class="input-file">
			</span>
			<input type="text" name="url" placeholder="url" value="" class="input-text upload-url" style="width:250px">

			<input type="hidden" name="status" value="1">
			{{csrf_field()}}
			</span><button type="submit" class="btn btn-success" id="" name="" onClick=""><i class="Hui-iconfont">&#xe600;</i> 添加</button>
		</form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a></span> <span class="r">共有数据：<strong>{{$total}}</strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-sort">
			<thead>

				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="70">ID</th>
					<th width="200">图片</th>
					<th>具体描述</th>
					<th width="120">状态</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>

			@foreach($info as $k)
				<tr class="text-c">
					<td><input name="" type="checkbox" value=""></td>
					<td>{{$k->id}}</td>
					<td><img src="{{$k->pic}}" name="pic" width="100"></td>
					<!-- <td class="td-manage"></td> -->

					<td class="text-l">{{$k->name}},{{$k->url}}</td>
					<td class="td-status"><span class="label label-success radius">
					@if($k->status == 1)
						已启用
						@else
						已禁用
					@endif
					 </span></td>
					<td class="f-14 product-brand-manage">

					@if($k->status == 1)

				      <a style="text-decoration:none" onclick="admin_stop(this,{{$k->id}},0)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe615;</i></a>
					@else

					<a onClick="admin_start(this,{{$k->id}},1)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
					@endif
					<a style="text-decoration:none" onClick="product_brand_edit('友情链接修改','/link/{{$k->id}}/edit','{{$k->id}}','1000','250')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>

					<a style="text-decoration:none" class="ml-5" onClick="active_del(this,{{$k->id}})" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
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
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,5]}// 制定列不参与排序
	]
});
@if(session('error'))
     layer.msg('请上传图片');
@endif

$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});

	$("#form-admin-add").validate({
		rules:{
			name:{
				required:true,

			},
			pic:{
				required:true,
			},
			url:{
				required:true,

			},

		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit({
				type: 'POST',
				url: "/link" ,
				success: function(data){
					layer.msg('添加成功!',{icon:1,time:1000});
					window.location.reload();
				},
                error: function(XmlHttpRequest, textStatus, errorThrown){
					layer.msg('error!',{icon:1,time:1000});
				}
			});
			// var index = parent.layer.getFrameIndex(window.name);
			// parent.$('.btn-refresh').click();
			// parent.layer.close(index);
		}
	});
});

/*修改*/
function product_brand_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}

/*删除*/
function active_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'GET',
			url: '/linkdel/'+id,
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

/*-停用*/
function admin_stop(obj,id,sta){
	layer.confirm('确认要停用吗？',function(index){
		// alert(id);
		$.get('/linkstatus',{id:id,sta:sta},function(data) {

			if(data == 1) {

				//此处请求后台程序，下方是成功后的前台处理……

				$(obj).parents("tr").find(".product-brand-manage").prepend('<a onClick="admin_start(this,'+id+',1)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
				$(obj).remove();
				layer.msg('已停用!',{icon: 5,time:1000});
			}
		});

	});
}

/*-启用*/
function admin_start(obj,id,sta){
	layer.confirm('确认要启用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		$.get('/linkstatus',{id:id,sta:sta},function(data) {

			if (data == 1) {

				$(obj).parents("tr").find(".product-brand-manage").prepend('<a onClick="admin_stop(this,'+id+',0)" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
				$(obj).remove();
				layer.msg('已启用!', {icon: 6,time:1000});
			}
		});
	});
}
</script>
</body>
</html>
