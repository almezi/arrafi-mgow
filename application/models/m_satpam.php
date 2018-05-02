	<?php
	class m_satpam extends CI_Model{
		
		
		function insert(){
			$tgl_absen=$this->input->post('tgl_tugas');
			$id_pegawai = $this->input->post('id_pegawai');
			$jdw = $this->input->post('jadwal');
			//date_default_timezone_set('Asia/Jakara');
			$query=$this->db->query("select * from jadwal where '".$tgl_absen."' >=tgl_mulai and '".$tgl_absen."'<=tgl_selesai");
			
			if($query->num_rows()>0){
					$tgl = gmdate("Y-m-d H:i:s",time()+60*60*7); 
				   // $this->db->set('tgl_absen',$tgl);
				   // $this->db->set('status_presensi', 'hadir');
				   // $this->db->set('id_pegawai',$id_pegawai);
					//$this->db->insert('presensi');
					$this->db->query("insert into presensi (tgl_absen,status_presensi,id_pegawai,id_jadwal) 
						values('$tgl','hadir','$id_pegawai','$jdw')");
				}
			
		}

		public function get_jadwal(){
			$query=$this->db->query("select * from jadwal");
			return $query;
		}


		// function simpan_Absen(){
		// 	$data['foto'] = $this->m_katu->getFoto();
			
		//   	$insert_id=$this->m_satpam->insert();
			
		// 	// echo $data["foto"]->row()->id_pegawai;
		// 	//echo $this->m_katu->bisaAbsen($data["foto"]->row()->id_pegawai);
		// 	redirect('c_arSatpam/form_presensi');
		// }


		function cekPresensi($id){
			$tgl1 = date("Y-m-d");
			$sql = $this->db->select('*')
					->from('presensi')
					->where('id_pegawai',$id)
					->where('date_format(tgl_absen,"%Y-%m-%d")',$tgl1);
				    return $sql->get();
		}

		function checkPresensi($id_pegawai) {
			$this->db->where("DATE(`tgl_absen`)", "DATE(NOW())", false);
			//return !$this->db->get_where("presensi", ["id_pegawai" => $id_pegawai])->row();
			//$query = $this->db->query('select * from presensi where id_pegawai = \''.$id_pegawai.'\' and tgl_absen = DATE(NOW())');
			return $this->db->get_where("presensi", ["id_pegawai" => $id_pegawai])->row()->id_presensi;
			//return $query->result_array();
		}

		public function get_kunjungan(){
			$query=$this->db->query("select * from kunjungan order by tgl_kunjungan desc");
			return $query;
		}

		/*function insert_form_ketidakhadiran(){
			$tgl_absen=$this->input->post('tgl_tugas');
			$status_presensi=$this->input->post('status_presensi');
			$alasan=$this->input->post('keterangan');
			$query= $this->db->query("insert into presensi
									values ('','$tgl_absen','$status_presensi','$alasan','6301134097')");
		}*/	

		function insert_form_kunjungan(){

			$id_pegawai=$this->session->userdata('kodepeg');
			$id_presensi=$this->input->post('id_presensi');
			$tgl_kunjungan=$this->input->post('tgl_kunjungan');
			$jam_kunjungan=$this->input->post('jam_kunjungan');
			$nama=$this->input->post('nama');
			$institusi=$this->input->post('institusi');
			$agenda=$this->input->post('agenda');
			//$query= $this->db->query("insert into kunjungan select '','$id_presensi','$tgl_kunjungan','$jam_kunjungan',
				//'$nama','$institusi','$agenda' from presensi where tgl_absen=curdate() limit 1");

			$query= $this->db->query("insert into kunjungan(id_presensi,tgl_kunjungan,nama,jam_kunjungan,institusi,agenda) values ('$id_presensi','$tgl_kunjungan','$nama','$jam_kunjungan','$institusi','$agenda')");
		}	

		function cek_absen(){
			$id_pegawai=$this->session->userdata('kodepeg');
			$today = date("d/m/Y");
			$query= $this->db->query("select count(*) ro from presensi where id_pegawai='$id_pegawai'
				and DATE_FORMAT(tgl_absen, '%d/%m/%Y')='$today'");
			$jum=0;
			foreach ($query->result() as $x) {
				$jum=$x->ro;
			}
			return $jum;
		}	

		public function get_peristiwa(){
			$query=$this->db->query("select * from peristiwa order by tgl_peristiwa desc");
			return $query;
		}
		function insert_form_peristiwa($url){
			
			$id_pegawai=$this->session->userdata('kodepeg');
			$id_presensi=$this->input->post('id_presensi');
			$tgl_peristiwa=$this->input->post('tgl_peristiwa');
			$jam_peristiwa=$this->input->post('jam_peristiwa');
			$kejadian=$this->input->post('kejadian');
			$bukti=$this->input->post('bukti');
			$deskripsi=$this->input->post('deskripsi');
			// $video='';
			// $status_penyelesaian='';
			$this->db->set('video', $url);


			$query= $this->db->query("insert into peristiwa select '',id_presensi,'$tgl_peristiwa','$jam_peristiwa',
				'$kejadian','$bukti','$deskripsi','$url' from presensi where tgl_absen=curdate() limit 1");

			// Cadangan
			// $query= $this->db->query("insert into peristiwa(id_presensi,tgl_peristiwa,jam_peristiwa,kejadian,bukti,deskripsi,video) values ($id_presensi','$tgl_peristiwa','$jam_peristiwa','$kejadian','$bukti','$deskripsi','$video')");
		}

		function edit_kunjungan($idkunjungan){
		$query=$this->db->query("select *
								from kunjungan
								where id_kunjungan='$idkunjungan'");
		return $query->row();
		}	

		function simpan_edit_kunjungan(){
		$id =$this->input->post('id');
		$tgl =$this->input->post('tgl');
		$jam =$this->input->post('jam');
		$nama =$this->input->post('nama');
		$institusi =$this->input->post('institusi');
		$agenda =$this->input->post('agenda');
			$this->db->query("update kunjungan
						set tgl_kunjungan = '$tgl', 
						jam_kunjungan = '$jam', 
						nama = '$nama', 
						institusi = '$institusi', 
						agenda = '$agenda'
						where id_kunjungan = '$id'");

		}
		
		function edit_peristiwa($idperistiwa){
		$query=$this->db->query("select *
								from peristiwa
								where id_peristiwa='$idperistiwa'");
		return $query->row();
		}	

		function simpan_edit_peristiwa(){
		$id =$this->input->post('id');
		$bukti =$this->input->post('bukti');
		$deskripsi =$this->input->post('deskripsi');
		$up =$this->db->query("update peristiwa
						set bukti = '$bukti', 
						deskripsi = '$deskripsi'
						where id_peristiwa = '$id'");
		return $up;
		}

		function setUpdateStatus($id){
		$up =$this->db->query("update peristiwa
						set status_penyelesaian = 'selesai' 
						where id_peristiwa ='$id'");
		return $up;
		}
		
		function get_historyAbsenUser(){
		$id_pegawai=$this->session->userdata('kodepeg');
			$query=$this->db->query("select * from presensi where id_pegawai='$id_pegawai' order by tgl_absen");
			return $query;
		}

		function getPrestasi(){
			$id_pegawai=$this->session->userdata('kodepeg');
			$sql = $this->db->query("select periode,absensi,kegiatan,keramahan,round((absensi+kegiatan+keramahan)/3,2) as rata from pegawai p join penilaian pn on(p.id_pegawai=pn.id_pegawai) where p.id_pegawai='$id_pegawai'");
			return $sql;
		}
	} 
?>
