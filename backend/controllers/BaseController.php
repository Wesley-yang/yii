<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\LoginForm;

/**
 * 基类
 * Class BaseController
 * @package backend\controllers
 */
class BaseController extends Controller
{
    public function beforeAction($action) {
        $session = Yii::$app->session;
        if (!$session['user']) {
            if ($action->id != 'login') {
                return $this->redirect('/site/login');
            }
        }
        return parent::beforeAction($action);
    }
}