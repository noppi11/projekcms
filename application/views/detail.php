
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title><?= $judul; ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="<?php echo base_url('') ?>tema/stocker-1.0.0/lib/animate/animate.min.css" rel="stylesheet">
        <link href="<?php echo base_url('') ?>tema/stocker-1.0.0/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="<?php echo base_url('') ?>tema/stocker-1.0.0/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="<?php echo base_url('') ?>tema/stocker-1.0.0/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="<?php echo base_url('') ?>tema/stocker-1.0.0/css/style.css" rel="stylesheet">
        <style>
            .rating-section {
    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    margin: auto;
}

.rating-section h4 {
    font-size: 1.5rem;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.rating-stars {
    font-size: 2rem;
    color: #ccc;
    cursor: pointer;
    margin-bottom: 10px;
}

.rating-stars label {
    margin-right: 5px;
    color: #f39c12;
}

.rating-stars label:hover,
.rating-stars label.active {
    color: #e67e22;
}

select.form-control {
    padding: 10px;
    font-size: 1rem;
    border-radius: 5px;
    border: 1px solid #ccc;
}

button.btn-primary {
    background-color: #3498db;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    font-size: 1rem;
}

button.btn-primary:hover {
    background-color: #2980b9;
}

        </style>
    </head>

    <body>

        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0 ">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary"><i></i><?= $konfig->judul_website ?></h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="index.html" class="nav-item nav-link">Home</a>
                        <?php foreach ($kategori as $user){?>
                        <a href="<?= base_url('home/kategori/'.$user['id_kategori'])?>" class="nav-item nav-link">
                        <?=$user['nama_kategori']?>
                        </a>
                        <?php } ?>
                    </div>
                </div>
            </nav>

            <!-- Header Start -->
            <!-- Header End -->
        </div>
        <!-- Navbar & Hero End -->
<p></p>
<div></div>
        <div class="container-fluid about py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-xl-7 wow fadeInLeft" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                        <div>
                            <h4 class="text-primary"><?= $konten->nama_kategori; ?></h4>
                            <h1 class="display-5 mb-4"><?= $konten->judul; ?></h1>
                            <div class="single-post-content">
                            <?php 
                            $paragraphs = explode("\n", $konten->keterangan);
                            foreach ($paragraphs as $paragraph): 
                                if (trim($paragraph) != ''): // Pastikan tidak ada paragraf kosong
                            ?>
                                <p><?= $paragraph; ?></p>
                            <?php 
                                endif;
                            endforeach; 
                            ?>
                        </div>
                            
                            
                            </p>
                            <div class="row g-4">
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <div class="d-flex">
                                        <div><i class="fas fa-lightbulb fa-3x text-primary"></i></div>
                                        <div class="ms-4">
                                            <h4>Terakhir Diupdate</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <div class="d-flex">
                                        <div><i class="bi bi-bookmark-heart-fill fa-3x text-primary"></i></div>
                                        <div class="ms-4">
                                            <h4>Tambah Ke Favorit</h4>
                                            <p>Tambahkan ke favorit untuk dapat dengan mudah mengaksesnya kapan saja nanti.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <a href="<?= base_url('video/'.$konten->slug)?>" class="btn btn-primary rounded-pill py-3 px-5 flex-shrink-0">Tonton Sekarang</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 wow fadeInRight" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInRight;">
                        <div class="bg-primary rounded position-relative overflow-hidden">
                            <img src="<?= base_url('tema/upload/konten/'.$konten->foto)?>" class="img-fluid rounded w-100" alt="">
                            
                        </div>
                    </div>
                </div>
            </div>
<div class="rating-section">
    <h4>Berikan Rating:</h4>
    <form action="<?= site_url('home/rating') ?>" method="POST">
        <input type="hidden" name="id_konten" value="<?= $konten->id_konten ?>">

        <div class="form-group">
            <label for="rating" class="d-block">Pilih Rating</label>
            <div class="rating-stars">
                <label for="rating-1" class="star">&#9733;</label>
                <label for="rating-2" class="star">&#9733;</label>
                <label for="rating-3" class="star">&#9733;</label>
                <label for="rating-4" class="star">&#9733;</label>
                <label for="rating-5" class="star">&#9733;</label>
            </div>
            <select name="rating" id="rating" class="form-control" required>
                <option value="">Pilih Rating</option>
                <option value="1">1 Bintang</option>
                <option value="2">2 Bintang</option>
                <option value="3">3 Bintang</option>
                <option value="4">4 Bintang</option>
                <option value="5">5 Bintang</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Kirim Rating</button>
    </form>
</div>

</div>


        <!-- Footer Start -->
        <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
            <div class="container py-5 border-start-0 border-end-0" style="border: 1px solid; border-color: rgb(255, 255, 255, 0.08);">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-4">
                        <div class="footer-item">
                            <a href="index.html" class="p-0">
                                <h4 class="text-white"><i></i><?= $konfig->judul_website ?></h4>
                                <!-- <img src="img/logo.png" alt="Logo"> -->
                            </a>
                            <p class="mb-4"><?= $konfig->profil_website ?></p>
                        </div>
                    </div> 
                    <div class="col-md-6 col-lg-6 col-xl-2">
                        <div class="footer-item">
                            <h4 class="text-white mb-4">Quick Links</h4>
                            <a href="<?= base_url() ?>"><i class="fas fa-angle-right me-2"></i> Home</a>
                            <?php foreach ($kategori as $user){?>
                        <a href="<?= base_url('home/kategori/'.$user['id_kategori'])?>">
                        <i class="fas fa-angle-right me-2"></i> <?=$user['nama_kategori']?></a>
                        <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item">
                            <h4 class="text-white mb-4">Support</h4>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Privacy Policy</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Terms & Conditions</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Disclaimer</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Support</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> FAQ</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Help</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item">
                            <h4 class="text-white mb-4">Contact Info</h4>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-map-marker-alt text-primary me-3"></i>
                                <p class="text-white mb-0"><?= $konfig->alamat; ?></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-envelope text-primary me-3"></i>
                                <p class="text-white mb-0"><?= $konfig->email; ?></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fa fa-phone-alt text-primary me-3"></i>
                                <p class="text-white mb-0"><?= $konfig->no_wa; ?></p>
                            </div>
                            <p></p>
                            <div class="d-flex">
                                <a class="btn btn-primary btn-sm-square rounded-circle me-3" href="<?= $konfig->facebook; ?>"><i class="fab fa-facebook-f text-white"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-circle me-3" href="#"><i class="fab fa-twitter text-white"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-circle me-3" href="<?= $konfig->facebook; ?>"><i class="fab fa-instagram text-white"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-circle me-0" href="#"><i class="fab fa-linkedin-in text-white"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Copyright Start -->
        <div class="container-fluid copyright py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-md-0">
                        <span class="text-body"><a href="#" class="border-bottom text-white"><i class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 text-center text-md-end text-body">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Designed By <a class="border-bottom text-white" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a class="border-bottom text-white" href="https://themewagon.com">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url('') ?>tema/stocker-1.0.0/lib/wow/wow.min.js"></script>
        <script src="<?php echo base_url('') ?>tema/stocker-1.0.0/lib/easing/easing.min.js"></script>
        <script src="<?php echo base_url('') ?>tema/stocker-1.0.0/lib/waypoints/waypoints.min.js"></script>
        <script src="<?php echo base_url('') ?>tema/stocker-1.0.0/lib/counterup/counterup.min.js"></script>
        <script src="<?php echo base_url('') ?>tema/stocker-1.0.0/lib/lightbox/js/lightbox.min.js"></script>
        <script src="<?php echo base_url('') ?>tema/stocker-1.0.0/lib/owlcarousel/owl.carousel.min.js"></script>
        

        <!-- Template Javascript -->
        <script src="<?php echo base_url('') ?>tema/stocker-1.0.0/js/main.js"></script>
        <script>
        $(document).ready(function() {
        $('#submitSuggestion').on('click', function() {
            const name = $('#name').val();
            const email = $('#email').val();
            const suggestion = $('#suggestion').val();

            if (name && email && suggestion) {
                $.ajax({
                    type: "POST",
                    url: "submit_saran.php", // Ganti dengan URL endpoint Anda
                    data: {
                        name: name,
                        email: email,
                        suggestion: suggestion
                    },
                    success: function(response) {
                        alert('Saran Anda telah terkirim!');
                        $('#suggestionModal').modal('hide');
                        $('#suggestionForm')[0].reset();
                    },
                    error: function() {
                        alert('Terjadi kesalahan, silakan coba lagi.');
                    }
                });
            } else {
                alert('Silakan lengkapi semua field!');
            }
        });
    });
    document.querySelectorAll('.rating-stars label').forEach((star, index) => {
        star.addEventListener('click', function () {
            // Pilih rating yang sesuai dengan bintang yang diklik
            document.getElementById('rating').value = index + 1;

            // Menandai bintang yang dipilih
            document.querySelectorAll('.rating-stars label').forEach((label, i) => {
                if (i <= index) {
                    label.classList.add('active');
                } else {
                    label.classList.remove('active');
                }
            });
        });
    });
</script>
    </body>

</html>