<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Konfigurasi_model');
   }

	// Main page kontak
   public function index()
   {
      $configure = $this->Konfigurasi_model->listing();

      $i = $this->input;
		$name = $i->post('name', true);
		$email = $i->post('email', true);
		$message = $i->post('message', true);
		$subject = $i->post('subject', true);
		// validasi
		$valid = $this->form_validation;
		$valid->set_rules('name', 'Nama', 'required');
		$valid->set_rules('email', 'Email', 'required|valid_email');
		$valid->set_rules('subject', 'Subject', 'required');
		$valid->set_rules('message', 'Message', 'required|min_length[6]');

      if ($valid->run() == FALSE) {
         $data = array('title' => 'Kontak - '.$configure->namaweb.' - '.$configure->tagline,
                              'keywords' => 'Kontak - '.$configure->namaweb.' - '.$configure->tagline,
                              'deskripsi' => 'Kontak - '.$configure->namaweb.' - '.$configure->tagline,
                              'configure' => $configure,
                              'isi' => 'kontak/list');
         $this->load->view('layout/wrapper', $data, FALSE);
      } else {
         $data = [
				'nama' 			=> $name,
				'email' 		     => $email,
				'pesan' 		   => $message,
				'subject' 		=> $subject,
				'tanggal' 	   => date('Y-m-d H:i:s'),
			];
         $this->db->insert('kontak', $data);
         
			$this->session->set_flashdata('success', 'Data Berhasil dikirim!');
			redirect(base_url('kontak'),'refresh');
      }
      
   }

}

/* End of file Kontak.php */
/* Location: ./application/controllers/Kontak.php */