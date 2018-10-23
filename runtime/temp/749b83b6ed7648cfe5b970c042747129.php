<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:66:"G:\xampp\htdocs\car\public/../app/index\view\user\person_info.html";i:1540280148;s:53:"G:\xampp\htdocs\car\app\index\view\public\header.html";i:1540199091;s:53:"G:\xampp\htdocs\car\app\index\view\public\footer.html";i:1539694062;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title></title>
	</head>
		<link rel="icon" type="image/x-icon" href="favicon.png">
	<link rel="stylesheet" href="/static/css/style.css" />
	<link rel="stylesheet" href="/static/css/other.css" />
	<link rel="stylesheet" href="/static/css/iconfont.css" />
	<link rel="stylesheet" href="/static/js/theme/default/laydate.css" />	
	<style>
		.tab_info li{float: left;margin-left: 60px;font-size: 20px;margin-top: 40px;cursor: pointer;}
		.tab_info .active{color: #FF802C;}
		.editCont{margin-top: 44px;margin-left: 50px;}
		.info_base .ipt{width:400px;height: 50px;line-height: 50px ;}
		.info_base .ipt input{background: #fcfcfc;width: 275px;height: 35px;line-height: 35px;border: 1px solid #ababab;}
		.info_base .ipt input[type='radio']{width: 18px;height:18px;margin-right:5px;}
		.info_base span{display: block;float: left;width:125px;text-align: right;padding-right: 20px;font-size: 18px;}
		.avatar span{margin-top: 50px;}
		.editCont .sub_btn{margin-left:120px;width: 275px;}
	</style>
	<body>
	<div class="header">
		<div class="site_nav">
	<div class="site_nav_bd">
		<div class="fleft">你好，欢迎来到管家车易站！
			欢迎用户<?php if(empty(\think\Session::get('phone')) || ((\think\Session::get('phone') instanceof \think\Collection || \think\Session::get('phone') instanceof \think\Paginator ) && \think\Session::get('phone')->isEmpty())): ?>
			<a href="<?php echo url('user/car_login'); ?>" class="coloryel">【登录】</a>,免费<a href="<?php echo url('user/car_login'); ?>" class="coloryel">【注册】</a>
			<?php else: ?>
			<?php echo \think\Session::get('phone'); endif; ?></div>
		<div class="fright">
			<ul class="site_nav_menu">
				<li><a href=""><img src="img/shouye.png" alt="" />首页</a></li>
				<li class="sec_li"><a href=""><img src="img/maic.png" alt="" />我要买车</a></li>
				<li><a href=""><img src="img/maic.png" alt="" />我要卖车</a></li>
				<li><a href=""><img src="img/xiazai.png" alt="" />APP下载</a></li>
				<li><a href=""><img src="img/wangahn.png" alt="" />网站导航</a></li>
				<?php if(!(empty(\think\Session::get('phone')) || ((\think\Session::get('phone') instanceof \think\Collection || \think\Session::get('phone') instanceof \think\Paginator ) && \think\Session::get('phone')->isEmpty()))): ?><li><a href="<?php echo url('user/car_logout'); ?>"><img src="img/wangahn.png" alt="" />安全退出</a></li><?php endif; ?>
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
			<li class="active"><a href="<?php echo url('index/index'); ?>">首页</a></li>
			<li ><a href="<?php echo url('newcar/index'); ?>" class="sec_li">新车</a></li>
			<li><a href="<?php echo url('twocar/index'); ?>">二手车</a></li>
		    <!--<li><a href="zeroCar.html">零首付</a></li>-->
			<li><a href="<?php echo url('index/sell'); ?>">卖车</a></li>
			<li><a href="<?php echo url('change/index'); ?>">置换</a></li>
			<li><a href="<?php echo url('news/index'); ?>">新闻资讯</a></li>
			<li><a href="<?php echo url('index/appdownload'); ?>">APP下载</a></li>
			<?php if(empty(\think\Session::get('phone')) || ((\think\Session::get('phone') instanceof \think\Collection || \think\Session::get('phone') instanceof \think\Paginator ) && \think\Session::get('phone')->isEmpty())): ?><li><a href="<?php echo url('user/car_login'); ?>">登录/注册</a></li><?php endif; ?>
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
				<li class="active"><a href="<?php echo url('index/index'); ?>">首页</a></li>
				<li><a href="<?php echo url('twocar/index'); ?>">二手车</a></li>
				<li><a href="<?php echo url('newcar/index'); ?>">新车</a></li>
				<!--<li><a href="zeroCar.html">零首付</a></li>-->
				<li><a href="<?php echo url('index/sell'); ?>">卖车</a></li>
				<li><a href="<?php echo url('change/index'); ?>">置换</a></li>
				<li><a href="<?php echo url('news/index'); ?>">新闻资讯</a></li>
				<li><a href="<?php echo url('index/appdownload'); ?>">APP下载</a></li>
				<li><a href="<?php echo url('user/car_login'); ?>">登录/注册</a></li>
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

	</
		<div class="full_wid">			
			<div class="wrap ">	
				<div class="person_center">
					<div class="person_left">
						<div class="person_info">
							<div class="user_avatar"><img src="/static/img/yhtx.png" alt="" /></div>
							<p class="uphone"><?php echo \think\Session::get('phone'); ?></p>
							<p>向阳二手车一号店</p>							
						</div>
						<div class="tab_choose">
							<ul>
								<li class=""><a href="person_manage.html"><b class="icon_xb1"> </b>管理店铺<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_release.html"><b class="icon_xb2"></b>发布车辆信息<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_public.html"><b class="icon_xb3"></b>发布过的<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_busenter.html"><b class="icon_xb4"></b>商家入驻<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_opportunity.html"><b class="icon_xb5"></b>商机<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class="active"><a href="person_info.html"><b class="icon_xb6"></b>个人资料<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_collect.html"><b class="icon_xb7"></b>我的收藏<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_history.html"><b class="icon_xb8"></b>浏览记录<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_feedback.html"><b class="icon_xb9"></b>意见反馈<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_order.html"><b class="icon_xb10"></b>我的预约<i class="icon iconfont icon-jiantou"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="person_right">
						<h1 class="borbt"><span class="release">个人资料</span></h1>
						<ul class="tab_info gj_clear">
							<li class="active">基本信息</li>
							<li>绑定设置</li>
							<li>修改密码</li>
						</ul>
						<div class="editCont">
							<div class="info_base info_ipt">
								<form action="<?php echo url('user/set_userinfo'); ?>" enctype="multipart/form-data"  method="post">
								<!--<div class="avatar"><span>头像: </span><img src="/static/img/yhtx.png" alt="" /><input type="file" name="header_pic"> </div>-->
								<div class="ipt"><span>昵称：</span><input type="nickname"  name="nickname" placeholder="<?php echo $res['nickname']; ?>"/></div>
								<div  class="ipt"><span>所在地：</span><input type="address" name="address" placeholder="<?php echo $res['address']; ?>"/></div>
								<div class="ipt"><span>性别：</span><input type="radio1" placeholder="<?php echo $res['sex']; ?>" name="sex"/></div>
								<div class="ipt"><span>出生年月：</span><input type="text" name="birthday" placeholder="<?php echo $res['birthday']; ?>" id="year"/></div>
								<p class="sub_btn submit">修改<input type="submit" value="提交" /></p>
								</form>
							</div>
							<div style="display: none;" class="info_ipt">
								<div class="upLoad_form">
							<ul class="motify_ipt">
								<li><span class="my_form_tit">手机号：</span><p class="uphone">1536232514</p></li>
								<li><span class="my_form_tit">新手机号：</span>
									<div class="fleft myform_ipt"><input type="password" placeholder="请输入您新绑定的手机号"/></div>
								</li>
								<li><span class="my_form_tit">验证码：</span>
									<div class="fleft myform_ipt"><input type="text" placeholder="请输入您的验证码"/><span class="getcode">获取验证码</span></div>
								</li>
							</ul>								
							<p class="sub_btn pwd_submit">提交</p>
						</div>
							</div>
							<div style="display: none;" class="motifypwd info_ipt">
								<div class="upLoad_form">
									<ul class="motify_ipt">
										<li><span class="my_form_tit">手机号：</span><p class="uphone">1536232514</p></li>
										
										<li><span class="my_form_tit">原密码：</span>
											<div class="fleft myform_ipt"><input type="password" placeholder="请输入您的验证码"/></div>
										</li>
										<li><span class="my_form_tit">新密码：</span>
											<div class="fleft myform_ipt"><input type="password"  placeholder="请输入您新绑定的手机号"/><span class="getcode">获取验证码</span></div>
										</li>
										<li><span class="my_form_tit">确认密码：</span>
											<div class="fleft myform_ipt"><input type="password" placeholder="请输入您的验证码" /></div>
										</li>
									</ul>								
									<p class="sub_btn pwd_submit">提交</p>
								</div>
							</div>
						</div>
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
		
	</body>
	<script src="/static/js/jquery-1.11.0.min.js"></script>
	<script src="/static/js/laydate.js"></script>
	<script src="/static/js/common.js" type="text/javascript" charset="utf-8"></script>
	<script>		
		$(function(){			
		$(".uphone").text($(".uphone").text().substring(0, 3) + "****" + $(".uphone").text().substring(7, 11));
		$(".tab_info li").click(function(){
			$(this).addClass('active').siblings().removeClass('active');
			var i=$(this).index();
			$(".info_ipt").eq(i).show().siblings().hide()
		})
			
	})
</script>
</html>
