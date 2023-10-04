<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bootcamp07 extends CI_Controller {

	function __construct() 
	{
		parent::__construct($securePage=false);
		$this->load->model('Bootcamp07_model');
	}

	public function index()
	{
		$data['user']=$this->input->get_post('id');
		$jabatan_options = $this->Bootcamp07_model->getJabatanOptions();
		$data['jabatan_options'] = $jabatan_options;

		$this->load->view('bootcamp07_view',$data);
		
	}

	public function getListData(){
		$data = $this->Bootcamp07_model->getListData();
		echo $data;
	}
	
	public function addData(){
    $nik = $this->input->post('nik');

    if ($this->Bootcamp07_model->isNikExists($nik)) {
        echo "<script>alert('NIK sudah digunakan. Harap masukkan NIK yang baru');</script>";
		echo "<script>window.history.back();</script>";
    } else {
        $this->Bootcamp07_model->save();
        redirect('bootcamp07/?id=anggi');
    }
	
	}
		
	public function deleteData(){
		$nik = $this->input->post('nik');
		$this->Bootcamp07_model->deleteData($nik);
		$this->output->set_content_type('application/json');
		$this->output->set_status_header(200);
		$this->output->set_output(json_encode(['message' => 'Data berhasil dihapus']));
	}
		
	function editData(){
		$where = array('nik' => $nik);
		$data['karyawan'] = $this->Bootcamp07_model->editData($where,'karyawan')->result();
		$this->load->view('bootcamp07_view_edit',$data);
	}
	
	function update(){
	$nik = $this->input->post('nik');
	$nama = $this->input->post('nama');
	$alamat = $this->input->post('alamat');
	$telp = $this->input->post('telp');
 
	$data = array(
		'nama' => $nama,
		'alamat' => $alamat,
		'telp' => $telp
	);
 
	$where = array(
		'nik' => $nik
	);
 
	$this->bootcamp07_model->updateData($where,$data,'karyawan');
	 redirect('bootcamp07/?id=anggi');
	 }
}