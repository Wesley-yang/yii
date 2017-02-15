<?php
namespace backend\controllers;

use backend\helpers\CommonHelper;
use common\models\WxWechats;
use Yii;
use yii\web\Controller;


class WeixinController extends BaseController
{
    //微信列表
    public function actionList() {
        return $this->render('list');
    }

    public function actionSet() {
        return $this->render('set');
    }

    /**
     * 微信设置
     */
    public function actionDoAdd() {
        $params = \Yii::$app->request->post();
        $commonHelper = new CommonHelper();
        if (!$params['account'] || !$params['original'] || !$params['appId'] || !$params['appSecret']) {
            $commonHelper->responseJson('100400', '参数缺少');
        }
        $wx = new WxWechats();
        if ($wx->addSet($params['account'], $params['original'], $params['appId'], $params['appSecret'], $params['username'], $params['password'], $params['name'])) {
            $commonHelper->responseJson('100200', '操作成功！');
        } else {
            $commonHelper->responseJson('100500', '操作失败，请重试！');
        }
    }


}
