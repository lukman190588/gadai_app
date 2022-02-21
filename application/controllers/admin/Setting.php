<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends ADMIN_Controller {

	public function location()
	{
		$location = $this->Custom_model->getdetail('tbl_setting', array('nama_setting' => 'location'));

		$data = array
				(
					'location' => $location
				);

		$this->load->view('admin/setting/location', $data);
	}

	public function update_location()
	{
		$post = $this->input->post(NULL, TRUE);

		$update = array
				(
					'isi_setting' => $post['alamat'],
					'latitude' => $post['lat'],
					'longitude' => $post['lon']
				);

		$this->Custom_model->updatedata('tbl_setting', $update, array('nama_setting' => 'location'));

		$this->session->set_flashdata('success', 'Lokasi telah diupdate');
    	redirect(base_url('admin/setting/location'));
	}

	public function hari_masuk()
	{
		$hari_masuk = $this->Custom_model->getdata('tbl_hari_masuk');

		$data = array
				(
					'hari_masuk' => $hari_masuk
				);

		$this->load->view('admin/setting/hari_masuk', $data);
	}

	public function update_hari_masuk()
	{
		$post = $this->input->post(NULL, TRUE);
		$hari_masuk = $this->Custom_model->getdata('tbl_hari_masuk');

		foreach ($hari_masuk as $key => $value) 
		{
			$no_hari = $value['no_hari'];
			$newstat = 0;
			if (!empty($post['hari'.$no_hari])) 
			{
				$newstat = 1;
			}

			$this->Custom_model->updatedata('tbl_hari_masuk', array('status_masuk' => $newstat), array('id_hari_masuk' => $value['id_hari_masuk']));
		}
		
		$this->session->set_flashdata('success', 'Hari masuk telah diupdate');
  		redirect(base_url('admin/setting/hari_masuk'));
	}
}
