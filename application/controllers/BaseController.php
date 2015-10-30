<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseController extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->data = array();
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$this->data['user'] = $session_data;
			$this->data['cart'] = $this->session->userdata('cart');
		}
	}
}