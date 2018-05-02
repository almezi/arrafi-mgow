<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">

	<!-- Start content -->
    <div class="content">
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Input Nilai Remedial</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Pilih Pelajaran
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <center>
							<div style="width: 300px; height: 150px;">  
								<?php foreach($list->result() as $row){ ?>
                                 <div style="margin:auto; float:left; border-radius: 50px; width:150px; display:inline;">
                                    <a href="<?php echo base_url()?>index.php/guru/guru_inputremed_pilihkelas?idmapel=<?php echo $row->idmapel; ?>&namamapel=<?php echo $row->nama; ?>&thnajar=<?php echo $row->thnajar; ?>"><img src=<?php echo base_url()?>logo/Buku.png style="border-radius: 60px; height: 100px; width:100px;"/><p><?php echo $row->nama; ?></p></a>
								 </div>										
								<?php } ?>
                            </div>
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