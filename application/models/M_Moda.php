<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Moda extends CI_Model {

	private $table = "moda";
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	
	public function save_moda($jenis_moda, $no_moda)
    {
        $data = array(
            'jenisModa'=>$jenis_moda,
            'nomorModa'=>$no_moda
        );
        $this->db->insert($this->table, $data);
        return true;
    }

    public function hapus_moda($idModa)
    {
        $this->db->delete($this->table, array('idModa'=>$idModa));
        return true;
    }

    public function update_moda($id, $jenis_moda, $no_moda)
    {
        $array =array(
            'jenisModa'=>$jenis_moda,
            'nomorModa'=>$no_moda
        );
        $this->db->set($array);
        $this->db->where('idModa', $id);
        $this->db->update($this->table);
        return true;
    }

    public function get_data()
    {   
        $this->db->order_by('nomorModa','ASC');
        return $this->db->get($this->table);
    }
}
