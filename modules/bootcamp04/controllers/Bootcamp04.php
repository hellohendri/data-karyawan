<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bootcamp04 extends CI_Controller {

    function __construct() 
    {
        parent::__construct($securePage = false);
        $this->load->model('Bootcamp04_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index() 
    {
        $data['user'] = $this->input->get_post('id');

        // Prepare data for the view
        $data['karyawan'] = $this->Bootcamp04_model->getKaryawan();

        // Load the view
        $this->load->view('Bootcamp04_view', $data);
    }

    public function getKaryawan()
    {
        $data = $this->Bootcamp04_model->getKaryawan();
        echo $data;
    }

    public function addKaryawan()
    {
        $data['user'] = $this->session->userdata('user_session');

        // Form validation
        $rules = $this->Bootcamp03_model->rules();
        $this->form_validation->set_rules($rules);

        // Changing delimiters globally for adding styles
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Bootcamp04_view');
        } 
        else 
        {
            $this->Bootcamp04_model->addKaryawan();
            redirect('bootcamp04/?id=' . $_SESSION['user_session']);
        }
    }

    public function breakkaryawan($nik)
    {
        $where = array('nik' => $nik);
        echo $this->Bootcamp04_model->breakkaryawan($where);
    }

    public function nikCheck()
    {
        echo $this->Bootcamp04_model->nikCheck();
    }

    public function editKaryawan($nik) {
        echo $this->Bootcamp04_model->editKaryawan($nik);
    }

    public function saveKaryawan() {
        echo $this->Bootcamp04_model->saveKaryawan();
    }

    public function delKaryawan($nik)
    {
        $where = array('nik' => $nik);
        echo $this->Bootcamp04_model->delKaryawan($where);
    }
}
