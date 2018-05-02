<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">

	<!-- Start content -->
    <div class="content">
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pemberitahuan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
               
				 <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Evaluasi 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						<center>
                           
     <?php foreach($eval->result() as $row){?>
	 <div class="alert alert-success">
	 <a href='<?php echo base_url(); ?>index.php/orang_tua/detail_notif_evaluasi?idbab=<?php echo $row->idbab; ?>&nis=<?php echo $row->nis; ?>&nama=<?php echo $row->nama; ?>&nilai=<?php echo $row->nilai; ?>&mapel=<?php echo $row->mapel; ?>&bab=<?php echo $row->bab; ?>&kkm=<?php echo $row->kkm; ?>&ideval=<?php echo $row->ideval; ?>&semester=<?php echo $row->semester; ?>&idkelas=<?php echo $row->idkelas ?>'>
                                
                                    
									<div>
                                    <span >
                                        
										<em>Nama: <?php echo $row->nama ?></em>
                                    	
                                    </span>
									</div>
									<div>Nilai Evaluasi <?php echo $row->mapel ?> Bab <?php echo $row->bab ?></div>
                               
                                
     </a>
	 </div>
	 <?php }
	 foreach($remedeval->result() as $row){
	?>
	 <div class="alert alert-info">
	 <a href='<?php echo base_url(); ?>index.php/orang_tua/detail_notif_remedevaluasi?nis=<?php echo $row->nis;?>&nama=<?php echo $row->nama;?>&nilai=<?php echo $row->nilai;?>&mapel=<?php echo $row->mapel;?>&bab=<?php echo $row->bab;?>&kkm=<?php echo $row->kkm;?>&ideval=<?php echo $row->ideval;?>&semester=<?php echo $row->semester;?>&idkelas=<?php echo $row->idkelas ?>'>
                                
                                   
									<div>
                                    <span >
                                   
										<em>Nama:<?php echo $row->nama ?></em>
                                    	<br>
									
                                    </span>
									</div>
									<div>Nilai Remedi Evaluasi <?php echo $row->mapel ?> Bab <?php echo $row->bab ?></div>
                               
                                
     </a>
	  </div>
	  <?php } ?> 
	  </center>
	  </div>
	  </div>
	  </div>
	 
	<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           PMP 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						<center>
	<?php 
	 foreach($pmp->result() as $row){
	 ?>
	 <div class="alert alert-warning">
	 <a href='<?php echo base_url(); ?>index.php/orang_tua/detail_notif_pmp?idmapel=<?php echo $row->idmapel; ?>&nis=<?php echo $row->nis; ?>&nama=<?php echo $row->nama; ?>&nilai=<?php echo $row->nilai; ?>&mapel=<?php echo $row->mapel; ?>&kkm=<?php echo $row->kkm; ?>&idpmp=<?php echo $row->idpmp; ?>&semester=<?php echo $row->semester; ?>&idkelas=<?php echo $row->idkelas ?>'>
                                
                                   
									<div >
                                    <span >
                                   
										<em>Nama:<?php echo $row->nama ?></em>
                                    	<br>
										
                                    </span>
									<div>Nilai PMP <?php echo $row->mapel ?> Semester:<?php echo $row->semester ?></div>
									</div>
									
                                
                                
     </a>
	 </div>
	 <?php }
	 foreach($remedpmp->result() as $row){
	 ?>
	 <div class="alert alert-danger">
	 <a href='<?php echo base_url()?>index.php/orang_tua/detail_notif_remedpmp?nis=<?php echo $row->nis ?>&nama=<?php echo $row->nama ?>&nilai=<?php echo $row->nilai ?>&mapel=<?php echo $row->mapel ?>&kkm=<?php echo $row->kkm ?>&idpmp=<?php echo $row->idpmp ?>&semester=<?php echo $row->semester ?>&idkelas=<?php echo $row->idkelas ?>'>
                                <div>
                                    
									<div>
                                    <span >
                                        <em>Nama: <?php echo $row->nama ?></em>
										<br>
										
                                    </span>
									</div>
									 <div>Nilai Remidi PMP <?php echo $row->mapel ?> Semester:<?php echo $row->semester ?></div>
                                </div>
                               
     </a>
	  </div>  
	
	<?php } ?>
                           
						</center>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
		</div>
	</div>
</div>