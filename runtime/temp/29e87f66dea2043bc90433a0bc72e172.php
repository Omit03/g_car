<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:62:"G:\xampp\htdocs\car\public/../app/index\view\index\newcar.html";i:1539654336;s:53:"G:\xampp\htdocs\car\app\index\view\public\header.html";i:1539655726;s:53:"G:\xampp\htdocs\car\app\index\view\public\footer.html";i:1539654336;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title></title>
	</head>
	 <link rel="icon" type="image/x-icon" href="favicon.png">
	<link rel="stylesheet" href="/static/css/style.css" />
	<link rel="stylesheet" href="/static/css/other.css" />
	<script src="/static/js/jquery-1.11.0.min.js"></script>
	<script src="/static/js/jquery.lazyload.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/static/js/common.js" type="text/javascript" charset="utf-8"></script>
	<style>	
	</style>
<body>	
<div class="header">
	<div class="site_nav">
	<div class="site_nav_bd">
		<div class="fleft">你好，欢迎来到管家车易站！请<a href="" class="coloryel">【登录】</a>,免费<a href="" class="coloryel">【注册】</a></div>
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
			<li ><a href="<?php echo url('index/newcar'); ?>" class="sec_li">新车</a></li>
			<li><a href="<?php echo url('index/carlist'); ?>">二手车</a></li>
		    <!--<li><a href="zeroCar.html">零首付</a></li>-->
			<li><a href="<?php echo url('index/sell'); ?>">卖车</a></li>
			<li><a href="<?php echo url('index/change'); ?>">置换</a></li>
			<li><a href="<?php echo url('index/news'); ?>">新闻资讯</a></li>
			<li><a href="<?php echo url('index/appdownload'); ?>">APP下载</a></li>
			<li><a href="<?php echo url('index/logincar'); ?>">登录/注册</a></li>
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
<div class="banner1"><img src="/static/img/xinche.png" alt="" /></div>
<div class="newcar gj_clear">
    <div class="category">
   		<div class="classify p_r">
   			 <div class="brand_new fleft oh">
   			 	<h2>品牌</h2>
   			 	<ul>
   			 		<li><a href=""><img src="/static/img/aodi.png" alt="" /><p>奥迪</p></a></li>
				   	<li><a href=""><img src="/static/img/benci.png" alt="" /><p>奔驰</p></a></li>
				   	<li><a href=""><img src="/static/img/lekesasi.png" alt="" /><p>雷克萨斯</p></a></li>
				   	<li><a href=""><img src="/static/img/baoma.png" alt="" /><p>宝马</p></a></li>
				
				   	<li><a href=""><img src="/static/img/mazida.png" alt="" /><p>马自达</p></a></li>
				   	<li><a href=""><img src="/static/img/bentian.png" alt="" /><p>本田</p></a></li>
				   	<li><a href=""><img src="/static/img/haima.png" alt="" /><p>海马</p></a></li>
				   	<li><a href=""><img src="/static/img/fengtian.png" alt="" /><p>丰田</p></a></li>
				   	<li><a href=""><img src="/static/img/xuetielong.png" alt="" /><p>雪铁龙</p></a></li>
   			 	</ul>
   			 </div>
   			 <div class="price_new fleft oh">
   			 	<h2>首付</h2>
   			 	<ul>
   			 		<li><a href="">分期购</a></li>
   			 		<li><a href="" class="coloryel">一成购新车</a></li>
   			 		<li><a href="">1万以内</a></li>
   			 		<li><a href="">1-2万</a></li>
   			 		<li><a href="">2-3万</a></li>
   			 		<li><a href="">4-5万</a></li>
   			 		<li><a href="">3-4万</a></li>
                    <li><a href="">5万以上</a></li>
   			 	</ul>

   			 	
   			 </div>
   			 <div class="type_new fleft oh">
   			 	<h2>车型</h2>
   			 	<ul>
   			 		<li><a href=""><img src="/static/img/weixiaoxing.png" alt="" /><p>微小型车</p></a></li>
   			 		<li><a href=""><img src="/static/img/zhongxing.png" alt="" /><p>中型车</p></a></li>
   			 		<li><a href=""><img src="/static/img/paoche.png" alt="" /><p>跑车</p></a></li>
   			 		<li><a href=""><img src="/static/img/zhongdaxing.png" alt="" /><p>中大型车</p></a></li>
   			 		<li><a href=""><img src="/static/img/suv.png" alt="" /><p>SUV</p></a></li>
   			 		
   			 		<li><a href=""><img src="/static/img/mpv.png" alt="" /><p>MPV</p></a></li>
   			 	</ul>
   			 </div>			 
   			<a href="" class="coloryel more_lok">MORE>></a>
   		</div>	
   </div>
	<div class="wrap">
	    <div class="news_tit">
	        <h2>爆款新车</h2>	
	        <p class="small_tit">Explosive car</p>
	    </div>
	   <div class="gj_clear">
		    <div class="img_fac">
			 <div class="more_slt">
			 	<div class="gj_clear">
			 		<a href="">5-8万</a>
			 		<a href="">5-8万</a>
				 	<a href="">20-30万</a>
				 	<a href="">5-8万</a>
				 	<a href="">5-8万</a>
				 	<a href="">SUV</a>
				 	<a href="">MPV</a>	
				 	<a href="">宝马</a>
				 	<a href="">宝马5系</a>
				 	<a href="">20-30万</a>
			 	</div>
			 	
			<p><a href="">查看更多>></a></p>		 	
			 	
			 </div>
		   </div>
		    <div class="first_public">
		    	<ul class="md50">
		    		<li>
		    			<a href="newCarDetails.html">
			    			<h3>奔驰A4L 2017款 plus 40 TFSI进取型进取型进取型</h3>
							<div class="fleft car_img"><img src="/static/img/car11.png" alt="" /></div>
							<div class="fright car_public">
								<h4>首付4.27万</h4>
								<span>新车发售</span>
							</div>
							
						</a>
		    		</li>
		    		<li>
		    			<a href="">
			    			<h3>奔驰A4L 2017款 plus 40 TFSI进取型进取型进取型</h3>
							<div class="fleft car_img"><img src="/static/img/car11.png" alt="" /></div>
							<div class="fright car_public">
								<h4>首付4.27万</h4>
								<span>新车发售</span>
							</div>
						</a>
		    		</li>
		    		<li>
		    			<a href="">
			    			<h3>奔驰A4L 2017款 plus 40 TFSI进取型进取型进取型</h3>
							<div class="fleft car_img"><img src="/static/img/car11.png" alt="" /></div>
							<div class="fright car_public">
								<h4>首付4.27万</h4>
								<span>新车发售</span>
							</div>
						</a>
		    		</li>
		    	</ul>
		    </div>
	    </div>
	     <div class="news_tit">
	        <h2>热门推荐</h2>	
	        <p class="small_tit">Popular recommendation</p>
	    </div>
	    <div class="gj_clear">
	    	<ul class="list ptp15 new_list">
				<li class="items5">
					<a href="" class="car_img flex_center"><img src="" alt="" /></a>
					<a href="" class="car_desc">
						<h3>奔驰A4L 2017款 plus 40 TFSI 进取型</h3>
						<p><span class="pay_first">首付<b>55</b>万</span> <span class="padlt20">月供5555元</span> </p>
				
					</a>
					<img src="/static/img/baokuan.png" alt="" class="hot" />
				</li>
				<li class="items5">
					<a href="" class="car_img flex_center"><img src="" alt="" /></a>
					<a href="" class="car_desc">
						<h3>奔驰A4L 2017款 plus 40 TFSI 进取型</h3>
						<p><span class="pay_first">首付<b>55</b>万</span> <span class="padlt20">月供5555元</span> </p>
				
					</a>
				</li>
				<li class="items5">
					<a href="" class="car_img flex_center"><img src="" alt="" /></a>
					<a href="" class="car_desc">
						<h3>奔驰A4L 2017款 plus 40 TFSI 进取型</h3>
						<p><span class="pay_first">首付<b>55</b>万</span> <span class="padlt20">月供5555元</span> </p>
				
					</a>
				</li>
				<li class="items5">
					<a href="" class="car_img flex_center"><img src="" alt="" /></a>
					<a href="" class="car_desc">
						<h3>奔驰A4L 2017款 plus 40 TFSI 进取型</h3>
						<p><span class="pay_first">首付<b>55</b>万</span> <span class="padlt20">月供5555元</span> </p>
				
					</a>
				</li><li class="items5">
					<a href="" class="car_img flex_center"><img src="" alt="" /></a>
					<a href="" class="car_desc">
						<h3>奔驰A4L 2017款 plus 40 TFSI 进取型</h3>
						<p><span class="pay_first">首付<b>55</b>万</span> <span class="padlt20">月供5555元</span> </p>
				
					</a>
				</li>
				<li class="items5">
					<a href="" class="car_img flex_center"><img src="" alt="" /></a>
					<a href="" class="car_desc">
						<h3>奔驰A4L 2017款 plus 40 TFSI 进取型</h3>
						<p><span class="pay_first">首付<b>55</b>万</span> <span class="padlt20">月供5555元</span> </p>
				
					</a>
				</li>
				<li class="items5">
					<a href="" class="car_img flex_center"><img src="" alt="" /></a>
					<a href="" class="car_desc">
						<h3>奔驰A4L 2017款 plus 40 TFSI 进取型</h3>
						<p><span class="pay_first">首付<b>55</b>万</span> <span class="padlt20">月供5555元</span> </p>
				
					</a>
				</li>
			</ul>
			<div class="more_l">查看更多</div>
	    </div>
		<h2 class="newc_t">
			轻松四步  新车开回家
		</h2>
		<ul class="step oh">
			<li><img src="/static/img/yuyue.png" alt="" /><p>在线预约</p></li>
			<li><img src="/static/img/jiantou00.png" alt="" /></li>
			<li><img src="/static/img/xieyi.png" alt="" /><p>签订协议</p></li>
			<li><img src="/static/img/jiantou00.png" alt="" /></li>
			<li><img src="/static/img/zhifu.png" alt="" /><p>支付费用</p></li>
			<li><img src="/static/img/jiantou00.png" alt="" /></li>
			<li><img src="/static/img/kaiche.png" alt="" /><p>坐等新车</p></li>
		
		</div>
	<div class="adv_img">
		<h2>想开什么车 ？管家车易站应有尽有.</h2>
		<div class="buy_ipt">
			<input type="text" placeholder="请输入手机号"/>
			<div class="btn_buy">我要买车</div>
		</div>
	</div>
</div>

<div class="footer">
	
	<div class="wrap">
		<div class="company_info gj_clear">
			<div class="footer_logo"><img src="img/1024.png" alt="" width="80"/><p>管家车易站</p></div>
			<div class="basic_info">
				<div>
					<a href="">关于我们</a>
					<a href="">联系我们</a>
					<a href="">服务保障</a>
					<a href="">网站地图</a>
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
			<a href="">大众</a>
			<a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a><a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a>
			<a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a><a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a>
		</div>
		<div class="optimize_link">
			<p class="link_tit ">热门车系：</p>
			<span class="more_dwon"></span>
			<a href="">大众</a>
			<a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a><a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a>
			<a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a><a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a>
		</div>
		<div class="optimize_link gj_clear">
			<p class="link_tit">友情链接：</p>
			<span class="more_dwon"></span>
			<a href="">大众</a>
			<a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a><a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a>
			<a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a><a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a>
			<a href="">大众</a><a href="">大众</a><a href="">大众</a>
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
  
   window.onload=function()
   {
   	//  $(".header").load("templates/header.html");
     // $(".footer").load("templates/footer.html");
//   var sec=$('.wrap').html();
//   console.log(sec);
     
   	
   }
</script>
</html>
