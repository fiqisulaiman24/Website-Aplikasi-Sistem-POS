<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
	The Property Of Fiqisulaiman
	Mei 2019
*/
class Cetak extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('login_statis') != TRUE){
			$this->session->set_flashdata('notif', 'Login Gagal !');
		};
		$this->load->model('model_app');
		$this->load->helper('currency_format_helper');
	}

	function print_penjualan(){
		$id = $this->uri->segment(3);
		$data = array(
			'title' => 'Penjualan',
			'dt_contact' => $this->model_app->getAllData('tbl_contact'),
			'dt_penjualan' => $this->model_app->getDataPenjualan($id),
			'barang_jual' => $this->model_app->getBarangPenjualan($id),
		);
		$this->load->view('pages/v_print_penjualan',$data);
	}
}

/* End of file Cetak.php */
/* Location: ./application/controllers/Cetak.php */