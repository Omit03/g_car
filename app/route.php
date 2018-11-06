<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +--------------------------------------------------------------------
//];
use think\Route;
//// api.tp.com  ===> www.tp.com/index.php/api
//// 第一个api  代表域名前api  第二个api 代表 index.php/后面的api
//Route::domain('api','api');
//
//// api.tp.com  ===> www.tp.com/index.php/api/user/index/id/2
//Route::rule('user/:id','user/index');

//Route::rule('/','api/index/index');

Route::rule('/','index/index/index');
//Route::rule(':city/detail/:brand_id/:sys_id','index/Newcar/newcardetails');
//Route::rule(':city','index/index/index');
Route::rule(':city/newcar','index/newcar/index');
Route::rule(':city/twocar','index/twocar/index');
Route::rule(':city/sell','index/index/sell');
Route::rule(':city/change','index/change/index');
Route::rule(':city/news','index/news/index');
Route::rule(':city/appdownload','index/index/appdownload');
//Route::rule(':city/login','index/user/car_login');
//Route::rule(':city/logout','index/user/car_logout');
//Route::rule(':city/register','index/user/register');
//Route::rule(':city/per_his','index/user/person_history');

Route::rule(':city/details/:cheid','index/index/details');
Route::rule(':city/detail/:id','index/newcar/newcardetails');
Route::rule(':city/detai/:cheid','index/zerocar/zerocardetails');
//Route::rule(':city/detail/:id','index/newcar/newcardetails');
//Route::rule('zhang/:id','index/index/zhang');
//Route::rule('db','index/index/index');
//Route::rule('test/:id','api/gongneng/test');//一旦设置参数必须填写

//Route::rule('jun','api/gongneng/zhang');

//Route::rule('time/:year/[:month]','api/gongneng/test');

//Route::rule('asd$','api/gongneng/asd');

//Route::rule('type','api/gongneng/type','get'); //只能是get 请求

//Route::get('type','api/gongneng/type'); //只能是get 请求

//Route::rule('type','api/gongneng/type','post');只能是post 请求

//Route::post('type','api/gongneng/type');

//Route::rule('type','api/gongneng/type','get|post'); //支持post和get

//支持所有路由

//Route::rule('type','api/gongneng/type','*');

//Route::any('type','api/gongneng/type');

//动态批量注册

//Route::rule(["test"=>"api/gongneng/test",
//             "type"=>"api/gongneng/type"
//    ],'','get');
//
//Route::get(["test"=>"api/gongneng/test",
//            "type/:id"=>"api/gongneng/type"
//     ]);
//使用配置文件批量注册
//return [
//    "test"=>"api/gongneng/test",
//   "type/:id"=>"api/gongneng/type"
//];

//变量规则
//设置路由参数id 必须是数字 必须是1-3位
//Route::rule("type/:id","api/gongneng/type",'get',[],['id'=>'\d{1,3}']);

//路由参数
//Route::rule("type/:id","api/gongneng/type",'get',['method'=>'get','ext'=>'html'],['id'=>'\d{1,3}']);

//设置快捷路由
//声明
//类  public function geta(){
//        echo 'a';
//   }
//
//    public function getb()
//    {
//        echo 'b';
//   }
//用此方法 方法名前 是要加get
//Route::Controller('gongneng','api/gongneng');//访问http://www.hr.com:8083/hr/public/gongneng/a