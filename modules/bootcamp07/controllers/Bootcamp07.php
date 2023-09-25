<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bootcamp07 extends CI_Controller {

	function __construct() 
	{
		parent::__construct($securePage=false);
		$this->load->model('bootcamp07_model');
		
	}

	public function index()
	{
		$data['user']=$this->input->get_post('id');
		$this->load->view('bootcamp07_view',$data);
		
	}

	public function getListData(){
		$data = $this->bootcamp07_model->getListData();
		echo $data;
	}
	
	public function addData(){
		$this->bootcamp07_model->save();
		redirect('bootcamp07/?id=anggi');
	}
	
	public function deleteData($nik){
		$this->bootcamp07_model->delete($nik);
		redirect('bootcamp07/?id=anggi');
	}
	
	function edit($nik){
		$this->bootcamp07_model->edit($nik);
		redirect('bootcamp07/?id=anggi');
	}
}