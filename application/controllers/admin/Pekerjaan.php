<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends ADMIN_Controller {

	public function index()
	{
		$pekerjaan = $this->Custom_model->getdata('tbl_pekerjaan');

		$data = array
				(
					'pekerjaan' => $pekerjaan
				);

		$this->load->view('admin/pekerjaan/list', $data);
	}

	public function store()
	{
		$post = $this->input->post(NULL, TRUE);

		$insert = array
				(
					'nama_pekerjaan' => $post['nama_pekerjaan']
				);

		$this->Custom_model->insertdata('tbl_pekerjaan', $insert);

		$this->session->set_flashdata('success', 'Pekerjaan Baru telah ditambahkan');
    	redirect(base_url('admin/pekerjaan'));
	}

	public function update()
	{
		$post = $this->input->post(NULL, TRUE);

		$update = array
				(
					'nama_pekerjaan' => $post['nama_pekerjaan']
				);

		$this->Custom_model->updatedata('tbl_pekerjaan', $update, array('id_pekerjaan' => $post['id_pekerjaan']));

		$this->session->set_flashdata('success', 'Pekerjaan telah diedit');
    	redirect(base_url('admin/pekerjaan'));
	}

}