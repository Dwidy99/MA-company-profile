<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	// Listing User
	public function listing()
	{
		return $this->db->select('*')
						->from('users')
						->order_by('id_user', 'ASC')
						->get()->result();
	} 

	// Detail User
	public function detail($id_user)
	{
		return $this->db->select('*')
						->from('users')
						->where('id_user', $id_user)
						->order_by('id_user')
						->get()->row();
	}

	// Tambah Data
	public function tambah($data)
	{
		return $this->db->insert('users', $data);
	}

	// Edit Data
	public function edit($id_user)
	{
		$i = $this->input;
			
		if ($i->post('password') == true) {
			// set password
			$this->db->set('password', password_hash($i->post('password'), PASSWORD_DEFAULT));
		}

		$this->db->set('nama', $i->post('nama'));
		$this->db->where('id_user', $id_user);
		$this->db->update('users');
	}

	// Delete
	public function hapus($id_user)
	{
		return $this->db->where('id_user', $id_user)
						->delete('users');
	}

	// Detail Login
	public function login($username, $password)
	{
		return $this->db->select('*')
						->from('users')
						->where('username', $username)
						->where('password', $password)
						->order_by('id_user')
						->get()->row();
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */