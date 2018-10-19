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
            'change'=>array(
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
            'join_us'=>array(
                'user_id' =>'number',
            ),
            'link_us'=>array(
                'user_id' =>'number',
            ),
            'service'=>array(
                'user_id' =>'number',
            ),
            'website'=>array(
                'user_id' =>'number',
            ),
            'details'=>array(
                'user_id' =>'number',
            ),
            'asd'=>array(
                'user_id' =>'number',
            ),
        ),
        'Newcar' => array(
            'index'=>array(
                'user_id' =>'number',
            ),
            'newcardetails'=>array(
                'brand_id' =>'number',
                'sys_id' =>'number',
                'cartype_id' =>'number',
                'id' =>'number',
            ),
        ),
        'Twocar' => array(
            'index'=>array(
                'user_id' =>'number',
            ),
            'car_compare'=>array(
                'user_id' =>'number',
            ),
        ),
        'Zerocar' => array(
            'zerocardetails'=>array(
                'cheid' =>'number',
            ),
        ),
        'Change' => array(
            'index'=>array(
                'user_id' =>'number',
            ),
        ),
        'News' => array(
            'index'=>array(
                'user_id' =>'number',
            ),
            'newsdetails'=>array(
                'user_id' =>'number',
            ),
        ),
        'Shop' => array(
            'index'=>array(
                'user_id' =>'number',
            ),
            'shop_list'=>array(
                'user_id' =>'number',
            ),
            'shop_info'=>array(
                'user_id' =>'number',
            ),
            'add_comment'=>array(
                'user_id' =>'number',
            ),
        ),

        'User' => array(
            'car_login'=>array(
                'user_id' =>'number',
            ),
            'person_manage'=>array(
                'user_id' =>'number',
            ),
            'person_release'=>array(
                'user_id' =>'number',
            ),
            'person_public'=>array(
                'user_id' =>'number',
            ),
            'person_busenter'=>array(
                'user_id' =>'number',
            ),
            'person_opportunity'=>array(
                'user_id' =>'number',
            ),
            'person_info'=>array(
                'user_id' =>'number',
            ),
            'person_collect'=>array(
                'user_id' =>'number',
            ),
            'person_history'=>array(
                'user_id' =>'number',
            ),
            'person_feedback'=>array(
                'user_id' =>'number',
            ),
            'person_order'=>array(
                'user_id' =>'number',
            ),
            'register'=>array(
                'user_phone'  =>'require|number',
                'user_pwd'  =>'require|length:32',
                'code'  =>'require|length:6',
            ),
            'login' => array(
                'user_phone' =>'number',//两种方式 有正则就用数组形式，没有就用下面也行
                'user_pwd'  =>'number',
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
            'asd' => array(
                'cheid' =>'',

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

    //获取所有车龄
    public function get_car_allage(){

        $car_age=Db::table('cheling')->select();

        return $car_age;

    }
    //获取进气方式
    function get_inlet_air($id){
        $inlet_air=Db::table('jinqi')->where("id=$id")->find();
        if($inlet_air){
            return $inlet_air['jinqi'];
        }else{
            return "参数错误";
        }
    }
    //获取燃料
    function get_fuel($id){
        $fuel=Db::table('nengyuan')->where("id=$id")->find();
        if($fuel){
            return $fuel['nengyuan'];
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
     * 获取city_id
     */

    public function city_id(){

        $ip = $this->request->ip();

        $city = $this->get_area('61.163.128.204');//暂时写死

        $city_id = $this->get_city($city['data']['city']);

        return $city_id;
    }
    /*
     * 获取二手车推荐
     */
    public function er_car($city_id){

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

        return $er_car;
    }

    /*
     * 获取新车
     */
    public function new_car($city_id){

        $new_car=Db::table("new_car")->field("id,brand_id,sys_id,cartype_id,price,img_300,pay10_s2,pay10_y2,pay10_n2")->where("is_tj=1 and status=1 and city_id=".$city_id)->order("create_time desc")->limit(20)->select();
        foreach ($new_car as $key => $val) {
            $new_car[$key]['img_url']=$this->get_carimg($val['img_300'],2);
            $new_car[$key]['name']=$this->get_carname($val['cartype_id']);
            $new_car[$key]['pay10_s2']=$val['pay10_s2'];
            $new_car[$key]['pay10_y2']=$val['pay10_y2'];
            unset($new_car[$key]['img_300']);
        }

        return $new_car;

     }

     /*
      * 获取零首付 推荐
      */
    public function car_zero($city_id){

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

        return $car_zero;
    }
    /*
     * 获取品牌
     */
    public function brand(){

        $brand=Db::table("car_brand")->field("id,img_id,name")->where("id in (1,9,10,19,20,22)")->select();
        foreach ($brand as $key => $val) {
            $brand[$key]['img_url']=$this->get_carimg($val['img_id'],3);
            unset($brand[$key]["img_id"]);
        }

        return $brand;
    }

    /*
     * 价格
     */
    public function price(){

        $price=Db::table("price_range")->field("price_id as id,name")->order("level asc")->limit(4)->select();

        return $price;
    }

    /*
     * 级别
     */
    public function subface()
    {
        $subface=Db::table("subface")->field("face_id as id,name,img")->order("level asc")->limit(5)->select();

        return $subface;
    }

    /*
     * salt 盐值
     */
    public function randStr($len=6,$format='ALL') {
        switch($format) {
            case 'ALL':
                $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'; break;
            case 'CHAR':
                $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; break;
            case 'NUMBER':
                $chars='0123456789'; break;
            default :
                $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                break;
        }
        mt_srand((double)microtime()*1000000*getmypid());
        $password="";
        while(strlen($password)<$len)
            $password.=substr($chars,(mt_rand()%strlen($chars)),1);
        return $password;
    }

    /*
       *http://39.106.67.47/new_api/User/shop/get_carparam
       * 获取具体参数配置
       * 车id
       * type 1 新车 2 二手 3 零首付
       *
       */
    public function get_carparam($cheid,$type){


        //验证车辆是否存在
        if($type==1){
            $carinfo=Db::table("new_car")->where("id=$cheid")->find();
        }elseif($type==2){
            $carinfo=Db::table("rele_car")->where("pu_id=$cheid")->find();
        }elseif ($type==3) {
            $carinfo=Db::table("l_car")->where("id=$cheid")->find();
        }
        if(!$carinfo){
            $data = array (
                'code'   => 204,
                'result' => '车辆信息错误'
            );
            return 'c参数有误';

        }
        //查找配置参数
        $param=$this->paramss($cheid,$type);

        return $param;

    }


    //获取二手车的首付以及月供
    public function get_rele_car_fenqi($pu_id){
        //查询数据
        $infos=Db::table("rele_car")->field("pu_id,car_cardtime,price")->where("pu_id=".$pu_id)->find();
        $time=$this->change_time($infos['car_cardtime']);
        $data1=time()-$time;
        $data2=365*24*60*60*10;
        if($data1 < $data2 && $infos['price']>3 ){
            //计算首付，月供
            $arr['pay_20s']=$pay_20s=round($infos['price']*0.2,1);
            $arr['pay_20y']=$pay_20y=ceil($infos['price']*0.8/36*10000);
            $arr['pay_20n']=36;
        }
       // dump($arr);die;
        return $arr;
    }

    //时间转换为时间戳
    public function change_time($date){
        $aa1=explode('年', $date);
        $year1=$aa1[0];
        $aaa1=explode('月', $aa1['1']);
        $month1=$aaa1[0];
        $aaaa1=explode('日', $aaa1['1']);
        $day1=$aaaa1[0];
        $time=$year1."-".$month1."-".$day1;
        $res=strtotime($time);
        return $res;
    }

    /**
     * [param 详情参数]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function paramss($cheid,$type=2)
    {
        $join = [['rele_param b','b.param_id=a.id']];

        //查找配置参数
        $res=Db::table("param")->alias('a')->join($join)->where("b.pu_id=$cheid and b.type=$type")->field("a.*")->find();
        if($res){
            // 基本信息
            // 基本信息
            $info = array(
                array( 'name' => '车型名称', 'content' => $res['car_name'], 'is_dot' => 2, ),
                array( 'name' => '厂商指导价(元)', 'content' => $res['price'], 'is_dot' => 2,  ),
                array( 'name' => '厂商', 'content' => $res['firm'], 'is_dot' => 2, ),
                array( 'name' => '级别', 'content' => $res['subface'], 'is_dot' => 2, ),
                array( 'name' => '能源类型', 'content' => $res['fuel'], 'is_dot' => 2, ),
                array( 'name' => '上市时间', 'content' => $res['shangshi'], 'is_dot' => 2, ),
                array( 'name' => '工信部纯电续驶里程(km)', 'content' => $res['oil_wear1'], 'is_dot' => 2, ),
                array( 'name' => '最大功率(kW)', 'content' => $res['max_kw'], 'is_dot' => 2, ),
                array( 'name' => '最大扭矩(N·m)', 'content' => $res['max_nm'], 'is_dot' => 2, ),
                array( 'name' => '发动机', 'content' => $res['motor'], 'is_dot' => 2, ),
                array( 'name' => '变速箱', 'content' => $res['gearbox'], 'is_dot' => 2, ),
                array( 'name' => '长*宽*高(mm)', 'content' => $res['size'], 'is_dot' => 2, ),
                array( 'name' => '车身结构', 'content' => $res['bodywork'], 'is_dot' => 2, ),
                array( 'name' => '最高车速(km/h)', 'content' => $res['max_speed'], 'is_dot' => 2, ),
                array( 'name' => '官方0-100km/h加速(s)', 'content' => $res['speed1'], 'is_dot' => 2, ),
                array( 'name' => '实测0-100km/h加速(s)', 'content' => $res['speed2'], 'is_dot' => 2, ),
                array( 'name' => '实测100-0km/h制动(m)', 'content' => $res['speed3'], 'is_dot' => 2, ),
                array( 'name' => '实测油耗(L/100km)	', 'content' => $res['oil_wear2'], 'is_dot' => 2, ),
                array( 'name' => '整车质保', 'content' => $res['zhibao'], 'is_dot' => 2, ),
            );
            $car_body = array(
                array( 'name' => '长度(mm)', 'content' => $res['length1'], 'is_dot' => 2, ),
                array( 'name' => '宽度(mm)', 'content' => $res['width1'], 'is_dot' => 2,  ),
                array( 'name' => '高度(mm)', 'content' => $res['height1'], 'is_dot' => 2, ),
                array( 'name' => '轴距(mm)', 'content' => $res['cszj'], 'is_dot' => 2, ),
                array( 'name' => '前轮距(mm)', 'content' => $res['csqlj'], 'is_dot' => 2, ),
                array( 'name' => '后轮距(mm)', 'content' => $res['cshlj'], 'is_dot' => 2, ),
                array( 'name' => '最小离地间隙(mm)', 'content' => $res['zxldjju'], 'is_dot' => 2, ),
                array( 'name' => '车身结构', 'content' => $res['csjgou'], 'is_dot' => 2, ),
                array( 'name' => '车门数(个)', 'content' => $res['cmshu'], 'is_dot' => 2, ),
                array( 'name' => '座位数(个)', 'content' => $res['zwshu'], 'is_dot' => 2, ),
                array( 'name' => '油箱容积(L)', 'content' => $res['yxiangrj'], 'is_dot' => 2, ),
                array( 'name' => '行李厢容积(L)', 'content' => $res['xlxiangrj'], 'is_dot' => 2, ),
                array( 'name' => '整备质量(kg)', 'content' => $res['zbzl'], 'is_dot' => 2, ),
            );
            $base = array(
                array( 'name' => '发动机型号', 'content' => $res['fdjxh'], 'is_dot' => 2, ),
                array( 'name' => '排量(mL)', 'content' => $res['pliang'], 'is_dot' => 2,  ),
                array( 'name' => '排量(L)', 'content' => $res['pliang1'], 'is_dot' => 2, ),
                array( 'name' => '进气形式', 'content' => $res['jqxings'], 'is_dot' => 2, ),
                array( 'name' => '气缸排列形式', 'content' => $res['qgplxings'], 'is_dot' => 2, ),
                array( 'name' => '气缸数(个)', 'content' => $res['qgshu'], 'is_dot' => 2, ),
                array( 'name' => '每缸气门数(个)', 'content' => $res['qmshu'], 'is_dot' => 2, ),
                array( 'name' => '压缩比	', 'content' => $res['ysuob'], 'is_dot' => 2, ),
                array( 'name' => '配气机构', 'content' => $res['pqjgou'], 'is_dot' => 2, ),
                array( 'name' => '缸径(mm)', 'content' => $res['gjing'], 'is_dot' => 2, ),
                array( 'name' => '行程(mm)', 'content' => $res['xcheng'], 'is_dot' => 2, ),
                array( 'name' => '最大马力(Ps)', 'content' => $res['zdml'], 'is_dot' => 2, ),
                array( 'name' => '最大功率(kW)	', 'content' => $res['zdgl'], 'is_dot' => 2, ),
                array( 'name' => '最大功率转速(rpm)', 'content' => $res['rpm'], 'is_dot' => 2, ),
                array( 'name' => '最大扭矩(N·m)', 'content' => $res['maxnj'], 'is_dot' => 2, ),
                array( 'name' => '最大扭矩转速(rpm)	', 'content' => $res['maxnjzs'], 'is_dot' => 2, ),
                array( 'name' => '发动机特有技术	', 'content' => $res['tyjshu'], 'is_dot' => 2, ),
                array( 'name' => '燃料形式', 'content' => $res['rljshu'], 'is_dot' => 2, ),
                array( 'name' => '燃油标号', 'content' => $res['rybiaoh'], 'is_dot' => 2, ),
                array( 'name' => '供油方式	', 'content' => $res['gyfshi'], 'is_dot' => 2, ),
                array( 'name' => '缸盖材料	', 'content' => $res['ggcliao'], 'is_dot' => 2, ),
                array( 'name' => '缸体材料', 'content' => $res['gtcliao'], 'is_dot' => 2, ),
                array( 'name' => '环保标准', 'content' => $res['hbbiaoz'], 'is_dot' => 2, ),
            );
            $gearbox = array(
                array( 'name' => '挡位个数', 'content' => $res['dweigs'], 'is_dot' => 2, ),
                array( 'name' => '变速箱类型', 'content' => $res['bsxleix'], 'is_dot' => 2,  ),
                array( 'name' => '简称', 'content' => $res['jiancheng'], 'is_dot' => 2, ),
            );
            $dpfxiang = array(
                array( 'name' => '驱动方式', 'content' => $res['qdfshi'], 'is_dot' => 2, ),
                array( 'name' => '前悬架类型', 'content' => $res['qxuanjlx'], 'is_dot' => 2,  ),
                array( 'name' => '后悬架类型', 'content' => $res['hxuanglx'], 'is_dot' => 2, ),
                array( 'name' => '助力类型', 'content' => $res['zhullx'], 'is_dot' => 2, ),
                array( 'name' => '车体结构', 'content' => $res['ctijg'], 'is_dot' => 2, ),
            );
            $clzhid = array(
                array( 'name' => '前制动器类型', 'content' => $res['qzdqilx'], 'is_dot' => 2, ),
                array( 'name' => '后制动器类型', 'content' => $res['hzdqilx'], 'is_dot' => 2,  ),
                array( 'name' => '驻车制动类型', 'content' => $res['zhuczdlx'], 'is_dot' => 2, ),
                array( 'name' => '前轮胎规格	', 'content' => $res['qluntgg'], 'is_dot' => 2, ),
                array( 'name' => '后轮胎规格', 'content' => $res['hluntgg'], 'is_dot' => 2, ),
                array( 'name' => '备胎规格', 'content' => $res['beitgg'], 'is_dot' => 2, )
            );
            $safe_base = array(
                array( 'name' => '主/副驾驶座安全气囊', 'content' => $res['zfqnang'], 'is_dot' => 2, ),
                array( 'name' => '前/后排侧气囊', 'content' => $res['qhcqnang'], 'is_dot' => 2,  ),
                array( 'name' => '前/后排头部气囊(气帘)', 'content' => $res['qhptqnang'], 'is_dot' => 1, ),
                array( 'name' => '膝部气囊', 'content' => $res['xbqnang'], 'is_dot' => 2, ),
                array( 'name' => '胎压监测装置', 'content' => $res['tyjczzhi'], 'is_dot' => 1, ),
                array( 'name' => '零胎压继续行驶', 'content' => $res['ltyjxxshi'], 'is_dot' => 1, ),
                array( 'name' => '安全带未系提示', 'content' => $res['aqdwjtshi'], 'is_dot' => 1, ),
                array( 'name' => 'ISOFIX儿童座椅接口	', 'content' => $res['etzyjiek'], 'is_dot' => 2, ),
                array( 'name' => 'ABS防抱死	', 'content' => $res['abs'], 'is_dot' => 1, ),
                array( 'name' => '制动力分配(EBD/CBC等)	', 'content' => $res['zdlfpei'], 'is_dot' => 1, ),
                array( 'name' => '刹车辅助(EBA/BAS/BA等)', 'content' => $res['scfzhu'], 'is_dot' => 1, ),
                array( 'name' => '牵引力控制(ASR/TCS/TRC等)	', 'content' => $res['qylkzhi'], 'is_dot' => 2, ),
                array( 'name' => '车身稳定控制(ESC/ESP/DSC等)', 'content' => $res['cswdkzhi'], 'is_dot' => 1, ),
                array( 'name' => '并线辅助', 'content' => $res['bxfzhu'], 'is_dot' => 1, ),
                array( 'name' => '车道偏离预警系统', 'content' => $res['cdplyjxtong'], 'is_dot' => 1, ),
                array( 'name' => '主动刹车/主动安全系统	', 'content' => $res['zdsche'], 'is_dot' => 1, ),
                array( 'name' => '夜视系统', 'content' => $res['ysxtong'], 'is_dot' => 2, )
            );
            $fzcz = array(
                array( 'name' => '前/后驻车雷达', 'content' => $res['qhzclda'], 'is_dot' => 2, ),
                array( 'name' => '倒车视频影像', 'content' => $res['dcspyxiang'], 'is_dot' => 2,  ),
                array( 'name' => '全景摄像头', 'content' => $res['qjsxtou'], 'is_dot' => 1, ),
                array( 'name' => '定速巡航', 'content' => $res['dsxhang'], 'is_dot' => 1, ),
                array( 'name' => '自适应巡航', 'content' => $res['zsyxhang'], 'is_dot' => 2, ),
                array( 'name' => '自动泊车入位', 'content' => $res['zdbche'], 'is_dot' => 1, ),
                array( 'name' => '发动机启停技术', 'content' => $res['fdjqting'], 'is_dot' => 2, ),
                array( 'name' => '上坡辅助', 'content' => $res['spfzhu'], 'is_dot' => 1, ),
                array( 'name' => '自动驻车', 'content' => $res['zdzche'], 'is_dot' => 2, ),
                array( 'name' => '陡坡缓降', 'content' => $res['dphjiang'], 'is_dot' => 2, ),
                array( 'name' => '可变悬架', 'content' => $res['kbxgua'], 'is_dot' => 1, ),
                array( 'name' => '空气悬架', 'content' => $res['kqxgua'], 'is_dot' => 1, ),
                array( 'name' => '电磁感应悬架', 'content' => $res['dcgyxgua'], 'is_dot' => 1, ),
                array( 'name' => '可变转向比', 'content' => $res['kbzxbi'], 'is_dot' => 1, ),
                array( 'name' => '前桥限滑差速器/差速锁', 'content' => $res['qqxscssuo'], 'is_dot' => 1, ),
                array( 'name' => '中央差速器锁止功能', 'content' => $res['zycsqszhi'], 'is_dot' => 1, ),
                array( 'name' => '后桥限滑差速器/差速锁', 'content' => $res['hqcssuo'], 'is_dot' => 1, ),
                array( 'name' => '整体主动转向系统', 'content' => $res['ztzdzxiang'], 'is_dot' => 1, ),
            );
            $wbfdpzhi = array(
                array( 'name' => '电动天窗', 'content' => $res['ddtchuang'], 'is_dot' => 1, ),
                array( 'name' => '全景天窗', 'content' => $res['qjtchuang'], 'is_dot' => 2,  ),
                array( 'name' => '运动外观套件', 'content' => $res['ydwgtjian'], 'is_dot' => 1, ),
                array( 'name' => '铝合金轮圈', 'content' => $res['lhjlquan'], 'is_dot' => 2, ),
                array( 'name' => '电动吸合门', 'content' => $res['ddxhmen'], 'is_dot' => 2, ),
                array( 'name' => '侧滑门', 'content' => $res['chmen'], 'is_dot' => 1, ),
                array( 'name' => '电动后备厢', 'content' => $res['ddhbxiang'], 'is_dot' => 2, ),
                array( 'name' => '发动机电子防盗', 'content' => $res['fdjdzfdao'], 'is_dot' => 2, ),
                array( 'name' => '车内中控锁', 'content' => $res['cnzksuo'], 'is_dot' => 1, ),
                array( 'name' => '遥控钥匙', 'content' => $res['ykyshi'], 'is_dot' => 2, ),
                array( 'name' => '无钥匙启动系统', 'content' => $res['wysqd'], 'is_dot' => 2, ),
                array( 'name' => '无钥匙进入系统', 'content' => $res['wysjru'], 'is_dot' => 2, ),
            );
            $nbbase = array(
                array( 'name' => '皮质方向盘', 'content' => $res['pzfxpan'], 'is_dot' => 1, ),
                array( 'name' => '方向盘调节', 'content' => $res['fxptjie'], 'is_dot' => 1,  ),
                array( 'name' => '方向盘电动调节', 'content' => $res['fxpddtjie'], 'is_dot' => 1, ),
                array( 'name' => '多功能方向盘', 'content' => $res['dgnfxpan'], 'is_dot' => 1, ),
                array( 'name' => '方向盘换挡', 'content' => $res['fxphdang'], 'is_dot' => 1, ),
                array( 'name' => '方向盘加热', 'content' => $res['fxpjre'], 'is_dot' => 1, ),
                array( 'name' => '行车电脑显示屏', 'content' => $res['xcdnao'], 'is_dot' => 1, ),
                array( 'name' => 'HUD抬头数字显示', 'content' => $res['hud'], 'is_dot' => 1, ),
            );
            $zybase = array(
                array( 'name' => '座椅材质', 'content' => $res['zyczhi'], 'is_dot' => 1, ),
                array( 'name' => '运动风格座椅', 'content' => $res['ydfgzyi'], 'is_dot' => 1,  ),
                array( 'name' => '座椅高低调节', 'content' => $res['zygdtjie'], 'is_dot' => 1, ),
                array( 'name' => '腰部支撑调节', 'content' => $res['ybzctjie'], 'is_dot' => 1, ),
                array( 'name' => '肩部支撑调节', 'content' => $res['jbzctjie'], 'is_dot' => 1, ),
                array( 'name' => '主/副驾驶座电动调节', 'content' => $res['zfjszdtj'], 'is_dot' => 1, ),
                array( 'name' => '第二排靠背角度调节', 'content' => $res['depkbtjie'], 'is_dot' => 1, ),
                array( 'name' => '第二排座椅移动', 'content' => $res['depzyydong'], 'is_dot' => 1, ),
                array( 'name' => '后排座椅电动调节', 'content' => $res['hpzyddtjie'], 'is_dot' => 1, ),
                array( 'name' => '电动座椅记忆', 'content' => $res['ddzyjyi'], 'is_dot' => 1, ),
                array( 'name' => '前/后排座椅加热', 'content' => $res['qhpzyjre'], 'is_dot' => 1, ),
                array( 'name' => '前/后排座椅通风', 'content' => $res['qhpzytfeng'], 'is_dot' => 1, ),
                array( 'name' => '前/后排座椅按摩', 'content' => $res['qhpzyamo'], 'is_dot' => 1, ),
                array( 'name' => '后排座椅放倒方式', 'content' => $res['hpzyfdfshi'], 'is_dot' => 1, ),
                array( 'name' => '前/后中央扶手', 'content' => $res['qhzyfshou'], 'is_dot' => 1, ),
                array( 'name' => '后排杯架', 'content' => $res['hpbjia'], 'is_dot' => 1,)
            );
            $dmtbase = array(
                array( 'name' => 'GPS导航系统', 'content' => $res['gps'], 'is_dot' => 2, ),
                array( 'name' => '定位互动服务', 'content' => $res['dwhdfwu'], 'is_dot' => 2,  ),
                array( 'name' => '中控台彩色大屏', 'content' => $res['zktcsdping'], 'is_dot' => 2, ),
                array( 'name' => '中控液晶屏分屏显示', 'content' => $res['zyyjfpxshi'], 'is_dot' => 2, ),
                array( 'name' => '蓝牙/车载电话', 'content' => $res['lyczdhua'], 'is_dot' => 2, ),
                array( 'name' => '车载电视', 'content' => $res['czdshi'], 'is_dot' => 2, ),
                array( 'name' => '后排液晶屏', 'content' => $res['hpyjping'], 'is_dot' => 2, ),
                array( 'name' => 'CD/DVD', 'content' => $res['cddvd'], 'is_dot' => 2, ),
                array( 'name' => '扬声器品牌', 'content' => $res['ysqppai'], 'is_dot' => 2, ),
                array( 'name' => '扬声器数量', 'content' => $res['ysqsliang'], 'is_dot' => 2, ),
            );
            $lightbase = array(
                array( 'name' => '近光灯', 'content' => $res['jgdeng'], 'is_dot' => 2, ),
                array( 'name' => 'LED日间行车灯', 'content' => $res['rjxcdeng'], 'is_dot' => 2,  ),
                array( 'name' => '自动头灯', 'content' => $res['zdtdeng'], 'is_dot' => 2, ),
                array( 'name' => '转向辅助灯', 'content' => $res['zxfzdeng'], 'is_dot' => 2, ),
                array( 'name' => '转向头灯', 'content' => $res['zxtdeng'], 'is_dot' => 2, ),
                array( 'name' => '前雾灯', 'content' => $res['qwdeng'], 'is_dot' => 2, ),
                array( 'name' => '大灯高度可调', 'content' => $res['ddgdktiao'], 'is_dot' => 2, ),
                array( 'name' => '大灯清洗装置', 'content' => $res['ddqxzzhi'], 'is_dot' => 2, ),
                array( 'name' => '车内氛围灯', 'content' => $res['cnfwdeng'], 'is_dot' => 2, )
            );
            $blhsjing = array(
                array( 'name' => '前/后电动车窗', 'content' => $res['qhddcchuang'], 'is_dot' => 2, ),
                array( 'name' => '车窗防夹手功能', 'content' => $res['ccyjsjiang'], 'is_dot' => 2,  ),
                array( 'name' => '防紫外线/隔热玻璃', 'content' => $res['fzwxian'], 'is_dot' => 2, ),
                array( 'name' => '后视镜电动调节', 'content' => $res['hsjddtjie'], 'is_dot' => 2, ),
                array( 'name' => '后视镜加热', 'content' => $res['hsjjre'], 'is_dot' => 2, ),
                array( 'name' => '内/外后视镜自动防眩目', 'content' => $res['hsjfxmu'], 'is_dot' => 2, ),
                array( 'name' => '后视镜电动折叠', 'content' => $res['hsjddzd'], 'is_dot' => 2, ),
                array( 'name' => '后视镜记忆', 'content' => $res['hsjjyi'], 'is_dot' => 2, ),
                array( 'name' => '后风挡遮阳帘', 'content' => $res['hfdzyang'], 'is_dot' => 2, ),
                array( 'name' => '后排侧遮阳帘', 'content' => $res['hczylian'], 'is_dot' => 2, ),
                array( 'name' => '后排侧隐私玻璃', 'content' => $res['hpysbli'], 'is_dot' => 2, ),
                array( 'name' => '遮阳板化妆镜', 'content' => $res['zybhzjing'], 'is_dot' => 2, ),
                array( 'name' => '后雨刷', 'content' => $res['hyshua'], 'is_dot' => 2, ),
                array( 'name' => '感应雨刷', 'content' => $res['gyyshua'], 'is_dot' => 2, ),
            );
            $ktbxiang = array(
                array( 'name' => '空调控制方式', 'content' => $res['ktkzfshi'], 'is_dot' => 2, ),
                array( 'name' => '后排独立空调', 'content' => $res['hpdlktiao'], 'is_dot' => 2,  ),
                array( 'name' => '后座出风口', 'content' => $res['hzcfkou'], 'is_dot' => 2, ),
                array( 'name' => '温度分区控制', 'content' => $res['wdfqkxzhi'], 'is_dot' => 2, ),
                array( 'name' => '车内空气调节/花粉过滤', 'content' => $res['cnkqtjie'], 'is_dot' => 2, ),
                array( 'name' => '车载冰箱', 'content' => $res['czbxiang'], 'is_dot' => 2, )
            );
            $rr = array(
                'info' => $info,
                'car_body' => $car_body,
                'base' => $base,
                'gearbox' => $gearbox,
                'dpfxiang' => $dpfxiang,
                'clzhid' => $clzhid,
                'safe_base' => $safe_base,
                'fzcz' => $fzcz,
                'wbfdpzhi' => $wbfdpzhi,
                'nbbase' => $nbbase,
                'zybase' => $zybase,
                'dmtbase' => $dmtbase,
                'lightbase' => $lightbase,
                'blhsjing' => $blhsjing,
                'ktbxiang' => $ktbxiang,
            );
        }
        return $rr;
    }

    //去重
    //$arr->传入数组   $key->判断的key值
    public function array_unset_tt($arr,$key){
        //建立一个目标数组
        $res = array();
        foreach ($arr as $value) {
            //查看有没有重复项

            if(isset($res[$value[$key]])){
                //有：销毁

                unset($value[$key]);

            }else{

                $res[$value[$key]] = $value;
            }
        }
        return $res;
    }

    //获取厂商
    function get_firm($sys_id){
        $firm=Db::table("car_brand")->where("id=$sys_id")->value("upid");
        return $firm;
    }

}
