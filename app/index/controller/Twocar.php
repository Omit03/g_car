<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16 0016
 * Time: 下午 1:42
 */

namespace app\index\controller;

use Think\Db;

class Twocar extends Common
{

    /*
     * 首页展示
     */
    public function index(){

        $city_id = $this->city_id();

        $brand = $this->brand();//品牌

        $price=$this->price(); //价格

        $subface=$this->subface();//级别

        $er_car = $this->er_car($city_id);

        $ABC = $this->app_brand_ios();//A b c  按车型排序

        //dump($er_car);die;

        $this->assign('brand',$brand);
        $this->assign('price',$price);
        $this->assign('subface',$subface);
        $this->assign('er_car',$er_car);
        $this->assign('ABC',$ABC);

        return $this->fetch();
    }
}