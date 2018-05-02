<?php
class kepala_tu extends CI_Controller {

	function __construct() {
		parent::__construct();
		session_start();
		$this->load->model('m_kepala_tu', '', TRUE);
		$this->load->model('m_login', '', TRUE);
		$this->load->helper(array('url', 'form'));
		$this->load->library(array('session'),'database');
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=o, pre-check=0', false);

	}

	function form_pergantian(){
		$data = array (
			'list_menu'=>$this->m_login->tampil_menu(),
			'list_online'=>$this->m_login->tampil_online(),
			'jadwal' => $this->m_kepala_tu->get_jadwal(),
			'foto' => $this->m_kepala_tu->getFoto(),
			'pgw' => $this->m_kepala_tu->getDataPegawai()
		);
		$data['konten']="kepala_tu/v-form_pergantian_absen.php";
		$this->load->view('template',$data);
	}

	function simpan_pergantian(){
		$data['foto'] = $this->m_kepala_tu->getFoto();
		$this->m_kepala_tu->insert_pergantian();
		redirect('kepala_tu/presensi_pegawai');
	}

	function displaydata(){
		$data['foto'] = $this->m_kepala_tu->getFoto();
		$data['konten'] = "kepala_tu/v-tampil_pegawai.php";
		$data['list_mhsw'] = $this->m_kepala_tu->get_list_data();
		$this->load->view('template',$data);
	}
	function displayHistory(){
		$data['foto'] = $this->m_kepala_tu->getFoto();
		$data['konten'] = "kepala_tu/v-tampil_historylogin.php";
		$data['list_mhsw'] = $this->m_kepala_tu->get_history_login();
		$this->load->view('template',$data);
	}

	function cari_pegawai(){
		$data['foto'] = $this->m_kepala_tu->getFoto();
		$data['konten']="kepala_tu/v-tampil_pegawai.php";
		$data['list_mhsw']=$this->m_kepala_tu->get_list_data();
		$this->load->view('template',$data);
	}

	function display(){
		$data['foto'] = $this->m_kepala_tu->getFoto();
		$data['konten']="kepala_tu/v_content.php";
		$this->load->view('template',$data);
	}
	function form(){
		$data['foto'] = $this->m_kepala_tu->getFoto();
		$data['konten']="kepala_tu/v-tambah_pegawai.php";
		$this->load->view('template',$data);
	}

	function simpan(){
		$data['foto'] = $this->m_kepala_tu->getFoto();
			$nmfile = "name".time(); //nama file saya beri nama langsung dan diikuti fungsi time
			$config['upload_path'] = './foto/'; //path folder
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '2048'; //maksimum besar file 2M
			$config['max_width']  = '1288'; //lebar maksimum 1288 px
			$config['max_height']  = '768'; //tinggi maksimum 768 px
			$config['file_name'] = $nmfile; //nama yang terupload nantinya

			$this->load->library('upload', $config);

			if ($this->upload->do_upload())
			{
				$gbr = $this->upload->data();
				$this->m_kepala_tu->insert($gbr['file_name']);
				$this->session->set_flashdata('pesan','Data Tersimpan');
				redirect('kepala_tu/displaydata');
			}else{
				$error = array('error' => $this->upload->display_errors());
				//$this->load->view('materi/gagal',$error);
				echo $error;
			}
	}

	//menu jadwal katu
	function jadwal_pegawai(){
		$data = array (
			'list_menu'=>$this->m_login->tampil_menu(),
			'list_online'=>$this->m_login->tampil_online(),
			'foto' => $this->m_kepala_tu->getFoto(),
			'list_mhsw' => $this->m_kepala_tu->get_list_data_pembg_tugas(),
			'konten' => "kepala_tu/v-tampil_penugasan.php"
		);
		$this->load->view('template',$data);
	}

	function displayform_input_pembg_tugas(){
		$data = array (
			'list_menu'=>$this->m_login->tampil_menu(),
			'list_online'=>$this->m_login->tampil_online(),
			'peg' => $this->m_kepala_tu->get_pegawai(),
			'foto' => $this->m_kepala_tu->getFoto(),
			'pgw' => $this->m_kepala_tu->getDataPegawai(),
			'konten' => "kepala_tu/v-tambah_jadwal_penugasan.php"
		);
		$this->load->view('template',$data);
	}
		
	function simpan_pembg_tugas(){
		$data['foto'] = $this->m_kepala_tu->getFoto();	
		$this->load->model('m_kepala_tu');
		$this->m_kepala_tu->insert_pembagian_jadwal();
		$this->session->set_flashdata('pesan','Data Tersimpan');
		redirect('kepala_tu/jadwal_pegawai');
	}

	function edit_jadwal(){
		$data['list_menu'] = $this->m_login->tampil_menu();
		$data['list_online'] = $this->m_login->tampil_online();
		$idjadwal=$this->uri->segment(3);
		$data['foto'] = $this->m_kepala_tu->getFoto();
		$data['konten']="kepala_tu/v-form_edit_jadwal.php";
		$data['list_jadwal']=$this->m_kepala_tu->edit_jadwal($idjadwal);
		$this->load->view('template',$data);
	}

	public function simpan_edit_jadwal(){
		$data['foto'] = $this->m_kepala_tu->getFoto();
		if($this->input->post())
		$this->m_kepala_tu->simpan_edit_jadwal();
		$this->session->set_flashdata('update','Data Terupdate');
		if($this->db->affected_rows())
		$this->session->set_flashdata('msg','<script>alert("Success")</script>');
		else	
		$this->session->set_flashdata('msg','<script>alert("Failed")</script>');		
		redirect('kepala_tu/jadwal_pegawai');
	}
		
	private function do_upload(){
		$data['foto'] = $this->m_kepala_tu->getFoto();
		$type = explode('.', $_FILES["pic"]["name"]);
		$type = strtolower($type[count($type)-1]);
		$url = "./images/".uniqid(rand()).'.'.$type;
		if(in_array($type, array("jpg", "jpeg", "gif", "png")));
		if(is_uploaded_file($_FILES["pic"]["tmp_name"]))
		if(move_uploaded_file($_FILES["pic"]["tmp_name"],$url))
			return $url;
			return "";
	}

	//menu presensi katu
	function presensi_pegawai(){
		$data['list_menu'] = $this->m_login->tampil_menu();
		$data['list_online'] = $this->m_login->tampil_online();
		$data['foto'] = $this->m_kepala_tu->getFoto();
		$data['tgl_absen'] = $this->m_kepala_tu->getBulanPresensi();
		$data['tahun_kunjungan'] = $this->m_kepala_tu->getTahunPresensi();
		$data['nama'] = $this->m_kepala_tu->getFilterNamaAbsensi();
		$data['konten'] = "kepala_tu/v-tampil_semua_absen.php";
		$data['list_mhsw'] = $this->m_kepala_tu->get_presensi();
		$this->load->view('template',$data);
	}

			function filterPeriodeAbsen($a){
				$data = $this->m_kepala_tu->filterPeriodeAbsen($a);
				$no=1;
				foreach ($data->result_array() as $row) {
					echo '<tr>';   
					echo   '<td>'.  $no.'</td>';
					echo   '<td>'.  $row['id_pegawai'].'</td>';
					echo   '<td>'.  $row['nama'].'</td>';
					echo   '<td>'.  $row['bagian'].'</td>';
					echo   '<td>'.  $row['tgl_absen'].'</td>';
					echo   '<td>';
					echo   '<label class="radio-inline"><input type="checkbox" name="status" value="Membaca" disabled '. ($row['status_presensi']=="hadir" ? 'checked' : '').'/>';
					echo   'Hadir</label>';
					echo   '<label class="radio-inline"><input type="checkbox" name="status" value="Membaca" disabled '. ($row['status_presensi']=="sakit" ? 'checked' : '').'/>';
					echo   'Sakit</label>';
					echo   '<label class="radio-inline"><input type="checkbox" name="status" value="Membaca" disabled '. ($row['status_presensi']=="izin" ? 'checked' : '').'/>';
					echo   'Izin</label>';
					echo   '</td>';
					echo   '<td>'.  $row['alasan'].'</td>';
					echo   '</tr>';
					$no++;
				}
			}

			function filterNamaAbsen(){
				$a = $_GET['nama'];
				$data = $this->m_kepala_tu->filterNamaAbsen($a);
				$no=1;
				foreach ($data->result_array() as $row) {
					echo '<tr>';   
					echo   '<td>'.  $no.'</td>';
					echo   '<td>'.  $row['id_pegawai'].'</td>';
					echo   '<td>'.  $row['nama'].'</td>';
					echo   '<td>'.  $row['bagian'].'</td>';
					echo   '<td>'.  $row['tgl_absen'].'</td>';
					echo   '<td>';
					echo   '<label class="radio-inline"><input type="checkbox" name="status" value="Membaca" disabled '. ($row['status_presensi']=="hadir" ? 'checked' : '').'/>';
					echo   'Hadir</label>';
					echo   '<label class="radio-inline"><input type="checkbox" name="status" value="Membaca" disabled '. ($row['status_presensi']=="sakit" ? 'checked' : '').'/>';
					echo   'Sakit</label>';
					echo   '<label class="radio-inline"><input type="checkbox" name="status" value="Membaca" disabled '. ($row['status_presensi']=="izin" ? 'checked' : '').'/>';
					echo   'Izin</label>';
					echo   '</td>';
					echo  '<td>'.  $row['alasan'].'</td>';
					echo   '</tr>';
					$no++;
				}
			}

			function getAbsensi(){
				if($this->session->userdata("username")){ //session
					$year 		= $_GET["year"];
					$month 		= $_GET["month"];
					$id_pegawai = $_GET["id_pegawai"];

					$hadir = $this->db->query("SELECT COUNT(*) AS total FROM presensi WHERE YEAR(tgl_absen)='$year' AND MONTH(tgl_absen)='$month' AND id_pegawai='$id_pegawai' AND status_presensi = 'hadir'");
					$hadir = $hadir->row()->total;
					
					$absen = $this->db->query("SELECT COUNT(*) AS `total` FROM `presensi` WHERE YEAR(`tgl_absen`)='$year' AND MONTH(`tgl_absen`)='$month' AND `id_pegawai`='$id_pegawai' AND `status_presensi` <> 'hadir'");
					$absen = $absen->row()->total;
					
					$persen=($hadir/26)*100;
					if ($persen>=100){
						echo "100%";
					}else {
						echo round($persen,2)."%";
					}	
				}else{
					redirect("halamanlogin");
				}
			}		

			function form_ketidakhadiran(){
				$data = array (
					'list_menu'=>$this->m_login->tampil_menu(),
					'list_online'=>$this->m_login->tampil_online(),
					'jadwal' => $this->m_kepala_tu->get_jadwal(),
					'foto' => $this->m_kepala_tu->getFoto()
				);
				$data['konten']="kepala_tu/v-form_ketidakhadiran.php";
				$data['peg'] = $this->db->get('pegawai');
				$this->load->view('template',$data);
			}

			function simpan_form_ketidakhadiran(){
				$data['foto'] = $this->m_kepala_tu->getFoto();
				$this->m_kepala_tu->insert_form_ketidakhadiran();
				$this->session->set_flashdata('pesan','Data Tersimpan');
				redirect('kepala_tu/presensi_pegawai');
			}

			function display_update_profil(){
				echo $this->session->userdata('status');
				if($this->session->userdata('status')) {
				$id=$this->uri->segment(3);
				$data=array(
					'list_mhsw'=>$this->m_kepala_tu->get_by_id($id),
					'foto' => $this->m_kepala_tu->getFoto()
					);
				$data['konten'] = "kepala_tu/v-ubah_profil_katu";
				$this->load->view('template',$data);
				}
			}
			
			function edit_profil(){
				if($this->session->userdata('status')){
				$id=$this->uri->segment(3);
				$data=array(
					'edit'=>$this->m_kepala_tu->update_profil($id),
					'foto' => $this->m_kepala_tu->getFoto(),
					'list_mhsw'=>$this->m_kepala_tu->get_by_id($id)
					);
				$data['konten'] = "kepala_tu/v-ubah_profil_katu";
				$this->load->view('template',$data);
				}
			}

			//menu input nilai katu
			function nilai_pegawai(){
				$data['list_menu'] = $this->m_login->tampil_menu();
				$data['list_online'] = $this->m_login->tampil_online();
				$data['foto'] = $this->m_kepala_tu->getFoto();
				$data['konten'] = "kepala_tu/v-form_penilaian.php";
				$data['pgw'] = $this->m_kepala_tu->getDataPegawai();
				$this->load->view('template',$data);
			}

			function getNilaiPresensi($tgl,$pgw){
				if($this->session->userdata('status') == 'KaTu'){
				$p=$this->m_kepala_tu->getNilaiAbsensi($tgl,$pgw);
				$dt = json_encode($p->result());
				echo "{\"data\":".$dt."}";
				}
			}

			function simpan_penilaian(){
				$data['foto'] = $this->m_kepala_tu->getFoto();
				$this->m_kepala_tu->insert_penilaian();
				$this->session->set_flashdata('pesan','Data Tersimpan');
				redirect('kepala_tu/nilai_pegawai');
			}		

			//menu laporan kunjungan
			function laporan_kunjungan(){
				$data['list_menu'] = $this->m_login->tampil_menu();
				$data['list_online'] = $this->m_login->tampil_online();
				$data['foto'] = $this->m_kepala_tu->getFoto();
				$data['tgl_kunjungan'] = $this->m_kepala_tu->getBulan();
				$data['tahun_kunjungan'] = $this->m_kepala_tu->getTahun();
				$data['konten']="kepala_tu/v-rekap_kunjungan.php";
				$data['list_mhsw'] = $this->m_kepala_tu->get_rekap_kunjungan();
				
				$this->load->view('template',$data);
			}

			function filterKunjungan($a){
				$data = $this->m_kepala_tu->filterKunjungan($a);
				$no=1;
				foreach ($data->result_array() as $row) {
					echo '<tr>';   
					echo   '<td>'.  $no.'</td>';
					echo   '<td>'.  $row['tgl_kunjungan'].'</td>';
					echo   '<td>'.  $row['jam_kunjungan'].'</td>';
					echo   '<td>'.  $row['nama'].'</td>';
					echo   '<td>'.  $row['institusi'].'</td>';
					echo  '<td>'.  $row['agenda'].'</td>';
					echo   '</tr>';
					$no++;
				}
			}

			function pdf(){
				$this->load->library('fpdf');
				if($_GET["bln"]!=""){
					$this->data['data'] = $this->m_kepala_tu->get_rekap_kunjungan_bln($_GET["bln"])->result();
				}else{
					$this->data['data'] = $this->m_kepala_tu->get_rekap_kunjungan()->result();					
				}
				$this->load->view('kepala_tu/v-pdf-kunjungan',$this->data);
			}
			
			//menu laporan peristiwa
			function laporan_peristiwa(){
				$data['list_menu'] = $this->m_login->tampil_menu();
				$data['list_online'] = $this->m_login->tampil_online();
				$data['foto'] = $this->m_kepala_tu->getFoto();
				$data['tgl_peristiwa'] = $this->m_kepala_tu->getBulanPeristiwa();
				$data['tahun_peristiwa'] = $this->m_kepala_tu->getTahunPeristiwa();
				$data['konten']="kepala_tu/v-rekap_peristiwa.php";
				$data['list_mhsw'] = $this->m_kepala_tu->get_rekap_peristiwa();
				$this->load->view('template',$data);
			}

			function filterPeristiwa($b){
				$data = $this->m_kepala_tu->filterPeristiwa($b);
				$no=1;
				foreach ($data->result_array() as $row) {
					echo '<tr>';   
					echo   '<td>'.  $no.'</td>';
					echo   '<td>'.  $row['tgl_peristiwa'].'</td>';
					echo   '<td>'.  $row['jam_peristiwa'].'</td>';
					echo   '<td>'.  $row['kejadian'].'</td>';
					echo   '<td>'.  $row['bukti'].'</td>';
					echo  '<td>'.  $row['deskripsi'].'</td>';
					echo  '<td> 
					<a href="http://localhost/arrafi//video/'.$row['video'].'.mp4" target="_blank">
						'.$row['video'].'
					</a></td>';
					
					$no++;
				}
			}

			function pdf_peristiwa(){
				$this->load->library('fpdf');
					if($_GET["bln"]!=""){
						$this->data['data'] = $this->m_kepala_tu->get_rekap_peristiwa_bln($_GET["bln"])->result();
					}else{
						$this->data['data'] = $this->m_kepala_tu->get_rekap_peristiwa()->result();					
					}
					$this->load->view('kepala_tu/v-pdf-peristiwa',$this->data);
			}

			//menu input kebersihan
			function kebersihan(){
				$data = array (
					'list_menu'=>$this->m_login->tampil_menu(),
					'list_online'=>$this->m_login->tampil_online(),
					'peg' => $this->m_kepala_tu->get_pegawai(),
					'foto' => $this->m_kepala_tu->getFoto(),
					'konten' => "kepala_tu/v-form_nama_kebersihan.php"
				);
				$this->load->view('template',$data);
			}

			function simpan_nama_kebersihan(){
				$data['foto'] = $this->m_kepala_tu->getFoto();
				$this->m_kepala_tu->simpan_nama_kebersihan();
				$this->session->set_flashdata('pesan','Data Tersimpan');
				redirect('kepala_tu/kebersihan');
			}
		//menu laporan prestasi
		function laporan_prestasi(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_kepala_tu->getFoto();
			$data['pega'] = $this->m_kepala_tu->get_periode_penilaian();
			$data['konten'] = "kepala_tu/v-laporan_penilaian.php";
			$data['list'] = $this->m_kepala_tu->getPrestasi();
			$this->load->view('template',$data);
		}

		function filterPeriodePenilaian($b){
				$data = $this->m_kepala_tu->getdata_periode_penilaian($b);
				$no=1;
				foreach ($data->result() as $row) {
					echo '<tr>';
					echo '<td>'.$no.'</td>';
					echo '<td>'.$row->id_pegawai.'</td>';
					echo '<td>'.$row->nama.'</td>';
					echo '<td>'.$row->bagian.'</td>';
					echo '<td>'.$row->periode.'</td>';
					echo '<td>'.$row->absensi.'</td>';
					echo '<td>'.$row->kegiatan.'</td>';
					echo '<td>'.$row->keramahan.'</td>';
					echo '<td>'.$row->rata.'</td>';
					echo '</tr>';
					
					$no++;
				}
			}

		//menu rekap pengajuan
		function rekap_pengajuan(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_kepala_tu->getFoto();
			$data['konten'] = "kepala_tu/v-pengajuan_barang.php";
			$data['list'] = $this->m_kepala_tu->get_rekap_pengajuan();
			$data['list_progress'] = $this->m_kepala_tu->get_rekap_pengajuan_yang_diajukan();
			
			$this->load->view('template',$data);
		}
		
		//menu history pengajuan
		function history_pengajuan(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_kepala_tu->getFoto();
			$data['konten'] = "kepala_tu/v-history_persetujuan_pengajuan.php";
			$data['list_progress'] = $this->m_kepala_tu->get_rekap_pengajuan_yang_diajukan();
			$data['list_selesai'] = $this->m_kepala_tu->get_rekap_pengajuan_yang_selesai();
			$this->load->view('template',$data);
		}

		function getProgress($id){
			if($this->m_kepala_tu->getProgres($id)){
				echo "true";
			}else{
				echo "false";
			}
		}

		function setKetersediaan($id){
			$this->m_kepala_tu->setKetersediaan($id);
		}

		
		function upd_pengambilan($id){
			$this->m_kepala_tu->upd_pengambilan($id);
		}

		public function update_progres(){
			$data['foto'] = $this->m_kepala_tu->getFoto();
			$id = $this->uri->segment(3);
			$this->m_kepala_tu->setUpdateStatus($id);
			redirect('kepala_tu/rekap_pengajuan');
		}
		
		//menu laporan kebersihan
		function laporan_kebersihan(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_kepala_tu->getFoto();
			$data['pega'] = $this->m_kepala_tu->get_pegawai_caraka();
			$data['konten'] = "kepala_tu/v-laporan_kegiatanCar.php";
			$this->load->view('template',$data);
		}

		function displayLaporanKegiatanTable($peg){
			$dt = $this->m_kepala_tu->get_kegiatan_pegawai_caraka($peg);
			$no=1;
			foreach($dt->result() as $dt1){
				echo '<tr>';
				echo '<td>'.$no++.'</td>';
				echo '<td>'.$dt1->waktu.'</td>';
				echo '<td>'.$dt1->nk.'</td>';
				echo '<td><a class="btn btn-danger" href="#" onclick="hapus_kegiatan('.$dt1->id_kegiatan.')">Hapus</a></td>';
				echo '</tr>';
			}
		}

		function hapusKegiatan($id){
			$this->m_kepala_tu->hapusKegiatan($id);
		}

		function filterBulanPengajuan($a){
				$data = $this->m_kepala_tu->filterBulanPengajuan($a);
				$total = $this->m_kepala_tu->getTotalPengajuan($a)->row();
				$no=1;
				echo '<table class="table table-striped table-bordered table-hover" >
                                <thead>

                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Nama Barang</th>
                        <th>Merk Barang</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Jumlah Permintaan</th>
                      
                    </tr>  
                </thead> ';
					echo '<tbody>'; 
				foreach ($data->result_array() as $row) {
					
					echo '<tr>';   
					echo   '<td>'.  $no.'</td>';
					echo   '<td>'.  $row['nama'].'</td>';
					echo   '<td>'.  $row['nama_barang'].'</td>';
					echo   '<td>'.  $row['merk_barang'].'</td>';
					echo   '<td>'.  $row['tgl_pengajuan'].'</td>';
					echo  '<td>'.  $row['jumlah_permintaan'].'</td>';
					echo   '</tr>';
					
					//echo '</table>';
					$no++;
				}
				echo   '</body>';
					echo   '<tfoot>';
					echo  '<th colspan="5">Total Permintaan</th>';
                    echo  '<th>'.$total->total.'</th>';
					echo   '</tfoot>';
		}

		function filterBulanKunjungan($a){
				$data = $this->m_kepala_tu->filterBulanKunjungan($a);
				$total = $this->m_kepala_tu->getTotalKunjungan($a)->row();
				$no=1;
				echo '<table class="table table-striped table-bordered table-hover" >
                                <thead>

                    <tr>
                        <th>NO</th>
                        <th>tgl Kunjungan</th>
                        <th>Jam Kunjungan</th>
                        <th>Nama</th>
                        <th>Institusi</th>
                        <th>Agenda</th>
                      	
                    </tr>  
                </thead> ';
					echo '<tbody>'; 
				foreach ($data->result_array() as $row) {
					
					echo '<tr>';   
					echo   '<td>'.  $no.'</td>';
					echo   '<td>'.  $row['tgl_kunjungan'].'</td>';
					echo   '<td>'.  $row['jam_kunjungan'].'</td>';
					echo   '<td>'.  $row['nama'].'</td>';
					echo   '<td>'.  $row['institusi'].'</td>';
					echo  '<td>'.  $row['Agenda'].'</td>';
					echo   '</tr>';
					//echo '</table>';
					$no++;
				}
				echo   '</body>';
					echo   '<tfoot>';
					echo  '<th colspan="5">Total Permintaan</th>';
                    echo  '<th>'.$total->total.'</th>';
					echo   '</tfoot>';
		}
		
	function grafik(){
		$tahun=$this->uri->segment(3);
		$data['report'] = $this->m_kepala_tu->report();
		
		$this->load->view('kepala_tu/grafik',$data);
	}

	function grafikPeristiwa(){
		$tahun=$this->uri->segment(3);
		$data['report'] = $this->m_kepala_tu->reportPeristiwa();
		$this->load->view('kepala_tu/grafikPeristiwa',$data);
	}
}
?>