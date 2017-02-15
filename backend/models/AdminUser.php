<?php
namespace backend\models;

use Yii;
use yii\data\Pagination;

/**
 * 后台用户
 * Class AdminUser
 * @package backend\models
 */
class AdminUser extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'admin_user';
    }

    /**
     * 后台人员列表
     * @param $keyword
     * @param int $status
     * @return array
     */
    public function AuserList($keyword, $status = 0) {
        $where = '1=1';
        if (!empty($keyword)) {
            $where .= " and (admin_user.username like '%".$keyword."%')";
        }
        $query = AdminUser::find()->where($where);
        $pagination = new Pagination([
            'defaultPageSize' => Yii::$app->params['pageNum'],
            'totalCount' => $query->where($where)->count(),
        ]);
        $select = 'admin_user.*';
        $orderBy = 'created_at DESC';
        $resultInfo = $query
            ->orderBy($orderBy)
            ->select($select)
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->asArray()
            ->all();
        return [ 'resultInfo' => $resultInfo, 'pagination' => $pagination];
    }

    public function userInfo($userId) {
        $where = 'id='. $userId;
        $select = 'admin_user.*';
        $resultInfo = AdminUser::find()
            ->select($select)
            ->where($where)
            ->asArray()
            ->one();
        return $resultInfo;
    }

    public function updateUserStatus($userId, $status) {
        $where = 'id='. $userId;
        $result = AdminUser::updateAll(['status'=>$status], $where);
        return $result;
    }

    /**
     * 添加后台用户
     * @param $username
     * @param $password_hash
     * @param $email
     */
    public function addUser($username, $password_hash, $email) {
        $model = new AdminUser();
        $model->username = $username;
        $model->password_hash = Yii::$app->security->generatePasswordHash($password_hash);
        $model->auth_key = Yii::$app->security->generateRandomString();
        $model->email = $email;
        $model->created_at = time();
        $result = $model->save();
        return $result;
    }

    public function updatePassword($userId, $password) {
        $where = 'id='. $userId;
        $password = Yii::$app->security->generatePasswordHash($password);
        $result = AdminUser::updateAll(['password_hash'=>$password], $where);
        return $result;
    }
}
