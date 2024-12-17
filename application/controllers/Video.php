<?php
defined('BASEPATH') OR exit('anda siapa?');

class Video extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        if ($this->session->userdata('level')==NULL){
            redirect('auth');
        }
    }

    public function index($slug)
    {
        // Mengambil konfigurasi
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();
    
        // Mengambil daftar kategori
        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();
    
        // Mengambil detail video berdasarkan slug
        $this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
        $this->db->join('user c', 'a.username=c.username', 'left');
        $this->db->where('a.slug', $slug);
        $konten = $this->db->get()->row();
    
        // Jika video tidak ditemukan
        if (!$konten) {
            show_404();
            return;
        }
    
        // Mengambil komentar untuk video ini
        $this->db->from('komen');
        $this->db->where('id_konten', $konten->id_konten);
        $komen = $this->db->get()->result_array();
    
        // Data yang akan dikirim ke view
        $data = array(
            'judul' => "$konten->judul | Video Detail",
            'konfig' => $konfig,
            'kategori' => $kategori,
            'konten' => $konten,
            'komen' => $komen
        );
    
        // Menampilkan halaman detail video
        $this->load->view('video', $data);
    }
    

    function komen(){
        $id_konten = $this->input->post('id_konten');
        $username = $this->input->post('username');
        $isi_komen = $this->input->post('isi_komen');
        //$id = $this->input->post('id'); // Ambil ID Artikel

        $data = array(
            'id_konten' => $id_konten,
            'isi_komen' => $isi_komen,
            'username' => $username,
            'tanggal' => date('Y-m-d H:i:s')
        );

        $this->db->insert('komen', $data);
        $slug = $this->get_slug_by_id($id_konten);
        redirect('home/artikel/' . $slug); // Redirect ke artikel yang tepat
    }

    function get_slug_by_id($id_konten) {
        $this->db->from('konten');
        $this->db->where('id_konten', $id_konten);
        $konten = $this->db->get()->row();
        return $konten->slug;

    }

    public function add_komen() {
        // Ambil data dari input form
        $id_konten = $this->input->post('id_konten'); // ID konten dari form
        $username = $this->input->post('username');           // Nama pengguna
        $isi_komen = $this->input->post('isi_komen');             // Isi komentar
    
        // Validasi input
        if (empty($id_konten) || empty($username) || empty($isi_komen)) {
            show_error('Semua data harus diisi.', 400);
            return;
        }
    
        // Siapkan data untuk insert
        $data = array(
            'id_konten' => $id_konten,
            'username' => $username,
            'isi_komen' => $isi_komen,
        );
    
        // Masukkan ke database
        $this->db->insert('komen', $data);
    
        // Redirect kembali ke halaman konten
        redirect('home/artikel/' . $id_konten);
    }
    

   
    function rating(){

    }
    function video($slug){
        
        /**
         * 1. ambil data video yang paling terlama dari slug
         * 
          SELECT videos.url FROM konten 
          join konten_video on konten.id_konten = konten_video.id_konten
          join videos on konten_video.id_video = videos.id_video
          where slug='One-Piece'
          ORDER by videos.id_video ASC
          LIMIT 1;
         * 
         * 2. tampilkan video di dalam view
         *  video sorce  
         */

    }
}
?>
