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

        $this->load->view('index/index');
    }

    public function recruiters() {

        $data = array(
            'title' => 'Recruiters'
        );

        $this->layout->view('index/recruiters', $data);
    }

    public function programmers() {

        $data = array(
            'title' => 'Programmers'
        );

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

            $sigla = $this->db->query('SELECT * FROM uf WHERE id_uf = ?', $uf)->result_object();

            if (empty($sigla)) {
                redirect(base_url() . 'index/programmerlogged');
            }

            $data = array(
                'email' => $email,
                'codigo' => $code,
                'uf' => $sigla[0]->sigla,
                'data_registro' => date('Y-m-d')
            );

            $this->profissional_model->insertProfissional($data);

            redirect(base_url());
        } else {
            $data['errors'] = validation_errors();
        }

        $this->layout->view('index/programmerlogged', $data);
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
