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
<!--[if IE 6]>
<script type="text/javascript" src="/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>修改广告 - 修改轮播图 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<div class="text-c">
		<form class="Huiform" id="form-admin-add" method="post" action="/lunbo/{{$info->id}}" target="_self" enctype="multipart/form-data">

			<input type="text" name="name" placeholder="名称" value="{{$info->name}}" class="input-text" style="width:120px">
			<span class="btn-upload form-group">
			<input class="input-text upload-url" type="text" name="pic" value="{{$info->pic}}" id="uploadfile-2" readonly style="width:200px">
			<a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 上传图片</a>
			<input type="file" multiple name="relpic" value="" class="input-file">
			</span> <span class="select-box" style="width:150px">
			<select class="select" name="cate" id="select" size="1">
				<option value="1" @if($info->cate == 1) selected @endif >轮播图</option>
				<option value="0" @if($info->cate == 0) selected @endif>广告</option>
			</select>
			<!-- <input type="text" name="description" placeholder="描述" value="" class="input-text" style="width:120px"> -->
			<input type="hidden" name="status" value="{{$info->status}}">
			<input type="hidden" name="id" value="{{$info->id}}">
			{{ method_field('PUT') }}
			{{csrf_field()}}
			</span><button type="submit" class="btn btn-success" id="" name="" onClick=""><i class="Hui-iconfont">&#xe600;</i> 确定</button>
		</form>
	</div>

</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">



if({{session('success')}}){
	var index = parent.layer.getFrameIndex(window.name);
			//父页面刷新
			window.parent.location.reload();
			// parent.$('.btn-refresh').click();
			parent.layer.msg('修改成功');
			parent.layer.close(index);

}



</script>

<script type="text/javascript">




</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
