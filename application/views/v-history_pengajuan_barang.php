<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">

	<!-- Start content -->
    <div class="content">
		<div class="container">

<div class="col-lg-12">
    <div class="panel panel-default">
       
        <div class="panel-body">
            <div class="row">
          
                <div class="col-lg-12">
               
                <div class="panel panel-default">
                    <div class="panel-heading" >
                        Data Pengajuan Barang
                    </div>

                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>

                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Id pengajuan</th>
                        <th>Id detail</th>
                        <th>Tgl Pengajuan</th>
                        <th>Nama Barang</th>
                        <th>Merk Barang</th>
                        <th>Jumlah Permintaan</th>
                        <th>Status</th>
                       
                      
                    </tr>  
                </thead> 
                    <tbody>                               
                        <?php
                           $no=1;
                            foreach($list->result()as $row) { 
                        ?> 
            
            
                    <tr>
                        <td><?php echo $no?></td>
                        <td><?php echo $row->NAMA?></td>
                        <td><?php echo $row->ID_PENGAJUAN?></td>
                        <td><?php echo $row->IDDETAIL?></td>
                        <td><?php echo $row->TGL_PENGAJUAN?></td>
                        <td><?php echo $row->NAMA_BARANG?></td>
                        <td><?php echo $row->MERK_BARANG?></td>
                        <td><?php echo $row->JUMLAH_PERMINTAAN?></td>
                         <td><?php echo $row->progress?></td>
                         
                        
                    </tr>     
                    
                                <?php   
                                    $no++;
                                }
                                ?>
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