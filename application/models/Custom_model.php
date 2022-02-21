<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_model extends MY_Model {

	public $rules_admin = array
					(
						'username_admin' => array
									(
										'field' => 'username_admin',
										'label' => 'Username',
										'rules' => 'trim|required'
									),
						'password_admin' => array
									(
										'field' => 'password_admin',
										'label' => 'Password',
										'rules' => 'trim|required|callback_password_check'
									)
					);

	public function __construct()
	{
		parent::__construct();
	}

	public function getdata($table, $where = NULL, $order = null, $sort = null, $limit = NULL, $offset = NULL, $single = FALSE, $select = NULL)
	{
		if ($where != NULL) 
		{
			return $this->get_by($table, $where, $order, $sort, $limit, $offset, $single, $select);
		}
		else
		{
			return $this->get($table);
		}
	}

	public function getdetail($table, $where)
	{
		return $this->get($table, $where, TRUE);
	}

	public function insertdata($table, $data, $affected=FALSE,$batch=FALSE)
	{
		return $this->insert($table, $data, $affected, $batch);
	}

	public function updatedata($table, $data, $where, $batch=false)
	{
		return $this->update($table, $data, $where, $batch);
	}

	public function deletedata($table, $where)
	{
		return $this->delete_by($table, $where);
	}

	public function countdata($table, $where)
	{
		return $this->count($table, $where);
	}

	public function getdatakaryawan($id_karyawan = null)
	{
		$this->db->select('
							tbl_karyawan.id_karyawan, 
							tbl_karyawan.id_pekerjaan,
							tbl_karyawan.nama_karyawan,
							tbl_karyawan.nik_karyawan,
							tbl_karyawan.no_telp_karyawan,
							tbl_karyawan.alamat_karyawan,
							tbl_karyawan.email_karyawan,
							tbl_karyawan.status_karyawan,
							tbl_karyawan.salary,
							tbl_karyawan.tgl_terdaftar_karyawan,
							tbl_pekerjaan.nama_pekerjaan
						');
		$this->db->from('tbl_karyawan');
		$this->db->join('tbl_pekerjaan', 'tbl_karyawan.id_pekerjaan = tbl_pekerjaan.id_pekerjaan');
		
		if ($id_karyawan != null) 
		{
			$this->db->where('id_karyawan', $id_karyawan);
			$query = $this->db->get();
			$result = $query->row_array();
			return $result;
		}
		else
		{
			$query = $this->db->get();
			$data = array();
			if($query !== FALSE && $query->num_rows() > 0){
			    $data = $query->result_array();
			}
			
			return $data;
		}
	}

	public function getdataabsen()
	{
		$this->db->select('
							tbl_absen.*, 
							tbl_karyawan.nama_karyawan
						');
		$this->db->from('tbl_absen');
		$this->db->join('tbl_karyawan', 'tbl_absen.id_karyawan = tbl_karyawan.id_karyawan');
		
		$query = $this->db->get();
		$data = array();
		if($query !== FALSE && $query->num_rows() > 0){
		    $data = $query->result_array();
		}
		
		return $data;
		
	}

	public function getdatagaji()
	{
		$this->db->select('
							tbl_gaji.id_gaji, 
							tbl_gaji.id_karyawan,
							tbl_gaji.gaji_seharusnya,
							tbl_gaji.gaji_diterima,
							tbl_gaji.waktu_gajian,
							tbl_gaji.tgl_input,
							tbl_karyawan.nama_karyawan
						');
		$this->db->from('tbl_gaji');
		$this->db->join('tbl_karyawan', 'tbl_gaji.id_karyawan = tbl_karyawan.id_karyawan');
		$query = $this->db->get();

		$data = array();
		if($query !== FALSE && $query->num_rows() > 0){
		    $data = $query->result_array();
		}
		
		return $data;
	}

	public function getdatareimburse($id_karyawan = null)
	{
		$this->db->select('tbl_reimburse.id_reimburse,
							tbl_reimburse.id_karyawan,
							tbl_reimburse.jenis_klaim,
							tbl_reimburse.tgl_pengajuan,
							tbl_reimburse.tgl_berkas,
							tbl_reimburse.nominal_reimburse,
							tbl_reimburse.file_reimburse,
							tbl_reimburse.tgl_reimburse,
							tbl_reimburse.status_reimburse,
							tbl_karyawan.nama_karyawan');
		$this->db->from('tbl_reimburse');
		$this->db->join('tbl_karyawan', 'tbl_reimburse.id_karyawan = tbl_karyawan.id_karyawan');

		if ($id_karyawan != null) 
		{
			$this->db->where('tbl_reimburse.id_karyawan', $id_karyawan);
		}

		$query = $this->db->get();

		$data = array();
		if($query !== FALSE && $query->num_rows() > 0){
		    $data = $query->result_array();
		}
		
		return $data;
	}

	public function getdatagajiapi($id_karyawan)
	{
		$this->db->select('*');
		$this->db->from('tbl_gaji');
		$this->db->order_by('waktu_gajian_diterima', 'DESC');
		if ($id_karyawan != null) 
		{
			$this->db->where('id_karyawan', $id_karyawan);
		}
		$query = $this->db->get();

		$data = array();
		if($query !== FALSE && $query->num_rows() > 0){
		    $data = $query->result_array();
		}
		
		return $data;
	}

	public function getlastgajian($id_karyawan)
	{
		$this->db->select('id_karyawan, waktu_gajian');
		$this->db->from('tbl_gaji');
		$this->db->order_by('id_gaji', 'DESC');

		$query = $this->db->get();
		$result = $query->row_array();
		
		return $result;
	}

	public function getabsenkaryawan($id_karyawan, $first_date, $second_date, $status = null)
	{
		$this->db->select('*');
		$this->db->from('tbl_absen');
		$this->db->where('waktu_absen >=', $first_date);
		$this->db->where('waktu_absen <=', $second_date);

		if ($status != null) 
		{
			$this->db->where('status_absen', $status);
			return $this->db->count_all_results();
		}

		else
		{
			$query = $this->db->get();

			$data = array();
			if($query !== FALSE && $query->num_rows() > 0){
			    $data = $query->result_array();
			}
			
			return $data;
		}
	}

	public function absenkaryawanapi($id_karyawan)
	{
		$this->db->select('*');
		$this->db->from('tbl_absen');
		$this->db->where('id_karyawan', $id_karyawan);
		$this->db->order_by('waktu_absen', 'DESC');

		$query = $this->db->get();

		$data = array();
		if($query !== FALSE && $query->num_rows() > 0){
		    $data = $query->result_array();
		}
		
		return $data;
	}

	public function getcutikaryawan($id_karyawan, $first_date, $second_date)
	{
		$this->db->select('*');
		$this->db->from('tbl_cuti_tgl');
		$this->db->where('tgl_cuti >=', $first_date);
		$this->db->where('tgl_cuti <=', $second_date);

		$query = $this->db->get();

		$data = array();
		if($query !== FALSE && $query->num_rows() > 0){
		    $data = $query->result_array();
		}
		
		return $data;
	}

	public function getcutikaryawanapi($id_karyawan)
	{
		$this->db->select('*');
		$this->db->from('tbl_cuti');
		$this->db->where('id_karyawan', $id_karyawan);

		$query = $this->db->get();

		$data = array();
		if($query !== FALSE && $query->num_rows() > 0){
		    $data = $query->result_array();
		}
		
		return $data;
	}

	public function getcutidetail($id_karyawan, $tgl_cuti)
	{
		$this->db->select('tbl_cuti_tgl.*, tbl_cuti.status_cuti');
		$this->db->from('tbl_cuti_tgl');
		$this->db->join('tbl_cuti', 'tbl_cuti_tgl.id_cuti = tbl_cuti.id_cuti');

		$query = $this->db->get();
		$result = $query->row_array();
		
		return $result;
	}

	public function getdispensasidetail($id_karyawan, $tgl_dispensasi)
	{
		$this->db->select('tbl_dispensasi_tgl.*, tbl_dispensasi.status_dispensasi');
		$this->db->from('tbl_dispensasi_tgl');
		$this->db->join('tbl_dispensasi', 'tbl_dispensasi_tgl.id_dispensasi = tbl_dispensasi.id_dispensasi');

		$query = $this->db->get();
		$result = $query->row_array();
		
		return $result;
	}

	public function getdispensasi($id_karyawan = null)
	{
		$this->db->select('tbl_dispensasi.*, tbl_karyawan.nama_karyawan');
		$this->db->from('tbl_dispensasi');
		$this->db->join('tbl_karyawan', 'tbl_dispensasi.id_karyawan = tbl_karyawan.id_karyawan');

		if ($id_karyawan != null) 
		{
			$this->db->where('tbl_dispensasi.id_karyawan', $id_karyawan);
		}
		
		$this->db->order_by('tgl_pengajuan', 'DESC');

		$query = $this->db->get();

		$data = array();
		if($query !== FALSE && $query->num_rows() > 0){
		    $data = $query->result_array();
		}
		
		return $data;
	}

	public function getcuti($id_karyawan = null)
	{
		$this->db->select('tbl_cuti.*, tbl_karyawan.nama_karyawan');
		$this->db->from('tbl_cuti');
		$this->db->join('tbl_karyawan', 'tbl_cuti.id_karyawan = tbl_karyawan.id_karyawan');

		if ($id_karyawan != null) 
		{
			$this->db->where('tbl_cuti.id_karyawan', $id_karyawan);
		}
		
		$this->db->order_by('tbl_cuti.tgl_pengajuan', 'DESC');

		$query = $this->db->get();

		$data = array();
		if($query !== FALSE && $query->num_rows() > 0){
		    $data = $query->result_array();
		}
		
		return $data;
	}

	public function editfotoprofil($id)
	{
		$this->db->trans_begin();
			global $SConfig;
			$this->load->library('upload');

			$error = 0;
			$getdatafoto = $this->Custom_model->getdetail('tbl_user', array('id_user' => $id));
			$ext = get_ext($_FILES['foto_user']["name"]);
			if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'PNG' || $ext == 'JPEG') 
			{
				if (!empty($getdatafoto['foto_user'])) 
				{
					unlink('./'.$getdatafoto['foto_user']);
				}
			}
			else
			{
				$error = 1;
			}
			
			$config['file_name'] = $id;
			$config['upload_path'] = './files/prof_pic';
			$config['allowed_types'] = 'jpg|jpeg|png|pdf';

			$this->upload->initialize($config);
			if ($this->upload->do_upload('foto_user')) 
			{
            	$gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
            	$config['source_image']='./files/prof_pic/'.$gbr['file_name'];
            	$config['new_image']= './files/prof_pic'.$gbr['file_name'];
            	$link_file = 'files/prof_pic'.$config['file_name'].'.'.get_ext($_FILES['foto_user']["name"]);
				$this->updatedata('tbl_user', array('foto_user' => $link_file), array('id_user' => $id));
                
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['width']= 800;
                $config['height']= 800;
                
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
			}
			else
			{
				$error = 1;
				$upl = $this->upload->display_errors();
			}

		if ($this->db->trans_status() === FALSE || $error == 1)
		{
			$this->db->trans_rollback();
			return $upl;
		}
		else
		{
			$this->db->trans_commit();
			return TRUE;
		}
	}

	public function insertdatafoto($tbl, $idname, $file_upload, $loc, $input, $userlevel = false, $id = null, $edit = null, $width = 800, $height = 800)
	{
		$this->db->trans_begin();
			global $SConfig;
			$this->load->library('upload');

			if ($edit == true) 
			{
				$getdatafoto = $this->Custom_model->getdetail($tbl, array($idname => $id));
				$ext = get_ext($_FILES[$file_upload]["name"]);
				if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'PNG' || $ext == 'JPEG') 
				{
					unlink('./'.$getdatafoto[$file_upload]);
					$this->updatedata($tbl, $input, array($idname => $id));
				}
				else
				{
					$error = 1;
				}
			}
			else
			{
				$id = $this->insertdata($tbl, $input);

				if ($userlevel == TRUE) 
				{
					foreach ($userlevel as $key => $value) 
					{
						$insert = array
								(
									'id_user' => $id,
									'id_level' => $value
								);
						$this->insertdata('tbl_user_level', $insert);
					}
				}
			}

			$error = 0;
			$config['file_name'] = uniqid();
			$config['upload_path'] = './files/'.$loc;
			$config['allowed_types'] = 'jpg|jpeg|png';

			$this->upload->initialize($config);
			if ($this->upload->do_upload($file_upload)) 
			{
				$gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
            	$config['source_image']='./files/'.$loc.'/'.$gbr['file_name'];
            	$config['new_image']= './files/'.$loc.'/'.$gbr['file_name'];
            	$link_file = '/files/'.$loc.'/'.$config['file_name'].'.'.get_ext($_FILES[$file_upload]["name"]);
				$this->updatedata($tbl, array($file_upload => $link_file), array($idname => $id));
                
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['width']= $width;
                $config['height']= $height;
                
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
			}
			else
			{
				$error = 1;
				$upl = $this->upload->display_errors();
			}

		if ($this->db->trans_status() === FALSE || $error == 1)
		{
			$this->db->trans_rollback();
			return FALSE;
		}
		else
		{
			$this->db->trans_commit();
			return $id;
		}
	}
}