<?php
namespace app\index\controller;
use think\Request;
use think\Loader;
use think\Db;
use think\Controller;
class Index  extends Common
{
    public function index(){

        $ip = $this->request->ip();

        $city = $this->get_area('61.163.128.204');//暂时写死

        $city_id = $this->get_city($city['data']['city']);
        //banner
        $banner=Db::table("home_car_app")->where("city_id=".$city_id)->order("sort asc")->select();
        //echo M("home_car_app")->getlastsql();
        foreach ($banner as $key => $val) {
            $banner[$key]['img_url']=$this->get_carimg($val['img'],1);
        }
        //获取筛选模块 推荐品牌，，车龄，里程数，级别
        $brand=Db::table("car_brand")->field("id,img_id,name")->where("id in (1,9,10,19,20,22)")->select();
        foreach ($brand as $key => $val) {
            $brand[$key]['img_url']=$this->get_carimg($val['img_id'],3);
            unset($brand[$key]["img_id"]);
        }
         //价格
        $price=Db::table("price_range")->field("price_id as id,name")->order("level asc")->limit(4)->select();
        //级别
        $subface=Db::table("subface")->field("face_id as id,name")->order("level asc")->limit(5)->select();

       // dump($subface);die;
        /*
         * 新车
         */
        $new_car=Db::table("new_car")->field("id,brand_id,sys_id,cartype_id,price,img_300,pay10_s2,pay10_y2,pay10_n2")->where("is_tj=1 and status=1 and city_id=".$city_id)->order("create_time desc")->limit(20)->select();
        foreach ($new_car as $key => $val) {
            $new_car[$key]['img_url']=$this->get_carimg($val['img_300'],2);
            $new_car[$key]['name']=$this->get_carname($val['cartype_id']);
            $new_car[$key]['pay10_s2']=$val['pay10_s2'];
            $new_car[$key]['pay10_y2']=$val['pay10_y2'];
            unset($new_car[$key]['img_300']);
        }
        //二手

        $er_car=Db::table("rele_car")->field("pu_id,cartype_id,price,car_cardtime,car_mileage,img_300")->where("status=1 and up_under=1 and city_id=$city_id")->order("create_time desc")->limit(20)->select();
        foreach ($er_car as $k => $val) {
            $er_car[$k]['name']=$this->get_carname($val['cartype_id']);
            $er_car[$k]['img_url']=$this->get_carimg($val['img_300'],1);
            $er_car[$k]['car_mileage']=$val['car_mileage'];
            //unset($er_car[$k]['cartype_id']);
            unset($er_car[$k]['img_300']);
            //获取 新车的价格
//            $new_car_prince=M("param")->field("id,info_1")->where("cartype_id=".$val['pu_id'])->find();
//            $car_new[$k]['new_car_price']=$new_car_prince['info_1']; //表内并有字段 报错
            $new_car_prince=Db::table("param")->field("id,price")->where("id=".$val['pu_id'])->find();//id换成 info_1 换成price
            $er_car[$k]['new_car_price']=$new_car_prince['price'];
        }
        //零首付
        $car_zero=Db::table("l_car")->field("id,cartype_id,price,img_300,pay0_s2,pay0_y2,pay0_n2")->where("is_tj=1 and status=1 and city_id=$city_id")->order("create_time desc")->limit(5)->select();
        foreach ($car_zero as $key => $val) {
            $car_zero[$key]['img_url']=$this->get_carimg($val['img_300'],2);
            $car_zero[$key]['name']=$this->get_carname($val['cartype_id']);
            $car_zero[$key]['pay10_s2']=$car_zero[$key]['pay0_s2'];
            $car_zero[$key]['pay10_y2']=$car_zero[$key]['pay0_y2'];
            $car_zero[$key]['pay10_n2']=$car_zero[$key]['pay0_n2'];
            unset($car_zero[$key]['img_300']);
            unset($car_zero[$key]['cartype_id']);
            unset($car_zero[$key]['pay0_s2']);
            unset($car_zero[$key]['pay0_y2']);
            unset($car_zero[$key]['pay0_n2']);
        }

        $this->assign('banner',$banner);
        $this->assign('brand',$brand);
        $this->assign('price',$price);
        $this->assign('subface',$subface);
        $this->assign('new_car',$new_car);
        $this->assign('er_car',$er_car);
        $this->assign('car_zero',$car_zero);

        return $this->fetch();
    }
    /*
     * 空方法
     */
    public function _empty()
    {
        $this->redirect('index/index');
    }

    public function person_manage(){

        return $this->fetch();
    }

    /*
     * 登录 展示
     */
    public function logincar(){

        return $this->fetch();
    }

    /*
     * 测试代码
    */
    public function test(){

        return $this->fetch();
    }

    public function addComment(){

        return $this->fetch();
    }

    /*
     * 新车
     */
    public function newCar(){

        return $this->fetch();
    }

    /*
     * 二手车
     */
    public function carlist(){

        return $this->fetch();
    }

    /*
     * 卖车
     */
    public function sell(){

        $res = $this->app_brand_ios();//A b c  按车型排序

        $er_car = $this->er_car();

        $this->assign('res',$res);
        $this->assign('er_car',$er_car);

        return $this->fetch();
    }

    /*
     * 置换
     */
    public function change(){

        return $this->fetch();
    }
    /*
     * 置换
     */
    public function news(){

        return $this->fetch();
    }
    /*
     * app 下载
     */
    public function appdownload(){

        return $this->fetch();
    }

    /*
     *my_appointment
     * 我的预约
     * http://39.106.67.47/new_api/User/newapi/my_appointment
     * user_id
     * type 代表类型 如新车//type类型1.新车，2.二手车，3.0首付
     * page
     * page_size
 */
    public function my_appointment()
    {
//        /*接收参数*/
//        $data =  $this->params;

        $user_id   = input('param.user_id');
        $type = input('param.type');
        $page   = input('param.page');
        $page_size    = input('param.page_size');

        $type=$type?$type:1;

//        $user_id= $user_id;
//        //分页
//        $page=$page ;
        $page_size=$page_size;
        $min_num=($page-1)*$page_size;
        //type类型1.新车，2.二手车，3.0首付
        $list=array();
        if($type==1){
            //查询预约信息
            $appointmen=Db::table("my_appointment")->field("id,cheid,create_time")->where("userid=$user_id and type=1")->select();
            if(!$appointmen){
                $appointmen=array();
            }
            $newcar_info=Db::table("new_car_consult3")->field("id,car_id as cheid,create_time")->where("user_id=$user_id and car_id!= ''")->select();
            if(!$newcar_info){
                $newcar_info=array();
            }
            $appointmen=array_merge($appointmen,$newcar_info);

            foreach ($appointmen as $key => $val) {
                //新车
                $car_info=Db::table("new_car")->field("id,name,cartype_id,price,can_price,pay30_s2,img_300")->where("id=".$val['cheid'])->select();

                foreach ($car_info as $k => $v) {

                    dump($v['cartype_id']);die;
                    $res['name']=$this->get_carname($v['cartype_id']);
                    $res['img_url']=$this->get_carimg($v['img_300'],2);
                    $res['create_time']=substr($val['create_time'], 0, 16);
                    $res['id']=$v['id'];
                    $res['price']=$v['price'];
                    $res['can_price']=$v['can_price'];
                    $res['pay30_s2']=$v['pay30_s2'];
                    $list[]=$res;
                }
                $list=array_slice($list,$min_num,$page_size);

            }

        }elseif($type==2){
            //查询预约信息
            $appointmen=Db::table("my_appointment")->field("id,cheid,create_time")->where("userid=$user_id and type=2")->select();
            if(!$appointmen){
                $appointmen=array();
            }

            //获取二手车预约信息
            $relecar_info=Db::table("bespeak_car")->field("bespeak_id as id,pu_id as cheid,create_time")->where("user_id=$user_id and pu_id != ''")->select();
            if(!$relecar_info){
                $relecar_info=array();
            }
            $appointmen=array_merge($appointmen,$relecar_info);

            foreach ($appointmen as $key => $val) {
                //二手车
                $field = 'a.pu_id,a.name_li,a.cartype_id,a.price,a.car_cardtime,a.car_mileage,a.img_300,b.shop_name';

                $where['pu_id'] = $val['cheid'];

                $join = [['user_shop b','b.user_id = a.user_id']];

                $car_info = Db::name('rele_car')->alias('a')->join($join)->field($field)->where($where)->select();

               // $car_info=Db::table("rele_car")->alias('rele_car as  a')->join('user_shop as b on b.user_id = a.user_id')->field("a.pu_id,a.name_li,a.cartype_id,a.price,a.car_cardtime,a.car_mileage,a.img_300,b.shop_name")->where("pu_id=".$val['cheid'])->select();

                foreach ($car_info as $k => $v) {

                    $res['name']=$this->get_carname($v['cartype_id']);
                    $res['img_url']=$this->get_carimg($v['img_300'],1);
                    $res['create_time']=substr($val['create_time'], 0, 16);
                    $res['car_mileage']=$v['car_mileage'];
                    $res['pu_id']=$v['pu_id'];
                    $res['price']=$v['price'];
                    $res['car_cardtime']=$v['car_cardtime'];
                    $res['shop_name']=$v['shop_name'];
                    $list[]=$res;

                }

            }
            $list=array_slice($list,$min_num,$page_size);

            //print_r($list);die;
        }elseif($type==3){
            //查询预约信息
            $appointmen=Db::table("my_appointment")->field("id,cheid,create_time")->where("userid=$user_id and type=3")->select();
            if(!$appointmen){
                $appointmen=array();
            }
            $lcar_info=Db::table("l_car_consult")->field("id,car_id as cheid,create_time")->where("user_id=$user_id and car_id!= ''")->select();
            if(!$lcar_info){
                $lcar_info=array();
            }
            $appointmen=array_merge($appointmen,$lcar_info);
            foreach ($appointmen as $key => $val) {
                //0首付
                $car_info=Db::table("l_car")->field("id,name,cartype_id,price,can_price,img_300")->where("id=".$val['cheid'])->select();
                foreach ($car_info as $k => $v) {
                    $res['name']=$this->get_carname($v['cartype_id']);
                    $res['img_url']=$this->get_carimg($v['img_300'],2);
                    $res['create_time']=substr($val['create_time'], 0, 16);
                    $res['id']=$v['id'];
                    $res['price']=$v['price'];
                    $res['can_price']=$v['can_price'];
                    $list[]=$res;
                }
            }


            $list=array_slice($list,$min_num,$page_size);

        }
        dump($list);die;
        $this->assign('list',$list);

        return $this->fetch();
    }

    /**
     *  零首付首页 推荐
     */
    public function l_car_homepage(){

        //需要处理当前城市

        $ip = $this->request->ip();

        $city = $this->get_area('61.163.128.204');//暂时写死

        $city_id = $this->get_city($city['data']['city']);

        $car_zero=Db::table("l_car")->field("id,cartype_id,price,img_300,pay0_s2,pay0_y2,pay0_n2")->where("is_tj=1 and status=1 and city_id=$city_id")->order("create_time desc")->limit(5)->select();
        foreach ($car_zero as $key => $val) {
            $car_zero[$key]['img_url']=$this->get_carimg($val['img_300'],2);
            $car_zero[$key]['name']=$this->get_carname($val['cartype_id']);
            $car_zero[$key]['pay10_s2']=$car_zero[$key]['pay0_s2'];
            $car_zero[$key]['pay10_y2']=$car_zero[$key]['pay0_y2'];
            $car_zero[$key]['pay10_n2']=$car_zero[$key]['pay0_n2'];
            unset($car_zero[$key]['img_300']);
            unset($car_zero[$key]['cartype_id']);
            unset($car_zero[$key]['pay0_s2']);
            unset($car_zero[$key]['pay0_y2']);
            unset($car_zero[$key]['pay0_n2']);
        }

       dump($car_zero);
    }

    /*
     * app 首页接口
     * 新车推荐
     */
    public function xinche(){

        //需要处理当前城市

        $ip = $this->request->ip();

        $city = $this->get_area('61.163.128.204');//暂时写死

        $city_id = $this->get_city($city['data']['city']);

        $new_car=Db::table("new_car")->field("id,brand_id,sys_id,cartype_id,price,img_300,pay10_s2,pay10_y2,pay10_n2")->where("is_tj=1 and status=1 and city_id=".$city_id)->order("create_time desc")->limit(20)->select();
        foreach ($new_car as $key => $val) {
            $new_car[$key]['img_url']=$this->get_carimg($val['img_300'],2);
            $new_car[$key]['name']=$this->get_carname($val['cartype_id']);
            $new_car[$key]['pay10_s2']=$val['pay10_s2'];
            $new_car[$key]['pay10_y2']=$val['pay10_y2'];
            unset($new_car[$key]['img_300']);
        }

        dump($new_car);
    }
    /*
     * 二手推荐
     * 最新上架
     */
    public function ershou()
    {
        $ip = $this->request->ip();

        $city = $this->get_area('61.163.128.204');//暂时写死

        $city_id = $this->get_city($city['data']['city']);

        $er_car=Db::table("rele_car")->field("pu_id,cartype_id,price,car_cardtime,car_mileage,img_300")->where("status=1 and up_under=1 and city_id=$city_id")->order("create_time desc")->limit(20)->select();
        foreach ($er_car as $k => $val) {
            $er_car[$k]['name']=$this->get_carname($val['cartype_id']);
            $er_car[$k]['img_url']=$this->get_carimg($val['img_300'],1);
            $er_car[$k]['car_mileage']=$val['car_mileage'];
            unset($er_car[$k]['cartype_id']);
            unset($er_car[$k]['img_300']);
            //获取 新车的价格
//            $new_car_prince=Db::table("param")->field("id,price")->where("cartype_id=".$val['pu_id'])->find();
//           $car_new[$k]['new_car_price']=$new_car_prince['info_1']; //表内并有字段 报错
            $new_car_prince=Db::table("param")->field("id,price")->where("id=".$val['pu_id'])->find();//id换成 info_1 换成price
            $er_car[$k]['new_car_price']=$new_car_prince['price'];
        }

        dump($er_car);
    }

    /*
 * 文章页
 */
    public function pcnewindex(){

        $type = input('param.type');

        if (!empty($type)) {

            $where['new_type'] = $type;

        }

        $where['is_del'] = 0;
        $where['is_show'] = 1;

        $list =  Db::table('car_pc_news')->where($where)->order('sort','desc')->select();

        $data = array("data" => array());

        if ($list) {

            $data['data'] = $list;

        }
        echo json_encode($data);

    }

    /*
     * 文章详情页
     */
    public function pcnewdetail(){

        $id = input('param.id');

        $types = input('param.type');

        $where['is_del'] = 0;
        $where['is_show'] = 1;
        $where['new_type'] = $types;
        //$where['new_type'] = array('neq',8);

        // 查询数据 - 上一页
        $where['id']  = ['>',$id];
        $up = Db::table('car_pc_news')
            ->where($where )
            ->field('id,titles,new_type')
            ->order('id', '')
            ->limit(1)
            ->select();
        //dump($up);

        // 查询数据 - 下一页
        $where['id']  = ['<',$id];
        $next = Db::table('car_pc_news')
            ->where($where )
            ->field('id,titles,new_type')
            ->order('id', 'desc')
            ->limit(1)
            ->select();

        $where['id'] = $id;

        $list =  Db::table('car_pc_news')->where($where)->order('sort','desc')->select();

        $data = array("data" => array());



        $data['data'] = $list;
        $data['up'] = $up;
        $data['next'] = $next;


        echo json_encode($data);
    }

}