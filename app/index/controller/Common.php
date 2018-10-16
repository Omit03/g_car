<?php
namespace app\index\controller;

use think\Image;
use think\Request;
use think\Controller;
use think\Validate;
use think\Db;
use think\Session;
use think\Config;
use service\ToolsService;
use lib\Pages;
use think\Loader;

class Common extends Controller{

    protected $request;//用来处理参数
    protected $validater;//用来验证数据/参数
    protected $params; // 过滤后符合要求的参数
    protected $goods;
    protected $bundle;
    protected $dates;

    //解释一下 User 代表一个控制器  login 代表方法 获取验证规则用$rules['User']['login']
    protected $rules = array(

        'Index' => array(
            //搜索
            'search_newcar'=>array(
                'pp' =>'',
                'key'  =>'',
                'name'  =>'',
                'pingpai'  =>'',
                'cx'  =>'',
                'chek'  =>'',
                'jibie'  =>'',
                'yg'  =>'',
                'chs'  =>'',
                'pailiang'  =>'',
                'bsx'  =>'',
                'jinqi'  =>'',
                'ny'  =>'',
                'px'  =>'',
                'key_search'  =>'',
            ),
            'search_oldcar'=>array(
                'article_uid' =>['require'],
                'article_title'  =>'require|chsDash'
            ),
            'search_zerocar'=>array(
                'pp' =>'',
                'key'  =>'',
                'name'  =>'',
                'pingpai'  =>'',
                'cx'  =>'',
                'chek'  =>'',
                'jibie'  =>'',
                'yg'  =>'',
                'chs'  =>'',
                'pailiang'  =>'',
                'bsx'  =>'',
                'jinqi'  =>'',
                'ny'  =>'',
                'px'  =>'',
                'key_search'  =>'',
            ),
            'index'=>array(
                'id' =>'',
            ),
            'history_serach'=>array(
                'id' =>'require|number',
            ),
            'hot_serach'=>array(
                'type' =>'require|number',
            ),
            'my_appointment'=>array(
                'user_id' =>'number',
                'type' =>'number',
                'page' =>'number',
                'page_size' =>'number',
            ),
            'l_car_homepage'=>array(
                'user_id' =>'number',
            ),
            'xinche'=>array(
                'user_id' =>'number',
            ),
            'sell'=>array(
                'user_id' =>'number',
            ),
            'newcar'=>array(
                'user_id' =>'number',
            ),
            'carlist'=>array(
                'user_id' =>'number',
            ),
            'news'=>array(
                'user_id' =>'number',
            ),
            'appdownload'=>array(
                'user_id' =>'number',
            ),
            'logincar'=>array(
                'user_id' =>'number',
            ),
        ),

        'User' => array(
            'register'=>array(
                'user_phone'  =>'require|number',
                'user_pwd'  =>'require|length:32',
                'code'  =>'require|length:6',

            ),
            'login' => array(
                'user_phone' =>'require',//两种方式 有正则就用数组形式，没有就用下面也行
                'user_pwd'  =>'require|length:32',
            ),

            'upload_head_img' => array(
                'user_id' =>['require','number'],//两种方式 有正则就用数组形式，没有就用下面也行
                'user_icon'  =>'require|image|fileSize:5000000|fileExt:jpg,png,bmg.jpeg',
            ),

            'change_pwd' => array(
                'user_phone' =>['require','number'],//两种方式 有正则就用数组形式，没有就用下面也行
                'user_ini_pwd'  =>'require|length:32',
                'user_pwd'  =>'require|length:32',
            ),
            'find_pwd' => array(
                'user_phone' =>['require','number'],//两种方式 有正则就用数组形式，没有就用下面也行
                'code'  =>'require|length:6',
                'user_pwd'  =>'require|length:32',
            ),
            'bind_phone' => array(
                'user_id' =>['require','number'],//两种方式 有正则就用数组形式，没有就用下面也行
                'code'  =>'require|length:6',
                'phone'  =>['require','regex'=>'/^[1][3,4,5,7,8][0-9]{9}$/'],
            ),
            'bind_email' => array(
                'user_id' =>['require','number'],//两种方式 有正则就用数组形式，没有就用下面也行
                'code'  =>'require|length:6',
                'email'  =>'require|email',
            ),

            'set_nickname' => array(
                'user_id' =>['require','number'],//两种方式 有正则就用数组形式，没有就用下面也行
                'user_nickname'  =>'require|chsDash', //只能是汉字、字母、数字和下划线_及破折号
            ),
            'get_user_info' => array(
                // 'user_id' =>['require','number'],//两种方式 有正则就用数组形式，没有就用下面也行
                'user_phone'  =>['require','number'], //手机号

            ),
            'set_userinfo' => array(
                // 'user_id' =>['require','number'],//两种方式 有正则就用数组形式，没有就用下面也行
                'user_phone'  =>['require','number'], //手机号
                'header_pic'  =>['require'], //手机号
                'nickname'  =>['require'], //手机号
                'address'  =>['require'], //手机号
                'sex'  =>['require'], //手机号
                'birthday'  =>['require'], //手机号

            ),
            'gift_action' => array(
                'user_id' =>['require','number'],//两种方式 有正则就用数组形式，没有就用下面也行
                'content'  =>['require'],
                'name'  =>['require'],
                'telephone'  =>['require'],

            ),
            'business_entry' => array(
                'user_id' =>['require','number'],//两种方式 有正则就用数组形式，没有就用下面也行
                'phone'  =>['require'],
                'name'  =>['require'],
                'shop_name'  =>['require'],
                'business_range'  =>['require'],
                'type'  =>['require'],
                'address'  =>['require'],
                'address' =>['require'],
                'lat' =>['require'],
                'lng' =>['require'],
                'door_photo' =>['require'],
                'shop_licence' =>['require'],
                'city' =>['require'],
                //'create_time' =>['require'],

            ),
            'my_appointment' => array(
                'user_id' =>['require','number'],//两种方式 有正则就用数组形式，没有就用下面也行
                'type'  =>['require'],
                'page'  =>['require'],
                'page_size'  =>['require'],
            ),
            'rele_car_detail' => array(
                'cheid' =>['require'],

            ),

        ),

        'Article' => array(
            'add_article'=>array(
                'article_uid' =>['require'],
                'article_title'  =>'require|chsDash'
            ),
            'article_list'=>array(
                'id' =>'require|number',
                'num'  =>'number',
                'page'  =>'number',
            ),
        ),

        'Code' => array(
            'get_code'=>array(
                'user_phone' =>['require'],
                'is_exist'  =>'require|number|length:1',

            ),
        ),
          'Api' => array(
            'sale_car'=>array(
                'user_phone' =>['require'],

            ),
        )

    );
    /**
     * 基础接口
     * @param Request|null $request
     */
//    public function __construct(Request $request = null) {
//        // CORS 跨域 Options 检测响应
//        ToolsService::corsOptionsHandler();
//    }

    protected function _initialize(Request $request = null){

        parent::_initialize();

//        ToolsService::corsOptionsHandler();

        $this->request = Request::instance();

      //  $this->check_time($this->request->only(['atime']));//验证是否超时

      //  $this->check_token($this->request->param());//检查token值

      // $this->params = $this->check_params($this->request->except(['atime','token']));

       $this->params = $this->check_params($this->request->param(true));

    }

    /*
     * 检查时间是否超时
     * intval() 字符串0 数字加字符串 如123asd 是123 空数组0 非空字符串1
     * 技巧 先使用在定义
     */
    public function check_time($arr){


        if (!isset($arr['atime']) || intval($arr['atime']) <=1){

             $this->return_msg(400,'时间戳不存在');
        }

        if (time()-intval($arr['atime']) >6000){

            $this->return_msg(400,'连接超时！');
        }
    }

    /*
     * 返回code值
     */

    public function return_msg($code,$msg ='',$data=[]){

        $return_data['code'] = $code;

        $return_data['msg'] = $msg;

        $return_data['data'] = $data;

        echo json_encode($return_data);die;


    }   /*
     * 返回code值
     */

    public function return_msg_page($code,$msg ='',$endPage=[],$pageSize=[],$allNum=[],$data=[]){

        $return_data['code'] = $code;

        $return_data['msg'] = $msg;

        $return_data['endPage'] = $endPage;

        $return_data['pageSize'] = $pageSize;

        $return_data['allNum'] = $allNum;

        $return_data['data'] = $data;

        echo json_encode($return_data);die;


    }

    /*
     * 检查token
     */

    public function check_token($arr){

         /* api 传过来的token */
        if(!isset($arr['token']) || empty($arr['token'])){

            $this->return_msg(400,'token不能为空！');
        }

        $app_token = $arr['token'];

        /* 服务器生成的token */

        unset($arr['token']);

        $service_token = '';

        foreach ($arr as $key => $value){

            $service_token .=$value;
        }

       // dump($service_token);

        $service_token = md5($service_token); //服务端token

//        dump($app_token);
//       dump($service_token);die;

        /* 对比token 返回结果 */

        if($app_token !== $service_token){

            $this->return_msg(400,'token 验证不对');
        }
        
    }
    
    /*
     * 检测有效参数
     * 验证参数
     * 参数过滤
     */

    public function check_params($arr){

        /* 获取验证规则*/

        $rule = $this->rules[$this->request->controller()][$this->request->action()];



        /* 验证参数并返回错误*/

        $this->validater = new Validate($rule);

        if (!$this->validater->check($arr)){

            $this->return_msg(400,$this->validater->getError());
        }

        return $arr;

    }

    /*
     *检查是邮箱还是手机号
     */
    public function check_username($username){

        $is_email = Validate::is($username,'email')?1:0;

        $is_phone = preg_match('/^[1][3,4,5,7,8][0-9]{9}$/',$username)?4:2;

        $flag = $is_email + $is_phone;

        switch ($flag){

            case 2:
                $this->return_msg(400,'邮箱和手机号不正确');
                break;
            case 3:
                return 'email';
                break;
            case 4:
                return 'phone';
                break;
        }



    }

    /*
     * 检测用户是否存在
     */
    public function check_exist($username,$type,$exist){

       $type_num = $type == "phone"?2:4;

       $flag = $type_num + $exist;

       $res_phone = Db::name('user') ->where('phone',$username)->find();


       switch ($flag){

           case 2:
               if ($res_phone){

                   $this->return_msg(400,'此手机号已被占用');
               }

               break;
           case 3:
               if (!$res_phone){

                   $this->return_msg(400,'此手机号不存在');
               }

               break;
       }

    }

    /*
    * 检测验证码
    */
    public function check_code($user_name,$code){

        /*检测是否超时*/

        $last_time = Session::get('last_send_time');


        if (time()-$last_time >6000){

            $this->return_msg(400,'验证超时，请在一分钟内验证！');
        }


        /*检测验证码是否正确*/

        $md5_code = intval($code);

        if (Session::get('code') !== $md5_code){

            $this->return_msg(400,'验证码不正确1');
        }

        /*不管正确与否，每个验证码只能验证一次*/

        Session::set('code',null);

    }

    /*
    * 上传图像处理
     * user_id
     * user_icon file 用户头像200*200
    */
    public function upload_file($file,$type = ''){

        $info = $file -> move(ROOT_PATH.'public'.DS.'uploads');

        if ($info){

           $path = '/uploads/'.$info->getSaveName();

           /*裁剪图片*/
            if (!empty($type)){

                $this->image_edit($path,$type);
            }

            return str_replace('\\','/',$path);
        }else{

            $this->return_msg(400,$file->getError());
        }


    }

 /*
  * 图文压缩
  */
    public function image_edit($path,$type){

        $image = Image::open(ROOT_PATH.'public'.$path);

        switch ($type){

                case 'head_img':

                 $image->thumb(200,200,Image::THUMB_CENTER)->save(ROOT_PATH.'public'.$path);
                break;
                case 'bp_img':

                $image->thumb(100,100,Image::THUMB_CENTER)->save(ROOT_PATH.'public'.$path);
                break;
                case 'door_photo':

                $image->thumb(200,200,Image::THUMB_CENTER)->save(ROOT_PATH.'public'.$path);
                break;
                case 'shop_licence':

                $image->thumb(200,200,Image::THUMB_CENTER)->save(ROOT_PATH.'public'.$path);
                break;


        }


    }

    /*
     * 检测是否是高级权限
     */

    public function check_auth($username){

        $res_phone = Db::name('hr_admin') ->where('phone',$username)->find();

        if (!$res_phone){

            $this->return_msg(400,'用户非高级管理员');
        }

    }

    /*
     * 积分审批 用户增加总分
     */
    public function add_total($bp_id,$user_id){

        $dd = Db::name('hr_bp')->where('id',$bp_id)->field('is_value')->find();

        $user = Db::name('hr_user')->where('id',$user_id)->field('voucher')->find();

        $tol = $dd['is_value'] + $user['voucher'];

        $add = Db::name('hr_user')->where('id',$user_id)->setField('voucher',$tol);

        if (!$add){

            $this->return_msg(400,'总分增加失败');

        }
    }

    /*
     * 修改用户总分
     */
    public function minus_total($user_phone,$is_value){

        $user = Db::name('hr_user')->where('phone',$user_phone)->field('voucher')->find();

        $tol = $user['voucher'] - $is_value;

        $minus = Db::name('hr_user')->where('phone',$user_phone)->setField('voucher',$tol);

        if (!$minus){

            $this->return_msg(400,'总分减少失败');

        }else{
            return $res = $tol;
        }
    }

    /*
     * 积分分页
     * 分页逻辑
     */
    public function page_list(){

        $new = new Pages();
        $pageSize = 10;//显示数量
        $where['is_del'] = 0;

        $allNum = $new->allnews($where);

        $pageNum = input('pageNum');
        if (empty($pageNum)){
            $pageNum = 1;
        }
        $endPage = ceil($allNum/$pageSize); //总页数
        $list = $new->docs($pageNum,$pageSize,$where);

    }

    /*
     * 导出数据
     */
    public function execla(){


        $list = Db::table('yuyue_list')->select();

        $path = dirname(__FILE__); //找到当前脚本所在路径
        Loader::import('PHPExcel.Classes.PHPExcel');//手动引入PHPExcel.php
        Loader::import('PHPExcel.Classes.PHPExcel.IOFactory.PHPExcel_IOFactory');//引入IOFactory.php 文件里面的PHPExcel_IOFactory这个类
        $PHPExcel = new \PHPExcel();//实例化

        $PHPSheet = $PHPExcel->getActiveSheet();
        $PHPSheet->setTitle("数据"); //给当前活动sheet设置名称
        $PHPSheet->setCellValue("A1","ID")->setCellValue("B1","名字")->setCellValue("C1","电话");//表格数$PHPSheet->setCellValue("A2","张三")->setCellValue("B2","2121");//表格数据


        for($i=0;$i<count($list);$i++){

            $PHPSheet->setCellValue('A'.($i+2),$list[$i]['id']);//ID

            $PHPSheet->setCellValue('B'.($i+2),$list[$i]['username']);

            // $PHPSheet->setCellValue('C'.($i+2),$list[$i]['keshi']);

            $PHPSheet->setCellValue('C'.($i+2),$list[$i]['phone']);
        }


        $PHPWriter = \PHPExcel_IOFactory::createWriter($PHPExcel,"Excel2007");//创建生成的格式
        header('Content-Disposition: attachment;filename="表单数据.xlsx"');//下载下来的表格名
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $PHPWriter->save("php://output"); //表示在$path路径下面生成demo.xlsx文件

    }

    /*
     * 根据用户id 查找用户名 和 所属部门
     */
    public function return_userinfo($user_id){

        $where['is_del'] = 0;

        $where['id'] = $user_id;

        $field = 'login_name,dept_name';

        $join = [['hr_dept d','a.depart_name = d.dept_id']];

        $userinfo = Db::name('hr_user')->alias('a')->join($join)->field($field)->where($where)->find();

        return $userinfo;

    }

    //获取城市的ID
    public function get_city($city){
        $arr=explode("市",trim($city));
        $city=$arr[0];
        //获取city_id 123
        $city_id=Db::table('city')->field("id")->where("name like '%".$city."%'")->find();

        if(!$city_id){
            $city_id['id']=1;
        }
        return $city_id['id'];
    }

    //通过车型id查找车系名称，车型名称
    public function get_carname($cartype_id){
        $res = Db::table('car_brand')->field("name,upid")->where("id",$cartype_id)->find();
        $res2 = Db::table('car_brand')->field("name")->where("id ",$res['upid'])->find();
        return $res2['name'].' '.$res['name'];
    }

    //获取二手车图片
    public function get_carimg($img,$type=1){
        if($type==1){
            $url='http://39.106.67.47/butler_car/Uploads/relecar/';
        }elseif($type==2){
            $url='http://39.106.67.47/butler_car/Uploads/newcar/';
        }elseif($type==3){
            $url="http://39.106.67.47/butler_car/Uploads/carlogo/";
        }elseif($type==4){
            $url="http://39.106.67.47/butler_car/assets/computer/images/";
        }
        $data=explode(",",$img);
        if(count($data)>1){
            $img=$url.$data[0];
        }else{
            $img=$url.$img;
        }
        return $img;
    }

    //获取二手车图片
    public function get_carimgs($img,$type=1){
        if($type==1){
            $url='http://39.106.67.47/butler_car/Uploads/relecar/';
        }elseif($type==2){
            $url='http://39.106.67.47/butler_car/Uploads/newcar/';
        }
        $data=explode(",",$img);
        $img=array();
        foreach ($data as $key => $val) {
            $img[]=$url.$val;
        }
        return $img;
    }

    //获取变速箱
    public function get_gearbox($id){
        $gearbox=Db::table('bsq')->where("id=$id")->find();
        if($gearbox){
            return $gearbox['bsq'];
        }else{
            return "参数错误";
        }
    }

    //获取排量
    public function get_output($id){
        $output=Db::table('pailiang')->where("id=$id")->find();
        if($output){
            return $output['pailiang'];
        }else{
            return "参数错误";
        }
    }
    //获取车龄
    public function get_car_age($id){
        $car_age=Db::table('cheling')->where("id=$id")->find();
        if($car_age){
            return $car_age['cheling'];
        }else{
            return "参数错误";
        }
    }

    //获取排放标准
    public function get_blowdown($id){
        $blowdown=Db::table('p_bzhun')->where("id=$id")->find();
        if($blowdown){
            return $blowdown['biaozhun'];
        }else{
            return "参数错误";
        }
    }

    public function getCity($ip = '')
    {
        if($ip == ''){
            $url = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json";
            $ip=json_decode(file_get_contents($url),true);
            $data = $ip;
        }else{
            $url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
            $ip=json_decode(file_get_contents($url));
            if((string)$ip->code=='1'){
                return false;
            }
            $data = (array)$ip->data;
        }

        return $data;
    }
    function get_area($ip = ''){
        if($ip == ''){
            $ip = GetIp();
        }
        $url = "http://ip.taobao.com/service/getIpInfo.php?ip={$ip}";
        $ret = $this->https_request($url);
        $arr = json_decode($ret,true);
        return $arr;
    }


    public function https_request($url,$data = null){
        $curl = curl_init();

        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);

        if(!empty($data)){//如果有数据传入数据
            curl_setopt($curl,CURLOPT_POST,1);//CURLOPT_POST 模拟post请求
            curl_setopt($curl,CURLOPT_POSTFIELDS,$data);//传入数据
        }

        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        $output = curl_exec($curl);
        curl_close($curl);

        return $output;
    }

    public function app_brand_ios(){

        $list_brand = $this->list_brand(65);
        $cap = $this->Capital_ASCII(0);

        $arr = array();
        foreach ($cap as $key => $val) {
            $brand = $this->list_brand($val['num']);
            if($brand){
                // var_dump($val);
                $li = array(
                    'initial' => $val['letter'],
                    'list' => $brand ? $brand : array(),
                );
                array_push($arr,$li);
            }


        }
        return $arr;

    }

   public function list_brand($initial){
        $res = Db::table('car_brand')->field('id,img_id,initial,name')
            ->where(array('initial_num'=>$initial,'status'=>1,'level'=>1))
            ->order('sort desc')
            ->select();
        if($res){
            foreach ($res as $key => $val) {
                $res[$key]['img_url'] = $val['img_id'] ? $this->get_carimg($val['img_id'],3) : "";
                unset($res[$key]['img_id']);
            }
        }
        return $res;
    }

    /**
     * [Capital_ASCII 大写字母与ASCII码]
     * @return [type] [description]
     */
   public function Capital_ASCII($id){
        $arr = array(
            array( 'letter'=> 'A', 'num' => 65 ),
            array( 'letter'=> 'B', 'num' => 66 ),
            array( 'letter'=> 'C', 'num' => 67 ),
            array( 'letter'=> 'D', 'num' => 68 ),
            array( 'letter'=> 'E', 'num' => 69 ),
            array( 'letter'=> 'F', 'num' => 70 ),
            array( 'letter'=> 'G', 'num' => 71 ),
            array( 'letter'=> 'H', 'num' => 72 ),
            array( 'letter'=> 'I', 'num' => 73 ),
            array( 'letter'=> 'J', 'num' => 74 ),
            array( 'letter'=> 'K', 'num' => 75 ),
            array( 'letter'=> 'L', 'num' => 76 ),
            array( 'letter'=> 'M', 'num' => 77 ),
            array( 'letter'=> 'N', 'num' => 78 ),
            array( 'letter'=> 'O', 'num' => 79 ),
            array( 'letter'=> 'P', 'num' => 80 ),
            array( 'letter'=> 'Q', 'num' => 81 ),
            array( 'letter'=> 'R', 'num' => 82 ),
            array( 'letter'=> 'S', 'num' => 83 ),
            array( 'letter'=> 'T', 'num' => 84 ),
            array( 'letter'=> 'U', 'num' => 85 ),
            array( 'letter'=> 'V', 'num' => 86 ),
            array( 'letter'=> 'W', 'num' => 87 ),
            array( 'letter'=> 'X', 'num' => 88 ),
            array( 'letter'=> 'Y', 'num' => 89 ),
            array( 'letter'=> 'Z', 'num' => 90 ),
        );
        if($id){
            // 通过数字 转换首字母
            $dd = '';
            foreach ($arr as $k => $v) {
                if($v['num'] == $id){
                    $dd = $v['letter'];
                }
            }
            return $dd;
        }else{
            return $arr;
        }
    }

    /*
     * 获取二手车推荐
     */
    public function er_car(){

        $ip = $this->request->ip();

        $city = $this->get_area('61.163.128.204');//暂时写死

        $city_id = $this->get_city($city['data']['city']);

        $er_car=Db::table("rele_car")->field("pu_id,cartype_id,price,car_cardtime,car_mileage,img_300")->where("status=1 and up_under=1 and city_id=$city_id")->order("create_time desc")->limit(10)->select();
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

        return $er_car;
    }
}
