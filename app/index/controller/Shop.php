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

        $brand = $this->brand();//品牌
        $price=$this->price(); //价格

        $subface=$this->subface();//级别
        $this->assign('brand',$brand);
        $this->assign('price',$price);
        $this->assign('subface',$subface);

        return $this->fetch();
    }

    public function shop_list(){


        $brand = $this->brand();//品牌

        $price=$this->price(); //价格

        $subface=$this->subface();//级别

        $this->assign('brand',$brand);
        $this->assign('price',$price);
        $this->assign('subface',$subface);

        return $this->fetch();
    }

    public function shop_info(){

        $brand = $this->brand();//品牌

        $price=$this->price(); //价格

        $subface=$this->subface();//级别

        $this->assign('price',$price);
        $this->assign('subface',$subface);
        $this->assign('brand',$brand);

        return $this->fetch();
    }
}