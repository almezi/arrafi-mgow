<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Nisn_M extends CI_Model{
		
		function __construct(){
			parent::__construct();
		}

		public function select_data_nisn(){
			$this->db->select('*');
			$this->db->from('nisn');
			$query = $this->db->get();
			return $query->result();
		}

		public function select_data_nisn_individu($no_hp){
			$this->db->select('*');
			$this->db->from('nisn');
			$this->db->where('no_hp',$no_hp);
			$query = $this->db->get();
			return $query->result();
		}

		public function select_no_hp($username){
			$this->db->select('no_hp');
			$this->db->from('buku_tamu');
			$this->db->where('email',$username);
			$query = $this->db->get();
			return $query->result();
		}

		public function select_no_pendaftaran($username){
			$this->db->select('no_pendaftaran');
			$this->db->from('formulir');
			$this->db->where('email',$username);
			$query = $this->db->get();
			return $query->result();
		}

		public function edit_data_nisn_pd($data,$no_pendaftaran){
			$this->db->set($data);
			$this->db->where('no_pendaftaran', $no_pendaftaran);
			$this->db->update('peserta_didik');
			$query = $this->db->affected_rows();
			return $query;
		}
	}