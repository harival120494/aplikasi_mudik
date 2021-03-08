<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Booking extends CI_Model {

	private $table = "booking";
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function save_booking($kdBooking, $tglBooking, $idTiket)
    {
        $data = array(
            'kdBooking'=>$kdBooking,
            'tglBooking'=>$tglBooking,
            'sttKonf'=>0,
            'tglKonf'=>'',
            'confBy'=>'',
            'idTiket'=>$idTiket,
            'idUser'=>$this->session->userdata('iduser')
        );
        $this->db->insert($this->table, $data);
        $insert_id = $this->db->insert_id();
        return true;
    }

    public function conf_booking($kdBooking, $idTiket)
    {
        $data = array(
            'kdBooking'=>$kdBooking,
            'tglBooking'=>'',
            'sttKonf'=>1,
            'tglKonf'=>date('Y-m-d H:i:s'),
            'confBy'=>'System',
            'idTiket'=>$idTiket,
            'idUser'=>$this->session->userdata('iduser')
        );
        $this->db->insert($this->table, $data);
        return true;
    }

    public function tolak_booking($kdBooking, $idTiket)
    {
        $data = array(
            'kdBooking'=>$kdBooking,
            'tglBooking'=>'',
            'sttKonf'=>'-1',
            'tglKonf'=>date('Y-m-d H:i:s'),
            'confBy'=>'System',
            'idTiket'=>$idTiket,
            'idUser'=>$this->session->userdata('iduser')
        );
        $this->db->insert($this->table, $data);
        return true;
    }

    public function cek_conf($kdBooking)
    {
        $query = "select * from booking where kdBooking IN ($kdBooking) AND (sttKonf=1 or sttKonf='-1')";
        return $this->db->query($query);
    }

    public function get_data_booking()
    {
        $iduser = $this->session->userdata('iduser');
        $query = "SELECT b.kdBooking, b.idBooking, b.tglBooking, b.sttKonf, r.kodeRute, r.provinsiAsal, r.kotaAsal, r.provinsiTujuan, r.kotaTujuan, r.tglBerangkat, r.jamBerangkat
        from booking as b
        left join tiket as t ON b.kdBooking=t.kdBooking
        left join rute as r ON t.idRute=r.idRute
        where b.iduser='$iduser'
        group by b.kdBooking";
        return $this->db->query($query);
    }

    public function detail_booking($kdBooking)
    {
        $query = "SELECT * FROM booking where kdBooking='$kdBooking' group by sttKonf";
        return $this->db->query($query);
    }

    public function cari_booking($kd)
    {
        $query = "SELECT * FROM booking
                    where kdBooking='$kd' 
                    group by sttKonf";
        return $this->db->query($query);
    }
	
	
}
