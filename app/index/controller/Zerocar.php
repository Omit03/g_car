<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/18 0018
 * Time: 上午 9:18
 */

namespace app\index\controller;

use think\Db;
class Zerocar  extends Common
{

    /*
     * 空方法
     */
    public function _empty(){

        $this->redirect('index/index');
    }

    public function index()
    {
        return $this->fetch();
    }

    /*
    * O首付详情 和 推荐车源
    * http://39.106.67.47/new_api/User/Homepage/l_car_detail
    */
    public function zerocardetails(){

        $data = $this->params;

        $cheid=$data['cheid'];
        //获取车辆信息
        $carinfo=Db::table("l_car")->field("id,brand_id,firm_id,cartype_id,price,can_price,sale_num,img_ids,img_512,gearbox,inlet_air,fuel,output,pay0_s2,pay0_y2,pay0_n2,subface,city_id")->where("id=$cheid")->find();
        $carinfo['img_url']=$this->get_carimgs($carinfo['img_ids'],2);
        $carinfo['img_512']=$this->get_carimgs($carinfo['img_512'],2);
        $carinfo['gearbox']=$this->get_gearbox($carinfo['gearbox']);
        $carinfo['inlet_air']=$this->get_inlet_air($carinfo['inlet_air']);
        $carinfo['fuel']=$this->get_fuel($carinfo['fuel']);
        $carinfo['output']=$this->get_output($carinfo['output']);
        $carinfo['pay0_s2']=$carinfo['pay0_s2'];
        $carinfo['pay0_y2']=$carinfo['pay0_y2'];
        //获取级别
        $subface=Db::table("subface")->field("face_id,name")->where("face_id=".$carinfo['subface'])->find();
        $carinfo['subface']=$subface['name'];
        //获取品牌，厂商，名字
        $carinfo['car_name']=$this->get_carname($carinfo['cartype_id']);
        $carinfo['brand']=Db::table("car_brand")->where("id=".$carinfo['brand_id'])->value("name");
        $carinfo['firm']=Db::table("car_brand")->where("id=".$carinfo['firm_id'])->value("name");
        unset($carinfo['img_ids']);
        unset($carinfo['brand_id']);
        unset($carinfo['firm_id']);
        unset($carinfo['cartype_id']);
        unset($carinfo['shop_id']);
        //获取最新de20条信息
        $carlist=Db::table("l_car")->field("id,cartype_id,price,can_price,img_ids,img_512,pay0_s2,pay0_y2,pay0_n2")->where("id != $cheid and city_id=".$carinfo['city_id'])->order("id desc")->limit(10)->select();
        foreach($carlist as $key => $val){
            $carlist[$key]['img_url']=$this->get_carimg($val['img_ids'],2);
            $carlist[$key]['img_512']=$this->get_carimg($val['img_512'],2);
            $carlist[$key]['name']=$this->get_carname($val['cartype_id']);
            $carlist[$key]['pay10_s2']=$val['pay0_s2'];
            $carlist[$key]['pay10_y2']=$val['pay0_y2'];
            unset($carlist[$key]['img_ids']);
            unset($carlist[$key]['pay0_y2']);
            unset($carlist[$key]['pay0_s2']);
        }
        $carparam = $this->get_carparam($cheid,3);

        //dump($carparam);die;
        $carinfo['carlist']=$carlist?$carlist:array();
        $carinfo['platform_phone']="0371-53375515";

        //dump($carinfo);die;

        $brand = $this->brand();//品牌
        $this->assign('brand',$brand);
        $this->assign('carinfo',$carinfo);
        $this->assign('carparam',$carparam);

        return $this->fetch();
    }

}