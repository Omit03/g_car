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

        $age=$this->get_car_allage();//车龄

        $licheng=$this->car_mileage();//里程

        $output=$this->output('');//排量

        $gearbox=$this->gearbox('');//变速箱

        $blowdown=$this->blowdown('');//排放标准

        $fuel=$this->fuel('');//燃料

        $car_body=$this->car_body('');//车身

        $car_drive=$this->car_drive('');//燃气

        $color =$this->color('');//颜色

        $er_car = $this->er_car($city_id);

        $ABC = $this->app_brand_ios();//A b c  按车型排序

        //dump($er_car);die;

        $this->assign('brand',$brand);
        $this->assign('price',$price);
        $this->assign('subface',$subface);
        $this->assign('er_car',$er_car);
        $this->assign('ABC',$ABC);
        $this->assign('age',$age);
        $this->assign('licheng',$licheng);
        $this->assign('output',$output);
        $this->assign('gearbox',$gearbox);
        $this->assign('fuel',$fuel);
        $this->assign('blowdown',$blowdown);
        $this->assign('car_drive',$car_drive);
        $this->assign('car_body',$car_body);
        $this->assign('color',$color);

        return $this->fetch();
    }
    
    /*
     * 车型对比
     */
    public function car_compare(){

        $brand = $this->brand();//品牌
        $this->assign('brand',$brand);
        return $this->fetch();
    }
}