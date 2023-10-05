<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bootcamp02 extends CI_Controller
{

	function __construct()
	{
		parent::__construct($securePage = false);
		$this->load->model('Bootcamp02_model');
	}

	// Function Menampilkan Halaman Index
	public function index()
	{
		$user = $this->input->get_post('id');
		$data['user'] = $user;
		$this->load->view('Bootcamp02_view', $data);
	}

	// Function Mendapatkan Data Karyawan
	public function getKaryawan()
	{
		$data = $this->Bootcamp02_model->getListData();
		echo $data;
	}

	// Function Menampilkan Form 
	public function add()
	{
		$user = $this->input->get_post('id');
		$data['user'] = $user;
		$this->load->view('Bootcamp02_add');
	}

	// Function POST (Tambah Data atau Update)
	public function submitadd($nik = null)
	{
		// Validasi NIK
		if (!$nik) {
			$this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric|exact_length[16]|regex_match[/^[0-9]+$/]');
		}
		// Validasi Untuk Masing Masing Form Lainnya
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|regex_match[/^[A-Za-z\s]+$/]|max_length[60]');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required|callback_check_valid_birthdate');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|min_length[5]|max_length[255]|regex_match[/^[A-Za-z0-9\s\.,#-]+$/]');
		$this->form_validation->set_rules('telp', 'Telepon', 'trim|required|numeric|min_length[10]|max_length[13]|regex_match[/^[0-9]+$/]');

		if ($this->form_validation->run() == FALSE) {
			// Kondisi Jika Validasi Gagal
			$user = $this->input->get_post('id');
			$data['user'] = $user;
			$this->load->view('Bootcamp02_add');
		} else {
			// Kondisi Jika Validasi Berhasil
			$data = array(
				// 'nik' => $this->input->post('nik'),
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

			if (!$nik) {
				// Tambah Data
				$data['nik'] = $this->input->post('nik');
				$this->Bootcamp02_model->save($data);
				// Tampilkan alert tambah data berhasil
				echo
				'<script>
                	alert("Data Karyawan Berhasil Ditambahkan");
                	window.location.href = "' . base_url('bootcamp02?id=' . $this->input->get('id')) . '";
            	</script>';
			} else {
				// Update Data
				$this->Bootcamp02_model->update($nik, $data);
				// Tampilkan alert update data berhasil
				echo
				'<script>
                	alert("Data Karyawan Berhasil Diperbarui");
                	window.location.href = "' . base_url('bootcamp02?id=' . $this->input->get('id')) . '";
            	</script>';
			}
		}
	}

	// Function Update Data 
	public function update($nik)
	{
		$karyawan = $this->Bootcamp02_model->findOne($nik);
		$user = $this->input->get_post('id');
		$data['user'] = $user;
		$this->load->view('Bootcamp02_add', ['karyawan' => $karyawan]);
	}

	// Function Delete Data 
	public function delete($nik)
	{
		$this->Bootcamp02_model->delete($nik);
		echo '<script>
                alert("Data Karyawan Berhasil Dihapus");
                window.location.href = "' . base_url('bootcamp02?id=' . $this->input->get('id')) . '";
              </script>';
	}

	// Function Hitung Umur 
	function countAge($birthdate)
	{
		$birthdate = new DateTime($birthdate);
		$tanggal_sekarang = new DateTime();
		$diff = $tanggal_sekarang->diff($birthdate);
		return $diff->y;
	}

	// Function Validasi Tanggal Lahir (Tidak Boleh Input Tanggal Lahir Diatas Tanggal Hari Ini)
	public function check_valid_birthdate($str)
	{
		// Konversi Input Tanggal Lahir Ke Objek DateTime
		$input_date = new DateTime($str);

		// Dapatkan Tanggal Sekarang
		$current_date = new DateTime();

		// Bandingkan Tanggal Lahir Dengan Tanggal Sekarang
		if ($input_date > $current_date) {
			$this->form_validation->set_message('check_valid_birthdate', 'The %s field cannot be a future date.');
			return FALSE;
		}

		return TRUE;
	}
}
