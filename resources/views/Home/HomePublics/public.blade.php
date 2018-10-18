<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<link rel="stylesheet" type="text/css" href="/css/index.css">
<link rel="stylesheet" type="text/css" href="/css/ziy.css">
<!--  <script src="/js/jquery-1.11.3.min.js" ></script>
<script src="/js/index.js" ></script>  -->
<!-- <script type="text/javascript" src="/js/jquery1.42.min.js"></script> -->

<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<!-- <script type="text/javascript" src="/js/jquery.SuperSlide.2.1.1.source.js"></script> -->
<script type="text/javascript" src="/js/chengs/jquery.js"></script>
<script type="text/javascript" src="/js/chengs/bootstrap.js"></script>
<script type="text/javascript" src="/js/chengs/city-picker.data.js"></script>
<script type="text/javascript" src="/js/chengs/city-picker.js"></script>
<script type="text/javascript" src="/js/chengs/main.js"></script>
</head>
<body>
<!--侧边-->
<div class="jdm-toolbar-wrap J-wrap">
	<div class="jdm-toolbar J-toolbar">
		<div class="jdm-toolbar-panels J-panel"></div>
		<div class="jdm-toolbar-tabs J-tab">
			<div data-type="bar" class="J-trigger jdm-toolbar-tab jdm-tbar-tab-ger">
				<i class="tab-ico"></i>
				<em class="tab-text">购物车</em>
			</div>
			<div data-type="bar" class="J-trigger jdm-toolbar-tab jdm-tbar-tab-cart">
				<i class="tab-ico"></i>
				<em class="tab-text">购物车</em>
			</div>
			<div data-type="bar" clstag="h|keycount|cebianlan_h_follow|btn" class="J-trigger jdm-toolbar-tab jdm-tbar-tab-follow" data-name="follow" data-login="true">
				<i class="tab-ico"></i>
				<em class="tab-text">我的关注</em>
			</div>
		</div>
		<div class="J-trigger jdm-toolbar-tab jdm-tbar-tab-message" data-name="message"><a target="_blank" href="/#">
			<i class="tab-ico"></i>
			<em class="tab-text">我的消息
			</em></a>
		</div>
	</div>
	<div class="jdm-toolbar-footer">
		<div data-type="link" id="#top" class="J-trigger jdm-toolbar-tab jdm-tbar-tab-top">
			<a href="/#" clstag="h|keycount|cebianlan_h|top">
				<i class="tab-ico"></i>
				<em class="tab-text">顶部</em>
			</a>
		</div>
	</div>
	<div class="jdm-toolbar-mini"></div>
	<div id="J-toolbar-load-hook" clstag="h|keycount|cebianlan_h|load"></div>
</div>


<!--头部-->
<div id="header">
	<div class="header-box">
		<h3 class="huany">WangID本地购物商城欢迎您的到来！</h3>
		<ul class="header-left">
			<li class="bj">
				<a class="dib" href="/#">贵阳市</a>
				<i class="ci-leftll">
					<s class="jt">◇</s>
				</i>
				<div class="bj-1">
					<h3>热门城市：</h3>
					<a href="/">北京</a><a href="/">上海</a><a href="/">天津</a><a href="/">重庆</a><a href="/">河北</a><a href="/">山西</a><a href="/">河南</a><a href="/">辽宁</a><a href="/">吉林</a><a href="/">黑龙江</a><a href="/">浙江</a><a href="/">江苏</a><a href="/">山东</a><a href="/">安徽</a><a href="/">内蒙古</a><a href="/">湖北</a><a href="/">湖南</a><a href="/">广东</a><a href="/">广西</a><a href="/">江西</a><a href="/">四川</a><a href="/">海南</a><a href="/">贵州</a><a href="/">云南</a><a href="/">西藏</a><a href="/">陕西</a><a href="/">甘肃</a><a href="/">青海</a><a href="/">宁夏</a><a href="/">新疆</a><a href="/">台湾</a><a href="/">香港</a><a href="/">澳门</a><a href="/">海外</a><a href="/qieh_cs.html">全部+</a>
				</div>
			</li>
		</ul>
		<ul class="header-right">
			<li class="denglu">Hi~
				@if(session('user_name'))
				{{session('user_name')}}
				<a class="red" href="/login">退出</a>
				@else
				<a class="red" href="/login/create">请登录!</a>
				<a href="/register">[免费注册]</a></li>
				@endif
			<li class="shu"></li>
			<li class="denglu"><a class="ing_ps" href="/#">我的收藏</a></li>
			<li class="shu"></li>
			<li class="denglu"><a class="ing_ps ps1" href="/#">申请入驻</a></li>
			<li class="shu"></li>
			<li class="denglu"><a class="ing_ps ps2" href="/#">客户服务</a></li>
			<li class="shu"></li>
			<li class="shouji bj">
				<a class="ing_ps ps3" href="/#">手机通城</a>
				<i class="ci-right ">
					<s class="jt">◇</s>
				</i>
				<div class="shouji1">
					<img src="/images/mb_wangid.png" class="shouji4">
					<div class="shouji2">
						<p>通城客户端</p>
						<p class="red">首次下单满79元，送79元</p>
					</div>
					<div class="yi">
						<img src="/images/mb_wangid.png" class="shouji4">
						<div class="er">
							<p>通城微信公众号</p>
							<p class="red">关注通城公众号的积分，换大礼</p>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</div>
<!--搜索栏-->
<div class="toub_beij">
	<div class="logo"><a href="/"><img src="/./images/logo.png"></a></div>
	<div class="search">
		<input type="text" value="家电一折抢" class="text" id="textt">
		<button class="button">搜索</button>
	</div>
	<div class="right">
		<i class="gw-left"></i>
		<i class="gw-right"></i>
		<div class="sc">
			<i class="gw-count">0</i>
			<i class="sd"></i>
		</div>
		<a href="/gouw_che.html">我的购物车</a>
		<div class="dorpdown-layer">
			<ul>
				<li class="meiyou">
					<img src="/./images/settleup-nogoods.png">
					<span>购物车中还没有商品，赶紧选购吧！</span>
				</li>
			</ul>
		</div>
	</div>
	<div class="hotwords">
		<a class="biaoti">热门搜索：</a>
		<a href="/#">新款连衣裙</a>
		<a href="/#">四件套</a>
		<a href="/#">潮流T恤</a>
		<a href="/#">时尚女鞋</a>
		<a href="/#">乐1</a>
		<a href="/#">特步女鞋</a>
		<a href="/#">威士忌</a>
	</div>
</div>


<!--轮播图上方导航栏  一栏-->
<div id="navv" class="navv_ziy">
	<div class="focus">
		<div class="focus-a">
			<div class="fouc-font fouc_font_ziy">
				<a href="/#">全部商品分类</a>
			</div>
		</div>
		<div class="focus-b">
			<ul>
				<li><a href="/#">商城首页</a></li>
				<li><a href="/#">本地生活</a></li>
				<li><a href="/#">团购专区</a></li>
				<li><a href="/#">积分商城 </a></li>
				<li><a href="/#">分销系统</a></li>
				<li><a href="/#">办公耗材</a></li>
				<li><a href="/#">饰品礼品</a></li>
				<li><a href="/#">休闲娱乐</a></li>
			</ul>
		</div>

		<!--左边导航-->
	<script type="text/javascript">
		window.onload=function()
		{
			var aid=document.getElementById('id_a');
			var odiv=document.getElementById('h2_d');
			var bdiv=document.getElementById('proinfo');
			aid.onmouseover=function()
			{

				bdiv.style.display='block';
			};
			aid.onmouseout=function()
			{
				bdiv.style.display='none';
			};

		};
	</script>
		<div class="subpage" id="id_a">
		<h2 id="h2_d" ></h2>
		<div class="prosul dd-inner dd_inner_ziy" id="proinfo">
			<!-- 开始遍历导航 -->
			<!-- 一级导航 -->
			@foreach($cate as $value)
			<div class="font-item">
				<div class="item fore1">
					<h3>
						<a class="da_zhu" href="/goodlist/{{$value->id}}">{{$value->name}}</a>
						<p>
							<!-- 二级导航 -->
							@foreach($value->dev as $val)
							<a href="/goodlist/{{$val->id}}">{{$val->name}}</a>
							@endforeach
						</p>
					</h3>
					<i>></i>
				</div>
				<div class="font-item1">
					<div class="font-lefty">
						<!-- 遍历导航右侧二级导航 -->
						@foreach($value->dev as $val)
						<dl class="fore1">
							<dt style="width:90px;"><a href="/goodlist/{{$val->id}}" style="font-size:15px;text-align:left;">{{$val->name}}<i style="position: absolute;top: 11px;left:110px;">></i></a></dt>
							<dd>
								<!-- 遍历三级分类 -->
								@foreach($val->dev as $v)
								<a href="/goodlist/{{$v->id}}" style="font-size:15px;">{{$v->name}}</a>
								@endforeach
							</dd>
						</dl>
						@endforeach
					</div>
					<div class="font-right">
						<div>
							<a href="/#">
								<img src="/./images/562f4971Na5379aba.jpg">
							</a>
							<a href="/#">
								<img src="/./images/54d9eef9N5bb8d27f.jpg">
							</a>
							<a href="/#">
								<img src="/./images/54d9ef02N99d26435.jpg">
							</a>
							<a href="/#">
								<img src="/./images/54d9ef10Nd206a236.jpg">
							</a>
							<a href="/#">
								<img src="/./images/54d9ef28N00328d44.jpg">
							</a>
							<a href="/#">
								<img src="/./images/54d9ef34N7cc61f4c.jpg">
							</a>
							<a href="/#">
								<img src="/./images/54d9ef3eN99aef1f0.jpg">
							</a>
							<a href="/#">
								<img src="/./images/54d9ef4cN4fe57f9b.jpg">
							</a>
						</div>
					</div>
					<div class="font-righty">
						<a href="/#">
							<img src="/./images/5673a854N10856704.jpg">
						</a>
						<a href="/#">
							<img src="/./images/56a0376aN7de1bdcf.jpg">
						</a>
					</div>
				</div>
			</div>
			@endforeach
			<!---->
		</div>
		</div>
		<!--左边导航结束-->
	</div>
</div>
@section('content')
@show
<!--  <script type="text/javascript">
	(function(){
		var $subblock = $(".subpage"), $head=$subblock.find('h2'), $ul = $("#proinfo"), $lis = $ul.find("li"), inter=false;
		$head.mouseover(function(e){
			e.stopPropagation();
			if(!inter){
				$ul.show();
			}else{
				$ul.hide();
			}
			inter=!inter;
		});

		$ul.mouseover(function(event){
			event.stopPropagation();
		});

		$(document).mouseover(function(){
			$ul.hide();
			inter=!inter;
		});
	})();
</script> -->
<!--列表一开了-->


<!--底部-->
<div class="dib_beij">
	<div class="dib_jvz_beij">
		<div class="shangp_baoz">
			<p>本地购物&nbsp;&nbsp;看得见的商品</p>
			<p class="beng1">正品行货&nbsp;&nbsp;购物无忧</p>
			<p class="beng2">低价实惠&nbsp;&nbsp;帮你省钱</p>
			<p class="beng3">本地直发&nbsp;&nbsp;专业配送</p>
		</div>
		<div class="zhongj_youx">
			<div class="lieb_daoh">
				<h4>物流配送</h4>
				<ul>
					<li><a href="/#">配送查询</a></li>
					<li><a href="/#">配送服务</a></li>
					<li><a href="/#">配送费用</a></li>
					<li><a href="/#">配送时效</a></li>
					<li><a href="/#">签收与验货</a></li>
				</ul>
			</div>
			<div class="lieb_daoh">
				<h4>支付与账户</h4>
				<ul>
					<li><a href="/#">货到付款</a></li>
					<li><a href="/#">在线支付</a></li>
					<li><a href="/#">门店支付</a></li>
					<li><a href="/zhangh_anq.html">账户安全</a></li>
				</ul>
			</div>
			<div class="lieb_daoh">
				<h4>购物帮助</h4>
				<ul>
					<li><a href="/#">购物保障</a></li>
					<li><a href="/#">购物流程</a></li>
					<li><a href="/#">焦点问题</a></li>
					<li><a href="/#">联系我们</a></li>
				</ul>
			</div>
			<div class="lieb_daoh">
				<h4>售后服务</h4>
				<ul>
					<li><a href="/#">退换货服务</a></li>
					<li><a href="/#">退款说明</a></li>
					<li><a href="/#">专业维修</a></li>
					<li><a href="/#">延保服务</a></li>
					<li><a href="/#">家电回收</a></li>
				</ul>
			</div>
			<div class="lieb_daoh">
				<div class="kef_dianh">
					<p>客服电话</p><span>400-6677-937</span>
				</div>
				<div class="kef_dianh kef_dianh_youx">
					<p>意见收集邮箱</p><p>Ask@wangid.com</p>
				</div>
			</div>
			<div class="lieb_daoh lieb_daoh_you">
				<div class="erw_ma_beij">
					<div class="erw_m">
						<h1><img src="/images/mb_wangid.png"></h1>
						<span>扫码下载通城客户端</span>
					</div>
					<div class="erw_m">
						<h1><img src="/images/mb_wangid.png"></h1>
						<span>扫码下载通城客户端</span>
					</div>
				</div>
			</div>
		</div>
		<div class="beia_hao">
			<p>京ICP备：14012449号 黔ICP证：B2-20140009号  </p>
			<p class="gonga_bei">京公网安备：11010602030054号</p>
			<div class="renz_">
				<span></span>
				<span class="span1"></span>
				<span class="span2"></span>
				<span class="span3"></span>
			</div>
		</div>
	</div>
</div>



</body>
</html>

