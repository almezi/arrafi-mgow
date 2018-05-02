<?php
class ooo extends FPDF
{
	//Page header
	function Header()
	{
               
                $this->setFont('Times','I',10);
                $this->setFillColor(255,255,255);
   
                       
                $this->cell(90,6,"Document ",0,0,'L',1); 
                $this->cell(100,6,"Printed date : " . date('d/m/Y'),0,1,'R',1); 
                $this->Image('http://localhost/arrafi/foto/logo-yayasan.jpg', 10, 25,'30','25','jpg');
                $this->Image('http://localhost/arrafi/foto/logo.jpg', 175, 25,'26','25','jpg');
                
                $this->Ln(10);
                $this->setFont('Times','',14);
                $this->setFillColor(255,255,255);
                $this->cell(45,6,'',0,0,'C',0); 

                $this->cell(80,6,'YAYASAN PENDIDIKAN KEWIRASWASTAAN ',0,1,'L',1); 
                $this->cell(65,6,'',0,0,'C',0); 
                $this->cell(80,6,'SEKOLAH DASAR AR-RAFI',0,1,'L',1); 
                $this->setFont('Times','',10);
                $this->cell(80,6,'',0,0,'C',0); 
                $this->cell(80,6,'Terakreditas ',0,1,'L',1); 
                $this->setFont('Times','I',8);
                $this->cell(30,6,'',0,0,'C',0); 
                $this->cell(100,3,'Alamat Jl. Sekejati III No.20 Kiaracondong, Bandung. Telp/Faks: 0227311009. Email: perguruanarrafi@gmail.com. ',0,1,'L',1); 
                $this->cell(75,6,'',0,0,'C',0); 
                 $this->cell(80,3,' Web: www.perguruanarrafi.sch.id',0,1,'L',1); 
                $this->Ln(3);
                $this->Line(10,$this->GetY(),200,$this->GetY());
                $this->Ln(1);
                $this->Line(10,$this->GetY(),200,$this->GetY());
                $this->Ln(5);
                $this->Ln(5);
                
                $this->setFont('Arial','B',12);
                $this->cell(35,6,'',0,0,'C',0); 
                $this->cell(130,6,'LAPORAN DATA PERISTIWA ',0,1,'C',1); 
                if($_GET["bln"]!=""){
                    $this->setFont('Times','',10);
                    $this->cell(200,6,'Periode Bulan: '.$_GET["bln"],0,1,'C',1);
                         
                }
                //=========================================NAMA & NIP====================================================
               
                $this->Ln(5);

                $this->setFont('Times','',10);
                $this->cell(8,6,'',0,0,'C',0); 
                $this->cell(100,6,'Berikut adalah data peristiwa yang terjadi: ',0,1,'L',1); 

                $this->Ln(5);
                $this->setFont('Times','B',9);
                $this->setFillColor(190,193,193);
                $this->cell(8,6,'',0,0,'C',0); 
                $this->cell(8,6,'No.',1,0,'C',1);
                $this->cell(30,6,'Tgl Peristiwa',1,0,'C',1);
                $this->cell(30,6,'Jam Peristiwa',1,0 ,'C',1);
                $this->cell(30,6,'Kejadian',1,0,'C',1);
                $this->cell(30,6,'Bukti',1,0,'C',1);
                $this->cell(30,6,'Deskripsi',1,0,'C',1);
                $this->cell(30,6,'Video',1,1,'C',1);
                
    
	}
 
	function Content($data)
	{
            $ya = 46;
            $rw = 6;
            $no = 1;

                foreach ($data as $key) {
                $this->setFont('Times','I',9);
                        	$this->setFillColor(255,255,255);
                        $this->cell(8,6,'',0,0,'C',0); 
                        $this->cell(8,8,$no,1,0,'C',1);
                        $this->cell(30,8,$key->tgl_peristiwa,1,0,'L',1);
                        $this->cell(30,8,$key->jam_peristiwa,1,0,'C',1);
                        $this->cell(30,8,$key->kejadian,1,0,'L',1);
                        $this->cell(30,8,$key->bukti,1,0,'L',1);
                        $this->cell(30,8,$key->deskripsi,1,0,'L',1);
                        $this->cell(30,8,$key->video,1,1,'L',1);
                        
                        $ya = $ya + $rw;
                        $no++;
                }
            
        $this->Ln(90);
        $this->setFont('Times','',12); 
        $this->cell(170,6,'Mengetahui, ',0,1,'R',1); 
        $this->Ln(15);
        $this->cell(170,6,$_GET["nama"],0,1,'R',1);
        $this->cell(170,6,$_GET["nip"],0,1,'R',1); 

                
	}
	function Footer()
	{

		//atur posisi 1.5 cm dari bawah
		$this->SetY(-15);
		//buat garis horizontal
		$this->Line(10,$this->GetY(),200,$this->GetY());
		//Arial italic 9
		$this->SetFont('Times','I',10);
                $this->Cell(0,10,'Aplikasi manajemen bagian keamanan & kebersihan Sekolah Ar-Rafi. By Linmas Dita. ' . date('Y'),0,0,'L');
		//nomor halaman
		$this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
	}
}

$pdf = new ooo();
$pdf->AliasNbPages();
$pdf->AddPage('');
$pdf->Content($data);
$pdf->Output();
?>