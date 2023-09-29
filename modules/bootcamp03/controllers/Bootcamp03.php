<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Bootcamp03 extends CI_Controller
{
	function __construct()
	{
		parent::__construct($securePage = false);
		$this->load->model('Bootcamp03_model');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		$data['user'] = $this->input->get_post('id');
		$data['karyawan'] = $this->Bootcamp03_model->getKaryawan();

		// Initialize session
		$this->session->set_userdata('user_session', $data['user']);
		$this->load->view('Bootcamp03_view', $data);
	}

	public function getKaryawan()
	{
		$data = $this->Bootcamp03_model->getKaryawan();
		echo $data;
	}

	public function addKaryawan()
	{
		if ($this->session->has_userdata('user_session')) {

			// form validation
			$rules = $this->Bootcamp03_model->rules();
			$this->form_validation->set_rules($rules);

			// changing delimiters globally for adding styles
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

			if ($this->form_validation->run() == FALSE) {
				$errors = validation_errors();
				$response = array(
					'success' => false,
					'errors' => $errors,
					'message' => 'Validasi form gagal'
				);
			} else {

				if ($this->db->get_where('karyawan', array('nik' => $this->input->get_post('nik')))->num_rows() > 0) {
					$response = array(
						'success' => false,
						'message' => 'NIK telah terdaftar'
					);
				} else {
					echo $this->Bootcamp03_model->addKaryawan();
					$response = array(
						'success' => true,
						'message' => 'Data karyawan baru berhasil ditambah'
					);
				}
			}
		}

		// Send a JSON response
		header('Content-Type: application/json');
		echo json_encode($response);
	}

	public function nikCheck()
	{
		echo $this->Bootcamp03_model->nikCheck();
	}

	public function editKaryawan($nik)
	{
		echo $this->Bootcamp03_model->editKaryawan($nik);
	}

	public function saveKaryawan()
	{
		if ($this->session->has_userdata('user_session')) {

			// form validation
			$rules = $this->Bootcamp03_model->rules();
			$this->form_validation->set_rules($rules);

			// changing delimiters globally for adding styles
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

			if ($this->form_validation->run() == FALSE) {
				$errors = validation_errors();
				$response = array(
					'success' => false,
					'errors' => $errors,
					'message' => 'Validasi form gagal'
				);
			} else {
				echo $this->Bootcamp03_model->saveKaryawan();
				$response = array(
					'success' => true,
					'message' => 'Data karyawan berhasil diubah'
				);
			}
		}

		// Send a JSON response
		header('Content-Type: application/json');
		echo json_encode($response);
	}

	public function delKaryawan($nik)
	{
		$where = array('nik' => $nik);
		echo $this->Bootcamp03_model->delKaryawan($where);
	}

	public function exportToExcel()
	{

		$data['karyawan'] = $this->db->get_where('karyawan', array('created_by' => $this->session->userdata('user_session')))->result();

		// Create a new Spreadsheet
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		// Set column headers
		$sheet->setCellValue('A1', 'NIK');
		$sheet->setCellValue('B1', 'Nama');
		$sheet->setCellValue('C1', 'Tempat Lahir');
		$sheet->setCellValue('D1', 'Tanggal Lahir');
		$sheet->setCellValue('E1', 'Umur');
		$sheet->setCellValue('F1', 'Alamat');
		$sheet->setCellValue('G1', 'Telp');
		$sheet->setCellValue('H1', 'Jabatan');
		$sheet->setCellValue('I1', 'Created By');
		$sheet->setCellValue('J1', 'Created Time');
		// Add more columns as needed

		// Populate data from the database
		$row = 2;
		foreach ($data['karyawan'] as $k) {
			$sheet->setCellValue('A' . $row, $k->nik);
			$sheet->setCellValue('B' . $row, $k->nama);
			$sheet->setCellValue('C' . $row, $k->tempat_lahir);
			$sheet->setCellValue('D' . $row, $k->tanggal_lahir);
			$sheet->setCellValue('E' . $row, $k->umur);
			$sheet->setCellValue('F' . $row, $k->alamat);
			$sheet->setCellValue('G' . $row, $k->telp);
			$sheet->setCellValue('H' . $row, $k->jabatan);
			$sheet->setCellValue('I' . $row, $k->created_by);
			$sheet->setCellValue('J' . $row, $k->created_time);
			$row++;
		}

		// Create a writer
		$writer = new Xlsx($spreadsheet);

		// Set the file name and headers for the download
		$filename = 'data_karyawan.xlsx';
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');

		// Save the spreadsheet to output
		$writer->save('php://output');
	}
}
