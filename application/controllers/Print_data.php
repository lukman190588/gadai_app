<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Print_data extends MY_Controller {

	public function absen_print($id_karyawan)
	{
		$karyawan = $this->Custom_model->getdetail('tbl_karyawan', array('id_karyawan' => $id_karyawan));
		$absen = $this->Custom_model->absenkaryawanapi($id_karyawan);

		$data = array
				(
					'karyawan' => $karyawan,
					'absen' => $absen
				);

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
	    $this->pdf->filename = "laporan-absen.pdf";
	    $this->pdf->load_view('print/print_absen', $data);
	}

	public function absen_cuti($id_karyawan)
	{
		$karyawan = $this->Custom_model->getdetail('tbl_karyawan', array('id_karyawan' => $id_karyawan));
		$cuti = $this->Custom_model->getdata('tbl_cuti', array('id_karyawan' => $id_karyawan));

		$data = array
				(
					'karyawan' => $karyawan,
					'cuti' => $cuti
				);

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
	    $this->pdf->filename = "laporan-cuti.pdf";
	    $this->pdf->load_view('print/print_cuti', $data);
	}

	public function dispensasi($id_karyawan)
	{
		$karyawan = $this->Custom_model->getdetail('tbl_karyawan', array('id_karyawan' => $id_karyawan));
		$dispensasi = $this->Custom_model->getdata('tbl_dispensasi', array('id_karyawan' => $id_karyawan));

		$data = array
				(
					'karyawan' => $karyawan,
					'dispensasi' => $dispensasi
				);

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
	    $this->pdf->filename = "laporan-dispensasi.pdf";
	    $this->pdf->load_view('print/print_dispensasi', $data);
	}

	public function data_karyawan()
	{
		$karyawan = $this->Custom_model->getdatakaryawan();

		$data = array
				(
					'karyawan' => $karyawan
				);

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
	    $this->pdf->filename = "laporan-karyawan.pdf";
	    $this->pdf->load_view('print/print_karyawan', $data);
	}

	public function data_gaji($id_karyawan)
	{
		$gaji = $this->Custom_model->getdata('tbl_gaji', array('id_karyawan' => $id_karyawan));
		$karyawan = $this->Custom_model->getdetail('tbl_karyawan', array('id_karyawan' => $id_karyawan));

		$data = array
				(
					'gaji' => $gaji,
					'karyawan' => $karyawan
				);

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
	    $this->pdf->filename = "laporan-gaji.pdf";
	    $this->pdf->load_view('print/print_gaji', $data);
	}

	public function detail_gaji($id_gaji)
	{
		$gaji = $this->Custom_model->getdetail('tbl_gaji', array('id_gaji' => $id_gaji));
		$karyawan = $this->Custom_model->getdetail('tbl_karyawan', array('id_karyawan' => $gaji['id_karyawan']));
		$pekerjaan = $this->Custom_model->getdetail('tbl_pekerjaan', array('id_pekerjaan' => $karyawan['id_pekerjaan']));

		$potongan = $gaji['gaji_seharusnya'] - $gaji['gaji_diterima'];

		$data = array
				(
					'gaji' => $gaji,
					'karyawan' => $karyawan,
					'pekerjaan' => $pekerjaan,
					'potongan' => $potongan
				);

		$this->load->library('pdf');
		$this->pdf->setPaper('A5', 'potrait');
	    $this->pdf->filename = "laporan-gaji-detail.pdf";
	    $this->pdf->load_view('print/print_gaji_detail', $data);

	    foreach ($menu as $key => $mnu) {
	    	// code...
	    }
	}
}