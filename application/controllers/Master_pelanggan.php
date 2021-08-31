<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
	The Property Of Fiqisulaiman
	Mei 2019
*/
class Master_pelanggan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('login_status') != TRUE){
			$this->session->set_flashdata('notif', 'Login Gagal');
			redirect('');
		};
		$this->load->model('model_app');
	}

	// Fungsi Untuk Menampilkan Halaman Pelanggan
	public function index(){
		$data = array(
			'active_pelanggan' => 'active',
			'title' => 'Master Data Pelanggan',
			'judul_header' => 'PT. MAJU MUNDUR SAMPE MAMPUS',
			'kd_pelanggan' => $this->model_app->getKodePelanggan(),
			'data_pelanggan' => $this->model_app->getAllData('tbl_pelanggan'), 
		);

		// Menampilkan Jumlah Data Pelanggan Di Dashboard
		$data['tbl_pelanggan'] = $this->db->query("SELECT * FROM tbl_pelanggan ORDER BY kd_pelanggan DESC LIMIT 5");

		$this->load->view('element/v_header',$data);
		$this->load->view('pages/v_master_pelanggan');
		$this->load->view('element/v_footer');
	}

	// Fungsi Untuk Menambahkan Data Pelanggan
	function tambah_pelanggan(){
		$data = array(
			'kd_pelanggan' => $this->input->post('kd_pelanggan'),
			'nm_pelanggan' => $this->input->post('nm_pelanggan'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'), 
		);
		$this->model_app->insertData('tbl_pelanggan',$data);
		redirect('master_pelanggan');
	}

	// Fungsi Untuk Mengedit Data Pelanggan
	function edit_pelanggan(){
		$id['kd_pelanggan'] = $this->input->post('kd_pelanggan');
		$data = array(
			'nm_pelanggan' => $this->input->post('nm_pelanggan'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
		);
		$this->model_app->updateData('tbl_pelanggan',$data,$id);
		redirect('master_pelanggan');
	}

	// Fungsi Untuk Menghapus Data Pelanggan
	function hapus_pelanggan(){
		$id['kd_pelanggan'] = $this->uri->segment(3);
		$this->model_app->deleteData('tbl_pelanggan',$id);
		redirect('master_pelanggan');
	}

}

/* End of file Master_pelanggan.php */
/* Location: ./application/controllers/Master_pelanggan.php */