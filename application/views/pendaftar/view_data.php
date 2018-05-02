
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
                                <h4 class="page-title">Biodata Pendaftar</h4>
                            </div>
                        </div>
						<br>
                        <div class="row">
                            <div class="col-lg-12"> 
                                <ul class="nav nav-tabs tabs">
                                    <li class="active tab">
                                        <a href="#data-siswa" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-child"></i></span> 
                                            <span class="hidden-xs">Data Siswa</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab"> 
                                        <a href="#data-orang-tua" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                            <span class="hidden-xs">Data Orang Tua</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab"> 
                                        <a href="#data-wali" data-toggle="tab" aria-expanded="true"> 
                                            <span class="visible-xs"><i class="fa fa-users"></i></span> 
                                            <span class="hidden-xs">Data Wali</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab"> 
                                        <a href="#data-asal-mula" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-globe"></i></span> 
                                            <span class="hidden-xs">Data Asal Mula</span> 
                                        </a> 
                                    </li> 
                                </ul> 
                                <div class="tab-content"> 
                                    <div class="tab-pane active" id="data-siswa">
                                        <?php
                                            if ($data_siswa) {
                                                foreach ($data_siswa as $key => $value) {
                                        ?> 
                                                    <div class="col-md-4 about-info-p">
                                                        <strong>Nama Lengkap</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->nama_lengkap;?></p>
                                                    </div>

                                                    <div class="col-md-4 about-info-p">
                                                        <strong>Anak Ke</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->anak_ke;?></p>
                                                    </div>

                                                    <div class="col-md-4 about-info-p">
                                                        <strong>Golongan Darah</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->goda;?></p>
                                                    </div>

                                                    <div class="col-md-4 about-info-p">
                                                        <strong>Nama Panggilan</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->nama_panggilan;?></p>
                                                    </div>

                                                    <div class="col-md-4 about-info-p">
                                                        <strong>Jumlah Saudara Kandung</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->jumlah_saudara_kandung;?></p>
                                                    </div>

                                                    <div class="col-md-4 about-info-p">
                                                        <strong>Penyakit yang Pernah Diderita</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->penyakit_derita;?></p>
                                                    </div>

                                                    <div class="col-md-4 about-info-p">
                                                        <strong>Jenis Kelamin</strong>
                                                        <br>
                                                        <p class="text-muted">
                                                            <?php
                                                                $jekel = $value->jekel;
                                                                if ($jekel=='P') {
                                                                    echo "Perempuan";
                                                                } else {
                                                                    echo "Laki - Laki";
                                                                }
                                                            ?>
                                                        </p>
                                                    </div>

                                                    <div class="col-md-4 about-info-p">
                                                        <strong>Jumlah Saudara Tiri</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->jumlah_saudara_tiri;?></p>
                                                    </div>

                                                    <div class="col-md-4 about-info-p">
                                                        <strong>Alamat Rumah</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->alamat_rumah;?></p>
                                                    </div>

                                                    <div class="col-md-4 about-info-p">
                                                        <strong>Tanggal Lahir</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo date('d-m-Y',strtotime($value->tgl_lahir));?></p>
                                                    </div>

                                                    <div class="col-md-4 about-info-p">
                                                        <strong>Jumlah Saudara Angkat</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->jumlah_saudara_angkat;?></p>
                                                    </div>

                                                    <div class="col-md-4 about-info-p">
                                                        <strong>Provinsi</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo ucwords($value->provinsi);?></p>
                                                    </div>

                                                    

                                                    <div class="col-md-4 about-info-p">
                                                        <strong>Bahasa Sehari - Hari</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo ucwords($value->bahasa_sehari);?></p>
                                                    </div>

                                                    <div class="col-md-4 about-info-p">
                                                        <strong>RT/RW</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->rt.'/'.$value->rw;?></p>
                                                    </div>

                                                    <div class="col-md-4 about-info-p">
                                                        <strong>Agama</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->agama;?></p>
                                                    </div>

                                                    <div class="col-md-4 about-info-p">
                                                        <strong>Berat Badan</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->berat_badan;?>kg</p>
                                                    </div>

                                                    <div class="col-md-4 about-info-p">
                                                        <strong>Kelurahan</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo ucwords($value->kelurahan);?></p>
                                                    </div>

                                                    <div class="col-md-4 about-info-p">
                                                        <strong>Kewarganegaraan</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->kewarganegaraan;?></p>
                                                    </div>

                                                    <div class="col-md-4 about-info-p">
                                                        <strong>Tinggi Badan</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->tinggi_badan;?>cm</p>
                                                    </div>

                                                    <div class="col-md-4 about-info-p">
                                                        <strong>Kecamatan</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo ucwords($value->kecamatan);?></p>
                                                    </div>

                                                    <div class="col-md-4 about-info-p">
                                                        <strong>Kota/Kabupaten</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo ucwords($value->kota_kabupaten);?></p>
                                                    </div>

                                                    <div class="col-md-4 about-info-p">
                                                        <strong>Telp Rumah</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->kode_area.'-'.$value->telp_rumah;?></p>
                                                    </div>

                                                    <div class="col-md-4 about-info-p">
                                                        <strong>No HP</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->no_hp;?></p>
                                                    </div>

                                                    <div class="col-md-4 about-info-p">
                                                        <strong>Kode Pos</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->kode_pos;?></p>
                                                    </div>

                                                    <div class="col-md-4 about-info-p">
                                                        <strong>Tempat Tinggal</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->tempat_tinggal;?></p>
                                                    </div>

                                                    <div class="col-md-4 about-info-p">
                                                        <strong>Jarak Rumah ke Sekolah</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->jarak_rumah_sekolah;?>km</p>
                                                    </div>

                                                    <div class="about-info-p">
                                                        <strong>&nbsp;</strong>
                                                        <br>
                                                        <p class="text-muted">&nbsp;</p>
                                                    </div>


                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <p class="lead m-t-0" align="center">Tidak Ada Data yang Dapat Ditampilkan</p>
                                            <?php
                                        }
                                        ?>
                                    </div> 
                                    <div class="tab-pane" id="data-orang-tua">
                                        <?php
                                            if ($data_ortu) {
                                                foreach ($data_ortu as $key => $value) {
                                        ?>
                                            <div class="col-md-6 about-info-p">
                                                <strong>Nama Ayah</strong>
                                                <br>
                                                <p class="text-muted"><?php echo ucwords($value->nama_ayah);?></p>
                                            </div>

                                            <div class="col-md-6 about-info-p">
                                                <strong>Nama Ibu</strong>
                                                <br>
                                                <p class="text-muted"><?php echo ucwords($value->nama_ibu);?></p>
                                            </div>

                                            <div class="col-md-6 about-info-p">
                                                <strong>Pendidikan Ayah</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $value->pdd_ayah;?></p>
                                            </div>

                                            <div class="col-md-6 about-info-p">
                                                <strong>Pendidikan Ibu</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $value->pdd_ibu;?></p>
                                            </div>

                                            <div class="col-md-6 about-info-p">
                                                <strong>Pekerjaan Ayah</strong>
                                                <br>
                                                <p class="text-muted">
                                                    <?php
                                                        $pekerjaan_ayah = $value->pekerjaan_ayah;

                                                        if ($pekerjaan_ayah=="") {
                                                            echo "Tidak Ada";
                                                        } else {
                                                            echo $pekerjaan_ayah;
                                                        }
                                                    ?>
                                                </p>
                                            </div>

                                            <div class="col-md-6 about-info-p">
                                                <strong>Pekerjaan Ibu</strong>
                                                <br>
                                                <p class="text-muted">
                                                    <?php
                                                        $pekerjaan_ibu = $value->pekerjaan_ibu;

                                                        if ($pekerjaan_ibu=="") {
                                                            echo "Tidak Ada";
                                                        } else {
                                                            echo $pekerjaan_ibu;
                                                        }
                                                    ?>
                                                </p>
                                            </div>

                                            <div class="col-md-6 about-info-p">
                                                <strong>Nama Perusahaan Ayah</strong>
                                                <br>
                                                <p class="text-muted">
                                                    <?php
                                                        $nama_perusahaan_ayah = $value->nama_perusahaan_ayah;

                                                        if ($nama_perusahaan_ayah=="") {
                                                            echo "Tidak Ada";
                                                        } else {
                                                            echo $nama_perusahaan_ayah;
                                                        }
                                                    ?>
                                                </p>
                                            </div>

                                            <div class="col-md-6 about-info-p">
                                                <strong>Nama Perusahaan Ibu</strong>
                                                <br>
                                                <p class="text-muted">
                                                    <?php
                                                        $nama_perusahaan_ibu = $value->nama_perusahaan_ibu;
                                                        if ($nama_perusahaan_ibu=="") {
                                                            echo "Tidak Ada";
                                                        } else {
                                                            ucwords($nama_perusahaan_ibu);
                                                        }
                                                    ?>
                                                </p>
                                            </div>

                                            <div class="col-md-6 about-info-p">
                                                <strong>Alamat Perusahaan Ayah</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $value->alamat_perusahaan_ayah;?></p>
                                            </div>

                                            <div class="col-md-6 about-info-p">
                                                <strong>Alamat Perusahaan Ibu</strong>
                                                <br>
                                                <p class="text-muted">
                                                    <?php
                                                        $alamat_perusahaan_ibu = $value->alamat_perusahaan_ibu;
                                                        if ($alamat_perusahaan_ibu=="") {
                                                            echo "Tidak Ada";
                                                        } else {
                                                            echo $alamat_perusahaan_ibu;
                                                        }
                                                    ?>
                                                </p>
                                            </div>

                                            <div class="col-md-6 about-info-p">
                                                <strong>Email Kantor Ayah</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $value->email_kantor_ayah;?></p>
                                            </div>

                                            <div class="col-md-6 about-info-p">
                                                <strong>Email Kantor Ibu</strong>
                                                <br>
                                                <p class="text-muted">
                                                    <?php
                                                        $email_kantor_ibu = $value->email_kantor_ibu;

                                                        if ($email_kantor_ibu=="") {
                                                            echo "Tidak Ada";
                                                        } else {
                                                            echo $email_kantor_ibu;
                                                        }
                                                    ?>
                                                </p>
                                            </div>

                                            <div class="about-info-p">
                                                <strong>&nbsp;</strong>
                                                <br>
                                                <p class="text-muted">&nbsp;</p>
                                            </div>
                                        <?php
                                            }
                                        } else {
                                                ?>
                                                <p class="lead m-t-0" align="center">
                                                    Tidak Ada Data Yang Akan Ditampilkan
                                                </p>
                                                <?php
                                            }
                                        ?>
                                    </div> 
                                    <div class="tab-pane" id="data-wali">
                                        <?php
                                            if ($data_wali) {
                                                foreach ($data_wali as $key => $value) {
                                                    ?>
                                                    <div class="col-md-6 about-info-p">
                                                        <strong>Nama Wali</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo ucwords($value->nama_wali);?></p>
                                                    </div>

                                                    <div class="col-md-6 about-info-p">
                                                        <strong>Pendidikan Wali</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->pdd_wali?></p>
                                                    </div>

                                                    <div class="col-md-6 about-info-p">
                                                        <strong>Hubungan Keluarga</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo ucwords($value->hubungan_keluarga);?></p>
                                                    </div>

                                                    <div class="col-md-6 about-info-p">
                                                        <strong>Alamat Rumah</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo ucwords($value->alamat_rumah);?></p>
                                                    </div>

                                                    <div class="col-md-6 about-info-p">
                                                        <strong>RT/RW</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->rt."/".$value->rw;?></p>
                                                    </div>

                                                    <div class="col-md-6 about-info-p">
                                                        <strong>Kelurahan</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo ucwords($value->kelurahan);?></p>
                                                    </div>

                                                    <div class="col-md-6 about-info-p">
                                                        <strong>Kecamatan</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo ucwords($value->kecamatan);?></p>
                                                    </div>

                                                    <div class="col-md-6 about-info-p">
                                                        <strong>Kota/Kabupaten</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo ucwords($value->kota_kabupaten);?></p>
                                                    </div>

                                                    <div class="col-md-6 about-info-p">
                                                        <strong>Telpon Rumah</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->kode_area.'-'.$value->telp_rumah;?></p>
                                                    </div>

                                                    <div class="col-md-6 about-info-p">
                                                        <strong>No HP</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->no_hp;?></p>
                                                    </div>

                                                    <div class="col-md-6 about-info-p">
                                                        <strong>Kode Pos</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->kode_pos;?></p>
                                                    </div>

                                                    <div class="col-md-6 about-info-p">
                                                        <strong>Pekerjaan</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo ucwords($value->pekerjaan_wali);?></p>
                                                    </div>

                                                    <div class="col-md-6 about-info-p">
                                                        <strong>Nama Perusahaan</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo ucwords($value->nama_perusahaan);?></p>
                                                    </div>

                                                    <div class="col-md-6 about-info-p">
                                                        <strong>Alamat Perusahaan</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo ucwords($value->alamat_perusahaan);?></p>
                                                    </div>

                                                    <div class="col-md-6 about-info-p">
                                                        <strong>Email Perusahaan</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->email_wali;?></p>
                                                    </div>

                                                    <div class="about-info-p">
                                                        <strong>&nbsp;</strong>
                                                        <br>
                                                        <p class="text-muted">&nbsp;</p>
                                                    </div>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <p class="lead m-t-0" align="center">
                                                    Tidak Ada Data Yang Akan Ditampilkan
                                                </p>
                                                <?php
                                            }
                                        ?>
                                    </div> 
                                    <div class="tab-pane" id="data-asal-mula">
                                        <?php
                                            if (!$data_asal) {
                                                ?>
                                                <p class="lead m-t-0" align="center">
                                                    Tidak Ada Data Yang Akan Ditampilkan
                                                </p>
                                                <?php
                                            } else {
                                            foreach ($data_asal as $key => $value) {
                                                ?>
                                                    <div class="col-md-6 about-info-p">
                                                        <strong>Asal Anak</strong>
                                                        <br>
                                                        <p class="text-muted">
                                                            <?php
                                                                $asal_anak = $value->asal_anak;

                                                                if ($asal_anak=="PG") {
                                                                    echo "Play Group";
                                                                } else if ($asal_anak=="TK") {
                                                                    echo "Taman Kanak - Kanak";
                                                                } else if ($asal_anak=="RA") {
                                                                    echo "Raudhatul Athfal";
                                                                } else if ($asal_anak=="PAUD") {
                                                                    echo "Pendidikan Anak Usia Dini";
                                                                } else {
                                                                    echo $asal_anak;
                                                                }
                                                            ?>
                                                        </p>
                                                    </div>

                                                    <div class="col-md-6 about-info-p">
                                                        <strong>Nama <?php echo $asal_anak;?></strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo ucwords($value->nama_asal);?></p>
                                                    </div>

                                                    <div class="col-md-6 about-info-p">
                                                        <strong>NO/Tahun SK</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->no_tahun_sk;?></p>
                                                    </div>

                                                    <div class="col-md-6 about-info-p">
                                                        <strong>Lama Belajar</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->lama_belajar;?> Tahun</p>
                                                    </div>

                                                    <div class="col-md-6 about-info-p">
                                                        <strong>Tanggal Diterima</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $value->tgl_terima;?></p>
                                                    </div>

                                                    <div class="about-info-p">
                                                        <strong>&nbsp;</strong>
                                                        <br>
                                                        <p class="text-muted">&nbsp;</p>
                                                    </div>
                                                <?php
                                                }
                                            }
                                        ?>
                                    </div> 
                                </div> 
                            </div> 
                        </div>
                    </div>     
                </div>