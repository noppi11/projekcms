
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #f8f9fa; /* Warna latar belakang halaman */
            color: #212529; /* Warna teks gelap */
        }
        .content-wrapper {
            background-color: #ffffff; /* Warna latar belakang untuk content-wrapper */
            padding: 20px; /* Tambahkan padding untuk jarak */
            border-radius: 5px; /* Tambahkan border-radius untuk sudut yang lebih halus */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Tambahkan bayangan untuk efek kedalaman */
        }
        .card {
            background-color: #ffffff; /* Warna latar belakang kartu */
        }
        .btn-primary {
            background-color: #007bff; /* Warna tombol primary */
            border-color: #007bff; /* Warna border tombol primary */
        }
        .btn-dark {
            background-color: #343a40; /* Warna tombol dark */
            border-color: #343a40; /* Warna border tombol dark */
        }
        .form-control {
            background-color: #ffffff; /* Warna latar belakang input */
            color: #495057; /* Warna teks input */
        }
    </style>
</head>
<body>
<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<form action="<?= base_url('konfigurasi/update')?>" method="post">
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tambah Konfigurasi</h4>
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputName1">Judul Website</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Judul" name="judul_website" value="<?= $konfig->judul_website; ?>">
                      </div>
                      <div class="form-group">
                        <label for="">Profil Website</label>
                        <textarea name="profil_website" class="form-control" id="" rows="4" >
                        <?= $konfig->profil_website; ?>
                        </textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Instagram</label>
                        <input name = "instagram" type="text" class="form-control" id="exampleInputPassword4" placeholder="Nama Instagram" value="<?= $konfig->instagram; ?>" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Facebook</label>
                        <input name = "facebook" type="text" class="form-control" id="exampleInputCity1" placeholder="Facebook" value="<?= $konfig->facebook; ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Email</label>
                        <input name = "email" type="email" class="form-control" id="exampleInputPassword4" placeholder=" Masukkan Email" value="<?= $konfig->email; ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Alamat</label>
                        <input name = "alamat" type="text" class="form-control" id="exampleInputPassword4" placeholder="Masukkan Alamat Anda" value="<?= $konfig->alamat; ?>" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">No WA</label>
                        <input name = "no_wa" class="form-control" id="exampleInputPassword4" placeholder="Masukkan No Telepon Anda" value="<?= $konfig->no_wa; ?>" >
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <?php echo form_close();?>
                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div> 
</body>
</html>