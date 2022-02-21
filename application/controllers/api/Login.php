<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Login extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('template_helper'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Custom_model');
    }

    public function index_post()
    {
        $post = $this->input->post(NULL, TRUE);

        if (!empty($post['email']) || !empty($post['password']))
        {
            $finduser = $this->Custom_model->getdetail('tbl_karyawan', array('email_karyawan' => $post['email']));

            if (!empty($finduser)) 
            {
                $output = array
                (
                    'id_karyawan' => $finduser['id_karyawan'],
                    'nik_karyawan' => $finduser['nik_karyawan'],
                    'nama_karyawan' => $finduser['nama_karyawan'],
                    'status_karyawan' => 'aktif'
                );

                if (password_verify($post['password'], $finduser['password_karyawan'])) 
                {
                    $this->response([
                            'status' => TRUE,
                            'code' => 200,
                            'message' => 'Login berhasil',
                            'data' => $output
                        ], \Restserver\Libraries\REST_Controller::HTTP_OK);
                }
                else
                {
                    $cektemp = $this->Custom_model->getdetail('tbl_password_temp', array('id_karyawan' => $finduser['id_karyawan'], 'password_temp' => $post['password'], 'expired_date >=' => date('Y-m-d H:i:s')));

                    if (!empty($cektemp)) 
                    {
                        $this->response([
                            'status' => TRUE,
                            'code' => 200,
                            'message' => 'Login berhasil',
                            'data' => $output
                        ], \Restserver\Libraries\REST_Controller::HTTP_OK);
                    }
                    else
                    {
                        $this->response([
                            'status' => FALSE,
                            'code' => 401,
                            'message' => 'Mohon periksa data Anda'
                        ], \Restserver\Libraries\REST_Controller::HTTP_OK);
                    }

                    
                }
            }
            else
            {
                $this->response([
                    'status' => FALSE,
                    'code' => 401,
                    'message' => 'User tidak ditemukan'
                ], \Restserver\Libraries\REST_Controller::HTTP_OK);
            }
        }
        else
        {
            $this->response([
                    'status' => FALSE,
                    'code' => 401,
                    'message' => 'Mohon periksa data Anda'
                ], \Restserver\Libraries\REST_Controller::HTTP_OK);
        }

        
    }

}