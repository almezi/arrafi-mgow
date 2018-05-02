<?php
										$user= $this->session->userdata('uname');
										$c = $this->db->query("SELECT idortu id,nama nama from ortu where username='$user' limit 1")->row_array();
										$id = $c['id'];
										$nama = $c['nama'];
										
										foreach($ListWali as $row) {
										$kelas=$row->kelas;
										$nip=$row->nip;
										$nama_wali=$row->nama;
										$d = $this->db->query("SELECT count(nip) jumlah
										FROM detail_respon JOIN respon USING ( id_respon ) 
										JOIN guru USING (nip)				
										WHERE idortu = $id AND dari NOT LIKE '%$nama%' AND notifikasi_O = 'belum dibaca' AND nip='$nip'
										group by nip")->row_array();
										$jumlah = $d['jumlah'];
										?>
                                                <tr align=center>
                                                    <td>
													<button type="button" class="btn btn-primary btn-rounded waves-effect waves-light btn-lg" style="height:50px;">
                                                   <span class="btn-label">
												   <?php if($jumlah == 0 ) { ?>
												   <i class="md-forum"></i>
												   <?php } else { ?> 
												   <span class="label label-danger pull-right"><?php echo $jumlah ?> </span>
												   <?php } ?> 
												   </span>
                                                   <a style="color:white;" href="<?php echo base_url(); ?>index.php/Orang_Tua/LihatPembahasan/<?php echo $nip ?>">Buat Saran Untuk Wali <?php echo $nama_wali ?>
												   || Kelas <?php echo $kelas ?> 
                                                </button>
													</td>
                                                </tr>
										<?php  } ?>