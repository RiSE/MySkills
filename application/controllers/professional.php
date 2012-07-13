<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of professional
 *
 * @author Tiago Perrelli <tiago.perrelli at www.naips.com.br>
 */
class Professional extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        die('professional index');
    }
    
    public function professional() {
        die('professional professional');
    }

    public function profile() {
        
        die('professional profile');

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

    public function applyforajob() {
        
        $this->load->model('professional_model');
        $this->load->model('job_model');

        $data = array(
            'title' => 'Apply for a Job'
        );
        
        $fbuid = $this->session->userdata('uid');
        $professional = $this->professional_model->loadProfessional($fbuid);
        
        $data['jobs'] = $this->job_model->listJobs();
        $data['applieds'] = $this->job_model->listJobsApplied($professional[0]->id_professional);
                
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
