<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_model extends CI_Model {

	// Listing Kontak
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('kontak');
		$this->db->order_by('id_kontak', 'DESC');
		$query = $this->db->get();
		return $query->result();
	} 

	// Detail Kontak
	public function detail($id_kontak)
	{
		$this->db->select('*');
		$this->db->from('kontak');
		$this->db->where('id_kontak', $id_kontak);
		$this->db->order_by('id_kontak');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah Data
	public function tambah($data)
	{
		return $this->db->insert('kontak', $data);
	}

	// Edit Data
	public function edit($id_kontak)
	{
		$i = $this->input;
			
		if ($i->post('password') == true) {
			// set password
			$this->db->set('password', password_hash($i->post('password'), PASSWORD_DEFAULT));
		}

		$this->db->set('nama', $i->post('nama'));
		$this->db->where('id_kontak', $id_kontak);
		$this->db->update('kontak');
	}

	// Delete
	public function hapus($id_kontak)
	{
		$this->db->where('id_kontak', $id_kontak);
		return $this->db->delete('kontak');
	}

	// Detail Login
	public function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('kontak');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->order_by('id_kontak');
		$query = $this->db->get();
		return $query->row();
	}
}

/* End of file Kontak_model.php */
/* Location: ./application/models/Kontak_model.php */