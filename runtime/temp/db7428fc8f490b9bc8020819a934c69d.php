<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:60:"G:\xampp\htdocs\car\public/../app/index\view\news\index.html";i:1539864898;s:53:"G:\xampp\htdocs\car\app\index\view\public\header.html";i:1539843130;s:53:"G:\xampp\htdocs\car\app\index\view\public\footer.html";i:1539694062;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
	</head>
	<link rel="stylesheet" href="/static/css/style.css" />
	<link rel="stylesheet" href="/static/css/other.css" />
	<script src="/static/js/jquery-1.11.0.min.js"></script>
	<script src="/static/js/common.js" type="text/javascript" charset="utf-8"></script>
	<style>

	</style>
	
	<body>
	<div class="header"><div class="site_nav">
	<div class="site_nav_bd">
		<div class="fleft">你好，欢迎来到管家车易站！
			欢迎用户<?php if(empty(\think\Session::get('phone')) || ((\think\Session::get('phone') instanceof \think\Collection || \think\Session::get('phone') instanceof \think\Paginator ) && \think\Session::get('phone')->isEmpty())): ?>
			<a href="<?php echo url('index/logincar'); ?>" class="coloryel">【登录】</a>,免费<a href="<?php echo url('index/logincar'); ?>" class="coloryel">【注册】</a>
			<?php else: ?>
			<?php echo \think\Session::get('phone'); endif; ?></div>
		<div class="fright">
			<ul class="site_nav_menu">
				<li><a href=""><img src="img/shouye.png" alt="" />首页</a></li>
				<li class="sec_li"><a href=""><img src="img/maic.png" alt="" />我要买车</a></li>
				<li><a href=""><img src="img/maic.png" alt="" />我要卖车</a></li>
				<li><a href=""><img src="img/xiazai.png" alt="" />APP下载</a></li>
				<li><a href=""><img src="img/wangahn.png" alt="" />网站导航</a></li>
			</ul>					
		</div>
	</div>
</div>
<div class="fn_show gj_clear header_show">
	<div class="wrap gj_clear marginbt">
		<div class="logo">
	 		  <h1> <a href="http://www.gj2car.com">二手车交易市场</a></h1>
		</div>
		<div class="city_current">
			<div class="address"><span>郑州</span><b class="icon1"></b></div>
			<div class="white-line"></div>
			<div class="city"  style="display: none;" >
				<ol>
				</ol>
			</div>
		</div>
		<div class="search gj_clear">
	        <div class="search_tab">
	            <a href="javascript:;" class="s_old active" id="">二手车</a>
	            <a href="javascript:;" class="s_new">新车</a>
	            <a href="javascript:;" class="s_zero">零首付</a>
	        </div>
	        <div class="ipt_cont">
	        	  <div class="search_ipts">
		        	 <input type="text"  name="txtNewcar" autocomplete="off" placeholder="请输入喜欢的品牌或车型" />
		        	 <a class="search_btn">搜索</a>
		        </div>
		       	<div class="fn_hide search_ipts">
		        	 <input type="text"  name="txtNewcar" autocomplete="off" placeholder="请输入喜欢的品牌或车型" />
		        	 <a class="search_btn">搜索</a>
		        </div>
		      	<div class="fn_hide search_ipts">
		      	  	 <input type="text"  name="txtzerocar" autocomplete="off" placeholder="请输入喜欢的品牌或车型" />
		        	 <a class="search_btn" >搜索</a>
		        </div>
	       
	        </div>
	       <!-- 搜索历史记录 -->
	        <div id="history_list" class="search_list" style="display:none;"></div>
	    </div>
	</div>
	<div class="nav gj_clear">
		<ul class="wrap">
			<li class="active"><a href="index.html">首页</a></li>
			<li ><a href="<?php echo url('newcar/index'); ?>" class="sec_li">新车</a></li>
			<li><a href="<?php echo url('twocar/index'); ?>">二手车</a></li>
		    <!--<li><a href="zeroCar.html">零首付</a></li>-->
			<li><a href="<?php echo url('index/sell'); ?>">卖车</a></li>
			<li><a href="<?php echo url('change/index'); ?>">置换</a></li>
			<li><a href="<?php echo url('news/index'); ?>">新闻资讯</a></li>
			<li><a href="<?php echo url('index/appdownload'); ?>">APP下载</a></li>
			<li><a href="<?php echo url('user/car_login'); ?>">登录/注册</a></li>
			<li><a href="<?php echo url('index/join_us'); ?>">关于我们</a></li>
			<li><a href="<?php echo url('shop/index'); ?>">优选商家</a></li>
		</ul>
	</div>
</div>
<div class="fn_hide gj_clear header_hide borbt">
	<div class="wrap" >
		<div class="logo" >
		   <h1 style=""> 
		   <a href="http://www.gj2car.com">二手车交易市场</a>
		   </h1>
		</div>
		<div class="city_current">
			<div class="address"><span>郑州</span><b class="icon1"></b></div>
			<div class="white-line"></div>
			<div class="city"  style="display: none;" >
				<ol>
				</ol>
			</div>
		</div>
		<div class="header_tel">
			<img src="img/phone1.png" alt="" height="17"/>
			0371-53375515
		</div>
		<div class="nav">
			<ul>
				<li class="active"><a href="index.html">首页</a></li>
				<li><a href="carList.html">二手车</a></li>
				<li><a href="newCar.html">新车</a></li>
				<!--<li><a href="zeroCar.html">零首付</a></li>-->
				<li><a href="sell.html">卖车</a></li>
				<li><a href="change.html">置换</a></li>
				<li><a href="News.html">新闻资讯</a></li>
				<li><a href="appDownLoad.html">APP下载</a></li>
				<li><a href="appDownLoad.html">登录/注册</a></li>
			</ul>
		</div>
	</div>
	</div>
<script>
	
	function tab(a,b,c){
	    $(a).on("click",c,function(){
	        $(this).addClass('active').siblings().removeClass('active');
	        $(b).eq($(this).index()).show().siblings().hide();
	    })
	}
//	$('.wrap li').click(function(){
//		
//		$(this).addClass('active').siblings().removeClass('active')
//	})
tab(".search_tab",".ipt_cont .search_ipts","a");
$(window).on('scroll',function(){
	var bH=$("body").outerHeight();
	var wH=$(window).innerHeight();
	
	var wsH=$(window).scrollTop();  
	var sH=$(".header .fn_show").height();
//	console.log(bH+'页面高度---页面可用高度'+wH+'-----滚动高度'+wsH+'-----页面头部高度'+sH)
//	console.log(bH-wH)
	if(wsH+50>sH){
		$(".header .header_hide").css('display','block');
		$(".header .header_show").css('display','none');
		$(".header").addClass('fixedTop')
	}else{
		$(".header .header_hide").css('display','none');
		$(".header .header_show").css('display','block');
		$(".header").removeClass('fixedTop')
	}
	
})

</script>
</div>
        <div class="full_wid">
			<div class="header"></div>			
			<div class="news_bg"></div>
			<div class="wrap oh">
				<div class="breadnav">您的位置：<a href="#">郑州二手交易市场</a>>><a href="#">二手车新闻资讯 </a></div>
				<ul class="news_tab_nav">
					<li class="active"><a href="javascript:;" onclick="set('bd0',1,5)" id="bd01">公司新闻</a></li>
					<li><a href="javascript:;" onclick="set('bd0',2,5)" id="bd02">行业新闻</a></li>
					<li><a href="javascript:;" onclick="set('bd0',3,5)" id="bd03">媒体报道</a></li>
					<li><a href="javascript:;" onclick="set('bd0',4,5)" id="bd04">特色活动</a></li>
					<li><a href="javascript:;" onclick="set('bd0',5,5)" id="bd05">新车资讯</a></li>
				</ul>
				<div class="news_conlist">
					<ul id="conbd01">
						<li><a href="">
							<span class="news_listImg"><img src="/static/img/gds1.png" alt="" title="" height="167"/></span>
							<div class="news_text_desc ">
								<h2 class="hid">10万以上入手的郑州二手宝马3系 告诉你什么叫诠释低调的奢华</h2>
								<p>(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车能比的了(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车能比的的其次这款宝马...</p>
								<p class="time">2018/6/30</p>
							</div>
						</a></li>
						<li><a href="">
							<span class="news_listImg"><img src="/static/img/gds1.png" alt="" title="" height="167"/></span>
							<div class="news_text_desc ">
								<h2 class="hid">10万以上入手的郑州二手宝马3系 告诉你什么叫诠释低调的奢华</h2>
								<p>(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车能比的了(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车能比的的其次这款宝马...</p>
								<p class="time">2018/6/30</p>
							</div>
						</a></li>
						<li><a href="">
							<span class="news_listImg"><img src="/static/img/gds1.png" alt="" title="" height="167"/></span>
							<div class="news_text_desc ">
								<h2 class="hid">10万以上入手的郑州二手宝马3系 告诉你什么叫诠释低调的奢华</h2>
								<p>(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车能比的了(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车能比的的其次这款宝马...</p>
								<p class="time">2018/6/30</p>
							</div>
						</a></li>
						<li><a href="">
							<span class="news_listImg"><img src="/static/img/gds1.png" alt="" title="" height="167"/></span>
							<div class="news_text_desc ">
								<h2 class="hid">10万以上入手的郑州二手宝马3系 告诉你什么叫诠释低调的奢华</h2>
								<p>(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车能比的了(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车能比的的其次这款宝马...</p>
								<p class="time">2018/6/30</p>
							</div>
						</a></li>
					</ul>
					<ul id="conbd02" style="display: none;">
						<li><a href="">
							<span class="news_listImg"><img src="/static/img/gds1.png" alt="" title="" height="167"/></span>
							<div class="news_text_desc ">
								<h2 class="hid">210万以上入手的郑州二手宝马3系 告诉你什么叫诠释低调的奢华</h2>
								<p>(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车能比的了(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车能比的的其次这款宝马...</p>
								<p class="time">2018/6/30</p>
							</div>
						</a></li>
						<li><a href="">
							<span class="news_listImg"><img src="/static/img/gds1.png" alt="" title="" height="167"/></span>
							<div class="news_text_desc ">
								<h2 class="hid">10万以上入手的郑州二手宝马3系 告诉你什么叫诠释低调的奢华</h2>
								<p>(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车能比的了(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车能比的的其次这款宝马...</p>
								<p class="time">2018/6/30</p>
							</div>
						</a></li>
						<li><a href="">
							<span class="news_listImg"><img src="/static/img/gds1.png" alt="" title="" height="167"/></span>
							<div class="news_text_desc ">
								<h2 class="hid">10万以上入手的郑州二手宝马3系 告诉你什么叫诠释低调的奢华</h2>
								<p>(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车能比的了(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车能比的的其次这款宝马...</p>
								<p class="time">2018/6/30</p>
							</div>
						</a></li>
						<li><a href="">
							<span class="news_listImg"><img src="/static/img/gds1.png" alt="" title="" height="167"/></span>
							<div class="news_text_desc ">
								<h2 class="hid">10万以上入手的郑州二手宝马3系 告诉你什么叫诠释低调的奢华</h2>
								<p>(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车能比的了(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车能比的的其次这款宝马...</p>
								<p class="time">2018/6/30</p>
							</div>
						</a></li>
					</ul>
					<ul id="conbd03" style="display: none;">
						<li><a href="">
							<span class="news_listImg"><img src="/static/img/gds1.png" alt="" title="" height="167"/></span>
							<div class="news_text_desc ">
								<h2 class="hid">10万以上入手的郑州二手宝马3系 告诉你什么叫诠释低调的奢华</h2>
								<p>(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车能比的了(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车能比的的其次这款宝马...</p>
								<p class="time">2018/6/30</p>
							</div>
						</a></li>
						<li><a href="">
							<span class="news_listImg"><img src="/static/img/gds1.png" alt="" title="" height="167"/></span>
							<div class="news_text_desc ">
								<h2 class="hid">310万以上入手的郑州二手宝马3系 告诉你什么叫诠释低调的奢华</h2>
								<p>(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车能比的了(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车能比的的其次这款宝马...</p>
								<p class="time">2018/6/30</p>
							</div>
						</a></li>
						<li><a href="">
							<span class="news_listImg"><img src="/static/img/gds1.png" alt="" title="" height="167"/></span>
							<div class="news_text_desc ">
								<h2 class="hid">10万以上入手的郑州二手宝马3系 告诉你什么叫诠释低调的奢华</h2>
								<p>(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车能比的了(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车能比的的其次这款宝马...</p>
								<p class="time">2018/6/30</p>
							</div>
						</a></li>
						<li><a href="">
							<span class="news_listImg"><img src="/static/img/gds1.png" alt="" title="" height="167"/></span>
							<div class="news_text_desc ">
								<h2 class="hid">10万以上入手的郑州二手宝马3系 告诉你什么叫诠释低调的奢华</h2>
								<p>(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车能比的了(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车能比的的其次这款宝马...</p>
								<p class="time">2018/6/30</p>
							</div>
						</a></li>
					</ul>
					<ul id="conbd04" style="display: none;">
						<li><a href="">
							<span class="news_listImg"><img src="/static/img/gds1.png" alt="" title="" height="167"/></span>
							<div class="news_text_desc ">
								<h2 class="hid">410万以上入手的郑州二手宝马3系 告诉你什么叫诠释低调的奢华</h2>
								<p>(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车能比的了(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车能比的的其次这款宝马...</p>
								<p class="time">2018/6/30</p>
							</div>
						</a></li>
						<li><a href="">
							<span class="news_listImg"><img src="/static/img/gds1.png" alt="" title="" height="167"/></span>
							<div class="news_text_desc ">
								<h2 class="hid">10万以上入手的郑州二手宝马3系 告诉你什么叫诠释低调的奢华</h2>
								<p>(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车能比的了(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车能比的的其次这款宝马...</p>
								<p class="time">2018/6/30</p>
							</div>
						</a></li>
						<li><a href="">
							<span class="news_listImg"><img src="/static/img/gds1.png" alt="" title="" height="167"/></span>
							<div class="news_text_desc ">
								<h2 class="hid">10万以上入手的郑州二手宝马3系 告诉你什么叫诠释低调的奢华</h2>
								<p>(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车能比的了(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车能比的的其次这款宝马...</p>
								<p class="time">2018/6/30</p>
							</div>
						</a></li>
						<li><a href="">
							<span class="news_listImg"><img src="/static/img/gds1.png" alt="" title="" height="167"/></span>
							<div class="news_text_desc ">
								<h2 class="hid">10万以上入手的郑州二手宝马3系 告诉你什么叫诠释低调的奢华</h2>
								<p>(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车能比的了(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车能比的的其次这款宝马...</p>
								<p class="time">2018/6/30</p>
							</div>
						</a></li>
					</ul>
					<ul id="conbd05" style="display: none;">
						<li><a href="">
							<span class="news_listImg"><img src="/static/img/gds1.png" alt="" title="" height="167"/></span>
							<div class="news_text_desc ">
								<h2 class="hid">510万以上入手的郑州二手宝马3系 告诉你什么叫诠释低调的奢华</h2>
								<p>(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车能比的了(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车能比的的其次这款宝马...</p>
								<p class="time">2018/6/30</p>
							</div>
						</a></li>
						<li><a href="">
							<span class="news_listImg"><img src="/static/img/gds1.png" alt="" title="" height="167"/></span>
							<div class="news_text_desc ">
								<h2 class="hid">10万以上入手的郑州二手宝马3系 告诉你什么叫诠释低调的奢华</h2>
								<p>(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车能比的了(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车能比的的其次这款宝马...</p>
								<p class="time">2018/6/30</p>
							</div>
						</a></li>
						<li><a href="">
							<span class="news_listImg"><img src="/static/img/gds1.png" alt="" title="" height="167"/></span>
							<div class="news_text_desc ">
								<h2 class="hid">10万以上入手的郑州二手宝马3系 告诉你什么叫诠释低调的奢华</h2>
								<p>(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车能比的了(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车能比的的其次这款宝马...</p>
								<p class="time">2018/6/30</p>
							</div>
						</a></li>
						<li><a href="">
							<span class="news_listImg"><img src="/static/img/gds1.png" alt="" title="" height="167"/></span>
							<div class="news_text_desc ">
								<h2 class="hid">10万以上入手的郑州二手宝马3系 告诉你什么叫诠释低调的奢华</h2>
								<p>(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车整车颜值不是一般国产车能比的了(管家车易站 选车导购) 很多人都说，二手宝马3系是进口双门轿跑版，整车颜值不是一般国产车能比的的其次这款宝马...</p>
								<p class="time">2018/6/30</p>
							</div>
						</a></li>
					</ul>
				</div>
				
			</div>
			<div class="wrap news_car_recom">
				<div class="tit_er">
			        <div class="line_tit"></div>			        
			        <h2 class="color tit_con">热门二手车</h2>	       
			    </div>
			    <div class="car_list marbtp10 ">
				    <ul class="list">
						<?php if(is_array($er_car) || $er_car instanceof \think\Collection || $er_car instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($er_car) ? array_slice($er_car,1,10, true) : $er_car->slice(1,10, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
						<li class="items5">
							<a href="<?php echo url('index/details'); ?>?cheid=<?php echo $val['pu_id']; ?>" class="car_img flex_center"><img src="<?php echo $val['img_url']; ?>" alt="" /></a>
							<a href="<?php echo url('index/details'); ?>?cheid=<?php echo $val['pu_id']; ?>" class="car_desc">
								<h3><?php echo $val['name']; ?></h3>
								<p><span class="car_price"><b><?php echo $val['new_car_price']; ?></b>万</span><span class="car_sui">新车含税<?php echo $val['price']; ?>万</span></p>
								<p><span><?php echo $val['car_cardtime']; ?>上牌</span> <span class="padlt20"><?php echo $val['car_mileage']; ?>万公里</span> </p>
								<div class="che_ordered">立即预约</div>
							</a>
						</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>

					</ul>
			    </div>
			    <div class="tit_er">
			        <div class="line_tit"></div>			        
			        <h2 class="color tit_con">热门新车</h2>	       
			    </div>
			    <div class="car_list marbtp10 ">
				   <ul class="list">
					   <?php if(is_array($new_car) || $new_car instanceof \think\Collection || $new_car instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($new_car) ? array_slice($new_car,1,10, true) : $new_car->slice(1,10, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
						<li class="items5">
							<a href="zeroCar.html" class="flex_around" target="_blank">
							<a href="" class="car_img flex_center"><img src="<?php echo $val['img_url']; ?>" alt="" /></a>
							<a href="" class="car_desc">
								<h3><?php echo $val['name']; ?></h3>
								<p class="valign ptp15">
									<span class="pay_first plt10">首付<b class=""><?php echo $val['pay10_s2']; ?></b>万</span>
									<span class="pay_month">月供<?php echo $val['pay10_y2']; ?>元</span>
									<span class="pay_month">月供<?php echo $val['pay10_n2']; ?>元</span>
								</p>
								<div class="che_ordered">立即预约</div>
							</a>

							</a>
						</li>
					   <?php endforeach; endif; else: echo "" ;endif; ?>
						
					</ul>
			    </div>
			</div>
		</div>
		<div class="footer mtp40">	
			
		</div>
		<div class="fixedRight">
			<ul class="right_sider">
				<li><div class="gj_side_contnet iocn_s1"><p>pk</p></div>
					<div class="gj_sidecon_desc "></div>
				</li>
				<li><div class="gj_side_contnet iocn_s2"><p>收藏</p></div>
					<div class="gj_sidecon_desc"></div>
				</li>
				<li><div class="gj_side_contnet iocn_s3"><p>浏览</p></div>
					<div class="gj_sidecon_desc"></div>
				</li>
				<li><div class="gj_side_contnet iocn_s4"><p>个人</p></div>
					<div class="gj_sidecon_desc"></div>
				</li>
				<li><div class="gj_side_contnet iocn_s5"><p>公众号</p></div>
					<div class="gj_sidecon_desc"></div>
				</li>
				<li><div class="gj_side_contnet iocn_s6"><p>APP下载</p></div>
					<div class="gj_sidecon_desc"></div>
				</li>
				<li><div class="gj_side_contnet iocn_s7"><p>客服</p></div>
				<div class="gj_sidecon_desc"></div></li>
				<li><div class="gj_side_contnet iocn_s8"><p>反馈</p></div>
				<div class="gj_sidecon_desc"></div></li>
				<li><div class="gj_side_contnet iocn_s9"><p>顶部</p></div>
					<div class="gj_sidecon_desc"></div>
				</li>
				
			</ul>
		</div>
		<div class="footer">
			
	<div class="wrap">
		<div class="company_info gj_clear">
			<div class="footer_logo"><img src="img/1024.png" alt="" width="80"/><p>管家车易站</p></div>
			<div class="basic_info">
				<div>
					<a href="<?php echo url('index/join_us'); ?>">关于我们</a>
					<a href="<?php echo url('index/link_us'); ?>">联系我们</a>
					<a href="<?php echo url('index/service'); ?>">服务保障</a>
					<a href="<?php echo url('index/website'); ?>">网站地图</a>
				</div>
				<p>
					版权所有：河南管家车销售有限公司 <br /> 
				 工信备案：豫ICP备17046554号 <br /> 
				  CopyRight © 2015-2018 ww
				</p>
			</div>
			<div class="QRcode"><img src="img/ewmdown.png" alt="" width="86"/><p>下载APP</p></div>
			<div class="QRcode"><img src="img/ewm_guanzhu.png" alt="" width="86"/><p>关注公众号</p></div>
			<div class="contact_way">
				<p>免费咨询、建议、投诉 <br />
				卖车热线（投诉建议）：<b>0371-53375515</b> <br />
				 每天9：00-21：00(法定节假日除外)
				</p>		
			</div>
		</div>	
		<div class="optimize_link">
			<p class="link_tit">热门品牌：</p>
			<span class="more_dwon"></span>
			<?php if(is_array($brand) || $brand instanceof \think\Collection || $brand instanceof \think\Paginator): $i = 0; $__LIST__ = $brand;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
			<a href=""><?php echo $vol['name']; ?></a>
			<?php endforeach; endif; else: echo "" ;endif; ?>

		</div>
		<div class="optimize_link">
			<p class="link_tit ">热门车系123：</p>
			<span class="more_dwon"></span>
			<a href="">大众</a>
			<a href="">大众</a>

		</div>
		<div class="optimize_link gj_clear">
			<p class="link_tit">友情链接123：</p>
			<span class="more_dwon"></span>
			<a href="">大众</a>



		</div>
	</div>
<script>
	$(".more_dwon").click(function(){
		$(this).parents(".optimize_link").addClass("link_active")
	})
</script>
		</div>
	</body>
	<script>		 
		$(function(){			
			// $(".header").load("templates/header.html");
		    // $(".footer").load("templates/footer.html");
		    $(".news_tab_nav li").click(function(){
		   	   $(this).addClass('active').siblings('li').removeClass('active')
		    })
		})
</script>
</html>
