<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Layanan_model');
   }

   // Main page layanan
   public function index()
   {
      $configure = $this->Konfigurasi_model->listing();

    // List Layanan dengan Pagination
    $this->load->library('pagination');

    $config['base_url']       = base_url('layanan/index/');
    $config['per_page']       = 9;
    $config['total_rows']     = count($this->Layanan_model->total_layanan());
    $config['uri_segment']    = 3;
    
    $this->pagination->initialize($config);
    
    $limit                    = $config['per_page'];
    $start                    = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

    $services = $this->Layanan_model->layanan($limit, $start);
    // End List Layanan dengan Pagination
      
      $data = [
         'title'        => 'Layanan - '.$configure->namaweb,
         'deskripsi'    => 'Layanan - '.$configure->namaweb,
         'keywords'     => 'Layanan - '.$configure->namaweb,
         'paginasi'     => $this->pagination->create_links(),
         'services'     => $services,
         'limit'        => $limit,
         'start'        => $start,
         'total_rows'   => $config['total_rows'],
         'isi'          => 'layanan/list'
      ];
      $this->load->view('layout/wrapper', $data, FALSE);
   }

    // Detail page layanan
   public function read($slug_layanan=NULL)
   {
      if ($slug_layanan == NULL) {redirect('oops','refresh');}

      $configure  = $this->Konfigurasi_model->listing();
      $service    = $this->Layanan_model->read($slug_layanan);

      if(count(array($service)) < 1) {
			redirect(base_url('oops'),'refresh');
		}

      // Update hit
		if($service) {
			$servicehits 	= $service->hits + 1;
			$hit 	= [	
                     'id_layanan'	=> $service->id_layanan,
							'hits'		   => $servicehits
               ];
			$this->Layanan_model->update_hit($hit);
		}
		//  End update hit
      
      $data = [
               'title'     => $service->judul_layanan,
               'deskripsi' => $service->judul_layanan . ', ' .$service->keywords,
               'keywords'  => $service->judul_layanan . ', ' .$service->keywords,
               'service'   => $service,
               'isi'       => 'layanan/read'
            ];
      $this->load->view('layout/wrapper', $data, FALSE);
   }
}

?>