<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username') && !$this->session->userdata('password') && !$this->session->userdata('role'))
		{
			return redirect()->to('Login');
		}
		header('Access-Control-Allow-Origin: *');
		$this->load->model('M_Booking','',true);
	}
	public function index()
	{
		if($this->session->userdata('role')==1){
			$this->load->view('dashboard/dashboard');
		}
		else{
			$data['booking'] = $this->M_Booking->get_data_booking()->result();
			$this->load->view('dashboard/dashboard_user', $data);
		}
		
	}
}
