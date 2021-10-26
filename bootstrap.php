<?php
define('_DIR_ROOT',__DIR__);

//Xử lý http root
if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on'){
    $web_root = 'https://'.$_SERVER['HTTP_HOST'];
} else {
    $web_root = 'http://'.$_SERVER['HTTP_HOST'];
}
$folder = str_replace(strtolower(str_replace("/",'\\',$_SERVER['DOCUMENT_ROOT'])), '',strtolower(_DIR_ROOT));
$web_root = $web_root.$folder;
define('_WEB_ROOT', $web_root);


$configs_dir = scandir('configs');

if(!empty($configs_dir))
{    
    foreach($configs_dir as $item)
    {
        if($item != '.' && $item != '..' && file_exists('configs/'.$item)){
            require_once('configs/'.$item);
        }
    }
}
require_once('core/Route.php');//xử lý route
require_once('app/App.php');// xử lý url


if(!empty($config['database']))
{
    $db_config = array_filter($config['database']); 
    if(!empty($db_config))
    {
        require('core/Connection.php');// kết nối database
        require('core/QueryBuilder.php');// xử lý query builder
        require('core/Database.php');//truy vấn db
        require('core/DB.php');// xử lý gọi querey builder được trong controller
    }
};
require_once('core/Model.php');// gọi model
require_once('core/Controller.php');// gọi controller
require_once('core/Request.php');// load request
require_once('core/Response.php');// load response
?>