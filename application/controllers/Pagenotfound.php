<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Pagenotfound extends CI_Controller{
		
		function __construct(){
			parent::__construct();

		}

		public function index(){
			$notifikasi = array(
				'jenis' => 'Error',
				'nama_notifikasi' => 'Tidak ada pemberitahuan pada halaman error'
			);
			
			$data = array(
				'jumlah' => 0,
				'content' => 'dashboard/404',
				'notifikasi' => $notifikasi
			);

			$this->parser->parse('dashboard/index',$data);
		}
	}