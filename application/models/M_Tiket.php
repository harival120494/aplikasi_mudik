<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tiket extends CI_Model {

	private $table = "tiket";
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function save_tiket($rute, $kdTiket, $kdBooking)
    {
        $data = array(
            'idRute'=>$rute,
            'kdTiket'=>$kdTiket,
            'kdBooking'=>$kdBooking,
            'idUser'=>$this->session->userdata('iduser')
        );
        $this->db->insert($this->table, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function get_data_table()
    {
        $query = "SELECT count(t.kdBooking) as jumlah, t.kdBooking, r.kodeRute, r.provinsiAsal, r.kotaAsal, r.provinsiTujuan, r.kotaTujuan
                    from tiket as t 
                    left join rute as r ON t.idRute=r.idRute
                    group by t.kdBooking";
        return $this->db->query($query);
    }

    public function review($kdBooking)
    {
        $query = "SELECT * FROM booking
                left join penumpang ON booking.idTiket = penumpang.idTiket
                left join tiket ON tiket.id = booking.idTiket
                left join rute ON tiket.idRute=rute.idRute
                left join moda on rute.idModa=moda.idModa
                where booking.kdBooking='$kdBooking' AND booking.sttKonf=0";
        return $this->db->query($query);
    }

    public function cetak($kdBooking)
    {
        $query = "SELECT * FROM booking
                left join penumpang ON booking.idTiket = penumpang.idTiket
                left join tiket ON tiket.id = booking.idTiket
                left join rute ON tiket.idRute=rute.idRute
                left join moda on rute.idModa=moda.idModa
                where booking.kdBooking='$kdBooking' AND booking.sttKonf=1";
        return $this->db->query($query);
    }
	
	
}
