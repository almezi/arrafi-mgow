<?php
$kkm=0;
foreach($bab->result() as $row){ 
	$kkm = $row->kkm;
	echo "<tr >
		<td>  $row->ki </td>
		<td>  $row->kd </td>
		<td align='center'>  $kkm </td>
		";
		foreach($siswa->result() as $sis){
		if ($this->m_database->wali_evaldkn($sis->nis,$row->idbab)->num_rows()==0){
			echo "<td align='center' bgcolor='yellow'></td>";
		}
		else{
			foreach ($this->m_database->wali_evaldkn($sis->nis,$row->idbab)->result() as $nil){
			if($nil->nilai < $kkm){
			echo "<td align='center' bgcolor='yellow'>  $nil->nilai </td>";
			}
			else {
			echo "<td align='center'>  $nil->nilai </td>";
			}
			}
		}
		}
		echo "</tr>";
}

	echo "
	<tr align='center'>
		<td></td>
		<td><b>  Nilai Rata-Rata  </b></td>
		<td>$kkm</td>";
	foreach($siswa->result() as $row){ 
		if ($this->m_database->wali_akhirdkn($row->nis)->num_rows()==0){
			echo "<td bgcolor='yellow'></td>";
		}
		else{
		foreach ($this->m_database->wali_akhirdkn($row->nis)->result() as $nilai){
		if($nilai->rata < $kkm){
			echo "<td bgcolor='yellow'>  $nilai->rata </td>";
		}
		else {
			echo "<td>  $nilai->rata </td>";
		}
		} 
		}
	}
	echo "</tr>
	<tr bgcolor='grey' align='center'>
		<td></td>
		<td><b>  Nilai Uji Kompetensi </b></td>
		<td>$kkm</td>";
	foreach($siswa->result() as $row){
		if ($this->m_database->wali_akhirdkn($row->nis)->num_rows()==0){
			echo "<td bgcolor='yellow'></td>";
		}
		else{
		foreach ($this->m_database->wali_akhirdkn($row->nis)->result() as $nilai){
		if($nilai->pmp < $kkm){
			echo "<td bgcolor='yellow'>  $nilai->pmp </td>";
		}
		else {
			echo "<td>  $nilai->pmp </td>";
		}
		} 
		}
	}
	echo "</tr>
	<tr align='center'>
		<td></td>
		<td><b>  Nilai Akhir </b></td>
		<td></td>";
	foreach($siswa->result() as $row){ 
		if ($this->m_database->wali_akhirdkn($row->nis)->num_rows()==0){
			echo "<td bgcolor='yellow'></td>";
		}
		else{
		foreach ($this->m_database->wali_akhirdkn($row->nis)->result() as $nilai){
			if($nilai->akhir < $kkm){
			echo "<td bgcolor='yellow'>  $nilai->akhir </td>";
			}
			else {
			echo "<td>  $nilai->akhir </td>";
			}
		} 
		}
	}
	echo "</tr><tr align='center'>
		<td></td>
		<td><b>  Catatan </b></td>
		<td></td>";
	
	foreach($siswa->result() as $row){
	$jum=0;	
		foreach($bab->result() as $ba){ 
			if($this->m_database->wali_evaldkn($row->nis,$ba->idbab)->num_rows()==0){
				$jum++;
			} 
		}
		foreach ($this->m_database->wali_dknindeks($row->nis)->result() as $indeks){
			if ($indeks->x ==1 or $jum == 1){
			echo "<td>B</td>";
			}
			else if ($indeks->x > 1 or $jum > 1){
			echo "<td>C</td>";
			}
			else if ($indeks->x ==0 or $jum == 0){
			echo "<td>A</td>";
			}
		} 
	}
?>
						