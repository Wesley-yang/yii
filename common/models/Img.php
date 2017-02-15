<?php
namespace common\models;

use Yii;
use yii\validators\ImageValidator;

/**
 * 图片管理
 * Class Img
 * @package common\models
 */
class Img extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'img';
    }

    public function addImg($imgPath) {
        $img = new Img();
        $img->url = $imgPath;
        $img->name = basename($imgPath);
        $img->rtype = substr(strrchr($imgPath, '.'), 1);
        $img->create_time = date('Y-m-d H:i:s');
        $img->is_deleted = 0;
        $resultInfo = $img->save();
        $id = $img->attributes['id'];
        return $id;
    }

    /**
     * 根据图片id，返回图片完整URL路径
     * @param number $url_id
     */
    public function getImgUrl($url_id) {
        $result = Img::find()->where(array('id'=>$url_id))->asArray()->one();
        if ($result) {
            return $result['url'];
        }
    }

    /**
     * 根据图片多个id,返回多个图片URL信息
     * @param string $strIds
     * @param array $field
     */
    public function getImgList($strIds) {
        $where = 'id in (' .$strIds. ')';
        $result = Img::find()->select('url')->where($where)->asArray()->all();
        return $result;
    }
}
