<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_model extends CI_Model {

	// Listing Kontak
	public function listing()
	{
		return $this->db->select('*')
						->from('kontak')
						->order_by('id_kontak', 'DESC')
						->get()->result();
	} 

	// Detail Kontak
	public function detail($id_kontak)
	{
		return $this->db->select('*')
						->from('kontak')
						->where('id_kontak', $id_kontak)
						->order_by('id_kontak')
						->get()->row();
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
		return $this->db->where('id_kontak', $id_kontak)
						->delete('kontak');
	}

	// Detail Login
	public function login($username, $password)
	{
		return $this->db->select('*')
						->from('kontak')
						->where('username', $username)
						->where('password', $password)
						->order_by('id_kontak')
						->get()->row();
	}
}

/* End of file Kontak_model.php */
/* Location: ./application/models/Kontak_model.php */