<?php

namespace common\models;
use AopClient;
use AlipayTradeWapPayRequest;
/**
 * SDK工作目录
 * 存放日志，AOP缓存数据
 */
if (!defined("AOP_SDK_WORK_DIR"))
{
    define("AOP_SDK_WORK_DIR", "/tmp/");
}
/**
 * 是否处于开发模式
 * 在你自己电脑上开发程序的时候千万不要设为false，以免缓存造成你的代码修改了不生效
 * 部署到生产环境正式运营后，如果性能压力大，可以把此常量设定为false，能提高运行速度（对应的代价就是你下次升级程序时要清一下缓存）
 */
if (!defined("AOP_SDK_DEV_MODE"))
{
    define("AOP_SDK_DEV_MODE", true);
}

require(__DIR__ . '/../../vendor/third/alipay/AopSdk.php');



/**
 * 支付宝
 * https://doc.open.alipay.com/doc2/apiList.htm?spm=a219a.7629065.0.0.34bRj1&cid=1&docType=4
 * Class Alipay
 * @package common\models
 */
class Alipay {

    //外部商户创建订单并支付
    public function wapPay() {
        $aop = new AopClient ();
        $aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
        $aop->appId = 'your app_id';
        $aop->rsaPrivateKeyFilePath = 'merchant_private_key_file';
        $aop->alipayPublicKey='alipay_public_key_file';
        $aop->apiVersion = '1.0';
        $aop->postCharset='UTF-8';
        $aop->format='json';
        $request = new AlipayTradeWapPayRequest();
        $request->setBizContent = "{
            'body':'对一笔交易的具体描述信息。如果是多种商品，请将商品描述字符串累加传给body。',
            'subject':'大乐透',
            'out_trade_no':'70501111111S001111119',
            'timeout_express':'90m',
            'total_amount':9.00',
            'seller_id':'2088102147948060',
            'auth_token':'appopenBb64d181d0146481ab6a762c00714cC27'
          }
        ";
        $result = $aop->execute ( $request, NULL );
    }

}
