<script type="text/javascript" >
	function checkfile(sender) {
    var validExts = new Array(".csv");
    var fileExt = sender.value;
    fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
    if (validExts.indexOf(fileExt) < 0) {
      alert("harap memasukan file dengan tipe " +
               validExts.toString());
		$(sender).val("");
      return false;
    }
    else return true;
	}

	function autotab(original,destination){
		if (original.getAttribute&&original.value.length==original.getAttribute("maxlength"))
			destination.focus()
	}

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
                    <h1 class="page-header">Input Nilai Siswa</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
			<?php
			
			$idbab='';
			$namabab='';
			foreach($list->result() as $row){
				
			}

			//print_r($list);
			
			?>
                <div >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Pelajaran <?php echo $_GET['namamapel']; ?>, Semester <?php echo $_GET['semester']; ?>,  Kelas <?php echo $_GET['kelas']; ?>, <b>Evaluasi Bab <?php echo $namabab; ?></b>
						   <a style="float:right;" href="<?php echo base_url()?>index.php/guru/guru_input_pilihbab?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&semester=<?php echo $_GET['semester']; ?>&tipe=<?php echo $_GET['tipe']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>"> <button type="button" class="btn btn-success">Menu Tipe</button></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							
						
						<form class="form-horizontal" role="form" method="post" action="<?php echo base_url()?>guru/simpan_nilai_siswa?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&idbab=<?php echo $idbab; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&semester=<?php echo $_GET['semester']; ?>&tipe=<?php echo $_GET['tipe']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>">
						
						<?php for($i= 0; $i <= 5; $i++){?>
						<div class="row">
								<div class="col-md-2" >
										<div class="form-group" align="center">
															
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 225,
                                                            'name' => 'nis[]',
                                                            'id' => 'nis',
                                                            'placeholder' => 'NIS'
                                                        ); 
														echo form_input($attributes);
                                                    ?>			
										</div>
										
											
								</div>
							&nbsp;&nbsp;
								
								
								<div class="col-md-2" >
								
										<div class="form-group" align="center">
															
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 225,
                                                            'name' => 'nilai_eval[]',
                                                            'id' => 'nilai_eval',
                                                            'placeholder' => 'Nilai Evaluasi'
                                                        ); 
														echo form_input($attributes);
                                                    ?>			
										</div>
										
											
								</div>
						<?php if($i==0){?>
							<a id="plus_nama_modul" class="btn btn-default waves-effect waves-light"><i class="icon-plus3"></i></a>	
						<?php }?>		
						
							</div>
						

						<?php } ?>
						<div class="modul-kontainer"></div>
					<button type="submit" class="btn btn-primary waves-effect waves-light" name="simpan">
										Simpan
									</button>
						</form>
					
				</div>
			</div>
                            
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->

                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->

            <!-- /.row -->
		</div>
	</div>
</div>

<script>
	var clicks = 0;
	$("a#plus_nama_modul").live('click', function(){
	if(clicks < 5){
		$(".modul-kontainer").append('<div class="row"><div class="col-md-2"><div class="form-group"><input type="text" name="nis[]" value="" class="form-control" maxlength="225" id="nis" placeholder="NIS"/></div></div><div class="col-md-2"><div class="form-group"><input type="text" name="nilai_eval[]" value="" class="form-control" maxlength="225" id="nama_eval" placeholder="Nama Evaluasi" required="1"/></div></div><a id="min_nama_modul" class="btn btn-default waves-effect waves-light"><i class="icon-minus2"></i></a></div>');
		clicks++;
	}
	});
	$("a#min_nama_modul").live('click', function(){
		$(this).parent().remove();
		clicks--;
	});
</script>
