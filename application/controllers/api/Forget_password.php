<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Forget_password extends REST_Controller
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

        if (!empty($post['email']))
        {
            $finduser = $this->Custom_model->getdetail('tbl_karyawan', array('email_karyawan' => $post['email']));

            if (!empty($finduser)) 
            {
                $str = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890';
                $gen = str_shuffle($str);
                $newpass = substr($gen, 0, 6);

                $expireddate = date('Y-m-d H:i:s', strtotime( date('Y-m-d H:i:s') . " +1 days"));

                $insertpass = array
                            (
                                'id_karyawan' => $finduser['id_karyawan'],
                                'password_temp' => $newpass,
                                'expired_date' => $expireddate
                            );

                $this->Custom_model->insertdata('tbl_password_temp', $insertpass);

                $this->load->library("phpmailer_library");
                $mail = $this->phpmailer_library->load();
                $mail->Host = "mail.fabakonsultan.com";
                $mail->isSMTP();
                $mail->SMTPOptions = array(
                                     'ssl' => array(
                                     'verify_peer' => false,
                                     'verify_peer_name' => false,
                                     'allow_self_signed' => true
                                                    )
                                            );
                $mail->SMTPAuth = TRUE;
                $mail->Username = 'dev@fabakonsultan.com';
                $mail->Password = 'devfaba2021';
                $mail->SMTPSecure = "ssl";
                $mail->Port = 465;

                $mail->addAddress($post['email']);
                $mail->setFrom('dev@fabakonsultan.com');

                $mail->Subject = 'Reset Password';
                $mail->isHTML(TRUE);

                $mail->Body = 'Password baru Anda: <b>'.$newpass."</b>";

                $mail->send();

                $this->response([
                        'status' => TRUE,
                        'code' => 200,
                        'message' => 'Mohon periksa Email Anda untuk melihat password baru'
                    ], \Restserver\Libraries\REST_Controller::HTTP_OK);
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