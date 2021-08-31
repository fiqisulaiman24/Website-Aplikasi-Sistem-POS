<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('login_status')!= TRUE){
			$this->session->set_flashdata('notif', 'Login Gagal');
			redirect('');
		};
		$this->load->model('model_app');
		$this->load->helper('currency_format_helper');
	}

	public function index(){
		$data = array(
			'active_laporan' => 'active', 
			'judul_header' => 'PT. MAJU MUNDUR SAMPE MAMPUS',
			'title' => 'Laporan',
			'data_penjualan' => $this->model_app->getAllDataPenjualan(), 
		);
		$this->session->unset_userdata('tgl_awal');
		$this->session->unset_userdata('tgl_akhir');

		$this->load->view('element/v_header',$data);
		$this->load->view('pages/v_lap_penjualan');
		$this->load->view('element/v_footer');
	}

	public function cari(){
		$tgl_awal = date("Y-m-d",strtotime($this->input->post('tgl_awal')));
		$tgl_akhir = date("Y-m-d",strtotime($this->input->post('tgl_akhir')));
		$sess_data = array(
			'tgl_awal' => $tgl_awal,
			'tgl_akhir' => $tgl_akhir,
		);
		
		$this->session->set_userdata($sess_data);
		$data = array(
			'dt_result' => $this->model_app->getLapPenjualan($tgl_awal, $tgl_akhir),
			'tgl_awal' => date("Y-m-d",strtotime($this->session->userdata('tgl_awal'))),
			'tgl_akhir' => date("Y-m-d",strtotime($this->session->userdata('tgl_akhir'))),
		);
		$this->load->view('pages/v_result_laporan');
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */