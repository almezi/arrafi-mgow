<?php
$out = '';
foreach($list->result() as $row){ 
         $out .='"'.$row->nis.'","'.$row->nama.'",masukan skor, masukan nilai';
		$out .="\n";
}
//Download $filename.csv
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=nilai pmp_kelas ".$_GET['kelas']."_pelajaran ".$_GET['namamapel']."_semester ".$_GET['semester']."_tahun ajaran ".$_GET['thnajar'].".csv");
header("Content-Transfer-Encoding: binary ");
echo $out;

?>