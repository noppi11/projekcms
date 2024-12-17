<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Video</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Kelola Video</h1>

        <!-- Tampilkan pesan flashdata jika ada -->
        <?php if ($this->session->flashdata('message')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('message'); ?>
            </div>
        <?php endif; ?>

        <!-- Tombol untuk membuka modal tambah video -->
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addVideoModal">
            Tambah Video
        </button>

        <!-- Tabel Daftar Video -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Video</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($konten)): ?>
                    <?php foreach ($konten as $k): ?>
                        <?php $video = $this->Video_Model->get_video_by_konten($k->id_konten); ?>
                        <tr>
                            <td><?php echo $k->title; ?></td>
                            <td><?php echo $k->tanggal; ?></td>
                            <td>
                                <?php if ($video): ?>
                                    <!-- Embed YouTube video -->
                                    <iframe 
                                        width="200" 
                                        height="113" 
                                        src="https://www.youtube.com/embed/<?php echo parse_youtube_id($video->youtube_url); ?>" 
                                        frameborder="0" 
                                        allowfullscreen>
                                    </iframe>
                                <?php else: ?>
                                    <p>Video tidak ditemukan.</p>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada video yang tersedia.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah Video -->
    <div class="modal fade" id="addVideoModal" tabindex="-1" role="dialog" aria-labelledby="addVideoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addVideoModalLabel">Tambah Video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo site_url('video/save_videos'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Judul Video</label>
                            <input type="text" class="form-control" name="title" id="title" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Tanggal Upload</label>
                            <input type="date" class="form-control" name="tanggal" id="category" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="youtube_url">URL YouTube</label>
                            <input type="url" class="form-control" name="url" id="youtube_url" placeholder="https://www.youtube.com/watch?v=..." required>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
