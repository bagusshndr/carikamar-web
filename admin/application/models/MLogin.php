<?php
class MLogin extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function GoLogin($nama, $password)
	{
		$this->db->select('*');
		$this->db->from('master_user');
		$this->db->where('nama', $nama);
		$this->db->where('password', $password);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			$row = $query->row();
			$this->load->library('session');
			$this->session->set_userdata('id', $row->id);
			$this->session->set_userdata('nama', $row->nama);
			$this->session->set_userdata('password', $row->password);
			return $row->id;
		} else {
			return false;
		}
	}
}