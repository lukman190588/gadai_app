<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends ADMIN_Controller {

	public function index()
	{
		$berita = $this->Custom_model->getdata('tbl_berita');

		$data = array
				(
					'berita' => $berita
				);

		$this->load->view('admin/berita/list', $data);
	}
}
