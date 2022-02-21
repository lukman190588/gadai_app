<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Dispensasi extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('template_helper'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Custom_model');
    }

    public function request_post()
    {
        $post = $this->input->post(NULL, TRUE);

        if (!empty($post['id_karyawan']) || !empty($post['tgl_dispensasi_mulai']) || !empty($post['tgl_dispensasi_selesai']) || !empty($post['jenis_dispensasi']))
        {
            $insertdispensasi = array
                        (
                            'id_user' => 0,
                            'id_karyawan' => $post['id_karyawan'],
                            'tgl_pengajuan' => date('Y-m-d'),
                            'tgl_mulai' => $post['tgl_mulai'],
                            'tgl_selesai' => $post['tgl_selesai'],
                            'jenis_dispensasi' => $post['jenis_dispensasi'],
                            'keterangan_dispensasi' => $post['keterangan_dispensasi'],
                            'file_dispensasi' => '',
                            'status_dispensasi' => 'pengajuan'
                        );

            $db = $this->Custom_model->insertdatafoto('tbl_dispensasi', 'id_dispensasi', 'file_dispensasi', 'dispensasi', $insertdispensasi);

            if ($post['tgl_mulai'] == $post['tgl_selesai']) 
            {
                $insertcutitgl = array
                                (
                                    'id_dispensasi' => $db,
                                    'id_karyawan' => $post['id_karyawan'],
                                    'tgl_dispensasi' => $post['tgl_selesai']
                                );

                $this->Custom_model->insertdata('tbl_dispensasi_tgl', $insertcutitgl);
            }
            else
            {
                $tglselesai = date('Y-m-d', strtotime( $post['tgl_selesai'] . " +1 days"));
                $period = new DatePeriod(
                     new DateTime($post['tgl_mulai']),
                     new DateInterval('P1D'),
                     new DateTime($tglselesai)
                );

                $insertdispensasitgl = array();
                foreach ($period as $key => $value) 
                {
                    $insertdispensasitgl[$key] = array
                                        (
                                            'id_dispensasi' => $db,
                                            'id_karyawan' => $post['id_karyawan'],
                                            'tgl_dispensasi' => $value->format('Y-m-d')
                                        );
                }

                $this->Custom_model->insertdata('tbl_dispensasi_tgl', $insertdispensasitgl, false, true);
            }

            $this->response([
                        'status' => TRUE,
                        'code' => 200,
                        'message' => 'Permohonan Dispensasi berhasil, mohon menunggu konfirmasi'
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

    public function daftar_post()
    {
        $post = $this->input->post(NULL, TRUE);

        if (!empty($post['id_karyawan'])) 
        {
            $dispensasi = $this->Custom_model->getdispensasi($post['id_karyawan']);

            $this->response([
                    'status' => TRUE,
                    'code' => 200,
                    'message' => 'Data dispensasi berhasil didapat',
                    'data' => $dispensasi
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