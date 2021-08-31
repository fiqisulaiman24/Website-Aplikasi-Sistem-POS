<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
	The Property Of Fiqisulaiman
	Mei 2019
*/
class Master_contact extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('login_status') != TRUE){
			$this->session->set_flashdata('notif', 'Login Gagal');
		};
		$this->load->model('model_app');
		$this->load->helper('currency_format_helper');
	}

	// Fungsi Untuk Menampilan Halaman Data Kontak Ke Dashboard (Fiqisulaiman)
	public function index(){
		$data = array(
			'active_contact' => 'active',
			'title' => 'Master Data Contact',
			'judul_header' => 'PT. MAJU MUNDUR SAMPE MAMPUS',
			'active_contact' => 'active',
			'data_contact' => $this->model_app->getAllData('tbl_contact'),
		);

		$this->load->view('element/v_header',$data);
		$this->load->view('pages/v_master_contact');
		$this->load->view('element/v_footer');		
	}

	// Fungsi Mengedit Halaman Data Kontak Ke Dashboard (Fiqisulaiman)
	public function edit_contact(){
		$id['id'] = 1;
		$data = array(
			'nama' => $this->input->post('nama'),
			'owner' => $this->input->post('owner'),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telp'),
			'email' => $this->input->post('email'),
			'website' => $this->input->post('website'),
			'desc' => $this->input->post('desc'),
		);
		$this->model_app->updateData('tbl_contact',$data,$id);
		redirect('master_contact');
	}
}

/* End of file Master_contact.php */
/* Location: ./application/controllers/Master_contact.php */