<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Dashboard_model');
      $this->load->model('Berita_model');
      $this->load->model('Galeri_model');
      $this->load->model('Layanan_model');
      $this->load->model('User_model');
      $this->load->model('Konfigurasi_model');
   }

   public function index()
   {
      $news       = $this->Berita_model->listing();
      $galleries  = $this->Galeri_model->listing();
      $users      = $this->User_model->listing();
      $services   = $this->Layanan_model->listing();

      $kunjungan = $this->Dashboard_model->kunjungan();
      $kunjunganSeminggu = $this->Kunjungan_model->listing();

      $data = array( 'title'                    => 'Halaman Dashboard Administrator',
                     'news'                        => $news,
                     'galleries'                   => $galleries,
                     'users'                       => $users,
                     'services'                    => $services,
                     'kunjungan'                   => $kunjungan,
                     'kunjunganSeminggu'     => $kunjunganSeminggu,
                     'isi'                               => 'admin/dashboard/list');
      $this->load->view('admin/layout/wrapper', $data, FALSE);
   }
}
?>