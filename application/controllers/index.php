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

        $this->load->model('facebook_model');
    }

    public function index() {

        $this->load->view('index/index');
    }

    public function login() {

        $uid = $this->input->post('uid');
        $email = $this->input->post('email');

        $suerdata = array(
            'uid' => $uid,
            'email' => $email
        );

        $this->session->set_userdata($suerdata);

        echo json_encode(array('loggin' => true));
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
        
        $this->load->model('recruiter_model');

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

        $this->layout->view('index/recruiters', $data);
    }

    public function recruiterlogged() {

        $this->load->model('recruiter_model');

        $data = array(
            'title' => 'Recruiters',
            'errors' => ''
        );

        $data['ufs'] = $this->db->query('SELECT * FROM uf')->result_object();

        if ($this->form_validation->run('recruiter') !== false) {

            $email = (string) $this->input->post('email');
            $company = (string) $this->input->post('company');
            $selectUf = (int) $this->input->post('selectUf');

            if (!empty($selectUf)) {
                $sigla = $this->db->query('SELECT * FROM uf WHERE id_uf = ?', $selectUf)->result_object();

                if (empty($sigla)) {
                    redirect(base_url() . 'index/programmerlogged');
                }
                $uf = $sigla[0]->sigla;
            }

            $data = array(
                'email' => $email,
                'razao' => $company,
                'uf' => $uf,
                'data_registro' => date('Y-m-d')
            );

            $this->recruiter_model->insertRecruiter($data);
            redirect(base_url());
        } else {
            $data['errors'] = validation_errors();
        }

        $this->layout->view('index/recruiterlogged', $data);
    }

    public function programmers() {

        $this->load->model('profissional_model');

        $data = array(
            'title' => 'Programmers',
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

    public function programmerlogged() {

        $this->load->model('profissional_model');

        $data = array(
            'title' => 'Programmers',
            'errors' => ''
        );

        $data['ufs'] = $this->db->query('SELECT * FROM uf')->result_object();

        if ($this->form_validation->run('programmer') !== false) {

            $email = (string) $this->input->post('email');
            $code = $this->input->post('code');
            $uf = (int) $this->input->post('selectUf');

            if (!empty($uf)) {
                $sigla = $this->db->query('SELECT * FROM uf WHERE id_uf = ?', $uf)->result_object();

                if (empty($sigla)) {
                    redirect(base_url() . 'index/programmerlogged');
                }
                $uf = $sigla[0]->sigla;
            }

            $data = array(
                'email' => $email,
                'codigo' => $code,
                'uf' => $uf,
                'data_registro' => date('Y-m-d')
            );

            $this->profissional_model->insertProfissional($data);

            redirect(base_url());
        } else {
            $data['errors'] = validation_errors();
        }

        $this->layout->view('index/programmerlogged', $data);
    }

    public function success() {

        $data = array(
            'title' => 'Success!'
        );

        $this->layout->view('index/success', $data);
    }

    public function about() {

        $data = array(
            'title' => 'How it Works'
        );

        $this->layout->view('index/about', $data);
    }

    public function programmer() {

        $data = array(
            'title' => 'Programmer of the Week'
        );

        $this->layout->view('index/programmer', $data);
    }

    public function contact() {

        $data = array(
            'title' => 'Contact Us'
        );

        $this->layout->view('index/contact', $data);
    }

    public function page404() {

        $data = array(
            'title' => 'Page Not Found'
        );

        $this->layout->view('page404/notfound', $data);
    }

}

?>
