<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bootcamp03_model extends CI_Model
{
    public function rules()
    {
        return [
            [
                'field' => 'nik',
                'label' => 'Nik',
                'rules' => 'required|max_length[36]'
            ],
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required|alpha|max_length[100]'
            ],
            [
                'field' => 'tempat_lahir',
                'label' => 'Tempat Lahir',
                'rules' => 'required'
            ],
            [
                'field' => 'tanggal_lahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'required'
            ],
            [
                'field' => 'alamat',
                'label' => 'alamat',
                'rules' => 'required|max_length[100]'
            ],
            [
                'field' => 'telp',
                'label' => 'telp',
                'rules' => 'required|max_length[15]'
            ],
            [
                'field' => 'jabatan',
                'label' => 'jabatan',
                'rules' => 'required'
            ],
        ];
    }

    public function getKaryawan()
    {
        $userid = $this->input->get_post('id', true);
        $search = $this->input->get_post('search', true);

        if ($search != '') {
            $this->db->like('nik', $search);
            $this->db->or_like('nama', $search);
            $this->db->or_like('tempat_lahir', $search);
            $this->db->or_like('tanggal_lahir', $search);
            $this->db->or_like('umur', $search);
            $this->db->or_like('alamat', $search);
            $this->db->or_like('telp', $search);
            $this->db->or_like('jabatan', $search);
            $result = $this->db->get_where('karyawan', array('created_by' => $userid))->result_array();
            return json_encode($result);
        } else {
            $result = $this->db->get_where('karyawan', array('created_by' => $userid))->result_array();
            return json_encode($result);
        }
    }

    public function addKaryawan()
    {
        $nik = $this->input->get_post('nik');
        $nama = $this->input->get_post('nama');
        $tempat_lahir = $this->input->get_post('tempat_lahir');
        $tanggal_lahir = $this->input->get_post('tanggal_lahir');
        $alamat = $this->input->get_post('alamat');
        $telp = $this->input->get_post('telp');
        $jabatan = $this->input->get_post('jabatan');
        $user = $this->input->get_post('id');
        $created_time = date("Y-m-d h:i:s");

        // mendapatkan usia karyawan berdasarkan interval tanggal lahir dan current date
        $birth_date = date_create($tanggal_lahir);
        $current_date = date_create(date("Y-m-d"));
        $interval = date_diff($birth_date, $current_date);
        $umur = $interval->format('%y'); // value usia

        $data = array(
            'nik' => $nik,
            'nama' => $nama,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'umur' => $umur,
            'alamat' => $alamat,
            'telp' => $telp,
            'jabatan' => $jabatan,
            'created_by' => $user,
            'created_time' => $created_time,
        );

        $this->db->insert('karyawan', $data);
    }

    public function editKaryawan($nik)
    {
        $this->db->where('nik', $nik);
        $query = $this->db->get('karyawan');

        if ($query->num_rows() > 0) {
            $val = array();
            foreach ($query->result_array() as $row) {
                $val[] = $row;
            }
            $data = array('status' => 'success', 'message' => 'data sudah tersedia', 'data' => $val);
        } else {
            $data = array('status' => 'error', 'message' => 'data tidak ditemukan');
        }

        return json_encode($data);
    }

    public function saveKaryawan()
    {
        $nik = $this->input->get_post('nik');
        $nama = $this->input->get_post('nama');
        $tempat_lahir = $this->input->get_post('tempat_lahir');
        $tanggal_lahir = $this->input->get_post('tanggal_lahir');
        $alamat = $this->input->get_post('alamat');
        $telp = $this->input->get_post('telp');
        $jabatan = $this->input->get_post('jabatan');
        $user = $this->session->userdata('user_session');
        $created_time = date("Y-m-d h:i:s");

        // mendapatkan usia karyawan berdasarkan interval tanggal lahir dan current date
        $birth_date = date_create($tanggal_lahir);
        $current_date = date_create(date("Y-m-d"));
        $interval = date_diff($birth_date, $current_date);
        $umur = $interval->format('%y'); // value usia

        $data = array(
            'nik' => $nik,
            'nama' => $nama,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'umur' => $umur,
            'alamat' => $alamat,
            'telp' => $telp,
            'jabatan' => $jabatan,
            'created_by' => $user,
            'created_time' => $created_time,
        );

        $this->db->where('nik', $nik);
        $this->db->update('karyawan', $data);
    }

    public function delKaryawan($where)
    {
        $this->db->delete('karyawan', $where);

        if ($this->db->affected_rows() > 0) {
            $data = array('status' => 'success', 'message' => 'Data karyawan berhasil dihapus');
        } else {
            $data = array('status' => 'error', 'message' => 'Gagal hapus data karyawan');
        }

        return json_encode($data);
    }
}
