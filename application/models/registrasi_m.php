<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class registrasi_m extends CI_Model{
		
		function __construct(){
			parent::__construct();
		}

		public function select_jadwal_ppdb(){
			$tahun = date('Y');
			$tahun = intval($tahun);
			$ta = ($tahun).'/'.($tahun+1);

			$this->db->select('*');
			$this->db->from('jadwal_tanggal');
			$where = array(
				'jenis' => 'PPDB',
				'ta' => $ta
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function insert_jadwal_ppdb($nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta){
			$data = array(
				'nama_kegiatan' => $nama_kegiatan,
				'keterangan' => $keterangan,
				'tgl_mulai' => $tgl_mulai,
				'tgl_selesai' => $tgl_selesai,
				'ta' => $ta,
				'status' => 'Belum',
				'jenis' => 'PPDB'
			);

			$this->db->insert('jadwal_tanggal',$data);
			$result = $this->db->affected_rows();
			return $result;
		}

		public function edit_jadwal_ppdb($id_jadwal,$nama_kegiatan,$keterangan,$tgl_mulai,$tgl_selesai,$ta,$status){
			$data = array(
				'nama_kegiatan' => $nama_kegiatan,
				'keterangan' => $keterangan,
				'tgl_mulai' => $tgl_mulai,
				'tgl_selesai' => $tgl_selesai,
				'ta' => $ta,
				'status' => $status,
				'jenis' => 'PPDB'
			);

			$this->db->where('id_jadwal', $id_jadwal);
			$this->db->update('jadwal_tanggal', $data);
			$query = $this->db->affected_rows();
			return $query;
		}

		public function select_jadwal_ppdb_per_id($id_jadwal){
			$tahun = date('Y');
			$tahun = intval($tahun);
			$ta = ($tahun).'/'.($tahun+1);

			$this->db->select('*');
			$this->db->from('jadwal_tanggal');
			$where = array(
				'id_jadwal' => $id_jadwal,
				'ta' => $ta
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function delete_jadwal_ppdb($id_jadwal){
			$this->db->where('id_jadwal', $id_jadwal);
			$this->db->delete('jadwal_tanggal');
			return $this->db->affected_rows();
		}

		public function select_jadwal_seleksi(){
			$tahun = date('Y');
			$tahun = intval($tahun);
			$ta = ($tahun).'/'.($tahun+1);

			$this->db->select('*');
			$this->db->from('jadwal_waktu');
			$where = array(
				'jenis' => 'Seleksi',
				'ta' => $ta
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function insert_jadwal_seleksi($nama_kegiatan,$keterangan,$tanggal,$waktu_mulai,$waktu_selesai,$ta,$ruangan){
			$data = array(
				'nama_kegiatan' => $nama_kegiatan,
				'keterangan' => $keterangan,
				'jenis' => 'Seleksi',
				'status' => 'Belum',
				'tanggal' => $tanggal,
				'waktu_mulai' => $waktu_mulai,
				'waktu_selesai' => $waktu_selesai,
				'nama_ruangan' => $ruangan,
				'ta' => $ta
			);

			$this->db->insert('jadwal_waktu',$data);
			$result = $this->db->affected_rows();
			return $result;
		}

		public function select_jadwal_seleksi_per_id($id_jadwal){
			$tahun = date('Y');
			$tahun = intval($tahun);
			$ta = ($tahun).'/'.($tahun+1);

			$this->db->select('*');
			$this->db->from('jadwal_waktu');
			$where = array(
				'jenis' => 'Seleksi',
				'ta' => $ta,
				'id_jadwal' => $id_jadwal
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function edit_jadwal_seleksi($id_jadwal,$nama_kegiatan,$keterangan,$tanggal,$waktu_mulai,$waktu_selesai,$nama_ruangan,$status){
			$data = array(
				'nama_kegiatan' => $nama_kegiatan,
				'keterangan' => $keterangan,
				'tanggal' => $tanggal,
				'waktu_mulai' => $waktu_mulai,
				'waktu_selesai' => $waktu_selesai,
				'status' => $status,
				'nama_ruangan' => $nama_ruangan
			);

			$this->db->where('id_jadwal', $id_jadwal);
			$this->db->update('jadwal_waktu', $data);
			$query = $this->db->affected_rows();
			return $query;
		}

		public function delete_jadwal_seleksi($id_jadwal){
			$this->db->where('id_jadwal', $id_jadwal);
			$this->db->delete('jadwal_waktu');
			return $this->db->affected_rows();
		}

		public function cek_data_siswa($no_pendaftaran){
			$this->db->select('nik');
			$this->db->from('ket_siswa');
			$where = array(
				'no_pendaftaran' => $no_pendaftaran
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function insert_data_siswa($nik,$nama_lengkap,$nama_panggilan,$jekel,$tgl_lahir,$tempat_lahir,$agama,$kewarganegaraan,$anak_ke,$jumlah_saudara_kandung,$jumlah_saudara_tiri,$jumlah_saudara_angkat,$bahasa_sehari,$berat_badan,$tinggi_badan,$goda,$penyakit_derita,$alamat_rumah,$rt,$rw,$kelurahan,$kecamatan,$kota_kabupaten,$provinsi,$kode_area,$telp_rumah,$no_hp,$kode_pos,$tempat_tinggal,$jarak_rumah_sekolah,$no_pendaftaran){

			$data = array(
				'nik'=>$nik, 'nama_lengkap'=>$nama_lengkap, 'nama_panggilan'=>$nama_panggilan, 'jekel'=>$jekel,
				'tgl_lahir'=>$tgl_lahir, 'tempat_lahir'=>$tempat_lahir, 'agama'=>$agama,
				'kewarganegaraan'=>$kewarganegaraan, 'anak_ke'=>$anak_ke,
				'jumlah_saudara_kandung'=>$jumlah_saudara_kandung, 'jumlah_saudara_tiri'=>$jumlah_saudara_tiri,
				'jumlah_saudara_angkat'=>$jumlah_saudara_angkat, 'bahasa_sehari'=>$bahasa_sehari,
				'berat_badan'=>$berat_badan, 'tinggi_badan'=>$tinggi_badan, 'goda'=>$goda,
				'penyakit_derita'=>$penyakit_derita, 'alamat_rumah'=>$alamat_rumah, 'rt'=>$rt, 'rw'=>$rw,
				'kelurahan'=>$kelurahan, 'kecamatan'=>$kecamatan, 'kota_kabupaten'=>$kota_kabupaten,
				'provinsi'=>$provinsi, 'kode_area'=>$kode_area, 'telp_rumah'=>$telp_rumah, 'kode_pos'=>$kode_pos,
				'tempat_tinggal'=>$tempat_tinggal, 'jarak_rumah_sekolah' => $jarak_rumah_sekolah
			);

			$where = array(
				'no_hp' => $no_hp,
				'no_pendaftaran' => $no_pendaftaran
			);

			$this->db->where($where);
			$this->db->update('ket_siswa',$data);
			$result = $this->db->affected_rows();
			return $result;
		}

		public function cek_data_ortu($no_pendaftaran){
			$this->db->select('nama_ayah');
			$this->db->from('ket_ortu');
			$where = array(
				'no_pendaftaran' => $no_pendaftaran
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function insert_data_ortu($id_ortu,$nama_ayah,$nama_ibu,$pdd_ayah,$pdd_ibu,$pekerjaan_ayah,$nama_perusahaan_ayah,$alamat_perusahaan_ayah,$email_kantor_ayah,$pekerjaan_ibu,$nama_perusahaan_ibu,$alamat_perusahaan_ibu,$email_kantor_ibu,$no_pendaftaran){

			$data = array(
				'id_ortu'=>$id_ortu, 'nama_ayah'=>$nama_ayah, 'nama_ibu'=>$nama_ibu, 'pdd_ayah'=>$pdd_ayah,
				'pdd_ibu'=>$pdd_ibu, 'pekerjaan_ayah'=>$pekerjaan_ayah,
				'nama_perusahaan_ayah'=>$nama_perusahaan_ayah, 'alamat_perusahaan_ayah'=>$alamat_perusahaan_ayah,
				'email_kantor_ayah'=>$email_kantor_ayah, 'pekerjaan_ibu'=>$pekerjaan_ibu,
				'nama_perusahaan_ibu'=>$nama_perusahaan_ibu, 'alamat_perusahaan_ibu'=>$alamat_perusahaan_ibu,
				'email_kantor_ibu'=>$email_kantor_ibu, 'no_pendaftaran'=>$no_pendaftaran
			);

			$this->db->insert('ket_ortu',$data);
			$result = $this->db->affected_rows();
			return $result;
		}

		public function cek_data_wali($no_pendaftaran){
			$this->db->select('nama_wali');
			$this->db->from('ket_wali');
			$where = array(
				'no_pendaftaran' => $no_pendaftaran
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function insert_data_wali($id_wali,$nama_wali,$pdd_wali,$hubungan_keluarga,$alamat_rumah,$rt,$rw,$kelurahan,$kecamatan,$kota_kabupaten,$provinsi,$kode_area,$telp_rumah,$no_hp,$kode_pos,$pekerjaan_wali,$nama_perusahaan,$alamat_perusahaan,$email_wali,$no_pendaftaran){
			
			$data = array(
				'id_wali'=>$id_wali, 'nama_wali'=>$nama_wali, 'pdd_wali'=>$pdd_wali,
				'hubungan_keluarga'=>$hubungan_keluarga, 'alamat_rumah'=>$alamat_rumah, 'rt'=>$rt, 'rw'=>$rw,
				'kelurahan'=>$kelurahan, 'kecamatan'=>$kecamatan, 'kota_kabupaten'=>$kota_kabupaten,
				'provinsi'=>$provinsi, 'kode_area'=>$kode_area, 'telp_rumah'=>$telp_rumah, 'no_hp'=>$no_hp,
				'kode_pos'=>$kode_pos, 'pekerjaan_wali'=>$pekerjaan_wali, 'nama_perusahaan'=>$nama_perusahaan,
				'alamat_perusahaan'=>$alamat_perusahaan, 'email_wali'=>$email_wali,
				'no_pendaftaran'=>$no_pendaftaran 
			);

			$this->db->insert('ket_wali',$data);
			$query = $this->db->affected_rows();
			return $query;
		}

		public function cek_data_asal_mula($no_pendaftaran){
			$this->db->select('asal_anak');
			$this->db->from('asal_mula');
			$where = array(
				'no_pendaftaran' => $no_pendaftaran
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function insert_data_asal($asal_anak,$nama_asal,$no_tahun_sk,$lama_belajar,$tanggal_terima,$no_pendaftaran,$no_hp,$email){
			$sql = "CALL proc_insert_ket_asal('".$asal_anak."','".$nama_asal."','".$no_tahun_sk."','".$lama_belajar."','".$tanggal_terima."','".$no_pendaftaran."','".$no_hp."','".$email."')";
			$query = $this->db->query($sql);
			$run = $this->db->affected_rows();
			return $run;
		}

		public function select_data_siswa($no_pendaftaran,$no_hp){
			$this->db->select('*');
			$this->db->from('ket_siswa');
			$where = array(
				'no_pendaftaran' => $no_pendaftaran,
				'no_hp' => $no_hp
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function select_data_ortu($no_pendaftaran){
			$this->db->select('*');
			$this->db->from('ket_ortu');
			$where = array(
				'no_pendaftaran' => $no_pendaftaran
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function select_data_wali($no_pendaftaran){
			$this->db->select('*');
			$this->db->from('ket_wali');
			$where = array('no_pendaftaran' => $no_pendaftaran
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function select_data_asal($no_pendaftaran){
			$this->db->select('*');
			$this->db->from('asal_mula');
			$where = array(
				'no_pendaftaran' => $no_pendaftaran
			);

			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function insert_bukti_bayar($nama_bayar,$bukti_bayar,$jumlah_bayar,$sisa_bayar,$no_pendaftaran,$no_hp,$email,$status,$mime){
			$this->db->query("CALL proc_pembayaran_psikotest('".$nama_bayar."','".$bukti_bayar."','".$jumlah_bayar."','".$sisa_bayar."','".$no_pendaftaran."','".$no_hp."','".$email."','".$status."','".$mime."')");
			return $this->db->affected_rows();
		}

		public function select_data_pembayaran_psikotes(){
			$this->db->select('*');
			$this->db->from('pembayaran');
			$where = array(
				'jenis' => 'Psikotes'
			);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function edit_status_konfirmasi_pembayaran($no_pendaftaran,$id_bayar){
			$query = $this->db->query("CALL proc_konfirmasi_pembayaran_psikotest('".$no_pendaftaran."','".$id_bayar."')");
			return $this->db->affected_rows();
		}
	}