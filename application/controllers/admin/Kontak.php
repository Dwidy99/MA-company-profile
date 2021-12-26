<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Kontak_model');
   }

   public function index()
   {
      $pesanPengunjung = $this->Kontak_model->listing();

      $data = [
         'title'		         => 'Pesan Pengunjung ' . '(' . count([$pesanPengunjung]) . ')',
         'pesanPengunjung'		=> $pesanPengunjung,
         'isi'		            => 'admin/kontak/list'
      ];
      $this->load->view('admin/layout/wrapper', $data, FALSE);
   }

   public function detail($id_kontak)
   {
      $id_kontak        = $this->uri->segment(4);
      $pesanPengunjung  = $this->Kontak_model->detail($id_kontak);

      $data = [
         'title'		         => 'Pesan dari ' . $pesanPengunjung->nama,
         'pesanPengunjung'		=> $pesanPengunjung,
         'isi'		            => 'admin/kontak/detail'
      ];
      $this->load->view('admin/layout/wrapper', $data, FALSE);
   }
}
?>