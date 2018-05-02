<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Nilai Sikap dan Karakter_Nis ".$_GET['nis']."_Nama ".$_GET['nama']."_Semester ".$_GET['semester'].".xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<html>
<head>
<title>Download Nilai Sikap dan Karakter</title>
</head>

<body>
<div >
<CENTER>
<h2 >HASIL OBSERVASI PENGEMBANGAN DIRI SISWA</h2>
<h2 >YEAR OF ACADEMIC <?php echo $_GET['thnajar']; ?></h2>
</CENTER>
	<table border='0'>
		<tr>
			<td>Nama Siswa</td>
			<td>:</td>
			<td><?php echo $_GET['nama']; ?></td>
		</tr>
		<tr>
			<td>Grade</td>
			<td>:</td>
			<td><?php echo $_GET['kelas']; ?></td>
		</tr>
		<tr>
			<td>Semester</td>
			<td>:</td>
			<td><?php echo $_GET['semester']; ?></td>
		</tr>
	</table>
<br>
	<table border='1'>
	<thead>
	<tr>
	<td>No</td>
	<td>Aspek</td>
    <td>Belum Nampak</td>
	<td>Perlu Stimulasi</td>
	<td>Perlu Pengarahan</td>
	<td>Sudah Berkembang Dengan Baik</td>
	</tr>
	</thead>
	
	<tr align="center">
	
		<td>1</td>
		<td><b> Kemandirian </b>
		<br>Sikap dan perilaku siswa yang tidak mudah tergantung pada orang lain dalam menyelesaikan tugas-tugas</td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==1 and $row->pil=='a'){
			echo "&#10004;";
		}
		}
		?></td>
		<td> 
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==1 and $row->pil=='b'){
			echo "&#10004;";
		}
		}
		?></td>
		<td> 
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==1 and $row->pil=='c'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==1 and $row->pil=='d'){
			echo "&#10004;";
		}
		}
		?></td>
		</tr>
		<tr align="center">
		<td>2</td>
		<td><b> Konsentrasi </b><br> Siswa memiliki perhatian penuh dalam kegiatan belajar mengajar</td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==2 and $row->pil=='a'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==2 and $row->pil=='b'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==2 and $row->pil=='c'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==2 and $row->pil=='d'){
			echo "&#10004;";
		}
		}
		?></td>
		</tr>
		<tr align="center">
		<td>3</td>
		<td><b> Kedisiplinan </b> <br>Tindakan siswa menunjukkan perilaku tertib dan patuh pada berbagai ketentuan dan peraturan</td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==3 and $row->pil=='a'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==3 and $row->pil=='b'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==3 and $row->pil=='c'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==3 and $row->pil=='d'){
			echo "&#10004;";
		}
		}
		?></td>
		</tr>
		<tr align="center">
		<td>4</td>
		<td><b> Tanggung Jawab </b> <br>Sikap dan perilaku siswa dalam melaksanakan tugas dan kewajibannya terhadap diri sendiri di lingkungan kelas/sekolah</td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==4 and $row->pil=='a'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==4 and $row->pil=='b'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==4 and $row->pil=='c'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==4 and $row->pil=='d'){
			echo "&#10004;";
		}
		}
		?></td>
		</tr>
		<tr align="center">
		<td>5</td>
		<td><b> Motivasi </b><br>Siswa memiliki semangat dalam belajar, jarang mengeluh, dan tidak mudah putus asa</td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==5 and $row->pil=='a'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==5 and $row->pil=='b'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==5 and $row->pil=='c'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==5 and $row->pil=='d'){
			echo "&#10004;";
		}
		}
		?></td>
		</tr>
		<tr align="center">
		<td>6</td>
		<td><b> Kreativitas </b><br>Siswa berpikir dan melakukan sesuatu untuk menghasilkan cara atau hasil baru dari apa yang telah dimiliki dalam proses pembelajaran</td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==6 and $row->pil=='a'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==6 and $row->pil=='b'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==6 and $row->pil=='c'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==6 and $row->pil=='d'){
			echo "&#10004;";
		}
		}
		?></td>
		</tr>
		<tr align="center">
		<td>7</td>
		<td><b> Kerapihan </b> <br> Keterampilan siswa dalam mengelola/menata tugas, atribut, maupun property nya dengan tertib</td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==7 and $row->pil=='a'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==7 and $row->pil=='b'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==7 and $row->pil=='c'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==7 and $row->pil=='d'){
			echo "&#10004;";
		}
		}
		?></td>
		</tr>
		<tr align="center">
		<td>8</td>
		<td><b> Sikap </b> <br>Kecenderungan siswa untuk merespon secara positif atau negatif terhadap ide tertentu, objek, orang, atau situasi dalam proses pembelajaran</td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==8 and $row->pil=='a'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==8 and $row->pil=='b'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==8 and $row->pil=='c'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==8 and $row->pil=='d'){
			echo "&#10004;";
		}
		}
		?></td>
		</tr>
		<tr align="center">
		<td>9</td>
		<td><b> Keaktifan </b> <br>Sikap siswa menunjukkan antusias dan perhatian lebih dalam belajar dan merespon tugas-tugas yang diberikan guru dengan baik</td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==9 and $row->pil=='a'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==9 and $row->pil=='b'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==9 and $row->pil=='c'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==9 and $row->pil=='d'){
			echo "&#10004;";
		}
		}
		?></td>
		</tr>
		<tr align="center">
		<td>10</td>
		<td><b> Persepsi </b> <br>Respon siswa terhadap rasangan dari luar melalui panca indera dari lingkungan sekitar</td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==10 and $row->pil=='a'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==10 and $row->pil=='b'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==10 and $row->pil=='c'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==10 and $row->pil=='d'){
			echo "&#10004;";
		}
		}
		?></td>
		</tr>
		<tr align="center">
		<td>11</td>
		<td><b> Penyesuaian Diri </b> <br>Siswa mudah menyesuaikan diri pada lingkungan sekitar</td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==11 and $row->pil=='a'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==11 and $row->pil=='b'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==11 and $row->pil=='c'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==11 and $row->pil=='d'){
			echo "&#10004;";
		}
		}
		?></td>
		</tr>
		<tr align="center">
		<td>12</td>
		<td><b> Emosi </b> <br>Kemampuan siswa dalam mengendalikan emosi dengan baik</td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==12 and $row->pil=='a'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==12 and $row->pil=='b'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==12 and $row->pil=='c'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==12 and $row->pil=='d'){
			echo "&#10004;";
		}
		}
		?></td>
		</tr>
		<tr align="center">
		<td>13</td>
		<td><b> Motorik </b> <br>Kemampuan siswa yang berhubungan dengan keterampilan fisik yang melibatkan otot besar/kecil serta koordinasi mata dan tangan</td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==13 and $row->pil=='a'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==13 and $row->pil=='b'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==13 and $row->pil=='c'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==13 and $row->pil=='d'){
			echo "&#10004;";
		}
		}
		?></td>
		</tr>
		<tr align="center">
		<td>14</td>
		<td><b> Memori </b><br>Kemampuan siswa dalam mengingat apa yang telah dipelajari atau dialaminya</td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==14 and $row->pil=='a'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==14 and $row->pil=='b'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==14 and $row->pil=='c'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==14 and $row->pil=='d'){
			echo "&#10004;";
		}
		}
		?></td>
		</tr>
		<tr align="center">
		<td>15</td>
		<td><b> Sportivitas </b><br>Siswa telah dapat mengambil kerugian atau kekalahan tanpa keluhan, atau kemenangan tanpa sombong, dan yang memperlakukan/nya lawan dengan keadilan, sopan, dan hormat</td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==15 and $row->pil=='a'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==15 and $row->pil=='b'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==15 and $row->pil=='c'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==15 and $row->pil=='d'){
			echo "&#10004;";
		}
		}
		?></td>
		</tr>
		<tr align="center">
		<td>16</td>
		<td><b> Kerja Sama </b><br>Sikap siswa telah menunjukkan kemampuan bekerja sama dengan teman atau pihak lain untuk tujuan yang sama</td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==16 and $row->pil=='a'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==16 and $row->pil=='b'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==16 and $row->pil=='c'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==16 and $row->pil=='d'){
			echo "&#10004;";
		}
		}
		?></td>
		</tr>
		<tr align="center">
		<td>17</td>
		<td><b> Kepedulian </b><br>Sikap dan tindakan siswa yang selalu berupaya mencegah kerusakan pada lingkungan alam maupun sosial, dan mengembangkan upaya-upaya untuk memperbaiki kerusakan alam/sosial yang sudah terjadi</td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==17 and $row->pil=='a'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==17 and $row->pil=='b'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==17 and $row->pil=='c'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==17 and $row->pil=='d'){
			echo "&#10004;";
		}
		}
		?></td>
		</tr>
		<tr align="center">
		<td>18</td>
		<td><b> Percaya Diri </b><br>Sikap dan tindakan siswa yang didasari keyakinan diri, tidak gerogi dan mau tampil depan umum</td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==18 and $row->pil=='a'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==18 and $row->pil=='b'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==18 and $row->pil=='c'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==18 and $row->pil=='d'){
			echo "&#10004;";
		}
		}
		?></td>
		</tr>
		<tr align="center">
		<td>19</td>
		<td><b> Kesopanan dan Bahasa </b><br>Sikap dan tutur kata siswa telah sesuai dengan norma kesopanan</td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==19 and $row->pil=='a'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==19 and $row->pil=='b'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==19 and $row->pil=='c'){
			echo "&#10004;";
		}
		}
		?></td>
		<td>
		<?php
		foreach($cek->result() as $row){ 
		if ($row->nomer==19 and $row->pil=='d'){
			echo "&#10004;";
		}
		}
		?></td>
	</tr>
	</table>
</div>
</body>
</html>