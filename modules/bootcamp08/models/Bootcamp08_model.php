<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bootcamp08_model extends CI_Model 
{

    function getListData(){
		
		$iDisplayStart = $this->input->get_post('page', true);
        $iDisplayLength = $this->input->get_post('rows', true);
        $iSortCol_0 = $this->input->get_post('sidx', true);
        $iSortingCols = $this->input->get_post('sord', true);
        $sSearch = $this->input->get_post('_search', true);
        $sEcho = $this->input->get_post('sEcho', true);
		
		$userid = $this->input->get_post('id', true);
		
		// Paging
		if(isset($iDisplayStart) && $iDisplayLength != '-1')
		{
			$this->db->limit($this->db->escape_str($iDisplayLength), ($this->db->escape_str($iDisplayStart)-1) * $this->db->escape_str($iDisplayLength));
		}
		
		if(isset($iSortCol_0))
		{
			$this->db->order_by($iSortCol_0, $iSortingCols);
		}	

		if ($sSearch == 'true')
		{
			$filter = $this->input->get_post('filters');
			$arr_filter = json_decode($filter);
            $ops = array(
            'eq'=>'=', //equal
            'ne'=>'<>',//not equal
            'lt'=>'<', //less than
            'le'=>'<=',//less than or equal
            'gt'=>'>', //greater than
            'ge'=>'>=',//greater than or equal
            'bw'=>'LIKE', //begins with
            'bn'=>'NOT LIKE', //doesn't begin with
            'in'=>'LIKE', //is in
            'ni'=>'NOT LIKE', //is not in
            'ew'=>'LIKE', //ends with
            'en'=>'NOT LIKE', //doesn't end with
            'cn'=>'LIKE', // contains
            'rn'=>'RANGE', // contains
            'nc'=>'NOT LIKE'  //doesn't contain
            );
			
			
			foreach($arr_filter->rules as $key){
				if($ops[$key->op] == "LIKE" || $ops[$key->op] == "NOT LIKE"){
					$this->db->where(($key->field=="group_name"?"b.name":"a.".$key->field).' '.$ops[$key->op].' "%'.$key->data.'%"');
				}else if($ops[$key->op] == "RANGE"){
					$date = $key->data;
					$arrDate = explode("-", $date);
					$this->db->where("date(b.created_time) >=", date("Y-m-d", strtotime(trim($arrDate[0]))));
					$this->db->where("date(b.created_time) <=", date("Y-m-d", strtotime(trim($arrDate[1]))));
				}else{
					$this->db->where($key->field.' '.$ops[$key->op].' "'.$key->data.'"');
				}
				
			}
        }
		
		$select = array('a.nik','a.nama','a.tempat_lahir','a.tanggal_lahir','a.umur','a.alamat','a.telp','a.jabatan','b.full_name',
						'a.created_time');
		$this->db->from('karyawan a');
		$this->db->join('user b','a.created_by=b.id');
		$this->db->where('a.created_by',$userid);	
				
		$this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $select)), false);
		
	    $rResult = $this->db->get();
        // Data set length after filtering
        $this->db->select('FOUND_ROWS() AS found_rows');
		
        $iFilteredTotal = $this->db->get()->row()->found_rows;
        // Total data set length	
		$iTotal = $rResult->num_rows();
        if( $iTotal > 0 ) {
            $total_pages = ceil($iFilteredTotal/$iDisplayLength);
        } else {
            $total_pages = 0;
        }
		
        // Output
		$output = array();

		$list = array();
        foreach($rResult->result_array() as $aRow)
        {
			$list[] = array(
						"id" => $aRow['nik'], 
						"cell" => $aRow
					);
        }		
        $output = array(
            'page' => $iDisplayStart,
            'total' => $total_pages,
            'rows' => $list,
			'records' => $iFilteredTotal
        );	
		
        echo json_encode($output); 
		
	}

function tampil_data(){
    return $this->db->get('user'); 
}

function input_data(){
        $nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$umur = date_diff(date_create($tanggal_lahir), date_create('now'))->y;
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');
		$jabatan = $this->input->post('jabatan');
		$created_by = $this->input->post('created_by');
		$created_time = $this->input->post('created_time');

				// Fetch the ID of the user named 'bagas' from the 'user' table
		$user = $this->db->select('id')
                          ->from('user')
                          ->where('id', 'salsa')
                          ->get()
                          ->row();
		$data = array(
			'nik' => $nik,
			'nama' => $nama,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'umur' => $umur,
			'alamat' => $alamat,
			'telp' => $telp,
			'jabatan' => $jabatan,
			'created_by'=> $user->id,
			'created_time' => date('Y-m-d h:i:s')
		);
    $this->db->insert('karyawan',$data);
}

public function isNikExists($nik) {
    $query = $this->db->get_where('karyawan', array('nik' => $nik));
    return $query->num_rows() > 0;
}

function getJabatanOptions() {
    // Define the allowed job positions
    $allowed_jabatan = ['staff', 'manager', 'supervisor'];

    // Fetch the options from the database table
    $options = $this->db->distinct()
                       ->select('jabatan')
                       ->from('karyawan')
                       ->get()
                       ->result_array();

    // Create an array to store the final options
    $final_options = [];

    // Loop through the allowed job positions
    foreach ($allowed_jabatan as $jabatan) {
        // Check if the current job position is present in the fetched options
        $option_exists = false;
        foreach ($options as $option) {
            if ($option['jabatan'] === $jabatan) {
                $option_exists = true;
                break;
            }
        }

        // If the job position exists in the fetched options or is allowed, add it to the final options array
        if ($option_exists || in_array($jabatan, $allowed_jabatan)) {
            $final_options[] = ['jabatan' => $jabatan];
        }
    }

    // Return the final options
    return $final_options;
	
}

public function deleteData($nik) {
        $this->db->where('nik', $nik);
        if ($this->db->delete('karyawan')) {
            return array('success' => true);
        } else {
            return array('success' => false, 'error' => $this->db->error());
        }
    }
}	