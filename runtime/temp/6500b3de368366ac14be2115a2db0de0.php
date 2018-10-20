<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:59:"G:\xampp\htdocs\car\public/../app/index\view\index\asd.html";i:1540013908;}*/ ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <title>筛选页面</title>
    <link rel="stylesheet" href="/gj/shouji/css/global.css"/>
    <link rel="stylesheet" href="/gj/shouji/css/common.css"/>
    <link rel="stylesheet" href="/gj/shouji/css/other.css" />
    <script src="/gj/shouji/js/common.js" type="text/javascript" charset="utf-8"></script>
    <style>
        .sea_item .jump_tag{display: block;}
        .no_otherCar{text-align: center;}
    </style>
</head>
<body>
<!--top 开-->

<div class="top fixed_top"  style="border: none;overflow: hidden;">
    <div class="wrap clearfix">
        <div class="back"><a href="javascript:history.go(-1)"><img src="img/p_back.png" alt="" /></a></div>
        <div class="top_le clearfix top_ipt">
            <input type="text" placeholder="搜索您想要的车" class="keySearch" value="<?php if(!empty($key)){ echo $key;}?>"/>
            <span class="search"/>搜索</span>
        </div>
        <div class="address"><p>郑州</p><img src="img/jtdn.png" alt=""/></div>
    </div>
</div>
<!--top 结-->
<!--中间 开-->
<div class="sea_content" id="selCont">
    <!--筛选按钮 开-->
    <div class="cont_btn cont_flex nav">

        <p class="hid">品牌</p>
        <b></b>
    </div>

    <p class="hid">价格</p>
    <b></b>
</div>
<div class="cont_btn_item hid moreFilter">
    <p class="hid">筛选</p>
    <b></b>
</div>

<p class="hid">排序</p>
<b></b>
</div>
</div>
<!--筛选按钮 结-->
<!--下拉内容 全部 开-->
<div class="sea_box">
    <!--品牌的下拉开-->
    <section style="display: none;" class="sea_item sea_ite1">

        <article class="listing_brand">
            <dl class=" hot_brand clearfix">
                <dt class="brand_tit" id="letter_hot">热门品牌</dt>


            </dl>

        </article>
        <!--某品牌某车款 的选择 开-->
        <article class="small_list clearfix">
            <div class="small_le"></div>
            <div class="small_ri">
                <div class="selected border_bt"><img src="img/bc.png" alt=""/><p class="hid"></p></div>
                <div class="no_type border_bt"><a href="javascript:void(0);"><p>不限车系</p></a></div>
                <div class="sel_list_item ">
                    <ul class="sel_list small_ul_list">
                        <!--<li ><p class="hid flt">奔驰 </p><span class="frt">查看车款 ></span></li>             -->
                    </ul>
                </div>
            </div>
        </article>
        <!--某品牌某车款 的选择 结-->
        <!--某品牌某系列 的选择 开-->
        <article class="result_list clearfix">
            <div class="result_list_le"></div>
            <div class="result_list_ri">
                <div class="selected border_bt"><img src="img/bc.png" alt=""/><p class="hid"></p></div>
                <div class="no_type border_bt"><p>不限车款</p></div>
                <div class="sel_list_item ">
                    <ul class="sel_list result_ul_list">
                        <li class="res_list"><p class="hid"> </p></li>
                    </ul>
                </div>
            </div>
        </article>
        <div class="jump_tag">
            <ul>
                <li data_href="letter_hot"><a href="#letter_hot">热</a></li>
                <li data_href="letter_A"><a href="#letter_A">A</a></li>
                <li data_href="letter_B"><a href="#letter_B">B</a></li>
                <li data_href="letter_C"><a href="#letter_C">C</a></li>
                <li data_href="letter_D"><a href="#letter_D">D</a></li>

                <li data_href="letter_F"><a href="#letter_F">F</a></li>
                <li data_href="letter_G"><a href="#letter_G">G</a></li>
                <li data_href="letter_H"><a href="#letter_H">H</a></li>

                <li data_href="letter_I"><a href="#letter_I">I</a></li>
                <li data_href="letter_J"><a href="#letter_J">J</a></li>
                <li data_href="letter_K"><a href="#letter_K">K</a></li>
                <li data_href="letter_L"><a href="#letter_L">L</a></li>
                <li data_href="letter_M"><a href="#letter_M">M</a></li>
                <li data_href="letter_N"><a href="#letter_N">N</a></li>
                <li data_href="#letter_O"><a href="#letter_O">O</a></li>
                <li data_href="letter_P"><a href="#letter_P">P</a></li>


                <li data_href="letter_Q"><a href="#letter_Q">Q</a></li>
                <li data_href="letter_R"><a href="#letter_R">R</a></li>
                <li data_href="letter_S"><a href="#letter_S">S</a></li>
                <li data_href="letter_T"><a href="#letter_T">T</a></li>

                <li data_href="letter_W"><a href="#letter_W">W</a></li>
                <li data_href="letter_X"><a href="#letter_X">X</a></li>
                <li data_href="letter_Y"><a href="#letter_Y">Y</a></li>
                <li data_href="#letter_Z"><a href="#letter_Z">Z</a></li>
            </ul>
        </div>
    </section>
    <!--价格 的 下拉 开-->
    <div class="sea_item sea_ite2 price" style="display: none;">
        <ul class="item_list2 ">

            <!--价格程序开始-->


            <!--价格程序开始-->


        </ul>
        <!--关闭 按钮-->
        <!--关<ul class="md50 flex btn_sel">
            <li><p class="reset1">重置</p></li>
            <li><p class="close look_on price_res">立即查看</p></li>
          </ul> */-->
    </div>

    <!--筛选 的 下拉 开-->
    <div class="sea_item sea_item3 filter" style="display: none;">
        <!--循环体 开-->
        <div class="item_list3_box">
            <div class="list3_ti type ">
                <p class="list3_ti_le hid" data="">类型</p>
                <p class="list3_ti_ri" >
                    <!--收齐-->
                    <span></span>
                    <img src="img/jian_4.png" alt=""/>
                </p>
            </div>
            <div class="item_list3" style="display: none;">
                <ul class="">
                    <li data="1"><p class="hid">商家车</p></li>
                    <li data="2"><p class="hid">认证车</p></li>
                    <li data="3"><p class="hid">个人车</p></li>
                </ul>
            </div>
        </div>
        <div class="item_list3_box">
            <div class="list3_ti car_age">
                <p class="list3_ti_le hid" data="" >车龄</p>
                <p class="list3_ti_ri" >
                    <!--收齐-->
                    <span></span>
                    <img src="/gj/shouji/img/jian_4.png" alt=""/>
                </p>
            </div>
            <div class="item_list3" style="display: none;">
                <ul class="">

                </ul>
            </div>
        </div>
        <div class="item_list3_box">
            <div class="list3_ti car_mileage">
                <p class="list3_ti_le hid" data="" >里程</p>
                <p class="list3_ti_ri" >
                    <!--收齐-->
                    <span></span>
                    <img src="img/jian_4.png" alt=""/>
                </p>
            </div>
            <div class="item_list3" style="display: none;">
                <ul class="">

                </ul>
            </div>
        </div>

        <div class="item_list3_box">
            <div class="list3_ti subface">
                <p class="list3_ti_le hid" data="" >级别</p>
                <p class="list3_ti_ri" >
                    <!--收齐-->
                    <span></span>
                    <img src="img/jian_4.png" alt=""/>
                </p>
            </div>
            <div class="item_list3" style="display: none;">
                <ul class="">

                </ul>
            </div>
        </div>

        <div class="item_list3_box">
            <div class="list3_ti output">
                <p class="list3_ti_le hid" data="" >排量</p>
                <p class="list3_ti_ri" >
                    <!--收齐-->
                    <span></span>
                    <img src="img/jian_4.png" alt=""/>
                </p>
            </div>
            <div class="item_list3" style="display: none;">
                <ul class="">

                </ul>
            </div>
        </div>

        <div class="item_list3_box">
            <div class="list3_ti gearbox">
                <p class="list3_ti_le hid" data="" >变速箱</p>
                <p class="list3_ti_ri" >
                    <!--收齐-->
                    <span></span>
                    <img src="img/jian_4.png" alt=""/>
                </p>
            </div>
            <div class="item_list3" style="display: none;">
                <ul class="">

                </ul>
            </div>
        </div>

        <div class="item_list3_box">
            <div class="list3_ti blowdown">
                <p class="list3_ti_le hid" data="" >排放标准</p>
                <p class="list3_ti_ri" >
                    <!--收齐-->
                    <span></span>
                    <img src="img/jian_4.png" alt=""/>
                </p>
            </div>
            <div class="item_list3" style="display: none;">
                <ul class="">

                </ul>
            </div>
        </div>
        <div class="item_list3_box">
            <div class="list3_ti car_drive">
                <p class="list3_ti_le hid" data="" >驱动</p>
                <p class="list3_ti_ri" >
                    <!--收齐-->
                    <span></span>
                    <img src="img/jian_4.png" alt=""/>
                </p>
            </div>
            <div class="item_list3" style="display: none;">
                <ul class="">

                </ul>
            </div>
        </div>

        <div class="item_list3_box">
            <div class="list3_ti car_body">
                <p class="list3_ti_le hid" data="" >车身</p>
                <p class="list3_ti_ri" >
                    <!--收齐-->
                    <span></span>
                    <img src="img/jian_4.png" alt=""/>
                </p>
            </div>
            <div class="item_list3" style="display: none;">
                <ul class="">

                </ul>
            </div>
        </div>

        <!--循环体 结-->
        <!--颜色 部分 开-->
        <div class="item_list3_box">
            <div class="list3_ti color">
                <p class="list3_ti_le hid" data="">颜色</p>
                <p class="list3_ti_ri">
                    <!--收齐-->
                    <span></span>
                    <img src="img/jian_4.png" alt=""/>
                </p>
            </div>
            <div class="item_list3 color_list"  style="display: none;">
                <ul class="color_all ">


                </ul>
            </div>
        </div>
        <!--颜色 部分 结-->

        <div class="item_list3_box">
            <div class="list3_ti fuel">
                <p class="list3_ti_le hid sel_tits" data="" >燃料</p>
                <p class="list3_ti_ri" >
                    <!--收齐-->
                    <span></span>
                    <img src="img/jian_4.png" alt=""/>
                </p>
            </div>
            <div class="item_list3" style="display: none;">
                <ul class="">

                </ul>
            </div>
        </div>
        <!--底部 重置 部分 开-->

        <ul class="md50 flex btn_sel">
            <li><p class="reset1">重置</p></li>
            <li><p class="close look_on filter_res">立即查看</p></li>
        </ul>
        <!--底部 重置 结 开-->
    </div>
    <!--价格 的 下拉 结-->

    <!--排序 的 下拉 开-->
    <div class="sea_item sea_item5" style="display: none;">
        <ul class="item_list5">
            <li data="1" class=""><p class="hid">默认排序</p><span class="select_pai"></span></li>
            <li data="2" class=""><p class="hid ">车价由高到低</p><span class="select_pai"></span></li>
            <li data="3"  class=""><p class="hid ">车价由低到高</p><span class="select_pai"></span></li>
            <li data="4" class=""><p class="hid ">车龄最短</p><span class="select_pai"></span></li>
            <li data="5" class=""><p class="hid ">车龄最长</p><span class="select_pai"></span></li>
            <li data="6" class=""><p class="hid ">里程最多</p><span class="select_pai"></span></li>
            <li data="7" class=""><p class="hid ">里程最少</p><span class="select_pai"></span></li>
        </ul>

    </div>
    <!--排序 的 下拉 结-->
</div>
<!--下拉内容 全部 结-->
<!--车辆 展示 开-->
<div class="show padding martpCon">

    <ul class="list martp">


        <select name=''  id='selPage'  onchange='javascript:location.href=this.value;'>";


<li class="item border">
    <a href="/gj/shouji/oCar/" class="car_img" title="">

        <img src="http://www.gj2car.com//Uploads/relecar/" alt="" />

        <img src="http://www.gj2car.com/Uploads/relecar/" alt="" />

    </a>





        <p class=""> | 万公里 | 郑州</p>
        <div class="pay_ment"><span class="pay_first"><b>万 </b></span><span class="price_new">新车

						</span></div>
    </a>
</li>


<div class="no_otherCar">
    <img src="../img/error.png" alt="" class="error_img"/>
    <p class="no_shu">当前没有符合您筛选的车型~</p>
    <div class="refresh other_car"><a href="./oldFiltrate3?name=1">看看别的车型</a>  </div>
</div>

</ul>



</div>
<div class="appbanner">
    <img src="img/appb.png" alt="" class="downapp">
</div>
</div>
<div class="mask2"></div>


<!--添加代码结束-->
</body>

</html>