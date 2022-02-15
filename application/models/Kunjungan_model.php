<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	// Listing
	public function listing()
	{
		return $this->db->select('*')
		->from('kunjungan')
		->order_by('id_kunjungan', 'DESC')
		->limit(8)
		->get()->result();
	}
	
	// Listing
	public function pengunjung_detail($ip_address, $hari)
	{
		return $this->db->select('*')
		->from('kunjungan')
		->where(array('ip_address' => $ip_address, 'hari' => $hari))
		->order_by('id_kunjungan', 'DESC')
		->get()->row();
	}

	// Tambah
	public function tambah($data_kunjungan)
	{
		$this->db->insert('kunjungan',$data_kunjungan);
	}
	
	// Edit
	public function edit($data_kunjungan)
	{
		$this->db->where('id_kunjungan',$data_kunjungan['id_kunjungan'])
		->update('kunjungan', $data_kunjungan);
	}

	// Tambah
	public function data_log($data_log)
	{
		$this->db->insert('user_log',$data_log);
	}

	// Laporan harian
	public function harian()
	{
		$sekarang = date('Y-m-d');
		return $this->db->select('*')
		->from('kunjungan')
		->where('hari',$sekarang)
		->get()->result();
	}

	// Laporan bulanan
	public function bulanan()
	{
		$sekarang = date('Y-m');
		return $this->db->select('*')
		->from('kunjungan')
		->where('SUBSTR(hari,1,7)',$sekarang)
		->get()->result();
	}

	// Laporan bulanan
	public function tahunan()
	{
		$sekarang = date('Y');
		return $this->db->select('*')
		->from('kunjungan')
		->where('SUBSTR(hari,1,4)',$sekarang)
		->get()->result();
	}
	

}

/* End of file Kunjungan_model.php */
/* Location: ./application/models/Kunjungan_model.php */