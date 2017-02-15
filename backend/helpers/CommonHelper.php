<?php
namespace backend\helpers;

class CommonHelper
{
    
    public static function responseJson($code = '200', $message = null, $result = array(), $options = array()) {
        $result = array('code' => $code, 'msg' => $message, 'result' => $result);
        if (is_array($options)) {
            $result = array_merge($options, $result);
        }
        header('Content-Type: application/javascript; charset=utf-8');
        exit(json_encode($result));
    }
}