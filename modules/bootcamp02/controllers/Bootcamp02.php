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
		$user = $this->input->get_post('id');
		$data['user'] = $user;
		$this->load->view('Bootcamp02_add');
	}

	public function update($nik)
	{
		$karyawan = $this->Bootcamp02_model->findOne($nik);
		$user = $this->input->get_post('id');
		$data['user'] = $user;
		$this->load->view('Bootcamp02_add', ['karyawan' => $karyawan]);
	}

	public function submitadd()
	{
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric|exact_length[16]');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('telp', 'Telepon', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			// Kondisi Jika Validasi Gagal
			$user = $this->input->get_post('id');
			$data['user'] = $user;
			$this->load->view('Bootcamp02_add'); 
		} else {
			// Kondisi Jika Validasi Berhasil
			$data = array(
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'umur' => $this->input->post('val_umur'),
				'alamat' => $this->input->post('alamat'),
				'telp' => $this->input->post('telp'),
				'jabatan' => $this->input->post('jabatan'),
				'created_by' => $this->input->get('id'),
				'created_time' => date('Y-m-d H:i:s'),
			);
			$this->Bootcamp02_model->save($data);
			redirect('bootcamp02?id=' . $this->input->get('id'));
		}
	}

	function countAge($birthdate)
	{
		$birthdate = new DateTime($birthdate);
		$tanggal_sekarang = new DateTime();
		$diff = $tanggal_sekarang->diff($birthdate);
		return $diff->y;
	}
}
