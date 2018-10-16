<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16 0016
 * Time: 上午 11:42
 */

namespace app\index\controller;

use Think\Db;

class Newcar extends Common
{

    /*
     * 空方法
     */
    public function _empty()
    {
        $this->redirect('index/index');
    }
    /*
     * 首页展示
     */
    public function index(){

        $city_id = $this->city_id();

        $brand = $this->brand();//品牌

        $price=$this->price(); //价格

        $subface=$this->subface();//级别

        $new_car = $this->new_car($city_id); //新车


        $this->assign('brand',$brand);
        $this->assign('price',$price);
        $this->assign('subface',$subface);
        $this->assign('new_car',$new_car);

        return $this->fetch();
    }

    /*
     * 新车详情
     */
    public function newcardetails(){

        echo input('param.id');

       return $this->fetch();

    }
}