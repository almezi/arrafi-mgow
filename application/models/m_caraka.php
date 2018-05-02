	<?php
	class m_caraka extends CI_Model{

		public function insert_absen(){
			$tgl_absen=$this->input->post('tgl_tugas');
			$id_pegawai=$this->session->userdata('kodepeg');
			$jdw = $this->input->post('jadwal');
			// $query=$this->db->query("select * from jadwal where tgl_mulai <='".$tgl_absen."'  and tgl_selesai >='".$tgl_absen."'");

			$query=$this->db->query("select * from jadwal where '".$tgl_absen."' >=tgl_mulai and '".$tgl_absen."'<=tgl_selesai");

			if($query->num_rows()>0){
					$tgl = gmdate("Y-m-d H:i:s",time()+60*60*7); 
			$hakAkses = $this->db->query("insert into presensi values (0,NOW(), 'hadir','','$id_pegawai','$jdw')");
			return $hakAkses;
			}
		}


		public function get_jadwal(){
			$query=$this->db->query("select * from jadwal");
			return $query;
		}
		
		public function insertPengajuan($tgl_pengajuan){
		$id_pegawai=$this->session->userdata('kodepeg');
		$this->db->set('id_pegawai',$id_pegawai);
		$this->db->set('tgl_pengajuan',$tgl_pengajuan);
		$this->db->insert('pengajuan_barang');
		}
		
		public function getIdpengajuan(){
		$sql = $this->db->query('select * from pengajuan_barang order by id_pengajuan desc limit 1');
		return $sql;
		}
		
		public function insertDetailPengajuan($brg,$jml,$ket, $dt, $tgl_pengajuan){
		/*$this->db->set('id_pengajuan',$dt);
		$this->db->set('kode_barang',$brg);
		$this->db->set('jumlah_permintaan',$jml);
		$this->db->set('ket_permintaan',$ket);
		$this->db->insert('detail_pengajuan');*/
		$query=$this->db->query("insert into detail_pengajuan (id_pengajuan, kode_barang, jumlah_barang, ket_permintaan, progres, tgl_progres) values ('$dt', '$brg', '$jml','$ket', 'proses', '$tgl_pengajuan')");
		}	
			
		public function getBarang(){
			$sql= $this->db->select('*')
					->from('barang')
					->where('id_jenis','J-002');
			return $sql->get();
		}
		
		public function cekAbsen(){
		$id_pegawai=$this->session->userdata('kodepeg');
		$dt = date('Y-m-d');
		$sql = $this->db->select('*')
					->from('presensi')
					->where('id_pegawai',$id_pegawai)
					->where('substr(tgl_absen,1,10)',$dt);
						return $sql->get();
		
		}


		public function cekKeg1($idp,$idn){
		//$id_pegawai=$this->session->userdata('kodepeg');
		$dt = date('Y-m-d');
		$sql = $this->db->select('*')
					->from('detail_kegiatan_kebersihan')
					->where('id_presensi',$idp)
					->where('id_nama',$idn)
					->where('substr(waktu,1,10)',$dt);
						return $sql->get();
		
		}

		function checkKegiatan($data){
			$this->db->where("DATE(`waktu`)", "DATE(NOW())", false);
			return $this->db->get_where("keg_kebersihan", $data)->row();
		}

		function checkPresensi($id_pegawai){
			$this->db->where("DATE(`tgl_absen`)", "DATE(NOW())", false);
			return $this->db->get_where("presensi", ["id_pegawai" => $id_pegawai])->row()->id_presensi;
		}

		function insertKebersihan($data){
			$this->db->set("id_kegiatan",	0);
			$this->db->set("waktu"		,	"NOW()", false);
			return $this->db->insert("keg_kebersihan", $data);
		}

		function updateKebersihan($data, $condition){
			$this->db->update("keg_kebersihan", $data, $condition);
		}

		function get_Kegiatan(){
			$status = $this->session->userdata('id_pegawai');
			$query  = $this->db->from('keg_kebersihan')
							->join('presensi','presensi.id_presensi = keg_kebersihan.id_presensi')
							->where('id_pegawai', $this->session->userdata('kodepeg'));
							// ->where('waktu',date(KOMENTAAR UNTUK SELEKSI DATE))
			$this->db->where("DATE(`tgl_absen`)", "DATE(NOW())", FALSE);
			$query = $this->db->get();

			// $query = $this->db->query("select * from keg_kebersihan
			// 			join presensi on presensi.id_presensi = keg_kebersihan.id_presensi
			// 			where presensi.id_pegawai = 6301134091");

			return $query->result();
		}
		
		public function getKegiatan(){
			$cek = $this->cekAbsen()->row();
			$sql= $this->db->query("select id_nama, nama_kegiatan, (case when id_nama in (select id_nama from detail_kegiatan_kebersihan where id_presensi='".$cek->id_presensi."') then 'ada' else 'tidak' end) as check_status from kegiatan_kebersihan");
			return $sql->result();
		}
		
		public function getKegiatan1(){
			$sql= $this->db->select('*')
				->from('kegiatan_kebersihan')
				->where('id_nama','0');
			return $sql->get();
		}

		public function deleteDetailKebersihan($idnama){
			$cek = $this->cekAbsen()->row();
			$query = $this->db->query("delete from detail_kegiatan_kebersihan where id_presensi='".$cek->id_presensi."' and id_nama='".$idnama."'");
			return $query;
		}
		
		public function insertDetailKebersihan($idnama){
			$cek = $this->cekAbsen()->row();
			$ck = $this->cekKeg1($cek->id_presensi,$idnama);
			if($ck->num_rows()>0){

			}
			else{
			

			$cekdual;
			$sql = $this->db->query('select sysdate() as waktu from dual');
			foreach ($sql->result() as $value) {
				$cekdual= $value->waktu;
			}
			$this->db->set('id_presensi',$cek->id_presensi);
			$this->db->set('id_nama',$idnama);
			$this->db->set('waktu',$cekdual);
			$this->db->insert('detail_kegiatan_kebersihan');
		}
		}
		
		public function getDK(){
		$cek = $this->cekAbsen()->row();
		$sql = $this->db->select('*')
				->from('detail_kegiatan_kebersihan')
				->where('id_presensi',$cek->id_presensi);
				return $sql->get();
		}

		function insert_pengajuan(){
			$id_pegawai=$this->input->post('id_pegawai');
			$nama=$this->input->post('nama');
			$nama_barang=$this->input->post('nama_barang');
			$merk_barang=$this->input->post('merk_barang');
			$tgl_pengajuan=$this->input->post('tgl_pengajuan');
			$jumlah_permintaan=$this->session->userdata('jumlah_permintaan');
			$ket_permintaan=$this->session->userdata('ket_permintaan');
			$query = $this->db->query("insert into permintaan_barang values ('','$id_pegawai','$nama','$nama_barang','$merk_barang','$tgl_pengajuan',$jumlah_permintaan','$ket_permintaan')");
			return $this->db->insert_id();
		}

		function get_rekapPengajuan(){
			$query=$this->db->query("select a.nama, b.periode, b.absensi, b.kegiatan, b.keramahan , a.status from hak_akses a join pegawai b on (a.username=b.username)");
			return $query;
		}

		function get_historyAbsenUser(){
		$id_pegawai=$this->session->userdata('kodepeg');
			$query=$this->db->query("select * from presensi where id_pegawai='$id_pegawai' order by tgl_absen desc");
			return $query;
		}

		function getPrestasi(){
			$id_pegawai=$this->session->userdata('kodepeg');
			$sql = $this->db->query("select periode,absensi,kegiatan,keramahan,round((absensi+kegiatan+keramahan)/3,2) as rata from pegawai p join penilaian pn on(p.id_pegawai=pn.id_pegawai) where p.id_pegawai='$id_pegawai'");
			return $sql;
		}

		function get_rekap_pengajuan(){
			$id_pegawai=$this->session->userdata('kodepeg');
			$query = $this->db->query("SELECT DISTINCT dp.progres, p.nama, pb.id_pengajuan, pb.tgl_pengajuan, b.nama_barang, b.merk_barang, dp.iddetail, dp.jumlah_barang 
			FROM pegawai p JOIN pengajuan_barang pb ON (p.id_pegawai=pb.id_pegawai) JOIN detail_pengajuan dp ON (pb.id_pengajuan=dp.id_pengajuan) join barang b ON (dp.kode_barang=b.kode_barang) where pb.id_pegawai='$id_pegawai'");
			//$query=$this->db->query("select *,(select nama from pegawai where id_pegawai=pb.id_pegawai) as nama from permintaan_barang pb");
			// $query = $this->db->query("SELECT DP.progress,P.NAMA,PB.ID_PENGAJUAN, PB.TGL_PENGAJUAN ,B.NAMA_BARANG, B.MERK_BARANG, DP.IDDETAIL, DP.JUMLAH_PERMINTAAN FROM PEGAWAI P JOIN PENGAJUAN_BARANG PB ON (P.ID_PEGAWAI=PB.ID_PEGAWAI) JOIN DETAIL_PENGAJUAN DP ON (PB.ID_PENGAJUAN=DP.ID_PENGAJUAN) JOiN BARANG B ON (DP.KODE_BARANG=B.KODE_BARANG) where pb.id_pegawai='$id_pegawai'");
			return $query;
		}

	} 
?>
