<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oops extends CI_Controller {

	// Main page oops
   public function index()
   {
      $configure = $this->Konfigurasi_model->listing();
      
      $data = array('title' => 'Oops..',
                           'keywords' => $configure->keywords . ' - ' . $configure->tagline . ' - ' . $configure->keywords, 
                           'deskripsi' => $configure->deskripsi,  
                           'isi' => 'oops/list');
      $this->load->view('layout/wrapper', $data, FALSE);
   }

}

/* End of file Oops.php */
/* Location: ./application/controllers/Oops.php */