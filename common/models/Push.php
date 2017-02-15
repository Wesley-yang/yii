<?php
namespace common\models;
use Jpush;

require(__DIR__ . '/../../vendor/third/JPush/JPush.php');

class Push {
    private $app_key;
    private $master_secret;
    private $client;

    public function __construct() {
        $this->app_key = '56d7a160922feacc9dd52b9d'; //燃TV
        $this->master_secret = 'ca7a5819295f2061216d8016';
        $this->client = new JPush($this->app_key, $this->master_secret);
    }

    public function pushMessage() {
        // 完整的推送示例,包含指定Platform,指定Alias,Tag,指定iOS,Android notification,指定Message等
        $result = $this->client->push()
            ->setPlatform(array('ios', 'android'))
            ->addRegistrationId('18171adc030dfe0a82b')
            ->setNotificationAlert('Hi, JPush')
            ->addAndroidNotification('Hi, android notification', 'notification title', 1, array("key1"=>"value1", "key2"=>"value2"))
            ->addIosNotification("Hi, iOS notification", 'iOS sound', JPush::DISABLE_BADGE, true, 'iOS category', array("key1"=>"value1", "key2"=>"value2"))
            ->setMessage("msg content", 'msg title', 'type', array("key1"=>"value1", "key2"=>"value2"))
            ->setOptions(100000, 3600, null, false)
            ->send();
        return json_encode($result);
    }


}
