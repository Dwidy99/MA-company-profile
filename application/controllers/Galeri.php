<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      date_default_timezone_set('Asia/Jakarta');
      $this->load->model('Galeri_model');
      $this->load->model('Konfigurasi_model');
      $this->load->model('Berita_model');
   }

   public function index()
   {
      $configure = $this->Konfigurasi_model->listing();
      $kNews = $this->Konfigurasi_model->menu_berita();

      
      // List Berita dengan Pagination
      $this->load->library('pagination');

      $config['base_url'] = base_url('galeri/index/');
      $config['per_page'] = 9;
      $config['total_rows'] = count($this->Galeri_model->total_galeri());
      $config['uri_segment'] = 3;
      
      $this->pagination->initialize($config);
      
      $limit                     = $config['per_page'];
      $start                     = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

      $galleries = $this->Galeri_model->galeriDATE($limit, $start);
      // End List Berita dengan Pagination

      $data = [
                     'title' => $configure->namaweb,
                     'keywords' => $configure->keywords . ' - ' . $configure->tagline . ' - ' . $configure->keywords, 
                     'deskripsi' => $configure->deskripsi, 
                     'configure' => $configure,
                     'kNews' => $kNews,
                     'galleries' => $galleries,
                     'paginasi' => $this->pagination->create_links(), 
                     'isi' => 'galeri/list'
                  ];
      $this->load->view('layout/wrapper', $data, FALSE);
   }
}


?>