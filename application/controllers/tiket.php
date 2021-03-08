<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username') && !$this->session->userdata('password') && !$this->session->userdata('role'))
		{
			return redirect()->to('Login');
		}
		header('Access-Control-Allow-Origin: *');
        $this->load->model('M_Moda','',true);
        $this->load->model('M_Route','',true);
        $this->load->model('M_Tiket','',true);
        $this->load->model('M_Penumpang','',true);
        $this->load->model('M_Booking','',true);
	}

	public function index()
	{
		$this->load->view('tiket/konfirmasi_tiket');
	}

    public function pengajuan_tiket()
    {
        $this->load->view('tiket/pengajuan_tiket');
    }

    public function get_data_rute()
    {        
        $data = $this->M_Route->get_data()->result();
		$dataarr = array();
		foreach($data as $k=>$v)
		{
			$dataarr[] = array(
                'idrute'=>$v->idRute,
				'moda'=>$v->jenisModa.' - '.$v->nomorModa,
				'kdRute'=>$v->kodeRute,
                'ruteAsal' => $v->kotaAsal.', '.$v->provinsiAsal,
                'ruteTujuan' => $v->kotaTujuan.', '.$v->provinsiTujuan,
                'totalSlot' => $v->jumlahSlot,
                'slotKosong' => $v->jumlahSlot - $v->booked,
                'slotBooked' => $v->booked == '' || $v->booked=="null" ? 0 : $v->booked,
                'jadwal' => $v->tglBerangkat.'  '.$v->jamBerangkat,
				'aksi'=>'<span class="btn btn-xs btn-success" style="cursor:pointer;" onclick=edit('.$v->idModa.',"'.$v->jenisModa.'","'.$v->nomorModa.'")><i class="fa fa-edit"></i></span> 
						 <span class="btn btn-xs btn-dark" style="cursor:pointer;" onclick="hapus('.$v->idModa.')"><i class="fa fa-trash"></i></span>'
			);
		}
		echo json_encode(array('data'=>$dataarr));
    }

    public function save_pengajuan()
    {
        $rute           = $this->input->post('rute');
        $nik            = $this->input->post('nik');
        $nm             = $this->input->post('nm');
        $umur           = $this->input->post('umur');
        $hp             = $this->input->post('hp');
        $alamat         = $this->input->post('alamat');

        /*
            1. Simpan Ke table tiket
            2. Simpan ke table booking
            3. Simpan ke table penumpang
        */
        $save_tiket='';
        $kdBooking = rand(100000, 999999);
        $tglBooking = date('Y-m-d H:i:s');
        $idParent='';

        for($i = 0; $i < count($rute); $i++)
        {
            //Save to tiket
            $kdTiket = rand(50000, 90000);
            $save_tiket = $this->M_Tiket->save_tiket($rute[$i], $kdTiket, $kdBooking);

            //save to booking
            $save_booking = $this->M_Booking->save_booking($kdBooking, $tglBooking, $save_tiket);

            //save to penumpang
            if($i == 0){
                $save_penumpang = $this->M_Penumpang->save_penumpang($idParent='', $save_tiket, $nik[$i], $nm[$i], $umur[$i], $alamat[$i], $hp[$i]);
                $idParent=$save_penumpang;
            }
            else{
                $save_penumpang = $this->M_Penumpang->save_penumpang($idParent, $save_tiket, $nik[$i], $nm[$i], $umur[$i], $alamat[$i], $hp[$i]);
            }


        }

        echo json_encode(array('status'=>'success','token'=>$this->security->get_csrf_hash(), 'rute'=>$kdBooking));
    }

    public function detail_booking($kdBooking){
        $data = $this->M_Booking->detail_booking($kdBooking)->result();
        echo json_encode(array('status'=>'success','token'=>$this->security->get_csrf_hash(), 'data'=>$data));
    }

    public function get_data_table()
    {
        $data = $this->M_Tiket->get_data_table();
        $dataarr = array();

		foreach($data->result() as $k=>$v)
		{
			$dataarr[] = array(
				'no'=>$k+1,
				'kdBooking'=>$v->kdBooking,
                'kdRute'=>$v->kodeRute,
                'rute' => $v->kotaAsal.', '.$v->provinsiAsal.' - '.$v->kotaTujuan.', '.$v->provinsiTujuan,
                'jumlah' => $v->jumlah,
				'aksi'=>'<span class="btn btn-xs btn-success" style="cursor:pointer;" onclick="review('.$v->kdBooking.')"><i class="fa fa-eye"></i> Review</span> '
			);
		}
		echo json_encode(array('data'=>$dataarr));
    }

    public function review($kdBooking)
    {
        $data['review'] = $this->M_Tiket->review($kdBooking)->result();
        $this->load->view('tiket/review', $data);
        // var_dump($data['review']);
    }

    public function cetak($kdBooking)
    {
        $data['review'] = $this->M_Tiket->cetak($kdBooking)->result();
        $this->load->view('tiket/cetak', $data);
        // var_dump($data['review']);
    }

    public function approve($kdBooking, $idTiket){
        
        $idTiket = explode('-', $idTiket);
        $cek = $this->M_Booking->cek_conf($kdBooking)->num_rows();
        if($cek > 0)
        {
            echo json_encode(array('data'=>'exist'));
        }
        else{
            for($i = 0; $i < count($idTiket); $i++)
            {
                $app = $this->M_Booking->conf_booking($kdBooking, $idTiket[$i]);
            }
            echo json_encode(array('data'=>'success'));
        }
    }

    public function tolak($kdBooking, $idTiket){
        
        $idTiket = explode('-', $idTiket);
        $cek = $this->M_Booking->cek_conf($kdBooking)->num_rows();
        if($cek > 0)
        {
            echo json_encode(array('data'=>'exist'));
        }
        else{
            for($i = 0; $i < count($idTiket); $i++)
            {
                $app = $this->M_Booking->tolak_booking($kdBooking, $idTiket[$i]);
            }
            echo json_encode(array('data'=>'success'));
        }
        

    }
}
