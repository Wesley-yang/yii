<?php
namespace common\models;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use common\helpers\CommonHelper;
use common\models\Img;
require(__DIR__ . '/../../vendor/third/qiNiu/autoload.php');
/**
 * 七牛
 * Class QiNiu
 * @package common\models
 */
class QiNiu {
    // 用于签名的公钥和私钥
    private $accessKey;
    private $secretKey;
    private $auth;
    private $bucket;
    private $domain;
    public function __construct(){
        $this->accessKey = 'AY4fLCyNhgHwn50CgTW5sgqK1Xd9fYBHpXdxboIC';
        $this->secretKey = 'ad5FJMyoyGIY-C_AMFhgLiGueSIIUzAaJXtZOSPz';
        $this->domain = 'http://7xs3pn.com1.z0.glb.clouddn.com';
        $this->bucket = 'szlj';
        $this->auth = new Auth($this->accessKey, $this->secretKey);
    }
    /**
     * 生成上传token
     * @return string
     */
    public function getQiniuToken() {
        $token = $this->auth->uploadToken($this->bucket);
        return $token;
    }
    /**
     * 七牛图片上传入库，获得资源id
     */
    public function upload($imgUrl) {
        $com = new CommonHelper();
        if ($imgUrl) {
            $ext = substr(strrchr($imgUrl, '.'), 1);
            if (!in_array($ext, array('jpg', 'jpeg', 'png', 'gif'))) {
                $com->responseJson(20404, array(), 'ext error');
            }
            $img = new Img();
            $sourceId = $img->addImg($imgUrl);
            $com->responseJson(20200, 'ok', array('source_id' => $sourceId));
        } else {
            $com->responseJson(20404, 'error', array());
        }
    }
}

