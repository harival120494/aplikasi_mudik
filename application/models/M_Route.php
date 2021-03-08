<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Route extends CI_Model {

	private $table = "rute";
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	
	public function save_route($moda, $kode_rute, $prov_asal, $kota_asal, $prov_tujuan, $kota_tujuan, $slot, $tanggal, $jam)
    {
        $data = array(
            'idModa'=>$moda,
            'kodeRute'=>$kode_rute,
            'provinsiAsal'=>$prov_asal,
            'kotaAsal'=>$kota_asal,
            'provinsiTujuan'=>$prov_tujuan,
            'kotaTujuan'=>$kota_tujuan,
            'jumlahSlot'=>$slot,
            'tglBerangkat'=>$tanggal,
            'jamBerangkat'=>$jam,
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
        $query = "SELECT r.*, moda.jenisModa, moda.nomorModa, t.booked, (r.jumlahSlot - t.booked) as sisa
                    FROM rute as r
                    left JOIN(
                        select count(t.idRute)as booked , t.idRute 
                        from tiket as t 
                        group by t.idRute
                    ) t ON r.idRute=t.idRute
                    left join moda ON moda.idModa = r.idModa
                    GROUP by r.idRute";
        return $this->db->query($query);
    }
}
