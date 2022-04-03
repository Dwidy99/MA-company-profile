<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		$this->load->model('download_model');
		$this->load->model('kategori_download_model');
		$this->load->model('konfigurasi_model');
	}
		// Main page
	public function index()	{
		$site 	= $this->konfigurasi_model->listing();
		$kategoriDownload 	= $this->kategori_download_model->kategoriDownload();

		$data = array(	'title'		=> 'Download - '.$site->namaweb,
			'deskripsi'	=> 'Download - '.$site->namaweb,
			'keywords'	=> 'Download - '.$site->namaweb,
			'download'	=> $kategoriDownload,
			'site'		=> $site,
			'isi'		=> 'download/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Download
	public function unduh($id=null)
	{
		if ($id == NULL) {redirect('oops','refresh');}
		
		$download = $this->download_model->detail($id);
		$data = 'assets/uploads/download/'.$download->gambar;
		if (file_exists($data)) {
			force_download($data, NULL);
		}
	}

}

/* End of file Download.php */
/* Location: ./application/controllers/Download.php */