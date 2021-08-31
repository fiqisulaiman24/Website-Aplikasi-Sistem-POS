<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
	The Property Of Fiqisulaiman
	Mei 2019
*/
class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		// Notif Jika Session Login Gagal
		if($this->session->userdata('login_status') != TRUE){
			$this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD SALAH !');
			redirect('');
		};
		$this->load->model('model_app');
	}

	// Fungsi Untuk Menampilkan Halaman Dashboard
	function index(){
		$data = array(
			'title' => 'Dashboard',
			'judul_header' => 'PT. MAJU MUNDUR SAMPE MAMPUS',
			'active_dashboard'=>'active',
			'data_contact' => $this->model_app->getAllData('tbl_contact'), 
		);

		// Menampilkan Data Barang Di Dashboard
		$data['tbl_barang'] = $this->db->query("SELECT * FROM tbl_barang ORDER BY kd_barang DESC LIMIT 5");

		$this->load->view('element/v_header',$data);
		$this->load->view('pages/v_dashboard');
		$this->load->view('element/v_footer');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */