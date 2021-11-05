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
                <form action="<?php echo base_url('produksi/prosestambah') ?>" method="POST">

                <?php
                
                    $jumlah   = $this->input->get('jumlah');
                    $jumlah    = $jumlah ? $jumlah : "";

                ?>


                <input type="hidden" name="kd_produk" value="<?php echo $this->input->get('kode') ?>">
                <input type="hidden" name="nama" value="<?php echo $this->input->get('nama') ?>">
                <input type="hidden" name="deskripsi" value="<?php echo $this->input->get('deskripsi') ?>">
                <input type="hidden" name="berat" value="<?php echo $this->input->get('berat') ?>">

                <section id="section-basic-example">
                  
                    <!-- Section title -->
                    <h2 class="mb-4">Tambah Produk Variasi</h2>

                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="semibold mb-3">Form Tambah Variasi</h4>

                                <table class="table table-stripe">
                                    
                                    <?php for ( $i = 1; $i <= intval($jumlah); $i++) : ?>
                                    <tr>
                                        <td colspan="3"><b>Variasi ke - <?php echo $i ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="mb-4">
                                                <input type="text" name="kode[]" id="form154" class="form-control" placeholder="Kode Variasi">
                                                <small class="text-muted">Masukkan kode variasi</small>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mb-4">
                                                <input type="text" name="variasi[]" id="form154" class="form-control" placeholder="Nama Variasi">
                                                <small class="text-muted">Masukkan nama variasi</small>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mb-4">
                                                <input type="text" name="harga[]" id="form154" class="form-control" placeholder="Harga">
                                                <small class="text-muted">Masukkan harga</small>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endfor; ?>
                                </table>
                                    
                                    <a href="<?php echo base_url('produksi/tambah?') . $_SERVER['QUERY_STRING'] ?>" onclick="return confirm('Jika kembali semua variasi yang anda isi akan hilang ?')" class="btn btn-default">Kembali</a>
                                    <button type="submit" class="btn btn-success">Tambahkan dan Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                </form>
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