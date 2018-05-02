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
            <h3>Data Presensi</h3>
        </div>
        <div class="panel-body">
            <div class="row">
          
                <div class="col-lg-12">
                
                <div class="panel panel-default">
                    <div class="panel-heading" >
                        History Presensi
                    </div>

                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>

                                  
                    <tr>
                        <th>No.</th>
                        <th>tanggal</th>
                        <th>Status Presensi</th>
                        <th>Alasan</th>
                    </tr>  
                    <tbody>                               
                                 <?php
                                        $no=1;
                                        foreach($list_mhsw->result()as $row) { 
                                ?> 
            
            
                    <tr>
                        <td> <?php echo $no; ?></td>   
                        <td> <?php echo $row->tgl_absen; ?></td>
                        
                        <td>
                            <label class="radio-inline">
                            <input type="checkbox" name="status" value="Membaca" disabled <?php if($row->status_presensi=='hadir'){echo "checked";} ?>/>Hadir</label>
                            <label class="radio-inline">
                            <input type="checkbox" name="status" value="Membaca" disabled <?php if($row->status_presensi=='sakit'){echo "checked";} ?>/>Sakit</label>
                            <label class="radio-inline">
                            <input type="checkbox" name="status" value="Membaca" disabled <?php if($row->status_presensi=='izin'){echo "checked";} ?>/>Izin</label>
                        </td>
                        <td> <?php echo $row->alasan; ?></td>
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