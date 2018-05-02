<?php 
	$no=1;
	foreach($mapel->result() as $row){ ?>
	<tr align="center">
	
		<td><?php echo $no; ?></td>
		<td><?php echo $row->nama; ?></td>
		<td><?php echo $row->kkm; ?></td>
		<?php foreach ($this->m_database->wali_nilairapor($row->idmapel)->result() as $nilai){ ?>
		<td><?php echo $nilai->akhir; ?></td>
		
		<td>
		<?php
		if ($row->kkm <= $nilai->akhir){
			echo "&#10004;";
		}
		?></td>
		<td> 
		<?php
		if ($row->kkm > $nilai->akhir){
			echo "&#10004;";
		}
		}
		?></td>
		<td></td>
	</tr>
	<?php
	$no++;
	}
?>