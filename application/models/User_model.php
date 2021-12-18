<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	// Listing User
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('id_user', 'ASC');
		$query = $this->db->get();
		return $query->result();
	} 

	// Detail User
	public function detail($id_user)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id_user', $id_user);
		$this->db->order_by('id_user');
		$query = $this->db->get();
		return $query->row();
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
		$this->db->where('id_user', $id_user);
		return $this->db->delete('users');
	}

	// Detail Login
	public function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->order_by('id_user');
		$query = $this->db->get();
		return $query->row();
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */