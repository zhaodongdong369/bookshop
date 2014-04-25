<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-4-1
 * Time: 下午5:04
 */
set_time_limit(0);
define('ROOT_DIR', dirname(__FILE__));
define('ROOT_BASE',basename(ROOT_DIR));
define('TP_DIR', ROOT_DIR . '/ThinkPHP/');

define('__SHOP__','/'.ROOT_BASE.'/index.php');
//定义项目路径
define('APP_NAME','Book');
define('APP_PATH','./Book/');
//开启调试模式
define('APP_DEBUG',true);
//设置public路径

define('__PUBLIC__',ROOT_DIR.'/public/');
require_once(TP_DIR.'ThinkPHP.php');