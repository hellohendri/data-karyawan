<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bootcamp04 extends CI_Controller {

	function __construct() 
	{
		parent::__construct($securePage=false);
		$this->load->model('Bootcamp04_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		
	}

	public function index() 
	{
		$data['user'] = $this->input->get_post('id');

        // Prepare data for the view
        $data['karyawan'] = $this->Bootcamp04_model->getListData();

        // Load the view
        $this->load->view('Bootcamp04_view', $data);
    }

	public function getListData()
	{
		$data = $this->Bootcamp04_model->getListData();
		echo $data;
		
	}
	public function addKaryawan()
	{
		// Store user ID into session 
		$user = $this->input->get_post('id');
		$this->session->set_userdata('user_session', $user);

		// Form validation
		$rules = $this->Bootcamp04_model->rules();
		$this->form_validation->set_rules($rules);

		// Changing delimiters for this form's errors
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
}