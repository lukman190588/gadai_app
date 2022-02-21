<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Karyawan extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('template_helper'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Custom_model');
    }

    public function daftar_post()
    {
        $post = $this->input->post(NULL, TRUE);

        $karyawan = $this->Custom_model->getdatakaryawan();

        $data = array();
        foreach ($karyawan as $key => $value) 
        {
            $data[] = array
                (
                    'nama_karyawan' => $value['nama_karyawan'],
                    'nama_pekerjaan' => $value['nama_pekerjaan'],
                    'status_karyawan' => $value['status_karyawan']
                );
        }

        $this->response([
                'status' => TRUE,
                'code' => 200,
                'message' => 'Ambil data karyawan berhasil',
                'data' => $data
            ], \Restserver\Libraries\REST_Controller::HTTP_OK);

        
    }

}