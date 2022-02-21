<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dispensasi extends ADMIN_Controller {

	public function index()
	{
		$dispensasi = $this->Custom_model->getdispensasi();

		$data = array
				(
					'dispensasi' => $dispensasi
				);

		$this->load->view('admin/dispensasi/list', $data);
	}

	public function terima($id_dispensasi)
	{
		$update = array('status_dispensasi' => 'terima');

		$this->Custom_model->updatedata('tbl_dispensasi', $update, array('id_dispensasi' => $id_dispensasi));

		$this->session->set_flashdata('success', 'Dispensasi diterima');
    	redirect(base_url('admin/dispensasi'));
	}

	public function tolak($id_dispensasi)
	{
		$update = array('status_dispensasi' => 'tolak');

		$this->Custom_model->updatedata('tbl_dispensasi', $update, array('id_dispensasi' => $id_dispensasi));

		$this->session->set_flashdata('success', 'Dispensasi ditolak');
    	redirect(base_url('admin/dispensasi'));
	}
}