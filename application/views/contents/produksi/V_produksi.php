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
                  <h2 class="mb-4">Tabel Produk</h2>

                  <a href="<?php echo base_url('produksi/tambah') ?>">Tambah Produk Baru</a><br>
                  <small>Klik untuk menambah baru</small>

                  <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" width="5%">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Berat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                      <?php 
                      

                        if ( count($produk['produk']) > 0 ) {

                          $i = 1;
                          foreach ( $produk['produk'] AS $row ) :
                        
                      ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <img style="width: 50px" src="https://pertaniansehat.com/v01/wp-content/uploads/2015/08/default-placeholder.png" alt="">
                                    </div>
                                    <div class="col-sm-10">
                                        <a href="<?php echo base_url('produksi/detail/'. $row['kd_produk']) ?>">
                                          <b><?php echo $row['nama_produk'] ?></b><br>
                                          <small>Deskripsi : <?php echo $row['deskripsi'] ?></small>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <small>Berat Satuan</small><br>
                                <?php echo $row['berat'] ?> gram
                            </td>
                            <td>
                                <button type="button" data-mdb-toggle="modal" data-mdb-target="#kd-<?php echo $row['kd_produk'] ?>" class="btn btn-sm btn-warning" data-mdb-ripple-color="dark">Sunting</button>
                                <a href="<?php echo base_url('produksi/delete/'. $row['kd_produk']) ?>" onclick="return confirm('Apakah anda ingin menghapus data ini ?')" class="btn btn-sm btn-danger" data-mdb-ripple-color="dark">Hapus</a>



                                <div class="modal fade" id="kd-<?php echo $row['kd_produk'] ?>" tabindex="-1" role="dialog"
                                	aria-labelledby="exampleModalLabel" aria-hidden="true">
                                	<div class="modal-dialog" role="document">
                                		<div class="modal-content">
                                			<div class="modal-header">
                                				<h5 class="modal-title" id="exampleModalLabel">Sunting Produk - <?php echo $row['kd_produk'] ?></h5>
                                				<button type="button" class="btn-close" data-mdb-dismiss="modal"
                                					aria-label="Close"></button>
                                			</div>

                                      <form action="<?php echo base_url('produksi/update/'. $row['kd_produk']) ?>" method="POST">
                                			<div class="modal-body">
                                      <div class="mb-4">
                                      	<label for="">Nama Produk</label>
                                      	<input type="text" name="nama" value="<?php echo $row['nama_produk'] ?>" id="form154"
                                      		class="form-control" placeholder="...">
                                      	<small class="text-muted">Masukkan nama produk</small>
                                      </div>

                                      <div class="mb-4">
                                      	<label for="">Deskripsi</label>
                                      	<textarea name="deskripsi" id="" class="form-control"
                                      		placeholder="..."><?php echo $row['deskripsi'] ?></textarea>
                                      	<small class="text-muted">Masukkan deskripsi produk</small>
                                      </div>

                                      <div class="row">
                                      	<div class="col-md-3">
                                      		<div class="mb-4">
                                      			<label for="">Berat</label>
                                      			<input type="number" name="berat" id="form154" value="<?php echo $row['berat'] ?>"
                                      				class="form-control" placeholder="...">
                                      			<small class="text-muted">Satuan gram</small>
                                      		</div>
                                      	</div>
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