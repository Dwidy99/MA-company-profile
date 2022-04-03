<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_model extends CI_Model {

	// Listing Layanan
	public function listing()
	{
		return $this->db->select('layanan.*, 
									users.nama')
						->from('layanan')
						->join('users', 'users.id_user = layanan.id_user', 'LEFT')
						->order_by('id_layanan', 'DESC')
						->get()->result();
	} 

	// Listing author
	public function author_admin($id_user) {
		// End join
		return $this->db->select('layanan.*, users.nama')
						->from('layanan')
						->join('users','users.id_user = layanan.id_user','LEFT')
						->where(array(	'layanan.id_user'	=> $id_user))
						->order_by('id_layanan','DESC')
						->get()->result();
	}

	// Detail Layanan
	public function detail($id_layanan)
	{
		return $this->db->select('*')
						->from('layanan')
						->where('id_layanan', $id_layanan)
						->order_by('id_layanan')
						->get()->row();
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

		$this->db->set('id_user', $this->session->userdata('id_userAdmin'));
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
		return $this->db->where('id_layanan', $id_layanan)
						->delete('layanan');
	}

	// Main Page
	// Listing Layanan
	// Edit hit
	public function update_hit($hit) {
		$this->db->where('id_layanan',$hit['id_layanan'])
				 ->update('layanan',$hit);
	}
	
	public function home()
	{
		return $this->db->select('layanan.*, 
									users.nama')
						->from('layanan')
						->join('users', 'users.id_user = layanan.id_user', 'LEFT')
						->where('layanan.status_layanan', 'publish')
						->order_by('id_layanan', 'DESC')
						->limit(3)
						->get()->result();
	} 

	// Listing total Layanan
	public function read($slug_layanan)
	{
		return $this->db->select('layanan.*, 
									users.nama')
						->from('layanan')
						->join('users', 'users.id_user = layanan.id_user', 'LEFT')
						->where(['layanan.status_layanan' => 'publish', 'layanan.slug_layanan' => $slug_layanan])
						->order_by('id_layanan', 'DESC')
						->get()->row();
	} 

	// Listing Layanan main page
	public function layanan($limit, $start)
	{
		return $this->db->select('layanan.*, 
									users.nama')
						->from('layanan')
						->join('users', 'users.id_user = layanan.id_user', 'LEFT')
						->order_by('id_layanan', 'DESC')
						->where('layanan.status_layanan', 'publish')
						->limit($limit, $start)
						->get()->result();
	} 

	// Listing total Layanan
	public function total_layanan()
	{
		return $this->db->select('layanan.*, 
											users.nama')
						->from('layanan')
						->join('users', 'users.id_user = layanan.id_user', 'LEFT')
						->where('layanan.status_layanan', 'publish')
						->order_by('id_layanan', 'DESC')
						->get()->result();
	} 
	// End Main Page
}

/* End of file Layanan_model.php */
/* Location: ./application/models/Layanan_model.php */
