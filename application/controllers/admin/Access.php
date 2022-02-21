<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends ADMIN_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$users = $this->Custom_model->getdata('tbl_user');

		$data = array
				(
					'users' => $users
				);

		$this->load->view('admin/access/list', $data);
	}

	public function add()
	{
		$this->load->view('admin/access/add');
	}

	public function detail($id_user)
	{
		$detail = $this->Custom_model->getdetail('tbl_user', array('id_user' => $id_user));

		$data = array
				(
					'detail' => $detail
				);

		$this->load->view('admin/access/detail', $data);
	}

	public function store()
	{
		$post = $this->input->post(NULL, TRUE);

		if (in_array_exist($this->sess['level'], 'super_admin') || in_array_exist($this->sess['level'], 'admin'))
		{
			$desa = 0;
			if (!empty($post['desa'])) 
			{
				$desa = $post['desa'];
			}

			$insert = array
					(
						'id_desa' => $desa,
						'password_user' => password_hash($post['no_hp'], PASSWORD_BCRYPT),
						'nama_user' => $post['nama'],
						'no_hp_user' => $post['no_hp'],
						'email_user' => $post['email'],
						'tgl_aktif' => date('Y-m-d'),
						'status_user' => 'aktif'
					);
		}

		if (in_array_exist($this->sess['level'], 'operator')) 
		{
			$insert = array
					(
						'password_user' => password_hash($post['nik'], PASSWORD_BCRYPT),
						'nama_user' => $post['nama'],
						'no_hp_user' => $post['no_hp'],
						'email_user' => $post['email'],
						'nik_user' => $post['nik'],
						'pekerjaan_user' => $post['pekerjaan'],
						'tgl_aktif' => date('Y-m-d'),
						'status_user' => 'aktif'
					);
		}

		$db = $this->Custom_model->insertdatafoto('tbl_user', 'id_user', 'foto_user', 'prof_pic', $insert, $post['level']);

		if ($db === TRUE) 
		{
			$this->session->set_flashdata('success', 'New Data has been added');
    		redirect(base_url('admin/access'));
		}
		else
		{
			$this->session->set_flashdata('error', $db);
    		redirect(base_url('admin/access/add'));
		}
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
