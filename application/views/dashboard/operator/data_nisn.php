<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<style>
		    h3 {
		        text-align: center;
		    }

		    table.kiri{
		    	float: left;
		    }

		    table.kanan{
		    	float: right;
		    	border-color: black;
		    }
		</style>
	</head>
<body>
<h3 class="title">FORMULIR PESERTA DIDIK</h3>

<table class="kiri">
	<tr>
		<td>Tanggal: </td>
		<td>
			<table>
				<tr>
					<?php
						$date = new DateTime();
						$tanggal = date_format($date,"d/m/Y");

						$panjang = strlen($tanggal);
						$karakter = str_split($tanggal);

						for ($i=1; $i <= $panjang; $i++) { 
							?>
							<td style="border-color:black;<?php if ($i!=3 && $i!=6) {
								echo "border-style: groove;";
							}?>"><?php echo $karakter[$i-1];?></td>
							<?php
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
</table>

<table class="kanan">
	<tr>
		<td>F-PD</td>
	</tr>
</table>