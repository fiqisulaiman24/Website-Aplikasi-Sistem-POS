<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('model_app');
	}

	function index() {
		$data = array(
			'title' => 'Login Page',
			'footer' => 'Created By Fiqisulaiman 2019',
			'judul_header' => 'APLIKASI PENJUALAN BARANG',
		);
		$this->load->view('pages/v_login',$data);
	}

	function cek_login() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		// Query ke database
		$result = $this->model_app->login($username, $password);
		if($result) {
			$sess_array = array();
			foreach ($result as $row) {
				// Buat Sesi Login
				$sess_array = array(
					'ID' => $row->kd_pegawai,
					'USERNAME' => $row->username,
					'PASS' => $row->password,
					'NAME' => $row->nama,
					'LEVEL' => $row->level,
					'login_status' => true,
				);
				// Set Sesi dengan nilai dari database
				$this->session->set_userdata($sess_array);
				redirect('dashboard','refresh');
			}
			return TRUE;
		} else {
			// Jika dari validasi nya salah maka false
			redirect('dashboard','refresh');
			return FALSE;
		}
	}

	function logout() {
		$this->session->unset_userdata('ID');
		$this->session->unset_userdata('USERNAME');
		$this->session->unset_userdata('PASS');
		$this->session->unset_userdata('NAME');
		$this->session->unset_userdata('LEVEL');
		$this->session->unset_userdata('login_status');
		$this->session->set_flashdata('notif', 'TERIMA KASIH SUDAH LOGIN');
		redirect('login');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */