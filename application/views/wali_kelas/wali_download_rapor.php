<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Rapor Siswa_Nis ".$_GET['nis']."_Nama ".$_GET['nama']."_Semester ".$_GET['semester'].".xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<html>
<head>
<title>Download Laporan PMP</title>
</head>

<body>
<div >
<CENTER>
<h2 >LAPORAN HASIL BELAJAR SISWA</h2>
</CENTER>
	<table border='0'>
		<tr>
			<td>Nama Peserta Didik</td>
			<td>:</td>
			<td><?php echo $_GET['nama']; ?></td>
			<td></td>
			<td>Kelas</td>
			<td>:</td>
			<td><?php echo $_GET['kelas']; ?></td>
		</tr>
		<tr>
			<td>Nomor Induk / NISN</td>
			<td>:</td>
			<td><?php echo $_GET['nis']; ?> / <?php echo $_GET['nisn']; ?></td>
			<td></td>
			<td>Tahun Ke</td>
			<td>:</td>
			<td><?php echo $_GET['tingkat']; ?></td>
		</tr>
		<tr>
			<td>Nama Sekolah</td>
			<td>:</td>
			<td>SD AR RAFI BANDUNG</td>
			<td></td>
			<td>Tahun Pelajaran</td>
			<td>:</td>
			<td><?php echo $_GET['thnajar']; ?></td>
		</tr>
		<tr>
			<td>Alamat Sekolah</td>
			<td>:</td>
			<td>Jl. Sekejati III No. 20 Bandung</td>	
			<td></td>
			<td>Semester</td>
			<td>:</td>
			<td><?php echo $_GET['semester']; ?></td>
		</tr>
	</table>
<br>
	<table border='1'>
	<thead bgcolor="#00cc00"  style="font-weight: bold;" >
	<tr align='center'>
	<td>No</td>
	<td>Mata Pelajaran</td>
    <td>KKM</td>
	<td>Nilai</td>
	<td>T</td>
	<td>BT</td>
	<td>Tanggal Ketuntasan</td>
	</tr>
	</thead>
	 <?php echo $this->load->view($isi) ?>
	</table>
	<table border='0'>
		<tr>
			<td>Ket</td><td>:</td>
		</tr>
		<tr>
			<td>T </td>
			<td> = </td>
			<td>Tuntas</td>
		</tr>
		<tr>
			<td>BT</td>
			<td>=</td>
			<td>Belum Tuntas</td>
		</tr>
		<tr>
			<td>KKM</td>
			<td>=</td>
			<td>Kriteria Ketuntasan Minimal</td>
		</tr>
	</table>
</div>
</body>
</html>