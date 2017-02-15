<?php

namespace common\models;
use Yii;

/**
 * 微信
 * Class WxWechats
 * @package common\models
 */
class WxWechats extends \yii\db\ActiveRecord {

    public static function tableName()
    {
        return 'wx_wechats';
    }

    /**
     * 微信添加
     * @param $account
     * @param $original
     * @param $appId
     * @param $appSecret
     * @param string $username
     * @param string $password
     * @param string $name
     * @return bool
     */
    public static function addSet($account, $original, $appId, $appSecret, $username='', $password='', $name='') {
        $model = new WxWechats();
        $model->account = $account;
        $model->original = $original;
        $model->appId = $appId;
        $model->appSecret = $appSecret;
        $model->username = $username;
        $model->password = $password;
        $model->name = $name;
        $model->ctime = date('Y-m-d H:i:s');
        $result = $model->save();
        return $result;
    }
}

