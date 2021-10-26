<?php
class App
{
    private $__controller, $__action, $__params, $__routes, $__db;

    function __construct()
    { 
        global $router, $config;
        $this->__routes = new Route();  
        if(!empty($router['default_controller'])){
            $this->__controller = $router['default_controller'];
        }
        $this->__action = 'index';
        $this->__params = [];
        if(class_exists('DB'))
        {
            $dbObject = new DB();
            $this->__db = $dbObject->db;
        }
        
        $this->handleUrl();
    }
    function getUrl(){
        if(!empty($_SERVER['PATH_INFO'])){
            $url = $_SERVER['PATH_INFO'];
        } else {
            $url = '/';
        }
        return $url;
    }
    public function handleUrl()
    {
               
        $url = $this->getUrl();
        $url = $this->__routes->handleRoute($url); 
        $urlArr = array_filter(explode('/',$url));
        $urlArr = array_values($urlArr);
        $urlCheck = '';
        if(!empty($urlArr))
        {
            foreach($urlArr as $key=>$item){
                $urlCheck.=$item.'/';
                $fileCheck = rtrim($urlCheck, '/');
                $fileArr = explode('/', $fileCheck);
                $fileArr[count($fileArr)-1] = ucfirst($fileArr[count($fileArr)-1]);
                $fileCheck = implode('/', $fileArr);
    
                if(!empty($urlArr[$key-1])){
                    unset($urlArr[$key-1]);
                }
                if((file_exists('app/controllers/'.($fileCheck).'Controller.php'))){
                    $urlCheck = $fileCheck;
                    break;
                }
            }
            $urlArr = array_values($urlArr);
        }
        

        //  Xử lý controller
        if(!empty($urlArr[0])){
            $this->__controller = ucfirst($urlArr[0]);
        } else {
            $this->__controller = ucfirst($this->__controller);
        }

        //xử lý khi $urlCheck rỗng
        if(empty($urlCheck)){
            $urlCheck = $this->__controller;
        }
        if(file_exists('app/controllers/'.$urlCheck.'Controller.php')){
            require_once('controllers/'.$urlCheck.'Controller.php');
            if(class_exists($this->__controller)){
                $this->__controller = new $this->__controller;
                unset($urlArr[0]);
                if(!empty( $this->__db))
                {
                    $this->__controller->db = $this->__db;
                }
            } else {
                $this->loadError();
            }
            
        } else {
            $this->loadError();
        }
        // Xử lý action
        if(!empty($urlArr[1])){
            $this->__action = $urlArr[1];
            unset($urlArr[1]);
        }
        // xử lý param
        $this->__params = array_values($urlArr);
        
        //kiểm tra method tồn tại
        if(method_exists($this->__controller, $this->__action)){
            call_user_func_array([$this->__controller, $this->__action], $this->__params);
        } else {
            $this->loadError();
        }
    }
    public function loadError($name = "404")
    {
        require_once('errors/'.$name.'.php');
    }
}
?>