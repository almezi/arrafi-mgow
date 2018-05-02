<?php
	class login_database extends CI_Model {

		// Read data using username and password
		public function login($username) {
			$this->db->select('*');
			$this->db->from('user_login');
			$this->db->where('user_name', $username);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return true;
			}
				return false;
		}

		public function ambil_data_user($username){
			$this->db->where("user_name",$username);
			return $this->db->get("user_login");
		}

		public function rehash($newhash, $username){
			$this->db->where("user_name",$username);
			return $this->db->update("user_login",$newhash);
		}
	}
?>