<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
	The Property Of Fiqisulaiman
	Mei 2019
*/
class Model_app extends CI_Model {

	function __construct(){
		parent::__construct();
		//Do your magic here
	}
	
	// Fungsi Generate Kode Penjualan (Order)
	public function getKodePenjualan(){
		$q = $this->db->query("SELECT MAX(RIGHT(kd_penjualan,3)) AS kd_max FROM tbl_penjualan_header");
		$kd = "";
		if($q->num_rows() > 0) {
			foreach ($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%03s", $tmp);
			}
		}else{
			$kd = "001";
		}
		return "O-".$kd;
	}

	// Fungsi Generate Kode Barang
	function getKodeBarang(){
		$q = $this->db->query("SELECT MAX(RIGHT(kd_barang,3)) AS kd_max FROM tbl_barang");
		$kd = "";
		if($q->num_rows() > 0){
			foreach ($q->result() as $k){
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%03s", $tmp);
			}
		}else{
			$kd = "001";
		}
		return "B-".$kd;
	}

	// Fungsi Generate Kode Pelanggan
	public function getKodePelanggan(){
		$q = $this->db->query("SELECT MAX(RIGHT(kd_pelanggan,3)) AS kd_max FROM tbl_pelanggan");
		$kd = "";
		if($q->num_rows() > 0){
			foreach ($q->result() as $k){
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%03s", $tmp);
			}
		}else{
			$kd = "001";
		}
		return "P-".$kd;
	}

	// Fungsi Generate Kode Pegawai
	public function getKodePegawai(){
		$q = $this->db->query("SELECT MAX(RIGHT(kd_pegawai,3)) AS kd_max FROM tbl_pegawai");
		$kd = "";
		if($q->num_rows() > 0){
			foreach ($q->result() as $k){
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%03s", $tmp);
			}
		}else{
			$kd = "001";
		}
		return "K-".$kd;
	}

	// Fungsi Menambah Stok Barang
	public function getTambahStok($kd_barang,$tambah)
	{
		$q = $this->db->query("SELECT stok FROM tbl_barang WHERE kd_barang='".$kd_barang."'");
		$stok = "";
		foreach ($q->result() as $d)
		{
			$stok = $d->stok + $tambah;
		}
		return $stok;
	}

	// Fungsi Mengurangi Stok Barang
	public function getKurangStok($kd_barang,$kurangi)
	{
		$q = $this->db->query("SELECT stok FROM tbl_barang WHERE kd_barang='".$kd_barang."'");
		$stok = "";
		foreach ($q->result() as $d)
		{
			$stok = $d->stok - $kurangi;
		}
		return $stok;
	}

	public function getKembalikanStok($kd_barang)
	{
		$q = $this->db->query("SELECT stok FROM tbl_barang WHERE kd_barang='".$kd_barang."'");
		$stok = "";
		foreach ($q->result() as $d)
		{
			$stok = $d->stok;
		}
		return $stok;
	}

	/*
		Fungsi Get Untuk Menampilkan Jumlah 
		- (Data Barang)
		- (Data Pelanggan)
		- (Data Pegawai)
	*/
	function get_data($table){
      return $this->db->get($table);
    }

    public function getAllData($table)
	{
		return $this->db->get($table)->result();
	}

	public function getSelectedData($table,$data)
	{
		return $this->db->get_where($table, $data);
	}

	function updateData($table,$data,$field_key)
	{
		$this->db->update($table,$data,$field_key);
	}

	function deleteData($table,$data)
	{
		$this->db->delete($table,$data);
	}

	function insertData($table,$data)
	{
		$this->db->insert($table,$data);
	}

	function manualQuery($q)
	{
		return $this->db->query($q);
	}

	function getBarangJual(){
		return $this->db->query("SELECT * FROM tbl_barang WHERE stok > 0")->result();
	}

	function getAllDataPenjualan(){
		return $this->db->query("SELECT
			a.kd_penjualan,
			a.tanggal_penjualan,
			a.total_harga,
			(SELECT count(kd_penjualan) AS jum FROM tbl_penjualan_detail WHERE kd_penjualan = a.kd_penjualan) AS jumlah FROM tbl_penjualan_header a
			ORDER BY a.kd_penjualan DESC
		")->result();
	}

	function getDataPenjualan($id){
		return $this->db->query("SELECT * FROM tbl_penjualan_header a LEFT JOIN tbl_pelanggan b ON a.kd_pelanggan=b.kd_pelanggan LEFT JOIN tbl_pegawai c ON a.kd_pegawai=c.kd_pegawai WHERE a.kd_penjualan = '$id'")->result();
	}

	function getBarangPenjualan($id){
		return $this->db->query("SELECT a.kd_barang,a.qty,b.nm_barang,b.harga FROM tbl_penjualan_detail a LEFT JOIN tbl_barang b ON a.kd_barang=b.kd_barang WHERE a.kd_penjualan = '$id'")->result();
	}

	function getLapPenjualan($tgl_awal,$tgl_akhir){
        return $this->db->query("SELECT *,sum(a.total_harga) as total_all from tbl_penjualan_header a
            left join tbl_pelanggan b on a.kd_pelanggan=b.kd_pelanggan
            left join tbl_pegawai c on a.kd_pegawai=c.kd_pegawai
            where a.tanggal_penjualan between '$tgl_awal' and '$tgl_akhir'
            ")->result();
    }

    function login($username, $password) {
        //Membuat Query Untuk Konek ke User Login Database
        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);

        // Ambil dan Proses Query
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result(); //Jika data true maka berhasil
        } else {
            return false; //Jika Data false maka salah
        }
    }

}

/* End of file Model_app.php */
/* Location: ./application/models/Model_app.php */