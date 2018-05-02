<?php
    $username = $this->session->userdata('username');
    $password = $this->session->userdata('password');
    $privilege = $this->session->userdata('privilege');

    if (empty($username) && empty($password)) {
        echo "Silakan Login Untuk Mengakses Halaman Ini";
    } else if ($privilege!='Orang Tua') {
        echo 'Halaman ini untuk orang tua';
    } else {
        ?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
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
                                        Unggah Kelengkapan
                                    </li>
                                </ol>
                            </div>
                        </div>
                        
                        
                        <?php echo $this->session->flashdata('pesan');?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>{toolbar}</b></h4>
                                    <p class="text-muted m-b-15 font-13">
                                        Untuk mengikuti proses Pendaftaran Ulang. Silakan unggah atau upload berkas - berkas berikut.
                                    </p>
                                    <div class="row">
                                        <?php
                                            echo form_open_multipart('Daftar_Ulang_C/upload_berkas');
                                        ?>
                                            <div class="col-md-6">
                                                <div class="p-20">
                                                    <div class="form-group">
                                                        <label class="control-label">Akta Kelahiran</label>
                                                        <input type="file" name="akta" id="akta" class="filestyle" data-buttonname="btn-default">
                                                    </div>
                                                    <div class="form-group m-b-0">
                                                        <label class="control-label">KTP</label>
                                                        <input type="file" class="filestyle" name="ktp" id="ktp" data-buttonname="btn-default">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="p-20">
                                                    <div class="form-group">
                                                        <label class="control-label">Kartu Keluarga</label>
                                                        <input type="file" class="filestyle" name="kk" id="kk" data-buttonname="btn-default">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Surat Keterangan</label>
                                                        <input type="file" name="sk" id="sk" class="filestyle" data-buttonname="btn-default">
                                                    </div>
                                                    <div class="form-group m-b-0" style="float: right;">
                                                        <button class="btn btn-default waves-effect waves-light">Upload</button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                            echo form_close();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- container --> 
                </div> <!-- content -->
        <?php
    }
?>