<?php

namespace app\index\controller;

use think\Db;
use logs\newLog;
use think\Session;

class User  extends Common {


    /*
     * 展示登录
     */
    public function car_login(){

        $brand = $this->brand();//品牌

        $this->assign('brand',$brand);
        return $this->fetch();

    }    /*
     * 展示登录
     */
    public function person_manage(){

        $brand = $this->brand();//品牌

        $this->assign('brand',$brand);
        return $this->fetch();

    }    /*
     * 展示登录
     */
    public function person_release(){

        $brand = $this->brand();//品牌

        $this->assign('brand',$brand);
        return $this->fetch();

    }    /*
     * 展示登录
     */
    public function person_public(){

        $brand = $this->brand();//品牌

        $this->assign('brand',$brand);
        return $this->fetch();

    }    /*
     * 展示登录
     */
    public function person_busenter(){

        $brand = $this->brand();//品牌

        $this->assign('brand',$brand);
        return $this->fetch();

    }    /*
     * 展示登录
     */
    public function person_opportunity(){

        $brand = $this->brand();//品牌

        $this->assign('brand',$brand);
        return $this->fetch();

    }
    /*
     * 展示登录
     */
    public function person_info(){

        $brand = $this->brand();//品牌

        $this->assign('brand',$brand);
        return $this->fetch();

    }    /*
     * 展示登录
     */
    public function person_collect(){

        $brand = $this->brand();//品牌

        $this->assign('brand',$brand);
        return $this->fetch();

    }
    /*
     * 浏览记录
     */
    public function person_history(){

        $brand = $this->brand();//品牌

        $this->assign('brand',$brand);
        return $this->fetch();

    }
    /*
     * 意见反馈
     */
    public function person_feedback(){

        /*接收参数*/
       if($this->request->isPost()){

           $data =  $this->params;

           $res = Db::table('advises')->insert(['name'=>$data['name'],'telephone'=>$data['phone'],'content'=>$data['con'],'create_date'=>time()]);

           if ($res){

               $this->success('意见反馈已收到','user/person_feedback');

               //$this->return_msg(200,'意见反馈已收到 谢谢');

           }else{

               $this->error('失败');

               //$this->return_msg(400,'失败');
           }


       }
        $brand = $this->brand();//品牌

        $this->assign('brand',$brand);
        return $this->fetch();

    }
    /*
     * 展示我的预约
     * my_appointment
     * 我的预约
     * http://39.106.67.47/new_api/User/newapi/my_appointment
     * user_id
     * type 代表类型 如新车//type类型1.新车，2.二手车，3.0首付
     * page
     * page_size
     */

    public function person_order(){

        /*接收参数*/
        $user_id   = input('param.user_id');
        $type = input('param.type');
        $page   = input('param.page');
        $page_size    = input('param.page_size');

        $user_id   = 5;
        $type = 2;
        $page   = 1;
        $page_size    = 10;
        $type=$type?$type:1;
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
                $where['pu_id'] = $val['cheid'];

                $field = 'a.pu_id,a.name_li,a.cartype_id,a.price,a.car_cardtime,a.car_mileage,a.img_300,b.shop_name';

                $join = [['user_shop b','b.user_id = a.user_id']];

                $car_info = Db::table('rele_car')->alias('a')->join($join)->field($field)->where($where)->select();

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

       // dump($list);die;
        $brand = $this->brand();//品牌

        $this->assign('list',$list);
        $this->assign('brand',$brand);
        return $this->fetch();

    }
    /*
     * 登录
     */

    public function login(){

        /* 接收参数*/
        $data = $this->params;

        /* 检测用户名*/

        $this->check_username($data['user_phone']);

        $user_name_type = 'phone';

        switch ($user_name_type){
            case 'phone':


                $this->check_exist($data['user_phone'],'phone',1);

                $where['phone'] = $data['user_phone'];

                $db_res = Db::table('user')->field('user_id,token,salt,phone,password,nickname,header_pic,sex,birthday,qq_token,weixin_token')->where($where)->find();

                break;

        }

        $pwd = md5($data['user_pwd'].$db_res['salt']);

        if ($db_res['password'] !== $pwd){

            $this->return_msg(400,'用户名或者密码不正确');

        }else{

            $log = new newLog('booklog');

            $log ->reclog(" 登录时间: ".date('Y-m-d H:i:s',time()));

            $log ->reclog("登录者 : ".$db_res['phone']);

            Session::set('user_id',$db_res['user_id']);

            Session::set('phone',$db_res['phone']);

            unset($db_res['login_password']); //密码永不返回

            $this->redirect('user/person_manage');
        }

    }

    /*
     * @time
     * @user_name
     * @user_phone
     * @user_pwd
     * code
     * @token/9ba62c26993ad3aa1ec94ba0616fd0cf
     * 大致规则如下
     * salt 值 二十六字符加数字
     * sos 默认是888888
     * password md5($password.$salt)
     * token md5(888888.$salt)
     * create_time=date('Y-m-d H:i:s',time())
     * login_type=1;1手机号，2 微信 ，3 qq
     */

    public function register(){

        $data = $this->params;

        /* 检查验证码*/

        $this->check_code($data['user_phone'],$data['code']);

        /* 检测用户名*/

        $user_name_type = $this->check_username($data['user_phone']);

        switch ($user_name_type){

            case 'phone':
                $this->check_exist($data['user_phone'],'phone',0);

                $data['user_phone'] = $data['user_phone'];

                break;
            case 'email':

                $this->check_exist($data['user_phone'],'email',0);

                $data['user_email'] = $data['user_phone'];
                break;
        }

        /* 将用户信息写入数据库*/


        $data['create_time'] = time();

        //$data['reg_device'] = $this->request->ip();

        $res = Db::table('user')->insert(['phone'=>$data['user_phone'],'password'=>$data['user_pwd'],'create_time'=>$data['create_time']]);

        if (!$res){

            $this->return_msg(400,'用户注册失败');

        }else{

            $this->return_msg(200,'用户注册成功');
        }

    }
    
    /*
     * 上传用户头像
     */

    public function upload_head_img(){

        /*接受参数*/
        $data = $this->params;
        /*上传文件，获得路径*/

        $head_img_path = $this->upload_file($data['user_icon'],'head_img');


        /*存入数据库*/
        $res = Db::name('user')->where('user_id',$data['user_id'])->setField('header_pic',$head_img_path);
        
        if ($res){
            
            $this->return_msg(200,'上传头像成功'.$head_img_path);
            
        }else{
            
            $this->return_msg(400,'上传头像失败');
        }
     }

     /*
      * 修改密码
      */

    public function change_pwd(){

        /*接受参数*/

        $data = $this->params;


        /*检查用户名并取出密码*/

        $user_name_type = $this->check_username($data['user_phone']);

        switch ($user_name_type){

            case 'phone':
                $this->check_exist($data['user_phone'],'phone',1);

                $where['phone'] = $data['user_phone'];

                break;
            case 'email':

                $this->check_exist($data['user_name'],'email',1);

                $where['email'] = $data['user_name'];
                break;
        }
        /*判断原始密码是否正确*/

        $db_ini_pwd = Db::name('user')->where($where)->find();

        if($db_ini_pwd['password'] !== $data['user_ini_pwd']){

            $this->return_msg(400,'原始密码错误');
        }
        /*把新的密码存入数据库*/

        $res = Db::name('user')->where($where)->setField('password',$data['user_pwd']);

        /*注意 密码相同 返回0 强制转换为false 失败也是false*/
        if ($res !== false){

            $this->return_msg(200,'修改成功');

        }else{

            $this->return_msg(400,'修改失败');
        }

        
     }
     
     /*
      * 找回密码
      */

    public function find_pwd()
    {
        /*接受参数*/
        $data = $this->params;
        /*检测验证码*/
        $this->check_code($data['user_phone'],$data['code']);

        /*检测用户名*/

        $user_name_type = $this->check_username($data['user_phone']);

        switch ($user_name_type){
                case 'phone':
                   $this->check_exist($data['user_phone'],'phone',1);

                   $where['phone'] = $data['user_phone'];
                   break;

                case 'email':
                $this->check_exist($data['user_name'],'email',1);

                    $where['email'] = $data['user_name'];
                   break;
        }
        /*修改数据库*/

        $res = Db::name('user')->where($where)->setField('password',$data['user_pwd']);


        if ($res !== false){

            $this->return_msg(200,'找回成功');

        }else{

            $this->return_msg(400,'找回失败');
        }

      }

      //绑定手机号
      public function bind_phone(){

          /*接受参数*/
          $data = $this->params;
          /*检查验证码*/
          $this->check_code($data['phone'],$data['code']);

          /*修改数据库*/

          $res = Db::name('user')->where('user_id',$data['user_id'])->setField('phone',$data['phone']);

          if ($res !== false){

              $this->return_msg(200,'绑定成功');

          }else{

              $this->return_msg(400,'绑定失败');
          }
      }

    //绑定邮箱
      public function bind_email(){

          /*接受参数*/
          $data = $this->params;
          /*检查验证码*/
          $this->check_code($data['email'],$data['code']);

          /*修改数据库*/

          $res = Db::name('user')->where('user_id',$data['user_id'])->setField('phone',$data['email']);

          if ($res !== false){

              $this->return_msg(200,'绑定成功');

          }else{

              $this->return_msg(400,'绑定失败');
          }
      }

      /*
       * 绑定用户名
       */
    public function bind_username(){

        /*接收参数*/

        $data = $this->params;

        /*检测验证码*/
        $this->check_code($data['user_name'],$data['code']);
        /*判断用户名*/

        $user_name_type = $this->check_username($data['user_name']);

        switch ($user_name_type){

                case 'phone':
                    $type_text = '手机号';

                    $update_data['user_phone'] = $data['user_name'];

                    break;

                case 'phone':
                $type_text = '邮箱';

                $update_data['user_email'] = $data['user_name'];

                break;
        }

        $res = Db::name('user')->where('user_id',$data['user_id'])->update($update_data);


        if ($res !== false){

            $this->return_msg(200,'绑定成功');

        }else{

            $this->return_msg(400,'绑定失败');
        }

    }

    /*
     * 绑定用户昵称
     * @param
     *
     */

    public function set_nickname(){

        /*接收参数*/

       $data =  $this->params;
        /*检测昵称不能重复*/
        $res = Db::name('user')->where('nickname',$data['user_nickname'])->find();

        if ($res){

            $this->return_msg(400,'用户昵称已存在');

        }

        /*写入数据库*/

        $res = Db::name('user')->where('user_id',$data['user_id'])->setField('nickname',$data['user_nickname']);


        if ($res){

            $this->return_msg(200,'成功');

        }else{

            $this->return_msg(400,'失败');
        }

    }

    /*
     * 获取用户信息
     */

    public function get_user_info(){

        /*接收参数*/

        $data =  $this->params;

        $this->check_exist($data['user_phone'],'phone',1); //检测用户是否存在

        $res = Db::name('user')->field('user_id,phone,')->where('phone',$data['user_phone'])->find();

        if ($res === false){

            $this->return_msg(400,'查询失败');
        }elseif (empty($res)){

            $this->return_msg(200,'暂无数据');

        }else{


            $return_data['user_info'] = $res;

            $this->return_msg(200,'查询成功',$return_data);
        }
    }

    /*
     * 设置 头像 昵称 所在地 性别 出生年月
     * 一次性设置
     * 上面为单一设置
     */
    public function set_userinfo()
    {
        /*接收参数*/

        $data =  $this->params;

        $this->check_exist($data['user_phone'],'phone',1); //检测用户是否存在

        $head_img_path = $this->upload_file($data['header_pic'],'head_img');

        $res = Db::name('user')->where('phone',$data['user_phone'])->update(['header_pic'=>$head_img_path,'nickname'=>$data['nickname'],'address'=>$data['address'],'sex'=>$data['sex'],'birthday'=>$data['birthday'],]);

        if ($res){

            $this->return_msg(200,'成功');

        }else{

            $this->return_msg(400,'失败');
        }
    }




    /*
     * 商家入驻
     * http://39.106.67.47/new_api/User/newapi/business_entry
     */
    public function business_entry(){

        /*接收参数*/
        $data =  $this->params;

        /* 检查验证码*/

       // $this->check_code($data['user_phone'],$data['code']);

        $door_photo=$this->upload_file($data['door_photo'],'door_photo');

        $shop_licence=$this->upload_file($data['shop_licence'],'shop_licence');

        $data['door_photo'] = $door_photo;

        $data['shop_licence'] = $shop_licence;

        $city=$lng=$data['city'];
        //城市
        $data['city_id']=$this->get_city($city);

        //dump($data['user_id']);die;

        $info = Db::table('company_apply_list')->insert([
            'user_id' =>$data['user_id'],
            'name' =>$data['name'],
            'phone' =>$data['phone'],
            'shop_name' =>$data['shop_name'],
            'business_range' =>$data['business_range'],
            'type' =>$data['type'],
            'address' =>$data['address'],
            'lat' =>$data['lat'],
            'lng' =>$data['lng'],
            'door_photo' =>$data['door_photo'],
            'shop_licence' =>$data['shop_licence'],
            'city_id' =>$data['city_id'],
            'create_time' =>time(),

        ]);

          dump($info);


//        $city=$lng=$data['city'];
//        //城市
//        $info['city_id']=$this->get_city($city);
        // 此处需要注意 框架途径不一致
//        $info['door_photo']=str_replace("http://www.gj2car.com/Uploads/relecar/","",$door_photo);
//        $info['shop_licence']=str_replace("http://www.gj2car.com/Uploads/relecar/","",$shop_licence);
//        $info['create_time']=time();

    }

    /*
     * 二手车详情页
     * cheid   rele_car表中pu_id
     */

    public function rele_car_detail(){

        /*接收参数*/
        $data =  $this->params;

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
        //dump($carinfo['car_mileage']);die;
        //获取新车价格参数
        //$new_price=Db::table("param")->field('id,info_1')->where("cartype_id=$cheid")->find();
        $new_price['info_1'] = "";//新增代码
        $carinfo['new_price']=$new_price['info_1']?$new_price['info_1']:"";
        //获取品牌，厂商，名字
        $carinfo['car_name']=$this->get_carname($carinfo['cartype_id']);
        //获取店铺的详情
        $shopinfo=Db::table("user_shop")->field("shop_id,shop_name,mimg,shop_address,shop_phone,qid,latitude as lat,longitude as lng")->where("user_id=".$carinfo['user_id'])->find();
        //获取店铺de平均评分
        $remark_info=Db::table("remark")->field("id,all_score")->where("shop_id=".$shopinfo['shop_id'])->select();
        $all_score="";
        foreach ($remark_info as $k => $v) {
            $all_score+=$v['all_score'];
        }
        $user_num=count($remark_info);
        $num=@number_format($all_score/$user_num,1);
        $shopinfo['all_score']=$num?$num:0;
        $shopinfo['user_num']=$user_num?$user_num:0;
        $shopinfo['img_url']=$this->get_carimg($shopinfo['mimg']);
        //点评
        $remark=Db::table("remark")->field("id,user_id,content,create_time,all_score")->where("shop_id=".$shopinfo['shop_id'])->order("create_time desc")->find();
        if(!$remark){
            $remark['id']="";
            $remark['content']="";
            $remark['all_score']="0";
            $remark['create_time']="0";//新增
        }

        $remark['create_time']=substr($remark['create_time'], 0, 10)?substr($remark['create_time'], 0, 10):"";
        //获取用户的信息
        $userinfo=Db::table("user")->field("user_id,nickname,header_pic,phone")->where("user_id=".$remark['user_id'])->find();
        if($userinfo['header_pic']){
            $header_pic=get_carimg($userinfo['header_pic']);
        }else{
            $header_pic="";
        }
        $remark['header_pic']=$header_pic?$header_pic:"";
        $remark['nickname']=$userinfo['nickname']?$userinfo['nickname']:($userinfo['phone']?$userinfo['phone']:"");
        $remark['user_id']=$userinfo['user_id']?$userinfo['user_id']:"";
        unset($carinfo['subface_img']);
        unset($carinfo['user_id']);
        $result=array(
            "carinfo"=>$carinfo,
            "shopinfo"=>$shopinfo?$shopinfo:array(),
            "remark"=>$remark,
            'platform_phone'=>"0371-53375515"
        );
        $data=array(
            "code"=>200,
            "result"=>"获取成功",
            "body"=>$result
        );

        dump( $data);
//        $this->ajaxReturn($data);

    }


    public function asd(){

        dump($this->randStr());

    }


}