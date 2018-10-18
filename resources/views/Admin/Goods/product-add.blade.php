<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<link rel="stylesheet" type="text/css" href="/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/style.css" />
<link href="/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="/lib/webuploader/0.1.5/webuploader.min.js"></script> 
<script type="text/javascript" src="/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>

</head>
<body>
<div class="page-container">
@if (count($errors) > 0)
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
@endif
</ul>
</div>
	<form action="/product-list" method="post" class="form form-horizontal" id="form-article-add" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>产品标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="" name="name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分类栏目：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="c_id" class="select">
					@foreach($cate as $row)
					<option value="{{$row->id}}">{{$row->name}}</option>
					@endforeach
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">价格：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="price" id="" placeholder="" value="" class="input-text" style="width:90%">
				元</div>
		</div>
		<!-- ==========================================================-->
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">产品模板：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select id="pid" name="template" onchange="gradeChange()">
				  <option value ="">--请选择--</option>
				 	@foreach($template as $rows)
					<option value="{{$rows->id}}" >{{$rows->name}}</option>
					@endforeach
				</select>
				<p id="pids"></p>
				<script type="text/JavaScript">
				// 这里是生成input框和按键的
				    var objS = document.getElementById("pid");

				    var obj=document.getElementById("pids")

				    function gradeChange(){
				    //重新选择，option，会重新把已经生成的数据清除掉，防止乱七八糟
				    obj.innerHTML="";

				    var grade = objS.options[objS.selectedIndex].value;
						// alert(grade);
					 // $("button").click(function(){
					  	$.get('/product-list/'+grade,{},function(data){
					  		console.log(data);
					  		$.each(data, function(i, n){
					   			// console.log(data);
					   			$('#pids').append(data[i].name+" : <input style='height:18px;' type='text' name=norms"+data[i].id+'_'+0+"> <i style='cursor:pointer;font-size:20px' class='icon Hui-iconfont' onclick='add(this,"+i+")'>&#xe604;</i><br/>");
					   		});
					  	});
					  // });
				    }

				   	//这里是生成第二次的input框的
				   	function add(obj,id){
				    // var tmp_id=document.getElementById("pid_"+$id);
				    	var temp=$(obj).prev().attr('name');
				    	// alert(temp);
				    	//分割字符串
				    	var strs=new Array();
				    	//用_分割字符串，并返回数组，这里利用最后一个数组数据，也就是strs[strs.length-1]
				    	strs=temp.split("_");
				    	//转换为整形好加一
				    	var num=parseInt (strs.pop())+1;
				    	// alert(num);
				   		$(obj).before(" <input type='text' name='"+strs+'_'+num+"' /> ");
				   		// alert(temp);
				   	}

				  // $("button").click(function($id){
				  // 	// $.get('/product-listss/'+1,{},function(data){
				  // 		alert($id);
				  // 	});
				  // });
				</script>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">产品摘要：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="g_desc" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="$.Huitextarealength(this,200)"></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">缩略图：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="uploader-thum-container">
					<div id="fileList" class="uploader-list"></div>
					<input  type="file" name="g_pic"><br>
				</div>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button onClick="" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 提交</button>
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</div>

</body>
</html>