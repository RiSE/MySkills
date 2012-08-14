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

        $this->load->model('profile_model');
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
                'recruiter' => null,
                'developer' => null,
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
                $data['created'] = date('Y/m/d');
                $session['nameU'] = $name;
                $session['emailU'] = $email;
                $session['fbuidU'] = $uid;
                $session['justcreatedU'] = true;
                $session['createdU'] = date('Y-m-d');
                
                /* end mixpanel data */
            } else {
                $session['userid'] = $user[0]->id_user;

                if (isset($user[0]->id_profile)) {

                    $profile = $this->profile_model->loadProfile($user[0]->id_profile);
                    $session['id_profile'] = $user[0]->id_profile;

                    $name = $profile[0]->name;
                    switch ($name) {
                        default : false;
                        case 'Recruiter' :
                            $session['recruiter'] = true;
                            break;
                        case 'Developer' :
                            $session['developer'] = true;
                            break;
                    }
                } else {
                    $session['id_profile'] = null;
                }
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
        $this->load->model('user_model');
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

                $professional = $this->user_model->loadUserOfFacebookId($fbuid);

                $hasThisBadge = $this->badge_model->listBadgesProfessional($professional[0]->id_user, $badge[0]->id_badge);

                if (empty($hasThisBadge)) {
                    $insert = array(
                        'id_user' => $professional[0]->id_user,
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
		$this->load->model('user_model');
        $this->load->model('message_model');
        $data = array(
            'title' => 'Dashboard',
            'mixpanel' => 'Dashboard'
        );
		
        $data['messages'] = $this->message_model->listMessages();

        if ($this->form_validation->run('message') !== false) {
            $fbuid = $this->session->userdata('uid');
            $message = (string) $this->input->post('message');

            $professional = $this->user_model->loadUserOfFacebookId($fbuid);
                    $insert = array(
                        'id_user' => $professional[0]->id_user,
                        'message' => $message
                    );

                    $this->message_model->insertMessage($insert);
                    $this->session->set_flashdata('Message', true);
        }
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
                case 'Recruiter' :
                    $this->session->set_userdata('recruiter', true);
                    break;
                case 'Developer' :
                    $this->session->set_userdata('developer', true);
                    break;
            }

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
        $this->load->model('job_model');

        $company = $this->input->get('company');

        $data = array(
            'title' => 'Apply for a Job',
            'mixpanel' => 'Apply for a Job',
            'jobs' => array(),
            'applieds' => array()
        );

        $fbuid = $this->session->userdata('uid');

        $professional = $this->user_model->loadUser(array('fbuid' => $fbuid));

        $recruiter = null;
        $dataJobs = array();

        if ($company != false) {

            $company = (string) $company;

            $recruiter = $this->user_model->loadUser(array('company' => $company));

            if (!empty($recruiter)) {
                $dataJobs['id_user'] = $recruiter[0]->id_user;
            } else {
                $dataJobs['exist'] = false;
            }
        }

        $data['jobs'] = $this->job_model->listJobs($dataJobs);
        $data['applieds'] = array();
        if (!empty($professional)) {
            $data['applieds'] = $this->job_model->listJobsAppliedUser($professional[0]->id_user);
        }

        $this->layout->view('index/applyforajob', $data);
    }

    public function apply() {

        $this->load->model('user_model');
        $this->load->model('job_model');

        $fbuid = $this->session->userdata('uid');
        $idJob = $this->input->post('id_job');

        $data = array(
            'redirect' => ''
        );

        $professional = $this->user_model->loadUser(array('fbuid' => $fbuid));
        $hasThisJob = $this->job_model->listJobsAppliedUser($professional[0]->id_user, $idJob);

        if (empty($hasThisJob)) {

            $dataJobUser = array(
                'id_user' => $professional[0]->id_user,
                'id_job' => $idJob
            );

            $this->job_model->insertJobUser($dataJobUser);

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

        $this->load->model('user_model');
        $this->load->model('course_model');

        $data = array(
            'title' => 'Apply for a Courses',
            'mixpanel' => 'Apply for a Courses',
            'courses' => array(),
            'applieds' => array()
        );

        $fbuid = $this->session->userdata('uid');
        $user = $this->user_model->loadUserOfFacebookId($fbuid);

        $data['courses'] = $this->course_model->listCourses();

        $data['applieds'] = array();
        if (!empty($user)) {
            $data['applieds'] = $this->course_model->listCoursesApplied($user[0]->id_user);
        }

        $this->layout->view('index/applyforacourse', $data);
    }

    public function applyCourse() {

        $this->load->model('user_model');
        $this->load->model('course_model');
        $this->load->library('email');

        $fbuid = $this->session->userdata('uid');
        $idCourse = (int) $this->input->post('ids');

        $user = $this->user_model->loadUserOfFacebookId($fbuid);

        $dataCourseProfessional = array(
            'id_user' => $user[0]->id_user,
            'id_course' => $idCourse
        );

        $save = $this->course_model->insertCourseProfessional($dataCourseProfessional);
        $this->session->set_flashdata('applyforacourse', true);

        redirect(base_url() . 'index/profile');
    }

    public function leaderboard() {

        $this->load->model('user_model');
        $this->load->model('badge_model');

        $data = array(
            'title' => 'Leaderboard'
        );

        $data['professionals'] = $this->user_model->listUsers();

        $this->layout->view('index/leaderboard', $data);
    }

    public function listProfessionals() {

        $data = array();
        
        $this->load->model('user_model');
        
        $data['professionals'] = $this->user_model->listProfessionals();

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

    public function events() {

        //$this->load->model('eventgroup_model');
        $this->load->model('event_model');

        $data = array(
            'title' => 'Events',
            'mixpanel' => 'Events'
        );

        //$data['groups'] = $this->eventgroup_model->listGroup();
        //$data['events_group'] = $this->event_model->listEventInGroup();
        
        /*foreach ($data['groups'] as $i => $group) {
            
            $data['groups'][$i]->events = array();
            foreach ($data['events_group'] as $eventGroup) {
                if ($group->id_event_group == $eventGroup->id_event_group) {
                    array_push($data['groups'][$i]->events, $eventGroup);
                }
            }
        }*/
        
        $data['events'] = $this->event_model->listEvents();
                                        
        $this->layout->view('index/events', $data);
    }

}

?>
