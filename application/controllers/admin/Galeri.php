<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Galeri_model');
	}

	public function index()
	{
		$Galleries = $this->Galeri_model->listing();

		$data = [
			'title'		=> 'Data Galeri ('. count($Galleries) .')',
			'galleries'	=> $Galleries,
			'isi'		=> 'admin/galeri/list'
		];
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Kategori ga
	public function kategori($id_kategori)	{
		$news 	= $this->Berita_model->kategori_admin($id_kategori);
		$kategori 	= $this->KategoriBerita_model->detail($id_kategori);

		$data = array(	'title'	=> 'Kategori berita: '.$kategori->nama_kategori.' ('.count($news).')',
						'news'	=> $news,
						'isi'	=> 'admin/berita/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Jenis galeri
	public function jenis_galeri($jenis_galeri)	{
		$berita = $this->berita_model->jenis_admin($jenis_galeri);
		$data = array(	'title'		=> 'Jenis berita: '.$jenis_galeri.' ('.count($berita).')',
						'berita'	=> $berita,
						'isi'		=> 'admin/berita/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	//  Tambah
	public function tambah()
	{
		// validasi
		$valid = $this->form_validation;
		$valid->set_rules('judul_galeri', 'Judul Galeri', 'required');
		$valid->set_rules('isi_galeri', 'Isi Galeri', 'required');
		$valid->set_rules('website', 'Website Galeri', 'valid_url');
		$valid->set_rules('posisi_galeri', 'Posisi Galeri', 'required');
		
		if ($valid->run()) {
			// Upload file
			$config['upload_path']		= './assets/uploads/galeri';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';
			$config['max_size']			= 5000;
         $config['file_ext_tolower']	= true;
			
			$upload_image = $_FILES['gambar']['name'];
			$allowed_ext  = array('jpg', 'png', 'gif', 'jpeg');
			$file_ext     = explode('.', $upload_image);
			$file_ext     = strtolower(end($file_ext));
			
			if (!in_array($file_ext, $allowed_ext)) {
				$this->session->set_flashdata('danger', 'Tipe File Tidak Diizinkan!');
				redirect('admin/galeri/tambah');
				return false;
			}
			
			if ($_FILES['gambar']['size'] > 5048000) {
				$this->session->set_flashdata('danger', 'Gambar Terlalu Besar!');
				redirect('admin/galeri/tambah');
				return false;
			}
			
			$this->load->library('upload', $config);

			
			if ( !$this->upload->do_upload('gambar'))
			{
				// $this->upload->display_errors();
            $this->session->set_flashdata('danger', 'Tipe File Dicurigai. Ganti atau Edit Gambar!');
            redirect('admin/galeri/tambah/','refresh');
				}
				else
				{
					// Proses manipulasi gambar
					$data = array('gambar' => $this->upload->data());
					// Gambar asli disimpan di folder assets/uploads/images/galeri
					// Lalu gambar asli itu di copy untuk versi mini size ke folder assets/uploads/images/galeri/thumbs
					$config['image_library']	= 'gd2';
					$config['source_image'] 	= './assets/uploads/galeri/'.$data['gambar']['file_name'];
					$config['new_image'] 		= './assets/uploads/galeri/thumbs/'.$data['gambar']['file_name'];
					$config['create_thumb'] 	= TRUE;
					$config['maintain_ratio'] 	= TRUE;
					$config['width']         	= 750;
					$config['height']       	= 750;
					$config['thumb_marker']		= '';

					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					
					$i 		= $this->input;
					$data 	= [
						'id_user'		 	=> $this->session->userdata('id_user'),
						'judul_galeri'		=> $i->post('judul_galeri', true),
						'isi_galeri'	 	=> $i->post('isi_galeri', true),
						'gambar'			=> $data['gambar']['file_name'],
						'website'			=> $i->post('website', true),
						'posisi_galeri'		=> $i->post('posisi_galeri', true),
						'tanggal_post'	  	=> date('Y-m-d H:i:s')
					];
					$this->Galeri_model->tambah($data);
					$this->session->set_flashdata('success', 'Galeri Berhasil ditambahkan!');
					redirect(base_url('admin/galeri'),'refresh');
			}
		}
		$data = [
			'title'	=> 'Tambah Galeri',
			'isi'	=> 'admin/galeri/tambah'
		];
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit
	public function edit($id_galeri = '')
	{
		$Galleries = $this->Galeri_model->detail($id_galeri);
		// validasi
		$valid = $this->form_validation;
		$valid->set_rules('judul_galeri', 'Judul Galeri', 'required');
		$valid->set_rules('isi_galeri', 'Isi Galeri', 'required');
		$valid->set_rules('website', 'Website Galeri', 'valid_url');
		$valid->set_rules('posisi_galeri', 'Posisi Galeri', 'required');
		
		if ($valid->run()) {
			// Jika tidak ganti gambar
			if (!empty($_FILES['gambar']['name'])) {
				// Upload file
				$config['upload_path']		= './assets/uploads/galeri';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
				$config['max_size']			= 5000;
            $config['file_ext_tolower']		= true;
				
				$upload_image = $_FILES['gambar']['name'];
				$allowed_ext  = array('jpg', 'png', 'gif', 'jpeg');
				$file_ext     = explode('.', $upload_image);
				$file_ext     = strtolower(end($file_ext));
	
				if (!in_array($file_ext, $allowed_ext)) {
					$this->session->set_flashdata('danger', 'Tipe File Tidak Diizinkan!');
					redirect('admin/galeri/edit/'.$id_galeri,'refresh');
					return false;
				}
				
				if ($_FILES['gambar']['size'] > 5048000) {
					$this->session->set_flashdata('danger', 'Gambar Terlalu Besar!');
					redirect('admin/galeri/edit/'.$id_galeri,'refresh');
					return false;
				}
				
				$this->load->library('upload', $config);
				
				if ( !$this->upload->do_upload('gambar'))
				{
               // $this->upload->display_errors();
					$this->session->set_flashdata('danger', 'Tipe File Dicurigai. Ganti atau Edit Gambar!');
					redirect('admin/galeri/edit/'.$id_galeri,'refresh');
					}
					else
					{
						// Proses manipulasi gambar
						$data = array('gambar' => $this->upload->data());
						// Gambar asli disimpan di folder assets/uploads/images/galeri
						// Lalu gambar asli itu di copy untuk versi mini size ke folder assets/uploads/images/galeri/thumbs
						$config['image_library']	= 'gd2';
						$config['source_image'] 	= './assets/uploads/galeri/'.$data['gambar']['file_name'];
						$config['new_image'] 		= './assets/uploads/galeri/thumbs/'.$data['gambar']['file_name'];
						$config['create_thumb'] 	= TRUE;
						$config['maintain_ratio'] 	= TRUE;
						$config['width']         	= 750;
						$config['height']       	= 450;
						$config['quality']       	= "100%";
						$config['thumb_marker']		= '';
	
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
	
						// hapus gambar lama
						if ($Galleries->gambar != "") {
							unlink('./assets/uploads/galeri/'.$Galleries->gambar);
							unlink('./assets/uploads/galeri/thumbs/'.$Galleries->gambar);
						}
						$gambar = $data['gambar']['file_name'];
						$this->Galeri_model->edit($id_galeri, $gambar);
						$this->session->set_flashdata('success', 'Data Berhasil diupdate!');
						redirect(base_url('admin/galeri'),'refresh');
					}
			} else {
				$this->Galeri_model->edit($id_galeri);
				$this->session->set_flashdata('success', 'Data Berhasil diupdate!');
				redirect(base_url('admin/galeri'),'refresh');
			}
		}
		$data = [
			'title'			=> 'Edit Galeri',
			'galleries'		=> $Galleries,
			'isi'			=> 'admin/galeri/edit'
		];
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Delete
	public function hapus($id_galeri = NULL)
	{
		if ($id_galeri == NUL) {redirect('oop','refresh');}
		// Proteksi delete
		$this->check_login->check();

		$Galleries = $this->Galeri_model->detail($id_galeri);

		// hapus gambar
		if ($Galleries->gambar != "") {
			unlink('./assets/uploads/galeri/'.$Galleries->gambar);
			unlink('./assets/uploads/galeri/thumbs/'.$Galleries->gambar);
		}
		
		$this->Galeri_model->hapus($id_galeri);
		$this->session->set_flashdata('success', 'Data Berhasil dihapus!');
		redirect(base_url('admin/galeri'),'refresh');
	}

}

/* End of file galeri.php */
/* Location: ./application/controllers/galeri.php */