<?php if($status['nama_group'] == 'Wali-Kelas') {?>
                            <ul class="nav navbar-nav navbar-right pull-right">
								<li class="dropdown hidden-xs">
								<?php if($notifPesan == 0) { ?>
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        Pesan
                                    </a>
								<?php } else { ?>
									<a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        Pesan <span class="badge badge-xs badge-danger"><z><?php echo $notifPesan ?></span>
                                    </a>
								<?php } ?>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="notifi-title"><span class="label label-default pull-right"></span>Pemberitahuan Pesan</li>
										<?php foreach($ListnotifPesan as $row) { ?>
                                        <li class="list-group nicescroll notification-list">
                                           <!-- list item-->
                                           <a href="<?php echo base_url(); ?>index.php/Wali_Kelas/viewPesanHistory/<?php echo $row->nomor ?>/<?php echo $row->id_pesan ?>" class="list-group-item">
                                                 <div class="media-body">
                                                    <h5 class="media-heading"><?php echo $row->tanggal_pesan ?></h5>
                                                    <p class="m-0">
                                                        <small><?php echo $row->dari ?></small> :
														<small><?php echo $row->isi_pesan ?></small>
                                                    </p>
                                                 </div>
                                           </a>
										</li>
										<?php } ?>
									</ul>
								</li>
								<li class="dropdown hidden-xs">
								<?php if($notifInformasi == 0) { ?>
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        Informasi
                                    </a>
								<?php } else { ?>
									<a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        Informasi <span class="badge badge-xs badge-danger"><?php echo $notifInformasi ?></span>
                                    </a>
								<?php } ?>	
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="notifi-title"><span class="label label-default pull-right"></span>Pemberitahuan Informasi</li>
										<?php foreach($ListNotifInformasi as $row) { ?>
                                        <li class="list-group nicescroll notification-list">
                                           <!-- list item-->
                                           <a href="<?php echo base_url(); ?>index.php/Wali_Kelas/viewInformasiTerbaca2/<?php echo $row->id_informasi ?>" class="list-group-item">
                                                 <div class="media-body">
                                                    <h5 class="media-heading"><?php echo $row->tanggal ?></h5>
                                                    <p class="m-0">
                                                        <small><?php echo $row->subject_informasi ?></small><br>
														<small>Terbaca sebanyak : <?php echo $row->jumlah ?> orang</small>
														
                                                    </p>
                                                 </div>
                                           </a>
										</li>
										<?php } ?>
									</ul>
								</li>
								<?php if($notif == 0){ ?>
								<li class="hidden-xs">
                                    <a class="right-bar-toggle waves-effect waves-light"><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/homeSaran">Respon</a></a>
                                </li>
								<?php } else { ?>
								<li class="hidden-xs">
                                    <a class="right-bar-toggle waves-effect waves-light"><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/homeSaran">Respon <span class="badge badge-xs badge-danger"><?php echo $notif ?></span></a></a>
                                </li>
								<?php }  ?>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                               
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo base_url(); ?>arrafi/ubold/assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="ti-lock m-r-5"></i> Lock screen</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/logout"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
						<?php } else { ?>
						 <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                               
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo base_url(); ?>arrafi/ubold/assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="ti-lock m-r-5"></i> Lock screen</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/logout"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
						<?php }  ?>