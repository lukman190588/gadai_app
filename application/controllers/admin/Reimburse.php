<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reimburse extends ADMIN_Controller {

	public function index()
	{
		$reimburse = $this->Custom_model->getdatareimburse();

		$data = array
				(
					'reimburse' => $reimburse
				);

		$this->load->view('admin/reimburse/list', $data);
	}

	public function terima($id_reimburse)
	{
		$update = array('status_reimburse' => 'selesai');

		$this->Custom_model->updatedata('tbl_reimburse', $update, array('id_reimburse' => $id_reimburse));

		$this->session->set_flashdata('success', 'Reimburse diterima');
    	redirect(base_url('admin/reimburse'));
	}

	public function tolak($id_reimburse)
	{
		$update = array('status_reimburse' => 'tolak');

		$this->Custom_model->updatedata('tbl_reimburse', $update, array('id_reimburse' => $id_reimburse));

		$this->session->set_flashdata('success', 'Reimburse ditolak');
    	redirect(base_url('admin/reimburse'));
	}
}