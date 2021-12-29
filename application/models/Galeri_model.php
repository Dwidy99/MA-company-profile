<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_model extends CI_Model {

	// Listing Galeri
	public function listing()
	{
		return $this->db->select("galeri.*,
									users.nama")
						->from('galeri')
						->join('users', 'users.id_user = galeri.id_user', 'LEFT')
						->order_by('id_galeri', 'DESC')
						->get()->result();
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
		return $this->db->select('galeri.*, 
									users.nama')
						->from('galeri')
						->join('users', 'users.id_user = galeri.id_user', 'LEFT')
						->where('posisi_galeri', 'homepage')
						->order_by('id_galeri', 'DESC')
						->limit(5)
						->get()->result();
	} 

	// Listing Galeri dengan mengubah tanggal
	public function galeriDATE($limit, $start)
	{
		return $this->db->select("*, 
							MONTHNAME(galeri.tanggal_post) AS bulan, 
							DATE_FORMAT(galeri.tanggal_post, '%d') AS tanggalAngka")
						->from('galeri')
						->where('posisi_galeri', 'galeri')
						->order_by('id_galeri', 'DESC')
						->limit($limit, $start)
						->get()->result();
	} 
	
	public function galeri()
	{
		return $this->db->select('galeri.*, 
									users.nama')
						->from('galeri')
						->join('users', 'users.id_user = galeri.id_user', 'LEFT')
						->where('posisi_galeri', 'galeri')
						->order_by('id_galeri', 'DESC')
						->limit(10)
						->get()->result();
	} 

	// Detail Galeri
	public function detail($id_galeri)
	{
		return $this->db->select('*')
						->from('galeri')
						->where('id_galeri', $id_galeri)
						->order_by('id_galeri')
						->get()->row();
	}

	// Listing main page
	public function total_galeri()
	{
		return $this->db->select('galeri.*')
						->from('galeri')
						->where(['posisi_galeri' => 'galeri'])
						->order_by('id_galeri', 'DESC')
						->get()->result();
	}
	// End Home Main Page
}

/* End of file Galeri_model.php */
/* Location: ./application/models/Galeri_model.php */