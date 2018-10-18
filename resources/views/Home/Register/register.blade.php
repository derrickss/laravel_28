<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<meta charset="utf-8">
<title>WangID通城——个人注册</title>
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/ziy.css">
 <script src="js/jquery-1.11.3.min.js" ></script>
<script src="js/index.js" ></script>
<script type="text/javascript" src="js/jquery1.42.min.js"></script>

<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
 <script type="text/javascript" src="js/jquery.SuperSlide.2.1.1.source.js"></script>

</head>
<body>
<!--dengl-->
<div class="yiny">
	<div class="beij_center">
		<div class="dengl_logo">
			<img src="images/logo_1.png">
			<h1>欢迎注册</h1>
		</div>
	</div>
</div>
<div class="beij_center">
	<div class="ger_zhuc_beij">
		<div class="ger_zhuc_biaot">
			<ul>
				<li class="ger_border_color"><a href="zhuc.html">个人注册</a></li>
				<i>丨</i>
				<li><a href="shenq_ruz.html">申请入驻</a></li>
				<p>我已经注册，现在就<a class="ftx-05 ml10" href="dengl.html">登录</a></p>
			</ul>
		</div>
    <form action="/register" method="post" >
		<div class="zhuc_biaod">
			<div class="reg-items" >
              	<span class="reg-label">
                	<label for="J_Name">用户名：</label>
              	</span>
              	<input   class="i-text" type="text" name="user_name" id="user_name" value="{{old('user_name')}}">
              	<!--备注————display使用 inline-block-->
              	<div class="msg-box">
                	<div class="msg-box" style="display: none;" id="user_notice1">
	                  	<div class="msg-weak" style="display: inline-block;"> <i></i>
	                    	<div class="msg-cont ">4-20个字符，支持汉字、字母、数字及“-”、“_”组合</div>
	                  	</div>
                	</div>
                	<div class="msg-weak err-tips"  style="display: none;" id="user_notice2"><div>请输入用户名</div></div>
                  <div class="msg-weak err-tips"  style="display: none;" id="user_notice3"><div>该用户名已被使用</div></div>
            	</div>
            </div>
            <div class="reg-items" >
                <span class="reg-label">
                  <label for="J_Name">性别`：</label>
                </span>
                <input   class="i-text" type="radio"  name="sex" id="sex" value="0" style="width:20px;margin-left:20px;" checked>女
                <input   class="i-text" type="radio"  name="sex" id="sex" value="1" style="width:20px;margin-left:20px;">男
                <input   class="i-text" type="radio"  name="sex" id="sex" value="2" style="width:20px;margin-left:20px;">其他
                <!--备注————display使用 inline-block-->
                <div class="msg-box">
                  <div class="msg-weak err-tips"  style="display: none;" id="sex-notice"><div>密码不一样</div></div>
              </div>
            </div>
            <div class="reg-items" >
              	<span class="reg-label">
                	<label for="J_Name">设置密码：</label>
              	</span>
              	<input   class="i-text" type="password" name="password" id="password">
              	<!--备注————display使用 inline-block-->
              	<div class="msg-box">
                	<div class="msg-box" style="display: none;">
	                  	<div class="msg-weak" style="display: inline-block;"> <i></i>
	                    	<div class="msg-cont">键盘大写锁定已打开，请注意大小写!</div>
	                  	</div>
                	</div>
                	<div class="msg-weak err-tips"  style="display:none;" id="password-notice"><div>请输入密码</div></div>
                  <div class="msg-weak err-tips"  style="display:none;" id="password-notice1"><div>密码不能为空</div></div>
            	</div>
            </div>
            <div class="reg-items" >
              	<span class="reg-label">
                	<label for="J_Name">确认密码：</label>
              	</span>
              	<input   class="i-text" type="password"  name="repassword" id="repassword">
              	<!--备注————display使用 inline-block-->
              	<div class="msg-box">
                	<div class="msg-weak err-tips"  style="display: none;" id="repassword-notice"><div>密码不一样</div></div>
            	</div>
            </div>
            <div class="reg-items" >
              	<span class="reg-label">
                	<label for="J_Name">手机号码：</label>
              	</span>
              	<input   class="i-text" type="text" name="phone" id="phone" value="{{old('phone')}}">
              	<!--备注————display使用 inline-block-->
              	<div class="msg-box">
                	<div class="msg-weak err-tips"  style="display:none;" id="phone-notice1"><div>手机号不能为空</div></div>
                  <div class="msg-weak err-tips"  style="display:none;" id="phone-notice2"><div>手机号格式有误</div></div>
            	</div>
            </div>
            <div class="reg-items" >
                <span class="reg-label">
                  <label for="J_Name">邮箱：</label>
                </span>
                <input   class="i-text" type="text" name="email" id="email" value="{{old('email')}}">
                <!--备注————display使用 inline-block-->
                <div class="msg-box">
                  <div class="msg-weak err-tips"  style="display:none;" id="email-notice"><div>邮箱不能为空</div></div>
              </div>
            </div>
           <!--  <div class="reg-items" >
              	<span class="reg-label">
                	<label for="J_Name">手机号码：</label>
              	</span>
              	<input   class="i-text i-short" type="text">
              	<div class="check check-border" style="position:relative;left:0">
                   	<a class="check-phone" style="padding:11px 10px 14px 10px;*line-height:60px;">获取短信验证码</a>
                  	<span class="check-phone disable" style="display: none;"><em>60</em>秒后重新获取</span>
                  <a class="check-phone" style="display: none;padding:11px 10px 14px 10px">重新获取验证码</a>
                </div> -->
              	<!--备注————display使用 inline-block-->
              	<!-- <div class="msg-box">
                	<div class="msg-weak err-tips"  style="display:none;"><div>请输入短信验证码</div></div>
            	</div>
            </div> -->
            <div class="reg-items" >
              	<span class="reg-label">
                	<label for="J_Name"> </label>
              	</span>
              	<div class="dag_biaod">
              		<input type="checkbox" value="english" id="checkbox" checked>
              		阅读并同意
              		<a href="#" class="ftx-05 ml10">《wangdi通城用户注册协议》</a>
              		<a href="#" class="ftx-05 ml10">《隐私协议》</a>
              	</div>
            </div>
            <div class="reg-items" >
              	<span class="reg-label">
                	<label for="J_Name"> </label>
              	</span>
              	<input class="reg-btn" value="立即注册" type="submit" id="submit">
            </div>
		</div>
    {{csrf_field()}}
    </form>
        <div class="xiaogg">
            <img src="images/cdsgfd.jpg">
        </div>
	</div>
</div>


<div class="jianj_dib jianj_dib_1">
	<div class="beia_hao">
		<p>京ICP备：14012449号 黔ICP证：B2-20140009号  </p>
		<p class="gonga_bei">京公网安备：11010602030054号</p>
	</div>
</div>

</body>
<script type="text/javascript">
  // 失去焦点进行表单验证

  // 用户名失去焦点
  $('#user_name').blur(function(){
    val=$(this).val();
    //正则
    reg = /^\w{4,20}$/;
    //判断用户名是否为空
    if(val == ''){
     $('#user_notice2').css('display','inline-block');
     a = false;
    }else if(!reg.test(val)){
      //提示验证错误
      $('#user_notice1').css('display','inline-block');
      a = false;
    }else{
       a = true;
    }


    });

     //用户框获取焦点 提示消失
      $(this).focus(function(){
      $('#user_notice2').css('display','none');
      $('#user_notice1').css('display','none');

      });
      //判断用户名是否重复
      $("#user_name").on('input',function(){
     val=$(this).val();
    $.get('/checked_name',{name:val},function(data){
      if(data == 1){
         $('#user_notice3').css('display','inline-block');
         f = false;
      }else{
         $('#user_notice3').css('display','none');
         f=true;
      }
      });
    });

//验证密码是否为空
//失去焦点
$('#password').blur(function(){
val = $(this).val();
if(val == ''){
  $('#password-notice').css('display','inline-block');
   b = false;
}else{
       b = true;
}
//失去焦点,提示消失
$('#password').focus(function(){
$('#password-notice').css('display','none');
$('#password-notice1').css('display','none');
});

});
//判断重复密码与密码是否一致
$('#repassword').blur(function(){
  //确认密码的值 reval
  reval = $(this).val();
  // alert(reval);
  //密码的值 val
  val = $('#password').val();
  if(reval != val){
    $('#repassword-notice').css('display','inline-block');
    c = false;
  }else{
     c = true;
  }
 //失去焦点,提示消失
$('#repassword').focus(function(){
$('#repassword-notice').css('display','none');
$('#repassword-notice').css('display','none');
  });
});

//手机号码验证
$('#phone').blur(function(){
  //手机号码正则
  reg = /^1[34578]\d{9}$/;
  val = $(this).val();
  if(!reg.test(val)){
    // alert(1);
    $('#phone-notice2').css('display','inline-block');
    d = false;
  }else{
     d = true;
  }
  //失去焦点
  $(this).focus(function(){
    $('#phone-notice2').css('display','none');
    $('#phone-notice1').css('display','none');
  });
});

//判断邮箱验证
$('#email').blur(function(){
  if($(this).val() ==''){
    $('#email-notice').css('display','inline-block');
     e = false;
  }else{
     e = true;
  }

   $('#email').focus(function(){
    $('#email-notice').css('display','none');
  });
});


//判断提交按钮
$('#submit').click(function(){
  // alert(1);
  // 用户名不能为空
  if($('#user_name').val() == ''){
    $('#user_notice2').css('display','inline-block');
    return false;
  }
  if($('#password').val() == ''){
    $('#password-notice1').css('display','inline-block');
    return false;
  }
  if($('#repassword').val() == ''){
    $('#repassword-notice').css('display','inline-block');
    return false;
  }
  if($('#phone').val() == ''){
    $('#phone-notice1').css('display','inline-block');
    return false;
  }
  if($('#email').val() == ''){
    $('#email-notice').css('display','inline-block');
    return false;
  }
  if($('#checkbox').prop('checked') != true){
   alert("请勾选'阅读并同意'");
   return false;
  }
  if(a && b && c && d && e &&f){
    alert('注册成功');
  }else{
    return false;
  }
});
</script>
</html>
