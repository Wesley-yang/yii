<?php
namespace backend\models;

use Yii;
use yii\data\Pagination;

class WxWechats extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'wx_wechats';
    }

    public function add($account, $original, $appId, $appSecret, $username, $password, $name) {
        $model = new WxWechats();
        $model->account = $account;
        $model->original = $original
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
