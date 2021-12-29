<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriBerita_model extends CI_Model {

  // Listing kategori_berita
	public function listing()
	{
		return $this->db->select('*')
										->from('kategori_berita')
										->order_by('urutan', 'ASC')
										->get()->result();
	} 

	// Detail kategori_berita
	public function detail($id_kategori_berita)
	{
		return $this->db->select('*')
										->from('kategori_berita')
										->where('id_kategori_berita', $id_kategori_berita)
										->order_by('id_kategori_berita')
										->get()->row();
	}

	// Detail Berita
	public function read($slug_kategori)
	{
		return $this->db->select('*')
										->from('kategori_berita')
										->where('slug_kategori', $slug_kategori)
										->order_by('id_kategori_berita')
										->get()->row();
	}

	// Tambah Data
	public function tambah($data)
	{
		return $this->db->insert('kategori_berita', $data);
	}

	// Edit Data
	public function edit($data)
	{
		$this->db->where('id_kategori_berita', $data['id_kategori_berita'])
						 ->update('kategori_berita', $data);
	}

	// Delete
	public function hapus($data)
	{
		return $this->db->where('id_kategori_berita', $data['id_kategori_berita'])
										->delete('kategori_berita');
	}

}

?>