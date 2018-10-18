<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"G:\xampp\htdocs\car\public/../app/index\view\user\person_busenter.html";i:1539758658;s:53:"G:\xampp\htdocs\car\app\index\view\public\header.html";i:1539843130;}*/ ?>
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
	<div class="header">
		<div class="site_nav">
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
					<div class="person_left">
						<div class="person_info">
							<div class="user_avatar"><img src="/static/img/yhtx.png" alt="" /></div>
							<p class="uphone">15362352625</p>
							<p>向阳二手车一号店</p>							
						</div>
						<div class="tab_choose">
							<ul>
								<li class=""><a href="person_manage.html"><b class="icon_xb1"> </b>管理店铺<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_release.html"><b class="icon_xb2"></b>发布车辆信息<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_public.html"><b class="icon_xb3"></b>发布过的<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class="active"><a href="person_busenter.html"><b class="icon_xb4"></b>商家入驻<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_opportunity.html"><b class="icon_xb5"></b>商机<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_info.html"><b class="icon_xb6"></b>个人资料<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_collect.html"><b class="icon_xb7"></b>我的收藏<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_history.html"><b class="icon_xb8"></b>浏览记录<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_feedback.html"><b class="icon_xb9"></b>意见反馈<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_order.html"><b class="icon_xb10"></b>我的预约<i class="icon iconfont icon-jiantou"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="person_right">
						<h1 class="borbt"><span class="release">商家入驻</span></h1>
						<h2 class="step"></h2>
						<div class="business_enter">
							<div>
								<h3>选择类型 <span>请选择您的入驻类型</span></h3>
								<div class="sel_type gj_clear">
									<input type="text" readonly placeholder="新车商户" class="businesType"/>
									<div class="position_r">
										<ul class="selList">
											<li>新车商户</li>
											<li>二手车商户</li>
											<li>零首付商户</li>
											<li>新能源商户</li>
										</ul>
									</div>
								</div>								
							</div>
							<div>
								<h3>上传资料  </h3>
								<div class="bform_ipt">
									<div class="sel_type"><span>法人姓名</span><input type="text" placeholder="请输入公司法人姓名" /></div>
									<div class="sel_type"><span>法人手机号</span><input type="text" placeholder="请输入公司法人手机号"/></div>
									<div class="sel_type"><span>验证码</span><input type="text" placeholder="请输入验证码" class="verfity"/><span class="getcode">获取验证码</span></div>
									<div class="sel_type"><span>店铺名称</span><input type="text" placeholder="请输入公司店铺名称"/></div>
									<div class="sel_type"><span>经营范围</span><input type="text" placeholder="请输入公司经营范围" class="slt_type" readonly/></div>
									<div class="sel_type"><span>公司地址</span><input type="text" placeholder="请输入公司经营地址"/></div>
								
								</div>
							</div>
							<div class="img_l gj_clear">
								<div class="fleft">
									<h3>上传营业执照  </h3>
									<div class="imgCont">
										 <form id= "uploadForm" method='post' enctype='multipart/form-data'>
								            <input id="file_inp" type="file" name="file" />						
								            <div class="upLoad_pic">
									            <img class="img_up" id="" src="/static/img/addlo.png" > 
									          
									        </div>
								        </form>	
									</div>
								</div>
								<div class="fleft">
									<h3>店铺logo  </h3>
									<div class="imgCont">
									 <form id= "uploadForm" method='post' enctype='multipart/form-data'>
								            <input id="file_inp" type="file" name="file" />						
								            <div class="upLoad_pic">
									            <img class="img_up" id="" src="/static/img/addlo.png" > 
									          
									        </div>
								        </form>	
									</div>
									
								</div>
							</div>
							<div class="submit sub_btn">提交</div>
						</div>
						 
					</div>
				</div>
				
			</div>
		</div>	
		<div class="footer"></div>
		
		<div class="mask1"></div>
	</body>
	<script src="/static/js/jquery-1.11.0.min.js"></script>
	<script>		
		$(function(){	
			$(".businesType").click(function(){
				$(this).parents('.sel_type').addClass('active');				
			})
			$(".selList li").click(function(){
					var result=$(this).text();
					$(".businesType").val(result);
					$(this).parents('.sel_type').removeClass('active');
				})
   			$(".header").load("templates/header.html");
	})
</script>
</html>
