<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model {

	private $table = "user";
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	
	public function processLogin($username, $password)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get();
	}

	public function cekuser($username)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('username', $username);
		return $this->db->get();
	}

	public function save_user($username, $password)
	{
		$data = array(
            'username'=>$username,
            'password'=>$password,
			'role'=>'0'
        );
        $this->db->insert($this->table, $data);
        return true;
	}

	public function save_detail($id, $nik, $nmdp, $nmbl, $tmpt, $tgl, $hp, $alamat)
	{
		$data = array(
            'iduser'=>$id,
            'nik'=>$nik,
			'firstName'=>$nmdp,
			'lastName'=>$nmbl,
			'tmpt_lahir'=>$tmpt,
			'tgl_lahir'=>$tgl,
			'nohp'=>$hp,
			'alamat'=>$alamat
        );
        $this->db->insert('detail_user', $data);
        return true;
	}
}
