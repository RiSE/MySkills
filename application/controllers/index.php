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

    public function index() {
        redirect(base_url() . 'index/home');
    }

    public function home() {

        $data = array(
            'title' => 'Home',
            'mixpanel' => 'Home'
        );

        $this->layout->view('index/index', $data);
    }

    public function login() {

        $this->load->model('user_model');

        $data = array(
            'login' => false,
            'justcreated' => false
        );

        $uid = $this->input->post('uid');
        $name = $this->input->post('name');
        $email = $this->input->post('email');

        if (isset($uid) && !empty($uid)) {

            $datauser = array(
                'fbuid' => $uid,
                'name' => $name,
                'email' => $email,
                'created' => date('Y-m-d H:i:s')
            );

            $session = array(
                'userid' => null,
                'uid' => $uid,
                'email' => $email,
                'name' => $name,
                'id_profile' => null,
                'loggedin' => true
            );

            $user = $this->user_model->loadUser(array('fbuid' => $uid));
            if (empty($user)) {
                $userid = $this->user_model->insertUser($datauser);
                $session['userid'] = $userid;

                /* mixpanel data */
                $data['name'] = $name;
                $data['email'] = $email;
                $data['fbuid'] = $uid;
                $data['justcreated'] = true;
                $data['created'] = date('Y-m-d H:i:s');
                /* end mixpanel data */
            } else {
                $session['userid'] = $user[0]->id_user;
                $session['id_profile'] = isset($user[0]->id_profile) ? $user[0]->id_profile : null;
            }

            $this->session->set_userdata($session);

            $data['login'] = true;
        }

        echo json_encode($data);
        die();
    }

    public function logout() {

        $this->session->set_userdata('uid', null);
        $this->session->sess_destroy();

        echo json_encode(array('logout' => true));
        die();
    }

    public function logged() {

        $this->load->model('endereco_model');
        $this->load->model('recruiter_model');
        $this->load->model('professional_model');

        $fbuid = $this->session->userdata('uid');

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

        $this->session->set_flashdata('signup', true);

        $this->layout->view('index/logged', $data);
    }

    public function addRecruiter() {

        $this->load->model('recruiter_model');
        $this->load->model('endereco_model');

        $data = array(
            'title' => 'Are you a Recruiter or a Developer?'
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

            $this->session->set_flashdata('signup', true);

            redirect(base_url() . 'index/recruiterProfile');
        } else {
            $this->layout->view('index/logged', $data);
        }
        //$this->layout->view('index/recruiters', $data);
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


            $this->session->set_flashdata('signup', true);

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
                    $this->session->set_flashdata('claimbadge', true);

                    redirect(base_url() . 'index/profile');
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

    public function mailingArchive() {

        $data = array(
            'title' => 'Mailing Archive',
            'mixpanel' => 'Mailing Archive',
        );

        $this->layout->view('index/mailingArchive', $data);
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

    public function dashboard() {

        $data = array(
            'title' => 'Dashboard',
            'mixpanel' => 'Dashboard'
        );

        $this->layout->view('index/dashboard', $data);
    }

    public function defineType() {

        $this->load->model('profile_model');
        $this->load->model('user_model');

        $data = array(
            'error' => false,
            'success' => false,
            'message' => ''
        );

        $type = (int) $this->input->post('type');

        $profile = $this->profile_model->loadProfile($type);
        if (empty($profile)) {
            $data['error'] = true;
            $data['message'] = 'Invalid entry. Please try again.';
        } else {

            $name = $profile[0]->name;

            $user = array(
                'id_user' => $this->session->userdata('userid'),
                'id_profile' => $type
            );

            $this->user_model->updateUser($user);

            $this->session->set_userdata('id_profile', $type);

            switch ($name) {
                default : false;
                case 'Recruiter' : $this->session->set_userdata('recruiter', true);
                    break;
                case 'Developer' : $this->session->set_userdata('developer', true);
                    break;
            }

            $session = $this->session->all_userdata();

            $this->session->set_flashdata('setprofile', true);
        }

        echo json_encode($data);
        die();
    }

    public function profile() {

        /* $this->load->model('professional_model');

          $data = array(
          'title' => 'Recruiter Profile'
          );

          $data['professionals'] = $this->professional_model->listProfessionals();

          $this->layout->view('recruiter/profile', $data); */

        $this->load->model('professional_model');
        $this->load->model('user_model');
        $this->load->model('badge_model');

        $data = array(
            'title' => 'Professional Profile',
            'mixpanel' => 'Professional Profile',
            'badge_error' => ''
        );
        
        $fbuid = $this->session->userdata('uid');
        
        $user = $this->user_model->loadUser(array('fbuid' => $fbuid));        
        
        $data['badges'] = $this->badge_model->listBadges();
        $data['ThisBadge'] = $this->badge_model->listBadgesProfessionalByUser($user[0]->id_user);

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

        $this->load->model('user_model');
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
        
        //$professional = 
        
        print_r('<pre>');
        print_r($professional);
        die('</pre>');

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
        $idJob = $this->input->post('id_job');

        $data = array(
            'redirect' => ''
        );

        $professional = $this->professional_model->loadProfessional($fbuid);

        $hasThisJob = $this->job_model->listJobsApplied($professional[0]->id_professional, $idJob);

        if (empty($hasThisJob)) {

            $dataJobProfessional = array(
                'id_professional' => $professional[0]->id_professional,
                'id_job' => $idJob
            );

            $this->job_model->insertJobProfessional($dataJobProfessional);


            $this->session->set_flashdata('applyforajob', true);
            $data['redirect'] = base_url() . 'index/profile';
            //redirect(base_url() . 'index/profile');
        } else {

            $this->session->set_flashdata('hasapplied', true);
            $data['redirect'] = base_url() . 'index/jobs';
            //redirect(base_url() . 'index/jobs');
        }
        echo json_encode($data);
        die();
    }

    public function courses() {

        $this->load->model('professional_model');
        $this->load->model('course_model');

        $data = array(
            'title' => 'Apply for a Courses',
            'mixpanel' => 'Apply for a Courses',
            'courses' => array(),
            'applieds' => array()
        );

        $fbuid = $this->session->userdata('uid');
        $professional = $this->professional_model->loadProfessional($fbuid);

        $data['courses'] = $this->course_model->listCourses();

        $data['applieds'] = array();
        if (!empty($professional)) {
            $data['applieds'] = $this->course_model->listCoursesApplied($professional[0]->id_professional);
        }

        $this->layout->view('index/applyforacourse', $data);
    }

    public function applyCourse() {

        $this->load->model('professional_model');
        $this->load->model('course_model');
        $this->load->library('email');

        $fbuid = $this->session->userdata('uid');
        $idCourse = (int) $this->input->post('ids');

        $professional = $this->professional_model->loadProfessional($fbuid);

        $dataCourseProfessional = array(
            'id_professional' => $professional[0]->id_professional,
            'id_course' => $idCourse
        );

        $save = $this->course_model->insertCourseProfessional($dataCourseProfessional);
        /*
          $config['protocol'] = 'smtp';
          $config['smtp_host'] = 'smtp.gmail.com';
          $config['smtp_user'] = 'noreply@myskills.com.br';
          $config['smtp_pass'] = ' NS=9urZL';

          $this->email->initialize($config);

          //$this->email->from('noreply@myskills.com.br', 'NOREPLY');
          $this->email->to('eliakim.ramos@hotmail.com');
          /*$this->email->cc('another@another-example.com');
          $this->email->bcc('them@their-example.com'); */
        /*
          $this->email->subject('Email Test');
          $this->email->message('Testing the email class.');



          $this->email->send();

          echo $this->email->print_debugger();die;
         */

        $this->session->set_flashdata('applyforacourse', true);

        redirect(base_url() . 'index/profile');
    }

    public function leaderboard() {

        $this->load->model('professional_model');
        $this->load->model('badge_model');

        $data = array(
            'title' => 'Leaderboard'
        );

        $data['professionals'] = $this->professional_model->listProfessionals();

        $this->layout->view('index/leaderboard', $data);
    }

    public function listProfessionals() {

        $data = array();

        $this->load->model('professional_model');

        $data['professionals'] = $this->professional_model->listProfessionals();

        echo json_encode($data);
        die();
    }

    public function companies() {

        $this->load->model('group_model');
        $this->load->model('company_model');

        $data = array(
            'title' => 'Companies',
            'mixpanel' => 'Companies'
        );
        $data['groups'] = $this->group_model->listGroup();


        $this->layout->view('index/companies', $data);
    }

}

?>
