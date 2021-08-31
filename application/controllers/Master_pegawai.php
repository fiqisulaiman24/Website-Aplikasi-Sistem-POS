<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
	The Property Of Fiqisulaiman
	Mei 2019
*/
class Master_pegawai extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('login_status') != TRUE){
			$this->session->set_flashdata('notif', 'Login Gagal');
		};
		$this->load->model('model_app');
		$this->load->helper('currency_format_helper');
	}

	// Fungsi Untuk Menampilkan Data Pegawai (Fiqisulaiman)
	public function index(){
		$data = array(
			'active_pegawai' => 'active',
			'title' => 'Master Data Pegawai',
			'judul_header' => 'PT. MAJU MUNDUR SAMPE MAMPUS',
			'active_pegawai' => 'active',
			'kd_pegawai' => $this->model_app->getKodePegawai(),
			'data_pegawai' => $this->model_app->getAllData('tbl_pegawai'), 
		);

		// Menampilkan Jumlah Data Pegawai Di Dashboard
		$data['tbl_pegawai'] = $this->db->query("SELECT * FROM tbl_pegawai ORDER BY kd_pegawai DESC LIMIT 5");

		$this->load->view('element/v_header', $data);
		$this->load->view('pages/v_master_pegawai');
		$this->load->view('element/v_footer');
	}

	// Fungsi Untuk Menambahkan Data Pegawai (Fiqisulaiman)
	function tambah_pegawai(){
	 	$data = array(
	 		'kd_pegawai' => $this->input->post('kd_pegawai') ,
	 		'username' => $this->input->post('username'),
	 		'password' => md5($this->input->post('password')),
	 		'nama' => $this->input->post('nama'),
	 		'level' => $this->input->post('level'),
	 	);

	 	$this->model_app->insertData('tbl_pegawai',$data);
	 	redirect('master_pegawai');
	}

	// Fungsi Untuk Mengedit Data Pegawai (Fiqisulaiman)
	function edit_pegawai(){
		$id['kd_pegawai'] = $this->input->post('kd_pegawai');
		$data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'nama' => $this->input->post('nama'),
			'level' =>$this->input->post('level'), 
		);
		$this->model_app->updateData('tbl_pegawai',$data,$id);
		redirect('master_pegawai');
	}

	// Fungsi Untuk Menghapus Data Pegawai (Fiqisulaiman)
	function hapus_pegawai(){
		$id['kd_pegawai'] = $this->uri->segment(3);
		$this->model_app->deleteData('tbl_pegawai',$id);
		redirect('master_pegawai');
	}
}

/* End of file Master_pegawai.php */
/* Location: ./application/controllers/Master_pegawai.php */