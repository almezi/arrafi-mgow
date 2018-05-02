	<?php
	class m_katu extends CI_Model{

		function bisaAbsen($id){
			$this->db->where("DATE(`tgl_absen`)", "DATE(NOW())", false);
			return !$this->db->get_where("presensi", ["id_pegawai" => $id])->row();
		}
		
		function get_list_data(){
			if(!$this->input->post('nama')){
				$query=$this->db->query("select * from pegawai order by nama asc");
				return $query;
			}
			
			$nama = $this->input->post('nama');
			$query=$this->db->query("select * from pegawai where nama like '%$nama%' ");
			return $query;
		}

		function get_history_login(){
			$query=$this->db->query("select a.username, b.nama, a.status, a.login_terakhir from hak_akses a join pegawai b on (a.username=b.username) order by login_terakhir desc");
			return $query;
		}

		function getFoto(){
			$status = $this->session->userdata('username');
			$id = $this->db->query("select * from user join pegawai using(username) where username='$status'");
			return $id;
		}

		function get_pegawai_caraka(){
			$sql = $this->db->select('*')
				->from('pegawai')
				->where('bagian','caraka');
		return $sql->get();
		}

		function get_periode_penilaian(){
			$sql = $this->db->query("select distinct periode from penilaian");
				//->where('bagian','caraka');
		return $sql;
		}

		function getFilterNamaAbsensi(){
			$sql = $this->db->query("select distinct nama from pegawai");
				//->where('bagian','caraka');
		return $sql;
		}		

		function getdata_periode_penilaian($peri){
			$sql = $this->db->query("select p.id_pegawai,nama,bagian,periode,absensi,kegiatan,keramahan,round((absensi+kegiatan+keramahan)/3,2) as rata from pegawai p join penilaian pn on(p.id_pegawai=pn.id_pegawai) where pn.periode='$peri'");
				//->where('bagian','caraka');
		return $sql;
		}		

		function get_kegiatan_pegawai_caraka($peg){
			$tgl = date("yyyy-mm-dd HH24:MI:SS");
			$sql = $this->db->query("select k.id_kegiatan, k.waktu, (select nama_kegiatan from kegiatan_kebersihan where id_nama=k.id_nama) as nk from detail_kegiatan_kebersihan k where (select id_pegawai from presensi where id_presensi=k.id_presensi)='$peg' or k.waktu='$tgl'");
		   return $sql;

		}

		/*function getNilaiAbsensi() {
			$result = $this->db->query('select ((select count(*) from presensi where status_presensi = \'hadir\' and id_pegawai = o.id_pegawai)/(select count(*) from presensi where id_pegawai = o.id_pegawai))*100 absensi, id_pegawai, (select nama from pegawai where id_pegawai = o.id_pegawai) nama_pegawai from presensi o;');
			return $result;
		}*/

		function hapusKegiatan($id){
			$this->db->where('id_kegiatan',$id);
			$this->db->delete('detail_kegiatan_kebersihan');
		}
		function getNilaiAbsensi($tgl,$pgw) {
			$result = $this->db->query("select round(((select count(*) from presensi where status_presensi ='hadir' and id_pegawai = o.id_pegawai)/(select count(*) from presensi where id_pegawai = o.id_pegawai))*100) absensi, id_pegawai, (select nama from pegawai where id_pegawai = o.id_pegawai) nama_pegawai from presensi o where date_format(tgl_absen,'%m')=date_format('$tgl','%m') and o.id_pegawai='$pgw'");
			return $result;
		}

		function getDataPegawai(){
			return $this->db->order_by("nama", "asc")->get("pegawai")->result();
		}

		function insert($url){
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$status=$this->input->post('status_user1');
			$id_pegawai=$this->input->post('id_pegawai');	
			$nama=$this->input->post('nama');
			$tgl_lahir=$this->input->post('tgl_lahir');
			$alamat=$this->input->post('alamat');
			$no_hp=$this->input->post('no_hp');
			$bagian=$this->input->post('bagian');
			$this->db->set('foto', $url);
			$hakAkses = $this->db->query("insert into hak_akses (username,password,status) values ('$username','$password','$status')");
			$query= $this->db->query("insert into pegawai(id_pegawai,nama,tgl_lahir,alamat,no_hp,bagian,foto,username)
				values ('$id_pegawai','$nama','$tgl_lahir','$alamat','$no_hp','$bagian','$url','$username')");
		}

		function insert_pembagian_jadwal(){
			$nama=$this->input->post('nama');
			$tgl_mulai=$this->input->post('tgl_mulai');
			$tgl_selesai=$this->input->post('tgl_selesai');
			$tugas=$this->input->post('tugas');
			$query= $this->db->query("insert into jadwal(id_pegawai,tgl_mulai,tgl_selesai,tugas)
				values ('$nama','$tgl_mulai','$tgl_selesai','$tugas')");
		}

		function edit_jadwal($idjadwal){
		$query=$this->db->query("select *
								from jadwal
								where id_jadwal='$idjadwal'");
		return $query->row();
		}	

		function simpan_edit_jadwal(){
		$idjadwal =$this->input->post('id');
		$tgl =$this->input->post('tgl_mulai');
		$tgl_selesai =$this->input->post('tgl_selesai');
		$tugas =$this->input->post('tugas');
			$query=$this->db->query("update jadwal
						set tgl_mulai = '$tgl', 
						tgl_selesai = '$tgl_selesai', 
						tugas = '$tugas'
						where id_jadwal = '$idjadwal'");

		}

		function get_pegawai(){
			$query=$this->db->query("select * from pegawai");
			return $query;
		}

		function get_pegawai_by_username($un){
			$this->db->where('username',$un);
			$query=$this->db->query("select * from pegawai");
			return $query->row_array();
		}

		function get_list_data_pembg_tugas(){
			if(!$this->input->post('tgl_absen')){
				$query=$this->db->query("select a.id_jadwal as id_jadwal, tgl_mulai, tgl_selesai, tugas, nama from jadwal a left join pegawai c on a.id_pegawai=c.id_pegawai order by tugas asc");
				//$query=$this->db->query("select j.tgl_mulai,j.tgl_selesai,j.tugas,p.nama as nama from jadwal j join presensi ps on (j.id_jadwal=ps.id_jadwal)
					//join pegawai p on (ps.id_pegawai=p.id_pegawai)");
				return $query;
			}
			$tgl_absen = $this->input->post('tgl_absen');
			$query=$this->db->query("select * from presensi where tgl_absen like '%$tgl_absen%' ");
			return $query;
		}

		function get_presensi(){
			$query=$this->db->query("select p.id_pegawai,p.nama,p.bagian,pr.tgl_absen,pr.status_presensi,pr.alasan from pegawai p join presensi pr on (p.id_pegawai=pr.id_pegawai) order by pr.tgl_absen desc");
			return $query;
		}

		public function get_jadwal(){
			$query=$this->db->query("select * from jadwal");
			return $query;
		}

		function insert_form_ketidakhadiran(){
			$tgl_absen=$this->input->post('tgl_tugas');
			$status_presensi=$this->input->post('status_presensi');
			$tgl = date("Y-m-d"); 
			$alasan=$this->input->post('alasan');
			$id_pegawai=$this->input->post('nama');
			$jdw = $this->input->post('jadwal');
			$query= $this->db->query("insert into presensi  
				values ('','$tgl','$status_presensi','$alasan','','$id_pegawai')");

		}

		function insert_pergantian(){
			$tgl_absen=$this->input->post('tgl_tugas');
			//$status_presensi=$this->input->post('status_presensi');
			//$nama=$this->input->post('nama');
			$tgl = date("Y-m-d"); 
			//$alasan=$this->input->post('alasan');
			$id_pegawai=$this->input->post('nama');
			$jdw = $this->input->post('jadwal');
			$query= $this->db->query("insert into presensi  
				values ('','$tgl','hadir','','$jdw','$id_pegawai')");

		}
		
		function get_by_id($id){
			$query=$this->db->query("select * from hak_akses a join pegawai b on (a.username=b.username) where a.username='$id'");
			return $query;
		}
		function update_profil($id){
			$nmfile = "name".time(); //nama file saya beri nama langsung dan diikuti fungsi time
			$config['upload_path'] = './foto/'; //path folder
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '2048'; //maksimum besar file 2M
			$config['max_width']  = '1288'; //lebar maksimum 1288 px
			$config['max_height']  = '768'; //tinggi maksimu 768 px
			$config['file_name'] = $nmfile; //nama yang terupload nantinya

			$this->load->library('upload', $config);
			if ($this->upload->do_upload()==true)
			{
				$gbr = $this->upload->data();
				
				$password=$this->input->post('password');
				$status=$this->input->post('status_user1');
				$nama=$this->input->post('nama');
				$tgl_lahir=$this->input->post('tgl_lahir');
				$alamat=$this->input->post('alamat');
				$no_hp=$this->input->post('no_hp');
				$bagian=$this->input->post('bagian');
				$foto=$gbr['file_name'];


				$query=$this->db->query("update hak_akses set password='$password',status='$status' where username='$id'");
				$query1=$this->db->query("update pegawai set nama='$nama',tgl_lahir='$tgl_lahir',alamat='$alamat', 
					no_hp='$no_hp',bagian='$bagian',foto='$foto' where username='$id'");
			}
			else{
			
				$password=$this->input->post('password');
				$status=$this->input->post('status_user1');
				$nama=$this->input->post('nama');
				$tgl_lahir=$this->input->post('tgl_lahir');
				$alamat=$this->input->post('alamat');
				$no_hp=$this->input->post('no_hp');
				$bagian=$this->input->post('bagian');
				


				$query=$this->db->query("update hak_akses set password='$password',status='$status' where username='$id'");
				$query1=$this->db->query("update pegawai set nama='$nama',tgl_lahir='$tgl_lahir',alamat='$alamat', 
					no_hp='$no_hp',bagian='$bagian' where username='$id'");
			}

			
		}

		function getBulanPresensi(){
			$query = $this->db->query("select distinct(date_format(tgl_absen,'%Y-%b')) as bln_absen
				from presensi
				order by bln_absen asc");
			return $query;
		}
		function getTahunPresensi(){
			$query = $this->db->query("select distinct(date_format(tgl_absen,'%Y')) as tgl
				from presensi");
			return $query;								
		}

		function filterPeriodeAbsen($a){
			$query = $this->db->query("select p.id_pegawai,p.nama,p.bagian,pr.tgl_absen,pr.status_presensi,pr.alasan from pegawai p join presensi pr on (p.id_pegawai=pr.id_pegawai) where DATE_FORMAT(tgl_absen, '%Y-%b')='$a' order by pr.tgl_absen desc");
			return $query;	
		}

		function filterNamaAbsen($a){
			$query = $this->db->query("select p.id_pegawai,p.nama,p.bagian,pr.tgl_absen,pr.status_presensi,pr.alasan from pegawai p join presensi pr on (p.id_pegawai=pr.id_pegawai) where p.nama='$a'");
			return $query;	
		}

		
		function get_rekap_kunjungan(){
			$query=$this->db->query("select * from kunjungan");
			return $query;
		}

		function get_rekap_kunjungan_bln($a){
			$query = $this->db->query("select * from kunjungan where date_format(tgl_kunjungan,'%Y-%b') ='$a'
				");
			return $query;
		}

		function getBulan(){
			$query = $this->db->query("select distinct(date_format(tgl_kunjungan,'%Y-%b')) as bln_kunjungan
				from kunjungan
				order by bln_kunjungan asc");
			return $query;
		}

		function filterKunjungan($a){
			$query = $this->db->query("select * from kunjungan where date_format(tgl_kunjungan,'%Y-%b') ='$a'
				");
			return $query;	
		}

		function getPrestasi(){
			$sql = $this->db->query('select p.id_pegawai,nama,bagian,periode,absensi,kegiatan,keramahan,round((absensi+kegiatan+keramahan)/3,2) as rata from pegawai p join penilaian pn on(p.id_pegawai=pn.id_pegawai)');
			return $sql;
		}

		function getTahun(){
			$query = $this->db->query("select distinct(date_format(tgl_kunjungan,'%Y')) as tgl
				from kunjungan");
			return $query;								
		}

		function get_rekap_peristiwa(){
			$query=$this->db->query("select * from peristiwa");
			return $query;
		}
		function get_rekap_peristiwa_bln($b){
			$query = $this->db->query("select * from peristiwa where date_format(tgl_peristiwa,'%Y-%b') ='$b'");
			return $query;
		}

		function getBulanPeristiwa(){
			$query = $this->db->query("select distinct(date_format(tgl_peristiwa,'%Y-%b')) as bln_peristiwa
				from peristiwa
				order by bln_peristiwa asc");
			return $query;
		}

		function filterPeristiwa($b){
			$query = $this->db->query("select * from peristiwa where date_format(tgl_peristiwa,'%Y-%b') ='$b'
				");
			return $query;	
		}

		function getTahunPeristiwa(){
			$query = $this->db->query("select distinct(date_format(tgl_peristiwa,'%Y')) as tgl
				from peristiwa");
			return $query;								
		}

		function getNama($nama){
			$sql = $this->db->select('*')
				->from('pegawai')
				->where('username',$nama);
		return $sql->get();
		}

		function insert_pengajuan($id){
			$this->db->set('id_pegawai', $id);
						$tgl = gmdate("Y-m-d H:i:s",time()+60*60*7); 
			$this->db->set('nama_barang', $this->input->post('nama_barang'));
			$this->db->set('merk_barang', $this->input->post('merk_barang'));
			$this->db->set('tgl_pengajuan',$tgl);
			$this->db->set('jumlah_permintaan',$this->input->post('jumlah_permintaan'));
			$this->db->set('ket_permintaan',$this->input->post('ket_permintaan'));
			$this->db->insert('permintaan_barang');
		}

		function insert_penilaian(){
			$periode=$this->input->post('periode');
			$pegawai = $this->input->post('nama');
			$absensi=$this->input->post('absensi');
			$kegiatan=$this->input->post('kegiatan');
			$keramahan=$this->input->post('keramahan');
			$query= $this->db->query("insert into penilaian (id_penilaian,periode,absensi,kegiatan,keramahan,id_pegawai)
				values (null,'$periode','$absensi','$kegiatan','$keramahan','$pegawai')");

		}

		function simpan_nama_kebersihan(){
			$waktu_tambah=$this->input->post('waktu_tambah');
			$nama_kegiatan=$this->input->post('nama_kegiatan');
			$query = $this->db->query("insert into kegiatan_kebersihan values ('','$nama_kegiatan',NOW())");
		}

		/*function get_laporan_nilai(){
			$query=$this->db->query("select a.nama, b.periode, b.absensi, b.kegiatan, b.keramahan , a.status from hak_akses a join pegawai b on (a.username=b.username)");
			return $query;
		}*/

		function get_rekap_pengajuan(){
			$query=$this->db->query("SELECT DP.tgl_progres,DP.tgl_tersedia,DP.tgl_diambil,DP.barang_diambil,DP.barang_tersedia,DP.progres, DP.iddetail,DP.IDDETAIL, DP.jumlah_barang,P.NAMA,PB.ID_PENGAJUAN, PB.TGL_PENGAJUAN,B.NAMA_BARANG, B.MERK_BARANG FROM PEGAWAI P JOIN PENGAJUAN_BARANG PB ON (P.ID_PEGAWAI=PB.ID_PEGAWAI) JOIN DETAIL_PENGAJUAN DP ON (PB.ID_PENGAJUAN=DP.ID_PENGAJUAN) JOIN BARANG B ON (DP.KODE_BARANG=B.KODE_BARANG) where DP.progres=''");
			return $query;
		}
		
		function get_rekap_pengajuan_yang_diajukan(){
			$query=$this->db->query("SELECT DP.tgl_progres,DP.tgl_tersedia,DP.tgl_diambil,DP.barang_diambil,DP.barang_tersedia,DP.progres, DP.iddetail,DP.IDDETAIL, DP.jumlah_barang,P.NAMA,PB.ID_PENGAJUAN, PB.TGL_PENGAJUAN,B.NAMA_BARANG, B.MERK_BARANG FROM PEGAWAI P JOIN PENGAJUAN_BARANG PB ON (P.ID_PEGAWAI=PB.ID_PEGAWAI) JOIN DETAIL_PENGAJUAN DP ON (PB.ID_PENGAJUAN=DP.ID_PENGAJUAN) JOIN BARANG B ON (DP.KODE_BARANG=B.KODE_BARANG) where DP.barang_tersedia='ya' and DP.barang_diambil=''");
			//$query=$this->db->query("select *,(select nama from pegawai where id_pegawai=pb.id_pegawai) as nama from permintaan_barang pb");
			// echo ("SELECT DP.barang_tersedia,DP.progress,DP.iddetail,P.NAMA,PB.ID_PENGAJUAN, PB.TGL_PENGAJUAN ,B.NAMA_BARANG, B.MERK_BARANG, DP.IDDETAIL, DP.JUMLAH_PERMINTAAN FROM PEGAWAI P JOIN PENGAJUAN_BARANG PB ON (P.ID_PEGAWAI=PB.ID_PEGAWAI) JOIN DETAIL_PENGAJUAN DP ON (PB.ID_PENGAJUAN=DP.ID_PENGAJUAN) JOiN BARANG B ON (DP.KODE_BARANG=B.KODE_BARANG) where progress ='Progress'");die();
			return $query;
		}

		function getProgres($id){
			$this->db->set('progres','proses');
			$this->db->set('barang_tersedia','ya');
			$this->db->set('tgl_tersedia',date('Y-m-d'));
			$this->db->set('tgl_progres',date('Y-m-d'));
			$this->db->where('iddetail',$id);
			$this->db->update('detail_pengajuan');

		}

		function get_rekap_pengajuan_yang_selesai(){
			$query=$this->db->query("SELECT DP.tgl_progres,DP.tgl_tersedia,DP.tgl_diambil,DP.barang_diambil,DP.barang_tersedia,DP.progres, DP.iddetail,DP.IDDETAIL, DP.jumlah_barang,P.NAMA,PB.ID_PENGAJUAN, PB.TGL_PENGAJUAN,B.NAMA_BARANG, B.MERK_BARANG FROM PEGAWAI P JOIN PENGAJUAN_BARANG PB ON (P.ID_PEGAWAI=PB.ID_PEGAWAI) JOIN DETAIL_PENGAJUAN DP ON (PB.ID_PENGAJUAN=DP.ID_PENGAJUAN) JOIN BARANG B ON (DP.KODE_BARANG=B.KODE_BARANG) where DP.barang_tersedia='ya' and DP.barang_diambil='ya'");
			//$query=$this->db->query("select *,(select nama from pegawai where id_pegawai=pb.id_pegawai) as nama from permintaan_barang pb");
			// echo ("SELECT DP.barang_tersedia,DP.progress,DP.iddetail,P.NAMA,PB.ID_PENGAJUAN, PB.TGL_PENGAJUAN ,B.NAMA_BARANG, B.MERK_BARANG, DP.IDDETAIL, DP.JUMLAH_PERMINTAAN FROM PEGAWAI P JOIN PENGAJUAN_BARANG PB ON (P.ID_PEGAWAI=PB.ID_PEGAWAI) JOIN DETAIL_PENGAJUAN DP ON (PB.ID_PENGAJUAN=DP.ID_PENGAJUAN) JOiN BARANG B ON (DP.KODE_BARANG=B.KODE_BARANG) where progress ='Progress'");die();
			return $query;
		}
		
		function setKetersediaan($id){
			$this->db->set('barang_tersedia','ya');
			$this->db->set('tgl_tersedia',date('Y-m-d'));
			$this->db->where('iddetail',$id);
			$this->db->update('detail_pengajuan');
		}
		
		function upd_pengambilan($id){
			$this->db->set('barang_diambil','ya');
			$this->db->set('tgl_diambil',date('Y-m-d'));
			$this->db->where('iddetail',$id);
			$this->db->update('detail_pengajuan');
		}
		function getTotalSemua(){
			$query = $this->db->query("select sum(jumlah_permintaan) as total from permintaan_barang pb");
			return $query;
		}

		function getBulanPengajuan(){
			$query = $this->db->query("select distinct(date_format(tgl_pengajuan,'%Y-%b')) as bln
				from permintaan_barang
				order by tgl_pengajuan asc");
			return $query;
		}

		function filterBulanPengajuan($a){
			$query = $this->db->query("select *,(select nama from pegawai where id_pegawai=pb.id_pegawai) as nama from permintaan_barang pb where date_format(tgl_pengajuan,'%Y-%b') ='$a'
				");
			return $query;	
		}

		function getTotalPengajuan($b){
			$query = $this->db->query("select sum(jumlah_permintaan) as total from permintaan_barang pb where date_format(tgl_pengajuan,'%Y-%b') ='$b'");
			return $query;
		}

		function get_info(){
			$today = date("d/m/Y");
			$query = $this->db->query("select p.id_pegawai,p.nama,ps.tgl_absen,ps.status_presensi,ps.alasan,j.tgl_mulai,j.tgl_selesai,j.tugas, j.id_jadwal
				from pegawai p join presensi ps on(p.id_pegawai=ps.id_pegawai)
					join jadwal j on(ps.id_jadwal=j.id_jadwal)
					where DATE_FORMAT(ps.tgl_absen, '%d/%m/%Y')='$today'");
			return $query;
		}

		function getNamaPegawai(){
			return $this->db->order_by("nama", "asc")->get("pegawai")->result();
		}

		public function getDK(){
		$sql = $this->db->select('*')
				->from('detail_kegiatan_kebersihan')
				->where('id_presensi');
				return $sql->get();
		}
		
		function report(){
			$sql=$this->db->query("SELECT COUNT(TGL_KUNJUNGAN) as jumlah, date_format(tgl_kunjungan,'%d-%m-%Y') as tgl FROM KUNJUNGAN WHERE DATE_FORMAT(TGL_KUNJUNGAN,'%Y')=DATE_FORMAT(CURDATE(),'%Y') GROUP BY DATE_FORMAT(TGL_KUNJUNGAN,'%m') ");
			return $sql->result();
		}

		function reportPeristiwa(){
			$sql=$this->db->query("SELECT COUNT(TGL_PERISTIWA) as jumlah, date_format(tgl_peristiwa,'%d-%m-%Y') as tgl FROM PERISTIWA WHERE DATE_FORMAT(TGL_PERISTIWA,'%Y')=DATE_FORMAT(CURDATE(),'%Y') GROUP BY DATE_FORMAT(TGL_PERISTIWA,'%m') ");
			return $sql->result();
		}

		function setUpdateStatus($id){
		$
		
				$nama=$this->input->post('NAMA');
				$id_pengajuan=$this->input->post('ID_PENGAJUAN');
				$tgl_pengajuan=$this->input->post('TGL_PENGAJUAN');
				$nama_barang=$this->input->post('NAMA_BARANG');
				$merk_barang=$this->input->post('MERK_BARANG');
				$iddetail=$this->input->post('IDDETAIL');
				$jumlah_permintaan=$this->input->post('JUMLAH_PERMINTAAN');

				$query=$this->db->query("update ");
		}

		
	} 
	?>