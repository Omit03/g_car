<?php
namespace app\index\controller;
use think\Request;
use think\Loader;
use think\Db;
use think\Controller;
class Index  extends Common
{
    public function index(){

       $city_id = $this->city_id();
        //banner
        $banner=Db::table("home_car_app")->where("city_id=".$city_id)->order("sort asc")->select();

        foreach ($banner as $key => $val) {
            $banner[$key]['img_url']=$this->get_carimg($val['img'],1);
        }

        $brand=$this->brand();//获取筛选模块 推荐品牌

        $price=$this->price(); //价格

        $subface=$this->subface();//级别

        $new_car = $this->new_car($city_id); //新车

        $er_car = $this->er_car($city_id);//二手

        $car_zero = $this->car_zero($city_id);//零首付


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
    public function newcar(){


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

        $city_id = $this->city_id();

        $er_car = $this->er_car($city_id);

        $brand = $this->brand();//品牌

        $this->assign('res',$res);
        $this->assign('er_car',$er_car);
        $this->assign('brand',$brand);

        return $this->fetch();
    }

    /*
     * 置换
     */
    public function change(){

        return $this->fetch();
    }
    /*
     * 新闻
     */
    public function news(){

        return $this->fetch();
    }
    /*
     * app 下载
     */
    public function appdownload(){

        $brand = $this->brand();//品牌

        $this->assign('brand',$brand);

        return $this->fetch();
    }

    /*
     * 登录 展示
     */
    public function logincar(){

        $brand = $this->brand();//品牌
        $this->assign('brand',$brand);
        return $this->fetch();
    }

    /*
     * 关于我们
     */
    public function join_us(){

        $brand = $this->brand();//品牌
        $this->assign('brand',$brand);

        return $this->fetch();
    }
    /*
     * 关于联系
     */
    public function link_us(){

        $brand = $this->brand();//品牌
        $this->assign('brand',$brand);

        return $this->fetch();
    }    /*
     * 关于服务保障
     */
    public function service(){

        $brand = $this->brand();//品牌
        $this->assign('brand',$brand);

        return $this->fetch();
    }    /*
     * 关于网站地图
     */
    public function website(){
        $brand = $this->brand();//品牌
        $this->assign('brand',$brand);

        return $this->fetch();
    }
    
    /*
     * 新车详情
     */
    public function details(){

        $data = $this->params;

        $cheid=$data['cheid'];

        //获取车辆信息
        $carinfo=Db::table("rele_car")->field("pu_id,user_id,brand_id,sys_id,cartype_id,price,car_mileage,car_age,output,gearbox,car_cardtime,blowdown,subface_img,img_512,car_desc,pay20_s2,pay20_y2,pay20_n2,city_id")->where("pu_id=$cheid")->find();
        //echo M("rele_car")->getlastsql();

        $carinfo['brand_name']=Db::table("car_brand")->where("id=".$carinfo['brand_id']." and level=1")->value('name');
        $carinfo['sys_name']=Db::table("car_brand")->where("id=".$carinfo['sys_id']." and level=3")->value('name');
        $carinfo['img_url']=$this->get_carimgs($carinfo['subface_img'],1);
        $carinfo['img_512']=$this->get_carimgs($carinfo['img_512'],1);
        $carinfo['gearbox']=$this->get_gearbox($carinfo['gearbox']);
        $carinfo['output']=$this->get_output($carinfo['output']);
        $carinfo['car_age']=$this->get_car_age($carinfo['car_age']);
        //$carinfo['color']=get_color($carinfo['color']);
        $carinfo['blowdown']=$this->get_blowdown($carinfo['blowdown']);
        $pay20_s2=$carinfo['pay20_s2']?$carinfo['pay20_s2']:"--";
        $pay20_y2=$carinfo['pay20_y2']?$carinfo['pay20_y2']:"--";
        $carinfo['pay20_n2']=$carinfo['pay20_n2']?$carinfo['pay20_n2']:"36";
        if($carinfo['pay20_s2']!=0){
            $carinfo['pay20_s2']=$carinfo['pay20_s2'];
        }else{
            $carinfo['pay20_s2']="--";
        }
        if($carinfo['pay20_y2']!=0){
            $carinfo['pay20_y2']=$carinfo['pay20_y2'];
        }else{
            $carinfo['pay20_y2']="--";
        }
        $carinfo['car_mileage']=$carinfo['car_mileage'];
        //获取新车价格参数
//        $new_price=Db::table("param")->field('id,info_1')->where("cartype_id=$cheid")->find();
//        $carinfo['new_price']=$new_price['info_1']?$new_price['info_1']:"";
        //info_1 找不到  把表换成param6  cartype_id 两表都没有 换成了 id
        $new_price=Db::table("param6")->field('id,info_1')->where("id",$cheid)->find();
        $carinfo['new_price']=$new_price['info_1']?$new_price['info_1']:"";
        //获取品牌，厂商，名字
        $carinfo['car_name']=$this->get_carname($carinfo['cartype_id']);

        //获取店铺的详情
        $shopinfo=Db::table("user_shop")->field("shop_id,shop_name,mimg,shop_address,shop_phone,qid,latitude as lat,longitude as lng")->where("user_id=".$carinfo['user_id'])->find();

        //获取店铺de平均评分
        $remark_info=Db::table("remark")->field("id,all_score")->where("shop_id",$shopinfo['shop_id'])->select();
        $all_score="";

        foreach ($remark_info as $k => $v) {
            $all_score.=$v['all_score'];
           // $all_score+=$v['all_score'];
        }
        $user_num=count($remark_info);

        $all_score = intval($all_score);

        $user_num = intval($user_num);

        if(empty($user_num)){

            $user_num = 1;
        }

        $num=number_format($all_score/$user_num,1);
        $shopinfo['all_score']=$num?$num:0;
        $shopinfo['user_num']=$user_num?$user_num:0;
        $shopinfo['img_url']=$this->get_carimg($shopinfo['mimg']);

        //点评
        $remark=Db::table("remark")->field("id,user_id,content,create_time,all_score")->where("shop_id",$shopinfo['shop_id'])->order("create_time desc")->find();
       // dump($remark);die;
        if (empty($remark)){

            $remark['create_time']=substr($remark['create_time'], 0, 10)?substr($remark['create_time'], 0, 10):"";
            //获取用户的信息
            $userinfo=Db::table("user")->field("user_id,nickname,header_pic,phone")->where("user_id=".$remark['user_id'])->find();
            if($userinfo['header_pic']){
                $header_pic=$this->get_carimg($userinfo['header_pic']);
            }else{
                $header_pic="";
            }
            $remark['header_pic']=$header_pic?$header_pic:"";
            $remark['nickname']=$userinfo['nickname']?$userinfo['nickname']:($userinfo['phone']?$userinfo['phone']:"");
            $remark['user_id']=$userinfo['user_id']?$userinfo['user_id']:"";
            unset($carinfo['subface_img']);
            unset($carinfo['user_id']);
        }

        //查询车辆信息
        //$res=M("rele_car")->field("pu_id,sys_id,price,city_id")->where("pu_id=".$data['pu_id'])->find();
        // 相关车系

//        $sys_cars= M('rele_car')
//            ->field('rele_car.pu_id,rele_car.user_id,rele_car.cartype_id,rele_car.price,rele_car.news_price,rele_car.car_mileage,rele_car.car_cardtime,rele_car.img_300')
//            ->where("sys_id=".$res['sys_id']." and pu_id not in (".$res['pu_id'].") and status=1 and city_id=".$res['city_id'])
//            ->join('user on user.user_id = rele_car.user_id')
//            ->order('rele_car.update_time desc')
//            ->limit(6)
//            ->select();

        $field = 'rele_car.pu_id,rele_car.user_id,rele_car.cartype_id,rele_car.price,rele_car.news_price,rele_car.car_mileage,rele_car.car_cardtime,rele_car.img_300';

        $where['sys_id'] = $carinfo['sys_id'];

        $where['status'] = 1;

        $where['pu_id'] = array('not in',$carinfo['pu_id']);

        $where['city_id'] = $carinfo['city_id'];


        $join = [['user u','u.user_id = rele_car.user_id']];

        $sys_cars = Db::table('rele_car')->alias('rele_car')->join($join)->field($field)->where($where)->order('rele_car.update_time desc')->select();

        if($sys_cars){
            foreach ($sys_cars as $key => $val) {
                $sys_cars[$key]['news_price'] = $val['news_price'] == 0.00 ? "未知" : $val['news_price'].'万';
                // 通过cartype_id查车系名和车型名称
                $sys_cars[$key]['name'] = $this->get_carname($val['cartype_id']);
                $sys_cars[$key]['img_url'] = $this->get_carimg(explode(',',$val['img_300'])[0],1);
                unset($sys_cars[$key]['img_300']);
                unset($sys_cars[$key]['cartype_id']);
                //获取汽车的首付
                $pay=$this->get_rele_car_fenqi($val['pu_id']);
                $sys_cars[$key]['pay_20s']=$pay['pay_20s']?$pay['pay_20s']:'';
                $sys_cars[$key]['pay_20y']=$pay['pay_20y']?$pay['pay_20y']:'';
                $sys_cars[$key]['pay_20n']=$pay['pay_20n']?$pay['pay_20n']:'';
            }
        }


        $carparam = $this->get_carparam($cheid,2);

        $sys_cars=$sys_cars ? $sys_cars : array();

        $carinfo = $carinfo?$carinfo:array();

        $shopinfo = $shopinfo?$shopinfo:array();

        $remark = $remark?$remark:array();

        $carparam = $carparam?$carparam:array();

       // dump($carparam);die;

        $brand = $this->brand();//品牌
        $this->assign('brand',$brand);
        $this->assign('carinfo',$carinfo);
        $this->assign('shopinfo',$shopinfo);
        $this->assign('remark',$remark);
        $this->assign('sys_cars',$sys_cars);
        $this->assign('carparam',$carparam);
        $this->assign('platform_phone','0371-53375515');
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

    /*
     *http://39.106.67.47/new_api/User/shop/get_carparam
     * 获取具体参数配置
     * 车id
     * type 1 新车 2 二手 3 零首付
     *
     */
    public function asd(){


    }


}