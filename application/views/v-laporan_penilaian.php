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
        <form role="form" method="post" action="#" enctype="multipart/form-data" >  
                    <div class="panel-body">
                                <label>Periode</label>
                                <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                <th><div class="form-group">    
                                <select style="width:200px" class="form-control" name="tugas" id="bln" onchange="searchPeriode()" required="true">
                                <option value="0">- Please Select -</option>
                                     <?php foreach ($pega->result() as $rw) {?>
                                        <option value="<?php echo $rw->periode;?>">
                                            <?php echo $rw->periode?>
                                        </option>
                                    <?php }?>
                                   
                                </select>
                                </div>
                                </th>
                            </div>      
                        </form>
        <div class="panel-body">

            <div class="row">
          
                <div class="col-lg-12">
               
                <div class="panel panel-default">
                    

                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>

                    <tr>
                        <th>NO</th>
                        <th>Id Pegawai</th>
                        <th>Nama</th>
                        <th>Bagian</th>
                        <th>Periode</th>
                        <th>Absensi</th>
                        <th>Kegiatan</th>
                         <th>Keramahan</th>
                         <th>Total</th>
                    </tr>  
                </thead> 
                    <tbody id="tbl-per">    
                        <?php 
                        $no=0;
                        foreach ($list->result() as $ls) { $no=$no+1;?>
                     <tr>
                        <td><?php echo $no?></td>
                        <td><?php echo $ls->id_pegawai?></td>
                        <td><?php echo $ls->nama?></td>
                        <td><?php echo $ls->bagian?></td>
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

<script>
function searchPeriode(){
    var ab = $('#bln').val();
   $.ajax({
        url: "http://localhost/arrafi/index.php/c_arAdmin/filterPeriodePenilaian/"+ab,
        success:function(data){
            $('#tbl-per').html(data);
        },
        error:function(data){
            alert('Error');
        }
   }); 
}
</script>