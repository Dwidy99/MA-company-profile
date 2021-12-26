<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $load = $this->load;
      $load->model('Berita_model');
      $load->model('Konfigurasi_model');
      $load->model('Layanan_model');
      $load->model('Galeri_model');
   }

   public function index()
   {
      $configure     = $this->Konfigurasi_model->listing();
      $sliders       = $this->Galeri_model->slider();
      $galleries     = $this->Galeri_model->galeri();
      $servicesNew   = $this->Layanan_model->home();
      $services      = $this->Layanan_model->listing();
      $AllNews       = $this->Berita_model->listing();
      $news          = $this->Berita_model->home();
      $lastesNews    = $this->Berita_model->berita_baru();

      $data = [
                  'title'        => $configure->namaweb . ' | ' . $configure->tagline,
                  'keywords'     => $configure->keywords . ' - ' . $configure->tagline . ' - ' . $configure->keywords, 
                  'deskripsi'    => $configure->deskripsi,  
                  'configure'    => $configure,  
                  'sliders'      => $sliders,  
                  'galleries'    => $galleries,  
                  'servicesNew'  => $servicesNew,  
                  'services'     => $services,  
                  'AllNews'      => $AllNews,
                  'news'         => $news,
                  'lastesNews'   => $lastesNews,
                  'isi'          => 'home/list'
               ];
      $this->load->view('layout/wrapper', $data, FALSE);
   }
}



?>