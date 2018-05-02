								<?php if($jumlah == 2) { ?>
								<?php if($notif == 0){ ?>
                                     <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        Respon
                                    </a>
								<?php } else { ?>
									 <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        Respon <span class="badge badge-xs badge-danger"><?php echo $notif ?></span>
                                    </a>
									<?php }  ?>
									 <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="notifi-title"><span class="label label-default pull-right"></span>Pemberitahuan Respon</li>
										<?php 
										foreach($LihatNotifRespon as $row) { 
										$jumlah= $this->db->query("SELECT distinct(isi_respon),notifikasi_W,id_pembahasan FROM respon join detail_respon using(id_respon)
										where id_pembahasan='$row->id_pembahasan' and notifikasi_W='belum dibaca'")->num_rows();
										?>
                                        <li class="list-group nicescroll notification-list">
                                           <!-- list item-->
                                           <a href="<?php echo base_url(); ?>index.php/Wali_Kelas/homeSaran/<?php echo $row->id_pembahasan ?>" class="list-group-item">
                                                 <div class="media-body">
                                                    <h6 class="media-heading">Respon Group <?php echo $row->nama ?></h6>
                                                    <p class="m-0">
														<small>Pembahasan : <?php echo $row->nama_pembahasan?> </small><br>
                                                        <small>Jumlah Respon : <?php echo $jumlah ?></small><br>
                                                    </p>
                                                 </div>
                                           </a>
										</li>
										<?php } ?>
									</ul>
						<?php } else { ?>
						<?php } ?>