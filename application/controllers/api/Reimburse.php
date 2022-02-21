<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Reimburse extends REST_Controller
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

        $reimburse = $this->Custom_model->getdatareimburse($post['id_karyawan']);

        $this->response([
                'status' => FALSE,
                'code' => 401,
                'message' => 'Mohon periksa data Anda',
                'data' => $reimburse
            ], \Restserver\Libraries\REST_Controller::HTTP_OK);
    }

    public function pengajuan_post()
    {
        $post = $this->input->post(NULL, TRUE);

        if (!empty($post['id_karyawan']) || !empty($post['jenis_klaim'])) 
        {
            $insertreimburse = array
                        (
                            'id_user' => 0,
                            'id_karyawan' => $post['id_karyawan'],
                            'jenis_klaim' => $post['jenis_klaim'],
                            'tgl_pengajuan' => $post['tgl_pengajuan'],
                            'tgl_berkas' => $post['tgl_berkas'],
                            'nominal_reimburse' => $post['nominal_reimburse'],
                            'file_reimburse' => '',
                            'tgl_reimburse' => '',
                            'status_reimburse' => 'pengajuan'
                        );

            $db = $this->Custom_model->insertdatafoto('tbl_reimburse', 'id_reimburse', 'file_reimburse', 'reimburse', $insertreimburse);

            $this->response([
                        'status' => TRUE,
                        'code' => 200,
                        'message' => 'Permohonan reimburse berhasil, mohon menunggu konfirmasi'
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