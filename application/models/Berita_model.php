<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

	// Listing Berita
	public function listing()
	{
		// Join dg 2 tabel
		return $this->db->select('berita.*, 
									kategori_berita.nama_kategori, kategori_berita.slug_kategori, 
									users.nama')
						->from('berita')
						->join('kategori_berita', 'kategori_berita.id_kategori_berita = berita.id_kategori_berita', 'left')
						->join('users', 'users.id_user = berita.id_user', 'left')
						->order_by('id_berita', 'DESC')
						->get()
						->result();
	} 

	// Listing author admin
	public function author_admin($id_user) {
		// Join dg 2 tabel
		return $this->db->select('berita.*, 
											users.nama,
											nama_kategori')
						->from('berita')
						->join('kategori_berita','kategori_berita.id_kategori_berita = berita.id_kategori_berita','LEFT')
						->join('users','users.id_user = berita.id_user','LEFT')
						->where(array(	'berita.id_user'	=> $id_user))
						->order_by('id_berita','DESC')
						->get()->result();
		// End join
	}

	// Listing kategori admin
	public function kategori_admin($id_kategori) {
		// Join dg 2 tabel
		return $this->db->select('berita.*, users.nama, kategori_berita.nama_kategori')
						->from('berita')
						->join('users','users.id_user = berita.id_user','LEFT')
						->join('kategori_berita','kategori_berita.id_kategori_berita = berita.id_kategori_berita','LEFT')
						->where(array(	'berita.id_kategori_berita'	=> $id_kategori))
						->order_by('id_berita','DESC')
						->get()->result();
		// End join
	}

	// Listing jenis admin
	public function jenis_admin($jenis_berita) {
		// Join dg 2 tabel
		return $this->db->select('berita.*, users.nama, kategori_berita.nama_kategori_berita, kategori_berita.slug_kategori')
						->from('berita')
						->join('kategori_berita','kategori_berita.id_kategori_berita = berita.id_kategori_berita','LEFT')
						->join('users','users.id_user = berita.id_user','LEFT')
						->where(array(	'berita.jenis_berita'	=> $jenis_berita))
						->order_by('id_berita','DESC')
						->get()->result();
		// End join
	}
	
	// Read berita main page
	public function read($slug_berita)
	{
		// Join dg 2 tabel
		return $this->db->select('berita.*, kategori_berita.nama_kategori, kategori_berita.slug_kategori, users.nama')
						->from('berita')
						->join('kategori_berita', 'kategori_berita.id_kategori_berita = berita.id_kategori_berita', 'left')
						->join('users', 'users.id_user = berita.id_user', 'left')
						->where(['berita.status_berita' => 'publish', 'berita.slug_berita' => $slug_berita])
						->order_by('id_berita', 'DESC')
						->get()->row();
	} 

	// Detail Berita
	public function detail($id_berita)
	{
		return $this->db->select('*')
						->from('berita')
						->where('id_berita', $id_berita)
						->order_by('id_berita')
						->get()->row();
	}

	// Tambah Data
	public function tambah($data)
	{
		return $this->db->insert('berita', $data);
	}

	// Edit Data
	public function edit($id_berita, $gambar='')
	{
		$i = $this->input;

		// Apabila gambar tidak diubah
		if ($gambar !== "") {
			$this->db->set('gambar', $gambar);
		}

		$this->db->set('id_user', $this->session->userdata('id_user'));
		$this->db->set('id_kategori_berita', $i->post('id_kategori_berita', true));
		$this->db->set('updater', $this->session->userdata('nama'));
		$this->db->set('slug_berita', url_title($i->post('judul_berita', true), 'dash', TRUE));
		$this->db->set('judul_berita', $i->post('judul_berita'));
		$this->db->set('isi', $i->post('isi_berita'));
		$this->db->set('keywords', $i->post('keywords', true));
		$this->db->set('jenis_berita', $i->post('jenis_berita', true));
		$this->db->set('status_berita', $i->post('status_berita', true));
		$this->db->where('id_berita', $id_berita);
		$this->db->update('berita');
	}

	// Delete
	public function hapus($id_berita)
	{
		return $this->db->where('id_berita', $id_berita)
						->delete('berita');
	}

	// Main Page
	// Listing Berita
	
	// Edit hit
	public function update_hit($hit) {
		$this->db->where('id_berita',$hit['id_berita'])
				 ->update('berita',$hit);
	}
	
	public function home()
	{
		// Join dg 2 tabel
		return $this->db->select('berita.*, 
											kategori_berita.nama_kategori, kategori_berita.slug_kategori, 
											users.nama')
						->from('berita')
						->join('kategori_berita', 'kategori_berita.id_kategori_berita = berita.id_kategori_berita', 'left')
						->join('users', 'users.id_user = berita.id_user', 'left')
						->where(['status_berita' => 'publish', 'jenis_berita' => 'berita'])
						->order_by('id_berita', 'DESC')
						->limit(5)
						->get()->result();
	} 
	
	// Berita terbaru
	public function berita_baru()
	{
		// Join dg 2 tabel
		return $this->db->select('berita.*, kategori_berita.nama_kategori, kategori_berita.slug_kategori, users.nama')
					->from('berita')
					->join('kategori_berita', 'kategori_berita.id_kategori_berita = berita.id_kategori_berita', 'left')
					->join('users', 'users.id_user = berita.id_user', 'left')
					->where(['status_berita' => 'publish', 'jenis_berita' => 'berita'])
					->order_by('id_berita', 'DESC')
					->limit(9)
					->get()->result();
	} 

	// Listing main page
	public function berita($limit, $start)
	{
		// Join dg 2 tabel
		return $this->db->select("berita.*, DATE_FORMAT(berita.tanggal_post, '%W %M %Y') AS tanggalPost,
											kategori_berita.nama_kategori, kategori_berita.slug_kategori, 
											users.nama")
						->from('berita')
						->join('kategori_berita', 'kategori_berita.id_kategori_berita = berita.id_kategori_berita', 'left')
						->join('users', 'users.id_user = berita.id_user', 'left')
						->where(['status_berita' => 'publish', 'berita.jenis_berita' => 'berita'])
						->order_by('id_berita', 'DESC')
						->limit($limit, $start)
						->get()->result();
	} 

	// Listing main page
	public function total_berita()
	{
		// Join dg 2 tabel
		return $this->db->select('berita.*, kategori_berita.nama_kategori, kategori_berita.slug_kategori, users.nama')
					->from('berita')
					->join('kategori_berita', 'kategori_berita.id_kategori_berita = berita.id_kategori_berita', 'left')
					->join('users', 'users.id_user = berita.id_user', 'left')
					->where(['status_berita' => 'publish'])
					->order_by('id_berita', 'DESC')
					->get()->result();
	}
	
	// Listing main kategori berita
	public function kategori_berita($id_kategori, $limit, $start)
	{
		// Join dg 2 tabel
		return $this->db->select("berita.*, DATE_FORMAT(berita.tanggal_post, '%W %M %Y') AS tanggalPost,
											 kategori_berita.nama_kategori, kategori_berita.slug_kategori, 
											 users.nama")
						->from('berita')
						->join('kategori_berita', 'kategori_berita.id_kategori_berita = berita.id_kategori_berita', 'left')
						->join('users', 'users.id_user = berita.id_user', 'left')
						->where(['status_berita' => 'publish', 'berita.id_kategori_berita' => $id_kategori])
						->order_by('id_berita', 'DESC')
						->limit($limit, $start)
						->get()->result();
	} 

	// Listing main kategori berita
	public function total_kategori_berita($id_kategori)
	{
		// Join dg 2 tabel
		return $this->db->select('berita.*, kategori_berita.nama_kategori, kategori_berita.slug_kategori, 
											users.nama')
						->from('berita')
						->join('kategori_berita', 'kategori_berita.id_kategori_berita = berita.id_kategori_berita', 'left')
						->join('users', 'users.id_user = berita.id_user', 'left')
						->where(['status_berita' => 'publish', 'berita.id_kategori_berita' => $id_kategori])
						->order_by('id_berita', 'DESC')
						->get()->result();
	} 
}

/* End of file Berita_model.php */
/* Location: ./application/models/Berita_model.php */