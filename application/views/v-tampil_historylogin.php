<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>History Login Pengguna</h3>
        </div>
        <div class="panel-body">
            <div class="row">
          
                <div class="col-lg-12">
                
                <div class="panel panel-default">
                    <div class="panel-heading" >
                        Data Login Pengguna
                    </div>

                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>

                                  <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Login Terakhir</th>
                                    </tr>   
                                </thead> 
                                <tbody>                               
                                 <?php
                                        $no=1;
                                        foreach($list_mhsw->result()as $row) { 
                                ?>
            
                                    <tr> 
                                        <td> <?php echo $no ?></td>  
                                        <td> <?php echo $row->username; ?></td>
                                        <td> <?php echo $row->nama; ?></td>
                                        <td> <?php echo $row->status; ?></td>
                                        <td> <?php echo $row->login_terakhir; ?></td>
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