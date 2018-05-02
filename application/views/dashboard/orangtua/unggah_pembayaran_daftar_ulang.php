<?php
    $username = $this->session->userdata('username');
    $password = $this->session->userdata('password');
    $privilege = $this->session->userdata('privilege');

    if (empty($username) && empty($password)) {
        echo "Silakan Login Untuk Mengakses Halaman Ini";
    } else {
        $privilege = $this->session->userdata('privilege');

        if ($privilege=='Orang Tua' || $privilege=='Tata Usaha Bagian Keuangan') {
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
                                        <a href="#">Pembayaran</a>
                                    </li>
                                    <li class="active">
                                        Unggah Pembayaran
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
                                        &nbsp;
                                    </p>
                                    <div class="row">
                                        <?php
                                            $attributes = array(
                                                'method' => 'post',
                                                'role' => 'form',
                                                'data-parsley-validate novalidate' => true,
                                                'id'=>'bayar-ppdb'
                                            );

                                            echo form_open_multipart('Daftar_Ulang_C/unggah_bukti_bayar',$attributes);
                                        ?>
                                            <div class="col-md-6">
                                                <div class="p-5">
                                                    <div class="form-group m-t-20">
                                                        <h5><label>No Pendaftaran</label></h5>
                                                        <input type="text" name="no_pendaftaran" value="" class="form-control" maxlength="20" id="length" required data-parsley-type="integer" placeholder="No Pendaftaran">
                                                    </div>
                                                </div>

                                                <div class="p-5">
                                                    <div class="form-group m-t-20">
                                                        <h5><label>Jumlah Bayar</label></h5>
                                                        <input type="text" name="jumlah_bayar" value="" class="form-control" maxlength="12" id="length" placeholder="Jumlah Bayar" data-parsley-min='0' data-parsley-type="integer" required>
                                                    </div>
                                                </div>

                                                <div class="p-5">
                                                    <div class="form-group m-t-0">
                                                        <?php
                                                            $attributes = array(
                                                                'class' => 'filestyle',
                                                                'data-buttonname' => 'btn-primary',
                                                                'name' => 'bukti_bayar',
                                                                'id' => 'bukti_bayar',
                                                                'type' => 'file',
                                                                'data-parsley-fileextension' => 'png',
                                                                'required' => true
                                                            );

                                                            echo form_input($attributes);
                                                        ?>
                                                    </div>
                                                </div>

                                                <div class="p-5">
                                                    <div class="form-group m-b-0">
                                                        <button class="btn btn-primary waves-effect waves-light">Upload</button>
                                                    </div>
                                                </div>
                                            </div>    
                                        <?php echo form_close();?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        } else {
            echo "Maaf, Halaman ini khusus orang tua!";
        }
    }
?>