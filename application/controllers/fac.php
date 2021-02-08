<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fac extends CI_Controller {

	public function index()
	{

		$this->load->view('fac_view');
	}
}