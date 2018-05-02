<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class authentication_m extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		public function pendaftaran($identitas,$nama,$alamat,$no_hp,$email,$asal){
			$query = $this->db->query("CALL proc_insert_pendaftaran('".$identitas."','".$nama."','".$alamat."','".$no_hp."','".$email."','".$asal."')");
			$result = $this->db->affected_rows();
			return $result;
		}
		
		function tampil_username($email){
			$query=$this->db->query("select substr('$email', 1, instr('$email', '@')-1) uname from dual");
			return $query;
		}

		public function cek_identitas($identitas){
			$this->db->select('id_buku_tamu');
			$this->db->from('buku_tamu');
			$where = array('id_buku_tamu' => $identitas);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->num_rows();
		}

		public function cek_no_hp_daftar($no_hp){
			$this->db->select('no_hp');
			$this->db->from('buku_tamu');
			$where = array('no_hp'=>$no_hp);
			$this->db->where($where);
			$query = $this->db->get();
			$row = $query->num_rows();
			return $row;
		}

		public function cek_email($email){
			$this->db->select('username');
			$this->db->from('user');
			$where = array('username' => $email);
			$this->db->where($where);
			$query = $this->db->get();
			$row = $query->num_rows();
			return $row;
		}

		public function cek_no_hp($no_hp){
			$this->db->select('no_hp');
			$this->db->from('buku_tamu');
			$where = array('no_hp' => $no_hp);
			$this->db->where($where);
			$query = $this->db->get();
			$row = $query->num_rows();
			return $row;
		}

		public function cek_status($username){
			$this->db->select('status');
			$this->db->from('user');
			$where = array('username' => $username);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function cek_password($username){
			$this->db->select('password');
			$this->db->from('user');
			$where = array('username' => $username);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function masuk($username,$password){
			$this->db->select('*');
			$this->db->from('user');
			$where = array(
				'username' => $username,
				'password' => $password
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function masuk_pendaftar($username,$password){
			$this->db->select('*');
			$this->db->from('user');
			$this->db->join('formulir','user.username=formulir.email');
			$this->db->join('buku_tamu','formulir.email=buku_tamu.email');
			$where = array(
				'username' => $username,
				'password' => $password
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function masuk_ortu($username,$password){
			$this->db->select('*');
			$this->db->from('user');
			$this->db->join('formulir','user.username=formulir.email');
			$where = array(
				'username' => $username,
				'password' => $password
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function verifikasi($no_hp,$email,$pesan){
			$where = array(
				'password' => md5($no_hp),
				'username' => $email
			);
			$this->db->set('status_user','Aktif');
			$this->db->where($where);
			$this->db->update('user');

			$data = array(
				'DestinationNumber' => $no_hp,
				'TextDecoded' => $pesan,
				'CreatorID' => 'Panitia PPDB\n SD Ar-Rafi'
			);
			$this->db->insert('outbox',$data);
			return $this->db->affected_rows();
		}

		public function reset_password($email,$password_lama,$password_baru){
			$where = array(
				'password' => $password_lama,
				'username' => $email
			);
			$this->db->set('password',$password_baru);
			$this->db->where($where);
			$this->db->update('user');
			return $this->db->affected_rows();
		}
	}