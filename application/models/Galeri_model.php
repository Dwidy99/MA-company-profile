<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_model extends CI_Model {

	// Listing Galeri
	public function listing()
	{
		$this->db->select("galeri.*,
																users.nama");
		$this->db->from('galeri');
		$this->db->join('users', 'users.id_user = galeri.id_user', 'LEFT');
		$this->db->order_by('id_galeri', 'DESC');
		$query = $this->db->get();
		return $query->result();
	} 

	// Tambah Data
	public function tambah($data)
	{
		return $this->db->insert('galeri', $data);
	}

	// Edit Data
	public function edit($id_galeri, $gambar='')
	{
		$i = $this->input;

		// Apabila gambar tidak diubah
		if ($gambar !== "") {
			$this->db->set('gambar', $gambar);
		}

		$this->db->set('id_user', $this->session->userdata('id_user'));
		$this->db->set('judul_galeri', $i->post('judul_galeri'));
		$this->db->set('isi_galeri', $i->post('isi_galeri'));
		$this->db->set('website', $i->post('website', true));
		$this->db->set('posisi_galeri', $i->post('posisi_galeri', true));
		$this->db->where('id_galeri', $id_galeri);
		$this->db->update('galeri');
	}

	// Delete
	public function hapus($id_galeri)
	{
		$this->db->where('id_galeri', $id_galeri);
		return $this->db->delete('galeri');
	}

	// Home Main Page
	// Listing Galeri untuk slider
	public function slider()
	{
		$this->db->select('galeri.*, 
																users.nama');
		$this->db->from('galeri');
		$this->db->join('users', 'users.id_user = galeri.id_user', 'LEFT');
		$this->db->where('posisi_galeri', 'homepage');
		$this->db->order_by('id_galeri', 'DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	} 

	// Listing Galeri dengan mengubah tanggal
	public function galeriDATE($limit, $start)
	{
		$this->db->select("*, 
											MONTHNAME(galeri.tanggal_post) AS bulan, 
											DATE_FORMAT(galeri.tanggal_post, '%d') AS tanggalAngka");
		$this->db->from('galeri');
		$this->db->where('posisi_galeri', 'galeri');
		$this->db->order_by('id_galeri', 'DESC');
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result();
	} 
	
	public function galeri()
	{
		$this->db->select('galeri.*, 
																users.nama');
		$this->db->from('galeri');
		$this->db->join('users', 'users.id_user = galeri.id_user', 'LEFT');
		$this->db->where('posisi_galeri', 'galeri');
		$this->db->order_by('id_galeri', 'DESC');
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
	} 

	// Detail Galeri
	public function detail($id_galeri)
	{
		$this->db->select('*');
		$this->db->from('galeri');
		$this->db->where('id_galeri', $id_galeri);
		$this->db->order_by('id_galeri');
		$query = $this->db->get();
		return $query->row();
	}

	// Listing main page
	public function total_galeri()
	{
		$this->db->select('galeri.*');
		$this->db->from('galeri');
		$this->db->where(['posisi_galeri' => 'galeri']);	
		
		$this->db->order_by('id_galeri', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
	// End Home Main Page
}

/* End of file Galeri_model.php */
/* Location: ./application/models/Galeri_model.php */