<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of facebook_model
 *
 * @author Tiago Perrelli <tiago.perrelli at www.naips.com.br>
 */
class Facebook_model extends CI_Model {

    private $appId;
    private $appSecret;
    private $facebook;

    public function __construct() {

        parent::__construct();

        $config = array();
        
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            $this->appId = '388276894562299';
            $this->appSecret = '964125590f7b075ece0072ba179847e2';
        } else {
            $this->appId = '380703318658533';
            $this->appSecret = 'd3abe4dd8c19336241a6a8a18626dd04';
        }

        $config['appId'] = $this->appId;
        $config['secret'] = $this->appSecret;
        $config['fileUpload'] = false;

        //$this->load->library('facebook', $config);
        //$this->facebook = new Facebook($config);
    }

    public function getAppId() {
        return $this->appId;
    }

    public function getLoginUrl() {

        $params = array(
            'scope' => 'email'
        );

        return $this->facebook->getLoginUrl($params);
    }

    public function getLogoutUrl() {

        $params = array(
                //'next' => base_url() . 'index/signout'
        );

//        return $this->facebook->getLogoutUrl($params);
    }

    public function sessDestroy() {
        $this->facebook->destroySession();
    }

}

?>
