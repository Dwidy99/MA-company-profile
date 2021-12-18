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
		$this->db->where('id_konfigurasi', $data['id_konfigurasi']);
		$this->db->update('konfigurasi', $data);
	}

	// Listing Menu Berita
	public function menu_berita()
	{
		$this->db->select('berita.*, 
									kategori_berita.nama_kategori, kategori_berita.slug_kategori, kategori_berita.id_kategori_berita, 
									users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori_berita', 'kategori_berita.id_kategori_berita = berita.id_kategori_berita', 'left');
		$this->db->join('users', 'users.id_user = berita.id_user', 'left');
		$this->db->where(['berita.status_berita' => 'publish', 'berita.jenis_berita' => 'berita']);
		$this->db->group_by('berita.id_kategori_berita');
		$this->db->order_by('id_berita', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing Menu Profil
	public function menu_profil()
	{
		$this->db->select('berita.*, kategori_berita.nama_kategori, kategori_berita.slug_kategori, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori_berita', 'kategori_berita.id_kategori_berita = berita.id_kategori_berita', 'left');
		$this->db->join('users', 'users.id_user = berita.id_user', 'left');
		$this->db->where(['berita.status_berita' => 'publish', 'berita.jenis_berita' => 'profil']);
		$this->db->order_by('id_berita', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Listing Menu Layanan
	public function menu_layanan()
	{
		$this->db->select('layanan.*, 
																users.nama');
		$this->db->from('layanan');
		$this->db->join('users', 'users.id_user = layanan.id_user', 'LEFT');
		$this->db->order_by('id_layanan', 'DESC');
		$this->db->where('layanan.status_layanan', 'publish');
		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file Konfigurasi_model.php */
/* Location: ./application/models/Konfigurasi_model.php */