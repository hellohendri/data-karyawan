<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bootcamp02 extends CI_Controller
{

	function __construct()
	{
		parent::__construct($securePage = false);
		$this->load->model('Bootcamp02_model');
	}

	public function index()
	{
		$user = $this->input->get_post('id');

		// if ($user === 'nico') {
		// 	$data['karyawan'] = $this->Bootcamp02_model->getListData();
		// } else {
		// 	$data['karyawan'] = array();
		// }

		$data['user'] = $user;

		$this->load->view('Bootcamp02_view', $data);
	}

	public function getKaryawan()
	{
		$data = $this->Bootcamp02_model->getListData();
		echo $data;
	}

	public function add()
	{
		$this->load->view('Bootcamp02_add');
	}

	public function submitadd()
	{
		$data = array(
			'nik' => $this->input->post('nik'),
			'nama' => $this->input->post('nama'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'umur' => $this->input->post('umur'),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telp'),
			'jabatan' => $this->input->post('jabatan'),
			'created_by' => $this->input->get('id'),
			'created_time' => date('Y-m-d H:i:s'),
		);
		$this->Bootcamp02_model->save($data);
		redirect('bootcamp02?id='.$this->input->get('id'));
	}
}
