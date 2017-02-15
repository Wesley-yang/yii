<?php
namespace backend\controllers;

use common\models\Alipay;
use Yii;
use yii\web\Controller;
use common\models\SendSms;
use common\helpers\CommonHelper;
use common\models\QiNiu;
use common\models\BaiduApi;
use common\models\Push;

class TestController extends BaseController
{
    //////////////////////////////////////////
    ///     验证码
    ///////////////////////////////////////////
    public function actionIndex() {
        return $this->render('index');
    }

    //发送验证码
    public function actionSendCode() {
        $sms = new SendSms();
        $phone = '15026635821';
        $result = $sms->sendCode($phone);
        $com = new CommonHelper();
        $com->p($result);
    }

    //////////////////////////////////////////
    ///     七牛
    ///////////////////////////////////////////
    public function actionQiniu() {
        $qiniu = new QiNiu();
        $result = $qiniu->getQiniuToken();
        return $this->render('qiniu', ['imgs' => [],'qiniuToken'=>$result]);
    }

    //只做展示
    public function actionGetQiniuToken() {
        $qiniu = new QiNiu();
        $result = $qiniu->getQiniuToken();
        $com = new CommonHelper();
        $com->p($result);
    }

    //上传用到的token
    public function actionQiniuToken() {
        $qiniu = new QiNiu();
        $result = $qiniu->getQiniuToken();
        exit(json_encode($result));
    }

    public function actionUpload() {
        $params = \Yii::$app->request->post();
        $qiniu = new QiNiu();
        $result = $qiniu->upload($params['imgUrl']);
    }

    //////////////////////////////////////////
    ///     百度地图
    ///////////////////////////////////////////
    public function actionBaiduApi() {
        return $this->render('baidu');
    }

    /**
     * 传入地址，获得经纬度
     */
    public function actionGeocodingApi () {
        $address = '延长路';
        $baidu = new BaiduApi();
        $result = $baidu->geocodingApi($address);
        $com = new CommonHelper();
        $com->p($result);
    }

    /**
     * 传入地址，获得经纬度
     */
    public function actionSuggestionApi () {
        $address = '延长路';
        $baidu = new BaiduApi();
        $result = $baidu->suggestionApi($address);
        header('Content-Type: application/javascript; charset=utf-8');
        $com = new CommonHelper();
        $com->p($result);
    }

    //////////////////////////////////////////
    ///     极光推送
    ///////////////////////////////////////////

    public function actionJpush() {
        return $this->render('jpush');
    }

    public function actionPush() {
        $jpush = new Push();
        $result = $jpush->pushMessage();
        header('Content-Type: application/javascript; charset=utf-8');
        $com = new CommonHelper();
        $com->p($result);
    }

    //////////////////////////////////////////
    ///     支付宝
    ///////////////////////////////////////////
    public function actionAlipay() {
        return $this->render('alipay');
    }

    public function actionWapPay() {
        $alipay = new Alipay();
        $result = $alipay->wapPay();
        $com = new CommonHelper();
        $com->p($result);
    }

    public function actionBatch() {
        return require(__DIR__ . '/../../vendor/third/alipay/batch/index.php');
    }

}
