						<?php if($jumlah == 2) { ?>
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
									<?php } else { ?>
									<?php } ?>