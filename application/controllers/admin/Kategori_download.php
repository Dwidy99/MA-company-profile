<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_download extends CI_Controller {

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Kategori_download_model');
   }
   
   public function index()
   {
      $DownLoadkategories = $this->Kategori_download_model->listing();

      $valid = $this->form_validation;
      $valid->set_rules('nama_kategori', 'Nama Kategori', 'required|is_unique[kategori_download.nama_kategori_download]',
         array(
            'required'  => '%s harus diisi',
            'is_unique' => '%s '. $this->input->post('nama_kategori',true) .' sudah ada gunakan nama lain'
         ));
         $valid->set_rules('urutan', 'Urutan', 'required|is_unique[kategori_download.urutan]|numeric',
         [
            'required'  => '%s harus diisi',
            'is_unique' => '%s '. $this->input->post('urutan',true) .' sudah ada gunakan urutan lain'
         ]);

      
      if ($valid->run() === FALSE) {

         $data = [
            'title'           => 'Kategori Download ('. count($DownLoadkategories) .')',
            'newsKategories'	=> $DownLoadkategories,
            'isi'             => 'admin/kategoriDownload/list'
         ];
         $this->load->view('admin/layout/wrapper', $data, false);
      } else {
         $i = $this->input;
         $data = [
            'nama_kategori_download'   => $i->post('nama_kategori'),
            'slug_kategori_download'   => url_title($i->post('nama_kategori'), 'dash', TRUE),
            'urutan'          => $i->post('urutan')
         ];
         $this->Kategori_download_model->tambah($data);
         $this->session->set_flashdata('success', 'Data telah ditambahkan');
         redirect(base_url('admin/kategori_download'), 'refresh');
      }
   }

   public function edit($id_kategori_download)
   {
      if ($id_kategori_download == NULL) {redirect('oops','refresh');}

      $DownloadCategory = $this->Kategori_download_model->detail($id_kategori_download);
      
      $i = $this->input;
      $nama_kategori = $i->post('nama_kategori',true);
      $urutan        = $i->post('urutan',true);

      if ($DownloadCategory->nama_kategori_download !== $nama_kategori) {
         $is_downloadCategory = '|is_unique[kategori_download.nama_kategori_download]';
      } else {
         $is_downloadCategory = '';
      }
      
      if ($DownloadCategory->urutan !== $urutan) {
         $is_urutan = '|is_unique[kategori_download.urutan]';
      } else {
         $is_urutan = '';
      }

      $valid = $this->form_validation;
      $valid->set_rules('nama_kategori', 'Nama Kategori', 'required'. $is_downloadCategory,
         array(
            'required'  => '%s harus diisi',
            'is_unique' => '%s '. $nama_kategori .' sudah ada gunakan nama lain'
         ));
         $valid->set_rules('urutan', 'Urutan', 'required'. $is_urutan,
         [
            'required'  => '%s harus diisi',
            'is_unique' => '%s '. $urutan .' sudah ada gunakan urutan lain'
         ]);
      
      if ($valid->run() === FALSE) {
         $data = [
            'title'              => 'Kategori Download '. $DownloadCategory->nama_kategori_download,
            'DownloadKategori'	=> $DownloadCategory,
            'isi'                => 'admin/kategoriDownload/edit'
         ];
         $this->load->view('admin/layout/wrapper', $data, false);
      } else {
         $data = [
            'id_kategori_download' => $id_kategori_download,
            'nama_kategori_download'      => $nama_kategori,
            'slug_kategori_download'      => url_title($i->post('nama_kategori'), 'dash', TRUE),
            'urutan'             => $urutan
         ];
         $this->Kategori_download_model->edit($data);
         $this->session->set_flashdata('success', 'Data telah ditambahkan');
         redirect(base_url('admin/kategori_download'), 'refresh');
      }
   }

   // public function hapus($id_kategori_download)
   // {
   //    // Proteksi proses delete harus login
   //    // Tambahkan proteksi halaman
   //    $url_pengalihan = str_replace('index.php/', '', current_url());
   //    $pengalihan    = $this->session->set_userdata('pengalihan',$url_pengalihan);
   //    // proses delete
   //    $this->check_login->check($pengalihan);
      
   //    $id_kategori = $this->Kategori_download_model->detail($id_kategori_download);
   //    $data = array(
   //       'id_kategori_download' => $id_kategori->id_kategori_download,
   //    );
   //    $this->Kategori_download_model->hapus($data);
   //    $this->session->set_flashdata('success', 'Data telah dihapus');
   //    redirect(base_url('admin/kategori_download'), 'refresh');
   // }

}
?>