<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		header('Access-Control-Allow-Origin: *');
		$this->load->model('M_Login','',true);
		$this->load->model('M_Booking','',true);
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function process_login()
	{
		$username = htmlentities($this->input->post('username'),ENT_QUOTES, "UTF-8");
		$password = htmlentities(md5($this->input->post('password')),ENT_QUOTES, "UTF-8");
		$cek = $this->M_Login->processLogin($username, $password);

		if($cek->num_rows() <> 1){echo json_encode(array('status'=>'failed','token'=>$this->security->get_csrf_hash()));}
		else
		{
			foreach($cek->result() as $k=>$v)
			{
				$session_data = array(
					'iduser'  	=> $v->id,
					'username' 	=> $v->username,
					'password' 	=> $v->password,
					'role' 		=> $v->role
				);
				$this->session->set_userdata($session_data);
			}
			echo json_encode(array('status'=>'success','token'=>$this->security->get_csrf_hash()));
		}

	}

	public function save_registrasi()
	{
		$username = htmlentities($this->input->post('username'),ENT_QUOTES, "UTF-8");
		$password = htmlentities(md5($this->input->post('password')),ENT_QUOTES, "UTF-8");

		$nik = htmlentities($this->input->post('nik'),ENT_QUOTES, "UTF-8");
		$username = htmlentities($this->input->post('username'),ENT_QUOTES, "UTF-8");
		$password = htmlentities(md5($this->input->post('password')),ENT_QUOTES, "UTF-8");
		$nmdp = htmlentities($this->input->post('nmdp'),ENT_QUOTES, "UTF-8");
		$nmbl = htmlentities($this->input->post('nmbl'),ENT_QUOTES, "UTF-8");
		$tmpt = htmlentities($this->input->post('tmpt'),ENT_QUOTES, "UTF-8");
		$tgl = htmlentities($this->input->post('tgl'),ENT_QUOTES, "UTF-8");
		$hp = htmlentities($this->input->post('hp'),ENT_QUOTES, "UTF-8");
		$alamat =htmlentities($this->input->post('alamat'),ENT_QUOTES, "UTF-8");

		
		$cek = $this->M_Login->cekuser($username);

		if($cek->num_rows() > 0){echo json_encode(array('status'=>'exist','token'=>$this->security->get_csrf_hash()));}
		else
		{
			$saveuser = $this->M_Login->save_user($username, $password);
			if($saveuser)
			{
				// $saveuser = $this->M_Login->save_detail($nik, $username, $password, $nmdp, $nmbl, $tmpt, $tgl, $hp, $alamat);
				$cekuser = $this->M_Login->cekuser($username);
				$id = "";
				foreach($cekuser->result() as $k=>$v){$id = $v->id;}
				$savedetail = $this->M_Login->save_detail($id, $nik, $nmdp, $nmbl, $tmpt, $tgl, $hp, $alamat);
				if($savedetail){
					echo json_encode(array('status'=>'success','token'=>$this->security->get_csrf_hash()));
				}
				else{echo json_encode(array('status'=>'failed','token'=>$this->security->get_csrf_hash()));}

			}
			else{
				echo json_encode(array('status'=>'failed','token'=>$this->security->get_csrf_hash()));
			}
		}

	}

	public function logout()
	{
		$this->session->sess_destroy();
		return redirect()->to('Login');
	}

	public function cari($kd)
	{
		$cari = $this->M_Booking->cari_booking($kd)->result();
		echo json_encode(array('status'=>'success','data'=>$cari));

	}
}
