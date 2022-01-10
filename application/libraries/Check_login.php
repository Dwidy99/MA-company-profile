<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class check_login
{
   protected $CI;

   public function __construct() 
   {
      $this->CI =& get_instance();
   }

   public function check()
   {
      if ($this->CI->session->userdata('usernameAdmin') == "" && $this->CI->session->userdata('akses_levelAdmin') == "") {
         $this->CI->session->set_flashdata('danger','Silahkan login terlebih dahulu!');
         redirect(base_url('login'),'refresh');
      }
   }

   public function login($username='', $password)
   {
      
   }

   public function logout()
   {
      $this->CI->session->unset_userdata('id_userAdmin');
      $this->CI->session->unset_userdata('usernameAdmin');
      $this->CI->session->unset_userdata('namaAdmin');
      $this->CI->session->unset_userdata('akses_levelAdmin');
      
      $this->CI->session->set_flashdata('success', 'Anda berhasil logout');
      redirect('login');
      // Biar yakin
      $_SESSION = array('id_userAdmin' => '', 'usernameAdmin' => '', 'namaAdmin' => '', 'akses_levelAdmin' => '');
      session_destroy();
   }
}
// End of file Check_login.php
// Location: application\libraries\Check_login.php