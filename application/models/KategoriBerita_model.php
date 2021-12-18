<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriBerita_model extends CI_Model {

  // Listing kategori_berita
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('kategori_berita');
		$this->db->order_by('urutan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	} 

	// Detail kategori_berita
	public function detail($id_kategori_berita)
	{
		$this->db->select('*');
		$this->db->from('kategori_berita');
		$this->db->where('id_kategori_berita', $id_kategori_berita);
		$this->db->order_by('id_kategori_berita');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail Berita
	public function read($slug_kategori)
	{
		$this->db->select('*');
		$this->db->from('kategori_berita');
		$this->db->where('slug_kategori', $slug_kategori);
		$this->db->order_by('id_kategori_berita');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah Data
	public function tambah($data)
	{
		return $this->db->insert('kategori_berita', $data);
	}

	// Edit Data
	public function edit($data)
	{
		$this->db->where('id_kategori_berita', $data['id_kategori_berita']);
		$this->db->update('kategori_berita', $data);
	}

	// Delete
	public function hapus($data)
	{
		$this->db->where('id_kategori_berita', $data['id_kategori_berita']);
		return $this->db->delete('kategori_berita');
	}

}

?>