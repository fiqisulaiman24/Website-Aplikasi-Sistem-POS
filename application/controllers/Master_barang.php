<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
	The Property Of Fiqisulaiman
	Mei 2019
*/
class Master_barang extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('login_status') != TRUE){
			$this->session->set_flashdata('notif', 'Login Gagal');
			redirect('');
		};
		$this->load->model('model_app');
		$this->load->helper('currency_format_helper');
	}

	public function index() {
		$data = array(
			'active_barang' => 'active',
			'title' => 'Master Data Barang',
			'judul_header' => 'PT. MAJU MUNDUR SAMPE MAMPUS',
			'kd_barang' => $this->model_app->getKodeBarang(),
			'data_barang' => $this->model_app->getAllData('tbl_barang'),
		);

		// Menampilkan Jumlah Data Pelanggan Di Dashboard
		$data['tbl_barang'] = $this->db->query("SELECT * FROM tbl_barang ORDER BY kd_barang DESC LIMIT 5");

		$this->load->view('element/v_header',$data);
		$this->load->view('pages/v_master_barang');
		$this->load->view('element/v_footer');
	}

	// Fungsi Untuk Menambah Data Barang (Fiqisulaiman)
	function tambah_barang(){
		$data = array(
			'kd_barang' => $this->input->post('kd_barang'),
			'nm_barang' => $this->input->post('nm_barang'),
			'stok' => $this->input->post('stok'),
			'harga' => $this->input->post('harga'),
		);
		$this->model_app->insertData('tbl_barang',$data);
		redirect('master_barang');
	}

	// Fungsi Untuk Mengedit Data Barang
	function edit_barang(){
		$id['kd_barang'] = $this->input->post('kd_barang');
		$data = array(
			'nm_barang' => $this->input->post('nm_barang'),
			'stok' => $this->input->post('stok'),
			'harga' => $this->input->post('harga'), 
		);
		$this->model_app->updateData('tbl_barang',$data,$id);
		redirect('master_barang');
	}

	// Fungsi Untuk Menghapus Data Barang
	function hapus_barang(){
		$id['kd_barang'] = $this->uri->segment(3);
		$this->model_app->deleteData('tbl_barang',$id);
		redirect('master_barang');
	}
}

/* End of file Master.php */
/* Location: ./application/controllers/Master.php */