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
      if ($this->CI->session->userdata('username') == "" && $this->CI->session->userdata('akses_level') == "") {
         $this->CI->session->set_flashdata('danger','Silahkan login terlebih dahulu!');
         redirect(base_url('login'),'refresh');
      }
   }

   public function logout()
   {
      $this->CI->session->unset_userdata('id_user');
      $this->CI->session->unset_userdata('username');
      $this->CI->session->unset_userdata('nama');
      $this->CI->session->unset_userdata('akses_level');
      
      $this->CI->session->set_flashdata('success', 'Anda berhasil logout');
      redirect('login');
      // Biar yakin
      $_SESSION = array('id_user' => '', 'username' => '', 'nama' => '', 'akses_level' => '');
      session_destroy();
   }
}
// End of file Check_login.php
// Location: application\libraries\Check_login.php