<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Pekerjaan extends REST_Controller
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

        $pekerjaan = $this->Custom_model->getdata('tbl_pekerjaan');

        $this->response([
                'status' => TRUE,
                'code' => 200,
                'message' => 'Ambil data pekerjaan berhasil',
                'data' => $pekerjaan
            ], \Restserver\Libraries\REST_Controller::HTTP_OK);
    }

}