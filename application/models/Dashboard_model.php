<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model 
{
	// Total kunjungan
	public function kunjungan()
	{
		return $this->db->select('hari, COUNT(*) AS total')
		->from('kunjungan')
		->group_by('hari')
		->order_by('hari', 'desc')
		->limit(14)
		->get()
		->result();
	}
}

?>