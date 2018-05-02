
<div class="row">
                    <div class="col-lg-12">

                        <h2>Bordered Table</h2>
                        
                   
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                
                                    <tr>
                        <th>NO</th>
                        <th>Tgl_kunjungan</th>
                        <th>Jam_kunjungan</th>
                        <th>Nama</th>
                        <th>Institusi</th>
                         <th>Agenda</th>
                         
                    </tr>   
            <?php
                $no=1;
                foreach($list_mhsw->result() as $row) { 
            ?>
            
                    <tr>   
                        <td> <?php echo $no ?></td>
                        <td> <?php echo $row->tgl_kunjungan; ?> </td>
                        <td> <?php echo $row->jam_kunjungan; ?></td>
                        <td> <?php echo $row->nama; ?></td>
                        <td> <?php echo $row->institusi; ?></td>
                        <td> <?php echo $row->agenda; ?></td>
                    </tr>
                    
                <?php   
                    $no++;
                }
                ?>
                                
                                
                                
                            </table>
                        </div>
                    </div>
        </div>