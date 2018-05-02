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