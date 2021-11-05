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
                  <h2 class="h1 fw-bold">Bahan Baku Utama</h2>

                  <!-- Seo title -->
                  <h1 class="h5">Mengatur informasi mengenai bahan baku pembuatan produk</h1>

                  <!-- Description -->
                  <p>
                    <?php echo date('d F Y H.i A') ?>
                  </p>
                </section>
                <!--Section: Introduction-->

                <hr class="my-5" />


                <div class="row">
                    
                    <!-- Detail atribut -->
                    <div class="col-md-7" style="border-right: 1px solid #e0e0e0;">

                        <section id="section-basic-example">

                            <!-- Section title -->
                            <h2 class="mb-4">Tabel Produk Biaya Pembuatan</h2>

                            <marquee behavior="" direction="">Isi mengenai detail pembuatan produk, harga, jumlah, dan estimasi pembuatan</marquee>
                            <small>Lengkapi informasi dibawah ini</small>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" width="5%">#</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Biaya Pembuatan</th>
                                        <th scope="col">Total Bahan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                

                                    if ( count($produk) > 0 ) {

                                    $i = 1;
                                    foreach ( $produk AS $row ) :
                                    
                                ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><b><?php echo $row['dt_produk']['nama_produk'] ?></b></td>
                                        <td>Rp <?php echo number_format($row['biaya']) ?></td>
                                        <td>
                                            <?php
                                            
                                                if ( $row['bahan'] > 0 ) {

                                                    echo $row['bahan'];
                                                } else echo '<label class="badge rounded-pill bg-danger">Belum memiliki bahan</label>';
                                            ?>
                                        </td>
                                        
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-default"
                                            	data-mdb-toggle="modal" data-mdb-target="#atur-bahan-<?php echo $row['dt_produk']['kd_produk'] ?>">Atur Bahan
                                            	Pembuatan</a>

                                            <div class="modal fade" id="atur-bahan-<?php echo $row['dt_produk']['kd_produk'] ?>" tabindex="-1" role="dialog"
                                            	aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            	<div class="modal-dialog modal-lg" role="document">
                                            		<div class="modal-content">
                                            			<div class="modal-header">
                                            				<h5 class="modal-title" id="exampleModalLabel">Ubah Produk</h5>
                                            				<button type="button" class="btn-close"
                                            					data-mdb-dismiss="modal" aria-label="Close"></button>
                                            			</div>

                                            			<form action="<?php echo base_url('bahan/ubahpembuatan/'. $row['dt_produk']['kd_produk']) ?>"
                                            				method="POST">
                                            				<div class="modal-body">
                                                                Penambahan bahan per-tanggal
                                                                <h2> <?php echo date('d F Y') ?></h2>
                                                                <table class="table">
                                                                    <tr>
                                                                        <th>Pilih</th>
                                                                        <th>Nama Bahan</th>
                                                                        <th>Kebutuhan Bahan <br>(<small>Misal 1 meter kain</small>)</th>
                                                                        <th>Kebutuhan Produk</th>
                                                                    </tr>

                                                                    <?php 
                            

                                                                        if ( $bahan->num_rows() > 0 ) {

                                                                        
                                                                        foreach ( $bahan->result_array() AS $row_b ) :

                                                                            
                                                                            // value 
                                                                            $checkbox = "";
                                                                            $kebutuhan_bahan = "";
                                                                            $kebutuhan_produk = "";
                                                                            

                                                                            if ( count($row['dt_pembuatan']) > 0 ) {

                                                                                foreach ( $row['dt_pembuatan'] AS $pem ) {

                                                                                    if ( ($row_b['kd_bahan'] == $pem['kd_bahan']) ){

                                                                                        $checkbox = "checked";
                                                                                        $kebutuhan_bahan = $pem['kebutuhan_bahan'];
                                                                                        $kebutuhan_produk= $pem['kebutuhan_produk'];
                                                                                    }
                                                                                }

                                                                            }
                                                                        
                                                                    ?>
                                                                        <tr>
                                                                            <td><input type="checkbox" name="item[]" value="<?php echo $row_b['kd_bahan'] ?>" <?php echo $checkbox ?>></td>
                                                                            <td><?php echo $row_b['kd_bahan'].' - '. $row_b['nama'] ?></td>
                                                                            <td><input type="text" class="form-control" name="keb_bahan[]" value="<?php echo $kebutuhan_bahan ?>"></td>
                                                                            <td>
                                                                                <input type="number" class="form-control" name="keb_produk[]" placeholder="qty" value="<?php echo $kebutuhan_produk ?>"> 
                                                                                <small>Harga <?php echo number_format($row_b['harga']).' per-item' ?></small>
                                                                            </td>

                                                                        </tr>

                                                                        <?php endforeach;
                                                                        
                                                                        } else {
                                                                        ?>

                                                                        <tr>
                                                                        <td colspan="4">Kosong</td>
                                                                        </tr>

                                                                        <?php } ?>
                                                                    
                                                                </table>
                                                            </div>
                                            				<div class="modal-footer">
                                            					<button type="button" class="btn btn-default"
                                            						data-mdb-dismiss="modal">
                                            						Batal
                                            					</button>
                                            					<button type="submit"
                                            						class="btn btn-success">Perbarui</button>
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
                    </div>
                    
                    
                    
                    
                    <div class="col-md-5">

                        <!--Section: Basic example-->
                        <section id="section-basic-example">
                        <!-- Section title -->
                        <h2 class="mb-4">Tabel Bahan</h2>

                        <a href="javascript:void(0)" data-mdb-toggle="modal" data-mdb-target="#tambah">Tambah Produk Baru</a><br>
                        <small>Klik untuk menambah baru</small>

                        <div class="modal fade" id="tambah" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="<?php echo base_url('bahan/prosestambah') ?>" method="POST">
                                        <div class="modal-body">
                                            <div class="mb-4">
                                                <label for="">Kode Bahan</label>
                                                <input type="text" name="kode" id="form154"
                                                    class="form-control" placeholder="...">
                                                <small class="text-muted">Masukkan kode</small>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="">Nama</label>
                                                <input type="text" name="nama" id="form154"
                                                    class="form-control" placeholder="...">
                                                <small class="text-muted">Masukkan nama</small>
                                            </div>

                                            <div class="mb-4">
                                                <label for="">Satuan</label>
                                                <input type="text" name="satuan"
                                                    id="form154" class="form-control" placeholder="...">
                                                <small class="text-muted">Masukkan nama</small>
                                            </div>

                                            <div class="mb-4">
                                                <label for="">Harga</label>
                                                <input type="number" name="harga"
                                                    id="form154" class="form-control" placeholder="...">
                                                <small class="text-muted">Masukkan nama</small>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-mdb-dismiss="modal">
                                                Batal
                                            </button>
                                            <button type="submit" class="btn btn-success">Tambah</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>








                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Satuan</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php 
                            

                                if ( $bahan->num_rows() > 0 ) {

                                $i = 1;
                                foreach ( $bahan->result_array() AS $row ) :
                                
                            ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $row['kd_bahan'].' - '. $row['nama'] ?></td>
                                    <td><?php echo $row['satuan'] ?></td>
                                    <td><?php echo $row['harga'] ?></td>
                                    <td>
                                        <button type="button" data-mdb-toggle="modal" data-mdb-target="#kd-<?php echo $row['kd_bahan'] ?>" class="btn btn-sm btn-warning" data-mdb-ripple-color="dark">Sunting</button>
                                        <a href="<?php echo base_url('bahan/delete/'. $row['kd_bahan']) ?>" onclick="return confirm('Apakah anda ingin menghapus data ini ?')" class="btn btn-sm btn-danger" data-mdb-ripple-color="dark">Hapus</a>



                                        <div class="modal fade" id="kd-<?php echo $row['kd_bahan'] ?>" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Sunting Bahan - <?php echo $row['kd_bahan'] ?></h5>
                                                        <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                            <form action="<?php echo base_url('bahan/update/'. $row['kd_bahan']) ?>" method="POST">
                                                    <div class="modal-body">
                                            <div class="mb-4">
                                                <label for="">Nama</label>
                                                <input type="text" name="nama" value="<?php echo $row['nama'] ?>" id="form154"
                                                    class="form-control" placeholder="...">
                                                <small class="text-muted">Masukkan nama</small>
                                            </div>

                                            <div class="mb-4">
                                                <label for="">Nama</label>
                                                <input type="text" name="satuan" value="<?php echo $row['satuan'] ?>" id="form154"
                                                    class="form-control" placeholder="...">
                                                <small class="text-muted">Masukkan nama</small>
                                            </div>

                                            <div class="mb-4">
                                                <label for="">Harga</label>
                                                <input type="number" name="harga" value="<?php echo $row['harga'] ?>" id="form154"
                                                    class="form-control" placeholder="...">
                                                <small class="text-muted">Masukkan nama</small>
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

                    </div>
                </div>

                

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