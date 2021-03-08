<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Penumpang extends CI_Model {

	private $table = "penumpang";
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function save_penumpang($idParent, $idTiket, $nik, $nm, $umur, $alamat, $hp)
    {
        $data = array(
            'idParent'=>$idParent,
            'idTiket'=>$idTiket,
            'nik'=>$nik,
            'nama'=>$nm,
            'umur'=>$umur,
            'alamat'=>$alamat,
            'notelp'=>$hp
            // 'idUser'=>$this->session->userdata('iduser')
        );
        $this->db->insert($this->table, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
	
	
}
