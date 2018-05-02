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
                        <th>Tanggal Tersedia</th>

                         <th>Aksi</th>
                       
                      
                    </tr>  
                </thead> 
                    <tbody>                               
                        <?php
                           $no=1;
                            foreach($list_progress->result()as $row) { 
                        ?> 
            
            
                 
                           <tr>
                          <?php  if($row->progress!=null && $row->barang_tersedia!=null  && $row->barang_diambil==null){ ?>
                        <td><?php echo $no?></td>
                        <td><?php echo $row->NAMA?></td>
                        <td><?php echo $row->ID_PENGAJUAN?></td>
                        <td><?php echo $row->IDDETAIL?></td>
                        <td><?php echo $row->TGL_PENGAJUAN?></td>
                        <td><?php echo $row->NAMA_BARANG?></td>
                        <td><?php echo $row->MERK_BARANG?></td>
                        <td><?php echo $row->JUMLAH_PERMINTAAN?></td>
                        <td><?php echo $row->TGL_TERSEDIA?></td>
                         <td><a class="btn btn-success" onclick="upd_pengambilan(<?php echo $row->iddetail; ?>)">Pengambilan</a></td>
                         <?php } ?>
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
                 <div class="panel panel-default">
                    <div class="panel-heading" >
                        Data Pengajuan Barang
                    </div>

                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="aa">
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
                       <th>Tanggal Pengambilan</th>
                    </tr>  
                </thead> 
                    <tbody>                               
                        <?php
                           $no=1;
                            foreach($list_progress->result()as $row) { 
                        ?> 
            
                           <tr>
                          <?php  if($row->progress!=null && $row->barang_tersedia!=null  && $row->barang_diambil!=null){ ?>
                        <td><?php echo $no?></td>
                        <td><?php echo $row->NAMA?></td>
                        <td><?php echo $row->ID_PENGAJUAN?></td>
                        <td><?php echo $row->IDDETAIL?></td>
                        <td><?php echo $row->TGL_PENGAJUAN?></td>
                        <td><?php echo $row->NAMA_BARANG?></td>
                        <td><?php echo $row->MERK_BARANG?></td>
                        <td><?php echo $row->JUMLAH_PERMINTAAN?></td>
                        <td><?php echo $row->TGL_DIAMBIL?></td>
                            <?php }?>
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

<script type="text/javascript">
$(document).ready(function(){

});


function upd_pengambilan(id){
    $.ajax({
        url:"http://localhost/arrafi/index.php/c_arAdmin/upd_pengambilan/"+id,
        success:function(data){
             location.reload();
        },
        error:function(data){
            alert('error');
        }
    });
}
</script>