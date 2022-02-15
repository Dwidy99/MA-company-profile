<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_download_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listing()
    {
        return $this->db
        ->select('*')
        ->from('kategori_download')
        ->order_by('id_kategori_download', 'desc')
        ->get()
        ->result();
    }

    // Tambah Data
    public function tambah($data)
    {
        return $this->db->insert('kategori_download', $data);
    }

    // Detail kategori_berita
    public function detail($id_kategori_download)
    {
        return $this->db->select('*')
        ->from('kategori_download')
        ->where('id_kategori_download', $id_kategori_download)
        ->order_by('id_kategori_download')
        ->get()->row();
    }

    // Edit Data
    public function edit($data)
    {
        $this->db->where('id_kategori_download', $data['id_kategori_download'])
        ->update('kategori_download', $data);
    }

    // Kategori join Download
    public function kategoriDownload()
    {
        return $this->db
        ->select('id_download, judul_download, nama_kategori_download')
        ->from('download')
        ->join('kategori_download', 'download.id_kategori_download = kategori_download.id_kategori_download')
        ->order_by('id_download', 'desc')
        ->get()
        ->result();
    }
}

?>