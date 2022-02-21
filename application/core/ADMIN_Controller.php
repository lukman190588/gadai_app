<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ADMIN_Controller extends MY_Controller{

	function __construct()
	{
		parent::__construct();
		$this->site->is_logged_in();

		$this->sess = $this->session->userdata();
	}
}