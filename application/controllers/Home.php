<?php
defined('BASEPATH') OR exit('anda siapa?');

class Home extends CI_Controller {
   public function __construct(){
    parent:: __construct();
}

public function index() {
    // Menentukan jumlah item konten yang akan ditampilkan per halaman
    $limit = 9;
    
    // Mengambil offset dari URL, digunakan untuk pagination (segment ke-3 di URL)
    // Misalnya, jika halaman kedua: segment ke-3 = 9 (menampilkan konten mulai dari item ke-10)
    $offset = $this->uri->segment(3, 0); 

    // Mengambil data dari tabel 'konfigurasi' untuk konfigurasi umum
    $this->db->from('konfigurasi');
    $konfig = $this->db->get()->row(); // Mengambil satu baris data konfigurasi

    // Mengambil semua data kategori dari tabel 'kategori' untuk menu navigasi
    $this->db->from('kategori');
    $kategori = $this->db->get()->result_array(); // Mengambil semua kategori sebagai array

    // Mengambil data dari tabel 'caraousel' untuk ditampilkan sebagai slideshow/banner
    $this->db->from('caraousel');
    $caraousel = $this->db->get()->result_array(); // Mengambil semua data carousel sebagai array

    // Mengambil data konten dari tabel 'konten' dengan join ke tabel 'kategori' dan 'user'
    $this->db->from('konten a'); // Alias 'a' untuk tabel 'konten'
    $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left'); // Join dengan tabel 'kategori' untuk mendapatkan informasi kategori
    $this->db->join('user c', 'a.username=c.username', 'left'); // Join dengan tabel 'user' untuk mendapatkan informasi pengguna
    $this->db->order_by('tanggal', 'DESC'); // Mengurutkan konten berdasarkan tanggal terbaru (descending)
    $this->db->limit($limit, $offset); // Membatasi jumlah konten yang ditampilkan sesuai $limit dan $offset
    $konten = $this->db->get()->result_array(); // Mengambil data konten sebagai array

    // Menghitung total jumlah konten untuk keperluan pagination
    $this->db->from('konten a'); // Mengambil data dari tabel 'konten' kembali
    $total_konten = $this->db->count_all_results(); // Menghitung total semua konten yang tersedia

    // Menyiapkan data untuk dikirimkan ke view 'user'
    $data = array(
        'judul' => "Beranda | Streamix",   // Judul halaman
        'konfig' => $konfig,              // Data konfigurasi
        'kategori' => $kategori,          // Data kategori untuk menu navigasi
        'caraousel' => $caraousel,        // Data carousel untuk slideshow
        'konten' => $konten,              // Data konten yang akan ditampilkan
        'total_konten' => $total_konten,  // Total jumlah konten untuk pagination
        'limit' => $limit,                // Batas jumlah konten per halaman
        'offset' => $offset               // Offset untuk pagination
    );

    // Memuat view 'user' dan mengirimkan data ke dalamnya
    $this->load->view('user', $data);
}

    
    public function artikel($id) {
        // Mengambil data konfigurasi dari tabel 'konfigurasi'
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row(); // Mengambil satu baris data konfigurasi
    
        // Mengambil semua data kategori dari tabel 'kategori' untuk navigasi atau menu
        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array(); // Mengambil semua kategori sebagai array
    
        // Mengambil data konten berdasarkan 'slug' yang diberikan
        $this->db->from('konten a'); // Mengambil data dari tabel 'konten' dengan alias 'a'
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left'); // Join dengan tabel 'kategori' untuk mendapatkan nama kategori
        $this->db->join('user c', 'a.username=c.username', 'left'); // Join dengan tabel 'user' untuk mendapatkan informasi pengguna yang membuat konten
        $this->db->where('slug', $id); // Menyaring data berdasarkan slug (identitas unik untuk artikel)
        $this->db->order_by('tanggal', 'DESC'); // Mengurutkan konten berdasarkan tanggal terbaru
        $konten = $this->db->get()->row(); // Mengambil satu baris data konten sebagai objek
    
        // Mengambil data komentar yang terkait dengan konten berdasarkan 'id_konten'
        $this->db->from('komen');
        $this->db->where('id_konten', $konten->id_konten); // Filter komentar berdasarkan 'id_konten' yang sesuai dengan konten
        $komen = $this->db->get()->result_array(); // Mengambil semua komentar sebagai array
    
        // Menyiapkan data untuk dikirim ke view 'detail'
        $data = array(
            'judul' => "$konten->judul | Anime", // Menyusun judul halaman dengan judul konten
            'konfig' => $konfig, // Data konfigurasi untuk kebutuhan tampilan umum
            'kategori' => $kategori, // Semua kategori untuk navigasi
            'konten' => $konten, // Data konten yang ditampilkan
            'komen' => $komen // Semua komentar yang terkait dengan konten
        );
    
        // Memuat view 'detail' dan mengirimkan data ke view tersebut
        $this->load->view('detail', $data);
    }
    

    public function kategori($id){
        // Mengambil data konfigurasi dari tabel 'konfigurasi'
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row(); // Mengambil satu baris data konfigurasi

        // Mengambil semua data kategori dari tabel 'kategori'
        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array(); // Mengambil semua kategori sebagai array

        // Mengambil data konten berdasarkan kategori yang dipilih
        $this->db->from('konten a'); // Mengambil data dari tabel 'konten' dengan alias 'a'
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left'); // Join dengan tabel 'kategori' untuk mendapatkan nama kategori
        $this->db->join('user c', 'a.username=c.username', 'left'); // Join dengan tabel 'user' untuk mendapatkan nama pengguna yang membuat konten
        $this->db->where('a.id_kategori', $id); // Menyaring konten berdasarkan 'id_kategori' yang diberikan
        $konten = $this->db->get()->result_array(); // Menjalankan query dan menyimpan hasilnya dalam bentuk array

        // Mengambil nama kategori berdasarkan 'id_kategori'
        $this->db->from('kategori');
      //  $kategori = $this->db->get()->result_array();
        $this->db->where('id_kategori',$id); // Filter kategori berdasarkan 'id_kategori' yang diberikan
        $nama_kategori = $this->db->get()->row()->nama_kategori; // Mengambil nama kategori sebagai string

        // Menyiapkan data untuk dikirim ke view 'kategori'
        $data = array(
            'judul' => $nama_kategori . " | Anime", // Mengatur judul halaman dengan nama kategori
            'nama_kategori' => $nama_kategori, // Menyimpan nama kategori
            'konfig' => $konfig, // Menyimpan data konfigurasi
            'kategori' => $kategori, // Menyimpan semua kategori untuk navigasi
            'konten' => $konten, // Menyimpan data konten berdasarkan kategori yang dipilih
        );
        // Memuat view 'kategori' dan mengirimkan data
         $this->load->view('kategori',$data);
    }
    function search(){
        // Menentukan jumlah item konten yang akan ditampilkan per halaman
        $limit = 9;
        
        // Mengambil offset dari URL, digunakan untuk pagination (segment ke-3 di URL)
        $offset = $this->uri->segment(3, 0); 
        
        // Ambil keyword pencarian jika ada
        $keyword = $this->input->get('keyword'); // Mengambil parameter 'keyword' dari query string
    
        // Ambil konfigurasi
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();
    
        // Ambil data carousel
        $this->db->from('caraousel');
        $caraousel = $this->db->get()->result_array();
    
        // Ambil kategori
        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();
    
        // Mengambil data konten dari tabel 'konten' dengan join ke tabel 'kategori' dan 'user'
        $this->db->from('konten a'); // Alias 'a' untuk tabel 'konten'
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left'); // Join dengan tabel 'kategori'
        $this->db->join('user c', 'a.username=c.username', 'left'); // Join dengan tabel 'user'
        
        // Jika ada keyword pencarian, tambahkan kondisi pencarian
        if ($keyword) {
            $this->db->like('a.judul', $keyword); // Pencarian di kolom judul
        }
        
        $this->db->order_by('tanggal', 'DESC'); // Mengurutkan berdasarkan tanggal terbaru
        $this->db->limit($limit, $offset); // Membatasi jumlah konten yang ditampilkan
        $konten = $this->db->get()->result_array(); // Mengambil data konten
    
        // Menghitung total jumlah konten untuk keperluan pagination
        $this->db->from('konten a'); // Mengambil data dari tabel 'konten' kembali
        $total_konten = $this->db->count_all_results(); // Menghitung total semua konten yang tersedia
    
        // Menyiapkan data untuk view
        $data = array(
            'judul'  => "Beranda - Hasil Pencarian",
            'konfig' => $konfig,
            'kategori' => $kategori,
            'caraousel' => $caraousel,
            'konten' => $konten,
            'total_konten' => $total_konten,  // Total jumlah konten untuk pagination
            'limit' => $limit,                // Batas jumlah konten per halaman
            'offset' => $offset    
        );
    
        // Load view dengan data yang sudah diproses
        $this->load->view('user', $data);
    }
    

    // Fungsi untuk menangani penyimpanan komentar ke dalam database
public function komen() {
    // Mengambil nilai 'id_konten' dari input formulir (POST)
    $id_konten = $this->input->post('id_konten');
    
    // Mengambil nilai 'username' dari input formulir (POST)
    $username = $this->input->post('username');
    
    // Mengambil nilai 'isi_komen' dari input formulir (POST)
    $isi_komen = $this->input->post('isi_komen');

    // Menyiapkan data yang akan dimasukkan ke dalam tabel 'komen'
    $data = array(
        'id_konten' => $id_konten,            // ID konten yang dikomentari
        'isi_komen' => $isi_komen,            // Isi komentar
        'username' => $username,              // Nama pengguna yang mengomentari
        'tanggal' => date('Y-m-d H:i:s')      // Waktu komentar dibuat, menggunakan format 'Y-m-d H:i:s'
    );

    // Memasukkan data komentar ke dalam tabel 'komen'
    $this->db->insert('komen', $data);

    // Mengambil slug konten berdasarkan 'id_konten' untuk keperluan redirect
    $slug = $this->get_slug_by_id($id_konten);

    // Redirect ke halaman detail artikel dengan slug yang sesuai
    redirect('home/artikel/' . $slug);
}

// Fungsi untuk mengambil slug berdasarkan 'id_konten'
public function get_slug_by_id($id_konten) {
    // Mengambil data dari tabel 'konten' dengan kondisi 'id_konten' sesuai parameter
    $this->db->from('konten');
    $this->db->where('id_konten', $id_konten);

    // Mengambil satu baris data dari hasil query
    $konten = $this->db->get()->row();

    // Mengembalikan nilai slug dari konten tersebut
    return $konten->slug;
}


    // Fungsi untuk menambahkan komentar ke dalam database
public function add_komen() {
    // Ambil data 'id_konten' dari input formulir (POST)
    $id_konten = $this->input->post('id_konten'); // ID konten yang dikomentari
    
    // Ambil data 'username' dari input formulir (POST)
    $username = $this->input->post('username');   // Nama pengguna yang memberi komentar
    
    // Ambil data 'isi_komen' dari input formulir (POST)
    $isi_komen = $this->input->post('isi_komen'); // Isi komentar dari pengguna

    // Validasi input: Pastikan semua field tidak kosong
    if (empty($id_konten) || empty($username) || empty($isi_komen)) {
        show_error('Semua data harus diisi.', 400); // Tampilkan pesan error jika ada data yang kosong
        return; // Hentikan eksekusi fungsi
    }

    // Siapkan data untuk dimasukkan ke dalam database
    $data = array(
        'id_konten' => $id_konten, // Menghubungkan komentar dengan ID konten
        'username' => $username,   // Menyimpan nama pengguna
        'isi_komen' => $isi_komen, // Menyimpan isi komentar
    );

    // Masukkan data ke dalam tabel 'komen'
    $this->db->insert('komen', $data);

    // Redirect kembali ke halaman konten berdasarkan 'id_konten'
    redirect('video/' . $id_konten);
}

    

    function saran(){
        $id = $this->input->post('id'); // Ambil ID Artikel

        $data = array(
            'isi_saran' => $this->input->post('isi_saran'),
            'username' => $this->input->post('username'),
        );

        $this->db->insert('komen', $data);
        redirect('home/artikel/' . $id); // Redirect ke artikel yang tepat
    }
    public function rating() {
        // Cek apakah pengguna sudah login
        if (!$this->session->userdata('logged_in')) {
            // Simpan halaman yang ingin diakses setelah login (halaman konten untuk rating)
            $this->session->set_userdata('redirect_url', current_url());
            
            // Arahkan pengguna ke halaman login
            redirect('auth/login');
        }
        
        // Ambil data id_konten dan rating dari form input
        $id_konten = $this->input->post('id_konten');
        $rating = $this->input->post('rating');
    
        // Validasi input
        if (empty($id_konten) || empty($rating)) {
            show_error('Semua data harus diisi.', 400);
            return;
        }
    
        // Siapkan data untuk insert ke tabel rating
        $data = array(
            'id_konten' => $id_konten,
            'rating' => $rating,
            'tanggal' => date('Y-m-d H:i:s')
        );
    
        // Masukkan data ke database
        $this->db->insert('rating', $data);
    
        // Redirect kembali ke halaman konten (detail artikel)
        $slug = $this->get_slug_by_id($id_konten);
        redirect('home/artikel/' . $slug);
    }
    
    
    
    
}
?>
