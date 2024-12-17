<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    /* Light theme styles */
    body {
      background-color: #f8f9fa; /* Light background color */
      color: #495057; /* Dark text for good readability */
      font-family: Arial, sans-serif;
    }
    
    .main-panel {
      background-color: #ffffff; /* White background for main content */
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .content-wrapper {
      background-color: #ffffff; /* White background */
      padding: 20px;
      border-radius: 8px;
    }
    
    h3 {
      color: #343a40; /* Dark color for headings */
      font-size: 1.75rem;
      margin-bottom: 20px;
    }

    .btn {
      border-radius: 5px;
      font-weight: bold;
      padding: 8px 16px;
    }

    .btn-outline-warning {
      border: 2px solid #ffc107;
      color: #ffc107;
      background-color: transparent;
    }
    .btn-outline-warning:hover {
      background-color: #ffc107;
      color: #fff;
    }
    .btn-outline-success {
      border: 2px solid #28a745;
      color: #28a745;
      background-color: transparent;
    }
    .btn-outline-success:hover {
      background-color: #28a745;
      color: #fff;
    }
    .btn-outline-danger {
      border: 2px solid #dc3545;
      color: #dc3545;
      background-color: transparent;
    }
    .btn-outline-danger:hover {
      background-color: #dc3545;
      color: #fff;
    }

    /* Modal Styles */
    .modal-content {
      background-color: #ffffff;
      border-radius: 8px;
    }
    .modal-header {
      background-color: #f1f1f1;
      border-bottom: 1px solid #ddd;
      color: #343a40;
    }
    .modal-footer {
      background-color: #f1f1f1;
    }

    .form {
      border-radius: 5px;
      box-shadow: none;
      border: 1px solid #ced4da;
      background-color: #ffffff;
      color: #ffffff;
    }
    .form-control:focus {
      border-color: #80bdff;
      box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
    }
    .input:focus, textarea:focus, select:focus {
  background-color: #ffffff; /* Warna latar belakang putih */
  color: #000000; /* Warna teks hitam */
  border: 1px solid #007bff; /* Border berwarna biru (opsional) */
  outline: none; /* Hapus garis fokus default */
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Efek shadow (opsional) */
}

    .table {
      width: 100%;
      margin-bottom: 1rem;
      color: #495057;
    }
    .table thead {
      background-color: #f8f9fa;
    }
    .table th, .table td {
      text-align: left;
      padding: 8px;
    }
    .table-striped tbody tr:nth-of-type(odd) {
      background-color: #f2f2f2;
    }

    .table a {
      color: #007bff;
    }
    .table a:hover {
      text-decoration: underline;
    }

    .form-check-input {
      margin-top: 0.3rem;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .content-wrapper {
        padding: 10px;
      }
    }
   

  </style>
</head>
<body>

<div class="main-panel col-12">
      <div class="content-wrapper">
        <div class="row">
        </div>
      <h3>Kategori Konten</h3>
      <div class="row ">
        
        <!-- Button trigger modal -->
<button type="button" class="btn btn-outline-warning btn-fw" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah Konten
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-light text-dark">
            <div class="modal-header bg-light text-dark">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Konten</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="forms-sample" action="<?= base_url('konten/simpan') ?>" method="post" enctype='multipart/form-data'>
                <input type="hidden" name="id_konten" value="<?= $this->uri->segment(3, 0) ?>">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" placeholder="Masukkan judul" name="judul">
                    </div>
                    <div class="form-group mb-3">
                        <label for="id_kategori">Kategori</label>
                        <select name="id_kategori" id="id_kategori" class="form-select">
                            <?php foreach ($kategori as $user) : ?>
                                <option value="<?= $user['id_kategori'] ?>"><?= $user['nama_kategori'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="keterangan"><?= set_value('keterangan') ?></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" id="deskripsi"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal">
                    </div>
                    <div class="form-group mb-3">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" placeholder="Foto" name="foto" id="foto" accept="image/png,image/jpeg,image/jpg">
                    </div>
                    <div class="form-group mb-3">
                        <label for="video">Video</label>
                        <input type="text" class="form-control" placeholder="Masukkan link video" name="video" id="video">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
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
                        <th>Keterangan</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Foto</th>
                        <th>Video</th>
                        <th> Aksi </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($konten as $user):?>
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
                          <?= substr($user['keterangan'],0,100);?>
                          <?php if(strlen($user['keterangan']) > 100):?>
                            ...<a href="<?=base_url('home/artikel/'.$user['slug'])?>">baca selengkapnya</a>
                            <?php endif;?>
                        </td>
                        <td><?= $user['deskripsi']?></td>
                        <td><?= $user['tanggal']?></td> 
                        <td>
                          <a href="<?= base_url('tema/upload/konten/'.$user['foto'])?>">
                        <span class="mdi mdi-magnify"></span>lihat foto</a> 
                          <td>
                          <?php if (!empty($konten->video)):?>
            <div class="youtube-player">
                <iframe 
                width="100%"
                height="200"
                src="https://www.youtube.com/embed/<?=$konten->video?>"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>

                </iframe>
            </div>
        <?php endif ?>
                          </td>
                        <td>
                          <div>
                            <!-- Button trigger modal for Edit -->
                        <!-- Assuming you have a button to trigger the edit modal, you can add it like this -->
                        <!-- This button should be placed inside the table where you want to edit the content -->
                        <a href="#" data-bs-toggle="modal" data-bs-target="#editModal<?= $user['id_konten']?>">
                            <button type="button" class="btn btn-outline-success btn-fw">
                                Edit
                            </button>
                        </a>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal<?= $user['id_konten']?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editModalLabel">Edit Konten</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="forms-sample" action="<?= base_url('konten/update')?>" method="post" enctype='multipart/form-data'>
                                        <input type="hidden" name="id_konten" value="<?= $user['id_konten']?>">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="editJudul">Judul</label>
                                                <input type="text" class="form-control" id="editJudul" name="judul" value="<?= $user['judul']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="editKategori">Kategori</label>
                                                <select name="id_kategori" id="editKategori">
                                                    <?php foreach ($kategori as $kategori_item): ?>
                                                        <option value="<?= $kategori_item['id_kategori']?>" <?= $kategori_item['id_kategori'] == $user['id_kategori'] ? 'selected' : '' ?>>
                                                            <?= $kategori_item['nama_kategori']?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="editKeterangan">Keterangan</label>
                                                <textarea name="keterangan" class="form-control" id="editKeterangan"><?= $user['keterangan']?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="editKeterangan">Deskripsi</label>
                                                <textarea name="keterangan" class="form-control" id="editdeskripsi"><?= $user['deskripsi']?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="editTanggal">Tanggal</label>
                                                <input type="date" class="form-control" id="editTanggal" name="tanggal" value="<?= $user['tanggal']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="editFoto">Foto</label>
                                                <input type="file" class="form-control" id="editFoto" name="foto" value="<?= $user['foto']?>" accept="image/png,image/jpeg,image/jpg">
                                                <small>Biarkan kosong jika tidak ingin mengubah foto.</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="editVideo">Video</label>
                                                <input type="text" class="form-control" id="editVideo" name="video" value="<?= $user['video']?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                          </div>
                        <div>
                        <a onClick="return confirm('Apakah kamu sungguh ingin menghapusnya?')"
                            href="<?= site_url('konten/delete/'.$user['id_konten'])?>"><button type="button" 
                            class="btn btn-outline-danger btn-fw">Delete</button>
                            </div>
                        </td>
                      </tr>
                      
                   
                    </tbody>
                    <?php endforeach;?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
          
</body>
</html>