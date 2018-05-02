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
                                           <a href="<?php echo base_url(); ?>index.php/Orang_Tua/BuatSaran/<?php echo $row->nip ?>/<?php echo $row->id_pembahasan ?>" class="list-group-item">
                                                 <div class="media-body">
                                                    <h6 class="media-heading">Respon Group <?php echo $row->nama ?></h6>
                                                    <p class="m-0">
														<small>Pembahasan : <?php echo $row->nama_pembahasan ?></small><br>
                                                        <small>Jumlah Respon : <?php echo $row->jumlah ?></small><br>
                                                    </p>
                                                 </div>
                                           </a>
										</li>
										<?php } ?>
									</ul>