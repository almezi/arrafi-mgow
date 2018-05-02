<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">

	<!-- Start content -->
    <div class="content">
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Info Nilai Siswa</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Daftar Siswa
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <center>
							
							<?php foreach($list->result() as $row){ ?>
                                 <div style="margin:auto; float:left; border-radius: 50px; width:150px; display:inline;">
                                    <a href="<?php echo base_url()?>index.php/orang_tua/info_pilih_mapel?nis=<?php echo $row->nis; ?>&nama=<?php echo $row->nama; ?>&kelas=<?php echo $row->nama_kelas; ?>"><img src='<?php echo base_url();?>logo/
									<?php if($row->jk=='L'){
									echo "cowo2.png";
									}
									else {
									echo "cewe.png";
									}?>'
									 style="border-radius: 60px; height: 100px; width:100px;"/><p><?php echo $row->nama; ?></p></a>
								 </div>										
							<?php } ?>
                         
							</center>
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
        
            <!-- /.row -->
       </div>
	</div>
</div>