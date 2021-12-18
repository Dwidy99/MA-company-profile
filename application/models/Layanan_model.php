<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_model extends CI_Model {

	// Listing Layanan
	public function listing()
	{
		$this->db->select('layanan.*, 
																users.nama');
		$this->db->from('layanan');
		$this->db->join('users', 'users.id_user = layanan.id_user', 'LEFT');
		$this->db->order_by('id_layanan', 'DESC');
		$query = $this->db->get();
		return $query->result();
	} 

	// Listing author
	public function author_admin($id_user) {
		$this->db->select('layanan.*, users.nama');
		$this->db->from('layanan');
		$this->db->join('users','users.id_user = layanan.id_user','LEFT');
		// End join
		$this->db->where(array(	'layanan.id_user'	=> $id_user));
		$this->db->order_by('id_layanan','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail Layanan
	public function detail($id_layanan)
	{
		$this->db->select('*');
		$this->db->from('layanan');
		$this->db->where('id_layanan', $id_layanan);
		$this->db->order_by('id_layanan');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah Data
	public function tambah($data)
	{
		return $this->db->insert('layanan', $data);
	}

	// Edit Data
	public function edit($id_layanan, $gambar='')
	{
		$i = $this->input;

		// Apabila gambar tidak diubah
		if ($gambar !== "") {
			$this->db->set('gambar', $gambar);
		}

		$this->db->set('id_user', $this->session->userdata('id_user'));
		$this->db->set('judul_layanan', $i->post('judul_layanan'));
		$this->db->set('slug_layanan', url_title($i->post('judul_layanan', true), 'dash', TRUE));
		$this->db->set('isi_layanan', $i->post('isi_layanan'));
		$this->db->set('harga', $i->post('harga', true));
		$this->db->set('status_layanan', $i->post('status_layanan', true));
		$this->db->set('keywords', $i->post('keywords', true));
		$this->db->set('tanggal_post', date('Y-m-d H:i:s'));
		$this->db->where('id_layanan', $id_layanan);
		$this->db->update('layanan');
	}

	// Delete
	public function hapus($id_layanan)
	{
		$this->db->where('id_layanan', $id_layanan);
		return $this->db->delete('layanan');
	}

	// Main Page
	// Listing Layanan
	// Edit hit
	public function update_hit($hit) {
		$this->db->where('id_layanan',$hit['id_layanan']);
		$this->db->update('layanan',$hit);
	}
	
	public function home()
	{
		$this->db->select('layanan.*, 
																users.nama');
		$this->db->from('layanan');
		$this->db->join('users', 'users.id_user = layanan.id_user', 'LEFT');
		$this->db->where('layanan.status_layanan', 'publish');
		$this->db->order_by('id_layanan', 'DESC');
		$this->db->limit(3);
		$query = $this->db->get();
		return $query->result();
	} 

	// Listing total Layanan
	public function read($slug_layanan)
	{
		$this->db->select('layanan.*, 
									users.nama');
		$this->db->from('layanan');
		$this->db->join('users', 'users.id_user = layanan.id_user', 'LEFT');
		$this->db->where(['layanan.status_layanan' => 'publish', 'layanan.slug_layanan' => $slug_layanan]);
		$this->db->order_by('id_layanan', 'DESC');
		$query = $this->db->get();
		return $query->row();
	} 

	// Listing Layanan main page
	public function layanan($limit, $start)
	{
		$this->db->select('layanan.*, 
																users.nama');
		$this->db->from('layanan');
		$this->db->join('users', 'users.id_user = layanan.id_user', 'LEFT');
		$this->db->order_by('id_layanan', 'DESC');
		$this->db->where('layanan.status_layanan', 'publish');
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result();
	} 

	// Listing total Layanan
	public function total_layanan()
	{
		$this->db->select('layanan.*, 
																users.nama');
		$this->db->from('layanan');
		$this->db->join('users', 'users.id_user = layanan.id_user', 'LEFT');
		$this->db->where('layanan.status_layanan', 'publish');
		$this->db->order_by('id_layanan', 'DESC');
		$query = $this->db->get();
		return $query->result();
	} 
	// End Main Page
}

/* End of file Layanan_model.php */
/* Location: ./application/models/Layanan_model.php */