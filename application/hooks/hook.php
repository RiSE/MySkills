<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of hook
 *
 * @author tiagoperrelli
 */
class Hook extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function checkLogin() {
        
        $loggedin = $this->session->userdata('loggedin');

        $controller = $this->uri->segment(1);
        $acao = $this->uri->segment(2);
                
        $arrController = array('index');
        $arrAcoes = array('index', 'home', 'about', 'contact', 'login', 'logout', 'privacyPolicy','features','leaderboard','mailingArchive');
                        
        if ($loggedin === false) {
                        
            if (in_array($controller, $arrController)) {                
                if (!in_array($acao, $arrAcoes)) {
                    redirect(base_url() . 'index/home');
                }
            } else {
                if (!in_array($acao, $arrAcoes)) {
                    redirect(base_url() . 'index/home');
                }
            }
        }
    }

}

?>
