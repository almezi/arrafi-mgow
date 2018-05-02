<?php defined('BASEPATH') OR exit('No direct script access allowed');
    $username = $this->session->userdata('username');
    $password = $this->session->userdata('password');
    if (empty($username) && empty($password)) {
        echo "Silakan login terlebih dahulu";
    } else {
        $privilege = $this->session->userdata('privilege');

        if ($privilege=='Tata Usaha Bagian Keuangan') {
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
                                        <a href="#">SPP Bulanan</a>
                                    </li>
                                    <li>
                                        <a href="#">Pembayaran</a>
                                    </li>
                                    <li class="active">
                                        Lihat Pembayaran
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
                                                <th>NIS</th>
                                                <th>Nama</th>
                                                <th>No Telp</th>
                                                <th>Kelas</th>
                                                <th><center>Aksi</center></th>
                                            </tr>
                                        </thead>
                                        <div class="form-inline m-b-20">
                                            <div class="row">
                                                <div class="col-sm-6 text-xs-center">
                                                    <div class="form-group">
                                                        <label class="control-label m-r-5">Kelas</label>
                                                        <select id="demo-foo-filter-status" class="form-control input-sm">
                                                            <option value="">Lihat Semua</option>
                                                            <option value="Satu">1</option>
                                                            <option value="Dua">2</option>
                                                            <option value="Tiga">3</option>
                                                            <option value="Empat">4</option>
                                                            <option value="Lima">5</option>
                                                            <option value="Enam">6</option>
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

                                                foreach ($data_siswa as $key => $value) {
                                                    ?>
                                                <tr>
                                                    <td><?php echo $no++;?></td>
                                                    <td><?php echo $value->nis;?></td>
                                                    <td><?php echo $value->nama_siswa;?></td>
                                                    <td><?php echo $value->no_telp;?></td>
                                                    <td>
                                                        <?php
                                                            $kelas = $value->kelas;
                                                            switch ($kelas) {
                                                                case '1':
                                                                    echo "Satu";
                                                                    break;
                                                                
                                                                case '2':
                                                                    echo "Dua";
                                                                    break;

                                                                case '3':
                                                                    echo "Tiga";
                                                                    break;

                                                                case '4':
                                                                    echo "Empat";
                                                                    break;

                                                                case '5':
                                                                    echo "Lima";
                                                                    break;

                                                                case '6':
                                                                    echo "Enam";
                                                                    break;
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <?php
                                                                $data = array(
                                                                    'title' => 'Informasikan'
                                                                );

                                                                echo anchor('SPP_Bulanan_C/informasikan_pelunasan/'.$value->no_telp,'<i style="color:#ffbd4a;" class="fa fa-info fa-2x fa-fw"></i><span></span>',$data);
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