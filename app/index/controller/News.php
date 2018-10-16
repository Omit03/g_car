<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16 0016
 * Time: 下午 6:25
 */

namespace app\index\controller;

use think\Db;

class News extends Common
{

    public function _empty(){

        $this->redirect('index/index');
    }
    /*
     * 置换首页
     */
    public function index(){

        $city_id = $this->city_id();

        $er_car = $this->er_car($city_id);

        $new_car = $this->new_car($city_id); //新车

        //dump( $er_car);die;

        $this->assign('er_car',$er_car);
        $this->assign('new_car',$new_car);

        return $this->fetch();


    }
}