<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bootcamp08 extends CI_Controller {

	function __construct() 
	{
		parent::__construct($securePage=false);
		$this->load->model('Bootcamp08_model');
		
		
	}

	public function index()
	{
		$data['user']=$this->Bootcamp08_model->tampil_data()->result();
		$data['user']=$this->input->get_post('id');

		$this->load->model('Bootcamp08_model');
    
		// Get the jabatan options from the model
		$jabatan_options = $this->Bootcamp08_model->getJabatanOptions();
    
		// Pass the options to the view
		$data['jabatan_options'] = $jabatan_options;

		$this->load->view('Bootcamp08_view',$data);
		
	}
	
	function tambah_aksi (){
		$nik = $this->input->post('nik');

    // Cek apakah NIK sudah ada dalam database
    if ($this->Bootcamp08_model->isNikExists($nik)) {
        // Jika NIK sudah ada, tampilkan pesan error kepada pengguna
        echo "<script>alert('NIK sudah digunakan. Silakan input NIK yang berbeda.');</script>";
		echo "<script>window.history.back();</script>";
    } else {
        // Jika NIK belum ada, simpan data
		$this->Bootcamp08_model->input_data();
		redirect('Bootcamp08/?id=salsa');
	}
	}
	
	public function getListData(){
		$data = $this->Bootcamp08_model->getListData();
		echo $data;
	}

	public function deleteAction() {
        $nik = $this->input->post('nik');
        $result = $this->Bootcamp08_model->deleteData($nik);
        echo json_encode($result);
    }
}