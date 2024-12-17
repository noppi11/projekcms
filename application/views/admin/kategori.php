
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
    <style>
        body {
            background-color: #f8f9fa; /* Warna latar belakang terang */
            color: #212529; /* Warna teks gelap */
        }
        .table {
            background-color: #ffffff; /* Warna latar belakang tabel */
        }
        .table th {
            background-color: #e9ecef; /* Warna latar belakang header tabel */
        }
        .table tr:hover {
            background-color: #f1f1f1; /* Warna latar belakang saat hover */
        }
        .modal-content {
            background-color: #ffffff; /* Warna latar belakang modal */
        }
        .content-wrapper {
            background-color: #fefefe; /* Warna latar belakang terang untuk content-wrapper */
            padding: 20px; /* Tambahkan padding untuk jarak di dalam content-wrapper */
            border-radius: 5px; /* Tambahkan border-radius untuk sudut yang lebih halus */
        }
    </style>
</head>
<body>
        <div class="main-panel col-12">
          <div class="content-wrapper">
            <div class="row">
            </div>
          <h3>Kategori Konten</h3>
          <div></div>
          <p></p>
          <div class="row ">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-warning btn-fw" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Kategori
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Kategori</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form class="forms-sample" action="<?= base_url('kategori/simpan')?>" method="post">
                        <div class="modal-body">
                        <div class="form-group">
                        <label for="exampleInputName1">kategori</label>
                        <input type="text" class="form-control"  placeholder="nama_kategori" name="nama_kategori">
                      </div>
                        </div>
                        <div class="modal-footer"  type="button">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                        </div>
                    
                    </div>
                    </div>
                    <div></div>
                    <p></p>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </th>
                            <th> Nama Kategori Konten</th>
                            <th> Aksi </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach($kategori as $user):?>
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td><?= $user->nama_kategori;?></td>
                            <td>
                            <!-- Button to trigger the modal -->
                            <button type="button" class="btn btn-outline-success btn-fw" data-bs-toggle="modal" data-bs-target="#editKategoriModal<?= $user->id_kategori ?>">
                              Edit Nama Kategori
                            </button>

                            <!-- Modal for Editing Kategori -->
                            <div class="modal fade" id="editKategoriModal<?= $user->id_kategori ?>" tabindex="-1" aria-labelledby="editKategoriModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="editKategoriModalLabel">Edit Nama Kategori</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <!-- Form for editing the category -->
                                    <form action="<?= site_url('kategori/update') ?>" method="post">
                                      <!-- Hidden field for Category ID -->
                                      <input type="hidden" name="id_kategori" value="<?= $user->id_kategori ?>">

                                      <!-- Field for Category Name -->
                                      <div class="mb-3">
                                        <label for="nama_kategori" class="form-label">Nama Kategori</label>
                                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= $user->nama_kategori ?>" required>
                                      </div>

                                      <!-- Display error messages if any -->
                                      <?php if ($this->session->flashdata('alert')): ?>
                                        <div class="alert alert-danger">
                                          <?= $this->session->flashdata('alert') ?>
                                        </div>
                                      <?php endif; ?>

                                      <!-- Modal footer with buttons -->
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <p></p>
                            <div>
                            <a onClick="return confirm('Apakah kamu sungguh ingin menghapusnya?')"
                                href="<?= site_url('kategori/delete/'.$user->id_kategori)?>"><button type="button" 
                                class="btn btn-outline-danger btn-fw">Delete</button>
                                </div>
                            </td>
                          </tr>
                          
                        <?php endforeach;?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  </body>
</html>