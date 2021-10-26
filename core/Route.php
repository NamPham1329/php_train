<?php
class Route{
    function handleRoute($url){
        global $router, $group;
        unset($router['default_controller']);
        $url = trim($url, '/');
        $handleUrl = $url;
        if(!empty($router)){
            foreach($router as $key=>$value){
                if(preg_match('~'.$key.'~is', $url)){
                    $handleUrl = preg_replace('~'.$key.'~is', $value, $url);
                }
            }
        }
        return $handleUrl;
    }
}
?>