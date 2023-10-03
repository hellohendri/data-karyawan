<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bootcamp05 extends CI_Controller {

	function __construct() 
	{
		parent::__construct($securePage=false);
		$this->load->model('Bootcamp05_model');
		
		
	}

	public function index()
	{
		$data['user']=$this->input->get_post('id');
		
		// In your controller
		// Load the model
		$this->load->model('Bootcamp05_model');
    
		// Get the jabatan options from the model
		$jabatan_options = $this->Bootcamp05_model->getJabatanOptions();
    
		// Pass the options to the view
		$data['jabatan_options'] = $jabatan_options;

		$this->load->view('Bootcamp05_view',$data);
		
	}

	public function getListData(){
		$data = $this->Bootcamp05_model->getListData();
		echo $data;
	}
	
	public function AddData(){
    $nik = $this->input->post('nik');

    // Cek apakah NIK sudah ada dalam database
    if ($this->Bootcamp05_model->isNikExists($nik)) {
        // Jika NIK sudah ada, tampilkan pesan error kepada pengguna
        echo "<script>alert('NIK sudah digunakan. Silakan input NIK yang berbeda.');</script>";
		echo "<script>window.history.back();</script>";
    } else {
        // Jika NIK belum ada, simpan data
        $this->Bootcamp05_model->save();
        redirect('Bootcamp05/?id=bagas');
    }

}

	
}