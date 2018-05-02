<?php 
											$user= $this->session->userdata('uname');
											$c = $this->db->query("SELECT idortu id,nama nama from ortu where username='$user' limit 1")->row_array();
											$idortu = $c['id'];
											$nip= $nip['NIP'];
											$data=array();
											  foreach($listTanggal as $row) {
												$i=0;
												$data[$i]=$row->tanggal; 
												$listTanggapan=$this->db->query("select distinct(respon.dari),respon.nip,respon.status,
												respon.isi_respon,respon.id_respon,HOUR(respon.tanggal_respon) as jam,
												MINUTE(respon.tanggal_respon) as menit,DAY(respon.tanggal_respon) as tanggal,
												MONTH(respon.tanggal_respon) as bulan,YEAR(respon.tanggal_respon) as tahun
												FROM guru guru
												JOIN respon respon ON ( respon.NIP = guru.NIP ) 
												JOIN detail_respon detail_respon ON ( respon.id_respon = detail_respon.id_respon ) 
												JOIN ortu ortu ON ( ortu.idortu = detail_respon.idortu ) 
												WHERE respon.NIP='$nip' and respon.tanggal='$data[$i]'
												order by respon.id_respon desc");
												?>
												
										<center><button class="btn-white btn-custom btn-rounded"><?php echo $data[$i];?></button></center>
                                          <?php foreach($listTanggapan->result() as $row) { ?>
												<?php if($row->dari == $user1['nama']){ ?>
											<li class="clearfix">
                                                <div class="chat-avatar">
                                                    <img src="<?php echo base_url(); ?>arrafi/ubold/assets/images/avatar-1.jpg" alt="male">
                                                    <i><?php echo $row->jam?> : <?php echo $row->menit?> </i>
												</div>
													<div class="conversation-text">
                                                    <div class="ctext-wrap">
                                                        <i><?php echo $row->dari?></i>
                                                        <p class="page-header">
                                                            <?php echo $row->isi_respon?>
                                                        </p>
														<a href="<?php echo base_url(); ?>index.php/Orang_Tua/editSaran/<?php echo $row->id_respon ?>/<?php echo $row->nip ?>">Edit</a><z style="color:#DBDDDE;">|</z>
														<a href="<?php echo base_url(); ?>index.php/Orang_Tua/hapusSaran/<?php echo $row->id_respon ?>/<?php echo $row->nip ?>">Hapus</a>
														<?php $id=$row->id_respon ?>
														<?php $dari=$row->dari?>
														</p>
                                                    </div>
															<?php $jumlah_Wali = $this->db->query("select distinct(d.id_respon) from respon r join detail_respon d on(d.id_respon=r.id_respon)
															where d.notifikasi_W='dibaca' and d.id_respon=$id")->num_rows(); ?>
															<?php $jumlah_Ortu = $this->db->query("select d.id_respon from respon r join detail_respon d on(d.id_respon=r.id_respon)
															where d.idortu <> $idortu and d.notifikasi_O='dibaca' and d.id_respon=$id")->num_rows(); ?>
																
																<?php if ($jumlah_Wali+$jumlah_Ortu == 0) {?>
																
																<?php } else if ($jumlah_Wali+$jumlah_Ortu == $JumlahOrtu){ ?>
																	terbaca
																<?php } else { ?>
																	dibaca oleh <?php echo $jumlah_Wali+$jumlah_Ortu ?> orang
																<?php }  ?>
                                                </div>
											</li>
											
											 <?php } else if($row->status == 'Wali-Kelas'){?>
												
												<li class="clearfix odd">
                                                <div class="chat-avatar">
                                                    <img src="<?php echo base_url(); ?>arrafi/ubold/assets/images/users/avatar-5.jpg" alt="Female">
                                                    <i><?php echo $row->jam?> : <?php echo $row->menit?> </i>
                                                </div>
                                                <div class="conversation-text">
                                                    <div class="ctext-wrap">
                                                        <i><?php echo $row->dari?> (Wali Kelas)</i>
                                                        <p>
                                                            <?php echo $row->isi_respon?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
											<?php	
												} else { ?>
												<li class="clearfix odd">
                                                <div class="chat-avatar">
                                                    <img src="<?php echo base_url(); ?>arrafi/ubold/assets/images/users/avatar-5.jpg" alt="Female">
                                                    <i><?php echo $row->jam?> : <?php echo $row->menit?> </i>
                                                </div>
                                                <div class="conversation-text">
                                                    <div class="ctext-wrap">
                                                        <i><?php echo $row->dari?></i>
                                                        <p>
                                                            <?php echo $row->isi_respon?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
												<?php	
												} ?> 
											<?php	
												}?> 
											<?php $i++; } ?>