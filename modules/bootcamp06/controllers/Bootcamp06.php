<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bootcamp06 extends CI_Controller {

	function __construct() 
	{
		parent::__construct($securePage=false);
		$this->load->model('Bootcamp06_model');
	}

	public function index()
	{
		$data['user'] = $this->Bootcamp06_model->tampil_data()->result();
		$data['user'] = $this->input->get_post('id');

		$this->load->view('Bootcamp06_view',$data);
	}

	function tambah_data(){
		$this->Bootcamp06_model->input_data();
		redirect('Bootcamp06/?id=elva');
	}

	function hapus_data($id){
		$where = array('id' => $id);
		$this->Bootcamp06_model->delete_data($where,'user');
		redirect('Bootcamp06/?id=elva');
	}

	public function getListData(){
		$data = $this->Bootcamp06_model->getListData();
		echo $data;
	}
	
	
}