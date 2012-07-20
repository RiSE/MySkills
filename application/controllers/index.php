<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of index
 *
 * @author Tiago Perrelli <tiago.perrelli at www.naips.com.br>
 */
class Index extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function home() {

        $data = array(
            'title' => 'Home',
            'mixpanel' => 'Home'
        );
        
        $this->layout->view('index/index', $data);
    }

    public function login() {

        $this->load->model('professional_model');
        $this->load->model('recruiter_model');

        $uid = $this->input->post('uid');
        $email = $this->input->post('email');
        $name = $this->input->post('name');
        $existdb = false;
        
        $redirectPro = false;
        $redirectRec = false;

        $professional = $this->professional_model->loadProfessional($uid);

        if (!empty($professional)) {
            $existdb = true;
            $redirectPro = true;
        }
        
        $recruiter = $this->recruiter_model->loadRecruiter($uid);
        if (!empty($recruiter)) {
            $existdb = true;
            $redirectRec = true;
        }

        $suerdata = array(
            'uid' => $uid,
            'email' => $email,
            'name' => $name,
            'existdb' => $existdb,
            'pro' => $redirectPro,
            'rec' => $redirectRec,
            'loggedin' => true
        );

        $this->session->set_userdata($suerdata);

        echo json_encode(array('loggin' => true, 'professional' => $redirectPro, 'recruiter' => $redirectRec));
        die();
    }

    public function logout() {

        $this->session->sess_destroy();

        echo json_encode(array('logout' => true));
        die();
    }

    public function signin() {

        $data = array(
            'title' => 'Sign-in'
        );

        $this->layout->view('index/signin', $data);
    }

    public function signout() {
        //$this->facebook_model->sessDestroy();
        //setcookie('fbs_' . $this->facebook_model->getAppId(), '', time() - 100, '/', 'localhost');
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function recruiters() {

        /* $this->load->model('recruiter_model');

          $data = array(
          'title' => 'Recruiters',
          'errors' => ''
          );

          $data['ufs'] = $this->db->query('SELECT * FROM uf')->result_object();

          $selectUf = (int) $this->input->post('selectUf');

          if (!empty($selectUf)) {
          $sigla = $this->db->query('SELECT * FROM uf WHERE id_uf = ?', $selectUf)->result_object();
          if (empty($sigla)) {
          redirect(base_url() . 'index/recruiters');
          }
          $selectUf = $sigla[0]->sigla;
          }

          if ($this->form_validation->run('recruiter') !== false) {

          $email = (string) $this->input->post('email');
          $company = (string) $this->input->post('company');
          //$selectUf = (int) $this->input->post('selectUf');

          $data = array(
          'email' => $email,
          'razao' => $company,
          'uf' => $selectUf,
          'fbuid' => $this->session->userdata('uid'),
          'data_registro' => date('Y-m-d')
          );

          $this->recruiter_model->insertRecruiter($data);

          redirect(base_url() . 'index/success');
          }

          $this->layout->view('index/recruiters', $data); */
        die('not implemented yet');
    }

    public function programmers() {

        $this->load->model('profissional_model');

        $data = array(
            'title' => 'Developers',
            'mixpanel' => 'Developers',
            'errors' => '',
            'success' => ''
        );

        $data['ufs'] = $this->db->query('SELECT * FROM uf')->result_object();

        $selectUf = (int) $this->input->post('selectUf');

        if (!empty($selectUf)) {
            $sigla = $this->db->query('SELECT * FROM uf WHERE id_uf = ?', $selectUf)->result_object();

            if (empty($sigla)) {
                redirect(base_url() . 'index/programmers');
            }
            $selectUf = $sigla[0]->sigla;
        }

        if ($this->form_validation->run('programmer') !== false) {

            $email = (string) $this->input->post('email');
            $code = $this->input->post('code');
            //$uf = (int) $this->input->post('selectUf');

            $data = array(
                'email' => $email,
                'codigo' => $code,
                'fbuid' => $this->session->userdata('uid'),
                'uf' => $selectUf,
                'data_registro' => date('Y-m-d')
            );

            $this->profissional_model->insertProfissional($data);

            redirect(base_url() . 'index/success');
        }

        $this->layout->view('index/programmers', $data);
    }

    public function logged() {
        
        $this->load->model('endereco_model');
        $this->load->model('recruiter_model');
        $this->load->model('professional_model');
        
        if ($this->session->userdata('existdb') == true) {
            
            if ($this->session->userdata('pro') == true) {
                redirect(base_url() . 'index/profile');
            } else if ($this->session->userdata('rec') == true) {
                redirect(base_url() . 'index/recruiterProfile');
            }
        }
        
        $recruiterexist = $this->recruiter_model->loadRecruiter($fbuid);        
        $professionalexist = $this->professional_model->loadProfessional($fbuid);
        
        if (!empty($recruiterexist)) {
            redirect(base_url() . 'index/recruiterProfile');
        } else if (!empty($professionalexist)) {
            redirect(base_url() . 'index/profile');
        }

        $data = array(
            'title' => 'Are you a Recruiter or a Developer?',
            'mixpanel' => 'Form Sign Up'
        );

        $data['ufs'] = $this->endereco_model->loadUfs();


        $this->layout->view('index/logged', $data);
    }

    public function addRecruiter() {

        $this->load->model('recruiter_model');
        $this->load->model('endereco_model');

        $data = array(
            'title' => 'Are you a recruiter or a developer?'
        );

        $data['ufs'] = $this->endereco_model->loadUfs();

        $selectUf = (int) $this->input->post('selectUfr');

        if (!empty($selectUf)) {
            $sigla = $this->db->query('SELECT * FROM uf WHERE id_uf = ?', $selectUf)->result_object();
            if (empty($sigla)) {
                redirect(base_url() . 'index/recruiters');
            }
            $selectUf = $sigla[0]->sigla;
        }

        if ($this->form_validation->run('recruiter') !== false) {

            $email = (string) $this->input->post('emailr');
            $company = (string) $this->input->post('company');
            //$selectUf = (int) $this->input->post('selectUf');

            $data = array(
                'email' => $email,
                'company' => $company,
                'state' => $selectUf,
                'fbuid' => $this->session->userdata('uid'),
                'created' => date('Y-m-d')
            );

            $this->recruiter_model->insertRecruiter($data);

            redirect(base_url() . 'index/recruiterProfile');
        }

        $this->layout->view('index/recruiters', $data);
    }

    public function addProfessional() {

        $this->load->model('professional_model');
        $this->load->model('endereco_model');

        $data = array(
            'title' => 'Are you a recruiter or a developer?'
        );

        $selectUf = (int) $this->input->post('selectUfp');

        $data['ufs'] = $this->endereco_model->loadUfs();

        if (!empty($selectUf)) {
            $sigla = $this->endereco_model->loadUfs(array('id_uf' => $selectUf));

            if (empty($sigla)) {
                redirect(base_url() . 'index/logged');
            }
            $selectUf = $sigla[0]->sigla;
        }

        if ($this->form_validation->run('programmer') !== false) {

            $email = (string) $this->input->post('emailp');

            $data = array(
                'email' => $email,
                'fbuid' => $this->session->userdata('uid'),
                'state' => $selectUf,
                'created' => date('Y-m-d')
            );

            $this->professional_model->insertProfessional($data);

            redirect(base_url() . 'index/profile');
        } else {
            $this->layout->view('index/logged', $data);
        }
    }

    public function recruiterProfile() {

        $this->load->model('professional_model');

        $data = array(
            'title' => 'Recruiter Profile',
            'mixpanel' => 'Recruiter Profile',
        );

        $data['professionals'] = $this->professional_model->listProfessionals();

        $this->layout->view('index/recruiterProfile', $data);
    }

    public function professionalProfile() {

        $this->load->model('professional_model');
        $this->load->model('badge_model');

        $data = array(
            'title' => 'Professional Profile',
            'mixpanel' => 'Professional Profile',
            'badge_error' => ''
        );

        $data['badges'] = $this->badge_model->listBadges();
        if ($this->form_validation->run('programmer/claimbadges') !== false) {

            $fbuid = $this->session->userdata('uid');
            $idBage = (int) $this->input->post('selectBadges');
            $code = (string) $this->input->post('code');

            $badge = $this->badge_model->loadBadge($idBage);

            if (!empty($badge)) {

                $professional = $this->professional_model->loadProfessional($fbuid);

                $hasThisBadge = $this->badge_model->listBadgesProfessional($professional[0]->id_professional, $badge[0]->id_badge);

                if (empty($hasThisBadge)) {
                    $insert = array(
                        'id_professional' => $professional[0]->id_professional,
                        'id_badge' => $badge[0]->id_badge,
                        'code' => $code
                    );

                    $this->badge_model->insertBadgeProfessional($insert);

                    redirect(base_url() . 'index/');
                } else {
                    $data['badge_error'] = 'You already have this badge';
                }
            } else {
                $data['badge_error'] = 'Invalid Badge';
            }
        }

        $this->layout->view('index/professionalProfile', $data);
    }

    public function claimBadges() {
        $this->load->model('professional_model');
        $this->load->model('badge_model');

        $data = array(
            'title' => 'Claim Badges',
            'mixpanel' => 'Claim Badges',
            'badge_error' => ''
        );

        $data['badges'] = $this->badge_model->listBadges();
        if ($this->form_validation->run('programmer/claimbadges') !== false) {
            $fbuid = $this->session->userdata('uid');
            $idBage = (int) $this->input->post('badges');
            $code = (string) $this->input->post('code');

            $badge = $this->badge_model->loadBadge($idBage);

            if (!empty($badge)) {

                $professional = $this->professional_model->loadProfessional($fbuid);

                $hasThisBadge = $this->badge_model->listBadgesProfessional($professional[0]->id_professional, $badge[0]->id_badge);

                if (empty($hasThisBadge)) {
                    $insert = array(
                        'id_professional' => $professional[0]->id_professional,
                        'id_badge' => $badge[0]->id_badge,
                        'code' => $code
                    );

                    $this->badge_model->insertBadgeProfessional($insert);

                    redirect(base_url() . 'index/');
                } else {
                    $data['badge_error'] = 'You already have this badge';
                }
            } else {
                $data['badge_error'] = 'Invalid Badge';
            }
        }

        $this->layout->view('index/claimBadge', $data);
    }

    public function success() {

        $data = array(
            'title' => 'Success!'
        );

        $this->layout->view('index/success', $data);
    }

    public function successProfessional() {

        $data = array(
            'title' => 'Success!',
            'mixpanel' => 'Success Professional',
        );

        $this->layout->view('index/successProfessional', $data);
    }

    public function successRecruiter() {

        $data = array(
            'title' => 'Success!',
            'mixpanel' => 'Success Recruiter',
        );

        $this->layout->view('index/successRecruiter', $data);
    }

    public function about() {

        $data = array(
            'title' => 'How it Works',
            'mixpanel' => 'How it Works'
        );

        $this->layout->view('index/about', $data);
    }

    public function privacyPolicy() {
        
        $data = array(
            'title' => 'Privacy Policy',
            'mixpanel' => 'Privacy Policy',
        );
        
        $this->layout->view('index/privacyPolicy', $data);
    }
    public function features() {
        
        $data = array(
            'title' => 'Features',
            'mixpanel' => 'Features',
        );
        
        $this->layout->view('index/features', $data);
    }

    public function programmer() {

        $data = array(
            'title' => 'Developer of the Week'
        );

        $this->layout->view('index/programmer', $data);
    }

    public function contact() {

        $data = array(
            'title' => 'Contact Us',
            'mixpanel' => 'Contact'
        );

        $this->layout->view('index/contact', $data);
    }

    public function page404() {

        $data = array(
            'title' => 'Page Not Found'
        );

        $this->layout->view('page404/notfound', $data);
    }

    public function profile() {

        /* $this->load->model('professional_model');

          $data = array(
          'title' => 'Recruiter Profile'
          );

          $data['professionals'] = $this->professional_model->listProfessionals();

          $this->layout->view('recruiter/profile', $data); */

        $this->load->model('professional_model');
        $this->load->model('badge_model');

        $data = array(
            'title' => 'Professional Profile',
            'mixpanel' => 'Professional Profile',
            'badge_error' => ''
        );

        $data['badges'] = $this->badge_model->listBadges();
        if ($this->form_validation->run('programmer/claimbadges') !== false) {

            $fbuid = $this->session->userdata('uid');
            $idBage = (int) $this->input->post('selectBadges');
            $code = (string) $this->input->post('code');

            $badge = $this->badge_model->loadBadge($idBage);

            if (!empty($badge)) {

                $professional = $this->professional_model->loadProfessional($fbuid);

                $hasThisBadge = $this->badge_model->listBadgesProfessional($professional[0]->id_professional, $badge[0]->id_badge);

                if (empty($hasThisBadge)) {
                    $insert = array(
                        'id_professional' => $professional[0]->id_professional,
                        'id_badge' => $badge[0]->id_badge,
                        'code' => $code
                    );

                    $this->badge_model->insertBadgeProfessional($insert);

                    redirect(base_url() . 'index/');
                } else {
                    $data['badge_error'] = 'You already have this badge';
                }
            } else {
                $data['badge_error'] = 'Invalid Badge';
            }
        }

        $this->layout->view('index/profile', $data);
    }

    public function jobs() {

        $this->load->model('recruiter_model');
        $this->load->model('professional_model');
        $this->load->model('job_model');

        $company = $this->input->get('company');

        $data = array(
            'title' => 'Apply for a Job',
            'mixpanel' => 'Apply for a Job',
            'jobs' => array(),
            'applieds' => array()
        );

        $fbuid = $this->session->userdata('uid');        
        $professional = $this->professional_model->loadProfessional($fbuid);
        
        $recruiter = null;
        $dataJobs = array();

        if ($company != false) {
            
            $company = (string) $company;
            $recruiter = $this->recruiter_model->loadRecruiter(null, $company);
            if (!empty($recruiter)) {
                $dataJobs['id_recruiter'] = $recruiter[0]->id_recruiter;
            } else {
                $dataJobs['exist'] = false;
            }
        }
        
        $data['jobs'] = $this->job_model->listJobs($dataJobs);
        
        $dataProfessional = array();
        $data['applieds'] = array();
        if (!empty($professional)) {            
            $data['applieds'] = $this->job_model->listJobsApplied($professional[0]->id_professional);
        }
        
        

        $this->layout->view('index/applyforajob', $data);
    }

    public function apply() {

        $this->load->model('professional_model');
        $this->load->model('job_model');

        $fbuid = $this->session->userdata('uid');
        $idJob = (int) $this->input->post('ids');

        $professional = $this->professional_model->loadProfessional($fbuid);

        $dataJobProfessional = array(
            'id_professional' => $professional[0]->id_professional,
            'id_job' => $idJob
        );

        $save = $this->job_model->insertJobProfessional($dataJobProfessional);
        //if ($save) {
        redirect(base_url() . 'index/profile');
        //}
    }

}

?>
