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

    /*
    * O首付详情 和 推荐车源
    * http://39.106.67.47/new_api/User/Homepage/l_car_detail
    */
    public function l_car_detail(){

        $cheid=$_POST['cheid'];
        //获取车辆信息
        $carinfo=M("l_car")->field("id,brand_id,firm_id,cartype_id,price,can_price,sale_num,img_ids,img_512,gearbox,inlet_air,fuel,output,pay0_s2,pay0_y2,pay0_n2,subface,city_id")->where("id=$cheid")->find();
        $carinfo['img_url']=get_carimgs($carinfo['img_ids'],2);
        $carinfo['img_512']=get_carimgs($carinfo['img_512'],2);
        $carinfo['gearbox']=get_gearbox($carinfo['gearbox']);
        $carinfo['inlet_air']=get_inlet_air($carinfo['inlet_air']);
        $carinfo['fuel']=get_fuel($carinfo['fuel']);
        $carinfo['output']=get_output($carinfo['output']);
        $carinfo['pay0_s2']=$carinfo['pay0_s2'];
        $carinfo['pay0_y2']=$carinfo['pay0_y2'];
        //获取级别
        $subface=M("subface")->field("face_id,name")->where("face_id=".$carinfo['subface'])->find();
        $carinfo['subface']=$subface['name'];
        //获取品牌，厂商，名字
        $carinfo['car_name']=get_carname($carinfo['cartype_id']);
        $carinfo['brand']=M("car_brand")->where("id=".$carinfo['brand_id'])->getField("name");
        $carinfo['firm']=M("car_brand")->where("id=".$carinfo['firm_id'])->getField("name");
        unset($carinfo['img_ids']);
        unset($carinfo['brand_id']);
        unset($carinfo['firm_id']);
        unset($carinfo['cartype_id']);
        unset($carinfo['shop_id']);
        //获取最新de20条信息
        $carlist=M("l_car")->field("id,cartype_id,price,can_price,img_ids,img_512,pay0_s2,pay0_y2,pay0_n2")->where("id != $cheid and city_id=".$carinfo['city_id'])->order("id desc")->limit(20)->select();
        foreach($carlist as $key => $val){
            $carlist[$key]['img_url']=get_carimg($val['img_ids'],2);
            $carlist[$key]['img_512']=get_carimg($val['img_512'],2);
            $carlist[$key]['name']=get_carname($val['cartype_id']);
            $carlist[$key]['pay10_s2']=$val['pay0_s2'];
            $carlist[$key]['pay10_y2']=$val['pay0_y2'];
            unset($carlist[$key]['img_ids']);
            unset($carlist[$key]['pay0_y2']);
            unset($carlist[$key]['pay0_s2']);
        }
        $carinfo['carlist']=$carlist?$carlist:array();
        $carinfo['platform_phone']="0371-53375515";
        //print_r($carlist);die;
        $data=array(
            "code"=>200,
            "result"=>"获取成功",
            "body"=>$carinfo
        );
        $this->ajaxReturn($data);
    }

}