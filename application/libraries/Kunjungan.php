<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan
{
	protected $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('Kunjungan_model');
	}

	// Kunjungan
	public function counter($alamat_kunjungan)
	{
		date_default_timezone_set('Asia/Jakarta');
		
		if($this->CI->uri->segment(1) == "admin" || $this->CI->uri->segment(1) == "assets") {
			
		}else{
			$ip_address = $this->CI->input->ip_address();
			$hari = date("Y-m-d");
			$kunjungan = $this->CI->db->get_where('kunjungan', ['ip_address' => $ip_address, 'hari' => $hari])->row();

			// Cek Jika Kunjungan Sudah Ada di hari yang sama 
			if($kunjungan) {
				// var_dump($kunjungan);die;
				$data_kunjungan = array(	
					'alamat'		=> $alamat_kunjungan,
					'id_kunjungan'	=> $kunjungan->id_kunjungan,
					'hits'			=> $kunjungan->hits+1);
				$this->CI->Kunjungan_model->edit($data_kunjungan);
			}else{
				$data_kunjungan = array(	
					'alamat'		=> $alamat_kunjungan,
					'ip_address'	=> $ip_address,
					'hits'			=> 1,
					'hari'			=> date('Y-m-d'),
					'waktu'			=> date('Y-m-d H:i:s'));
				$this->CI->Kunjungan_model->tambah($data_kunjungan);
			}
		}
	}

}

/* End of file Kunjungan.php */
/* Location: ./application/libraries/Kunjungan.php */