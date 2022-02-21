<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Absen extends REST_Controller
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

        if (!empty($post['id_karyawan'])) 
        {
            $cekabsen = $this->Custom_model->absenkaryawanapi($post['id_karyawan']);

            $this->response([
                    'status' => TRUE,
                    'code' => 200,
                    'message' => 'Data absen berhasil didapat',
                    'data' => $cekabsen
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

    public function masuk_post()
    {
        $post = $this->input->post(NULL, TRUE);

        if (!empty($post['id_karyawan'] || !empty($post['waktu_absen']))) 
        {
            $hari = date('l', strtotime(date('Y-m-d')));
            $harilibur = $this->Custom_model->getdetail('tbl_hari_masuk', array('nama_hari_en' => $hari));

            if ($harilibur['status_masuk'] == 1) 
            {
                $cekabsen = $this->Custom_model->getdetail('tbl_absen', array('id_karyawan' => $post['id_karyawan'], 'DATE(waktu_absen)' => substr($post['waktu_absen'], 0, 10), 'status_absen' => 'masuk'));

                if (empty($cekabsen)) 
                {
                    $insert = array
                        (
                            'id_karyawan' => $post['id_karyawan'],
                            'lat_absen' => $post['latitude'],
                            'long_absen' => $post['longitude'],
                            'waktu_absen' => $post['waktu_absen'],
                            'status_absen' => 'masuk'
                        );

                    $this->Custom_model->insertdata('tbl_absen', $insert);
                }

                $this->response([
                        'status' => TRUE,
                        'code' => 200,
                        'message' => 'Absen masuk berhasil'
                    ], \Restserver\Libraries\REST_Controller::HTTP_OK);
            }
            else
            {
                $this->response([
                        'status' => TRUE,
                        'code' => 200,
                        'message' => 'Hari ini libur, mohon absen dihari lain'
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

    public function keluar_post()
    {
        $post = $this->input->post(NULL, TRUE);

        if (!empty($post['id_karyawan'] || !empty($post['waktu_absen']))) 
        {
            $cekabsenmasuk = $this->Custom_model->getdetail('tbl_absen', array('id_karyawan' => $post['id_karyawan'], 'DATE(waktu_absen)' => substr($post['waktu_absen'], 0, 10), 'status_absen' => 'masuk'));

            if (!empty($cekabsenmasuk)) 
            {
                $cekabsenkeluar = $this->Custom_model->getdetail('tbl_absen', array('id_karyawan' => $post['id_karyawan'], 'DATE(waktu_absen)' => substr($post['waktu_absen'], 0, 10), 'status_absen' => 'keluar'));

                if (empty($cekabsenkeluar)) 
                {
                    $insert = array
                    (
                        'id_karyawan' => $post['id_karyawan'],
                        'lat_absen' => $post['latitude'],
                        'long_absen' => $post['longitude'],
                        'waktu_absen' => $post['waktu_absen'],
                        'status_absen' => 'keluar'
                    );

                    $this->Custom_model->insertdata('tbl_absen', $insert);
                }

                $this->response([
                    'status' => TRUE,
                    'code' => 200,
                    'message' => 'Absen keluar berhasil'
                ], \Restserver\Libraries\REST_Controller::HTTP_OK);             
            }
            
            $this->response([
                        'status' => FALSE,
                        'code' => 401,
                        'message' => 'Mohon Absen masuk terlebih dahulu'
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