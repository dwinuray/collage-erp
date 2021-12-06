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
                  <h2 class="h1 fw-bold">Karyawan</h2>

                  <!-- Seo title -->
                  <h1 class="h5">Informasi karyawan yang bekerja</h1>

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
                  <h2 class="mb-4">Tabel Karyawan Perusahaan</h2>

                  <a href="javascript:void(0)" data-mdb-toggle="modal" data-mdb-target="#tambah">Tambah Baru</a><br>
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

                                    <form action="<?php echo base_url() ?>karyawan/prosestambah" method="POST">
                                        <div class="modal-body">
                                            <div class="mb-4">
                                                <label for="">Kode Pegawai</label>
                                                <input type="text" name="kode" id="form154"
                                                    class="form-control" placeholder="...">
                                                <small class="text-muted">Masukkan kode</small>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="">Nama</label>
                                                <input type="text" name="nama" id="form154"
                                                    class="form-control" placeholder="...">
                                                <small class="text-muted">Masukkan nama pegawai</small>
                                            </div>

                                            <div class="mb-4">
                                                <label for="">Jenis Kelamin</label>
                                                <select name="jkl" id="" class="form-control">
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                                <small class="text-muted">Pilh jenis kelamin</small>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <label for="">Jobdesk</label>
                                                <textarea name="jobdesk" class="form-control" placeholder="Jobdesk pegawai"></textarea>
                                                <small class="text-muted">Deksripsikan bagian pekerjaan</small>
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
                            <th scope="col">Kode</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Jobdesk</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1; foreach ( $pegawai->result_array() as $row ) : ?>

                            <tr>

                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['kd_pegawai'] ?></td>
                                <td><?php echo $row['nama'] ?></td>
                                <td><?php echo $row['jkl'] == "L" ? "Laki-laki" : "Perempuan" ?></td>
                                <td><?php echo $row['jobdesk'] ?></td>
                                <td>
                                    <button type="button" data-mdb-toggle="modal" data-mdb-target="#kd-<?php echo $row['kd_pegawai'] ?>" class="btn btn-sm btn-warning" data-mdb-ripple-color="dark">Sunting</button>
                                    <a href="<?php echo base_url('karyawan/delete/'. $row['kd_pegawai']) ?>" onclick="return confirm('Apakah anda ingin menghapus data ini ?')" class="btn btn-sm btn-danger" data-mdb-ripple-color="dark">Hapus</a>



                                    <div class="modal fade" id="kd-<?php echo $row['kd_pegawai'] ?>" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                    <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <form action="<?php echo base_url('karyawan/update/'. $row['kd_pegawai']) ?>" method="POST">
                                                    <div class="modal-body">
                                                        <div class="mb-4">
                                                            <label for="">Kode Pegawai</label>
                                                            <input type="text" name="kode" id="form154" value="<?php echo $row['kd_pegawai'] ?>"
                                                                class="form-control" placeholder="...">
                                                            <small class="text-muted">Masukkan kode</small>
                                                        </div>
                                                        
                                                        <div class="mb-4">
                                                            <label for="">Nama</label>
                                                            <input type="text" name="nama" id="form154" value="<?php echo $row['nama'] ?>"
                                                                class="form-control" placeholder="...">
                                                            <small class="text-muted">Masukkan nama pegawai</small>
                                                        </div>

                                                        <div class="mb-4">
                                                            <label for="">Jenis Kelamin</label>
                                                            <select name="jkl" id="" class="form-control">
                                                                <option value="L" <?php if ( $row['jkl'] == "L" ) echo 'selected="selected"'; ?>>Laki-laki</option>
                                                                <option value="P" <?php if ( $row['jkl'] == "P" ) echo 'selected="selected"'; ?>>Perempuan</option>
                                                            </select>
                                                            <small class="text-muted">Pilh jenis kelamin</small>
                                                        </div>
                                                        
                                                        <div class="mb-4">
                                                            <label for="">Jobdesk</label>
                                                            <textarea name="jobdesk" class="form-control" placeholder="Jobdesk pegawai"><?php echo $row['jobdesk'] ?></textarea>
                                                            <small class="text-muted">Deksripsikan bagian pekerjaan</small>
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
                                </td>
                            </tr>


                        <?php endforeach; ?>
                     
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