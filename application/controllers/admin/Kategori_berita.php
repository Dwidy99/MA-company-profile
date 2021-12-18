<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_berita extends CI_Controller {

   public function __construct()
   {
      parent::__construct();
      $this->load->model('KategoriBerita_model');
   }
   
   public function index()
   {
      $NewsKategories = $this->KategoriBerita_model->listing();

      $valid = $this->form_validation;
      $valid->set_rules('nama_kategori', 'Nama Kategori', 'required|is_unique[kategori_berita.nama_kategori]',
         array(
            'required' => '%s harus diisi',
            'is_unique' => '%s '. $this->input->post('nama_kategori',true) .' sudah ada gunakan nama lain'
         ));
         $valid->set_rules('urutan', 'Urutan', 'required|is_unique[kategori_berita.urutan]',
         [
            'required' => '%s harus diisi',
            'is_unique' => '%s '. $this->input->post('urutan',true) .' sudah ada gunakan urutan lain'
         ]);
      
      if ($valid->run() === FALSE) {
         $data = [
            'title' => 'Kategori Berita ('. count($NewsKategories) .')',
            'newsKategories'		=> $NewsKategories,
            'isi' => 'admin/kategoriBerita/list'
         ];
         $this->load->view('admin/layout/wrapper', $data, false);
      } else {
         $i = $this->input;
         $data = [
            'nama_kategori' => $i->post('nama_kategori'),
            'slug_kategori' => url_title($i->post('nama_kategori'), 'dash', TRUE),
            'urutan' => $i->post('urutan')
         ];
         $this->KategoriBerita_model->tambah($data);
         $this->session->set_flashdata('success', 'Data telah ditambahkan');
         redirect(base_url('admin/kategori_berita'), 'refresh');
      }
   }

   public function edit($id_kategori_berita)
   {
      $NewsKategory = $this->KategoriBerita_model->detail($id_kategori_berita);
      
      $i = $this->input;
      $nama_kategori = $i->post('nama_kategori',true);
      $urutan = $i->post('urutan',true);

      if ($NewsKategory->nama_kategori !== $nama_kategori) {
         $is_newsKategory = '|is_unique[kategori_berita.nama_kategori]';
      } else {
         $is_newsKategory = '';
      }
      
      if ($NewsKategory->urutan !== $urutan) {
         $is_urutan = '|is_unique[kategori_berita.urutan]';
      } else {
         $is_urutan = '';
      }

      $valid = $this->form_validation;
      $valid->set_rules('nama_kategori', 'Nama Kategori', 'required'. $is_newsKategory,
         array(
            'required' => '%s harus diisi',
            'is_unique' => '%s '. $nama_kategori .' sudah ada gunakan nama lain'
         ));
         $valid->set_rules('urutan', 'Urutan', 'required'. $is_urutan,
         [
            'required' => '%s harus diisi',
            'is_unique' => '%s '. $urutan .' sudah ada gunakan urutan lain'
         ]);
      
      if ($valid->run() === FALSE) {
         $data = [
            'title' => 'Kategori Berita '. $NewsKategory->nama_kategori,
            'newsKategory'		=> $NewsKategory,
            'isi' => 'admin/kategoriBerita/edit'
         ];
         $this->load->view('admin/layout/wrapper', $data, false);
      } else {
         $data = [
            'id_kategori_berita' => $id_kategori_berita,
            'nama_kategori' => $nama_kategori,
            'slug_kategori' => url_title($i->post('nama_kategori'), 'dash', TRUE),
            'urutan' => $urutan
         ];
         $this->KategoriBerita_model->edit($data);
         $this->session->set_flashdata('success', 'Data telah ditambahkan');
         redirect(base_url('admin/kategori_berita'), 'refresh');
      }
   }

   public function hapus($id_kategori_berita)
   {
      // proses delete
      $this->check_login->check();
      
      $id_kategori = $this->KategoriBerita_model->detail($id_kategori_berita);
      $data = array(
         'id_kategori_berita' => $id_kategori->id_kategori_berita,
      );
      $this->KategoriBerita_model->hapus($data);
      $this->session->set_flashdata('success', 'Data telah dihapus');
      redirect(base_url('admin/kategori_berita'), 'refresh');
   }

}
?>