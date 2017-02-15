<?php
namespace common\helpers;

class CommonHelper
{

    /**
     * 接口格式返回，json
     * @param string $code 状态码
     * @param null $message 返回的message信息
     * @param array $result 返回的内容
     * @param array $options 扩展的返回内容
     */
    public static function responseJson($code = '200', $message = null, $result = array(), $options = array()) {
        $result = array('code' => $code, 'msg' => $message, 'result' => $result);
        if (is_array($options)) {
            $result = array_merge($options, $result);
        }
        header('Content-Type: application/javascript; charset=utf-8');
        exit(json_encode($result));
    }

    /**
     * @param $array
     */
    public function p($array) {
        echo '<prev>';
        print_r($array);
        echo '</prev>';
    }
}