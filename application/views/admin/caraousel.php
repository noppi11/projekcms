
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
          <h3>Caraousel Konten</h3>
          <div class="row ">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-warning btn-fw" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Caraousel
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Kategori</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form class="forms-sample" action="<?= base_url('caraousel/simpan')?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_caraousel" value="<?= $this->uri->segment(3,0)?>">
                        <div class="modal-body">
                        <div class="form-group">
                        <label for="exampleInputName1">Judul</label>
                        <input type="text" class="form-control"  placeholder="judul konten anda" name="judul">
                      </div>
                        </div>
                        <div class="modal-body">
                    <div class="form-group">
                    <label for="exampleInputName1">Foto</label>
                    <input type="file" class="form-control"  name="foto" accept="image/png,image/jpeg,image/jpg" >
                  </div>
                    </div>
                        <div class="modal-footer"  type="submit">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                        </div>
                    
                    </div>
                    </div>
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
                            <th> Judul</th>
                            <th> Foto</th>
                            <th> Aksi </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach($caraousel as $user):?>
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td><?= $user['judul']?></td>
                            <td>
                              <img src="<?= base_url().'./tema/upload/caraousel/'.$user['foto']?>" width="200px" alt=""></td>
                           <td>
                           <div>
                            <a onClick="return confirm('Apakah kamu sungguh ingin menghapusnya?')"
                                href="<?= site_url('caraousel/delete/'.$user['id_caraousel'])?>"><button type="button" 
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