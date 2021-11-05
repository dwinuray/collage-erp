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
                  <h2 class="h1 fw-bold">Produksi Sepatu</h2>

                  <!-- Seo title -->
                  <h1 class="h5">Mengatur informasi nama dan variasi produk</h1>

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
                  <h2 class="mb-4">Tabel Varian dari Produk <?php echo $row['produk']['kd_produk'].', '.$row['produk']['nama_produk'] ?></h2>

                  <a href="#" data-mdb-toggle="modal" data-mdb-target="#tambah">Tambah Variasi Baru</a><br>
                  
                  
                  
                  
                  <div class="modal fade" id="tambah" tabindex="-1" role="dialog"
                  	aria-labelledby="exampleModalLabel" aria-hidden="true">
                  	<div class="modal-dialog modal-sm" role="document">
                  		<div class="modal-content">
                  			<div class="modal-header">
                  				<h5 class="modal-title" id="exampleModalLabel">Tambah Variasi Produk</h5>
                  				<button type="button" class="btn-close" data-mdb-dismiss="modal"
                  					aria-label="Close"></button>
                  			</div>

                  			<form action="<?php echo base_url('produksi/tambah_variasi/'. $row['produk']['kd_produk']) ?>"
                  				method="POST">
                  				<div class="modal-body">
                  					<div class="mb-4">
                  						<label for="">Kode Variasi</label>
                  						<input type="text" name="kode" id="form154" class="form-control" placeholder="...">
                  						<small class="text-muted">Masukkan kode variasi</small>
                  					</div>
                  					
                                    <div class="mb-4">
                  						<label for="">Nama Variasi</label>
                  						<input type="text" name="nama" id="form154" class="form-control" placeholder="...">
                  						<small class="text-muted">Masukkan nama variasi</small>
                  					</div>
                                    
                                    <div class="mb-4">
                  						<label for="">Harga</label>
                  						<input type="text" name="harga" id="form154" class="form-control" placeholder="...">
                  						<small class="text-muted">Masukkan harga variasi</small>
                  					</div>

                  				</div>
                  				<div class="modal-footer">
                  					<button type="button" class="btn btn-default" data-mdb-dismiss="modal">
                  						Batal
                  					</button>
                  					<button type="submit" class="btn btn-success">Tambahkan dan Simpan</button>
                  				</div>
                  			</form>

                  		</div>
                  	</div>
                  </div>





















                  <small>Klik untuk menambah baru</small>

                  <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" width="5%">#</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                      

                      if ( count($row['variasi']) > 0 ) {

                        $i = 1;
                        foreach ( $row['variasi'] AS $dt ) :
                      
                    ?>
                      <tr>
                          <td><?php echo $i++ ?></td>
                          <td><?php echo $dt['kd_varian'] ?></td>
                          <td><?php echo $dt['nama_varian'] ?></td>
                          <td><?php echo $dt['harga_varian'] ?></td>
                          <td>
                              <button type="button" data-mdb-toggle="modal" data-mdb-target="#kd-<?php echo $dt['kd_varian'] ?>" class="btn btn-sm btn-warning" data-mdb-ripple-color="dark">Sunting</button>
                              <a href="<?php echo base_url('produksi/deleteVarian/'. $dt['kd_varian'].'/'. $dt['kd_produk']) ?>" onclick="return confirm('Apakah anda ingin menghapus data ini ?')" class="btn btn-sm btn-danger" data-mdb-ripple-color="dark">Hapus</a>



                              <div class="modal fade" id="kd-<?php echo $dt['kd_varian'] ?>" tabindex="-1" role="dialog"
                                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Sunting Variasi - <?php echo $dt['kd_varian'] ?></h5>
                                              <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                                  aria-label="Close"></button>
                                          </div>

                                        <form action="<?php echo base_url('produksi/updatevarian/'. $dt['kd_varian'].'/'. $dt['kd_produk']) ?>" method="POST">
                                            <div class="modal-body">
                                                <div class="mb-4">
                                                    <label for="">Kode Variasi</label>
                                                    <input type="text" name="kode" value="<?php echo $dt['kd_varian'] ?>" id="form154"
                                                        class="form-control" placeholder="...">
                                                    <small class="text-muted">Masukkan kode variasi</small>
                                                </div>
                                                
                                                <div class="mb-4">
                                                    <label for="">Nama Produk</label>
                                                    <input type="text" name="nama" value="<?php echo $dt['nama_varian'] ?>" id="form154"
                                                        class="form-control" placeholder="...">
                                                    <small class="text-muted">Masukkan nama variasi</small>
                                                </div>
                                                
                                                <div class="mb-4">
                                                    <label for="">Harga</label>
                                                    <input type="number" name="harga" value="<?php echo $dt['harga_varian'] ?>" id="form154"
                                                        class="form-control" placeholder="...">
                                                    <small class="text-muted">Masukkan harga variasi</small>
                                                </div>

                                            </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                                                  Batal
                                              </button>
                                              <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
                        <td colspan="4">Kosong</td>
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