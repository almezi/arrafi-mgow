<?php

class Modul extends CI_Model {

	// Model users
	function ambildata($perPage, $uri, $ringkasan) {
		$this->db->select('*');
		$this->db->from('siswa');
		if (!empty($ringkasan)) {
			$this->db->like('kelas', $ringkasan);
		}
		$this->db->order_by('kelas','asc');
		$getData = $this->db->get('', $perPage, $uri);

		if ($getData->num_rows() > 0)
			return $getData->result_array();
		else
			return null;
	}

}

?>