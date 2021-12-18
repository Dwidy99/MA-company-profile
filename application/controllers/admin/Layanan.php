<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Layanan_model');
		$this->load->model('User_model');
	}

	public function index()
	{
		$services = $this->Layanan_model->listing();

		$data = [
			'title'		=> 'Data Layanan ('. count($services) .')',
			'services'		=> $services,
			'isi'		=> 'admin/layanan/list'
		];
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Author layanan
	public function author($id_user)	{
		$services 	= $this->Layanan_model->author_admin($id_user);
		$user 		= $this->User_model->detail($id_user);

		$data = array(	'title'			=> 'Penulis layanan: '.$user->nama.' ('.count($services).')',
						'services'		=> $services,
						'isi'			=> 'admin/layanan/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	//  Tambah
	public function tambah()
	{
		// validasi
		$valid = $this->form_validation;
		$valid->set_rules('judul_layanan', 'Judul Layanan', 'required');
		$valid->set_rules('isi_layanan', 'Isi Layanan', 'required');
		$valid->set_rules('harga', 'Harga Layanan', 'required|numeric');
		$valid->set_rules('status_layanan', 'Status Layanan', 'required');
		
		if ($valid->run()) {
			// Upload file
			$config['upload_path']				 = './assets/uploads/layanan';
			$config['allowed_types']		 	 = 'gif|jpg|png|jpeg';
			$config['max_size']						= 5000;
         $config['file_ext_tolower']			= true;
			
			$upload_image = $_FILES['gambar']['name'];
			$allowed_ext  = array('jpg', 'png', 'gif', 'jpeg');
			$file_ext       = explode('.', $upload_image);
			$file_ext       = strtolower(end($file_ext));
			
			if (!in_array($file_ext, $allowed_ext)) {
				$this->session->set_flashdata('danger', 'Tipe File Tidak Diizinkan!');
				redirect('admin/layanan/tambah');
				return false;
			}
			
			if ($_FILES['gambar']['size'] > 5048000) {
				$this->session->set_flashdata('danger', 'Gambar Terlalu Besar!');
				redirect('admin/layanan/tambah');
				return false;
			}
			
			$this->load->library('upload', $config);

			
			if ( !$this->upload->do_upload('gambar'))
			{
				// $this->upload->display_errors();
            $this->session->set_flashdata('danger', 'Tipe File Dicurigai. Ganti atau Edit Gambar!');
            redirect('admin/layanan/tambah/','refresh');
				}
				else
				{
					// Proses manipulasi gambar
					$data = array('gambar' => $this->upload->data());
					// Gambar asli disimpan di folder assets/uploads/images/layanan
					// Lalu gambar asli itu di copy untuk versi mini size ke folder assets/uploads/images/layanan/thumbs
					$config['image_library']	= 'gd2';
					$config['source_image'] 	= './assets/uploads/layanan/'.$data['gambar']['file_name'];
					$config['new_image'] 		= './assets/uploads/layanan/thumbs/'.$data['gambar']['file_name'];
					$config['create_thumb'] 	= TRUE;
					$config['maintain_ratio'] 	= TRUE;
					$config['width']         	= 200;
					$config['height']       	= 200;
					$config['thumb_marker']		= '';

					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					
					$i = $this->input;
					$data = [
						'id_user' 			  		 	=> $this->session->userdata('id_user'),
						'judul_layanan'		 	=> $i->post('judul_layanan', true),
						'slug_layanan' 		 	=> url_title($i->post('judul_layanan', true), 'dash', TRUE),
						'isi_layanan'				 	=> $i->post('isi_layanan', true),
						'gambar'							=> $data['gambar']['file_name'],
						'keywords'					=> $i->post('keywords', true),
						'harga'		 => $i->post('harga', true),
						'status_layanan'			=> $i->post('status_layanan', true),
						'tanggal_post'		 	  	=> date('Y-m-d H:i:s')
					];
					$this->Layanan_model->tambah($data);
					$this->session->set_flashdata('success', 'Layanan Berhasil ditambahkan!');
					redirect(base_url('admin/layanan'),'refresh');
			}
		}
		$data = [
			'title'					=> 'Tambah Layanan',
			'isi'						=> 'admin/layanan/tambah'
		];
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit
	public function edit($id_layanan = '')
	{
		$services = $this->Layanan_model->detail($id_layanan);
		// validasi
		$valid = $this->form_validation;
		$valid->set_rules('judul_layanan', 'Judul Layanan', 'required');
		$valid->set_rules('isi_layanan', 'Isi Layanan', 'required');
		$valid->set_rules('harga', 'Harga Layanan', 'required|numeric');
		$valid->set_rules('status_layanan', 'Status Layanan', 'required');
		
		if ($valid->run()) {
			// Jika tidak ganti gambar
			if (!empty($_FILES['gambar']['name'])) {
				// Upload file
				$config['upload_path']				 = './assets/uploads/layanan';
				$config['allowed_types']		 	 = 'gif|jpg|png|jpeg';
				$config['max_size']						= 5000;
            $config['file_ext_tolower']			= true;
				
				$upload_image = $_FILES['gambar']['name'];
				$allowed_ext  = array('jpg', 'png', 'gif', 'jpeg');
				$file_ext       = explode('.', $upload_image);
				$file_ext       = strtolower(end($file_ext));
	
				if (!in_array($file_ext, $allowed_ext)) {
					$this->session->set_flashdata('danger', 'Tipe File Tidak Diizinkan!');
					redirect('admin/layanan/edit/'.$id_layanan,'refresh');
					return false;
				}
				
				if ($_FILES['gambar']['size'] > 5048000) {
					$this->session->set_flashdata('danger', 'Gambar Terlalu Besar!');
					redirect('admin/layanan/edit/'.$id_layanan,'refresh');
					return false;
				}
				
				$this->load->library('upload', $config);
				
				if ( !$this->upload->do_upload('gambar'))
				{
               // $this->upload->display_errors();
					$this->session->set_flashdata('danger', 'Tipe File Dicurigai. Ganti atau Edit Gambar!');
					redirect('admin/layanan/edit/'.$id_layanan,'refresh');
					}
					else
					{
						// Proses manipulasi gambar
						$data = array('gambar' => $this->upload->data());
						// Gambar asli disimpan di folder assets/uploads/images/layanan
						// Lalu gambar asli itu di copy untuk versi mini size ke folder assets/uploads/images/layanan/thumbs
						$config['image_library']	= 'gd2';
						$config['source_image'] 	= './assets/uploads/layanan/'.$data['gambar']['file_name'];
						$config['new_image'] 		= './assets/uploads/layanan/thumbs/'.$data['gambar']['file_name'];
						$config['create_thumb'] 	= TRUE;
						$config['maintain_ratio'] 	= TRUE;
						$config['width']         	= 200;
						$config['height']       	= 200;
						$config['thumb_marker']		= '';
	
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
	
						// hapus gambar lama
						if ($services->gambar != "") {
							unlink('./assets/uploads/layanan/'.$services->gambar);
							unlink('./assets/uploads/layanan/thumbs/'.$services->gambar);
						}
						$gambar = $data['gambar']['file_name'];
						$this->Layanan_model->edit($id_layanan, $gambar);
						$this->session->set_flashdata('success', 'Data Berhasil diupdate!');
						redirect(base_url('admin/layanan'),'refresh');
					}
			} else {
				$this->Layanan_model->edit($id_layanan);
				$this->session->set_flashdata('success', 'Data Berhasil diupdate!');
				redirect(base_url('admin/layanan'),'refresh');
			}
		}
		$data = [
			'title'					=> 'Edit Layanan',
			'services'				=> $services,
			'isi'						=> 'admin/layanan/edit'
		];
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Delete
	public function hapus($id_layanan)
	{
		// Proteksi delete
		$this->check_login->check();

		$services = $this->Layanan_model->detail($id_layanan);

		// hapus gambar
		if ($services->gambar != "") {
			unlink('./assets/uploads/layanan/'.$services->gambar);
			unlink('./assets/uploads/layanan/thumbs/'.$services->gambar);
		}
		
		$this->Layanan_model->hapus($id_layanan);
		$this->session->set_flashdata('success', 'Data Berhasil dihapus!');
		redirect(base_url('admin/layanan'),'refresh');
	}

}

/* End of file layanan.php */
/* Location: ./application/controllers/layanan.php */