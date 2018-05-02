<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">

	<!-- Start content -->
    <div class="content">
		<div class="container">

<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Laporan Penilaian</h3>
        </div>
        <div class="panel-body">
            <div class="row">
          
                <div class="col-lg-12">
               
                <div class="panel panel-default">
                    <div class="panel-heading" >
                        Prestasi
                    </div>

                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>

                    <tr>
                        <th>NO</th>
                        <th>Periode</th>
                        <th>Absensi</th>
                        <th>Kegiatan</th>
                         <th>Keramahan</th>
                         <th>Total</th>
                    </tr>  
                </thead> 
                    <tbody>    
                        <?php 
                        $no=0;
                        foreach ($list->result() as $ls) { $no=$no+1;?>
                     <tr>
                        <td><?php echo $no?></td>
                        <td><?php echo $ls->periode?></td>
                        <td><?php echo $ls->absensi?></td>
                        <td><?php echo $ls->kegiatan?></td>
                         <td><?php echo $ls->keramahan?></td>
                         <td><?php echo $ls->rata?></td>
                    </tr>                         
                        
                        <?php } ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            </div> 
        </div>
    </div>
</div>
</div> <!-- container -->
</div> <!-- content -->
</div> <!-- content page -->