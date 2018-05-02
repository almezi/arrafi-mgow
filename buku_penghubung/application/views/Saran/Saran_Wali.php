										<?php $user= $this->session->userdata('uname');
											$c = $this->db->query("SELECT NIP NIP FROM guru where username='$user' limit 1")->row_array();
											$nomor = $c['NIP'];
											$pembahasan = $bahas['id_pembahasan'];
											$data=array();
											  foreach($listTanggal as $row) {
												$i=0;
												$data[$i]=$row->tanggal; 
												$listTanggapan=$this->db->query("select distinct(respon.dari),respon.isi_respon,respon.id_respon,
												HOUR(respon.tanggal_respon) as jam,MINUTE(respon.tanggal_respon) as menit,DAY(respon.tanggal_respon) as tanggal,
												MONTH(respon.tanggal_respon) as bulan,YEAR(respon.tanggal_respon) as tahun 
												FROM guru guru
												JOIN respon respon ON ( respon.NIP = guru.NIP ) 
												JOIN detail_respon detail_respon ON ( respon.id_respon = detail_respon.id_respon ) 
												JOIN ortu ortu ON ( ortu.idortu = detail_respon.idortu ) 
												WHERE respon.NIP='$nomor' and respon.tanggal='$data[$i]' and id_pembahasan='$pembahasan'
												order by respon.id_respon desc");
												?>
												
										<center><button class="btn-white btn-custom btn-rounded"><?php echo $data[$i];?></button></center>
										<?php foreach($listTanggapan->result() as $row) { ?>
											<?php if($row->dari == $user1['nama']){?>
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
														<a href="<?php echo base_url(); ?>index.php/Wali_Kelas/editSaran/<?php echo $row->id_respon ?>/<?php echo $bahas['id_pembahasan'];?>">Edit</a> <z style="color:#DBDDDE;">|</z>
														<a href="<?php echo base_url(); ?>index.php/Wali_Kelas/hapusSaran/<?php echo $row->id_respon ?>/<?php echo $bahas['id_pembahasan'];?>">Hapus</a>
														<?php $id=$row->id_respon ?>
                                                    </div>
															<?php $jumlah = $this->db->query("select d.id_respon from respon r join detail_respon d on(d.id_respon=r.id_respon)
															where d.notifikasi_O='dibaca' and d.notifikasi_W='dibaca' and d.id_respon=$id")->num_rows(); ?>
															
																<?php if ($jumlah == 0) {?>
																
																<?php } else { ?>
																	dibaca oleh <?php echo $jumlah ?> orang
																<?php }  ?>
                                                </div>
											</li>
											 <?php } else {?>
												<li class="clearfix odd">
                                                <div class="chat-avatar">
                                                    <img src="<?php echo base_url(); ?>arrafi/ubold/assets/images/users/avatar-5.jpg" alt="Female">
                                                    <i><?php echo $row->jam?> : <?php echo $row->menit?> </i>
													
                                                </div>
                                                <div class="conversation-text">
                                                    <div class="ctext-wrap">
                                                        <i><?php echo $row->dari?></i>
                                                        <p align=left>
                                                            <?php echo $row->isi_respon?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
											<?php	
												}?>
											<?php	
												}?> 
												<?php $i++; }
	?>
