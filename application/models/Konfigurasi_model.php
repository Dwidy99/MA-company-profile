<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {

	// Listing Layanan
	public function listing()
	{
		return $this->db->get('konfigurasi')->row();
	} 

	// Edit Data
	public function edit($data)
	{
		$this->db->where('id_konfigurasi', $data['id_konfigurasi'])
				 ->update('konfigurasi', $data);
	}

	// Listing Menu Berita
	public function menu_berita()
	{
		// Join dg 2 tabel
		return $this->db->select('berita.*, 
									kategori_berita.nama_kategori, kategori_berita.slug_kategori, kategori_berita.id_kategori_berita, 
									users.nama')
						->from('berita')
						->join('kategori_berita', 'kategori_berita.id_kategori_berita = berita.id_kategori_berita', 'left')
						->join('users', 'users.id_user = berita.id_user', 'left')
						->where(['berita.status_berita' => 'publish', 'berita.jenis_berita' => 'berita'])
						->group_by('berita.id_kategori_berita')
						->order_by('id_berita', 'DESC')
						->get()->result();
	}

	// Listing Menu Profil
	public function menu_profil()
	{
		// Join dg 2 tabel
		return $this->db->select('berita.*, kategori_berita.nama_kategori, kategori_berita.slug_kategori, users.nama')
						->from('berita')
						->join('kategori_berita', 'kategori_berita.id_kategori_berita = berita.id_kategori_berita', 'left')
						->join('users', 'users.id_user = berita.id_user', 'left')
						->where(['berita.status_berita' => 'publish', 'berita.jenis_berita' => 'profil'])
						->order_by('id_berita', 'DESC')
						->get()->result();
	}
	
	// Listing Menu Layanan
	public function menu_layanan()
	{
		return $this->db->select('layanan.*, 
									users.nama')
						->from('layanan')
						->join('users', 'users.id_user = layanan.id_user', 'LEFT')
						->order_by('id_layanan', 'DESC')
						->where('layanan.status_layanan', 'publish')
						->get()->result();
	}
}

/* End of file Konfigurasi_model.php */
/* Location: ./application/models/Konfigurasi_model.php */