<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller
{
   function __construct()
   {
       parent::__construct();
       $this->load->model('Berita_model');
       $this->load->model('KategoriBerita_model');
   }

   // Main page berita
   public function index()
   {
      $configure  = $this->Konfigurasi_model->listing();
      $kNews      = $this->Konfigurasi_model->menu_berita();
      
      // List Berita dengan Pagination
      $this->load->library('pagination');

      $config['base_url']     = base_url('berita/index/');
      $config['per_page']     = 6;
      $config['total_rows']   = count($this->Berita_model->total_berita());
      $config['uri_segment']  = 3;
      
      $this->pagination->initialize($config);
      
      $limit                  = $config['per_page'];
      $start                  = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

      $news = $this->Berita_model->berita($limit, $start);
      // End List Berita dengan Pagination
      
      $data = array( 'title'        => 'Berita - '.$configure->namaweb,
                     'deskripsi'    => 'Berita - ' . $configure->namaweb,
                     'keywords'     => 'Berita - ' . $configure->namaweb,
                     'paginasi'     => $this->pagination->create_links(),
                     'configure'    => $configure,
                     'news'         => $news,
                     'kNews'        => $kNews,
                     'limit'        => $limit,
                     'start'        => $start,
                     'total_rows'   => $config['total_rows'],
                     'isi'          => 'berita/list');
      $this->load->view('layout/wrapper', $data, FALSE);
   }

   // Main kategori berita
   public function kategori($slug_kategori=NULL)
   {
      if ($slug_kategori == NULL) {redirect('oops','refresh');}
      $category      = $this->KategoriBerita_model->read($slug_kategori);
      $id_kategori   = $category->id_kategori_berita;
      $configure     = $this->Konfigurasi_model->listing();
      
      $kNews = $this->Konfigurasi_model->menu_berita();
      // List Berita
      $this->load->library('pagination');

      $config['base_url']      = base_url('berita/kategori/'.$slug_kategori.'/index/');
      $config['per_page']      = 4;
      $config['total_rows']    = count($this->Berita_model->total_kategori_berita($id_kategori));
      $config['uri_segment']   = 5;
      
      $this->pagination->initialize($config);
      
      $limit                   = $config['per_page'];
      $start                   = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

      $news = $this->Berita_model->kategori_berita($id_kategori, $limit, $start);
      // End List Berita
      
      $data = array('title'         => 'Kategori Berita - '.$category->nama_kategori,
                     'deskripsi'    => 'Kategori Berita - ' . $category->nama_kategori,
                     'keywords'     => $category->nama_kategori,
                     'paginasi'     => $this->pagination->create_links(),
                     'configure'    => $configure,
                     'category'     => $category,
                     'news'         => $news,
                     'kNews'        => $kNews,
                     'limit'        => $limit,
                     'start'        => $start,
                     'total_rows'   => $config['total_rows'],
                     'isi'          => 'berita/list');
      $this->load->view('layout/wrapper', $data, FALSE);
   }

    // Detail page berita
    public function read($slug_berita = NULL)
    {
      if ($slug_berita == NULL) {redirect('oops','refresh');}

       $new          = $this->Berita_model->read($slug_berita);
       $home         = $this->Berita_model->home();
       $configure    = $this->Konfigurasi_model->listing();

       if(count(array($new)) < 1) {redirect(base_url('oops'),'refresh');}

      // Update hit
		if($new) {
			$newhits 	= $new->hits + 1;
			$hit 		   = array(	'id_berita'	=> $new->id_berita,
									   'hits'		=> $newhits);
			$this->Berita_model->update_hit($hit);
		}
		//  End update hit
       
       $data = array('title'        => $new->judul_berita,
                     'deskripsi'    => $new->judul_berita,
                     'keywords'     => $new->judul_berita,
                     'configure'    => $configure,
                     'new'          => $new,
                     'home'         => $home,
                      'isi'         => 'berita/read');
       $this->load->view('layout/wrapper', $data, FALSE);
    }
}

?>