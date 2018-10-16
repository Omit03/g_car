<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"G:\xampp\htdocs\car\public/../app/index\view\index\my_appointment.html";i:1539565103;}*/ ?>
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
								<li class=""><a href="person_busenter.html"><b class="icon_xb4"></b>商家入驻<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_opportunity.html"><b class="icon_xb5"></b>商机<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_info.html"><b class="icon_xb6"></b>个人资料<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_collect.html"><b class="icon_xb7"></b>我的收藏<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_history.html"><b class="icon_xb8"></b>浏览记录<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class=""><a href="person_feedback.html"><b class="icon_xb9"></b>意见反馈<i class="icon iconfont icon-jiantou"></i></a></li>
								<li class="active"><a href="person_order.html"><b class="icon_xb10"></b>我的预约<i class="icon iconfont icon-jiantou"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="person_right">
						<h1 class="borbt"><span class="release">我的预约 </span>
							<ul class="fright sel_status">
								<li class="active" data-status='1'><b></b><span>全部</span></li>
								<li data-status='0'><b></b><span>新车</span></li>
								<li data-status='0'><b></b><span>二手车</span></li>
								<li data-status='0'><b></b><span>零首付</span></li>
							</ul>
						</h1>

						<ul class="p_list">
							<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
							<li class="item">

								<div class="car_img"><img src="<?php echo $val['img_url']; ?>" alt="" /></div>
								<div class="car_desc"><h3><?php echo $val['name']; ?></h3>
									<p> <?php echo $val['name']; ?>| 2012-03 | 郑州</p>
									<div><span class="cprice"><b> </b>万</span><span class="nprice"><?php echo $val['price']; ?> </span></div>
								</div>
								<div class="order_res">
									<p><?php echo $val['create_time']; ?></p>
									<p><?php echo $val['car_cardtime']; ?></p>
									<p><?php echo $val['shop_name']; ?></p>
									<p><?php echo $val['pu_id']; ?></p>
									<p><?php echo $val['car_mileage']; ?></p>
									<span class="order_des">详 情</span>
								</div>

							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>	
				</div>
			</div>
		</div>	
		<div class="footer"></div>
		
	</body>
	<script src="/static/js/jquery-1.11.0.min.js"></script>
	<script src="/static/js/laydate.js"></script>
	<script src="/static/js/imgUp.js" type="text/javascript" charset="utf-8"></script>
	<script src="/static/js/common.js" type="text/javascript" charset="utf-8"></script>
	<script>		
		$(function(){		
			$(".sel_status li").each(function(){
				var that=$(this);
				$(that).click(function(){
				var status=$(this).attr("data-status");
					if(status==1){
						$(this).attr("data-status",0);
						$(this).removeClass("active")
					}else{
						$(this).attr("data-status",1);
						$(this).addClass("active").siblings().removeClass("active")
					}
				
			})
			})
			
			//加载公用头部和底部
	//	    $(".header").load("templates/header.html");
//		    $(".footer").load("templates/footer.html");

			
	})
</script>
</html>
