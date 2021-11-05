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
                  
                    <div class="row">
                        <div class="col-md-8">
                            <!-- Main title -->
                            <h2 class="h1 fw-bold">Penjualan Baru</h2>

                            <!-- Seo title -->
                            <h1 class="h5">Membuat permintaan penjualan baru</h1>

                            <!-- Description -->
                            <p>
                            	<?php echo date('d F Y H.i A') ?>
                            </p>
                        </div>
                        <div class="col-md-4">

                          <a href="javascript:void(0)" data-mdb-toggle="modal" data-mdb-target="#cart-display">
                            <h1><?php echo count($this->cart->contents()) ?> item</h1>
                          </a>
                          <b>Total Permintaan - klik untuk melihat</b>







                          <div class="modal fade" id="cart-display" tabindex="-1" role="dialog"
                          	aria-labelledby="exampleModalLabel" aria-hidden="true">
                          	<div class="modal-dialog" role="document">
                          		<div class="modal-content">
                          		
                                  <div class="modal-body">

                                    <?php 
                                    
                                    $kondisi = false;
                                    if ( count( $this->cart->contents() ) > 0 ) {
                                      
                                      $kondisi = true;  
                                    ?>
                                    <table class="table">
                                      <?php foreach ( $this->cart->contents() AS $row ) : ?>
                                      <tr>
                                        <td>
                                            <?php echo $row['name'] ?> <br> 
                                            Total Pembelian : <?php echo $row['qty'] ?> item
                                        </td>
                                        <td>
                                          <a href="<?php echo base_url('penjualan/remove/'. $row['rowid'].'?url=penjualan/proses') ?>">
                                            <i class="fas fa-times"></i>
                                          </a>
                                        </td>
                                      </tr>
                                      <?php endforeach; ?>
                                    </table>
                                    <?php } else {

                                      echo '<div class="text-center"><h2>Whoops !</h2>Tidak ada produk yang dipilih</div>';
                                    }  ?>
                                  </div>
                          				<div class="modal-footer">
                          					<button type="button" class="btn btn-default" data-mdb-dismiss="modal">
                          						Tutup
                          					</button>
                                    <?php if ( $kondisi ) { ?>
                          					<a href="<?php echo base_url('penjualan/proses') ?>" class="btn btn-dark">Lanjutkan Pencatatan</a>
                                    <?php } ?>
                          				</div>
                          			</form>

                          		</div>
                          	</div>
                          </div>

                          
                        </div>
                    </div>
                </section>
                <!--Section: Introduction-->


                <hr class="my-5" />
                
                <div class="row">
                    <div class="col-md-7" style="border-right: 1px solid #e0e0e0;">
                        <h3>Informasi Identitas</h3>
                        <form action="<?php echo base_url('penjualan/simpan') ?>" method="POST">
                        	
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="">Nama Pemesan</label>
                                        <input type="text" name="nama" id="form154" class="form-control" placeholder="...">
                                        <small class="text-muted">Masukkan nama pemesanan</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="">Email</label>
                                        <input type="email" name="email" id="form154" class="form-control" placeholder="...">
                                        <small class="text-muted">Masukkan email pemesanan</small>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-4">
                                        <label for="">Alamat</label>
                                        <textarea name="alamat" class="form-control" placeholder="..."></textarea>
                                        <small class="text-muted">Masukkan alamat</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label for="">Telp</label>
                                        <input type="number" name="telp" id="form154" class="form-control" placeholder="...">
                                        <small class="text-muted">Masukkan telepon pemesanan</small>
                                    </div>
                                </div>
                            </div>


                            <button class="btn btn-primary">Tambahkan dan Simpan</button>


                        </form>
                    </div>
                    <div class="col-md-4">

                        <h3>Detail Pembelian</h3>
                        <table class="table">
                            <?php foreach ( $this->cart->contents() AS $row ) : ?>
                            <tr>
                                <td>
                                    <?php echo $row['name'] ?> <br>
                                    Total Pembelian : <?php echo $row['qty'] ?> item
                                </td>
                                <td>
                                    <a href="<?php echo base_url('penjualan/remove/'. $row['rowid'].'?url=penjualan') ?>">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>


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