<?php defined('BASEPATH') OR exit('No direct script access allowed');
	$username = $this->session->userdata('username');
	$password = $this->session->userdata('password');
	if (empty($username) && empty($password)) {
		echo "Silakan login terlebih dahulu";
	} else {
		$privilege = $this->session->userdata('privilege');

		if ($privilege=='Pendaftar') {
			?>

            <!-- ============================================================== -->
            <!-- ====================== HASIL PENGUMUMAN ====================== -->
            <!-- ============================================================== -->

            status

			<?php
		} else {
			echo "Maaf. Anda Tidak Dapat Mengakses Halaman Ini";
		}
	}
?>