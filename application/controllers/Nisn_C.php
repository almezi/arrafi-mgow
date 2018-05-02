<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Nisn_C extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model('Nisn_M');
			$this->load->library('Pdf');
		}

		public function lihat_data_nisn(){
			$username = $this->session->userdata('username');
			$no_hp = $this->Nisn_M->select_no_hp($username);

			foreach ($no_hp as $key => $value) {
				$no_telp = $value->no_hp;
			}
			if ($this->session->userdata('privilege')=='Operator') {
				$result = $this->Nisn_M->select_data_nisn();
			} else if ($this->session->userdata('privilege')=='Orang Tua'){
				$result = $this->Nisn_M->select_data_nisn_individu($no_telp);
			}

			foreach ($result as $key => $value) {
				if ($value->nama_lengkap!='' && $value->jekel!='' && $value->nik!='' && $value->tempat_lahir!='' && $value->tgl_lahir!='' && $value->agama!='' && $value->alamat_rumah!='' && $value->rt!='' && $value->rw!='' && $value->kelurahan!='' && $value->kecamatan!='' && $value->kode_pos!='' && $value->tempat_tinggal!='' && $value->no_hp!='' && $value->kode_area!='' && $value->telp_rumah!='' && $value->kewarganegaraan!='') {
					$hasildp = TRUE;
				} else {
					$hasildp = false;
				}

				if ($value->nama_ayah!='' && $value->pdd_ayah!='' && $value->pekerjaan_ayah!='') {
					$hasilayah = TRUE;
				} else {
					$hasilayah = false;
				}

				if ($value->nama_ibu!='' && $value->pdd_ibu!='' && $value->pekerjaan_ibu!='') {
					$hasilibu = TRUE;
				} else {
					$hasilibu = false;
				}

				if ($value->tinggi_badan!='' && $value->jarak_rumah_sekolah!='' && $value->jumlah_saudara_kandung!='') {
					$hasilpriodik = TRUE;
				} else {
					$hasilpriodik = false;
				}

				if ($value->jenis_pendaftaran!='' && $value->tgl_masuk_sekolah!='' && $value->nis!='' && $value->paud!='' && $value->no_skhun!='' && $value->hobi!='' && $value->cita_cita!='') {
					$hasilpd = TRUE;
				} else {
					$hasilpd = false;
				}

				if ($value->jenis_prestasi!='' && $value->tingkat_prestasi!='' && $value->nama_prestasi!='' && $value->tahun_prestasi!='' && $value->penyelenggara!='') {
					$hasilprestasi = TRUE;
				} else {
					$hasilprestasi = false;
				}

				if ($value->jenis_beasiswa!='' && $value->keterangan!='' && $value->tahun_mulai_beasiswa!='' && $value->tahun_selesai_beasiswa!='') {
					$hasilbeasiswa = TRUE;
				} else {
					$hasilbeasiswa = false;
				}
			}

			$data = array(
				'page' => 'NISN',
				'content' => 'dashboard/operator/nisn',
				'toolbar' => 'Data NISN',
				'data_nisn' => $result,
				'dp' => $hasildp,
				'ayah' => $hasilayah,
				'ibu' => $hasilibu,
				'priodik' => $hasilpriodik,
				'pd' => $hasilpd,
				'prestasi' => $hasilprestasi,
				'beasiswa' => $hasilbeasiswa
			);

			$this->parser->parse('dashboard/index',$data);
		}

		public function pprint(){
			$no_pendaftaran = $this->uri->segment(3);
			// create new PDF document
			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
			
			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('Hani Fildzah Ghassani');
			$pdf->SetTitle('Formulir NISN');
			$pdf->SetSubject('Formulir NISN');
			$pdf->SetKeywords('Formulir, NISN');

			// set header and footer fonts
			$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

			// set default monospaced font
			$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

			// set margins
			$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
			$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
			$pdf->setPrintHeader(false);

			// set auto page breaks
			$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

			// set image scale factor
			$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

			// set some language-dependent strings (optional)
			if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
				require_once(dirname(__FILE__).'/lang/eng.php');
				$pdf->setLanguageArray($l);
			}

			// ---------------------------------------------------------

			// set font
			$pdf->SetFont('helvetica', 6);

			// add a page
			$pdf->AddPage();
			// -----------------------------------------------------------------------------

			$data = date('d-m-Y');

			$result = $this->Nisn_M->select_data_nisn_individu($no_pendaftaran);

			foreach ($result as $key => $value) {
				$tbl = '<h3 align="center">FORMULIR PESERTA DIDIK</h3>
				Tanggal: '.$data.'<hr>
				<table>
					<tr>
						<td colspan="3" bgcolor="black" ><font color="white">Registrasi Peserta Didik</font></td>
					</tr>
					<tr>
						<td>Jenis Pendaftaran</td>
						<td>:</td>
						<td>'.$value->jenis_pendaftaran.'</td>
					</tr>
					<tr>
						<td>Tanggal Masuk Sekolah</td>
						<td>:</td>
						<td>'.date("d-m-Y",strtotime($value->tgl_masuk_sekolah)).'</td>
					</tr>
					<tr>
						<td>NIS</td>
						<td>:</td>
						<td>'.$value->nis.'</td>
					</tr>
					<tr>
						<td>Nomor Peserta Ujian</td>
						<td>:</td>
						<td>'.$value->no_pendaftaran.'</td>
					</tr>
					<tr>
						<td>Apakah Pernah PAUD</td>
						<td>:</td>
						<td>'.$value->paud.'</td>
					</tr>
					<tr>
						<td>No. Seri SKHUN Sebelumnya</td>
						<td>:</td>
						<td>'.$value->no_skhun.'</td>
					</tr>
					<tr>
						<td>Hobi</td>
						<td>:</td>
						<td>'.$value->hobi.'</td>
					</tr>
					<tr>
						<td>Cita - Cita</td>
						<td>:</td>
						<td>'.$value->cita_cita.'</td>
					</tr>
					
					<tr>
						<td colspan="3" bgcolor="black" ><font color="white">Data Pribadi</font></td>
					</tr>
					<tr>
						<td>Nama Lengkap</td>
						<td>:</td>
						<td>'.$value->nama_lengkap.'</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td>'.$value->jekel.'</td>
					</tr>
					<tr>
						<td>NISN</td>
						<td>:</td>
						<td>'.$value->nisn.'</td>
					</tr>
					<tr>
						<td>NIK</td>
						<td>:</td>
						<td>'.$value->nik.'</td>
					</tr>
					<tr>
						<td>Tempat Lahir</td>
						<td>:</td>
						<td>'.$value->tempat_lahir.'</td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td>:</td>
						<td>'.$value->tgl_lahir.'</td>
					</tr>
					<tr>
						<td>Agama</td>
						<td>:</td>
						<td>'.$value->agama.'</td>
					</tr>
					<tr>
						<td>Berkebutuhan Khusus</td>
						<td>:</td>
						<td>'.$value->berkebutuhan_khusus.'</td>
					</tr>
					<tr>
						<td>Alamat Jalan</td>
						<td>:</td>
						<td>'.$value->alamat_rumah.'</td>
					</tr>
					<tr>
						<td>RT</td>
						<td>:</td>
						<td>'.$value->rt.'</td>
					</tr>
					<tr>
						<td>RW</td>
						<td>:</td>
						<td>'.$value->rw.'</td>
					</tr>
					<tr>
						<td>Nama Dusun</td>
						<td>:</td>
						<td>'.$value->nama_dusun.'</td>
					</tr>
					<tr>
						<td>Nama Kelurahan / Desa</td>
						<td>:</td>
						<td>'.$value->kelurahan.'</td>
					</tr>
					<tr>
						<td>Kecamatan</td>
						<td>:</td>
						<td>'.$value->kecamatan.'</td>
					</tr>
					<tr>
						<td>Kode Pos</td>
						<td>:</td>
						<td>'.$value->kode_pos.'</td>
					</tr>
					<tr>
						<td>Tempat Tinggal</td>
						<td>:</td>
						<td>'.$value->tempat_tinggal.'</td>
					</tr>
					<tr>
						<td>Moda Transportasi</td>
						<td>:</td>
						<td>'.$value->moda_transportasi.'</td>
					</tr>
					<tr>
						<td>Nomor HP</td>
						<td>:</td>
						<td>'.$value->no_hp.'</td>
					</tr>
					<tr>
						<td>Nomor Telepon</td>
						<td>:</td>
						<td>'.$value->telp_rumah.'</td>
					</tr>
					<tr>
						<td>Penerima KPS/PKH/KIP</td>
						<td>:</td>
						<td>'.$value->kps_pkh_kip.'</td>
					</tr>
					<tr>
						<td>No. KPS/PKH/KIP</td>
						<td>:</td>
						<td>'.$value->no_kps_pkh_kip.'</td>
					</tr>
					<tr>
						<td>Kewarganegaran</td>
						<td>:</td>
						<td>'.$value->kewarganegaraan.'</td>
					</tr>
					
					<tr>
						<td colspan="3" bgcolor="black" ><font color="white">Data Ayah Kandung</font></td>
					</tr>
					<tr>
						<td>Nama Ayah Kandung</td>
						<td>:</td>
						<td>'.$value->nama_ayah.'</td>
					</tr>
					<tr>
						<td>Tahun Lahir</td>
						<td>:</td>
						<td>'.$value->tahun_lahir_ayah.'</td>
					</tr>
					<tr>
						<td>Pendidikan</td>
						<td>:</td>
						<td>'.$value->pdd_ayah.'</td>
					</tr>
					<tr>
						<td>Pekerjaan</td>
						<td>:</td>
						<td>'.$value->pekerjaan_ayah.'</td>
					</tr>
					<tr>
						<td>Penghasilan Bulanan</td>
						<td>:</td>
						<td>'.$value->penghasilan_bulanan_ayah.'</td>
					</tr>
					<tr>
						<td>Berkebutuhan Khusu</td>
						<td>:</td>
						<td>'.$value->berkebutuhan_khusus_ayah.'</td>
					</tr>
					<tr>
						<td colspan="3" bgcolor="black" ><font color="white">Data Ibu Kandung</font></td>
					</tr>
					<tr>
						<td>Nama Ibu Kandung</td>
						<td>:</td>
						<td>'.$value->nama_ibu.'</td>
					</tr>
					<tr>
						<td>Tahun Lahir</td>
						<td>:</td>
						<td>'.$value->tahun_lahir_ibu.'</td>
					</tr>
					<tr>
						<td>Pendidikan</td>
						<td>:</td>
						<td>'.$value->pdd_ibu.'</td>
					</tr>
					<tr>
						<td>Pekerjaan</td>
						<td>:</td>
						<td>'.$value->pekerjaan_ibu.'</td>
					</tr>
					<tr>
						<td>Penghasilan Bulanan</td>
						<td>:</td>
						<td>'.$value->penghasilan_bulanan_ibu.'</td>
					</tr>
					<tr>
						<td>Berkebutuhan Khusus</td>
						<td>:</td>
						<td>'.$value->berkebutuhan_khusus_ibu.'</td>
					</tr>
					<tr>
						<td colspan="3" bgcolor="black" ><font color="white">Data Wali</font></td>
					</tr>
					<tr>
						<td>Tahun Lahir</td>
						<td>:</td>
						<td>'.$value->tahun_lahir_wali.'</td>
					</tr>
					<tr>
						<td>Penghasilan Bulanan</td>
						<td>:</td>
						<td>'.$value->penghasilan_bulanan_wali.'</td>
					</tr>
					<tr>
						<td>Berkebutuhan Khusus</td>
						<td>:</td>
						<td>'.$value->berkebutuhan_khusus_wali.'</td>
					</tr>
				</table>

				<h3 align="center">DATA RINCIAN PESERTA DIDIK</h3>
				<table>
					<tr>
						<td colspan="3" bgcolor="black" ><font color="white">Data Priodik</font></td>
					</tr>
					<tr>
						<td>Tinggi Badan</td>
						<td>:</td>
						<td>'.$value->tinggi_badan.'</td>
					</tr>
					<tr>
						<td>Berat Badan</td>
						<td>:</td>
						<td>'.$value->berat_badan.'</td>
					</tr>
					<tr>
						<td>Jarak Tempat Tinggal Ke Sekolah</td>
						<td>:</td>
						<td>'.$value->jarak_rumah_sekolah.'</td>
					</tr>
					<tr>
						<td>Waktu Tempuh</td>
						<td>:</td>
						<td>'.$value->waktu_tempuh.'</td>
					</tr>
					<tr>
						<td>Jumlah Saudara Kandung</td>
						<td>:</td>
						<td>'.$value->jumlah_saudara_kandung.'</td>
					</tr>
					<tr>
						<td colspan="3" bgcolor="black" ><font color="white">Prestasi</font></td>
					</tr>
					<tr>
						<td>Jenis</td>
						<td>:</td>
						<td>'.$value->jenis_prestasi.'</td>
					</tr>
					<tr>
						<td>Tingkat</td>
						<td>:</td>
						<td>'.$value->tingkat_prestasi.'</td>
					</tr>
					<tr>
						<td>Nama Prestasi</td>
						<td>:</td>
						<td>'.$value->nama_prestasi.'</td>
					</tr>
					<tr>
						<td>Tahun </td>
						<td>:</td>
						<td>'.$value->tahun_prestasi.'</td>
					</tr>
					<tr>
						<td>Penyelenggara</td>
						<td>:</td>
						<td>'.$value->penyelenggara.'</td>
					</tr>
					<tr>
						<td colspan="3" bgcolor="black" ><font color="white">Beasiswa</font></td>
					</tr>
					<tr>
						<td>Jenis</td>
						<td>:</td>
						<td>'.$value->jenis_prestasi.'</td>
					</tr>
					<tr>
						<td>Keterangan</td>
						<td>:</td>
						<td>'.$value->keterangan.'</td>
					</tr>
					<tr>
						<td>Tahun Mulai</td>
						<td>:</td>
						<td>'.$value->tahun_mulai_beasiswa.'</td>
					</tr>
					<tr>
						<td>Tahun Selesai</td>
						<td>:</td>
						<td>'.$value->tahun_selesai_beasiswa.'</td>
					</tr>
					<tr>
						<td colspan="3" bgcolor="black" ><font color="white">Pendaftaran Keluar (diisi jika peserta didik sudah keluar)</font></td>
					</tr>
					<tr>
						<td>Keluar Karena</td>
						<td>:</td>
						<td>'.$value->keluar_karena.'</td>
					</tr>
					<tr>
						<td>Tanggal Keluar</td>
						<td>:</td>
						<td>'.$value->tgl_keluar_sekolah.'</td>
					</tr>
					<tr>
						<td>Alasan</td>
						<td>:</td>
						<td>'.$value->alasan.'</td>
					</tr>
				</table>';

				$pdf->writeHTML($tbl, true, false, false, false, '');
				$pdf->Output($value->no_pendaftaran.'.pdf', 'I');
			}
		}

		public function print_all(){
			// create new PDF document
			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
			
			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('Hani Fildzah Ghassani');
			$pdf->SetTitle('Formulir NISN');
			$pdf->SetSubject('Formulir NISN');
			$pdf->SetKeywords('Formulir, NISN');

			// set header and footer fonts
			$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

			// set default monospaced font
			$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

			// set margins
			$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
			$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
			$pdf->setPrintHeader(false);

			// set auto page breaks
			$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

			// set image scale factor
			$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

			// set some language-dependent strings (optional)
			if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
				require_once(dirname(__FILE__).'/lang/eng.php');
				$pdf->setLanguageArray($l);
			}

			// ---------------------------------------------------------

			// set font
			$pdf->SetFont('helvetica', 6);

			// add a page
			$pdf->AddPage();
			// -----------------------------------------------------------------------------

			$data = date('d-m-Y');

			$result = $this->Nisn_M->select_data_nisn();

			foreach ($result as $key => $value) {
				$tbl = '<h3 align="center">FORMULIR PESERTA DIDIK</h3>
				Tanggal: '.$data.'<hr>
				<table>
					<tr>
						<td colspan="3" bgcolor="black" ><font color="white">Registrasi Peserta Didik</font></td>
					</tr>
					<tr>
						<td>Jenis Pendaftaran</td>
						<td>:</td>
						<td>'.$value->jenis_pendaftaran.'</td>
					</tr>
					<tr>
						<td>Tanggal Masuk Sekolah</td>
						<td>:</td>
						<td>'.date("d-m-Y",strtotime($value->tgl_masuk_sekolah)).'</td>
					</tr>
					<tr>
						<td>NIS</td>
						<td>:</td>
						<td>'.$value->nis.'</td>
					</tr>
					<tr>
						<td>Nomor Peserta Ujian</td>
						<td>:</td>
						<td>'.$value->no_pendaftaran.'</td>
					</tr>
					<tr>
						<td>Apakah Pernah PAUD</td>
						<td>:</td>
						<td>'.$value->paud.'</td>
					</tr>
					<tr>
						<td>No. Seri SKHUN Sebelumnya</td>
						<td>:</td>
						<td>'.$value->no_skhun.'</td>
					</tr>
					<tr>
						<td>Hobi</td>
						<td>:</td>
						<td>'.$value->hobi.'</td>
					</tr>
					<tr>
						<td>Cita - Cita</td>
						<td>:</td>
						<td>'.$value->cita_cita.'</td>
					</tr>
					
					<tr>
						<td colspan="3" bgcolor="black" ><font color="white">Data Pribadi</font></td>
					</tr>
					<tr>
						<td>Nama Lengkap</td>
						<td>:</td>
						<td>'.$value->nama_lengkap.'</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td>'.$value->jekel.'</td>
					</tr>
					<tr>
						<td>NISN</td>
						<td>:</td>
						<td>'.$value->nisn.'</td>
					</tr>
					<tr>
						<td>NIK</td>
						<td>:</td>
						<td>'.$value->nik.'</td>
					</tr>
					<tr>
						<td>Tempat Lahir</td>
						<td>:</td>
						<td>'.$value->tempat_lahir.'</td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td>:</td>
						<td>'.$value->tgl_lahir.'</td>
					</tr>
					<tr>
						<td>Agama</td>
						<td>:</td>
						<td>'.$value->agama.'</td>
					</tr>
					<tr>
						<td>Berkebutuhan Khusus</td>
						<td>:</td>
						<td>'.$value->berkebutuhan_khusus.'</td>
					</tr>
					<tr>
						<td>Alamat Jalan</td>
						<td>:</td>
						<td>'.$value->alamat_rumah.'</td>
					</tr>
					<tr>
						<td>RT</td>
						<td>:</td>
						<td>'.$value->rt.'</td>
					</tr>
					<tr>
						<td>RW</td>
						<td>:</td>
						<td>'.$value->rw.'</td>
					</tr>
					<tr>
						<td>Nama Dusun</td>
						<td>:</td>
						<td>'.$value->nama_dusun.'</td>
					</tr>
					<tr>
						<td>Nama Kelurahan / Desa</td>
						<td>:</td>
						<td>'.$value->kelurahan.'</td>
					</tr>
					<tr>
						<td>Kecamatan</td>
						<td>:</td>
						<td>'.$value->kecamatan.'</td>
					</tr>
					<tr>
						<td>Kode Pos</td>
						<td>:</td>
						<td>'.$value->kode_pos.'</td>
					</tr>
					<tr>
						<td>Tempat Tinggal</td>
						<td>:</td>
						<td>'.$value->tempat_tinggal.'</td>
					</tr>
					<tr>
						<td>Moda Transportasi</td>
						<td>:</td>
						<td>'.$value->moda_transportasi.'</td>
					</tr>
					<tr>
						<td>Nomor HP</td>
						<td>:</td>
						<td>'.$value->no_hp.'</td>
					</tr>
					<tr>
						<td>Nomor Telepon</td>
						<td>:</td>
						<td>'.$value->telp_rumah.'</td>
					</tr>
					<tr>
						<td>Penerima KPS/PKH/KIP</td>
						<td>:</td>
						<td>'.$value->kps_pkh_kip.'</td>
					</tr>
					<tr>
						<td>No. KPS/PKH/KIP</td>
						<td>:</td>
						<td>'.$value->no_kps_pkh_kip.'</td>
					</tr>
					<tr>
						<td>Kewarganegaran</td>
						<td>:</td>
						<td>'.$value->kewarganegaraan.'</td>
					</tr>
					
					<tr>
						<td colspan="3" bgcolor="black" ><font color="white">Data Ayah Kandung</font></td>
					</tr>
					<tr>
						<td>Nama Ayah Kandung</td>
						<td>:</td>
						<td>'.$value->nama_ayah.'</td>
					</tr>
					<tr>
						<td>Tahun Lahir</td>
						<td>:</td>
						<td>'.$value->tahun_lahir_ayah.'</td>
					</tr>
					<tr>
						<td>Pendidikan</td>
						<td>:</td>
						<td>'.$value->pdd_ayah.'</td>
					</tr>
					<tr>
						<td>Pekerjaan</td>
						<td>:</td>
						<td>'.$value->pekerjaan_ayah.'</td>
					</tr>
					<tr>
						<td>Penghasilan Bulanan</td>
						<td>:</td>
						<td>'.$value->penghasilan_bulanan_ayah.'</td>
					</tr>
					<tr>
						<td>Berkebutuhan Khusu</td>
						<td>:</td>
						<td>'.$value->berkebutuhan_khusus_ayah.'</td>
					</tr>
					<tr>
						<td colspan="3" bgcolor="black" ><font color="white">Data Ibu Kandung</font></td>
					</tr>
					<tr>
						<td>Nama Ibu Kandung</td>
						<td>:</td>
						<td>'.$value->nama_ibu.'</td>
					</tr>
					<tr>
						<td>Tahun Lahir</td>
						<td>:</td>
						<td>'.$value->tahun_lahir_ibu.'</td>
					</tr>
					<tr>
						<td>Pendidikan</td>
						<td>:</td>
						<td>'.$value->pdd_ibu.'</td>
					</tr>
					<tr>
						<td>Pekerjaan</td>
						<td>:</td>
						<td>'.$value->pekerjaan_ibu.'</td>
					</tr>
					<tr>
						<td>Penghasilan Bulanan</td>
						<td>:</td>
						<td>'.$value->penghasilan_bulanan_ibu.'</td>
					</tr>
					<tr>
						<td>Berkebutuhan Khusus</td>
						<td>:</td>
						<td>'.$value->berkebutuhan_khusus_ibu.'</td>
					</tr>
					<tr>
						<td colspan="3" bgcolor="black" ><font color="white">Data Wali</font></td>
					</tr>
					<tr>
						<td>Tahun Lahir</td>
						<td>:</td>
						<td>'.$value->tahun_lahir_wali.'</td>
					</tr>
					<tr>
						<td>Penghasilan Bulanan</td>
						<td>:</td>
						<td>'.$value->penghasilan_bulanan_wali.'</td>
					</tr>
					<tr>
						<td>Berkebutuhan Khusus</td>
						<td>:</td>
						<td>'.$value->berkebutuhan_khusus_wali.'</td>
					</tr>
				</table>

				<h3 align="center">DATA RINCIAN PESERTA DIDIK</h3>
				<table>
					<tr>
						<td colspan="3" bgcolor="black" ><font color="white">Data Priodik</font></td>
					</tr>
					<tr>
						<td>Tinggi Badan</td>
						<td>:</td>
						<td>'.$value->tinggi_badan.'</td>
					</tr>
					<tr>
						<td>Berat Badan</td>
						<td>:</td>
						<td>'.$value->berat_badan.'</td>
					</tr>
					<tr>
						<td>Jarak Tempat Tinggal Ke Sekolah</td>
						<td>:</td>
						<td>'.$value->jarak_rumah_sekolah.'</td>
					</tr>
					<tr>
						<td>Waktu Tempuh</td>
						<td>:</td>
						<td>'.$value->waktu_tempuh.'</td>
					</tr>
					<tr>
						<td>Jumlah Saudara Kandung</td>
						<td>:</td>
						<td>'.$value->jumlah_saudara_kandung.'</td>
					</tr>
					<tr>
						<td colspan="3" bgcolor="black" ><font color="white">Prestasi</font></td>
					</tr>
					<tr>
						<td>Jenis</td>
						<td>:</td>
						<td>'.$value->jenis_prestasi.'</td>
					</tr>
					<tr>
						<td>Tingkat</td>
						<td>:</td>
						<td>'.$value->tingkat_prestasi.'</td>
					</tr>
					<tr>
						<td>Nama Prestasi</td>
						<td>:</td>
						<td>'.$value->nama_prestasi.'</td>
					</tr>
					<tr>
						<td>Tahun </td>
						<td>:</td>
						<td>'.$value->tahun_prestasi.'</td>
					</tr>
					<tr>
						<td>Penyelenggara</td>
						<td>:</td>
						<td>'.$value->penyelenggara.'</td>
					</tr>
					<tr>
						<td colspan="3" bgcolor="black" ><font color="white">Beasiswa</font></td>
					</tr>
					<tr>
						<td>Jenis</td>
						<td>:</td>
						<td>'.$value->jenis_prestasi.'</td>
					</tr>
					<tr>
						<td>Keterangan</td>
						<td>:</td>
						<td>'.$value->keterangan.'</td>
					</tr>
					<tr>
						<td>Tahun Mulai</td>
						<td>:</td>
						<td>'.$value->tahun_mulai_beasiswa.'</td>
					</tr>
					<tr>
						<td>Tahun Selesai</td>
						<td>:</td>
						<td>'.$value->tahun_selesai_beasiswa.'</td>
					</tr>
					<tr>
						<td colspan="3" bgcolor="black" ><font color="white">Pendaftaran Keluar (diisi jika peserta didik sudah keluar)</font></td>
					</tr>
					<tr>
						<td>Keluar Karena</td>
						<td>:</td>
						<td>'.$value->keluar_karena.'</td>
					</tr>
					<tr>
						<td>Tanggal Keluar</td>
						<td>:</td>
						<td>'.$value->tgl_keluar_sekolah.'</td>
					</tr>
					<tr>
						<td>Alasan</td>
						<td>:</td>
						<td>'.$value->alasan.'</td>
					</tr>
				</table>';

				$pdf->writeHTML($tbl, true, false, false, false, '');
				$pdf->Output($value->no_pendaftaran.'.pdf', 'I');
			}
		}

		public function informasikan_pengisian(){
			$no_hp = $this->uri->segment(3);

			$result = $this->Nisn_M->insert_outbox_nisn($no_hp);

			if ($result>0) {
				redirect('Nisn_C/lihat_data_nisn');
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Informasikan Pengisian </div>');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Informasikan Pengisian</div>');
				redirect('Nisn_C/lihat_data_nisn');
			}
		}

		public function lengkapi_formulir_nisn_pd(){
			$pendaftaran = $this->Nisn_M->select_no_pendaftaran($this->session->userdata('username'));

			foreach ($pendaftaran as $key => $value) {
				$no_pendaftaran = $value->no_pendaftaran;
			}

			$data = array(
				'jenis_pendaftaran' => $this->input->post('jenis_pendaftaran'),
				'paud' => $this->input->post('paud'),
				'tk' => $this->input->post('tk'),
				'no_skhun' => $this->input->post('no_skhun'),
				'hobi' => $this->input->post('hobi'),
				'cita_cita' => $this->input->post('cita_cita')
			);

			$result = $this->Nisn_M->edit_data_nisn_pd($data,$no_pendaftaran);

			if ($result>=0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil</div>');
				redirect('Nisn_C/lihat_data_nisn');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal</div>');
				redirect('Nisn_C/lihat_data_nisn');
			}
		}

		public function lengkapi_formulir_nisn_dp(){
			# code...
		}

		public function lengkapi_formulir_nisn_ot(){
			# code...
		}

		public function lengkapi_formulir_nisn_rc(){
			# code...
		}
	}