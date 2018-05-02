<?php
class PDF extends FPDF
{
	//Page header
	function Header()
	{
                $this->setFont('Arial','',10);
                $this->setFillColor(255,255,255);
                $this->cell(100,6,"Laporan Respon Orang Tua",0,0,'L',1); 
                $this->cell(100,6,"Tanggal-Bulan-Tahun : " . date('d-m-Y'),0,1,'R',1); 
                $this->Image(base_url().'arrafi/ubold/assets/images/users/avatar-1.jpg', 10, 25,'50','25','jpg');
                
                $this->Ln(12);
                $this->setFont('Arial','',14);
                $this->setFillColor(255,255,255);
                $this->cell(50,6,'',0,0,'C',0); 
                $this->cell(100,6,'Laporan daftar pegawai gubugkoding.com',0,1,'L',1); 
                $this->cell(50,6,'',0,0,'C',0); 
                $this->cell(100,6,"Periode : ".date('M Y'),0,1,'L',1); 
                $this->cell(50,6,'',0,0,'C',0); 
                $this->cell(100,6,'Lokasi : Semarang, Jawa Tengah',0,1,'L',1);
               
                
	}			
	function Content1($listLaporan)
	{
			$ya = 46;
            $rw = 6;
            $no = 1;
			$this->Ln(10);
                $this->setFont('Arial','',10);
                $this->setFillColor(255,255,255);
				foreach ($listLaporan as $key) {
                $this->cell(190,10,"Laporan Tanggal : ".$key->tanggal_laporan." uhuy",1,0,'C',1);
				}
				$this->Ln(10);
                foreach ($listLaporan as $key) {
                        $this->setFont('Arial','',10);
                        $this->setFillColor(255,255,255);
                        $this->cell(190,10,$key->isi_laporan,1,0,'L',1);
                        $ya = $ya + $rw;
                        $no++;
             }
 
	}
	
	
            
           
	function Footer()
	{
		//atur posisi 1.5 cm dari bawah
		$this->SetY(-15);
		//buat garis horizontal
		$this->Line(10,$this->GetY(),210,$this->GetY());
		//Arial italic 9
		$this->SetFont('Arial','I',9);
                $this->Cell(0,10,'copyright gubugkoding.com Semarang ' . date('Y'),0,0,'L');
		//nomor halaman
		$this->Cell(0,10,'Halaman '.$this->PageNo(),0,0,'R');
	}
}
 
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content1($listLaporan);
$pdf->Output();
?>
        