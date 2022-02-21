<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Location extends REST_Controller
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

        $getlocation = $this->Custom_model->getdetail('tbl_setting', array('nama_setting' => 'location'));

        $output = array
                (
                    'alamat' => $getlocation['isi_setting'],
                    'latitude' => $getlocation['latitude'],
                    'longitude' => $getlocation['longitude']
                );

            $this->response([
                    'status' => TRUE,
                    'code' => 200,
                    'message' => 'Ambil data lokasi berhasil',
                    'data' => $output
                ], \Restserver\Libraries\REST_Controller::HTTP_OK);

        
    }

}