<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of recruiter
 *
 * @author Tiago Perrelli <tiago.perrelli at www.myskills.com >
 */
class Recruiter extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function profile() {

        $this->load->model('professional_model');

        $data = array(
            'title' => 'Recruiter Profile'
        );

        $data['professionals'] = $this->professional_model->listProfessionals();

        $this->layout->view('recruiter/profile', $data);
    }

    public function addVacancy() {

        $this->load->model('vacancy_model');

        $data = array(
            'title' => 'Add Vacancy'
        );

        if ($this->form_validation->run() !== false) {

            $vacancy = array(
            );

            $this->vacancy_model->insertVacancy($vacancy);

            redirect(base_url() . 'index/recruiterProfile');
        }

        $this->layout->view('recruiter/addVacancy', $data);
    }

}

?>
