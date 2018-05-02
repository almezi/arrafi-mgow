<?php
	class caraka extends CI_Controller {
		
		function __construct(){
		parent::__construct();
		session_start();
			$this->load->model('m_katu3', '', TRUE);
			$this->load->model('m_caraka','',TRUE);
			$this->load->model('m_login', '', TRUE);
			header('Cache-Control: no-store, no-cache, must-revalidate');
			header('Cache-Control: post-check=o, pre-check=0', false);
		}
		
		//menu input presensi (crk)
		// ===============================================================     OK
		function presensi_caraka(){
			$data = array (
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_online'=>$this->m_login->tampil_online(),
				'jadwal' => $this->m_caraka->get_jadwal(),
				'foto' => $this->m_katu3->getFoto()
			);
			$data['konten']="caraka/v-form_presensi_caraka.php";
			$this->load->view('template',$data);
		}
		

		function simpan_absen(){
			$data['foto'] = $this->m_katu3->getFoto();
			if($this->m_katu3->bisaAbsen($data["foto"]->row()->id_pegawai)){
				$this->m_caraka->insert_absen();
				
			}
			$this->session->set_flashdata('pesan','Data Tersimpan');
			redirect('caraka/presensi_caraka');
		}

		function simpan_kegiatan(){
			$dt = $this->input->post('value');
			$this->m_caraka->insertDetailKebersihan($dt);
		}

		function hapus_kegiatan(){
			$dt = $this->input->post('value');
			$this->m_caraka->deleteDetailKebersihan($dt);
		}

		//menu kebersihan
		function kebersihan_caraka(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_katu3->getFoto();
			$cek = $this->m_caraka->cekAbsen();
			if($cek->num_rows()>0){
				$data['listKegiatan'] = $this->m_caraka->getKegiatan();
				$data['listDK'] = $this->m_caraka->getDK()->row();
				$data['cekAB'] = $this->m_caraka->cekAbsen();
				$data['konten'] = "caraka/v-input_keg_kbrshn.php";
				$this->load->view('template',$data);
			}
			else{
				$data['listKegiatan'] = $this->m_caraka->getKegiatan1();
				$data['cekAB'] = $this->m_caraka->cekAbsen();
				$data['konten'] = "caraka/v-input_keg_kbrshn.php";
				$this->load->view('template',$data);
			}
		}
		
		//menu pengajuan bhp
		function pengajuan_bhp(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_katu3->getFoto();
			$data['brg']= $this->m_caraka->getBarang();
			$data['konten'] = "caraka/v-input_alat.php";
			$this->load->view('template',$data);
		}
		
		//menu history presensi (crk)
		function history_presensi(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_katu3->getFoto();
			$data['konten'] = "caraka/v-tampil_historyAbsenCaraka.php";
			$data['list_mhsw'] = $this->m_caraka->get_historyAbsenUser();
			$this->load->view('template',$data);
		}

		//menu penilaian (crk)
		function penilaian_caraka(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_katu3->getFoto();
			$this->load->model('m_caraka');
			$data['konten'] = "caraka/v-tampil_penilaianCaraka.php";
			$data['list'] = $this->m_caraka->getPrestasi();
			$this->load->view('template',$data);
		}

		//menu history pengajuan bhp
		function history_pengajuan_bhp(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$data['list_online'] = $this->m_login->tampil_online();
			$data['foto'] = $this->m_katu3->getFoto();
			$data['list'] = $this->m_caraka->get_rekap_pengajuan();
			$data['konten'] = "caraka/v-history_pengajuan_barang.php";
			$this->load->view('template',$data);
		}

		function form_pengajuan_barang(){
			$data['foto'] = $this->m_katu3->getFoto();
			$data['konten']="caraka/v-input_alat.php";
			$this->load->view('template',$data);
		}
	

		function simpan_pengajuan(){
			$data['list_menu'] = $this->m_login->tampil_menu();
			$idp = $this->session->userdata('username');
			$nm = $this->m_katu3->getNama($idp)->row();
			$data['foto'] = $this->m_katu3->getFoto();
			$total = count($this->input->post('namab'));
			$brg = $this->input->post('namab');
			$jml = $this->input->post('jmlb');
			$ket = $this->input->post('ketb');
			$tgl_pengajuan = $this->input->post('tgl_pengajuan');
			$this->m_caraka->insertPengajuan($tgl_pengajuan);
			$dt = $this->m_caraka->getIdpengajuan()->row(0,'array');
			for($i=0;$i<$total;$i++){
				$this->m_caraka->insertDetailPengajuan($brg[$i],$jml[$i],$ket[$i],$dt['id_pengajuan'], $tgl_pengajuan);
			}
			$data["status"] = 'tersimpan';
			$data['foto'] = $this->m_katu3->getFoto();
			$data['brg']= $this->m_caraka->getBarang();
			$data['konten'] = "caraka/v-input_alat.php";
			$this->load->view('template',$data);
		}

}?>