<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends ADMIN_Controller {

	public function index()
	{
		$karyawan = $this->Custom_model->getdatakaryawan();

		$data = array
				(
					'karyawan' => $karyawan
				);

		$this->load->view('admin/karyawan/list', $data);
	}

	public function add()
	{
		$data = array
				(
					'pekerjaan' => $this->Custom_model->getdata('tbl_pekerjaan')
				);

		$this->load->view('admin/karyawan/add', $data);
	}

	public function edit($id_karyawan)
	{
		$data = array
				(
					'karyawan' => $this->Custom_model->getdetail('tbl_karyawan', array('id_karyawan' => $id_karyawan)),
					'pekerjaan' => $this->Custom_model->getdata('tbl_pekerjaan')
				);

		$this->load->view('admin/karyawan/edit', $data);
	}

	public function detail($id_karyawan)
	{
		$detail = $this->Custom_model->getdetail('tbl_karyawan', array('id_karyawan' => $id_karyawan));
		$pekerjaan = $this->Custom_model->getdetail('tbl_pekerjaan', array('id_pekerjaan' => $detail['id_pekerjaan']));

		$data = array
				(
					'detail' => $detail,
					'pekerjaan' => $pekerjaan
				);

		$this->load->view('admin/karyawan/detail', $data);
	}

	public function store()
	{
		$post = $this->input->post(NULL, TRUE);

		$insert = array
				(
					'id_pekerjaan' => $post['id_pekerjaan'],
					'nama_karyawan' => $post['nama_karyawan'],
					'nik_karyawan' => $post['nik_karyawan'],
					'no_telp_karyawan' => $post['no_telp_karyawan'],
					'alamat_karyawan' => $post['alamat_karyawan'],
					'unit_kerja' => $post['unit_kerja'],
					'alamat_unit' => $post['alamat_unit'],
					'jabatan' => $post['jabatan'],
					'atasan_langsung' => $post['atasan_langsung'],
					'tgl_bergabung' => $post['tgl_bergabung'],
					'email_karyawan' => $post['email_karyawan'],
					'password_karyawan' => password_hash($post['nik_karyawan'], PASSWORD_BCRYPT),
					'status_karyawan' => 'aktif',
					'salary' => $post['salary'],
					'tgl_terdaftar_karyawan' => date('Y-m-d')
				);

		$this->Custom_model->insertdata('tbl_karyawan', $insert);

		$this->session->set_flashdata('success', 'Karyawan baru telah ditambahkan');
    	redirect(base_url('admin/karyawan/'));
	}

	public function update()
	{
		$post = $this->input->post(NULL, TRUE);

		$insert = array
				(
					'id_pekerjaan' => $post['id_pekerjaan'],
					'nama_karyawan' => $post['nama_karyawan'],
					'nik_karyawan' => $post['nik_karyawan'],
					'no_telp_karyawan' => $post['no_telp_karyawan'],
					'alamat_karyawan' => $post['alamat_karyawan'],
					'unit_kerja' => $post['unit_kerja'],
					'alamat_unit' => $post['alamat_unit'],
					'jabatan' => $post['jabatan'],
					'atasan_langsung' => $post['atasan_langsung'],
					'tgl_bergabung' => $post['tgl_bergabung'],
					'email_karyawan' => $post['email_karyawan'],
					'salary' => $post['salary']
				);

		$this->Custom_model->updatedata('tbl_karyawan', $insert, array('id_karyawan' => $post['id_karyawan']));

		$this->session->set_flashdata('success', 'Karyawan telah diupdate');
    	redirect(base_url('admin/karyawan/detail/').$post['id_karyawan']);
	}

	public function update_pic()
	{
		$post = $this->input->post(NULL, TRUE);

		$db = $this->Custom_model->editfotoprofil($post['id_user']);

		$getnewfoto = $this->Custom_model->getdetail('tbl_user', array('id_user' => $this->sess['id_user']));

		$newfoto = array('foto_user' => base_url().$getnewfoto['foto_user']);
		$this->session->set_userdata($newfoto);

		if ($db === TRUE) 
		{
			$this->session->set_flashdata('success', 'Data has been edited');
    		redirect(base_url('admin/access/detail/').$post['id_user']);
		}
		else
		{
			$this->session->set_flashdata('error', $db);
    		redirect(base_url('admin/access/detail/').$post['id_user']);
		}
	}

	public function edit_pass()
	{
		$post = $this->input->post(NULL, TRUE);

		$checkpasslama = $this->Custom_model->getdetail('tbl_user', array('id_user' => $post['id_user']));

		if (password_verify($post['password_lama'], $checkpasslama['password_user'])) 
		{
			if ($post['password_baru'] == $post['password_conf']) 
			{
				$updatepass = array
							(
								'password_user' => password_hash($post['password_baru'], PASSWORD_BCRYPT)
							);
				$this->Custom_model->updatedata('tbl_user', $updatepass, array('id_user' => $post['id_user']));

				$this->session->set_flashdata('success', 'Password has been edited');
    			redirect(base_url('admin/access/detail/').$post['id_user']);
			}
			else
			{
				$this->session->set_flashdata('error', 'Please confirm your password');
    			redirect(base_url('admin/access/detail/').$post['id_user']);
			}
		}
		else
		{
			$this->session->set_flashdata('error', 'The old password seems wrong');
    		redirect(base_url('admin/access/detail/').$post['id_user']);
		}
	}
}
