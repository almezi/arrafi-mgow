<?php defined('BASEPATH') OR exit('No direct script access allowed');
	$username = $this->session->userdata('username');
	$password = $this->session->userdata('password');
	if (empty($username) && empty($password)) {
		echo "Silakan login terlebih dahulu";
	} else {
		$privilege = $this->session->userdata('privilege');

		if ($privilege=='Operator' || $privilege=="Orang Tua") {
			?>

<!-- ============================================================== -->
<!-- Lihat Nilai OPS -->
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
                                        <a href="#">NISN</a>
                                    </li>
                                    <li>
                                        <a href="#">Berkas</a>
                                    </li>
                                    <li class="active">
                                        NISN
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

                                    <?php
                                        $attributes = array(
                                            'id' => 'buat_jadwal_ppdb',
                                            'enabled' => TRUE,
                                            'class' => 'btn btn-default waves-effect waves-light'
                                        );

                                        if ($privilege=='Operator') {
                                            echo anchor('Nisn_C/print_all','Unduh Semua',$attributes);
                                        }
                                    ?>
                                    <table id="demo-foo-filtering"
                                    data-toggle="table"
                                    data-toolbar="#buat_jadwal_ppdb" class="table table-striped toggle-circle m-b-0" data-page-size="9">
                                        <thead>
                                            <tr>
                                                <th data-toggle="id">No</th>
                                                <th>Nama</th>
                                                <th>Peserta Didik</th>
                                                <th>Pribadi</th>
                                                <th>Ayah Kandung</th>
                                                <th>Ibu Kandung</th>
                                                <th>Wali</th>
                                                <th>Priodik</th>
                                                <th>Prestasi</th>
                                                <th>Aksi</th>
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
                                                foreach ($data_nisn as $key => $value) {
                                                    ?>
                                                <tr>
                                                    <td><?php echo $no++;?></td>
                                                    <td><?php echo $value->nama_lengkap;?></td>
                                                    <td>
                                                        <?php
                                                            if ($pd==false) {
                                                                echo '<span class="label label-success">Sudah</span>';
                                                            } else {
                                                                echo '<span class="label label-danger">Belum</span>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if ($dp==false) {
                                                                echo '<span class="label label-success">Sudah</span>';
                                                            } else {
                                                                echo '<span class="label label-danger">Belum</span>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if ($ayah==false) {
                                                                echo '<span class="label label-success">Sudah</span>';
                                                            } else {
                                                                echo '<span class="label label-danger">Belum</span>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if ($ibu==false) {
                                                                echo '<span class="label label-success">Sudah</span>';
                                                            } else {
                                                                echo '<span class="label label-danger">Belum</span>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if ($priodik==false) {
                                                                echo '<span class="label label-success">Sudah</span>';
                                                            } else {
                                                                echo '<span class="label label-danger">Belum</span>';
                                                            }
                                                        ?>
                                                    </td>                                                    
                                                    <td>
                                                        <?php
                                                            if ($beasiswa==false) {
                                                                echo '<span class="label label-success">Sudah</span>';
                                                            } else {
                                                                echo '<span class="label label-danger">Belum</span>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if ($prestasi==false) {
                                                                echo '<span class="label label-success">Sudah</span>';
                                                            } else {
                                                                echo '<span class="label label-danger">Belum</span>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a title="Lengkapi Data" href="#"
                                                            data-id="<?php echo $value->no_pendaftaran;?>"
                                                            data-toggle="modal"
                                                            data-target="#lengkapi_data"
                                                            class="on-default edit-row"
                                                        ><i style="color: #29b6f6;" class="fa fa-pencil fa-2x fa-fw"></i>
                                                     <span></span></a>
                                                        
                                                        <?php
                                                            $attributes = array(
                                                                'title' => 'Unduh Formulir',
                                                                'class' => 'on-default remove-row',
                                                                'data-animation' => 'fadein',
                                                                'data-plugin' => 'custommodal',
                                                                'data-overlaySpeed' => 200,
                                                                'data-overlayColor' => '#ffbd4a'
                                                            );

                                                            if ($privilege=='Operator') {
                                                                echo anchor('Nisn_C/print/'.$value->no_pendaftaran,' <i style="color:#ffbd4a" class="fa fa-download fa-2x fa-fw"></i> <span></span> ', $attributes);
                                                            }

                                                            $attributes = array(
                                                                'title' => 'Informasikan',
                                                                'class' => 'on-default remove-row',
                                                                'data-animation' => 'fadein',
                                                                'data-plugin' => 'custommodal',
                                                                'data-overlaySpeed' => 200,
                                                                'data-overlayColor' => '#5fbeaa'
                                                            );

                                                            if ($privilege=='Operator') {
                                                                echo anchor('Nisn_C/informasikan/'.$value->no_pendaftaran,' <i style="color:#5fbeaa" class="fa fa-info fa-2x fa-fw"></i> <span></span> ', $attributes);
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                                    <?php
                                                }
                                            ?>  
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="11">
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
                <!-- Lengkapi Data -->
                <!-- ============================================================== -->

                <div id="lengkapi_data" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content p-0">
                            <ul class="nav nav-tabs navtab-bg nav-justified">
                                <li class="active">
                                    <a href="#pd" data-toggle="tab" aria-expanded="false"> 
                                        <span class="visible-xs"><i class="fa fa-home"></i></span>
                                        <span class="hidden-xs">Peserta Didik</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#dp" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="fa fa-user"></i></span>
                                        <span class="hidden-xs">Data Pribadi</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#orang-tua" data-toggle="tab" aria-expanded="true">
                                        <span class="visible-xs"><i class="fa fa-envelope-o"></i></span>
                                        <span class="hidden-xs">Orang Tua</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#rincian-pd" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                        <span class="hidden-xs">Rincian</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="pd">
                                    <div>
                                        <div class="row">
                                            <form method="post" action="<?php echo base_url('Nisn_C/lengkapi_formulir_nisn_pd');?>" class="form-horizontal group-border-dashed" action="NISN_C/input_peserta_didik" data-parsley-validate novalidate>
                                                <input type="hidden" name="jenis_pendaftaran" id="jenis_pendaftaran" value="Siswa Baru">
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="paud">Apakah Pernah Paud</label>
                                                    <div class="col-sm-8">
                                                        <div class="radio radio-info radio-inline">
                                                            <input type="radio" id="inlineRadio1" value="Ya" name="paud" checked data-parsley-multiple="groups" data-parsley-mincheck="1">
                                                            <label for="inlineRadio1"> Ya </label>
                                                        </div>
                                                        <div class="radio radio-inline">
                                                            <input type="radio" id="inlineRadio2" value="Tidak" name="paud" data-parsley-multiple="groups" data-parsley-mincheck="1">
                                                            <label for="inlineRadio2"> Tidak </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="paud">Apakah Pernah TK</label>
                                                    <div class="col-sm-8">
                                                        <div class="radio radio-info radio-inline">
                                                            <input type="radio" id="inlineRadio1" value="Ya" name="tk" checked data-parsley-multiple="groups" data-parsley-mincheck="1">
                                                            <label for="inlineRadio1"> Ya </label>
                                                        </div>
                                                        <div class="radio radio-inline">
                                                            <input type="radio" id="inlineRadio2" value="Tidak" name="tk" data-parsley-multiple="groups" data-parsley-mincheck="1">
                                                            <label for="inlineRadio2"> Tidak </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">No. Seri SKHUN Sebelumnya</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" required name="no_skhun" placeholder="16 Digit yang tertera di SKHUN SD" data-parsley-maxlength="16"/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Hobi</label>
                                                    <div class="col-sm-8">
                                                        <select class="selectpicker show-tick bs-select-hidden" data-style="btn-white" name="hobi">
                                                            <option value="Olah Raga">Olah Raga</option>
                                                            <option value="Kesenian">Kesenian</option>
                                                            <option value="Membaca">Membaca</option>
                                                            <option value="Menulis">Menulis</option>
                                                            <option value="Traveling">Traveling</option>
                                                            <option value="Lainnya">Lainnya</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Cita - Cita</label>
                                                    <div class="col-sm-8">
                                                        <select class="selectpicker show-tick bs-select-hidden" data-style="btn-white" name="cita_cita">
                                                            <option value="PNS">PNS</option>
                                                            <option value="TNI/POLRI">TNI/POLRI</option>
                                                            <option value="Guru/Dosen">Guru/Dosen</option>
                                                            <option value="Dokter">Dokter</option>
                                                            <option value="Politikus">Politikus</option>
                                                            <option value="Wiraswasta">Wiraswasta</option>
                                                            <option value="Seni/Lukis/Artis/Sejenis">Seni/Lukis/Artis/Sejenis</option>
                                                            <option value="Lainnya">Lainnya</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group text-right m-b-0">
                                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Submit</button>
                                                </div>      
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="dp">
                                    <div class="row">
                                        <form data-parsley-validate novalidate>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Berkebutuhan Khusus</label>
                                                <div class="col-sm-8">
                                                    <select class="selectpicker show-tick bs-select-hidden" data-style="btn-white" name="berkebutuhan_khusus">
                                                        <option value="Tidak">Tidak</option>
                                                        <option value="Netra">Netra</option>
                                                        <option value="Rungu">Rungu</option>
                                                        <option value="Grahita Ringan">Grahita Ringan</option>
                                                        <option value="Grahita Sedang">Grahita Sedang</option>
                                                        <option value="Daksa Ringan">Daksa Ringan</option>
                                                        <option value="Daksa Sedang">Daksa Sedang</option>
                                                        <option value="Laras">Laras</option>
                                                        <option value="Wicara">Wicara</option>
                                                        <option value="Tuna Ganda">Tuna Ganda</option>
                                                        <option value="Hiper Aktif">Hiper Aktif</option>
                                                        <option value="Cerdas Istimewa">Cerdas Istimewa</option>
                                                        <option value="Bakat Istimewa">Bakat Istimewa</option>
                                                        <option value="Kesulitan Bekerja">Kesulitan Bekerja</option>
                                                        <option value="Narkoba">Narkoba</option>
                                                        <option value="Indigo">Indigo</option>
                                                        <option value="Down Sindrom">Down Sindrom</option>
                                                        <option value="Autis">Autis</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Nama Dusun</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" required name="nama_dusun" placeholder="Nama Dusun" data-parsley-type="alphanum"/>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Moda Transportasi</label>
                                                <div class="col-sm-8">
                                                    <select class="selectpicker show-tick bs-select-hidden" data-style="btn-white" name="moda_transportasi">
                                                        <option value="Jalan Kaki">Jalan Kaki</option>
                                                        <option value="Kendaraan Pribadi">Kendaraan Pribadi</option>
                                                        <option value="Kendaraan Umum/Angkot/Petepete">Kendaraan Umum/Angkot/Petepete</option>
                                                        <option value="Jemputan Sekolah">Jemputan Sekolah</option>
                                                        <option value="Kereta Api">Kereta Api</option>
                                                        <option value="Ojek">Ojek</option>
                                                        <option value="Andong/Bendi/Sado/Dokar/Delman/Becak">Andong/Bendi/Sado/Dokar/Delman/Becak</option>
                                                        <option value="Perahu Penyebrangan/Rakit/Getek">Perahu Penyebrangan/Rakit/Getek</option>
                                                        <option value="Lainnya">Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label" for="paud">Penerima KPS/PKH/KIP</label>
                                                <div class="col-sm-8">
                                                    <div class="radio radio-info radio-inline">
                                                        <input type="radio" id="inlineRadio1" value="Ya" name="kps_pkh_kip" checked data-parsley-multiple="groups" data-parsley-mincheck="1">
                                                        <label for="inlineRadio1"> Ya </label>
                                                    </div>
                                                    <div class="radio radio-inline">
                                                        <input type="radio" id="inlineRadio2" value="Tidak" name="kps_pkh_kip" data-parsley-multiple="groups" data-parsley-mincheck="1">
                                                        <label for="inlineRadio2"> Tidak </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">No. KPS/PKH/KIP</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" required name="no_kps_pkh_kip" placeholder="No. KPS/PKH/KIP" data-parsley-type="alphanum"/>
                                                </div>
                                            </div>
                                            <br><br>

                                            <div class="form-group text-right m-b-0 m-t-5">
                                                <button class="btn btn-primary waves-effect waves-light" type="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="orang-tua">
                                    <div>
                                        <div class="row">
                                            <form class="form-horizontal group-border-dashed" action="NISN_C/input_peserta_didik" data-parsley-validate novalidate>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Tahun Lahir Ayah</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" required name="tahun_lahir_ayah" data-parsley-type="integer" placeholder="Tahun Lahir Ayah" data-parsley-maxlength="4"/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Penghasilan Ayah</label>
                                                    <div class="col-sm-8">
                                                        <select class="selectpicker show-tick bs-select-hidden" data-style="btn-white" name="penghasilan_ayah">
                                                            <option value="Kurang Dari 500000">Kurang Dari Rp. 500.000,00</option>
                                                            <option value="500.000-999.999">Rp. 500.000,00 - Rp. 999.999,00</option>
                                                            <option value="1 Juta - 1.999.999">Rp. 1.000.000,00 - Rp. 1.999.999,00</option>
                                                            <option value="2 Juta - 4.999.999">Rp. 2.000.000,00 - Rp. 4.999.999,00</option>
                                                            <option value="5 Juta - 20 Juta">Rp. 5.000.000,00 - Rp. 20.000.000,00</option>
                                                            <option value="Lebih Dari 20 Juta">Lebih Dari Rp. 20.000.000,00</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Berkebutuhan Khusus Ayah</label>
                                                    <div class="col-sm-8">
                                                        <select class="selectpicker show-tick bs-select-hidden" data-style="btn-white" name="berkebutuhan_khusus_ayah">
                                                            <option value="Tidak">Tidak</option>
                                                            <option value="Netra">Netra</option>
                                                            <option value="Rungu">Rungu</option>
                                                            <option value="Grahita Ringan">Grahita Ringan</option>
                                                            <option value="Grahita Sedang">Grahita Sedang</option>
                                                            <option value="Daksa Ringan">Daksa Ringan</option>
                                                            <option value="Daksa Sedang">Daksa Sedang</option>
                                                            <option value="Laras">Laras</option>
                                                            <option value="Wicara">Wicara</option>
                                                            <option value="Tuna Ganda">Tuna Ganda</option>
                                                            <option value="Hiper Aktif">Hiper Aktif</option>
                                                            <option value="Cerdas Istimewa">Cerdas Istimewa</option>
                                                            <option value="Bakat Istimewa">Bakat Istimewa</option>
                                                            <option value="Kesulitan Bekerja">Kesulitan Bekerja</option>
                                                            <option value="Narkoba">Narkoba</option>
                                                            <option value="Indigo">Indigo</option>
                                                            <option value="Down Sindrom">Down Sindrom</option>
                                                            <option value="Autis">Autis</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Tahun Lahir Ibu</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" required name="tahun_lahir_ibu" data-parsley-type="integer" placeholder="Tahun Lahir Ayah" data-parsley-maxlength="4"/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Penghasilan Ibu</label>
                                                    <div class="col-sm-8">
                                                        <select class="selectpicker show-tick bs-select-hidden" data-style="btn-white" name="penghasilan_ibu">
                                                            <option value="Kurang Dari 500000">Kurang Dari Rp. 500.000,00</option>
                                                            <option value="500.000-999.999">Rp. 500.000,00 - Rp. 999.999,00</option>
                                                            <option value="1 Juta - 1.999.999">Rp. 1.000.000,00 - Rp. 1.999.999,00</option>
                                                            <option value="2 Juta - 4.999.999">Rp. 2.000.000,00 - Rp. 4.999.999,00</option>
                                                            <option value="5 Juta - 20 Juta">Rp. 5.000.000,00 - Rp. 20.000.000,00</option>
                                                            <option value="Lebih Dari 20 Juta">Lebih Dari Rp. 20.000.000,00</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Berkebutuhan Khusus Ibu</label>
                                                    <div class="col-sm-8">
                                                        <select class="selectpicker show-tick bs-select-hidden" data-style="btn-white" name="berkebutuhan_khusus_ibu">
                                                            <option value="Tidak">Tidak</option>
                                                            <option value="Netra">Netra</option>
                                                            <option value="Rungu">Rungu</option>
                                                            <option value="Grahita Ringan">Grahita Ringan</option>
                                                            <option value="Grahita Sedang">Grahita Sedang</option>
                                                            <option value="Daksa Ringan">Daksa Ringan</option>
                                                            <option value="Daksa Sedang">Daksa Sedang</option>
                                                            <option value="Laras">Laras</option>
                                                            <option value="Wicara">Wicara</option>
                                                            <option value="Tuna Ganda">Tuna Ganda</option>
                                                            <option value="Hiper Aktif">Hiper Aktif</option>
                                                            <option value="Cerdas Istimewa">Cerdas Istimewa</option>
                                                            <option value="Bakat Istimewa">Bakat Istimewa</option>
                                                            <option value="Kesulitan Bekerja">Kesulitan Bekerja</option>
                                                            <option value="Narkoba">Narkoba</option>
                                                            <option value="Indigo">Indigo</option>
                                                            <option value="Down Sindrom">Down Sindrom</option>
                                                            <option value="Autis">Autis</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <p class="text-muted">Diisi Jika Tinggal Bersama Wali</p>

                                                <div class="form-group text-right m-b-0">
                                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Submit</button>
                                                </div>      
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="rincian-pd">
                                    <p>Luckily friends do ashamed to do suppose. Tried meant mr smile so. Exquisite behaviour as to middleton perfectly. Chicken no wishing waiting am. Say concerns dwelling graceful six humoured. Whether mr up savings talking an. Active mutual nor father mother exeter change six did all.
                                    </p>
                                    <p>Carriage quitting securing be appetite it declared. High eyes kept so busy feel call in. Would day nor ask walls known. But preserved advantage are but and certainty earnestly enjoyment. Passage weather as up am exposed. And natural related man subject. Eagerness get situation his was delighted.
                                    </p>
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