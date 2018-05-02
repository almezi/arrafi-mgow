<?php
	class c_arCaraka extends CI_Controller {
		
		function __construct(){
		parent::__construct();
		session_start();
			$this->load->model('m_katu', '', TRUE);
			$this->load->model('m_caraka','',TRUE);
			$this->load->model('m_login', '', TRUE);
			header('Cache-Control: no-store, no-cache, must-revalidate');
			header('Cache-Control: post-check=o, pre-check=0', false);
		}
		
		//menu presensi caraka
		function presensi_caraka(){
			$data = array (
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_online'=>$this->m_login->tampil_online(),
				'jadwal' => $this->m_caraka->get_jadwal(),
				'foto' => $this->m_katu->getFoto()
			);
			$data['konten']="v-form_presensi_caraka.php";
			$this->load->view('template',$data);
		}

		function simpan_Absen(){
			$data['foto'] = $this->m_katu->getFoto();
			if($this->m_katu->bisaAbsen($data["foto"]->row()->id_pegawai)){
				$this->m_caraka->insert_absen();
				
			}
			$this->session->set_flashdata('pesan','Data Tersimpan');
			redirect('c_arCaraka/form_presensi');
		}

		function simpanKegiatan(){
			$dt = $this->input->post('value');
			$this->m_caraka->insertDetailKebersihan($dt);
		}

		function hapusKegiatan(){
			$dt = $this->input->post('value');
			$this->m_caraka->deleteDetailKebersihan($dt);
		}

		//menu kebersihan caraka
		function kebersihan_caraka(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_katu->getFoto();
			$cek = $this->m_caraka->cekAbsen();
			if($cek->num_rows()>0){
				$data['listKegiatan'] = $this->m_caraka->getKegiatan();
				$data['listDK'] = $this->m_caraka->getDK()->row();
				$data['cekAB'] = $this->m_caraka->cekAbsen();
				$data['konten'] = "v-input_keg_kbrshn.php";
				$this->load->view('template',$data);
			}
			else{
				$data['listKegiatan'] = $this->m_caraka->getKegiatan1();
				$data['cekAB'] = $this->m_caraka->cekAbsen();
				$data['konten'] = "v-input_keg_kbrshn.php";
				$this->load->view('template',$data);
			}
		}
		
		//menu pengajuan bhp
		function pengajuan_bhp(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_katu->getFoto();
			$data['brg']= $this->m_caraka->getBarang();
			$data['konten'] = "v-input_alat.php";
			$this->load->view('template',$data);
		}
		
		//menu history presensi
		function history_presensi(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_katu->getFoto();
			$data['konten'] = "v-tampil_historyAbsenCaraka.php";
			$data['list_mhsw'] = $this->m_caraka->get_historyAbsenUser();
			$this->load->view('template',$data);
		}

		//menu penilaian caraka
		function penilaian_caraka(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_katu->getFoto();
			$this->load->model('m_caraka');
			$data['konten'] = "v-tampil_penilaianCaraka.php";
			$data['list'] = $this->m_caraka->getPrestasi();
			$this->load->view('template',$data);
		}

		//menu history pengajuan bhp
		function history_pengajuan_bhp(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_katu->getFoto();
			$data['konten'] = "v-history_pengajuan_barang.php";
			$data['list'] = $this->m_caraka->get_rekap_pengajuan();
			$this->load->view('template',$data);
		}

		function form_pengajuan_barang(){
			$data['foto'] = $this->m_katu->getFoto();
			$data['konten']="v-input_alat.php";
			$this->load->view('template',$data);
		}

		function simpan_pengajuan(){
			$idp = $this->session->userdata('username');
			$nm = $this->m_katu->getNama($idp)->row();
			$data['foto'] = $this->m_katu->getFoto();
			$total = count($this->input->post('namab'));
			$brg = $this->input->post('namab');
			$jml = $this->input->post('jmlb');
			$ket = $this->input->post('ketb');
			$this->m_caraka->insertPengajuan();
			for($i=0;$i<$total;$i++){
			$this->m_caraka->insertDetailPengajuan($brg[$i],$jml[$i],$ket[$i]);
			}
			$data["status"] = 'tersimpan';
			$data['foto'] = $this->m_katu->getFoto();
			$data['brg']= $this->m_caraka->getBarang();
			$data['konten'] = "v-input_alat.php";
			$this->load->view('template',$data);
		}

		function display_rekap_pengajuan(){
			$data['foto'] = $this->m_katu->getFoto();
			$data['konten']="v-rekap_pengajuan.php";
			$this->load->view('template',$data);
		}
}?>