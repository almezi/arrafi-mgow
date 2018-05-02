<!-- File Guru_view.php -->
<html>
	<head>
		<title>CRUD dengan CodeIgniter</title>
	</head>
	<body>
		<?php
			$jumlahProduk = $listGuru->num_rows(); //$listGuru berasal dari data yang dilempar dari controller, yaitu $data['listGuru']. num_rows() digunakan untuk menghitung jumlah baris yang dimiliki ketika kita melakukan select dari database

			if($jumlahProduk == 0){
		?>
			<!-- Kalau datanya masih kosong, kita harus melakukan add Guru -->
			<a href="<?php echo base_url(); ?>index.php/Guru/addGuru">Tambah Guru</a>
		<?php
			}
			else {
		?>
			<!-- Kalau ada datanya, maka kita akan tampilkan dalam table -->
			<h1>Guru List</h1>
			<table border="1">
				<thead>
					<tr>
						<th>No. </th>
						<th>NIK</th>
						<th>NAMA</th>
						<th>Jenis_Kelamin</th>
						<th>Alamat</th>
						<th>No_Telepon</th>
						<th>Email</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
						//Kita akan melakukan looping sesuai dengan data yang dimiliki
						$i = 1; //nantinya akan digunakan untuk pengisian Nomor
						foreach ($listGuru->result() as $row) {
					?>
					<tr>
						<td><?= $i ?></td>
						<td><?= $row->NIK ?></td> <!-- karena berbentuk objek, maka kita menggunakan panah (->) untuk menunjuk field yang ada di database -->
						<td><?= $row->nama ?></td>
						<td><?= $row->jenis_kelamin ?></td>
						<td><?= $row->alamat ?></td>
						<td><?= $row->no_telepon ?></td>
						<td><?= $row->email ?></td>
						<td><?= $row->status ?></td>
						<td>
							<!-- Akan melakukan update atau delete sesuai dengan id yang diberikan ke controller -->
							<a href="<?= base_url() ?>Guru/updateGuru/<?= $row->NIK ?>">Update</a>
							|
							<a href="<?= base_url() ?>Guru/deleteGuruDb/<?= $row->NIK ?>">Delete</a>
						</td>
					</tr>
					<?php
					$i++;	}
					?>
				</tbody>
			</table>
		<?php
			}
		?>
	</body>
</html>