<?php defined('BASEPATH') OR exit('No direct script access allowed');
	$username = $this->session->userdata('username');
	$password = $this->session->userdata('password');
	if (empty($username) && empty($password)) {
		echo "Silakan login terlebih dahulu";
	} else {
		$privilege = $this->session->userdata('privilege');

		if ($privilege=='Orang Tua') {
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
                                        <a href="#">Alumni</a>
                                    </li>
                                    <li>
                                        <a href="#">Pendataan Alumni</a>
                                    </li>
                                    <li class="active">
                                        Input Data Alumni
                                    </li>
                                </ol>
                            </div>
                        </div>

                        <?php
                            echo $this->session->flashdata('pesan');
                        ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>{toolbar}</b></h4>
                                    <div class="row">
                                        <?php
                                            $attributes = array(
                                                'method' => 'post',
                                                'role' => 'form'
                                            );
                                            echo form_open('Alumni_C/input_pendataan_alumni',$attributes);
                                        ?>
                                        <div class="col-md-6">
                                            <div class="p-20">
                                                <div class="m-t-20">
                                                    <h5><label>NIS</label></h5>
                                                    <?php
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 50,
                                                            'name' => 'nis',
                                                            'id' => 'length',
                                                            'value' => set_value('nis')
                                                        );
                                                        echo form_input($attributes);

                                                        echo form_error('nis','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><label>Persepsi</label></h5>
                                                    <div class="checkbox checkbox-primary">
                                                        <input name="persepsi[]" value="1" id="checkbox2" type="checkbox">
                                                        <label for="checkbox2">
                                                            Mudah masuk sekolah lanjutan favorite atau unggulan
                                                        </label>
                                                    </div>

                                                    <div class="checkbox checkbox-primary">
                                                        <input name="persepsi[]" value="2" id="checkbox2" type="checkbox">
                                                        <label for="checkbox2">
                                                            Berprestasi saat UN
                                                        </label>
                                                    </div>

                                                    <div class="checkbox checkbox-primary">
                                                        <input name="persepsi[]" value="3" id="checkbox2" type="checkbox">
                                                        <label for="checkbox2">
                                                            Sekolah lanjutan sekarang sesuai dengan keinginan
                                                        </label>
                                                    </div>

                                                    <div class="checkbox checkbox-primary">
                                                        <input name="persepsi[]" value="4" id="checkbox2" type="checkbox">
                                                        <label for="checkbox2">
                                                            Proses belajar mengajar efektif dan aplikatif
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><label>Jenis Kelamin</label></h5>
                                                    <div class="radio radio-info radio-inline">
                                                        <input type="radio" value="L" name="jekel" checked>
                                                        <label for="inlineRadio1"> Laki - Laki </label>
                                                    </div>
                                                    <div class="radio radio-pink radio-inline">
                                                        <input type="radio" value="P" name="jekel">
                                                        <label for="inlineRadio2"> Perempuan </label>
                                                    </div>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><label>Domisili</label></h5>
                                                    <?php
                                                        $options = array(
                                                            'Domisili'=>'Domisili',
                                                            'Kab Bandung' => 'Kabupaten Bandung',
                                                            'Kab Bandung Barat' => 'Kabupaten Bandung Barat',
                                                            'Kab Bekasi' => 'Kabupaten Bekasi',
                                                            'Kab Bogor' => 'Kabupaten Bogor',
                                                            'Kab Ciamis' => 'Kabupaten Ciamis',
                                                            'Kab Cianjur' => 'Kabupaten Cianjur',
                                                            'Kab Cirebon' => 'Kabupaten Cirebon',
                                                            'Kab Garut' => 'Kabupaten Garut',
                                                            'Kab Indramayu' => 'Kabupaten Indramayu',
                                                            'Kab Karawang' => 'Kabupaten Karawang',
                                                            'Kab Kuningan' => 'Kabupaten Kuningan',
                                                            'Kab Majalengka' => 'Kabupaten Majalengka',
                                                            'Kab Pangandaran' => 'Kabupaten Pangandaran',
                                                            'Kab Purwakarta' => 'Kabupaten Purwakarta',
                                                            'Kab Subang' => 'Kabupaten Subang',
                                                            'Kab Sukabumi' => 'Kabupaten Sukabumi',
                                                            'Kab Sumedang' => 'Kabupaten Sumedang',
                                                            'Kab Tasikmalaya' => 'Kabupaten Tasikmalaya',
                                                            'Kota Bandung' => 'Kota Bandung',
                                                            'Kota Banjar' => 'Kota Banjar',
                                                            'Kota Bekasi' => 'Kota Bekasi',
                                                            'Kota Bogor' => 'Kota Bogor',
                                                            'Kota Cimahi' => 'Kota Cimahi',
                                                            'Kota Cirebon' => 'Kota Cirebon',
                                                            'Kota Depok' => 'Kota Depok',
                                                            'Kota Sukabumi' => 'Kota Sukabumi',
                                                            'Kota Tasikmalaya' => 'Kota Tasikmalaya'
                                                        );

                                                        $attributes = array(
                                                            'class' => 'selectpicker',
                                                            'data-style' => 'btn-white'
                                                        );
                                                        echo form_dropdown('domisili',$options,'Domisili',$attributes);

                                                        echo form_error('Domisili','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="col-md-6">
                                            <div class="p-20">
                                                <div class="m-t-20">
                                                    <h5><label>Tujuan Lanjutan</label></h5>
                                                    <?php
                                                        $options = array(
                                                            'Tujuan Lanjutan' => 'Tujuan Lanjutan',
                                                            '1' => 'SMP Negeri',
                                                            '2' => 'SMP Swasta',
                                                            '3' => 'MTS Negeri',
                                                            '4' => 'MTS Swasta'
                                                        );

                                                        $attributes = array(
                                                            'class' => 'selectpicker',
                                                            'data-style' => 'btn-white'
                                                        );
                                                        echo form_dropdown('tujuan_lanjutan',$options,'Tujuan Lanjutan',$attributes);

                                                        echo form_error('tujuan_lanjutan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>

                                                </div>

                                                <div class="m-t-20">
                                                    <h5><b>Nama Lanjutan</b></h5>
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 100,
                                                            'name' => 'nama_lanjutan',
                                                            'id' => 'length',
                                                            'value' => set_value('nama_lanjutan')
                                                        ); 
                                                        echo form_input($attributes);

                                                        echo form_error('nama_lanjutan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><b>Matematika</b></h5>
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 3,
                                                            'name' => 'matematika',
                                                            'id' => 'length',
                                                            'value' => set_value('matematika')
                                                        ); 
                                                        echo form_input($attributes);

                                                        echo form_error('matematika','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><b>Bahasa Indonesia</b></h5>
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 3,
                                                            'name' => 'indonesia',
                                                            'id' => 'length',
                                                            'value' => set_value('nama_lanjutan')
                                                        ); 
                                                        echo form_input($attributes);

                                                        echo form_error('indonesia','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="m-t-20 col-md-6" style="display:inline-block;">
                                                        <h5><b>IPA</b></h5>
                                                        <?php 
                                                            $attributes = array(
                                                                'class' => 'form-control',
                                                                'maxlength' => 3,
                                                                'name' => 'ipa',
                                                                'id' => 'length',
                                                                'value' => set_value('ipa')
                                                            ); 
                                                            echo form_input($attributes);

                                                            echo form_error('ipa','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                        ?>
                                                    </div>

                                                    <div class="m-t-20 col-md-6">
                                                        <h5><b>IPS</b></h5>
                                                        <?php 
                                                            $attributes = array(
                                                                'class' => 'form-control',
                                                                'maxlength' => 3,
                                                                'name' => 'ips',
                                                                'id' => 'length',
                                                                'value' => set_value('ips')
                                                            ); 
                                                            echo form_input($attributes);

                                                            echo form_error('ips','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                        ?>
                                                    </div>
                                                </div>

                                                <div class="m-t-20" style="float: right;">
                                                    <button type="submit" class="btn btn-default waves-effect waves-light">Input    
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <?php echo form_close();?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- container -->
                </div> <!-- content -->

			<?php
		} else {
			echo "Maaf. Anda Tidak Dapat Mengakses Halaman Ini";
		}
	}
?>