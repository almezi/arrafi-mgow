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
                                        <a href="#">Daftar Ulang</a>
                                    </li>
                                    <li>
                                        <a href="#">Kelengkapan</a>
                                    </li>
                                    <li class="active">
                                        Lihat Dokumen
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
                                                        
                                    <table id="demo-foo-filtering" data-toggle="table" class="table table-striped toggle-circle m-b-0" data-page-size="7">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No Pendaftaran</th>
                                                <th>Akta Kelahiran</th>
                                                <th>KTP</th>
                                                <th>KK</th>
                                                <th>SK</th>
                                                <th>Status</th>
                                                <th><center>Aksi</center></th>
                                            </tr>
                                        </thead>
                                        <div class="form-inline m-b-20">
                                            <div class="row">
                                                <div class="col-sm-6 text-xs-center">
                                                    <div class="form-group">
                                                        <label class="control-label m-r-5">Status</label>
                                                        <select id="demo-foo-filter-status" class="form-control input-sm">
                                                            <option value="">Lihat Semua</option>
                                                            <option value="sudah">Sudah</option>
                                                            <option value="belum">Belum</option>
                                                        </select>
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

                                                foreach ($data_dokumen as $key => $value) {
                                                    ?>
                                                <tr>
                                                    <td><?php echo $no++;?></td>
                                                    <td><?php echo $value->no_pendaftaran;?></td>
                                                    <td>
                                                        <?php
                                                            if (!empty($value->nama_akta)) {
                                                                echo "Sudah";
                                                            } else {
                                                                echo "Belum";
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if (!empty($value->nama_ktp)) {
                                                                echo "Sudah";
                                                            } else {
                                                                echo "Belum";
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if (!empty($value->nama_kk)) {
                                                                echo "Sudah";
                                                            } else {
                                                                echo "Belum";
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if (!empty($value->nama_sk)) {
                                                                echo "Sudah";
                                                            } else {
                                                                echo "Belum";
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $status = $value->status;
                                                            if ($status=='Sudah') {
                                                                ?><span class="label label-table label-success">Sudah</span><?php
                                                            } else {
                                                                ?><span class="label label-table label-danger">Belum</span><?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <?php
                                                                if ($status=='Belum') {
                                                                    $data = array(
                                                                        'title' => 'Konfirmasi'
                                                                    );

                                                                    echo anchor('Daftar_Ulang_C/konfirmasi_kelengkapan_daftar_ulang/'.$value->no_pendaftaran,'<i style="color:#34d3eb;" class="fa fa-check fa-2x fa-fw"></i><span></span>',$data);
                                                                }

                                                                if ($status=='Belum') {
                                                                    $data = array(
                                                                        'title' => 'Informasikan'
                                                                    );

                                                                    echo anchor('Daftar_Ulang_C/informasikan_kelengkapan_daftar_ulang/'.$value->no_hp,'<i style="color:#ffbd4a;" class="fa fa-info fa-2x fa-fw"></i><span></span>',$data);
                                                                }
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
            <?php
        } else {
            echo "Maaf. Anda Tidak Dapat Mengakses Halaman Ini";
        }
    }
?>