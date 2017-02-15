<?php
namespace backend\models;

use Yii;
use yii\data\Pagination;

/**
 * 会员-用户
 * Class User
 * @package app\models
 */
class User extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'user';
    }


    public function userInfo($userId) {
        $where = 'id='. $userId;
        $select = 'id, name, phone, ctime, gender, level, billCount, coinCount, totalBillCount, status';
        $resultInfo = User::find()
            ->select($select)
            ->where($where)
            ->asArray()
            ->one();
        return $resultInfo;
    }

    public function updateUserStatus($userId, $status) {
        $where = 'id='. $userId;
        $result = User::updateAll(['status'=>$status], $where);
        return $result;
    }
}
