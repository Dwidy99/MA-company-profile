<?php 
// Proteksi halaman
$url_pengalihan = str_replace('index.php/', '', current_url());
$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
$this->check_login->check($pengalihan);
// Hak akses admin
require_once 'head.php';
require_once 'header.php';
require_once 'nav.php';
require_once 'content.php';
require_once 'footer.php';

?>