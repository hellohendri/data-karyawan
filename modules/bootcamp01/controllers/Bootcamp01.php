<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bootcamp01 extends CI_Controller {

	function __construct() 
	{
		parent::__construct($securePage=false);
		$this->load->model('Bootcamp01_model');
		
		
	}

	public function index()
	{
		$data['user']=$this->input->get_post('id');

		$this->load->view('Bootcamp01_view',$data);
		
	}

	public function getListData(){
		$data = $this->Bootcamp01_model->getListData();
		echo $data;
	}
	
	public function ajaxform()
	{
		$data['user']=$this->input->get_post('id');
		$this->load->view('Ajaxform_view',$data);
		
	}
	
	function checkdata(){
		echo $this->Bootcamp01_model->checkdata();
	}
}