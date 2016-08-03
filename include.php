<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
header('Content-Type: text/html; charset=utf-8');
header("Access-Control-Allow-Origin: *");
//设置根路径
define("ROOT", dirname(_FILE_));
set_include_path("".PATH_SEPARATOR.ROOT."./lib".PATH_SEPARATOR.ROOT."./core".PATH_SEPARATOR.ROOT."./configs".PATH_SEPARATOR.get_include_path());
require_once 'mysql.func.php';
require_once 'image.func.php';
require_once 'common.func.php';
require_once 'userinfo.func.php';
require_once 'string.func.php';
require_once 'page.func.php';
require_once 'configs.php';
require_once 'admin.inc.php';
require_once 'userinfo.inc.php';
require_once 'userfeedback.inc.php';
connect();