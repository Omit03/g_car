<?php
namespace app\index\controller;
use think\Request;
use think\Loader;
use think\Db;
use think\Controller;
use think\Session;
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

        //$new_one = $this->search_news_carlist(); //一成购新

        $new_dyg = $this->search_news_carlist($chx=0,$px = 4); //低月供

        $new_five_car = $this->search_news_carlist($chx=1); //五万以下

       // dump($new_one);die;
        //关于二手车
        $er_car = $this->er_car($city_id);//

        $min_time = $this->lots_two_cars(7);//二手车 时间最新（默认）

        $min_price = $this->lots_two_cars(1);//二手 价格最低

        $min_age = $this->lots_two_cars(3);//二手 车龄最短

        $min_licheng = $this->lots_two_cars(6);//二手 里程最短


        $car_zero = $this->car_zero($city_id);//零首付

        $new1 = $this->new_list(1);//公司新闻
        $new2 = $this->new_list(2);//行业新闻
        $new3 = $this->new_list(3);//媒体报道
        $new4 = $this->new_list(4);//特色活动
        $new5 = $this->new_list(5);//新车资讯




        $this->assign('banner',$banner);
        $this->assign('brand',$brand);
        $this->assign('price',$price);
        $this->assign('subface',$subface);
        $this->assign('new_car',$new_car);
        $this->assign('er_car',$er_car);
        $this->assign('min_time',$min_time);
        $this->assign('min_price',$min_price);
        $this->assign('min_age',$min_age);
        $this->assign('min_licheng',$min_licheng);
        $this->assign('car_zero',$car_zero);
        $this->assign('new1',$new1);
        $this->assign('new2',$new2);
        $this->assign('new3',$new3);
        $this->assign('new4',$new4);
        $this->assign('new5',$new5);


        return $this->fetch();
    }
    /*
     * 空方法
     */
    public function _empty(){

        $this->redirect('index/index');
    }

    public function search_newcar(){

        //接受参数
        $data = $this->params;

        $where="1=1  ";
            //模糊查找 如 大众 奥迪 朗逸
        if(!empty($data['key'])){
                $where.=" and name like '%".$data['key']."%'  ";
            }

            //级别suv
            if (!empty($data['subface'])){
                $where.=" and subface=".$data['subface'];
            }

            if(!empty($data['name'])){
                $where.=" order by id desc";
            }
            //
            if (!empty($data['brand_id'])){
                $where.=" and brand_id=".$data['brand_id'];
            }

            //汉字品牌  大众 奥迪
            if (!empty($data['brand_name'])){

                $where['name'] = $data['brand_name'];

                $where['level'] = 3;

                $bdata = Db::table('car_brand')->where($where)->select();

                $sys_id=$bdata['id'];
                $where.=" and sys_id=$sys_id ";

            }
            //
            if (!empty($data['chek'])){
                $where.=" and cartype_id=".$data['chek'];
                //echo $where;
            }
            //具体价格
            if(!empty($data['tprice'])){
                $where.=" and price=".$data['tprice'] ;
            }
            if(!empty($data['sys_id'])){
                $where.="and sys_id= ".$data['sys_id'];
            }

            //品牌 拼音
            if(!empty($data['pinpai'])){

                $where['level'] = 1;

                $where['pin'] = $data['pinpai'];

                $ppdata = Db::table('car_brand')->where($where)->select();

                $bid = $ppdata['id'];

                $where.=" and brand_id=$bid  ";
            }
            //车龄
            if(!empty($data['cheling'])){
                switch($data['cheling']){
                    case 1;
                        $where.=" and car_age between 0 and 1";
                        break;
                    case 2;
                        $where.="  and car_age between 0 and 2";
                        break;
                    case 3;
                        $where.="  and car_age between 0 and 3";
                        break;
                    case 4;
                        $where.="  and car_age between 3 and 5";
                        break;
                    case 5;
                        $where.="  and car_age between 5 and 8";
                        break;
                    case 6;
                        $where.="  and car_age > 8";
                        break;
                }
            }
            //里程
            if(!empty($data['licheng'])){
                switch($data['licheng']){

                    case 2;
                        $where.=" and  car_mileage <=2";
                        break;
                    case 3;
                        $where.=" and  car_mileage <=3";
                        break;
                    case 4;
                        $where.=" and car_mileage between 3 and 5";
                        break;
                    case 5;
                        $where.=" and car_mileage between 5 and 8";

                }

            }
            //颜色
            if (!empty($data['ys'])){
                $where.="and color=".$data['ys'];
            }

            //排量

            if (!empty($data['pailiang'])){
                $where.=" and output=".$data['pailiang'];
            }
            //变速箱
            if (!empty($data['bsx'])){
                $where.=" and gearbox= ".$data['bsx'];
            }
            //排放标准 OBD 京V 欧V 国V
            if (!empty($data['pfbz'])){
                $where.=" and blowdown= ".$data['pfbz'];
            }

            //驱动 前驱 后驱

            if (!empty($data['qd'])){
                $where.=" and car_drive=".$data['qd'];
            }
            //两厢 三箱 皮卡 旅行车
            if (!empty($data['cs'])){
                $where.=" and car_body=".$data['cs'];
            }
            //汽油 柴油 油漆混合
            if (!empty($data['ny'])){
                $where.=" and fuel= ".$data['ny'];
            }
            // 进气方式
            if (!empty($data['jinqi'])){
                $where.=" and inlet_air= ".$data['jinqi'];
            }
            //百分之三十月供
            if (!empty($data['sy'])){
                switch($data['sy']){
                    case 1;
                        $where.=" and pay30_s2 between 0 and 1";
                        break;
                    case 2;
                        $where.=" and pay30_s2 between 1 and 2 ";
                        break;
                    case 3;
                        $where.=" and pay30_s2 between 2 and 3";
                        break;
                    case 4;
                        $where.=" and pay30_s2 between 3 and 4 ";
                        break;
                    case 5;
                        $where.=" and pay30_s2 between 4 and 5";
                        break;
                    case 6;
                        $where.=" and pay30_s2 >5 ";
                        break;
                }
            }

            //百分之三十月供
            if (!empty($data['yg'])){
                switch($data['yg']){
                    case 1;
                        $where.=" and pay30_y2 between 0 and 0.1";
                        break;
                    case 2;
                        $where.=" and pay30_y2 between 0.1 and 0.2 ";
                        break;
                    case 3;
                        $where.=" and pay30_y2 between 0.2 and 0.3";
                        break;
                    case 4;
                        $where.=" and pay30_y2 between 0.3 and 0.4 ";
                        break;
                    case 5;
                        $where.=" and pay30_y2 between 0.4 and 0.5";
                        break;
                    case 6;
                        $where.=" and pay30_y2 >0.5 ";
                        break;


                }
            }

            //价格级别
            if (!empty($data['chs'])){
                switch($data['chs']){
                    case 1;
                        $where.=" and price <5";
                        break;
                    case 2;
                        $where.=" and price between 5 and 8 ";
                        break;
                    case 3;
                        $where.=" and price between 8 and 12";
                        break;
                    case 4;
                        $where.=" and price between 12 and 18 ";
                        break;
                    case 5;
                        $where.=" and price between 18 and 25";
                        break;
                    case 6;
                        $where.=" and price between 25 and 40";
                        break;
                    case 7;
                        $where.=" and price>40";
                        break;

                }
            }
            // 排序规则  筛选 月供由高到低 由低到高  价格 高低
            if (!empty($data['px'])){
                switch($data['px']){
                    case 1;
                        $where.=" order by id  desc ";
                        break;
                    case 2;
                        $where.=" order by price  asc ";
                        break;
                    case 3;
                        $where.=" order by price  desc ";
                        break;
                    case 4;
                        $where.=" order by pay30_y2  asc "; //月供由低到高
                        break;
                    case 5;
                        $where.=" order by pay30_y2  desc ";//月供 由高到低
                        break;
                    case 6;
                        $where.=" order by pay30_s2   asc ";//首付 由低到高
                        break;
                    case 7;
                        $where.=" order by pay30_s2  desc ";//首付由高到低
                        break;

                }

        }

        $ss = Db::table('new_car')->where($where)->limit(20)->select();

//            foreach ($ss as $k =>$val){
//
//
//            }

           // dump($ss['0']['img_300']);

        dump($ss);

    }

    /*
     * 二手车筛选
     *http://39.106.67.47/new_api/User/Index/lots_cars
     *
     */
    /**
     * [lots_car 筛选列表页面]
     * @return [type] [description]
     *
     */

    public function lots_cars(){

        if ($this->request->isGet()){

            //接受参数
            $data = $this->params;

            if (!empty($data['user_id'])){

                $user_id = $data['user_id'];
            }

            if (!empty($data['page'])){

                $page = $data['page'];
            }
            if (empty($data['num'])){
                $PageSize = 10;
            }else{
                $PageSize = $data['num'];
            }
            if (empty($data['page'])){

                $PageIndex = 1;

            }else{
                $PageIndex = $data['page'];
            }

            if (!empty($data['brand_id'])){

                $brand_id = $data['brand_id'];//品牌id
            }
            if (!empty($data['sys_id'])){

                $sys_id = $data['sys_id'];//车系id
            }
            if (!empty($data['cartype_id'])){

                $cartype_id = $data['cartype_id'];//车型id
            }
            if (!empty($data['price_range'])){

                $price_range = $data['price_range'];//价格区间id
            }

            if (!empty($data['car_mileage'])){

                $car_mileage = $data['car_mileage'];//里程区间id
            }

            if (!empty($data['car_age'])){

                $car_age = $data['car_age'];//车龄id
            }

            if (!empty($data['subface'])){

                $subface = $data['subface'];//级别id
            }

            if (!empty($data['output'])){

                $output = $data['output'];//排量id
            }
            if (!empty($data['gearbox'])){

                $gearbox = $data['gearbox'];//变速箱id
            }

            if (!empty($data['blowdown'])){

                $blowdown = $data['blowdown'];//排放标准id
            }

            if (!empty($data['car_drive'])){

                $car_drive = $data['car_drive'];//驱动id
            }

            if (!empty($data['car_body'])){

                $car_body = $data['car_body'];//车身id
            }
            if (!empty($data['color'])){

                $color = $data['color'];//颜色id
            }
            if (!empty($data['fuel'])){

                $fuel = $data['fuel'];//燃料id
            }
            if (!empty($data['sort'])){

                $sort = $data['sort'];//排序  1价格最低 2价格最高 3车龄最短 4车龄最长 5里程最多 6里程最少
            }
            if (!empty($data['search'])){

                $search = $data['search'];
            }

            //获取城市id

            $city_id = $this->city_id();

            $WhereStr = "  and rele_car.status = 1 and rele_car.up_under = 1 and user.is_fenghao = 2 and rele_car.city_id=".$city_id;
            if(!empty($data['user_id'])){
                $WhereStr .= "  and rele_car.user_id = $user_id ";
            }
            if(!empty($data['brand_id'])){
                $WhereStr .= "  and rele_car.brand_id = $brand_id ";
            }

           // dump($brand_id);die;
            if(!empty($data['sys_id'])){
                $WhereStr .= "  and rele_car.sys_id = $sys_id ";
            }
            if(!empty($data['cartype_id'])){
                $WhereStr .= "  and rele_car.cartype_id = $cartype_id ";
            }
            if(!empty($data['fuel'])){
                $WhereStr .= "  and rele_car.fuel = $fuel ";
            }
            if(!empty($data['color'])){
                $WhereStr .= "  and rele_car.color = $color ";
            }
            if(!empty($data['car_body'])){
                $WhereStr .= "  and rele_car.car_body = $car_body ";
            }
            if(!empty($data['car_drive'])){
                $WhereStr .= "  and rele_car.car_drive = $car_drive ";
            }
            if(!empty($data['blowdown'])){
                $WhereStr .= "  and rele_car.blowdown = $blowdown ";
            }
            if(!empty($data['gearbox'])){
                $WhereStr .= "  and rele_car.gearbox = $gearbox ";
            }
            if(!empty($data['output'])){
                $WhereStr .= "  and rele_car.output = $output ";
            }
            if(!empty($data['subface'])){
                $WhereStr .= "  and rele_car.subface = $subface ";
            }
            if(!empty($data['car_age'])){
                $WhereStr .= "  and rele_car.car_age = $car_age ";
            }
            if(!empty($data['search'])){
                $WhereStr .= " and rele_car.name_li like '%".$search."%'";
            }
            if(!empty($data['price_range'])){
                switch ($data['price_range']) {
                    case '2':
                        //3万内
                        $WhereStr .= " and rele_car.price <= 3 ";
                        break;
                    case '3':
                        //3-5万
                        $WhereStr .= " and rele_car.price between 3 and 5 ";
                        break;
                    case '4':
                        //5-8万
                        $WhereStr .= " and rele_car.price between 5 and 8 ";
                        break;
                    case '5':
                        //8-10万
                        $WhereStr .= " and rele_car.price between 8 and 10 ";
                        break;
                    case '6':
                        //10-15万
                        $WhereStr .= " and rele_car.price between 10 and  15";
                        break;
                    case '7':
                        //15-20万
                        $WhereStr .= " and rele_car.price between 15 and 20 ";
                        break;
                    case '8':
                        //20-30万
                        $WhereStr .= " and rele_car.price between 20 and 30 ";
                        break;
                    case '9':
                        //30-50万
                        $WhereStr .= " and rele_car.price between 30 and 50 ";
                        break;
                    case '10':
                        //5-8万
                        $WhereStr .= " and rele_car.price between 50 and 100 ";
                        break;
                    case '11':
                        //5-8万
                        $WhereStr .= " and rele_car.price > 100 ";
                        break;
                    default:
                        # code...
                        break;
                }
            }
            if(!empty($data['car_mileage'])){
                switch ($car_mileage) {
                    case '1':
                        //1万公里内
                        $WhereStr .= " and rele_car.car_mileage <= 1 ";
                        break;
                    case '2':
                        //3万公里内
                        $WhereStr .= " and rele_car.car_mileage between 1 and 3 ";
                        break;
                    case '3':
                        //5万公里内
                        $WhereStr .= " and rele_car.car_mileage between 3 and 5 ";
                        break;
                    case '4':
                        //10万公里内
                        $WhereStr .= " and rele_car.car_mileage between 5 and 10 ";
                        break;
                    default:
                        # code...
                        break;
                }
            }

            if (!empty($data['sort'])) {

                if ($data['sort'] == 1) {
                    // 排序方式
                    $OrderKey = "rele_car.price";
                    $OrderType = "asc";
                } elseif ($data['sort'] == 2) {
                    // 排序方式
                    $OrderKey = "rele_car.price";
                    $OrderType = "desc";
                } elseif ($data['sort'] == 3) {
                    // 排序方式
                    $OrderKey = "rele_car.car_age";
                    $OrderType = "desc";
                } elseif ($data['sort'] == 4) {
                    // 排序方式
                    $OrderKey = "rele_car.car_age";
                    $OrderType = "asc";
                } elseif ($data['sort'] == 5) {
                    // 排序方式
                    $OrderKey = "rele_car.car_mileage";
                    $OrderType = "desc";
                } elseif ($data['sort'] == 6) {
                    // 排序方式
                    $OrderKey = "rele_car.car_mileage";
                    $OrderType = "asc";
                } else {
                    // 排序方式
                    $OrderKey = "rele_car.create_time";
                    $OrderType = "desc";
                }
            }
            // 分类

            if (!empty($data['type'])){

                $type=$data['type'];
                if($type){
                    $WhereStr .= " and user_shop.is_yx = $type ";
                    $join = "join user on user.user_id = rele_car.user_id join user_shop on user.user_id=user_shop.user_id";
                }

            }else{
                $join = "join user on user.user_id = rele_car.user_id";
            }

            $joinid = "pu_id";
            $Coll="rele_car.pu_id,rele_car.user_id,rele_car.cartype_id,rele_car.price,rele_car.name_li,rele_car.news_price,rele_car.car_mileage,rele_car.car_cardtime,rele_car.img_300";
            $sql = $this->CreateSql($TableName="rele_car",$Coll,$WhereStr,$WhereStr,$PageIndex,$PageSize,$OrderKey,$OrderType,$join,$joinid);
            //print_r($sql);
//        $Model = M("rele_car");

            $res = Db::query($sql);

            if($res){
                foreach ($res as $key => $val) {
                    $res[$key]['news_price'] = $val['news_price']== 0.00 ? "未知" : $val['news_price'].'万';
                    // 通过cartype_id查车系名和车型名称
                    //$res[$key]['name'] = $this->get_carname($val['cartype_id']);查询名称不对 coll 内增加rele.car_name_li
                    $res[$key]['img_url'] = $this->get_carimg(explode(',',$val['img_300'])[0],1);
                    unset($res[$key]['img_300']);
                    unset($res[$key]['cartype_id']);
                    //获取汽车的首付
                    //dump($val['pu_id']);die;
                    $pay=$this->get_rele_car_fenqi($val['pu_id']);
                    if (!empty($pay)){

                        $res[$key]['pay_20s']=$pay['pay_20s']?$pay['pay_20s']:'';
                        $res[$key]['pay_20y']=$pay['pay_20y']?$pay['pay_20y']:'';
                        $res[$key]['pay_20n']=$pay['pay_20n']?$pay['pay_20n']:'';
                    }

                    //fenye
                    //暂时注销
                    //$count = Db::table('rele_car')->join($join)->where('1=1 '.$WhereStr)->count();
                    //$res[$key]['page_num']=ceil($count/10);
                    $res[$key]['page']=$PageIndex;
                }
            }



            $res = $res ? $res : array();

            dump($res);


           // $this->assign('res',$res);
        }
//
//        $brand=$this->brand();//获取筛选模块 推荐品牌
//
//        $this->assign('brand',$brand);
//        return $this->fetch();

    }


    /*
     * 零首付新车筛选列表
     */
    public function filter_list(){

        //接受参数
        $data = $this->params;
        if ($data['page']){

            $page = $data['page'];
        }

        if (empty($data['num'])){
            $PageSize = 10;
        }else{
            $PageSize = $data['num'];
        }

        if (empty($data['page'])){

            $PageIndex = 1;

        }else{
            $PageIndex = $data['page'];
        }

        $WhereStr = " and status = 1";
        //搜索的文字
        if ($data['search']){

            $search = $data['search'];
        }

        if($data['search']){
            $WhereStr .= " and name like '%".$search."%'";
        }
        //品牌id
        if ($data['brand_id']){

            $brand_id  = $data['brand_id'];
        }
        if($data['brand_id']){

            $WhereStr .= " and brand_id = $brand_id";
        }
        //级别id
        if ($data['subface']){

            $subface = $data['subface'];
        }

        if($data['subface']){

            $WhereStr .= " and subface = $subface";
        }
        //排量
        if ($data['output']){

            $output =  $data['output'];
        }

        if($data['output']){

            $WhereStr .= " and output = $output";
        }
        //变速箱
        if ($data['gearbox']){

            $gearbox =  $data['gearbox'];
        }

        if($data['gearbox']){

            $WhereStr .= " and gearbox = $gearbox";
        }
        //进气类型
        if ($data['inlet_air']){

            $inlet_air =  $data['inlet_air'];
        }

        if($data['inlet_air']){
            $WhereStr .= " and inlet_air = $inlet_air";
        }
        //能源
        if ($data['fuel']){

            $fuel =  $data['fuel'];
        }

        if($data['fuel']){

            $WhereStr .= " and fuel = $fuel";
        }
        //首付
        if ($data['price_s']){

            $price_s = $data['price_s'];
        }

        if($data['price_s']){
            switch ($data['price_s']) {
                case '1':
                    //1万内
                    $WhereStr .= " and pay10_s2 <= 1 ";
                    break;
                case '2':
                    //1-2万
                    $WhereStr .= " and pay10_s2 between 1 and 2 ";
                    break;
                case '3':
                    //2-3万
                    $WhereStr .= " and pay10_s2 between 2 and 3 ";
                    break;
                case '4':
                    //3-4万
                    $WhereStr .= " and pay10_s2 between 3 and 4 ";
                    break;
                case '5':
                    //4-5万
                    $WhereStr .= " and pay10_s2 between 4 and  5";
                    break;
                case '6':
                    //5万以上
                    $WhereStr .= " and pay10_s2 > 5 ";
                    break;
                default:
                    # code...
                    break;
            }
        }
        //月供
        if ($data['price_y']){

            $price_y = $_POST['price_y'];
        }

        if($data['price_y']){
            switch ($data['price_y']) {
                case '1':
                    //1万内
                    $WhereStr .= " and pay10_y2 <= 1000 ";
                    break;
                case '2':
                    //1-2万
                    $WhereStr .= " and pay10_y2 between 1000 and 2000 ";
                    break;
                case '3':
                    //2-3万
                    $WhereStr .= " and pay10_y2 between 2000 and 3000 ";
                    break;
                case '4':
                    //3-4万
                    $WhereStr .= " and pay10_y2 between 3000 and 4000 ";
                    break;
                case '5':
                    //4-5万
                    $WhereStr .= " and pay10_y2 between 4000 and  5000";
                    break;
                case '6':
                    //5万以上
                    $WhereStr .= " and pay10_y2 > 5000 ";
                    break;
                default:
                    # code...
                    break;
            }
        }
        //厂家指导价格
        if ($data['price_c']){
            $price_c =  $data['price_c'];
        }

        if($data['price_c']){
            switch ($data['price_c']) {
                case '1':
                    //5万内
                    $WhereStr .= " and price <= 5 ";
                    break;
                case '2':
                    //5-8万
                    $WhereStr .= " and price between 5 and 8 ";
                    break;
                case '3':
                    //8-12万
                    $WhereStr .= " and price between 8 and 12 ";
                    break;
                case '4':
                    //12-18万
                    $WhereStr .= " and price between 12 and 18 ";
                    break;
                case '5':
                    //18-25万
                    $WhereStr .= " and price between 18 and  25";
                    break;
                case '6':
                    //25-40万
                    $WhereStr .= " and price between 25 and  40";
                    break;
                case '7':
                    //40万以上
                    $WhereStr .= " and price > 40 ";
                    break;
                default:
                    # code...
                    break;
            }
        }
        //排序
        if ($data['sort']){
            $sort =  $data['sort'];
        }

        if($data['sort']){
            switch ($data['sort']) {
                case '1':
                    //车价由低到高
                    $OrderKey = "pay10_s2";
                    $OrderType = "asc";
                    break;
                case '2':
                    //车价由高到低
                    $OrderKey = "pay10_s2";
                    $OrderType = "desc";
                    break;
                case '3':
                    //月供由低到高
                    $OrderKey = "pay10_s2";
                    $OrderType = "asc";
                    break;
                case '4':
                    //月供由高到低
                    $OrderKey = "pay10_y2";
                    $OrderType = "desc";
                    break;
                case '5':
                    //首付由低到高
                    $OrderKey = "pay10_s2";
                    $OrderType = "asc";
                    break;
                case '6':
                    //首付由高到低
                    $OrderKey = "pay10_s2";
                    $OrderType = "desc";
                    break;
                default:
                    $OrderKey = "update_time";
                    $OrderType = "desc";
                    break;
            }
        }else{
            // 排序方式
            $OrderKey = "update_time";
            $OrderType = "desc";
        }
        $join = "";
        $joinid = "id";
        $Coll="id,cartype_id,price,is_discount,discount_price,img_ids,sale_num,pay10_s,pay10_y,pay10_n,pay10_s2,pay10_y2,pay10_n2";
        $sql = $this->CreateSql($TableName="new_car",$Coll,$WhereStr,$WhereStr,$PageIndex,$PageSize,$OrderKey,$OrderType,$join,$joinid);
       // $Model = M("new_car");
        $list = Db::query($sql);

        if($list){
            foreach ($list as $key => $val) {
                $list[$key]['price'] = $val['price'].'万';
                $list[$key]['pay10_s'] = $val['pay10_s'].'万';
                $list[$key]['pay10_y'] = $val['pay10_y'].'元';
                $list[$key]['pay10_s2'] = $val['pay10_s2'].'万';
                $list[$key]['pay10_y2'] = $val['pay10_y2'].'元';
                $list[$key]['discount_price'] = $val['discount_price'] == 0.00 ? "未知" : $val['discount_price'].'万';
                // 通过cartype_id查车系名和车型名称
                $list[$key]['name'] = $this->get_carname($val['cartype_id']);

                $list[$key]['img_url'] = $this->getimgpath(explode(',',$val['img_ids'])[0]);

                unset($list[$key]['img_ids']);
                unset($list[$key]['cartype_id']);
            }
        }

        dump($list);

        $list= $list ? $list :  array();


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
     * 二手车详情
     */
    public function details(){

        $data = $this->params;

        $cheid=$data['cheid'];


        //获取新车浏览记录
        $userid = Session::get('user_id');
        if ($userid){

            $wherehis['userid'] = $userid;
            $wherehis['cheid'] = $cheid;
            $wherehis['type'] = 2;

            $res = Db::table('car_liulan_history')->where($wherehis)->find();

            if (empty($res)){

                Db::table('car_liulan_history')->insert(['userid'=>$userid,'type'=>2,'cheid'=>$cheid,'price'=>$data['price'],'img'=>$data['img'],'paitime'=>$data['time'],'name'=>$data['name'],'licheng'=>$data['mileage']]);
            }

        }
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
            $remark['id']="";
            $remark['content']="";
            $remark['all_score']="0";

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

        //dump($carinfo);die;

        $brand = $this->brand();//品牌
        $this->assign('brand',$brand);
        $this->assign('carinfo',$carinfo);
        $this->assign('shopinfo',$shopinfo);
        $this->assign('remark',$remark);
        $this->assign('sys_cars',$sys_cars);//同系
        $this->assign('carparam',$carparam);//详细配置
        $this->assign('platform_phone','0371-53375515');
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
     * 文章页
     */
    public function pcnewindex(){



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


    public function asd(){


       $asd = $this->new_list(1);

        dump($asd);
    }


}