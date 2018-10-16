<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16 0016
 * Time: 下午 5:13
 */

namespace app\index\controller;

use think\Db;
class Change  extends Common
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

        //dump( $er_car);die;

        $this->assign('er_car',$er_car);

        return $this->fetch();


    }
}