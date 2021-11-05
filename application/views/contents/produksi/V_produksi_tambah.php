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
                <form action="<?php echo base_url('produksi/next') ?>" method="GET">

                <?php

                    $kode = $this->input->get('kode');
                    $nama = $this->input->get('nama');
                    $deskripsi = $this->input->get('deskripsi');
                    $berat     = $this->input->get('berat');
                    $jumlah   = $this->input->get('jumlah');

                    // replace
                    $kode = $kode ? $kode : "";
                    $nama = $nama ? $nama : "";
                    $deskripsi = $deskripsi ? $deskripsi : "";
                    $berat     = $berat ? $berat : "";
                    $jumlah    = $jumlah ? $jumlah : "";

                ?>
                <section id="section-basic-example">
                  
                    <!-- Section title -->
                    <h2 class="mb-4">Tambah Produk</h2>

                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="semibold mb-3">Form</h4>
                                
                                <div class="mb-4">
                                    <label for="">Kode</label>
                                    <input type="text" name="kode" value="<?php echo $kode ?>" id="form154" class="form-control" placeholder="...">
                                    <small class="text-muted">Masukkan kode produk</small>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="">Nama Produk</label>
                                    <input type="text" name="nama" value="<?php echo $nama ?>" id="form154" class="form-control" placeholder="...">
                                    <small class="text-muted">Masukkan nama produk</small>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="">Deskripsi</label>
                                    <textarea name="deskripsi" id="" class="form-control" placeholder="..."><?php echo $deskripsi ?></textarea>
                                    <small class="text-muted">Masukkan deskripsi produk</small>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-4">
                                            <label for="">Berat</label>
                                            <input type="number" name="berat" id="form154" value="<?php echo $berat ?>" class="form-control" placeholder="...">
                                            <small class="text-muted">Satuan gram</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <label for="">Jumlah Varian</label>
                                            <input type="number" name="jumlah" value="<?php echo $jumlah ?>" id="form154" class="form-control" placeholder="...">
                                            <small class="text-muted">Masukkan jumlah variasi</small>
                                        </div>
                                    </div>

                                </div>
                                
                                <button type="submit" class="btn btn-primary">Lanjutkan Proses Berikutnya</button>
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