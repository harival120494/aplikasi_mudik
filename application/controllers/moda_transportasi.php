<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Moda_Transportasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username') && !$this->session->userdata('password') && !$this->session->userdata('role'))
		{
			return redirect()->to('Login');
		}
		header('Access-Control-Allow-Origin: *');
		$this->load->model('M_Moda','',true);
	}
	public function index()
	{
		$this->load->view('moda_transportasi/moda_transportasi');
	}

	public function save_moda()
	{
		$jenis_moda = htmlentities($this->input->post('jenis_moda'),ENT_QUOTES, "UTF-8");
		$no_moda 	= htmlentities($this->input->post('no_moda'),ENT_QUOTES, "UTF-8");
		$save = $this->M_Moda->save_moda($jenis_moda, $no_moda);

		if($save){echo json_encode(array('status'=>'success','token'=>$this->security->get_csrf_hash()));}
		else{echo json_encode(array('status'=>'failed','token'=>$this->security->get_csrf_hash()));}
	}

	public function hapus_moda()
	{
		$idModa = htmlentities($this->input->post('idModa'),ENT_QUOTES, "UTF-8");
		$hapus = $this->M_Moda->hapus_moda($idModa);

		if($hapus){echo json_encode(array('status'=>'success','token'=>$this->security->get_csrf_hash()));}
		else{echo json_encode(array('status'=>'failed','token'=>$this->security->get_csrf_hash()));}
	}

	public function update_moda()
	{
		$id_moda 	= htmlentities($this->input->post('id_moda'),ENT_QUOTES, "UTF-8");
		$jenis_moda = htmlentities($this->input->post('jenis_moda'),ENT_QUOTES, "UTF-8");
		$no_moda 	= htmlentities($this->input->post('no_moda'),ENT_QUOTES, "UTF-8");
		$save = $this->M_Moda->update_moda($id_moda, $jenis_moda, $no_moda);

		if($save){echo json_encode(array('status'=>'success','token'=>$this->security->get_csrf_hash()));}
		else{echo json_encode(array('status'=>'failed','token'=>$this->security->get_csrf_hash()));}
	}

	public function get_data_moda()
	{
		$data = $this->M_Moda->get_data()->result();
		$dataarr = array();
		foreach($data as $k=>$v)
		{
			$dataarr[] = array(
				'no'=>$k+=1,
				'moda'=>$v->jenisModa,
				'nomorModa'=>$v->nomorModa,
				'aksi'=>'<span class="btn btn-sm btn-success" style="cursor:pointer;" onclick=edit('.$v->idModa.',"'.$v->jenisModa.'","'.$v->nomorModa.'")><i class="fa fa-edit"></i> Edit</span> 
						 <span class="btn btn-sm btn-dark" style="cursor:pointer;" onclick="hapus('.$v->idModa.')"><i class="fa fa-trash"></i> Hapus</span>'
			);
		}
		echo json_encode(array('data'=>$dataarr));
	}
}
