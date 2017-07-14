<?php


if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

/**
 * 系统调试设置
 * 项目正式部署后请设置为false
 */

//定义一个项目根目录的绝对路径
define('ROOT_PATH',dirname($_SERVER['SCRIPT_FILENAME'])."/");

define('APP_DEBUG', true );
define('BIND_MODULE','Wchat');
define('HTML_PATH', './HTML/');//生成静态页面的文件位置

/**
 * 应用目录设置
 * 安全期间，建议安装调试完成后移动到非WEB目录
 */
define ( 'APP_PATH', './Application/' );

if(!is_file(APP_PATH . 'User/Conf/config.php')){
    header('Location: ./install.php');
    exit;
}

/**
 * 缓存目录设置
 * 此目录必须可写，建议移动到非WEB目录
 */
define ( 'RUNTIME_PATH', './Runtime/' );

/**
 * 引入核心入口
 * ThinkPHP亦可移动到WEB以外的目录
 */
require './ThinkPHP/ThinkPHP.php';