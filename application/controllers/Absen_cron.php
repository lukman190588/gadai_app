<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen_cron extends MY_Controller {

	public function absensi()
	{
		$karyawan = $this->Custom_model->getdata('tbl_karyawan');

		foreach ($karyawan as $key => $value) 
		{
			$checkabsenmasuk = $this->Custom_model->getdetail('tbl_absen', array('id_karyawan' => $value['id_karyawan'], 'DATE(waktu_absen)' => date('Y-m-d'), 'status_absen' => 'masuk'));

			$status_absen = 'alfa';
			if (empty($checkabsenmasuk)) 
			{
				$checkcuti = $this->Custom_model->getcutidetail($value['id_karyawan'], date('Y-m-d'));

				if (!empty($checkcuti)) 
				{
					if ($checkcuti['status_cuti'] == 'diterima') 
					{
						$status_absen = 'izin cuti';
					}
				}


				$checkizin = $this->Custom_model->getdispensasidetail($value['id_karyawan'], date('Y-m-d'));

				if (!empty($checkizin)) 
				{
					if ($checkizin['status_dispensasi'] == 'diterima') 
					{
						$status_absen = 'izin dispensasi';
					}
				}

				$insertabsen = array
							(
								'id_karyawan' => $value['id_karyawan'],
								'waktu_absen' => date('Y-m-d').' 00:00:00',
								'status_absen' => $status_absen
							);

				$this->Custom_model->insertdata('tbl_absen', $insertabsen);
			}
		}
	}
}
