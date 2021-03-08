<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rute extends CI_Controller {

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
	}
	public function index()
	{
        $data['moda'] = $this->M_Moda->get_data()->result();
		$this->load->view('rute/rute', $data);
	}

    public function save_rute()
    {
        $moda           = htmlentities($this->input->post('moda'),ENT_QUOTES, "UTF-8");
        $kode_rute      = htmlentities($this->input->post('kode_rute'),ENT_QUOTES, "UTF-8");
        $prov_asal      = htmlentities($this->input->post('prov_asal'),ENT_QUOTES, "UTF-8");
        $kota_asal      = htmlentities($this->input->post('kota_asal'),ENT_QUOTES, "UTF-8");
        $prov_tujuan    = htmlentities($this->input->post('prov_tujuan'),ENT_QUOTES, "UTF-8");
        $kota_tujuan    = htmlentities($this->input->post('kota_tujuan'),ENT_QUOTES, "UTF-8");
        $slot           = htmlentities($this->input->post('slot'),ENT_QUOTES, "UTF-8");
        $tanggal        = htmlentities($this->input->post('tanggal'),ENT_QUOTES, "UTF-8");
        $jam            = htmlentities($this->input->post('jam'),ENT_QUOTES, "UTF-8");
        $date           = Date('Y-m-d', strtotime($tanggal));
        
		$save = $this->M_Route->save_route($moda, $kode_rute, $prov_asal, $kota_asal, $prov_tujuan, $kota_tujuan, $slot, $date, $jam);

		if($save){echo json_encode(array('status'=>'success','token'=>$this->security->get_csrf_hash()));}
		else{echo json_encode(array('status'=>'failed','token'=>$this->security->get_csrf_hash()));}
    }

    public function get_data_rute()
    {        
        $data = $this->M_Route->get_data()->result();
		$dataarr = array();
		foreach($data as $k=>$v)
		{
			$dataarr[] = array(
				'moda'=>$v->jenisModa.' - '.$v->nomorModa,
				'kdRute'=>$v->kodeRute,
                'ruteAsal' => $v->kotaAsal.', '.$v->provinsiAsal,
                'ruteTujuan' => $v->kotaTujuan.', '.$v->provinsiTujuan,
                'totalSlot' => $v->jumlahSlot,
                'slotKosong' => $v->sisa == '' || $v->sisa=="null" ? 0 : $v->sisa,
                'slotBooked' => $v->booked == '' || $v->booked=="null" ? 0 : $v->booked,
                'jadwal' => $v->tglBerangkat.'  '.$v->jamBerangkat,
				'aksi'=>'<span class="btn btn-xs btn-success" style="cursor:pointer;" onclick=edit('.$v->idModa.',"'.$v->jenisModa.'","'.$v->nomorModa.'")><i class="fa fa-edit"></i></span> 
						 <span class="btn btn-xs btn-dark" style="cursor:pointer;" onclick="hapus('.$v->idModa.')"><i class="fa fa-trash"></i></span>'
			);
		}
		echo json_encode(array('data'=>$dataarr));
    }

    public function api_provinsi()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://ruangapi.com/api/v1/provinces?id=",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "authorization: euanC6e3jPjD8uA6jAQwpinhASplc0cPr7HyXaMN"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }

    }

    public function api_kota_kabupaten($id)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://ruangapi.com/api/v1/cities?province=$id&id=&q=",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "authorization: euanC6e3jPjD8uA6jAQwpinhASplc0cPr7HyXaMN"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }
    }

}
