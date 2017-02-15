<?php
namespace backend\controllers;

use backend\models\AdminUser;
use common\models\User;
use Yii;
use yii\web\Controller;
use backend\helpers\CommonHelper;

/**
 * 后台用户
 * Class AuserController
 * @package backend\controllers
 */
class AuserController extends BaseController
{
    //用户列表
    public function actionIndex() {
        $params = \Yii::$app->request->get();
        $keyword = ''; $status = '';
        if (isset($params['keyword']) && !empty($params['keyword'])) {
            $keyword = $params['keyword'];
        }
        if (isset($params['status']) && !empty($params['status'])) {
            $status = $params['status'];
        }

        $model = new AdminUser();
        $resultInfo = $model->AuserList($keyword, $status);
        return $this->render('index', [
            'resultInfo' => $resultInfo['resultInfo'],
            'pagination' => $resultInfo['pagination'],
            'keyword'  => $keyword,
        ]);
    }

    /**
     * 新增
     */
    public function actionAddUser() {
        return $this->render('addUser');
    }

    /**
     * 添加用户
     */
    public function actionDoAddUser() {
        $params = \Yii::$app->request->post();
        $commonHelper = new CommonHelper();
        if (empty($params['username']) || empty($params['password_hash']) || empty($params['email'])) {
            $commonHelper->responseJson('100404', '参数缺少');
        }
        $model = new AdminUser();
        $result = $model->addUser($params['username'], $params['password_hash'], $params['email']);
        if ($result) {
            $commonHelper->responseJson('100200', '操作成功');
        } else {
            $commonHelper->responseJson('100201', '操作失败，请重试');
        }
    }


    /**
     * 修改用户状态
     */
    public function actionUpdateUserStatus() {
        $commonHelper = new CommonHelper();
        $params = \Yii::$app->request->post();
        if (empty($params['userId'])) {
            $commonHelper->responseJson('100404', '参数缺少');
        }
        $user = new AdminUser();
        if ($params['status'] == 0) {
            $status = 10;
        } else {
            $status = 0;
        }
        if ($user->updateUserStatus($params['userId'], $status)) {
            $commonHelper->responseJson('100200', '操作成功');
        } else {
            $commonHelper->responseJson('100500', '操作失败，请重试');
        }
    }

    public function actionUpdatePassword() {
        return $this->render('updatePassword');
    }

    public function actionDoUpdatePassword() {
        $commonHelper = new CommonHelper();
        $params = \Yii::$app->request->post();
        if (empty($params['oldPass']) || empty($params['newPass'])) {
            $commonHelper->responseJson('100404', '参数缺少');
        }
        $user = new AdminUser();
        $session = Yii::$app->session;
        $userInfo = $user->userInfo($session['user']['id']);
        $commUser = new User();
        if (!$userInfo['password_hash']==sha1(sha1($params['oldPass']))) {
            $commonHelper->responseJson('100201', '旧密码错误，请重试');
        }

        if ($user->updatePassword($session['user']['id'], $params['newPass'])) {
            $commonHelper->responseJson('100200', '操作成功');
        } else {
            $commonHelper->responseJson('100500', '操作失败，请重试');
        }
    }

}