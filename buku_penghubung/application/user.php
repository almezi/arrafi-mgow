<?php
Class User extends CI_Model
{
	function login($username, $password)
	{
		$this->db->select('username,password');
		$this->db->from('user');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if($query->num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function data_login($username,$password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('user')->row();
    }
	
	function cekid($username){
		return $this->db->get_where('user',array('username'=>$username));
	}
	
	
	
	function cekkode($kode_request){
		return $this->db->get_where('request',array('kode_request'=>$kode_request));
	}
	
	function list_user(){
		$daftar_user = $this->db->get('user');
		return $daftar_user;
	}
	
	function list_pinjam(){
		$daftar_pinjam = $this->db->get('peminjaman');
		return $daftar_pinjam;
	}
	function list_denda(){
		$daftar_denda = $this->db->get('denda');
		return $daftar_denda;
	}
	
	function list_buku(){
		$daftar_buku = $this->db->get('buku');
		return $daftar_buku;
	}
	function list_request(){
		$daftar_request = $this->db->get('request');
		return $daftar_request;
	}
	
	function list_inforequest(){
		$daftar_inforequest = $this->db->get('inforequest');
		return $daftar_inforequest;
	}
	
	function cekproduk($idproduk){
		return $this->db->get_where('produk',array('IDproduk'=>$idproduk));
	}
	
	function cekbuku($kode_buku){
		return $this->db->get_where('buku',array('kode_buku'=>$kode_buku));
	}
	
	function no_max()
	{
		$query = $this->db->query("SELECT MAX(kodepinjam) as max_id from peminjaman");
		$row = $query->row_array();
		$max_id = $row['max_id']; 
		$kodebaru = $max_id +1;
		return $kodebaru;
	}
	
	function no_max2()
	{
		$query = $this->db->query("SELECT MAX(kode_request) as max_kode from request");
		$row = $query->row_array();
		$max_kode = $row['max_kode']; 
		$kode_request = $max_kode +1;
		return $kode_request;
	}
	
}