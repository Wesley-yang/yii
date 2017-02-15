<?php

namespace common\models;

/**
 * 百度地图API
 * Class BaiduApi
 * @package common\models
 */
class BaiduApi {
    private $ak;
    private $api_url;

    public function __construct(){
        $this->ak = 'grCeSlKWBfdfhKSbRHsqPzqE';
        $this->api_url = 'http://api.map.baidu.com';
    }

    /**
     * 传入地址，获得经纬度
     * @param string $address 地址
     * @return json
     */
    public function geocodingApi($address) {
        $searchUrl = $this->api_url. '/geocoder/v2/?address='. $address . '&output=json&ak='. $this->ak;
        $res = file_get_contents($searchUrl);
        $result = json_decode($res,true);
        return $result;
    }
    /**
     * 传入地址，提示匹配的地址列表
     * @param string $address 地址
     * @return json
     */
    public function suggestionApi($address) {
        $searchUrl = $this->api_url. '/place/v2/suggestion?query=' . $address. '&region=131&output=json&ak='. $this->ak;
        $res = file_get_contents($searchUrl);
        $result = json_decode($res,true);
        return $result;
    }
}
