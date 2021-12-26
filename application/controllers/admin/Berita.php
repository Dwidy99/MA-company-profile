<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Berita_model');
		$this->load->model('User_model');
		$this->load->model('KategoriBerita_model');
	}

	// Halaman Berita
	public function index()
	{
		$news = $this->Berita_model->listing();

		$data = [
			'title'		=> 'Data Berita ('. count($news) .')',
			'news'		=> $news,
			'isi'		=> 'admin/berita/list'
		];
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	
	// Kategori berita
	public function kategori($id_kategori)	{
		$news 		= $this->Berita_model->kategori_admin($id_kategori);
		$kategori 	= $this->KategoriBerita_model->detail($id_kategori);

		$data = array(	'title'	=> 'Kategori berita: '.$kategori->nama_kategori.' ('.count($news).')',
						'news'	=> $news,
						'isi'	=> 'admin/berita/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Author berita
	public function author($id_user)	{
		$news 	= $this->Berita_model->author_admin($id_user);
		$user 	= $this->User_model->detail($id_user);

		$data = array(	'title'	=> 'Penulis berita: '.$user->nama.' ('.count($news).')',
						'news'	=> $news,
						'isi'	=> 'admin/berita/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Jenis berita
	public function jenis_berita($jenis_berita)	{
		$news = $this->Berita_model->jenis_admin($jenis_berita);
		$data = array(	'title'	=> 'Jenis berita: '.$jenis_berita.' ('.count($news).')',
						'news'	=> $news,
						'isi'	=> 'admin/berita/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Listing kategori
	public function author_admin($id_user) {
		$this->db->select('berita.*, users.nama, nama_kategori');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.id_user'	=> $id_user));
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//  Tambah
	public function tambah()
	{
		// kategori
		$categories = $this->KategoriBerita_model->listing();
		// validasi
		$valid = $this->form_validation;
		$valid->set_rules('judul_berita', 'Judul Berita', 'required');
		$valid->set_rules('status_berita', 'Status Berita', 'required');
		$valid->set_rules('jenis_berita', 'Jenis Berita', 'required');
		$valid->set_rules('id_kategori_berita', 'Kategori Berita', 'required');
		$valid->set_rules('isi', 'Isi Berita', 'required');
		$valid->set_rules('keywords', 'Keyword Berita', 'required');
		
		if ($valid->run()) {
			// Upload file
			$config['upload_path']			= './assets/uploads/berita';
			$config['allowed_types']		= 'gif|jpg|png|jpeg';
			$config['max_size']				= 5000;
			$config['file_ext_tolower']		= true;
			
			// Cek File Gambar
			$upload_image = $_FILES['gambar']['name'];
			$allowed_ext  = array('jpg', 'png', 'gif', 'jpeg');
			$file_ext     = explode('.', $upload_image);
			$file_ext     = strtolower(end($file_ext));
			
			if (!in_array($file_ext, $allowed_ext)) {
				$this->session->set_flashdata('danger', 'Tipe File Tidak Diizinkan!');
				redirect('admin/berita/tambah');
				return false;
			}
			
			if ($_FILES['gambar']['size'] > 5048000) {
				$this->session->set_flashdata('danger', 'Gambar Terlalu Besar!');
				redirect('admin/berita/tambah');
				return false;
			}
			
			$this->load->library('upload', $config);

			
			if ( !$this->upload->do_upload('gambar'))
			{
				// $this->upload->display_errors();
				$this->session->set_flashdata('danger', 'Tipe File Dicurigai. Ganti atau Edit Gambar!');
				redirect('admin/berita/tambah/','refresh');
				}
				else
				{
					// Proses manipulasi gambar
					$data = array('gambar' => $this->upload->data());
					// Gambar asli disimpan di folder assets/uploads/images/berita
					// Lalu gambar asli itu di copy untuk versi mini size ke folder assets/uploads/images/berita/thumbs
					$config['image_library']	= 'gd2';
					$config['source_image'] 	= './assets/uploads/berita/'.$data['gambar']['file_name'];
					$config['new_image'] 		= './assets/uploads/berita/thumbs/'.$data['gambar']['file_name'];
					$config['create_thumb'] 	= TRUE;
					$config['maintain_ratio'] 	= TRUE;
					$config['width']         	= 200;
					$config['height']       	= 200;
					$config['thumb_marker']		= '';

					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					
					$i = $this->input;
					$data = [
						'id_user' 			  		 		=> $this->session->userdata('id_user'),
						'id_kategori_berita' 	  => $i->post('id_kategori_berita', true),
						'slug_berita' 		 				=> url_title($i->post('judul_berita', true), 'dash', TRUE),
						'judul_berita'		 				=> $i->post('judul_berita', true),
						'isi'				 						=> $i->post('isi', true),
						'gambar'								=> $data['gambar']['file_name'],
						'keywords'								=> $i->post('keywords', true),
						'jenis_berita'		 				=> $i->post('jenis_berita', true),
						'status_berita'					=> $i->post('status_berita', true),
						'tanggal_post'		 	  			=> date('Y-m-d H:i:s')
					];
					$this->Berita_model->tambah($data);
					$this->session->set_flashdata('success', 'Berita Berhasil ditambahkan!');
					redirect(base_url('admin/berita'),'refresh');
			}
		}
		$data = [
			'title'					=> 'Tambah Berita',
			'categories'		=> $categories,
			'isi'						=> 'admin/berita/tambah'
		];
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit
	public function edit($id_berita = NULL)
	{
		if ($id_berita == NULL) {redirect('oops','refresh');}

		$news = $this->Berita_model->detail($id_berita);
		$categories = $this->KategoriBerita_model->listing();
		// validasi
		$valid = $this->form_validation;
		$valid->set_rules('judul_berita', 'Judul Berita', 'required');
		$valid->set_rules('status_berita', 'Status Berita', 'required');
		$valid->set_rules('jenis_berita', 'Jenis Berita', 'required');
		$valid->set_rules('id_kategori_berita', 'Kategori Berita', 'required');
		$valid->set_rules('isi_berita', 'Isi Berita', 'required');
		$valid->set_rules('keywords', 'Keyword Berita', 'required');
		
		if ($valid->run()) {
			// Jika tidak ganti gambar
			if (!empty($_FILES['gambar']['name'])) {
				// Upload file
				$config['upload_path']			= './assets/uploads/berita';
				$config['allowed_types']	 	= 'gif|jpg|png|jpeg';
				$config['max_size']				= 5000;
				$config['file_ext_tolower']		= true;
				
				$upload_image = $_FILES['gambar']['name'];
				$allowed_ext  = array('jpg', 'png', 'gif', 'jpeg');
				$file_ext     = explode('.', $upload_image);
				$file_ext     = strtolower(end($file_ext));
	
				if (!in_array($file_ext, $allowed_ext)) {
					$this->session->set_flashdata('danger', 'Tipe File Tidak Diizinkan!');
					redirect('admin/berita/edit/'.$id_berita,'refresh');
					return false;
				}
				
				if ($_FILES['gambar']['size'] > 5048000) {
					$this->session->set_flashdata('danger', 'Gambar Terlalu Besar!');
					redirect('admin/berita/edit/'.$id_berita,'refresh');
					return false;
				}
				
				$this->load->library('upload', $config);
				
				if ( !$this->upload->do_upload('gambar'))
				{
					// $this->upload->display_errors();
					$this->session->set_flashdata('danger', 'Tipe File Dicurigai. Ganti atau Edit Gambar!');
					redirect('admin/layanan/edit/'.$id_berita,'refresh');
					}
					else
					{
						// Proses manipulasi gambar
						$data = array('gambar' => $this->upload->data());
						// Gambar asli disimpan di folder assets/uploads/images/berita
						// Lalu gambar asli itu di copy untuk versi mini size ke folder assets/uploads/images/berita/thumbs
						$config['image_library']	= 'gd2';
						$config['source_image'] 	= './assets/uploads/berita/'.$data['gambar']['file_name'];
						$config['new_image'] 		= './assets/uploads/berita/thumbs/'.$data['gambar']['file_name'];
						$config['create_thumb'] 	= TRUE;
						$config['maintain_ratio'] 	= TRUE;
						$config['width']         	= 200;
						$config['height']       	= 200;
						$config['thumb_marker']		= '';
	
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
	
						// hapus gambar lama
						if ($news->gambar != "") {
							unlink('./assets/uploads/berita/'.$news->gambar);
							unlink('./assets/uploads/berita/thumbs/'.$news->gambar);
						}
						$gambar = $data['gambar']['file_name'];
						$this->Berita_model->edit($id_berita, $gambar);
						$this->session->set_flashdata('success', 'Data Berhasil diupdate!');
						redirect(base_url('admin/berita'),'refresh');
					}
			} else {
				$this->Berita_model->edit($id_berita);
				$this->session->set_flashdata('success', 'Data Berhasil diupdate!');
				redirect(base_url('admin/berita'),'refresh');
			}
		}
		$data = [
			'title'			=> 'Edit Berita',
			'categories'	=> $categories,
			'news'			=> $news,
			'isi'			=> 'admin/berita/edit'
		];
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Delete
	public function hapus($id_berita)
	{
		// Proteksi delete
		$this->check_login->check();

		$news = $this->Berita_model->detail($id_berita);

		// hapus gambar
		if ($news->gambar != "") {
			unlink('./assets/uploads/berita/'.$news->gambar);
			unlink('./assets/uploads/berita/thumbs/'.$news->gambar);
		}
		
		$this->Berita_model->hapus($id_berita);
		$this->session->set_flashdata('success', 'Data Berhasil dihapus!');
		redirect(base_url('admin/berita'),'refresh');
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */