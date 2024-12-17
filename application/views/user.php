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
    <link rel="stylesheet" href="<?php echo base_url('') ?>tema/stocker-1.0.0/lib/animate/animate.min.css"/>
    <link href="<?php echo base_url('') ?>tema/stocker-1.0.0/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url('') ?>tema/stocker-1.0.0/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url('') ?>tema/stocker-1.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo base_url('') ?>tema/stocker-1.0.0/css/style.css" rel="stylesheet">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


    <style>
    .search-container {
        display: flex;
        align-items: center;
    }
    .search-container input {
        width: 200px;
        margin-right: 10px; /* Jarak antara input dan tombol */
    }
.star {
    font-size: 30px; /* Ukuran bintang */
    color: #ccc; /* Warna bintang tidak aktif */
    cursor: pointer;
}
.star.selected {
    color: #f39c12; /* Warna bintang aktif */
}
.fa-star {
    color: #d3d3d3; /* Warna bintang kosong (abu-abu) */
    font-size: 20px;
}

.fa-star.checked {
    color: #f39c12; /* Warna bintang terisi (kuning/oranye) */
}

</style>
    
   
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid topbar bg-light px-5 d-none d-lg-block">
            <div class="row gx-0 align-items-center">
                <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <a href="<?= base_url('auth')?>"><small class="me-3 text-dark"><i class="fa fa-user text-primary me-2"></i>Login</small></a>
                        <a href="<?= base_url('auth/logout')?>"><small class="me-3 text-dark"><i class="fa fa-sign-in-alt text-primary me-2"></i>Log out</small></a>
                       
                    </div>
                </div>
            </div>
        </div>
    <!-- Topbar End -->

    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
                <h1 class="text-primary"><?= $konfig->judul_website ?></h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="<?base_url('home/index')?>" class="nav-item nav-link active">Home</a>
                    <?php foreach ($kategori as $user){?>
                    <a href="<?= base_url('home/kategori/'.$user['id_kategori'])?>" class="nav-item nav-link">
                    <?=$user['nama_kategori']?>
                    </a>
                    <?php } ?>
                </div>
            </div>
            <div >
            <form class="search-container" action="<?= base_url('home/search') ?>" method="GET"> 
            
            <input 
                class="form-control mr-sm-2" 
                type="search" 
                name="keyword" 
                placeholder="Cari..." 
                aria-label="Search"
                style="width: 200px;" 
            >
            <button 
                class="btn btn-outline-success my-2 my-sm-0" 
                type="submit">
                Search
            </button>
            </form>
            </div>
        </nav>

        <!-- Carousel Start -->
        <div class="header-carousel owl-carousel custom-carousel">
         <?php foreach ($caraousel as $user){?>
            <div class="header-carousel-item">
                
                <img src="<?php echo base_url('').'./tema/upload/caraousel/'.$user['foto'] ?>" class="img-fluid w-100" alt="Image">
                
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row gy-0 gx-5">
                            <div class="col-lg-0 col-xl-5"></div>
                            <div class="col-xl-7 animated fadeInLeft">
                                <div class="text-sm-center text-md-end">
                                <h4 class="text-primary text-uppercase fw-bold mb-4">Welcome To Dunia Streamix </h4>
                                        <h1 class="display-4 text-uppercase text-white mb-4">Your Mix of Endless Streaming.</h1>
                                        <p class="mb-5 fs-5">platform web streaming modern yang menawarkan pengalaman menonton tanpa batas untuk berbagai
                                             jenis konten, mulai dari film, serial, acara TV, hingga konten orisinal eksklusif 
                                        </p>
                                        <div class="d-flex justify-content-center justify-content-md-end flex-shrink-0 mb-4">
                                            <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i class="fas fa-play-circle me-2"></i> Tonton Video</a>
                                            <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2" href="#">Membaca Artikel</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-carousel-item" >
                <img src="<?php echo base_url('').'./tema/upload/caraousel/'.$user['foto'] ?>" class="img-fluid w-100" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row g-5">
                            <div class="col-12 animated fadeInUp">
                                <div class="text-center">
                                <h4 class="text-primary text-uppercase fw-bold mb-4">Welcome To Dunia Streamix </h4>
                                        <h1 class="display-4 text-uppercase text-white mb-4">tonton dan nikmati petualangan seru di dunia Streamix !</h1>
                                        <p class="mb-5 fs-5">Selami dunia Streamix yang penuh imajinasi! Nikmati update terkini, ulasan mendalam, dan rekomendasi pilihan
                                             untuk menemani perjalanan Anda menjelajahi kisah-kisah epik dan karakter favorit. 
                                        </p>
                                        <div class="d-flex justify-content-center flex-shrink-0 mb-4">
                                            <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i class="fas fa-play-circle me-2"></i> Watch Video</a>
                                            <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2" href="#">Learn More</a>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
       <!--  -->
        <!-- Carousel End -->
    </div>
    <!-- Navbar & Hero End -->


    <!-- Abvout Start -->
    <div class="container-fluid about py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-xl-7 wow fadeInLeft" data-wow-delay="0.2s">
                  
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Services Start -->
    <div class="container-fluid service pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            </div>
            <div class="row g-4">
            <?php foreach ($konten as $user){?>
                    <?php
                        // Ambil rata-rata rating untuk setiap konten berdasarkan id_konten
                        $this->db->select_avg('rating');
                        $this->db->from('rating');
                        $this->db->where('id_konten', $user['id_konten']);
                        $avg_rating = $this->db->get()->row()->rating;
                    ?>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s" >
                    <div class="service-item">
                        <div class="service-img width-300px">
                            <img src="<?= base_url('tema/upload/konten/'.$user['foto'])?>" class="img-fluid rounded-top" alt="Image">
                        </div>
                        <div class="rounded-bottom p-4">
                            <a href="#" class="h4 d-inline-block mb-4"> <?= $user['judul']?></a>
                            <div class="d-flex justify-content mb-3">
                                <small class="mr-3"><i class="fa fa-folder text-primary"></i>  <?= $user['nama_kategori']?></small>
                            </div>
                            <p><?= $user['deskripsi']?></p>
                            <!-- Menampilkan rating berbentuk bintang -->
<div id="rating" class="mb-3">
    <?php if ($avg_rating): ?>
        <p> Rating : 
            <?php 
                $rating = round($avg_rating); 
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $rating) {
                        echo '<span class="fa fa-star checked"></span>';
                    } else {
                        echo '<span class="fa fa-star"></span>';
                    }
                }
            ?>
            <span><?= number_format($avg_rating, 1) ?> / 5</span>
        </p>
    <?php else: ?>
        <p>Belum ada rating.</p>
    <?php endif; ?>
</div>

                            <a class="btn btn-primary rounded-pill py-2 px-4" href="<?= base_url('home/artikel/'.$user['slug'])?>">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Tombol Pagination -->
    <div class="pagination-container">
        <nav  aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php 
        $total_pages = ceil($total_konten / $limit);  // Menghitung jumlah total halaman
        $current_page = ($offset / $limit) + 1;  // Menghitung halaman saat ini
        ?>

        <!-- Tombol Previous -->
        <?php if ($current_page > 1): ?>
            <li class="page-item"><a class="page-link" href="<?= site_url('home/index/'.($offset - $limit)) ?>">Previous</a></li>
        <?php else: ?>
            <li class="page-item disabled"><span class="page-link">Previous</span></li>
        <?php endif; ?>

        <!-- Tombol Halaman -->
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item <?= ($i == $current_page) ? 'active' : '' ?>">
                <a class="page-link" href="<?= site_url('home/index/'.(($i - 1) * $limit)) ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>
            <!-- Tombol Next -->
        <?php if ($current_page < $total_pages): ?>
            <li class="page-item"><a class="page-link" href="<?= site_url('home/index/'.($offset + $limit)) ?>">Next</a></li>
        <?php else: ?>
            <li class="page-item disabled"><span class="page-link">Next</span></li>
        <?php endif; ?>
    </ul>
  </nav>
		</div>
    <!-- Footer Start -->
    <div></div>
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
const stars = document.querySelectorAll('.star');
const ratingValue = document.getElementById('selected-rating');

stars.forEach(star => {
    star.addEventListener('click', () => {
        const value = star.getAttribute('data-value');
        updateRating(value);
    });
});

function updateRating(value) {
    stars.forEach(star => {
        star.classList.remove('selected');
    });

    for (let i = 0; i < value; i++) {
        stars[i].classList.add('selected');
    }

    ratingValue.textContent = value; // Update nilai rating
}
// Menambahkan event listener untuk interaksi rating
document.querySelectorAll('.fa-star').forEach((star, index) => {
    star.addEventListener('click', function() {
        // Simpan rating berdasarkan bintang yang diklik
        let rating = index + 1;
        alert('Anda memberikan rating: ' + rating + ' bintang');
        // Kirim rating ini ke server untuk diproses
    });
});
