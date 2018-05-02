<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class pendaftar extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model('m_login','',TRUE);
			//$this->load->model('m_admin','',TRUE);
			$this->load->model('registrasi_m');
			$this->load->library('parser');
		}

		//menu data siswa
		public function data_siswa(){
			$no_pendaftaran = $this->session->userdata('no_pendaftaran');
			$result = $this->registrasi_m->cek_data_siswa($no_pendaftaran);
			
			$data = array(
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_online'=>$this->m_login->tampil_online(),
				'konten' => 'pendaftar/form_data_siswa',
				'no_pendaftaran' => $result
			);
			$this->load->view('template',$data);
		}

		public function input_ket_siswa(){
			    $nik = $this->input->post('nik');
				$nama_lengkap = $this->input->post('nama_lengkap');
				$nama_panggilan = $this->input->post('nama_panggilan');
				$jekel  = $this->input->post('jekel');
				$tgl_lahir = $this->input->post('tgl_lahir');
				$tempat_lahir = $this->input->post('tempat_lahir');
				$agama = $this->input->post('agama');
				$kewarganegaraan = $this->input->post('kewarganegaraan');
				$anak_ke = $this->input->post('anak_ke');
				$jumlah_saudara_kandung = $this->input->post('jumlah_saudara_kandung');
				$jumlah_saudara_tiri = $this->input->post('jumlah_saudara_tiri');
				$jumlah_saudara_angkat = $this->input->post('jumlah_saudara_angkat');
				$bahasa_sehari = $this->input->post('bahasa_sehari');
				$berat_badan = $this->input->post('berat_badan');
				$tinggi_badan = $this->input->post('tinggi_badan');
				$goda = $this->input->post('goda');
				$penyakit_derita = $this->input->post('penyakit_derita');
				$alamat_rumah = $this->input->post('alamat_rumah');
				$rt = $this->input->post('rt');
				$rw = $this->input->post('rw');
				$kelurahan = $this->input->post('kelurahan');
				$kecamatan = $this->input->post('kecamatan');
				$kota_kabupaten = $this->input->post('kota_kabupaten');
				$provinsi = $this->input->post('provinsi');
				$kode_area = $this->input->post('kode_area');
				$telp_rumah = $this->input->post('telp_rumah');
				$kode_pos = $this->input->post('kode_pos');
				$tempat_tinggal = $this->input->post('tempat_tinggal');
				$jarak_rumah_sekolah = $this->input->post('jarak_rumah_sekolah');
				$no_pendaftaran = $this->session->userdata('no_pendaftaran');

				$result = $this->registrasi_m->insert_data_siswa($nik,$nama_lengkap,$nama_panggilan,$jekel,$tgl_lahir,$tempat_lahir,$agama,$kewarganegaraan,$anak_ke,$jumlah_saudara_kandung,$jumlah_saudara_tiri,$jumlah_saudara_angkat,$bahasa_sehari,$berat_badan,$tinggi_badan,$goda,$penyakit_derita,$alamat_rumah,$rt,$rw,$kelurahan,$kecamatan,$kota_kabupaten,$provinsi,$kode_area,$telp_rumah,$kode_pos,$tempat_tinggal,$jarak_rumah_sekolah,$no_pendaftaran);
				
				if ($result>0) {
					$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil input data siswa</div>');
					redirect('pendaftar/data_orang_tua');
				} else {
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal input data siswa</div>');
					redirect('pendaftar/data_siswa');
				}
		}

		//menu data orang tua
		public function data_orang_tua(){
			$no_pendaftaran = $this->session->userdata('no_pendaftaran');
			$result = $this->registrasi_m->cek_data_siswa($no_pendaftaran);

			if ($result[0]->nik=="") {
				$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Isi Data Siswa Terlebih Dahulu!</div>');
				redirect('pendaftar/data_siswa');
			} else {
				$no_pendaftaran = $this->session->userdata('no_pendaftaran');
				$nama_ayah = $this->registrasi_m->cek_data_ortu($no_pendaftaran);
				$no_hp = $this->session->userdata('no_hp');
				$jumlah = 0;
                $notifikasi = 0;
				$data = array(
					'page' => 'Data Orang Tua',
					'list_menu'=>$this->m_login->tampil_menu(),
					'list_online'=>$this->m_login->tampil_online(),
					'konten' => 'pendaftar/form_data_ortu',
					'toolbar' => 'Data Orang Tua',
					'nama_ayah' => $nama_ayah,
					'jumlah' => $jumlah,
					'notifikasi' => $notifikasi
				);
				
			$this->load->view('template',$data);
				//$this->parser->parse('template',$data);
			}
		}

		public function input_ket_ortu(){

			if (!isset($_POST)) {
                $no_pendaftaran = $this->session->userdata('no_pendaftaran');
				$nama_ayah = $this->registrasi_m->cek_data_ortu($no_pendaftaran);
				$data = array(
					'page' => 'Data Orang Tua',
					'list_menu'=>$this->m_login->tampil_menu(),
					'list_online'=>$this->m_login->tampil_online(),
					'konten' => 'pendaftar/form_data_ortu',
					'toolbar' => 'Data Orang Tua',
					'nama_ayah' => $nama_ayah,
				);
				$this->load->view('template',$data);
            } else {
            	$nama_ayah = $this->input->post('nama_ayah');
            	$pdd_ayah = $this->input->post('pdd_ayah');
            	$pekerjaan_ayah =$this->input->post('pekerjaan_ayah');
            	$nama_perusahaan_ayah = $this->input->post('nama_perusahaan_ayah');
            	$alamat_perusahaan_ayah = $this->input->post('alamat_perusahaan_ayah');
            	$email_kantor_ayah = $this->input->post('email_kantor_ayah');
            	$nama_ibu = $this->input->post('nama_ibu');
            	$pdd_ibu = $this->input->post('pdd_ibu');
            	$pekerjaan_ibu =$this->input->post('pekerjaan_ibu');
            	$nama_perusahaan_ibu = $this->input->post('nama_perusahaan_ibu');
            	$alamat_perusahaan_ibu = $this->input->post('alamat_perusahaan_ibu');
            	$email_kantor_ibu = $this->input->post('email_kantor_ibu');
            	$no_pendaftaran = $this->session->userdata('no_pendaftaran');
            	$id_ortu = $this->session->userdata('no_identitas');
            	$no_hp = $this->session->userdata('no_hp');

            	$result = $this->registrasi_m->insert_data_ortu($id_ortu,$nama_ayah,$nama_ibu,$pdd_ayah,$pdd_ibu,$pekerjaan_ayah,$nama_perusahaan_ayah,$alamat_perusahaan_ayah,$email_kantor_ayah,$pekerjaan_ibu,$nama_perusahaan_ibu,$alamat_perusahaan_ibu,$email_kantor_ibu,$no_pendaftaran);


            	if ($result>0) {
            		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil input data orang tua</div>');
            		redirect('pendaftar/data_wali');
            	} else {
            		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal input data orang tua</div>');
            		redirect('pendaftar/data_orang_tua');
            	}
            }
		}

		//menu data wali
		public function data_wali(){
			$no_pendaftaran = $this->session->userdata('no_pendaftaran');
			$result = $this->registrasi_m->cek_data_siswa($no_pendaftaran);

			if ($result[0]->nik=="") {
				$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Isi Data Siswa Terlebih Dahulu!</div>');
				redirect('pendaftar/data_siswa');
			} else {
				$data_wali = $this->registrasi_m->cek_data_wali($no_pendaftaran);
				$no_hp = $this->session->userdata('no_hp');
				$jumlah = 0;
                $notifikasi = 0;
				$data = array(
					'page' => 'Data Wali',
					'list_menu'=>$this->m_login->tampil_menu(),
					'list_online'=>$this->m_login->tampil_online(),
					'konten' => 'pendaftar/form_data_wali',
					'toolbar' => 'Data Wali',
					'data_wali' => $data_wali,
					'jumlah' => $jumlah,
					'notifikasi' => $notifikasi
				);
				
				$this->load->view('template',$data);
			}
		}

		public function input_ket_wali(){

            	$id_wali = $this->input->post('id_wali');
            	$nama_wali = $this->input->post('nama_wali');
            	$hubungan_keluarga = $this->input->post('hubungan_keluarga');
            	$pekerjaan_wali = $this->input->post('pekerjaan_wali');
            	$nama_perusahaan = $this->input->post('nama_perusahaan_wali');
            	$alamat_perusahaan = $this->input->post('alamat_perusahaan_wali');
            	$email_wali = $this->input->post('email_kantor_wali');
            	$pdd_wali = $this->input->post('pdd_wali');
            	$alamat_rumah = $this->input->post('alamat');
            	$provinsi = $this->input->post('provinsi');
            	$rt = $this->input->post('rt');
            	$rw = $this->input->post('rw');
            	$kelurahan = $this->input->post('kelurahan');
            	$kecamatan = $this->input->post('kecamatan');
            	$kota_kabupaten = $this->input->post('kota');
            	$kode_area = $this->input->post('kode_area');
            	$telp_rumah = $this->input->post('telp_rumah');
            	$no_hp = $this->input->post('no_hp');
            	$kode_pos = $this->input->post('kode_pos');
            	$no_pendaftaran = $this->session->userdata('no_pendaftaran');

            	$result = $this->registrasi_m->insert_data_wali($id_wali,$nama_wali,$pdd_wali,$hubungan_keluarga,$alamat_rumah,$rt,$rw,$kelurahan,$kecamatan,$kota_kabupaten,$provinsi,$kode_area,$telp_rumah,$no_hp,$kode_pos,$pekerjaan_wali,$nama_perusahaan,$alamat_perusahaan,$email_wali,$no_pendaftaran);

            	if ($result>0) {
            		$this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil input data wali</div>');
            		redirect('pendaftar/data_asal');
            	} else {
            		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal input data wali</div>');
            		redirect('pendaftar/data_wali');
            	}
            
		}

		//menu data asal
		public function data_asal(){
			$no_pendaftaran = $this->session->userdata('no_pendaftaran');
			$result = $this->registrasi_m->cek_data_ortu($no_pendaftaran);
			$data_asal = $this->registrasi_m->cek_data_asal_mula($no_pendaftaran);

			if ($result[0]->nama_ayah!="") {
				$no_pendaftaran = $this->registrasi_m->cek_data_asal_mula($no_pendaftaran);
				$no_hp = $this->session->userdata('no_hp');
				$jumlah = 0;
                $notifikasi = 0;
				$data = array(
					'page' => 'Asal Mula',
					'list_menu'=>$this->m_login->tampil_menu(),
					'list_online'=>$this->m_login->tampil_online(),
					'konten' => 'pendaftar/form_data_asal',
					'toolbar' => 'Data Asal Mula',
					'no_pendaftaran' => $no_pendaftaran,
					'jumlah' => $jumlah,
					'notifikasi' => $notifikasi,
					'data_asal' => $data_asal
				);
				$this->load->view('template',$data);
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Isi Data Orang Tua Terlebih Dahulu!</div>');
				redirect('pendaftar/data_orang_tua');
			}
		}

		public function input_ket_asal(){
            	$asal_anak = $this->input->post('asal_anak');
            	$nama_asal = $this->input->post('nama_asal');
            	$no_tahun_sk = $this->input->post('no_tahun_sk');
            	$lama_belajar = $this->input->post('lama_belajar');
            	$tanggal_terima = $this->input->post('tanggal_terima');
            	$no_pendaftaran = $this->session->userdata('no_pendaftaran');
            	$no_hp = $this->session->userdata('no_hp');
            	$email = $this->session->userdata('email');

            	$result = $this->registrasi_m->insert_data_asal($asal_anak,$nama_asal,$no_tahun_sk,$lama_belajar,$tanggal_terima,$no_pendaftaran,$no_hp,$email);

            	if ($result>=0) {
            		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Terima Kasih telah mengisi formulir! Silakan melakukan pembayaran Psikotes untuk mendapat kartu seleksi.</div>');
            		redirect('pendaftar/data_asal');
            	} else {
            		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Harap periksa data Anda!</div>');
            		redirect('pendaftar/data_asal');
            	}
		}

		//menu biodata pendaftar
		public function biodata_pendaftar(){
			$no_hp = $this->session->userdata('no_hp');
			$no_pendaftaran = $this->session->userdata('no_pendaftaran');
			
			$data_siswa = $this->registrasi_m->select_data_siswa($no_pendaftaran,$no_hp);
			$data_ortu = $this->registrasi_m->select_data_ortu($no_pendaftaran);
			$data_wali = $this->registrasi_m->select_data_wali($no_pendaftaran);
			$data_asal = $this->registrasi_m->select_data_asal($no_pendaftaran);
			$data = array(
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_online'=>$this->m_login->tampil_online(),
				'konten' =>'pendaftar/view_data',
				'data_siswa' => $data_siswa,
				'data_ortu' => $data_ortu,
				'data_wali'=> $data_wali,
				'data_asal' => $data_asal
			);

			$this->load->view('template',$data);
		}

		//menu administrasi psikotes
		public function administrasi_psikotes(){
			$email = $this->session->userdata('email');
			$privilege = $this->session->userdata('privilege');
			$notifikasi = 0;
			$jumlah = 0;

			$data = array(
				'list_menu'=>$this->m_login->tampil_menu(),
				'list_online'=>$this->m_login->tampil_online(),
				'konten' => 'pendaftar/upload_psikotest',
				'jumlah' => $jumlah,
				'notifikasi' => $notifikasi
			);

			$this->load->view('template',$data);
		}

		public function unggah_bukti_bayar(){
			$nama_bayar = $_FILES['bukti_bayar']['name'];
			$file = getimagesize($_FILES['bukti_bayar']['tmp_name']);
			$bukti_bayar = site_url().'bukti_pembayaran/'.$_FILES['bukti_bayar']['name'];
			$mime = $file['mime'];
			$jumlah_bayar = $this->input->post('jumlah_bayar');
			$sisa_bayar = 350000 - $jumlah_bayar;
			$no_pendaftaran = $this->session->userdata('no_pendaftaran');
			$no_hp = $this->session->userdata('no_hp');
			$email = $this->session->userdata('email');
			$status = "";
			$tanggal_bayar = $this->input->post('tanggal_bayar');
			
			if ($sisa_bayar==0) {
				$status = "Lunas";
				$status_konfirmasi = "Sudah";
			} else if($sisa_bayar>0 && $sisa_bayar<350000){
				$status = "Kredit";
			}
			$config = array(
				'upload_path' => realpath(FCPATH . 'bukti_pembayaran'),
				'allowed_types' => "gif|jpg|png|jpeg|pdf",
				'overwrite' => TRUE,
			);

			$this->upload->initialize($config);
			
			if (!$this->upload->do_upload('bukti_bayar')){
				$data = array('error' => $this->upload->display_errors());
			}else{
				$data = array('upload_data' => $this->upload->data());
			}
			
			$data = array(
				'nama_bayar' => $nama_bayar,
				'bukti_bayar' => $bukti_bayar,
				'tanggal_bayar' => $tanggal_bayar,
				'total_bayar' => 350000,
				'jumlah_bayar' => $jumlah_bayar,
				'sisa_bayar' => $sisa_bayar,
				'status' => $status,
				'jenis' => 'Psikotes',
				'status_konfirmasi' => $status_konfirmasi,
				'no_pendaftaran' => $no_pendaftaran,		
				'mime' => $mime,
				'email' => $email
				
			);
			
			$result = $this->registrasi_m->insert_bukti_bayar($data);
			
			
			if ($result>0) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Bukti bayar berhasil diupload.</div>');
				redirect('pendaftar/administrasi_psikotes');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Bukti bayar gagal diupload.</div>');
				redirect('pendaftar/administrasi_psikotes');
			}
		}

		
	}