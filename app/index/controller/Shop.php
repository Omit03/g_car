<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16 0016
 * Time: 下午 9:03
 */

namespace app\index\controller;

use think\Db;

class Shop extends Common
{

    public function _empty(){

        $this->redirect('index/index');

    }

    public function index(){

        $city_id = $this->city_id();

        $brand = $this->brand();//品牌

        $price=$this->price(); //价格

        $subface=$this->subface();//级别

        $age = $this->get_car_allage();//车龄

        $new_car = $this->new_car($city_id); //新车

        //dump($new_car);die;

        $this->assign('brand',$brand);
        $this->assign('price',$price);
        $this->assign('subface',$subface);
        $this->assign('age',$age);
        $this->assign('new_car',$new_car);

        return $this->fetch();
    }

    /*
     * 在售车源
     */

    public function shop_list(){


        $city_id = $this->city_id();

        $brand = $this->brand();//品牌

        $price=$this->price(); //价格

        $subface=$this->subface();//级别

        $age = $this->get_car_allage();//车龄

        $er_car = $this->er_car($city_id); //二手车
        //dump($er_car);die;
        $this->assign('brand',$brand);
        $this->assign('price',$price);
        $this->assign('subface',$subface);
        $this->assign('age',$age);
        $this->assign('er_car',$er_car);

        return $this->fetch();
    }

    /*
     * 公司信息
     */

    public function shop_info(){

        $brand = $this->brand();//品牌

        $price=$this->price(); //价格

        $subface=$this->subface();//级别

        $this->assign('price',$price);
        $this->assign('subface',$subface);
        $this->assign('brand',$brand);

        return $this->fetch();
    }

    /*
     * 公司评论
     */
    public function add_comment(){

        $brand = $this->brand();//品牌

        $this->assign('brand',$brand);
        return $this->fetch();

    }

}