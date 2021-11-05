 <!-- Panels -->
 <div class="tab-content mt-4" id="pills-tabContent">
        <!-- Overview panel -->
        <div
          class="tab-pane fade show active"
          id="pills-overview"
          role="tabpanel"
          aria-labelledby="pills-overview-tab"
        >
          <!--Grid row-->
          <div class="row">
            <!--Grid column-->
            <div class="col-md-12 mb-4">
              <!--Section: Docs content-->
              <section>
                <!--Section: Introduction-->
                <section id="section-introduction">
                  <!-- Main title -->
                  <h2 class="h1 fw-bold">Proses Pemesanan</h2>

                  <!-- Seo title -->
                  <h1 class="h5">Konfirmasi pemesanan yang tersedia</h1>

                  <!-- Description -->
                  <p>
                    <?php echo date('d F Y H.i A') ?>
                  </p>
                </section>
                <!--Section: Introduction-->

                <hr class="my-5" />

                <!--Section: Basic example-->
                <section id="section-basic-example">
                  <!-- Section title -->
                  <h2 class="mb-4">Tabel Pesanan</h2>


                  <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" width="5%">#</th>
                            <th scope="col">Nama Lengkap <small>(klik nama untuk mendetail)</small></th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Telp</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>

                      <?php 
                      

                        if ( count($penjualan) > 0 ) {

                          $i = 1;
                          foreach ( $penjualan AS $row ) :
                        
                      ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td>
                                <a href="javascript:void(0)" data-mdb-toggle="modal" data-mdb-target="#kode-<?php echo $row['info']['kd_penjualan'] ?>" style="font-weight: bold;">
                                    <?php echo $row['info']['nama_lengkap'] ?>
                                </a>
                            </td>
                            <td><?php echo $row['info']['alamat'] ?></td>
                            <td><?php echo $row['info']['telp'] ?></td>
                            <td><?php echo $row['info']['email'] ?></td>
                            <td><?php 

                                $label = "info";
                                if ( $row['info']['status'] == "confirm" ) {

                                    $label = "success";
                                } else if ( $row['info']['status'] == "decline" ) {

                                    $label = "danger";
                                }
                            ?>
                            
                                <label class="badge bg-<?php echo $label ?>"><?php echo ucfirst( $row['info']['status'] ) ?></label>
                            </td>
                            <td><?php echo date('d F Y', strtotime($row['info']['tanggal_penjualan'])) ?>
                        
                        
                        
                        
                            <div class="modal fade" id="kode-<?php echo $row['info']['kd_penjualan'] ?>" tabindex="-1"
                            	role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            	<div class="modal-dialog modal-lg" role="document">
                            		<div class="modal-content">

                                        <form action="<?php echo base_url('pemesanan/do_confirm/'. $row['info']['kd_penjualan']) ?>" method="POST">
                            			<div class="modal-body">

                            				<div class="row">
                            					<div class="col-md-7" style="border-right: 1px solid #e0e0e0;">
                            						<h3>Rincian Pemesanan</h3>
                            						<h5><?php echo date('d F Y', strtotime( $row['info']['tanggal_penjualan'] )) ?>
                            						</h5>
                            						<table class="table">
                            							<tr>
                            								<th>Kode Produk</th>
                            								<th>Nama</th>
                            								<th>Jumlah</th>
                            							</tr>
                            							<?php
                                                    
                                                    $berat = 0;
                                                    foreach ( $row['detail'] AS $rowDet ) { ?>
                            							<tr>
                            								<td><?php echo $rowDet['kd_produk'] ?></td>
                            								<td><?php echo $rowDet['nama_produk'] ?></td>
                            								<td><?php echo $rowDet['jumlah'].' item' ?></td>
                            							</tr>
                            							<?php $berat += ($rowDet['berat'] * $rowDet['jumlah']); } ?>
                            						</table>

                            						<b style="font-weight: bold;">Berat Total : <?php echo $berat ?>
                            							gr</b>
                            					</div>


                            					<div class="col-md-5">
                                                    
                                                    <?php
                                                        
                                                        
                                                        // kondisi
                                                        $radio1 = "disabled";
                                                        $radio2 = "disabled";
                                                        $catatan = "readonly";
                                                        $status = false;
                                                        if ( $row['info']['status'] == "process" ){

                                                            $radio1 = "";
                                                            $radio2 = "";
                                                            $catatan = "";
                                                            $status = true;
                                                        }
                                                    ?>


                            						<p style="margin: 0px">Kode Pemesanan</p>
                            						<h4><?php echo $row['info']['kd_penjualan'] ?></h4>
                                                    

                                                    <?php if ( !$status ) { ?>
                                                    <small>Telah dikonfirmasi pada</small>
                                                    <p style="font-weight: bold; margin: 0px"><?php echo date('d F Y', strtotime( $row['info']['tanggal_keputusan'] )).' - '.$row['info']['status'] ?></p>
                                                    <?php } ?>
                                                    
                                                    
                                                    


                                                    <br>
                                                    <p style="font-weight: bold; margin: 0px">Status Pemesanan</p>
                            						<div style="margin-left: 10px">
                            							<div class="form-check form-check-inline">
                            								<input class="form-check-input" type="radio"
                            									name="status" id="flexRadioDefault1" value="confirm" <?php echo $radio1 .' '. ($row['info']['status'] == "confirm" ? "checked" : "") ?>/>
                            								<label class="form-check-label" for="flexRadioDefault1">
                            									Setujui
                            								</label>
                            							</div>

                            							<div class="form-check form-check-inline">
                            								<input class="form-check-input" type="radio"
                            									name="status" id="flexRadioDefault2" value="decline" <?php echo $radio2 .' '. ($row['info']['status'] == "decline" ? "checked" : "") ?>
                            									 />
                            								<label class="form-check-label" for="flexRadioDefault2">
                            									Batalkan
                            								</label>
                            							</div>
                            						</div>


                                                    <br>
                                                    <p style="font-weight: bold; margin: 0px">Catatan</p>
                                                    <textarea name="catatan" class="form-control" placeholder="Masukkan catatan apabila dibutuhkan . . ." <?php echo $catatan ?>><?php echo $row['info']['catatan'] ?></textarea>
                                                    <small>Bersifat opsional</small>
                                                    

                            					</div>
                            					<div class="modal-footer">
                            						<button type="button" class="btn btn-default"
                            							data-mdb-dismiss="modal">
                            							Tutup
                            						</button>

                                                    <?php if ( $status ) { ?>
                            						<button type="submit" class="btn btn-primary">Konfirmasi Perubahan</button>
                                                    <?php } ?>
                            					</div>
                            					</form>

                            				</div>
                            			</div>
                            		</div>
                        
                        
                            </td>
                        </tr>

                        <?php endforeach;
                        
                        } else {
                        ?>

                        <tr>
                          <td colspan="6">Kosong</td>
                        </tr>

                        <?php } ?>
                    </tbody>
                  </table>

                </section>
                <!--Section: Basic example-->

                <hr class="my-5" />
              </section>
              <!--Section: Docs content-->
            </div>
            <!--Grid column-->

          </div>
          <!--Grid row-->
        </div>
        <!-- Overview panel -->
      </div>
      <!-- Panels -->