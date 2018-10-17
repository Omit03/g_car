<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:63:"G:\xampp\htdocs\car\public/../app/index\view\index\service.html";i:1539691489;s:53:"G:\xampp\htdocs\car\app\index\view\public\header.html";i:1539690764;s:53:"G:\xampp\htdocs\car\app\index\view\public\footer.html";i:1539694062;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title></title>
	</head>
	<link rel="icon" type="image/x-icon" href="favicon.png">
	<link rel="stylesheet" href="/static/css/style.css" />
	<link rel="stylesheet" href="/static/css/other.css" />	
	<style>
	
	</style>
	<body>
	<div class="header"><div class="site_nav">
	<div class="site_nav_bd">
		<div class="fleft">你好，欢迎来到管家车易站！请<a href="<?php echo url('index/logincar'); ?>" class="coloryel">【登录】</a>,免费<a href="<?php echo url('index/logincar'); ?>" class="coloryel">【注册】</a></div>
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
			<li><a href="<?php echo url('index/logincar'); ?>">登录/注册</a></li>
			<li><a href="<?php echo url('index/join_us'); ?>">关于我们</a></li>
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
		<div class="site_nav">
			<div class="site_nav_bd">
				<div class="fleft">你好，欢迎来到管家车易站！请<a href="" class="coloryel">【登录】</a>,免费<a href="" class="coloryel">【注册】</a></div>
				<div class="fright">
					<ul class="site_nav_menu">
						<li><a href=""><img src="/static/img/home1.png" alt="" />首页</a></li>
						<li><a href=""><img src="/static/img/sell2.png" alt="" />我要买车</a></li>
						<li><a href=""><img src="/static/img/sell1.png" alt="" />我要买车</a></li>
						<li><a href=""><img src="" alt="" />网站导航</a></li>
					</ul>					
				</div>
			</div>
		</div>
		<div class="borbt"><div class="header"></div></div>
		<div class="full_wid">			
			<div class="wrap ">	
				<div class="person_center">
					<div class="person_left user">					
						<div class="tab_choose">
							<ul>
								<h2 class="top_tit">管家车易站</h2>
								<li class=""><a href="join_us.html"><img src="/static/img/jiaoru.png" alt="" /></b>加入我们</a></li>
								<li class=""><a href="link_us.html"><img src="/static/img/lainxi.png" alt="" /></b>联系我们</a></li>
								<li class="active"><a href="service.html"><img src="/static/img/fuwu.png" alt="" /></b>服务保障</a></li>
								<li class=""><a href="website.html"><img src="/static/img/ditu.png" alt="" /></b>网站地图</a></li>
								
							</ul>
						</div>
					</div>
					<div class="person_right">
						<h1 class="borbt"><span class="release">服务保障</span></h1>
						<h2 class="step">管家车易站</h2>
						<ul class="service_info">
							<li><b></b>在合同有效期内，用户通过管家车易站获取管家车易站商家的用户代码和管理账户，享受相应的管家车易站商家的服务。</li>
							<li><b></b>管家车易站商家服务的内容、功能及所含信息的许可使用权、知识产权等全部权利均归管家车易站拥有，未经管家车易站书面许可不得以任何方式使用,用户许可河南兴友汽车销售有限公司有权利就任何主体侵权而单独提起诉讼，并获得全部赔偿。 </li>
							<li><b></b>用户根据用户代码和密码，登陆“管家车易站”的管理账户，可以使用“发布车源”服务等服务和管家车易站陆续开通的其他服务。</li>
							<li><b></b>用户应当遵守国家有关法律法规，不得损害公共利益和他人的合法权益，不得损害管家车易站的商誉。</li>
							<li><b></b>用户应当提供真实、有效、合法、准确的公司注册信息和产品信息，以便用户及时与网友取得联系，获取购车意向，用户因产品信息不真实、不完整等，造成的所有损失由用户承担，因此给管家车易站造成的损害，由用户向管家车易站足额赔偿。</li>
						<li><b></b>用户应当提供真实、有效、合法、准确的公司注册信息和产品信息，以便用户及时与网友取得联系，获取购车意向，用户因产品信息不真实、不完整等，造成的所有损失由用户承担，因此给管家车易站造成的损害，由用户向管家车易站足额赔偿。</li>
					    <li><b></b>车辆信息在管家车易站站发布后，由用户独立承担车辆保管责任，并确保信息发布期间车辆不会因使用、保管发生车况非正常变化或导致车辆价值贬损的情形。如发生前述情形，用户应及时告知管家车易站，并配合管家车易站对该等车辆展示信息进行变更或删除。</li>
					     <li><b></b>用户发布的车源，用户应严格审核相关手续、证明，并按国家规定办理车辆过户等手续，提供完整、规范的服务。
如在车辆交易过程中出现任何问题，由车辆交易双方自行协商解决，并独自承担相关法律责任。</li>
  						<li><b></b>    车辆线下交易意向和行为是用户与消费者双方关系，如发生汽车买卖纠纷、质量投诉、举报维权等情况，由用户直接
负责与消费者解决，与管家车易站无关。如由此导致管家车易站遭受投诉举报、工商处罚、媒体曝光等负面影响，亦由
用户直接负责处理，管家车易站将保留追究用户法律及经济赔偿的权利。</li>
						</ul>
					</div>
				</div>
				
			</div>
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
		
		<div class="mask1"></div>
	</body>
	<script src="/static/js/jquery-1.11.0.min.js"></script>
	<script>		
		$(function(){	
		   // $(".footer").load("templates/footer.html");
   		//    $(".header").load("templates/header.html");
	})
</script>
</html>
