<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Download_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function listing()
    {
        return $this->db->
        select('download.*,
            kategori_download.nama_kategori_download,
            kategori_download.slug_kategori_download,
            users.nama')
        ->from('download')
        // Join dg 2 tabel
        ->join('kategori_download', 'kategori_download.id_kategori_download = download.id_kategori_download', 'left')
        ->join('users', 'users.id_user = download.id_user', 'left')
        ->order_by('id_download', 'desc')
        ->get()
        ->result();
    }

    public function kategori($id_kategori_download)
    {
        return $this->db->
        select('download.*,
            kategori_download.nama_kategori_download,
            kategori_download.slug_kategori_download,
            users.nama')
        ->from('download')
        ->join('kategori_download', 'kategori_download.id_kategori_download = download.id_kategori_download', 'left')
        ->join('users', 'users.id_user = download.id_user', 'left')
        ->where(['jenis_download' => "Download", "download.id_kategori_download" => $id_kategori_download])
        ->order_by('id_download', 'desc')
        ->get()->result();
    }

    public function detail($id_download = null)
    {
      return $this->db->select('*')
      ->from('download')
      ->where('id_download', $id_download)
      ->order_by('id_download', 'DESC')
      ->get()
      ->row();
  }

	// Tambah
  public function tambah($data) {
      $this->db->insert('download',$data);
  }

	// Update
  public function edit($data) {
      $this->db->where('id_download',$data['id_download']);
      $this->db->update('download',$data);
  }

	// Delete
  public function delete($data) {
      $this->db->where('id_download',$data['id_download'])->delete('download', $data);
  }

}


?>
