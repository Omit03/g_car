<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"G:\xampp\htdocs\car\public/../app/index\view\index\sell.html";i:1539654336;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
	</head>
	<link rel="stylesheet" href="/static/css/style.css" />
	<link rel="stylesheet" href="/static/css/other.css" />
	<link rel="stylesheet" href="/static/js/theme/default/laydate.css" />
	<script src="/static/js/jquery-1.11.0.min.js"></script>
	<script src="/static/js/laydate.js"></script>
	
	<style>
		
	</style>
	<body>
		<div class="border">			
			<div class="header"></div>
		</div>
		<div class="full_wid">
			<div class="banner sell_ban">
				<div class="wrap">
					<div class="change_user">						
						<div class="change_ipt"><input type="text" placeholder="请输入手机号" class="phone"/><span class="chang_btn">立即提交</span></div>					
					</div>
					<div class="tip"><p class="agree">提交代表我同意<a href="">《个人信息保护声明》</a>，并接受合作商的来电服务</p></div>
				</div>			
			</div>
			<div class="wrap">				
				<div class="breadnav">你的位置:<a href="">首页</a>>><a href="">卖车</a></div>	
				<div class="article">				
					<div class="tit_er">
				        <div class="line_tit"></div>			        
				        <h2 class="color tit_con">卖车流程</h2>	       
				    </div>
					<div class="sell_flow"><img src="/static/img/sell_floe.png" alt="" title='' /></div>
				</div>
				<div class="article">
					<div class="tit_er">
				        <div class="line_tit"></div>			        
				        <h2 class="color tit_con">卖完想买</h2>	       
				    </div> 				
					<div class="car_list">
						<ul class="list">
							<?php if(is_array($er_car) || $er_car instanceof \think\Collection || $er_car instanceof \think\Paginator): $i = 0; $__LIST__ = $er_car;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
							<li class="items">
								<a href="" class="car_img flex_center"><img src="<?php echo $val['img_url']; ?>" alt="" /></a>
								<a href="" class="car_desc">
									<h3><?php echo $val['name']; ?></h3>
									<p><span class="car_price"><b><?php echo $val['price']; ?></b>万</span>
									<span class="car_sui">新车含税<?php echo $val['new_car_price']; ?>万</span>
									<p><span><?php echo $val['car_cardtime']; ?>上牌</span> <span class="padlt20"><?php echo $val['car_mileage']; ?>万公里</span> </p>
									<div class="che_ordered">立即预约</div>
								</a>
							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
							
						</ul>
					</div>					
				</div>
				<div class="article">
					<div class="tit_er">
				        <div class="line_tit"></div>			        
				        <h2 class="color tit_con">常见问题</h2>	       
				    </div> 
				    <ul class="question oh">
				    	<li class="one">
				    		<h3>1.管家车易站的卖车模式是什么？</h3>
				    		<p>管家车易站依托郑州、上千台车辆真实成交数据，为每一位车主提供免费上门或到店检测服务，30分钟签约成交及全程管家式车辆过户代办的便捷卖车服务，同时管家车易站报价承诺价格7天有效</p>
				    	</li>
				    	<li class="one">
				    		<h3>2.在管家车易站上卖车多久可以成交？</h3>
				    		<p>报价当天即可成交。优信为您提供免费上门或到店车辆检测服务后，将于次日12点前为车主提供真实的车辆报价及专业的车况报告，管家车易站报价，当天签约成交</p>
				    	</li>
				    	<li class="two">
				    		<h3>3.卖车流程是怎么样的？</h3>
				    		<p> 1、登陆管家车易站APP或官网www.guanjia2car.com预约卖车(支持自主或电话预约服务)；
								2、管家车易站将根据与您确认的预约时间，安排专业检测师免费上门或门店检测服务；
								3、您将于次日12点前获得真实的管家车易站报价及专业的车况报告，将会在平台免费帮您寄售
								4、管家车易站将为您提供全程管家式车辆过户协办服务
				    		</p>
						</li>
				    	<li class="two">
				    		<h3>4.卖车需要准备哪些资料？</h3>
				    		<p>车主本人需要提供身份证原件（非车主本人还需要提供车主委托证明及委托人身份证原件）、车辆行驶证、车辆登记证书、购置税本、购车发票、交强险单、本人名下银行卡；如果车辆为公户，还需要提供营业执照副本原件；如车辆为进口车，须提供进口机动车随车检验单。</p>
				    	</li>
				    	<li class="three">
				    		<h3>5.在管家车易站出售车辆是否收费？</h3>
				    		<p>全程为车主提供的是免费卖车服务，不收取任何费用。</p>
				    	</li>
				    	<li class="three">
				    		<h3>6.出售车辆需要符合怎样的条件？</h3>
				    		<p>只要您的车符合国家法律法规且相关手续齐全、真实，不存在权属不清、债务纠纷、手续缺失、违法违规、非法拼装等，均可在管家车易站进行出售</p>
				    	</li>
				    	<li>
				    		<h3>7.如果车辆有违章是否可以出售？</h3>
				    		<p>请您在选择签约成交前，自行处理好车辆违章及罚款，避免签约成交失败。</p>
				    	</li>
				    	
				    </ul>
					
				</div>
			</div>
		</div>
		<div class="pop_submit">
			<h2>免费卖车<i class="del"><img src="/static/img/del1.png" alt="" /></i></h2>
			<ul class="form_sell">
				<li class="">
					<p class="sell_lit">售车车型</p>
					<div class="fleft cont_sel">
						<input type="text" class="demo_ipt brand_sel" placeholder="品牌" readonly/>
						<div class="gj_sel">
							<div class="down_box">
								<div class="sel_box">
									<!--<p class="li_tit"><a id='letterhot' name="letterhot">热门</a></p>-->
									<!--<ul class="hot_car oh">-->
										<!--<li>福特</li>-->
										<!--<li>福特</li>-->
										<!--<li>福特</li>-->
										<!--<li>福特</li>-->
										<!--<li>福特</li>-->
									<!--</ul>-->
									<?php if(is_array($res) || $res instanceof \think\Collection || $res instanceof \think\Paginator): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
									<p class="li_tit"><a id='letterA' name="letterA"><?php echo $val['initial']; ?></a></p>
									  <?php if(is_array($val['list']) || $val['list'] instanceof \think\Collection || $val['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $val['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
									<ul class="all_letter oh">
										<li><?php echo $vo['name']; ?></li>
										<li style="display: none"><?php echo $vo['id']; ?></li>
									</ul>
									<?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
									
								</div>
								<ul class="letter_link">
									<li><a href="#letterhot">热</a></li>
									<li><a href="#letterA">A</a></li>
									<li><a href="#letterB">B</a></li>
									<li><a href="#letterC">C</a></li>
									<li><a href="#letterD">D</a></li>
									<li><a href="#letterE">E</a></li>								
								</ul>
							</div>							
						</div>
					</div>
					<div class="fleft cont_sel">
						<input type="text" class="demo_ipt series_val" placeholder="车系" readonly  disabled="true"/>
						<div class="gj_sel">
							<div class="down_box">
								<div class="series_box">
									<ul class="chexi">
										<li>奥迪A3L</li>
										<li>奥迪A3L</li>
										<li>奥迪A3L</li>
									</ul>	
								</div>							
							</div>							
						</div>
					
					</div>
				</li>
				<li><p class="sell_lit">上牌时间</p> <div class="fleft">
					<input type="text" class="demo_ipt" placeholder="年份" id="year"></div>					
					<div class="sel_border sell_border_ipt plt10">行驶里程：<input type="text" class="mile_gj"/>万公里</div>
				</li>
				<li><p class="sell_lit">牌照地</p>
					<div class="paizao fleft cont_sel">
						<input type="text" class="demo_ipt city_val" placeholder="郑州" readonly>
						<div class="gj_sel">
							<div class="down_box">
								<div class="city_box">
									<div class="pai_city">
										<dl>
											<dt class="zimu" id="letA">A</dt>	
											<dd class="city_zimu"><p>澳门</p><p>鞍山</p><p> 阿拉尔</p><p>阿勒泰</p><p>澳门</p><p>鞍山</p><p> 阿拉尔</p><p>阿勒泰</p><p>澳门</p><p>鞍山</p><p> 阿拉尔</p><p>阿勒泰</p><p>澳门</p><p>鞍山</p><p> 阿拉尔</p><p>阿勒泰</p><p>澳门</p><p>鞍山</p><p> 阿拉尔</p><p>阿勒泰</p></dd>										
										</dl>
										<dl>
											<dt class="zimu" id="letB">B</dt>	
											<dd class="city_zimu"><p>澳门</p><p>鞍山</p><p> 阿拉尔</p><p>阿勒泰</p></dd>									
										</dl>
										<dl>
											<dt class="zimu" id="letC">C</dt>	
											<dd class="city_zimu"><p>澳门</p><p>鞍山</p><p> 阿拉尔</p><p>阿勒泰</p></dd>									
										</dl>
										<dl>
											<dt class="zimu" id="letD">D</dt>	
											<dd class="city_zimu"><p>澳门</p><p>鞍山</p><p> 阿拉尔</p><p>阿勒泰</p></dd>									
										</dl>
										<dl>
											<dt class="zimu" id="letE">E</dt>	
											<dd class="city_zimu"><p>澳门</p><p>鞍山</p><p> 阿拉尔</p><p>阿勒泰</p></dd>									
										</dl>
									</div>
									<ul class="letter_link city_letter_sel">
										<li><a href="#letA">A</a></li>
										<li><a href="#letB">B</a></li>
										<li><a href="#letC">C</a></li>
										<li><a href="#letD">D</a></li>
										<li><a href="#letE">E</a></li>								
									</ul>
								</div>
							</div>							
						</div>
						
					</div>
				</li>
				<li><p class="sell_lit">手机号</p> <input type="text" class="inputype" id="phone" placeholder="请输入手机号"/></li>
				<li><p class="sell_lit">验证码</p> <input type="text" class="inputype" id="code" placeholder="请输入验证码"/><span class="getcode"/>获取验证码</span></li>
				<li class="upLoad"><p class="sell_lit">上传图片</p>
					<div class="loadImg"><img src="/static/img/photo11.png" alt="" /></div>
				</li>
				<li><p class="sure_sell">提交</p></li>
			</ul>
			
			
		</div>
		<div class="mask"></div>
	</body>
	<script>
		lay('#version').html('-v'+ laydate.v);
	    laydate.render({
	      elem: '#year' //指定元素
	    });
	$(function(){
//		提交弹出信息框
		$(".chang_btn").click(function(){
			
			if($(".phone").val()==''){
				alert('请输入手机号');
				return false;
			}
			$("#phone").val($(".phone").val())
			$(".pop_submit").show();
			$(".mask").show();
			$("html,body").css("overflow","hidden")			
		})
		$(".mask,.del").click(function(){
			$(".pop_submit").hide();
			$(".mask").hide();
			$("html,body").css("overflow","auto")
		})
//		input赋值 品牌
		$(".cont_sel").click(function(){
			if($(this).find(".gj_sel").is(":hidden")){
				$(this).addClass('active');				
				$(".sel_box li").click(function(){
					var brean_val=$(this).text();
					$(this).parents(".cont_sel").find(".demo_ipt").val(brean_val);					
				})
				$(".series_box li").click(function(){
					var series_val=$(this).text();
					$(this).parents(".cont_sel").find(".demo_ipt").val(series_val);					
				})
				$(".city_zimu p").click(function(){
					var city_val=$(this).text();
					$(this).parents(".cont_sel").find(".city_val").val(city_val);					
				})
				
			}else{
				$(this).removeClass('active')
				
			}
		})
		
		
		// $(".header").load("templates/header.html");
		// $(".footer").load("templates/footer.html");
		$.ajax({
			type:"get",
			url:"js/model/allCity.js",
			dataType:'json',
			success:function(res){
				console.log(res)
			}
			
		});
		
	})
	</script>
</html>
 