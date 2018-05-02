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