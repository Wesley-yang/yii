<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;


class ShopController extends BaseController
{
    public function actionIndex() {
        $session = Yii::$app->session;
        var_dump($session['user']);
        return $this->render('index');
    }
}
