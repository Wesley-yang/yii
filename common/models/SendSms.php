<?php

namespace common\models;
use Yii;
/**
 * 发送手机验证码
 * Class SendSms
 * @package common\models
 */
require(__DIR__ . '/../../vendor/third/smsCode/SendTemplateSMS.php');
class SendSms {
    /**
     * 发送短信验证码
     * @param $to 待发送的手机
     *   //Demo调用
     *   //**************************************举例说明***********************************************************************
     *   //*假设您用测试Demo的APP ID，则需使用默认模板ID 1，发送手机号是13800000000，传入参数为6532和5，则调用方式为           *
     *   //*result = sendTemplateSMS("13800000000" ,array('6532','5'),"1");																		  *
     *   //*则13800000000手机号收到的短信内容是：【云通讯】您使用的是云通讯短信模板，您的验证码是6532，请于5分钟内正确输入     *
     *   //*********************************************************************************************************************
     *   //sendTemplateSMS("",array('',''),"");//手机号码，替换内容数组，模板ID
     */
    public function sendCode($to) {
        $code = $this->createCode(6);
        $min = 2;
        $result = sendTemplateSMS($to, array($code, $min), 1);
        if ($result == 0) {
            //return true;
            echo 'success';
        } else {
            //return false;
            echo 'error';
        }
    }

    /**
     * 生成验证码
     * @param $length 长度
     * @return string
     */
    public static function createCode($length) {
        $chars = '0123456789';
        $str = '';
        if (is_numeric($length) && $length > 0) {
            for ($i = 0; $i < $length; $i++) {
                $str.= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
            }
        }
        return $str;
    }

}
