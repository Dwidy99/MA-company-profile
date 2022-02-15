<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('download_model');
        $this->load->model('kategori_download_model');
        $this->log_user->add_log();
        // Tambahkan proteksi halaman
        $url_pengalihan = str_replace('index.php/', '', current_url());
        $pengalihan = $this->session->set_userdata('pengalihan',$url_pengalihan);
        $this->check_login->check($pengalihan);
    }

    // Halaman download
	public function index()	{
		$download = $this->download_model->listing();
		$data = [	'title'			=> 'Download',
						'download'		=> $download,
						'isi'			=> 'admin/download/list'];
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Tambah download
	public function tambah()
	{
		$kategori_download = $this->kategori_download_model->listing();

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_download','Judul','required',
			array(	'required'	=> 'Judul harus diisi'));

		$valid->set_rules('isi','Isi','required',
			array(	'required'	=> 'Isi download harus diisi'));

		if($valid->run()) {
			$config['upload_path']   = './assets/uploads/download/';
      		$config['allowed_types'] = 'gif|jpg|png|svg|jpeg|pdf|zip|rar|doc|docx|xls|xlsx|ppt|pptx';
      		$config['max_size']      = '12000'; // KB  
			$this->load->library('upload', $config);

			$upload_image = $_FILES['gambar']['name'];
			$allowed_ext  = array('gif', 'jpg', 'png', 'svg', 'jpeg', 'pdf', 'zip', 'rar', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx');
			$file_ext     = explode('.', $upload_image);
			$file_ext     = strtolower(end($file_ext));

			if(empty($upload_image)) {
				$this->session->set_flashdata('danger', 'File wajib diisi!');
				redirect('admin/download/tambah');
				return false;
			}
			
			if (!in_array($file_ext, $allowed_ext)) {
				$this->session->set_flashdata('danger', 'Tipe File Tidak Diizinkan!');
				redirect('admin/download/tambah');
				return false;
			}
			
			if ($_FILES['gambar']['size'] > 1190000) {
				$this->session->set_flashdata('danger', 'File Terlalu Besar!');
				redirect('admin/download/tambah');
				return false;
			}
			
      		if(!$this->upload->do_upload('gambar')) 
			{
				// $this->upload->display_errors();
				$this->session->set_flashdata('danger', 'Tipe File Dicurigai. Ganti atau Edit Gambar!');
				redirect('admin/download/tambah/' ,'refresh');
				// Masuk database
			}else{
				$upload_data        		= array('uploads' =>$this->upload->data());
				$i 		= $this->input;

				$data = [	
					'id_kategori_download'	 => $i->post('id_kategori_download'),
					'id_user'						=> $this->session->userdata('id_userAdmin'),
					'judul_download'			=> $i->post('judul_download'),
					'isi'								=> $i->post('isi'),
					'jenis_download'			=> $i->post('jenis_download'),
					'gambar'						=> $upload_data['uploads']['file_name'],
					'website'						=> $i->post('website')
				];
						
				$this->download_model->tambah($data);
				$this->session->set_flashdata('success', 'Data telah ditambah');
				redirect(base_url('admin/download'),'refresh');
			}
		}
			// End masuk database
			$data = [	
				'title'				=> 'Tambah Download',
				'kategori_download'	=> $kategori_download,
				'isi'				=> 'admin/download/tambah'
			];
			$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Edit download
	public function edit($id_download)	
	{
		if ($id_download == NULL) {redirect('oops','refresh');}
		
		$kategori_download 	= $this->kategori_download_model->listing();
		$download 	= $this->download_model->detail($id_download); 

		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('judul_download','Judul','required',
			array(	'required'	=> 'Judul harus diisi'));

		$valid->set_rules('isi','Isi','required',
			array(	'required'	=> 'Isi download harus diisi'));

		if($valid->run()) {

			if(!empty($_FILES['gambar']['name'])) {

				$config['upload_path']   = './assets/uploads/download/';
				$config['allowed_types'] = 'gif|jpg|png|svg|jpeg|pdf|zip|rar|doc|docx|xls|xlsx|ppt|pptx';
				$config['max_size']      = '12000'; // KB  
				$this->load->library('upload', $config);

				$upload_image = $_FILES['gambar']['name'];
				$allowed_ext  = array('gif', 'jpg', 'png', 'svg', 'jpeg', 'pdf', 'zip', 'rar', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx');
				$file_ext     = explode('.', $upload_image);
				$file_ext     = strtolower(end($file_ext));
				
				if (!in_array($file_ext, $allowed_ext)) {
					$this->session->set_flashdata('danger', 'Tipe File Tidak Diizinkan!');
					redirect('admin/download/edit/'. $download->id_download);
					return false;
				}
				
				if ($_FILES['gambar']['size'] > 1190000) {
					$this->session->set_flashdata('danger', 'File Terlalu Besar!');
					redirect('admin/download/edit/'. $download->id_download);
					return false;
				}
				
				if($this->upload->do_upload('gambar')) {
					// End validasi
					$upload_data        		= array('uploads' =>$this->upload->data());
					$i 		= $this->input;

					$data = [	
						'id_download'			  => $id_download,
						'id_kategori_download'		=> $i->post('id_kategori_download'),
						'id_user'						  => $this->session->userdata('id_userAdmin'),
						'judul_download'				=> $i->post('judul_download'),
						'isi'								=> $i->post('isi'),
						'jenis_download'			=> $i->post('jenis_download'),
						'gambar'						=> $upload_data['uploads']['file_name'],
						'website'						=> $i->post('website')
					];
					
					// hapus File lama
					if ($download->gambar != null && file_exists($download->gambar)) {
						unlink('./assets/uploads/download/'.$download->gambar);
					}
					
					$this->download_model->edit($data);
					$this->session->set_flashdata('success', 'Data telah update');
					redirect(base_url('admin/download'),'refresh');

					// Masuk database
				}else{
					$this->session->set_flashdata('danger', 'Tipe File Dicurigai. Ganti atau Edit Gambar!');
					redirect('admin/download/edit/' . $download->id_download,'refresh');
				}
			}else{
				$i 		= $this->input;

				$data = [	
					'id_download'				=> $id_download,
					'id_kategori_download'	=> $i->post('id_kategori_download'),
					'id_user'						=> $this->session->userdata('id_userAdmin'),
					'judul_download'			=> $i->post('judul_download'),
					'isi'								=> $i->post('isi'),
					'jenis_download'			=> $i->post('jenis_download'),
					'website'						=> $i->post('website')
				];
				$this->download_model->edit($data);
				$this->session->set_flashdata('success', 'Data telah update');
				redirect(base_url('admin/download'),'refresh');
			}
		}
		// End masuk database
		$data = array(	'title'				=> 'Edit Download',
						'kategori_download'	=> $kategori_download,
						'download'			=> $download,
						'isi'				=> 'admin/download/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Delete
	public function delete($id_download = NULL) {
		if ($id_download == NULL) {redirect('oops','refresh');}
		
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		// Ambil check login dari simple_login
		$this->check_login->check($pengalihan); 
		
		$download = $this->download_model->detail($id_download);
		// Proses hapus gambar
		if($download->gambar != "" && file_exists('assets/uploads/download/'.$download->gambar)) {
			unlink('./assets/uploads/download/'.$download->gambar);
		}
		// End hapus gambar
		$data = array('id_download'	=> $id_download);
		$this->download_model->delete($data);
	    $this->session->set_flashdata('success', 'Data telah dihapus');
	    redirect(base_url('admin/download'),'refresh');
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


?>