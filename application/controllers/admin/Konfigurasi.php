<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Konfigurasi extends CI_Controller
 {
   //  Load data konfigurasi
   public function __construct()
   {
     parent::__construct();
   //   Proteksi
   if ($this->session->userdata('akses_level') != 'Admin') {
      $this->session->set_flashdata('success', 'Hak akses ditolak!');
      redirect(base_url('admin'));
   }
     $this->load->model('Konfigurasi_model');
   }

   //  Konfigurasi Umum
   public function index()
   {
     $configure = $this->Konfigurasi_model->listing();
     
     $valid = $this->form_validation;
     $valid->set_rules('namaweb', 'Nama Website', 'required');
     $valid->set_rules('email', 'Email', 'valid_email');
     $valid->set_rules('telepon', 'Telepon', 'is_natural');
     $valid->set_rules('facebook', 'Facebook', 'valid_url');
     $valid->set_rules('website', 'Website', 'valid_url');
     $valid->set_rules('instagram', 'Instagram', 'valid_url');
     
     if($valid->run() == FALSE)
     {
        $data = array(  'title'       => 'Konfigurasi Umum',
                        'configure'   => $configure,
                        'isi'         => 'admin/konfigurasi/index');

         $this->load->view('admin/layout/wrapper', $data, FALSE);
     } else {
        $i = $this->input;

        $data = array(  
                      'id_konfigurasi' 		=> $configure->id_konfigurasi,
                      'id_user'    				=> $this->session->userdata('id_user'),
                      'namaweb'        		=> $i->post('namaweb', true),
                      'tagline'        		=> $i->post('tagline', true),
                      'email'          		=> $i->post('email', true),
                      'website'        		=> $i->post('website', true),
                      'telepon'           => $i->post('telepon', true),
                      'alamat'       			=> $i->post('alamat', true),
                      'deskripsi'       	=> $i->post('deskripsi', true),
                      'keywords'       		=> $i->post('keywords', true),
                      'metatext'       		=> $i->post('metatext', true),
                      'map'           		=> $i->post('map'),
                      'facebook'          => $i->post('facebook', true),
                      'instagram'         => $i->post('instagram', true));
         $this->Konfigurasi_model->edit($data);
         $this->session->set_flashdata('success', 'Konfigurasi telah diupdate');
         redirect(base_url('admin/konfigurasi'),'refresh');
     }
   }
   
   //  Konfigurasi logo
   public function logo()
   {
     $configure = $this->Konfigurasi_model->listing();
     
      $this->form_validation->set_rules('id_konfigurasi', 'Id Konfigurasi', 'required');

     if($this->form_validation->run())
     {
      // Upload file
			$config['upload_path']				= './assets/uploads/logo/';
			$config['allowed_types']		 	= 'gif|jpg|png|jpeg';
			$config['max_size']						= 2000;
			$config['file_ext_tolower']		= true;
			
			// Cek File Gambar
			$upload_image = $_FILES['logo']['name'];
			$allowed_ext  = array('jpg', 'png', 'gif', 'jpeg');
			$file_ext     = explode('.', $upload_image);
			$file_ext     = strtolower(end($file_ext));
			
			if (!in_array($file_ext, $allowed_ext)) {
				$this->session->set_flashdata('danger', 'Tipe File Tidak Diizinkan!');
				redirect('admin/konfigurasi/logo');
				return false;
			}
			
			if ($_FILES['logo']['size'] > 2048000) {
				$this->session->set_flashdata('danger', 'Gambar Terlalu Besar!');
				redirect('admin/konfigurasi/logo');
				return false;
			}
			
			$this->load->library('upload', $config);

			
			if ( !$this->upload->do_upload('logo'))
			{
				// $this->upload->display_errors();
				$this->session->set_flashdata('danger', 'Tipe File Dicurigai. Ganti atau Edit Gambar!');
				redirect('admin/konfigurasi/logo','refresh');
				}
				else
				{
					// Proses manipulasi logo
					$data = array('logo' => $this->upload->data());
					// Gambar asli disimpan di folder assets/uploads/images/konfigurasi
					// Lalu logo asli itu di copy untuk versi mini size ke folder assets/uploads/images/konfigurasi/thumbs
					$config['image_library']	= 'gd2';
					$config['source_image'] 	= './assets/uploads/logo/'.$data['logo']['file_name'];
					$config['new_image'] 			= './assets/uploads/logo/thumbs/'.$data['logo']['file_name'];
					$config['create_thumb'] 	= TRUE;
					$config['maintain_ratio'] = TRUE;
					$config['width']         	= 200;
					$config['height']       	= 200;
					$config['thumb_marker']		= '';

					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

               // hapus gambar lama
						if ($configure->logo != "") {
							unlink('./assets/uploads/logo/'.$configure->logo);
							unlink('./assets/uploads/logo/thumbs/'.$configure->logo);
						}
					
					$i = $this->input;
					$data = [
						'id_konfigurasi' 		=> $i->post('id_konfigurasi', true),
						'id_user' 			 		=> $this->session->userdata('id_user'),
						'logo'							=> $data['logo']['file_name'],
					];
					$this->Konfigurasi_model->edit($data);
					$this->session->set_flashdata('success', 'Data Berhasil diupdate!');
					redirect(base_url('admin/konfigurasi/logo'),'refresh');
			}
		}
		$data = [
			'title'				=> 'Edit Logo',
			'configure'   => $configure,
			'isi'					=> 'admin/konfigurasi/logo'
		];
		$this->load->view('admin/layout/wrapper', $data, FALSE);
   }

   //  Konfigurasi icon
   public function icon()
   {
     $configure = $this->Konfigurasi_model->listing();
     
      $this->form_validation->set_rules('id_konfigurasi', 'Id Konfigurasi', 'required');

     if($this->form_validation->run())
     {
      // Upload file
			$config['upload_path']				= './assets/uploads/icon/';
			$config['allowed_types']		 	= 'gif|jpg|png|jpeg';
			$config['max_size']						= 2000;
			$config['file_ext_tolower']		= true;
			
			// Cek File Gambar
			$upload_image = $_FILES['icon']['name'];
			$allowed_ext  = array('jpg', 'png', 'gif', 'jpeg');
			$file_ext     = explode('.', $upload_image);
			$file_ext     = strtolower(end($file_ext));
			
			if (!in_array($file_ext, $allowed_ext)) {
				$this->session->set_flashdata('danger', 'Tipe File Tidak Diizinkan!');
				redirect('admin/konfigurasi/icon');
				return false;
			}
			
			if ($_FILES['icon']['size'] > 2048000) {
				$this->session->set_flashdata('danger', 'Gambar Terlalu Besar!');
				redirect('admin/konfigurasi/icon');
				return false;
			}
			
			$this->load->library('upload', $config);

			
			if ( !$this->upload->do_upload('icon'))
			{
				// $this->upload->display_errors();
				$this->session->set_flashdata('danger', 'Tipe File Dicurigai. Ganti atau Edit Gambar!');
				redirect('admin/konfigurasi/icon','refresh');
				}
				else
				{
					// Proses manipulasi icon
					$data = array('icon' => $this->upload->data());
					// Gambar asli disimpan di folder assets/uploads/images/konfigurasi
					// Lalu icon asli itu di copy untuk versi mini size ke folder assets/uploads/images/konfigurasi/thumbs
					$config['image_library']	= 'gd2';
					$config['source_image'] 	= './assets/uploads/icon/'.$data['icon']['file_name'];
					$config['new_image'] 			= './assets/uploads/icon/thumbs/'.$data['icon']['file_name'];
					$config['create_thumb'] 	= TRUE;
					$config['maintain_ratio'] = TRUE;
					$config['width']         	= 200;
					$config['height']       	= 200;
					$config['thumb_marker']		= '';

					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

               // hapus icon lama
						if ($configure->icon != "") {
							unlink('./assets/uploads/icon/'.$configure->icon);
							unlink('./assets/uploads/icon/thumbs/'.$configure->icon);
						}
					
					$i = $this->input;
					$data = [
						'id_konfigurasi' 	=> $i->post('id_konfigurasi', true),
						'id_user' 		 		=> $this->session->userdata('id_user'),
						'icon'						=> $data['icon']['file_name'],
					];
					$this->Konfigurasi_model->edit($data);
					$this->session->set_flashdata('success', 'Data Berhasil diupdate!');
					redirect(base_url('admin/konfigurasi/icon'),'refresh');
			}
		}
		$data = [
			'title'				=> 'Edit Icon',
			'configure'   => $configure,
			'isi'					=> 'admin/konfigurasi/icon'
		];
		$this->load->view('admin/layout/wrapper', $data, FALSE);
   }

 }
 
 
 
 ?>