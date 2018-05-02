<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan DKN_Kelas ".$_GET['kelas']."_Pelajaran ".$_GET['namamapel']."_Semester ".$_GET['semester'].".xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<html>
<head>
<title>Download Laporan DKN</title>
</head>

<body>
<div >
<CENTER>
<h2 >LAPORAN HASIL BELAJAR</h2>
</CENTER>
	<table border='0'>
		<tr>
			<td>Nama Sekolah</td>
			<td>:</td>
			<td>SDN AR RAFI BANDUNG</td>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td>Jl. Sekejati III No. 20 Bandung</td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td>:</td>
			<td><?php echo $_GET['kelas']; ?></td>
		</tr>
		<tr>
			<td>Tahun Ke</td>
			<td>:</td>
			<td><?php echo $_GET['tingkat']; ?></td>
		</tr>
		<tr>
			<td>Tahun Ajaran</td>
			<td>:</td>
			<td><?php echo $_GET['thnajar']; ?></td>
		</tr>
		<tr>
			<td>Semester</td>
			<td>:</td>
			<td><?php echo $_GET['semester']; ?></td>
		</tr>
		<tr>
			<td>Mata Pelajaran</td>
			<td>:</td>
			<td><b><?php echo $_GET['namamapel']; ?></b></td>
		</tr>
	</table>
<br>
	<table border='1'>
	<tr>
		<td rowspan="2">Kompetensi Inti</td>
		<td rowspan="2">Kompetensi Dasar</td>
		<td rowspan="2">KKM</td>
		<?php foreach($siswa->result() as $row){ ?>
			<td align='center'><?php echo $row->nama; ?></td>
		<?php } ?>
	</tr>
	<tr>
		<?php foreach($siswa->result() as $row){ ?>
			<td align='center'><?php echo $row->nis; ?></td>
		<?php } ?>
	</tr>
	 <?php echo $this->load->view($isi) ?>

	</table>
</div>
</body>
</html>