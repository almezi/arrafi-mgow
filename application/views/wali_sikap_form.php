<script type="text/javascript" >
	function progressChange(obj) {
        var $form = $(obj).closest('form'); // OR var form = obj.from;
        
        $.ajax({
            type: "POST",
            url: $form.attr('action'),
            data: $form.serialize(),
			refresh: true,
            success: function() {
                
            },
        });
    }
</script>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">

	<!-- Start content -->
    <div class="content">
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Input Nilai Sikap dan Karakter</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div >
                    <div class="panel panel-default">
                        <div class="panel-heading">
						 Kelas <?php echo $_GET['kelas']; ?>, <?php echo $_GET['nis']; ?>, <?php echo $_GET['nama']; ?>, Semester <?php echo $_GET['semester']; ?>
						   <a style="float:right;" href="<?php echo base_url()?>index.php/guru/wali_sikap_siswa?semester=<?php echo $_GET['semester']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&tipe=<?php echo $_GET['tipe']; ?>"> <button type="button" class="btn btn-success">Menu Siswa</button></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                           
							<div >
							
                                        <div class="form-group has-success" >
											<div  class="col-lg-6">
												<p>1.<b> Kemandirian, </b> Sikap dan perilaku siswa yang tidak mudah tergantung pada orang lain dalam menyelesaikan tugas-tugas</p>
											</div>
											<form role="form" id='Fom' action="<?php echo base_url() ?>index.php/guru/wali_inputsikap?idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&nis=<?php echo $_GET['nis']; ?>&nama=<?php echo $_GET['nama']; ?>&semester=<?php echo $_GET['semester']; ?>" method='post' enctype='multipart/form-data'>
											<div  class="col-lg-3">
												<input type="hidden" name="nomer" class="form-control" value='1'>
												<input type="hidden" name="nis" class="form-control" id="inputSuccess" value="<?php echo $_GET['nis']; ?>" readonly>
												<input type="hidden" name="semester" class="form-control" id="inputSuccess" value="<?php echo $_GET['semester']; ?>" readonly>
												<div >
													<label>
														<input type="radio"  name="pil1" id="pil1" value="a" onclick="progressChange(this)"
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==1 and $row->pil=='a'){
																echo "checked";
															}
														 } ?> >belum nampak
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="b" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==1 and $row->pil=='b'){
																echo "checked";
															}
														 } ?> >perlu stimulasi
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="c" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==1 and $row->pil=='c'){
																echo "checked";
															}
														 } ?> >perlu pengarahan
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="d" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==1 and $row->pil=='d'){
																echo "checked";
															}
														 } ?> >sudah berkembang dengan baik
													</label>
												</div>
											</div>
											
											</form>
											<div  class="col-lg-6">
												<p>2.<b> Konsentrasi, </b> Siswa memiliki perhatian penuh dalam kegiatan belajar mengajar</p>
											</div>
											<form role="form" id='Fom' action="<?php echo base_url() ?>index.php/guru/wali_inputsikap?idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&nis=<?php echo $_GET['nis']; ?>&nama=<?php echo $_GET['nama']; ?>&semester=<?php echo $_GET['semester']; ?>" method='post' enctype='multipart/form-data'>
											<div  class="col-lg-3">
												<input type="hidden" name="nomer" class="form-control" value='2'>
												<input type="hidden" name="nis" class="form-control" id="inputSuccess" value="<?php echo $_GET['nis']; ?>" readonly>
												<input type="hidden" name="semester" class="form-control" id="inputSuccess" value="<?php echo $_GET['semester']; ?>" readonly>
												<div >
													<label>
														<input type="radio"  name="pil1" id="pil1" value="a" onclick="progressChange(this)"
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==2 and $row->pil=='a'){
																echo "checked";
															}
														 } ?> >belum nampak
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="b" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==2 and $row->pil=='b'){
																echo "checked";
															}
														 } ?> >perlu stimulasi
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="c" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==2 and $row->pil=='c'){
																echo "checked";
															}
														 } ?> >perlu pengarahan
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="d" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==2 and $row->pil=='d'){
																echo "checked";
															}
														 } ?> >sudah berkembang dengan baik
													</label>
												</div>
											</div>
											
											</form>
											<div  class="col-lg-6">
												<p>3.<b> Kedisiplinan, </b>Tindakan siswa menunjukkan perilaku tertib dan patuh pada berbagai ketentuan dan peraturan</p>
											</div>
											<form role="form" id='Fom' action="<?php echo base_url() ?>index.php/guru/wali_inputsikap?idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&nis=<?php echo $_GET['nis']; ?>&nama=<?php echo $_GET['nama']; ?>&semester=<?php echo $_GET['semester']; ?>" method='post' enctype='multipart/form-data'>
											<div  class="col-lg-3">
												<input type="hidden" name="nomer" class="form-control" value='3'>
												<input type="hidden" name="nis" class="form-control" id="inputSuccess" value="<?php echo $_GET['nis']; ?>" readonly>
												<input type="hidden" name="semester" class="form-control" id="inputSuccess" value="<?php echo $_GET['semester']; ?>" readonly>
												<div >
													<label>
														<input type="radio"  name="pil1" id="pil1" value="a" onclick="progressChange(this)"
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==3 and $row->pil=='a'){
																echo "checked";
															}
														 } ?> >belum nampak
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="b" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==3 and $row->pil=='b'){
																echo "checked";
															}
														 } ?> >perlu stimulasi
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="c" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==3 and $row->pil=='c'){
																echo "checked";
															}
														 } ?> >perlu pengarahan
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="d" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==3 and $row->pil=='d'){
																echo "checked";
															}
														 } ?> >sudah berkembang dengan baik
													</label>
												</div>
											</div>
											
											</form>
											<div  class="col-lg-6">
												<p>4.<b> Tanggung Jawab, </b>Sikap dan perilaku siswa dalam melaksanakan tugas dan kewajibannya terhadap diri sendiri di lingkungan kelas/sekolah</p>
											</div>
											<form role="form" id='Fom' action="<?php echo base_url() ?>index.php/guru/wali_inputsikap?idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&nis=<?php echo $_GET['nis']; ?>&nama=<?php echo $_GET['nama']; ?>&semester=<?php echo $_GET['semester']; ?>" method='post' enctype='multipart/form-data'>
											<div  class="col-lg-3">
												<input type="hidden" name="nomer" class="form-control" value='4'>
												<input type="hidden" name="nis" class="form-control" id="inputSuccess" value="<?php echo $_GET['nis']; ?>" readonly>
												<input type="hidden" name="semester" class="form-control" id="inputSuccess" value="<?php echo $_GET['semester']; ?>" readonly>
												<div >
													<label>
														<input type="radio"  name="pil1" id="pil1" value="a" onclick="progressChange(this)"
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==4 and $row->pil=='a'){
																echo "checked";
															}
														 } ?> >belum nampak
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="b" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==4 and $row->pil=='b'){
																echo "checked";
															}
														 } ?> >perlu stimulasi
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="c" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==4 and $row->pil=='c'){
																echo "checked";
															}
														 } ?> >perlu pengarahan
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="d" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==4 and $row->pil=='d'){
																echo "checked";
															}
														 } ?> >sudah berkembang dengan baik
													</label>
												</div>
											</div>
											
											</form>
											<div  class="col-lg-6">
												<p>5.<b> Motivasi, </b>Siswa memiliki semangat dalam belajar, jarang mengeluh, dan tidak mudah putus asa</p>
											</div>
											<form role="form" id='Fom' action="<?php echo base_url() ?>index.php/guru/wali_inputsikap?idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&nis=<?php echo $_GET['nis']; ?>&nama=<?php echo $_GET['nama']; ?>&semester=<?php echo $_GET['semester']; ?>" method='post' enctype='multipart/form-data'>
											<div  class="col-lg-3">
												<input type="hidden" name="nomer" class="form-control" value='5'>
												<input type="hidden" name="nis" class="form-control" id="inputSuccess" value="<?php echo $_GET['nis']; ?>" readonly>
												<input type="hidden" name="semester" class="form-control" id="inputSuccess" value="<?php echo $_GET['semester']; ?>" readonly>
												<div >
													<label>
														<input type="radio"  name="pil1" id="pil1" value="a" onclick="progressChange(this)"
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==5 and $row->pil=='a'){
																echo "checked";
															}
														 } ?> >belum nampak
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="b" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==5 and $row->pil=='b'){
																echo "checked";
															}
														 } ?> >perlu stimulasi
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="c" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==5 and $row->pil=='c'){
																echo "checked";
															}
														 } ?> >perlu pengarahan
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="d" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==5 and $row->pil=='d'){
																echo "checked";
															}
														 } ?> >sudah berkembang dengan baik
													</label>
												</div>
											</div>
											
											</form>
											<div  class="col-lg-6">
												<p>6.<b> Kreativitas, </b>Siswa berpikir dan melakukan sesuatu untuk menghasilkan cara atau hasil baru dari apa yang telah dimiliki dalam proses pembelajaran</p>
											</div>
											<form role="form" id='Fom' action="<?php echo base_url() ?>index.php/guru/wali_inputsikap?idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&nis=<?php echo $_GET['nis']; ?>&nama=<?php echo $_GET['nama']; ?>&semester=<?php echo $_GET['semester']; ?>" method='post' enctype='multipart/form-data'>
											<div  class="col-lg-3">
												<input type="hidden" name="nomer" class="form-control" value='6'>
												<input type="hidden" name="nis" class="form-control" id="inputSuccess" value="<?php echo $_GET['nis']; ?>" readonly>
												<input type="hidden" name="semester" class="form-control" id="inputSuccess" value="<?php echo $_GET['semester']; ?>" readonly>
												<div >
													<label>
														<input type="radio"  name="pil1" id="pil1" value="a" onclick="progressChange(this)"
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==6 and $row->pil=='a'){
																echo "checked";
															}
														 } ?> >belum nampak
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="b" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==6 and $row->pil=='b'){
																echo "checked";
															}
														 } ?> >perlu stimulasi
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="c" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==6 and $row->pil=='c'){
																echo "checked";
															}
														 } ?> >perlu pengarahan
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="d" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==6 and $row->pil=='d'){
																echo "checked";
															}
														 } ?> >sudah berkembang dengan baik
													</label>
												</div>
											</div>
											
											</form>
											<div  class="col-lg-6">
												<p>7.<b> Kerapihan, </b> Keterampilan siswa dalam mengelola/menata tugas, atribut, maupun property nya dengan tertib</p>
											</div>
											<form role="form" id='Fom' action="<?php echo base_url() ?>index.php/guru/wali_inputsikap?idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&nis=<?php echo $_GET['nis']; ?>&nama=<?php echo $_GET['nama']; ?>&semester=<?php echo $_GET['semester']; ?>" method='post' enctype='multipart/form-data'>
											<div  class="col-lg-3">
												<input type="hidden" name="nomer" class="form-control" value='7'>
												<input type="hidden" name="nis" class="form-control" id="inputSuccess" value="<?php echo $_GET['nis']; ?>" readonly>
												<input type="hidden" name="semester" class="form-control" id="inputSuccess" value="<?php echo $_GET['semester']; ?>" readonly>
												<div >
													<label>
														<input type="radio"  name="pil1" id="pil1" value="a" onclick="progressChange(this)"
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==7 and $row->pil=='a'){
																echo "checked";
															}
														 } ?> >belum nampak
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="b" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==7 and $row->pil=='b'){
																echo "checked";
															}
														 } ?> >perlu stimulasi
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="c" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==7 and $row->pil=='c'){
																echo "checked";
															}
														 } ?> >perlu pengarahan
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="d" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==7 and $row->pil=='d'){
																echo "checked";
															}
														 } ?> >sudah berkembang dengan baik
													</label>
												</div>
											</div>
											
											</form>
											<div  class="col-lg-6">
												<p>8.<b> Sikap, </b> Kecenderungan siswa untuk merespon secara positif atau negatif terhadap ide tertentu, objek, orang, atau situasi dalam proses pembelajaran</p>
											</div>
											<form role="form" id='Fom' action="<?php echo base_url() ?>index.php/guru/wali_inputsikap?idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&nis=<?php echo $_GET['nis']; ?>&nama=<?php echo $_GET['nama']; ?>&semester=<?php echo $_GET['semester']; ?>" method='post' enctype='multipart/form-data'>
											<div  class="col-lg-3">
												<input type="hidden" name="nomer" class="form-control" value='8'>
												<input type="hidden" name="nis" class="form-control" id="inputSuccess" value="<?php echo $_GET['nis']; ?>" readonly>
												<input type="hidden" name="semester" class="form-control" id="inputSuccess" value="<?php echo $_GET['semester']; ?>" readonly>
												<div >
													<label>
														<input type="radio"  name="pil1" id="pil1" value="a" onclick="progressChange(this)"
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==8 and $row->pil=='a'){
																echo "checked";
															}
														 } ?> >belum nampak
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="b" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==8 and $row->pil=='b'){
																echo "checked";
															}
														 } ?> >perlu stimulasi
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="c" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==8 and $row->pil=='c'){
																echo "checked";
															}
														 } ?> >perlu pengarahan
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="d" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==8 and $row->pil=='d'){
																echo "checked";
															}
														 } ?> >sudah berkembang dengan baik
													</label>
												</div>
											</div>
											
											</form><div  class="col-lg-6">
												<p>9.<b> Keaktifan, </b> Sikap siswa menunjukkan antusias dan perhatian lebih dalam belajar dan merespon tugas-tugas yang diberikan guru dengan baik</p>
											</div>
											<form role="form" id='Fom' action="<?php echo base_url() ?>index.php/guru/wali_inputsikap?idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&nis=<?php echo $_GET['nis']; ?>&nama=<?php echo $_GET['nama']; ?>&semester=<?php echo $_GET['semester']; ?>" method='post' enctype='multipart/form-data'>
											<div  class="col-lg-3">
												<input type="hidden" name="nomer" class="form-control" value='9'>
												<input type="hidden" name="nis" class="form-control" id="inputSuccess" value="<?php echo $_GET['nis']; ?>" readonly>
												<input type="hidden" name="semester" class="form-control" id="inputSuccess" value="<?php echo $_GET['semester']; ?>" readonly>
												<div >
													<label>
														<input type="radio"  name="pil1" id="pil1" value="a" onclick="progressChange(this)"
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==9 and $row->pil=='a'){
																echo "checked";
															}
														 } ?> >belum nampak
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="b" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==9 and $row->pil=='b'){
																echo "checked";
															}
														 } ?> >perlu stimulasi
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="c" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==9 and $row->pil=='c'){
																echo "checked";
															}
														 } ?> >perlu pengarahan
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="d" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==9 and $row->pil=='d'){
																echo "checked";
															}
														 } ?> >sudah berkembang dengan baik
													</label>
												</div>
											</div>
											
											</form><div  class="col-lg-6">
												<p>10.<b> Persepsi, </b> Respon siswa terhadap rasangan dari luar melalui panca indera dari lingkungan sekitar</p>
											</div>
											<form role="form" id='Fom' action="<?php echo base_url() ?>index.php/guru/wali_inputsikap?idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&nis=<?php echo $_GET['nis']; ?>&nama=<?php echo $_GET['nama']; ?>&semester=<?php echo $_GET['semester']; ?>" method='post' enctype='multipart/form-data'>
											<div  class="col-lg-3">
												<input type="hidden" name="nomer" class="form-control" value='10'>
												<input type="hidden" name="nis" class="form-control" id="inputSuccess" value="<?php echo $_GET['nis']; ?>" readonly>
												<input type="hidden" name="semester" class="form-control" id="inputSuccess" value="<?php echo $_GET['semester']; ?>" readonly>
												<div >
													<label>
														<input type="radio"  name="pil1" id="pil1" value="a" onclick="progressChange(this)"
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==10 and $row->pil=='a'){
																echo "checked";
															}
														 } ?> >belum nampak
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="b" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==10 and $row->pil=='b'){
																echo "checked";
															}
														 } ?> >perlu stimulasi
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="c" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==10 and $row->pil=='c'){
																echo "checked";
															}
														 } ?> >perlu pengarahan
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="d" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==10 and $row->pil=='d'){
																echo "checked";
															}
														 } ?> >sudah berkembang dengan baik
													</label>
												</div>
											</div>
											
											</form><div  class="col-lg-6">
												<p>11.<b> Penyesuaian Diri, </b>Siswa mudah menyesuaikan diri pada lingkungan sekitar</p>
											</div>
											<form role="form" id='Fom' action="<?php echo base_url() ?>index.php/guru/wali_inputsikap?idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&nis=<?php echo $_GET['nis']; ?>&nama=<?php echo $_GET['nama']; ?>&semester=<?php echo $_GET['semester']; ?>" method='post' enctype='multipart/form-data'>
											<div  class="col-lg-3">
												<input type="hidden" name="nomer" class="form-control" value='11'>
												<input type="hidden" name="nis" class="form-control" id="inputSuccess" value="<?php echo $_GET['nis']; ?>" readonly>
												<input type="hidden" name="semester" class="form-control" id="inputSuccess" value="<?php echo $_GET['semester']; ?>" readonly>
												<div >
													<label>
														<input type="radio"  name="pil1" id="pil1" value="a" onclick="progressChange(this)"
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==11 and $row->pil=='a'){
																echo "checked";
															}
														 } ?> >belum nampak
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="b" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==11 and $row->pil=='b'){
																echo "checked";
															}
														 } ?> >perlu stimulasi
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="c" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==11 and $row->pil=='c'){
																echo "checked";
															}
														 } ?> >perlu pengarahan
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="d" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==11 and $row->pil=='d'){
																echo "checked";
															}
														 } ?> >sudah berkembang dengan baik
													</label>
												</div>
											</div>
											
											</form>
											<div  class="col-lg-6">
												<p>12.<b> Emosi, </b>Kemampuan siswa dalam mengendalikan emosi dengan baik</p>
											</div>
											<form role="form" id='Fom' action="<?php echo base_url() ?>index.php/guru/wali_inputsikap?idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&nis=<?php echo $_GET['nis']; ?>&nama=<?php echo $_GET['nama']; ?>&semester=<?php echo $_GET['semester']; ?>" method='post' enctype='multipart/form-data'>
											<div  class="col-lg-3">
												<input type="hidden" name="nomer" class="form-control" value='12'>
												<input type="hidden" name="nis" class="form-control" id="inputSuccess" value="<?php echo $_GET['nis']; ?>" readonly>
												<input type="hidden" name="semester" class="form-control" id="inputSuccess" value="<?php echo $_GET['semester']; ?>" readonly>
												<div >
													<label>
														<input type="radio"  name="pil1" id="pil1" value="a" onclick="progressChange(this)"
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==12 and $row->pil=='a'){
																echo "checked";
															}
														 } ?> >belum nampak
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="b" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==12 and $row->pil=='b'){
																echo "checked";
															}
														 } ?> >perlu stimulasi
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="c" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==12 and $row->pil=='c'){
																echo "checked";
															}
														 } ?> >perlu pengarahan
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="d" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==12 and $row->pil=='d'){
																echo "checked";
															}
														 } ?> >sudah berkembang dengan baik
													</label>
												</div>
											</div>
											
											</form>
											<div  class="col-lg-6">
												<p>13.<b> Motorik, </b>Kemampuan siswa yang berhubungan dengan keterampilan fisik yang melibatkan otot besar/kecil serta koordinasi mata dan tangan</p>
											</div>
											<form role="form" id='Fom' action="<?php echo base_url() ?>index.php/guru/wali_inputsikap?idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&nis=<?php echo $_GET['nis']; ?>&nama=<?php echo $_GET['nama']; ?>&semester=<?php echo $_GET['semester']; ?>" method='post' enctype='multipart/form-data'>
											<div  class="col-lg-3">
												<input type="hidden" name="nomer" class="form-control" value='13'>
												<input type="hidden" name="nis" class="form-control" id="inputSuccess" value="<?php echo $_GET['nis']; ?>" readonly>
												<input type="hidden" name="semester" class="form-control" id="inputSuccess" value="<?php echo $_GET['semester']; ?>" readonly>
												<div >
													<label>
														<input type="radio"  name="pil1" id="pil1" value="a" onclick="progressChange(this)"
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==13 and $row->pil=='a'){
																echo "checked";
															}
														 } ?> >belum nampak
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="b" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==13 and $row->pil=='b'){
																echo "checked";
															}
														 } ?> >perlu stimulasi
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="c" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==13 and $row->pil=='c'){
																echo "checked";
															}
														 } ?> >perlu pengarahan
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="d" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==13 and $row->pil=='d'){
																echo "checked";
															}
														 } ?> >sudah berkembang dengan baik
													</label>
												</div>
											</div>
											
											</form>
											<div  class="col-lg-6">
												<p>14.<b> Memori, </b>Kemampuan siswa dalam mengingat apa yang telah dipelajari atau dialaminya</p>
											</div>
											<form role="form" id='Fom' action="<?php echo base_url() ?>index.php/guru/wali_inputsikap?idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&nis=<?php echo $_GET['nis']; ?>&nama=<?php echo $_GET['nama']; ?>&semester=<?php echo $_GET['semester']; ?>" method='post' enctype='multipart/form-data'>
											<div  class="col-lg-3">
												<input type="hidden" name="nomer" class="form-control" value='14'>
												<input type="hidden" name="nis" class="form-control" id="inputSuccess" value="<?php echo $_GET['nis']; ?>" readonly>
												<input type="hidden" name="semester" class="form-control" id="inputSuccess" value="<?php echo $_GET['semester']; ?>" readonly>
												<div >
													<label>
														<input type="radio"  name="pil1" id="pil1" value="a" onclick="progressChange(this)"
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==14 and $row->pil=='a'){
																echo "checked";
															}
														 } ?> >belum nampak
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="b" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==14 and $row->pil=='b'){
																echo "checked";
															}
														 } ?> >perlu stimulasi
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="c" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==14 and $row->pil=='c'){
																echo "checked";
															}
														 } ?> >perlu pengarahan
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="d" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==14 and $row->pil=='d'){
																echo "checked";
															}
														 } ?> >sudah berkembang dengan baik
													</label>
												</div>
											</div>
											
											</form>
											<div  class="col-lg-6">
												<p>15.<b> Sportivitas, </b>Siswa telah dapat mengambil kerugian atau kekalahan tanpa keluhan, atau kemenangan tanpa sombong, dan yang memperlakukan/nya lawan dengan keadilan, sopan, dan hormat</p>
											</div>
											<form role="form" id='Fom' action="<?php echo base_url() ?>index.php/guru/wali_inputsikap?idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&nis=<?php echo $_GET['nis']; ?>&nama=<?php echo $_GET['nama']; ?>&semester=<?php echo $_GET['semester']; ?>" method='post' enctype='multipart/form-data'>
											<div  class="col-lg-3">
												<input type="hidden" name="nomer" class="form-control" value='15'>
												<input type="hidden" name="nis" class="form-control" id="inputSuccess" value="<?php echo $_GET['nis']; ?>" readonly>
												<input type="hidden" name="semester" class="form-control" id="inputSuccess" value="<?php echo $_GET['semester']; ?>" readonly>
												<div >
													<label>
														<input type="radio"  name="pil1" id="pil1" value="a" onclick="progressChange(this)"
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==15 and $row->pil=='a'){
																echo "checked";
															}
														 } ?> >belum nampak
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="b" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==15 and $row->pil=='b'){
																echo "checked";
															}
														 } ?> >perlu stimulasi
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="c" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==15 and $row->pil=='c'){
																echo "checked";
															}
														 } ?> >perlu pengarahan
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="d" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==15 and $row->pil=='d'){
																echo "checked";
															}
														 } ?> >sudah berkembang dengan baik
													</label>
												</div>
											</div>
											
											</form>
											<div  class="col-lg-6">
												<p>16.<b> Kerja Sama, </b>Sikap siswa telah menunjukkan kemampuan bekerja sama dengan teman atau pihak lain untuk tujuan yang sama</p>
											</div>
											<form role="form" id='Fom' action="<?php echo base_url() ?>index.php/guru/wali_inputsikap?idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&nis=<?php echo $_GET['nis']; ?>&nama=<?php echo $_GET['nama']; ?>&semester=<?php echo $_GET['semester']; ?>" method='post' enctype='multipart/form-data'>
											<div  class="col-lg-3">
												<input type="hidden" name="nomer" class="form-control" value='16'>
												<input type="hidden" name="nis" class="form-control" id="inputSuccess" value="<?php echo $_GET['nis']; ?>" readonly>
												<input type="hidden" name="semester" class="form-control" id="inputSuccess" value="<?php echo $_GET['semester']; ?>" readonly>
												<div >
													<label>
														<input type="radio"  name="pil1" id="pil1" value="a" onclick="progressChange(this)"
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==16 and $row->pil=='a'){
																echo "checked";
															}
														 } ?> >belum nampak
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="b" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==16 and $row->pil=='b'){
																echo "checked";
															}
														 } ?> >perlu stimulasi
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="c" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==16 and $row->pil=='c'){
																echo "checked";
															}
														 } ?> >perlu pengarahan
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="d" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==16 and $row->pil=='d'){
																echo "checked";
															}
														 } ?> >sudah berkembang dengan baik
													</label>
												</div>
											</div>
											
											</form>
											<div  class="col-lg-6">
												<p>17.<b> Kepedulian, </b>Sikap dan tindakan siswa yang selalu berupaya mencegah kerusakan pada lingkungan alam maupun sosial, dan mengembangkan upaya-upaya untuk memperbaiki kerusakan alam/sosial yang sudah terjadi</p>
											</div>
											<form role="form" id='Fom' action="<?php echo base_url() ?>index.php/guru/wali_inputsikap?idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&nis=<?php echo $_GET['nis']; ?>&nama=<?php echo $_GET['nama']; ?>&semester=<?php echo $_GET['semester']; ?>" method='post' enctype='multipart/form-data'>
											<div  class="col-lg-3">
												<input type="hidden" name="nomer" class="form-control" value='17'>
												<input type="hidden" name="nis" class="form-control" id="inputSuccess" value="<?php echo $_GET['nis']; ?>" readonly>
												<input type="hidden" name="semester" class="form-control" id="inputSuccess" value="<?php echo $_GET['semester']; ?>" readonly>
												<div >
													<label>
														<input type="radio"  name="pil1" id="pil1" value="a" onclick="progressChange(this)"
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==17 and $row->pil=='a'){
																echo "checked";
															}
														 } ?> >belum nampak
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="b" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==17 and $row->pil=='b'){
																echo "checked";
															}
														 } ?> >perlu stimulasi
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="c" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==17 and $row->pil=='c'){
																echo "checked";
															}
														 } ?> >perlu pengarahan
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="d" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==17 and $row->pil=='d'){
																echo "checked";
															}
														 } ?> >sudah berkembang dengan baik
													</label>
												</div>
											</div>
											
											</form>
											<div  class="col-lg-6">
												<p>18.<b> Percaya Diri, </b>Sikap dan tindakan siswa yang didasari keyakinan diri, tidak gerogi dan mau tampil depan umum</p>
											</div>
											<form role="form" id='Fom' action="<?php echo base_url() ?>index.php/guru/wali_inputsikap?idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&nis=<?php echo $_GET['nis']; ?>&nama=<?php echo $_GET['nama']; ?>&semester=<?php echo $_GET['semester']; ?>" method='post' enctype='multipart/form-data'>
											<div  class="col-lg-3">
												<input type="hidden" name="nomer" class="form-control" value='18'>
												<input type="hidden" name="nis" class="form-control" id="inputSuccess" value="<?php echo $_GET['nis']; ?>" readonly>
												<input type="hidden" name="semester" class="form-control" id="inputSuccess" value="<?php echo $_GET['semester']; ?>" readonly>
												<div >
													<label>
														<input type="radio"  name="pil1" id="pil1" value="a" onclick="progressChange(this)"
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==18 and $row->pil=='a'){
																echo "checked";
															}
														 } ?> >belum nampak
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="b" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==18 and $row->pil=='b'){
																echo "checked";
															}
														 } ?> >perlu stimulasi
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="c" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==18 and $row->pil=='c'){
																echo "checked";
															}
														 } ?> >perlu pengarahan
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="d" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==18 and $row->pil=='d'){
																echo "checked";
															}
														 } ?> >sudah berkembang dengan baik
													</label>
												</div>
											</div>
											
											</form>
											<div  class="col-lg-6">
												<p>19.<b> Kesopanan dan Bahasa, </b>Sikap dan tutur kata siswa telah sesuai dengan norma kesopanan</p>
											</div>
											<form role="form" id='Fom' action="<?php echo base_url() ?>index.php/guru/wali_inputsikap?idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&nis=<?php echo $_GET['nis']; ?>&nama=<?php echo $_GET['nama']; ?>&semester=<?php echo $_GET['semester']; ?>" method='post' enctype='multipart/form-data'>
											<div  class="col-lg-3">
												<input type="hidden" name="nomer" class="form-control" value='19'>
												<input type="hidden" name="nis" class="form-control" id="inputSuccess" value="<?php echo $_GET['nis']; ?>" readonly>
												<input type="hidden" name="semester" class="form-control" id="inputSuccess" value="<?php echo $_GET['semester']; ?>" readonly>
												<div >
													<label>
														<input type="radio"  name="pil1" id="pil1" value="a" onclick="progressChange(this)"
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==19 and $row->pil=='a'){
																echo "checked";
															}
														 } ?> >belum nampak
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="b" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==19 and $row->pil=='b'){
																echo "checked";
															}
														 } ?> >perlu stimulasi
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="c" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==19 and $row->pil=='c'){
																echo "checked";
															}
														 } ?> >perlu pengarahan
													</label>
												</div>
												<div >
													<label>
														<input type="radio" name="pil1" id="pil1" value="d" onclick="progressChange(this)" 
														 <?php foreach($cek->result() as $row){
															if ($row->nomer==19 and $row->pil=='d'){
																echo "checked";
															}
														 } ?> >sudah berkembang dengan baik
													</label>
												</div>
											</div>											
											</form>
											<center>
											<div  class="col-lg-12">
										     <a href="<?php echo base_url()?>index.php/guru/wali_sikap_download?idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>&nis=<?php echo $_GET['nis']; ?>&nama=<?php echo $_GET['nama']; ?>&semester=<?php echo $_GET['semester'];?>&tingkat=<?php echo $_GET['tingkat']; ?>"> <button type="button" class="btn btn-success" target="_blank"><img src="<?php echo base_url(); ?>logo/icon_180.png" style="height:30px; width:30px;"/>download</button></a>
											 </div>
											 </center>
										</div>
                           
							</div>
							
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
	</div>
</div>