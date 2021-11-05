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
                                          <a href="<?php echo base_url('penjualan/remove/'. $row['rowid'].'?url=penjualan') ?>">
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


                <section id="section-cart">

                  <h3>Daftar Produk</h3>
                  <small>Klik untuk menambahkan permintaan baru</small>

                  <div class="row">


                    <?php 
                      

                      if ( count($produk['produk']) > 0 ) {

                        $i = 1;
                        foreach ( $produk['produk'] AS $row ) :
                      
                    ?>



                      <div class="col-md-3">
                      	<div class="card hover-shadow" style="border: 1px solid #e0e0e0">
                      		<div class="card-body">
                      			<h5 class="dark-grey-text"><?php echo $row['nama_produk'] ?></h5>
                      			<p class="text-muted">
                      				<?php echo $row['deskripsi'] ?>

                              <br></br>
                              <label class="badge bg-danger">Berat : <?php echo $row['berat'] ?> gr</label>
                      			</p>
                      			<a href="<?php echo base_url('penjualan/add/'. $row['kd_produk']) ?>">
                      				<div class="mask"></div>
                      			</a>
                      		</div>
                      	</div>
                      </div>


                      <?php endforeach;
                        
                        } else echo '<h1>Tidak ada produk yang ditampilkan</h1>';
                        ?>
                  </div>
                </section>



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