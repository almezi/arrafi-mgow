<html>
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">

	<!-- Start content -->
    <div class="content">
		<div class="container">
<div class="row">
    <div >
    <div class="panel panel-default">
 <div class="row">
                <div class="col-lg-12">
<CENTER>
<h2 >LAPORAN HASIL BELAJAR SISWA</h2>
</CENTER>
<a style="float:left;" href="<?php echo base_url()?>index.php/guru/wali_rapor_siswa?semester=<?php echo $_GET['semester']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>&tingkat=<?php echo $_GET['tingkat']; ?>"> <button type="button" class="btn btn-warning">Menu Siswa</button></a>
<a style="float:right;" href="<?php echo base_url()?>index.php/guru/wali_download_rapor?semester=<?php echo $_GET['semester']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&nis=<?php echo $_GET['nis']; ?>&nama=<?php echo $_GET['nama']; ?>&nisn=<?php echo $_GET['nisn']; ?>"> <button type="button" class="btn btn-success" target="_blank"><img src="<?php echo base_url(); ?>logo/icon_180.png" style="height:30px; width:30px;"/>Download Rapor</button></a>
 </div>
                <!-- /.col-lg-12 -->
            </div>
<div class="panel-body">
    <div class="table-responsive">
	<center>
	<div class="panel-heading">
	<table border='0'>
		<tr>
		
			<td>Nama Peserta Didik </td>
			<td> : </td>
			<td> &nbsp;<?php echo $_GET['nama']; ?></td>
			<td> &nbsp; &nbsp;</td>
			<td>Kelas</td>
			<td> : </td>
			<td> &nbsp;<?php echo $_GET['kelas']; ?></td>
		</tr>
		<tr>
			<td>Nomor Induk / NISN</td>
			<td>:</td>
			<td> &nbsp;<?php echo $_GET['nis']; ?> / <?php echo $_GET['nisn']; ?></td>
			<td> &nbsp; &nbsp;</td>
			<td>Tahun Ke</td>
			<td>:</td>
			<td> &nbsp;<?php echo $_GET['tingkat']; ?></td>
		</tr>
		<tr>
			<td>Nama Sekolah</td>
			<td>:</td>
			<td> &nbsp;SD AR RAFI BANDUNG</td>
			<td> &nbsp; &nbsp;</td>
			<td>Tahun Pelajaran</td>
			<td>:</td>
			<td> &nbsp;<?php echo $_GET['thnajar']; ?></td>
		</tr>
		<tr>
			<td>Alamat Sekolah</td>
			<td>:</td>
			<td> &nbsp;Jl. Sekejati III No. 20 Bandung</td>	
			<td> &nbsp; &nbsp;</td>
			<td>Semester</td>
			<td>:</td>
			<td> &nbsp;<?php echo $_GET['semester']; ?></td>
		</tr>
	</table>
	</div>
<br>
	<table border='1' width="600px">
	<thead bgcolor="#00cc00"  style="font-weight: bold;">
	<tr align="center">
	<td>No </td>
	<td>Mata Pelajaran</td>
    <td>KKM</td>
	<td>Nilai</td>
	<td>T</td>
	<td>BT</td>
	<td>Tanggal Ketuntasan</td>
	</tr>
	</thead>
	<tbody>
	 <?php echo $this->load->view($isi) ?>
	</tbody>
	</table>
	<div class="panel-heading">
	
	<table border='0'>
		<tr>
			<td>Ket</td><td>:</td>
		</tr>
		<tr>
			<td>T </td>
			<td> = </td>
			<td> &nbsp;Tuntas</td>
		</tr>
		<tr>
			<td>BT</td>
			<td>=</td>
			<td> &nbsp;Belum Tuntas</td>
		</tr>
		<tr>
			<td>KKM</td>
			<td>=</td>
			<td> &nbsp;Kriteria Ketuntasan Minimal</td>
		</tr>
	</table>
	</div>
</center>
 </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>