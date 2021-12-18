<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

   public function __construct()
   {
      parent::__construct();
      $this->load->model('User_model');
   }

   public function index()
   {
      $id_user = $this->session->userdata('id_user');
      $user = $this->User_model->detail($id_user);
		
		// validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama', 'Nama', 'required', ['required' => '%s harus diisi']);

		if ($valid->run() == FALSE) {
			$data = [
				'title'		=> 'Edit User Profil '. $user->nama,
				'user'		=> $user,
				'isi'		=> 'admin/profile/list'
			];
			$this->load->view('admin/layout/wrapper', $data, FALSE);

		} else {
			$this->User_model->edit($id_user);
			$this->session->set_flashdata('success', 'Profil Berhasil diupdate!');
			redirect(base_url('admin/user'),'refresh');
		}
   }
}
?>