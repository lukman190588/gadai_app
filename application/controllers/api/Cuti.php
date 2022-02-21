<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Cuti extends REST_Controller
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

        if (!empty($post['id_karyawan']) || !empty($post['tgl_cuti_mulai']) || !empty($post['tgl_cuti_selesai']) || !empty($post['alasan_cuti'])) 
        {
            $insertcuti = array
                        (
                            'id_user' => 0,
                            'id_karyawan' => $post['id_karyawan'],
                            'tgl_pengajuan' => date('Y-m-d'),
                            'tgl_cuti_mulai' => $post['tgl_cuti_mulai'],
                            'tgl_cuti_selesai' => $post['tgl_cuti_selesai'],
                            'alasan_cuti' => $post['alasan_cuti'],
                            'status_cuti' => 'pengajuan'
                        );

            $id_cuti = $this->Custom_model->insertdata('tbl_cuti', $insertcuti);

            if ($post['tgl_cuti_mulai'] == $post['tgl_cuti_selesai']) 
            {
                $insertcutitgl = array
                                (
                                    'id_cuti' => $id_cuti,
                                    'id_karyawan' => $post['id_karyawan'],
                                    'tgl_cuti' => $post['tgl_cuti_selesai'] 
                                );

                $this->Custom_model->insertdata('tbl_cuti_tgl', $insertcutitgl);
            }
            else
            {
                $tglselesai = date('Y-m-d', strtotime( $post['tgl_cuti_selesai'] . " +1 days"));
                $period = new DatePeriod(
                     new DateTime($post['tgl_cuti_mulai']),
                     new DateInterval('P1D'),
                     new DateTime($tglselesai)
                );

                $insertcutitgl = array();

                foreach ($period as $key => $value) 
                {
                    $insertcutitgl[] = array
                                        (
                                            'id_cuti' => $id_cuti,
                                            'id_karyawan' => $post['id_karyawan'],
                                            'tgl_cuti' => $value->format('Y-m-d')       
                                        );
                }

                $this->Custom_model->insertdata('tbl_cuti_tgl', $insertcutitgl, false, true);
            }

            $this->response([
                        'status' => TRUE,
                        'code' => 200,
                        'message' => 'Permohonan cuti berhasil, mohon menunggu konfirmasi'
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
            $cuti = $this->Custom_model->getcutikaryawanapi($post['id_karyawan']);

            $this->response([
                    'status' => TRUE,
                    'code' => 200,
                    'message' => 'Data cuti berhasil didapat',
                    'data' => $cuti
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