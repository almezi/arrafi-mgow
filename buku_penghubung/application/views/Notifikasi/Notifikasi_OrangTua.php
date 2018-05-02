<li class="dropdown hidden-xs">
								<?php if($notifKegiatan == 0) { ?>
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        Kegiatan 
                                    </a>
								<?php } else { ?>
									<a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        Kegiatan <span class="badge badge-xs badge-danger"><?php echo $notifKegiatan ?></span>
                                    </a>
								<?php } ?>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="notifi-title"><span class="label label-default pull-right"></span>Pemberitahuan Kegiatan</li>
										<?php foreach($ListNotifKegiatan as $row) { ?>
                                        <li class="list-group nicescroll notification-list">
                                           <!-- list item-->
                                           <a href="<?php echo base_url(); ?>index.php/Orang_Tua/viewKegiatan/<?php echo $row->nis ?>/<?php echo $row->tanggal_kegiatan ?>" class="list-group-item">
                                                 <div class="media-body">
                                                    <h5 class="media-heading"><?php echo $row->tanggal_kegiatan ?></h5>
                                                    <p class="m-0">
                                                        <small><?php echo $row->nama ?></small>
                                                    </p>
                                                 </div>
                                           </a>
										</li>
										<?php } ?>
									</ul>
								</li>
								<li class="dropdown hidden-xs">
								<?php if($notifPesan == 0) { ?>
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        Pesan
                                    </a>
								<?php } else { ?>
									<a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        Pesan <span class="badge badge-xs badge-danger"><?php echo $notifPesan ?></span>
                                    </a>
								<?php } ?>	
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="notifi-title"><span class="label label-default pull-right"></span>Pemberitahuan Pesan</li>
										<?php foreach($ListNotifPesan as $row) { ?>
                                        <li class="list-group nicescroll notification-list">
                                           <!-- list item-->
                                           <a href="<?php echo base_url(); ?>index.php/Orang_Tua/BalasPesan/<?php echo $row->id_pesan ?>/<?php echo $row->tanggal_pesan ?>/<?php echo $row->nomor ?>" class="list-group-item">
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
                                           <a href="<?php echo base_url(); ?>index.php/Orang_Tua/readInformasi2/<?php echo $row->id_informasi ?>/<?php echo $row->idortu ?>" class="list-group-item">
                                                 <div class="media-body">
                                                    <h5 class="media-heading"><?php echo $row->tanggal ?></h5>
                                                    <p class="m-0">
                                                        <small><?php echo $row->subject_informasi ?></small><br>
                                                    </p>
                                                 </div>
                                           </a>
										</li>
										<?php } ?>
									</ul>
								</li>
								<li class="dropdown hidden-xs">
								<?php if($notifRespon == 0){ ?>
                                     <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        Respon
                                    </a>
								<?php } else { ?>
									 <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        Respon <span class="badge badge-xs badge-danger"><?php echo $notifRespon ?></span>
                                    </a>
									<?php }  ?>
									 <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="notifi-title"><span class="label label-default pull-right"></span>Pemberitahuan Respon</li>
										<?php foreach($LihatNotifRespon as $row) { ?>
                                        <li class="list-group nicescroll notification-list">
                                           <!-- list item-->
                                           <a href="<?php echo base_url(); ?>index.php/Orang_Tua/Saran/<?php echo $row->nip ?>" class="list-group-item">
                                                 <div class="media-body">
                                                    <h6 class="media-heading">Respon Dari  <?php echo $row->nama ?></h6>
                                                    <p class="m-0">
                                                        <small>Jumlah Respon : <?php echo $row->jumlah ?></small><br>
                                                    </p>
                                                 </div>
                                           </a>
										</li>
										<?php } ?>
									</ul>
                                </li>
								
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                               
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo base_url(); ?>arrafi/ubold/assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="ti-lock m-r-5"></i> Lock screen</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/Guru/logout"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                    </ul>
                                </li>