<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class User extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('template_helper'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Custom_model');
    }

    public function profil_post()
	{
		$post = $this->input->post(NULL, TRUE);

		if (!empty($post['id_karyawan'])) 
		{
			$getdetail = $this->Custom_model->getdetail('tbl_karyawan', array('id_karyawan' => $post['id_karyawan']));

			$output = array
					(
						'nama_karyawan' => $getdetail['nama_karyawan'],
						'no_telp_karyawan' => $getdetail['no_telp_karyawan'],
						'nik_karyawan' => $getdetail['nik_karyawan'],
						'alamat_karyawan' => $getdetail['alamat_karyawan'],
						'unit_kerja' => $getdetail['unit_kerja'],
						'alamat_unit' => $getdetail['alamat_unit'],
						'jabatan' => $getdetail['jabatan'],
						'atasan_langsung' => $getdetail['atasan_langsung'],
						'tgl_bergabung' => $getdetail['tgl_bergabung'],
						'email_karyawan' => $getdetail['email_karyawan'],
						'status_karyawan' => $getdetail['status_karyawan'],
						'salary' => $getdetail['salary'],
					);

			$this->response([
                'status' => TRUE,
                'code' => 200,
                'message' => 'Data karyawan berhasil didapat',
                'data' => $output
        	], \Restserver\Libraries\REST_Controller::HTTP_OK);
		}
		else
		{
			$this->response([
                'status' => FALSE,
                'code' => 401,
                'message' => 'Mohon periksa data Anda',
        	], \Restserver\Libraries\REST_Controller::HTTP_OK);
		}
	}

    public function change_pass_post()
	{
		$post = $this->input->post(NULL, TRUE);

		$getdetail = $this->Custom_model->getdetail('tbl_karyawan', array('id_karyawan' => $post['id_karyawan']));

		if (!empty($getdetail)) 
		{
			if ($post['pass_baru'] == $post['pass_conf']) 
			{
				if (password_verify($post['pass_lama'], $getdetail['password_karyawan']))
				{
					$updatedata = array
								(
									'password_karyawan' => password_hash($post['pass_baru'], PASSWORD_BCRYPT),
								);
					$this->Custom_model->updatedata('tbl_karyawan', $updatedata, array('id_karyawan' => $post['id_karyawan']));

					$this->response([
		                    'status' => TRUE,
			                'code' => 200,
			                'message' => 'Mohon periksa data Anda',
		            	], \Restserver\Libraries\REST_Controller::HTTP_OK);
				}
				else
				{
					$this->response([
	                    'status' => FALSE,
		                'code' => 401,
		                'message' => 'Mohon periksa data Anda',
	            	], \Restserver\Libraries\REST_Controller::HTTP_OK);
				}
			}
			else
			{
				$this->response([
                    'status' => FALSE,
	                'code' => 401,
	                'message' => 'Mohon periksa data Anda',
            	], \Restserver\Libraries\REST_Controller::HTTP_OK);
			}
		}
		else
		{
			$this->response([
                'status' => FALSE,
                'code' => 401,
                'message' => 'Mohon periksa data Anda',
        	], \Restserver\Libraries\REST_Controller::HTTP_OK);
		}
	}


}