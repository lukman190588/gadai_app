<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends ADMIN_Controller {

	public function index()
	{
		$absensi = $this->Custom_model->getdataabsen();

		$data = array
				(
					'absensi' => $absensi
				);

		$this->load->view('admin/absensi/list', $data);
	}
}