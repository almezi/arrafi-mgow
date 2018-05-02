<?php defined('BASEPATH') OR exit('No direct script access allowed');
    $username = $this->session->userdata('username');
    $password = $this->session->userdata('password');
    if (empty($username) && empty($password)) {
        echo "Silakan login terlebih dahulu";
    } else {
        $privilege = $this->session->userdata('privilege');

        if ($privilege=='Panitia') {
            ?>

            <!-- ============================================================== -->
            <!-- ======================= Lihat Nilai OPS======================= -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">{page}</h4>
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="#">Buku Tamu</a>
                                    </li>
                                    <li>
                                        <a href="#">View Data</a>
                                    </li>
                                    <li class="active">
                                        Lihat Buku Tamu
                                    </li>
                                </ol>
                            </div>
                        </div>

                            
                        <!--Custom Toolbar-->
                        <!--===================================================-->
                        <?php echo $this->session->flashdata('pesan');?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>{toolbar}</b></h4>
                                    <p class="text-muted m-b-30 font-13">
                                        &nbsp;
                                    </p>
                                                        
                                    <table id="demo-foo-filtering" data-toggle="table" class="table table-striped toggle-circle m-b-0" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No. ID</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>No HP</th>
                                                <th>Email</th>
                                                <th>Asal</th>
                                                <th><center>Aksi</center></th>
                                            </tr>
                                        </thead>
                                        <div class="form-inline m-b-20">
                                            <div class="row">
                                                <div class="col-sm-6 text-xs-center">
                                                    <div class="form-group">
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 text-xs-center text-right">
                                                    <div class="form-group">
                                                        <input id="demo-foo-search" type="text" placeholder="Search" class="form-control input-sm" autocomplete="on">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <tbody>
                                            <?php
                                                $no = 1;

                                                foreach ($data_buku_tamu as $key => $value) {
                                                    ?>
                                                <tr>
                                                    <td><?php echo $no++;?></td>
                                                    <td><?php echo $value->id_buku_tamu;?></td>
                                                    <td><?php echo $value->nama;?></td>
                                                    <td><?php echo $value->alamat;?></td>
                                                    <td><?php echo $value->no_hp;?></td>
                                                    <td><?php echo $value->email;?></td>
                                                    <td><?php echo $value->asal;?></td>
                                                    <td>
                                                        <center>
                                                            <a title="Edit Buku Tamu" href="#"
                                                                data-id="<?php echo $value->id_buku_tamu;?>"
                                                                data-nama="<?php echo $value->nama;?>"
                                                                data-alamat="<?php echo $value->alamat;?>"
                                                                data-no-hp="<?php echo $value->no_hp;?>"
                                                                data-email="<?php echo $value->email;?>"
                                                                data-asal="<?php echo $value->asal;?>"
                                                                data-toggle="modal"
                                                                data-target="#edit_buku_tamu"
                                                                class="on-default edit-row"
                                                                >
                                                                <i style="color: #29b6f6;" class="fa fa-pencil fa-2x fa-fw"></i>
                                                                <span></span>
                                                            </a>
                                                        
                                                            <?php
                                                                $attributes = array(
                                                                    'title' => 'Hapus Buku Tamu',
                                                                    'class' => 'on-default remove-row',
                                                                    'data-animation' => 'fadein',
                                                                    'data-plugin' => 'custommodal',
                                                                    'data-overlaySpeed' => 200,
                                                                    'data-overlayColor' => '#36404a',
                                                                    'data-confirm' => 'Apakah Anda ingin menghapus data ini?'
                                                                );

                                                                echo anchor('Welcome_C/hapus_buku_tamu/'.$value->id_buku_tamu,' <i style="color:#f05050" class="fa fa-trash-o fa-2x fa-fw"></i> <span></span> ', $attributes);
                                                            ?>
                                                        </center>
                                                    </td>
                                                </tr>
                                                    <?php
                                                }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="8">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-split m-t-30 m-b-0"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- ============================================================== -->
                <!-- Ubah Jadwal PPDB -->
                <!-- ============================================================== -->

                <div id="edit_buku_tamu" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog"> 
                        <div class="modal-content">
                            <?php
                                $attributes = array(
                                    'method' => 'post',
                                    'role' => 'form'
                                );

                                echo form_open('Welcome/ubah_buku_tamu',$attributes);
                            ?>
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Edit Buku Tamu</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">ID Buku Tamu</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'id_buku_tamu',
                                                            'id' => 'id_buku_tamu',
                                                            'readonly' => TRUE
                                                        );

                                                        echo form_input($attributes);
                                                    ?>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Nama</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'nama',
                                                            'id' => 'nama'
                                                        );

                                                        echo form_input($attributes);
                                                    ?>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Alamat</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'rows' => '5',
                                                            'name' => 'alamat',
                                                            'id' => 'alamat'
                                                        );

                                                        echo form_textarea($attributes);
                                                    ?>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">No HP</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'no_hp',
                                                            'id' => 'no_hp'
                                                        );

                                                        echo form_input($attributes);
                                                    ?>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Email</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'email',
                                                            'id' => 'email'
                                                        );

                                                        echo form_input($attributes);
                                                    ?>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Asal</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'asal',
                                                            'id' => 'asal'
                                                        );

                                                        echo form_input($attributes);
                                                    ?>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-default waves-effect waves-light">Simpan</button>
                            </div>
                            <?php
                                echo form_close();
                            ?>
                        </div>
                    </div>
                </div>
            <?php
        } else {
            echo "Maaf. Anda Tidak Dapat Mengakses Halaman Ini";
        }
    }
?>