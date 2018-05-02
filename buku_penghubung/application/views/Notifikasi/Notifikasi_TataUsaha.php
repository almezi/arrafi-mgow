<?php if($status['nama_group'] == 'Wali-Kelas' || $status['nama_group'] == 'Guru' || $status['nama_group'] == 'Orang-Tua') { ?>
<?php } else { ?>
<?php if($notifSaran == 0) { ?>
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        Saran
                                    </a>
								<?php } else { ?>
									<a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        Saran <span class="badge badge-xs badge-danger"><?php echo $notifSaran ?></span>
                                    </a>
								<?php } ?>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="notifi-title"><span class="label label-default pull-right"></span>Pemberitahuan Saran</li>
										<?php foreach($listnotifSaran as $row) { ?>
                                        <li class="list-group nicescroll notification-list">
                                           <!-- list item-->
                                           <a href="<?php echo base_url(); ?>index.php/Tata_Usaha/viewSaran/<?php echo $row->nip ?>/<?php echo $row->tanggal ?>" class="list-group-item">
                                                 <div class="media-body">
                                                    <h5 class="media-heading"><?php echo $row->tanggal ?></h5>
                                                    <p class="m-0">
                                                        <small><?php echo $row->nama ?></small> 
                                                    </p>
                                                 </div>
                                           </a>
										</li>
										<?php } ?>
									</ul>
<?php } ?>
								