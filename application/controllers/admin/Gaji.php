<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends ADMIN_Controller {

	public function index()
	{
		$gaji = $this->Custom_model->getdatagaji();
		$karyawan = $this->Custom_model->getdata('tbl_karyawan');

		$data = array
				(
					'gaji' => $gaji,
					'karyawan' => $karyawan
				);

		$this->load->view('admin/gaji/list', $data);
	}

	public function tambah()
	{
		$get = $this->input->get(NULL, TRUE);
		$karyawan = $this->Custom_model->getdatakaryawan($get['karyawan']);
		$totalharimasuk = $this->Custom_model->getlastgajian($get['karyawan']);

		if (empty($totalharimasuk)) 
		{
			$datemulaimasuk = $this->Custom_model->getdetail('tbl_absen', array('id_karyawan' => $get['karyawan'], 'status_absen' => 'masuk'));
			if (empty($datemulaimasuk)) 
			{
				$datemulaimasuk = $karyawan['tgl_terdaftar_karyawan'];
			}
			else
			{
				$datemulaimasuk = substr($datemulaimasuk['waktu_absen'], 0, 10);
			}
			
		}
		else
		{
			$datemulaimasuk = date('Y-m-d', strtotime( $totalharimasuk['waktu_gajian'] . " +1 days"));
		}

		$tglselesai = date('Y-m-d', strtotime( date('Y-m-d') . " +1 days"));
		$period = new DatePeriod(
                 new DateTime($datemulaimasuk),
                 new DateInterval('P1D'),
                 new DateTime($tglselesai)
            );
		$totalharikerja = 0;

		foreach ($period as $key => $value) 
		{
			$totalharikerja += 1;
		}

		$dataabsen = $this->Custom_model->getabsenkaryawan($get['karyawan'], $datemulaimasuk, $tglselesai);

		$totalmasuk = $this->Custom_model->getabsenkaryawan($get['karyawan'], $datemulaimasuk, $tglselesai, 'masuk');
		$totalizincuti = $this->Custom_model->getabsenkaryawan($get['karyawan'], $datemulaimasuk, $tglselesai, 'izin cuti');
		$totalizindispensasi = $this->Custom_model->getabsenkaryawan($get['karyawan'], $datemulaimasuk, $tglselesai, 'izin dispensasi');
		$totalalfa = $this->Custom_model->getabsenkaryawan($get['karyawan'], $datemulaimasuk, $tglselesai, 'alfa');
		

		$data = array
				(
					'karyawan' => $karyawan,
					'totalmasuk' => $totalmasuk,
					'totalizincuti' => $totalizincuti,
					'totalizindispensasi' => $totalizindispensasi,
					'totalalfa' => $totalalfa,
					'list_absen' => $dataabsen
				);

		$this->load->view('admin/gaji/tambah', $data);
	}

	public function store()
	{
		$post = $this->input->post(NULL, TRUE);

		$datakaryawan = $this->Custom_model->getdetail('tbl_karyawan', array('id_karyawan' => $post['id_karyawan']));

		$insert = array
				(
					'id_user' => $this->sess['id_user'],
					'id_karyawan' => $post['id_karyawan'],
					'nama_gaji' => $post['nama_gajian'],
					'catatan_gaji' => $post['catatan_gaji'],
					'gaji_seharusnya' => $datakaryawan['salary'],
					'gaji_diterima' => $post['nominal_gaji_diterima'],
					'waktu_gajian' => $post['waktu_gajian_karyawan'],
					'waktu_gajian_diterima' => $post['tgl_gaji_diterima'],
					'tgl_input' => date('Y-m-d H:i:s')
				);

		$this->Custom_model->insertdata('tbl_gaji', $insert);

		$this->session->set_flashdata('success', 'Gajian untuk karyawan telah ditambahkan');
    	redirect(base_url('admin/gaji/'));
	}
}