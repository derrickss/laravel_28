@extends("Home.HomePublics.public")
@section('content')
<script type="text/javascript">
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
</script>
<!--加入购物车-->
<div class="beij_center">
	<div class="jiar_gouw_c_beij">
		<div class="msg"><i class="c_i_img"></i>商品已成功加入购物车！</div>
		<div class="shangp_jr">
			<div class="jr_zuo">
				<a href="#" class="jr_tu"><img src="images/lieb_tupi1.jpg"></a>
				<div class="jr_biaot">
					<p><a href="#">{{$data['name']}}</a></p>
					<p class="spandf"><span>规格: {{$data['style']}} </span><span>数量：{{$data['num']}}</span></p>
				</div>
			</div>
			<div class="jr_you">
				<a href="shangp_xiangq.html" class="jr_fanh">返回</a>
				<a href="/cart" class="jr_qv_gouw_che">去购物车结算<em class="jr_jiant"></em></a>
			</div>
		</div>
	</div>
</div>

<div>
	<div class="beij_center box_header">
		<h3>购买了该商品的用户还购买了</h3>
	</div>
	<div class="beij_center dgsg">
		<div class="box_body">
			<div class="item fl">
				<div class="box_img"><a href="#"><img src="images/shangq_2.jpg"></a></div>
				<div class="title">
					<a href="#">赛妮美秋冬保暖内衣女薄款高领百搭时尚打底基础无缝美体塑身秋衣8603(精品红)</a>
				</div>
				<div class="price">¥79.00</div>
				<div class="bottom">
					<a href="#" class="btn"><i></i><span>加入购物车</span></a>
				</div>
			</div>
			<div class="item fl">
				<div class="box_img"><a href="#"><img src="images/big_3.jpg"></a></div>
				<div class="title">
					<a href="#">赛妮美秋冬保暖内衣女薄款高领百搭时尚打底基础无缝美体塑身秋衣8603(精品红)</a>
				</div>
				<div class="price">¥79.00</div>
				<div class="bottom">
					<a href="#" class="btn"><i></i><span>加入购物车</span></a>
				</div>
			</div>
			<div class="item fl">
				<div class="box_img"><a href="#"><img src="images/lieb_tupi3.jpg"></a></div>
				<div class="title">
					<a href="#">赛妮美秋冬保暖内衣女薄款高领百搭时尚打底基础无缝美体塑身秋衣8603(精品红)</a>
				</div>
				<div class="price">¥79.00</div>
				<div class="bottom">
					<a href="#" class="btn"><i></i><span>加入购物车</span></a>
				</div>
			</div>
			<div class="item fl">
				<div class="box_img"><a href="#"><img src="images/lieb_tupi1.jpg"></a></div>
				<div class="title">
					<a href="#">赛妮美秋冬保暖内衣女薄款高领百搭时尚打底基础无缝美体塑身秋衣8603(精品红)</a>
				</div>
				<div class="price">¥79.00</div>
				<div class="bottom">
					<a href="#" class="btn"><i></i><span>加入购物车</span></a>
				</div>
			</div>
			<div class="item fl">
				<div class="box_img"><a href="#"><img src="images/lieb_tupi2.jpg"></a></div>
				<div class="title">
					<a href="#">赛妮美秋冬保暖内衣女薄款高领百搭时尚打底基础无缝美体塑身秋衣8603(精品红)</a>
				</div>
				<div class="price">¥79.00</div>
				<div class="bottom">
					<a href="#" class="btn"><i></i><span>加入购物车</span></a>
				</div>
			</div>
			<div class="item fl">
				<div class="box_img"><a href="#"><img src="images/shangq_2.jpg"></a></div>
				<div class="title">
					<a href="#">赛妮美秋冬保暖内衣女薄款高领百搭时尚打底基础无缝美体塑身秋衣8603(精品红)</a>
				</div>
				<div class="price">¥79.00</div>
				<div class="bottom">
					<a href="#" class="btn"><i></i><span>加入购物车</span></a>
				</div>
			</div>
			<div class="item fl">
				<div class="box_img"><a href="#"><img src="images/big_3.jpg"></a></div>
				<div class="title">
					<a href="#">赛妮美秋冬保暖内衣女薄款高领百搭时尚打底基础无缝美体塑身秋衣8603(精品红)</a>
				</div>
				<div class="price">¥79.00</div>
				<div class="bottom">
					<a href="#" class="btn"><i></i><span>加入购物车</span></a>
				</div>
			</div>
			<div class="item fl">
				<div class="box_img"><a href="#"><img src="images/lieb_tupi3.jpg"></a></div>
				<div class="title">
					<a href="#">赛妮美秋冬保暖内衣女薄款高领百搭时尚打底基础无缝美体塑身秋衣8603(精品红)</a>
				</div>
				<div class="price">¥79.00</div>
				<div class="bottom">
					<a href="#" class="btn"><i></i><span>加入购物车</span></a>
				</div>
			</div>
			<div class="item fl">
				<div class="box_img"><a href="#"><img src="images/lieb_tupi1.jpg"></a></div>
				<div class="title">
					<a href="#">赛妮美秋冬保暖内衣女薄款高领百搭时尚打底基础无缝美体塑身秋衣8603(精品红)</a>
				</div>
				<div class="price">¥79.00</div>
				<div class="bottom">
					<a href="#" class="btn"><i></i><span>加入购物车</span></a>
				</div>
			</div>
			<div class="item fl">
				<div class="box_img"><a href="#"><img src="images/lieb_tupi2.jpg"></a></div>
				<div class="title">
					<a href="#">赛妮美秋冬保暖内衣女薄款高领百搭时尚打底基础无缝美体塑身秋衣8603(精品红)</a>
				</div>
				<div class="price">¥79.00</div>
				<div class="bottom">
					<a href="#" class="btn"><i></i><span>加入购物车</span></a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section("title",'WangID通城——商品详情')