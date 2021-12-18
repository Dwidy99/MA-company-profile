<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

   public function __construct()
   {
      parent::__construct();
      $this->load->model('User_model');
   }

   public function index()
   {
      // Validation
      $valid = $this->form_validation;
      $valid->set_rules('username', 'Username', 'required|trim|min_length[6]|max_length[32]');
      $valid->set_rules('password', 'Password', 'required|trim|min_length[6]');

      if ($valid->run() == false) {
         $data = array(
            'title' => 'Login Administrator',
         );
         $this->load->view('admin/login/list', $data, FALSE);
      } else {
         $this->_login();
      }
   }

   private function _login()
   {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $user = $this->db->get_where('users', ['username' => $username])->row();
      
      if ($user) {
         if (password_verify($password, $user->password)) {
            $data = array(
               'id_user' => $user->id_user,
               'username' => $user->username,
               'nama' => $user->nama,
               'akses_level' => $user->akses_level
            );
            $this->session->set_userdata($data);
            $this->session->set_flashdata('success', 'Anda berhasil login');
            redirect('admin/dashboard');
         } else {
            $this->session->set_flashdata('danger', 'Password salah!');
            redirect('login');
         }
      } else {
         $this->session->set_flashdata('danger', 'Username tidak ditemukan!');
         redirect('login');
      }
   }

   // Lupa password
   public function lupaPassword()
   {
       // Validation
       $valid = $this->form_validation;
       $valid->set_rules('email', 'Email', 'required|trim|valid_email');
 
       if ($valid->run() == false) {
          $data = array(
             'title' => 'Form Lupa Password',
          );
          $this->load->view('admin/login/lupaPassword', $data, FALSE);
       } else {
          $email = $this->input->post('email', true);
         $user = $this->db->get_where('users', ['email' => $email])->row();

         if ($user) {
            $token = base64_encode(random_bytes(32));
            $user_token = [
               'email' => $email,
               'user_token' => $token,
               'tanggal_buat' => time()
            ];
            $this->db->insert('users_token', $user_token);
            $this->_sendEmail($token, $email, 'forgot');
            $this->session->set_flashdata('success', 'Silahkan cek email anda untuk reset password');
            redirect('login/lupaPassword');
         } else {
            $this->session->set_flashdata('danger', 'Email tidak ditemukan!');
            redirect('login/lupaPassword');
         }
      }
   }

   private function _sendEmail($token, $email, $type)
   {
      $config = array();
		$config['charset'] = 'utf-8';
		$config['useragent'] = 'CodeIgniter';
		$config['protocol'] = "smtp";
		$config['mailtype'] = "html";
			// Pengaturan smtp
      $config['smtp_host'] = "ssl://smtp.gmail.com"; 
      $config['smtp_port'] = '465';
		$config['smtp_timeout'] = "5";
			// Isi dengan email kamu
		$config['smtp_user'] = "youremail@gmail.com";
			// Isi dengan password kamu
		$config['smtp_pass'] = "yourpassword"; 
      $config['starttls']  = true;
		$config['crlf'] ="\r\n"; 
		$config['newline'] ="\r\n"; 
		$config['wordwrap'] = TRUE;
			// Memanggil library email dan set konfigurasi untuk pengiriman email

      $this->load->library('email',$config); 
		$this->email->initialize($config);

			// Konfigurasi pengiriman
		$this->email->from($config['smtp_user'], 'Company Profile');
		$this->email->to($email);

      if ($type == 'forgot') {
         $this->email->subject('Reset Password dari Company Profile');

         $message = "<p>silahkan klik link untuk mengatur ulang kata sandi.</p>";
			$message .= "<a href='" . base_url('login/resetPassword?email=' . $email . '&token=' . urlencode($token)) . "'>Atur ulang kata sandi.</a>";

			$this->email->message($message);
      }

      if($this->email->send())
		{
			return true;
		}
		else
		{
			$this->session->set_flashdata('blocked','Gagal mengirim ke email Anda!');
			redirect(base_url('auth'));
		}
   }

   // reset Password
   public function resetPassword()
   {
      $email = $this->input->get('email', true);
      $token = $this->input->get('token', true);
      
      $user = $this->db->get_where('users', ['email' => $email])->row();

      if ($user) {
         if ($token) {
            $token = $this->db->get_where('users_token', ['user_token' => $token])->row();
            if (time() - $token->tanggal_buat < (60 * 60 * 24)) {
               $this->session->set_userdata('lupapassword', $user->email);
               $this->passwordGanti();
            } else {
               $this->db->delete('users_token', ['email' => $email]);

               $this->session->set_flashdata('danger', 'Reset password gagal. Sesi Anda kadaluarsa!');
               redirect('login');
            }
         } else {
            $this->session->set_flashdata('danger', 'Reset password gagal. Token salah!');
            redirect('login');
         }
      } else {
         $this->session->set_flashdata('danger', 'Reset password gagal. Email tidak ditemukan!');
         redirect('login');
      }
   }

   public function passwordGanti()
   {
      $email = $this->session->userdata('lupapassword');
      if (!$email) {
         $this->session->set_flashdata('danger', 'Akses di larang!');
         redirect('login');
      }
      
      $this->form_validation->set_rules('password_baru', 'Password baru', 'required|trim|min_length[6]|matches[password_konfirmasi]');
      $this->form_validation->set_rules('password_konfirmasi', 'Konfirmasi password', 'required|trim|min_length[6]|matches[password_baru]');
      
      
      if ($this->form_validation->run() == false) {
         $data = array(
            'title' => 'Reset Password '. $email,
         );
         $this->load->view('admin/login/gantiPassword', $data, FALSE);
      } else {
         $password = password_hash($this->input->post('password_baru'), PASSWORD_DEFAULT);

         $this->db->set('password', $password);
         $this->db->where('email', $email);
         
         $this->db->update('users');
         $this->db->delete('users_token', ['email' => $email]);

         $this->session->unset_userdata('lupapassword');
         // $_SESSION['lupapassword'] = false;

         $this->session->set_flashdata('success', 'Password berhasil diubah!');
         redirect('login');
      }
   }

   // Login
   public function logout()
   {
      $this->check_login->logout();
   }
}

?>
