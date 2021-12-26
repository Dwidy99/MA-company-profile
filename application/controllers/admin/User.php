<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	public function index()
	{
		$users = $this->User_model->listing();

		$data = [
			'title'		=> 'Data User Admin ('. count($users) .')',
			'users'		=> $users,
			'isi'		=> 'admin/user/list'
		];
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	
	//  Tambah
	public function tambah()
	{
		$i = $this->input;
		$username = $i->post('username', true);
		$email = $i->post('email', true);
		// validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama', 'Nama', 'required', ['required' => '%s harus diisi']);
		$valid->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]', 
			[
				'required' 		=> '%s harus diisi',
				'valid_email' 	=> '%s tidak valid', 'is_unique' => '%s <b>'. $email .'</b> sudah terdaftar gunakan email lain'
			]
		);
		$valid->set_rules('username', 'Username', 'required|trim|is_unique[users.username]|min_length[6]|max_length[32]', 
			[
				'required' 		=> '%s harus diisi',
				'is_unique' 	=> '%s <b>'. $username .'</b> sudah terdaftar gunakan username lain',
				'min_length' 	=> '%s minimal 6 karakter',
				'max_length' 	=> '%s maksimal 32 karakter'
			]
		);
		$valid->set_rules('password', 'Password', 'required|trim|min_length[6]', 
			[
				'required' 		=> '%s harus diisi',
				'is_unique' 	=> '%s sudah terdaftar gunanak %s lain', 
				'min_length' 	=> '%s minimal 6 karakter'
			]

		);

		if ($valid->run() == FALSE) {
			$data = [
				'title'		=> 'Tambah User Administrator',
				'isi'		=> 'admin/user/tambah'
			];
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		} else {
			$data = [
				'nama' 			=> $i->post('nama', true),
				'email' 		=> $email,
				'username' 		=> $username,
				'password' 		=> password_hash($i->post('password'), PASSWORD_DEFAULT),
				'akses_level' 	=> $i->post('akses_level', true),
			];
			$this->User_model->tambah($data);
			$this->session->set_flashdata('success', 'Data Berhasil ditambahkan!');
			redirect(base_url('admin/user'),'refresh');
		}
	}

	// Edit
	public function edit($id_user = NULL)
	{
		$user = $this->User_model->detail($id_user);
		
		// validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama', 'Nama', 'required', ['required' => '%s harus diisi']);

		if ($valid->run() == FALSE) {
			$data = [
				'title'		=> 'Edit User Administrator '. $user->nama,
				'user'		=> $user,
				'isi'		=> 'admin/user/edit'
			];
			$this->load->view('admin/layout/wrapper', $data, FALSE);

		} else {
			$this->User_model->edit($id_user);
			$this->session->set_flashdata('success', 'Data Berhasil diupdate!');
			redirect(base_url('admin/user'),'refresh');
		}
	}

	// Delete
	public function hapus($id_user)
	{
		// Proteksi delete
		$this->check_login->check();
		
		$this->User_model->hapus($id_user);
		$this->session->set_flashdata('success', 'Data Berhasil dihapus!');
		redirect(base_url('admin/user'),'refresh');
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */