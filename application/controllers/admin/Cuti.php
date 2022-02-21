<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends ADMIN_Controller {

	public function index()
	{
		$cuti = $this->Custom_model->getcuti();

		$data = array
				(
					'cuti' => $cuti
				);

		$this->load->view('admin/cuti/list', $data);
	}

	public function terima($id_cuti)
	{
		$update = array('status_cuti' => 'terima');

		$this->Custom_model->updatedata('tbl_cuti', $update, array('id_cuti' => $id_cuti));

		$this->session->set_flashdata('success', 'Cuti diterima');
    	redirect(base_url('admin/cuti'));
	}

	public function tolak($id_cuti)
	{
		$update = array('status_cuti' => 'tolak');

		$this->Custom_model->updatedata('tbl_cuti', $update, array('id_cuti' => $id_cuti));

		$this->session->set_flashdata('success', 'Cuti ditolak');
    	redirect(base_url('admin/cuti'));
	}
}