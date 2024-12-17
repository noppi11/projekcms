<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Video_Model'); // Memuat model
    }

    public function index() {
        $data['videos'] = $this->Video_Model->get_all_videos(); // Ambil semua video
        $this->load->view('template/head');
        $this->load->view('template/sidebar');
        $this->load->view('template/java');
        $this->load->view('admin/video', $data); // Tampilkan view
    }


    public function add() {
        $this->load->view('add_video'); // Tampilkan form untuk menambahkan video
    }

    public function simpan($id_konten) {
        // Ambil data video dari form
        $video_data = $this->input->post('videos'); // Berupa array

        // Simpan semua video terkait
        foreach ($video_data as $video) {
            $video['id_konten'] = $id_konten; // Tambahkan ID konten
            $this->Video_model->add_video($video);
        }

        $this->session->set_flashdata('message', 'Video berhasil ditambahkan ke konten!');
        redirect('video/view_content/' . $id_konten);
    }

    public function submit_video() {
       // $konten_data = [
         //   'title' => $this->input->post('title'),
           // 'tanggal' => $this->input->post('tanggal'),
        //];
        $video_data = [
            'title' => $this->input->post('title'),
            'tanggal' => $this->input->post('tanggal'),
            'url' => $this->input->post('url'),
        ];
    
        if ($this->Video_model->add_video($konten_data, $video_data)) {
            $this->session->set_flashdata('message', 'Video berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('message', 'Gagal menambahkan video.');
        }
        redirect('video');
    }
    
    public function delete($id) {
    // Panggil model untuk menghapus video
    $this->Video_Model->delete_video($id);
    
    // Redirect kembali ke halaman video setelah menghapus
    redirect('video'); 
}
}