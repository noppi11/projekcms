<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_model extends CI_Model {

    /**
     * Menambahkan konten dan video ke database.
     * @param array $konten_data Data untuk tabel `konten`.
     * @param array $video_data Data untuk tabel `video`.
     * @return bool True jika berhasil, false jika gagal.
     */
    public function add_video( $video_data) {
        return $this->db->insert('videos', $video_data);
        // Insert ke tabel `konten`
        //$this->db->insert('videos', $konten_data);
        //$id_video = $this->db->insert_id(); // Ambil ID konten yang baru dibuat

        // Jika berhasil, tambahkan data video
        //if ($id_video) {
            //$video_data['id_video'] = $id_video; // Tambahkan foreign key ke data video
          //  return $this->db->insert('video', $video_data);
        ///}
        //return false;
    }

    /**
     * Mendapatkan semua data konten beserta video terkait.
     * @return array Daftar semua konten dan video terkait.
     */
    public function get_all_videos() {
        $this->db->select('konten.*, videos.url');
        $this->db->from('konten');
        $this->db->join('videos', 'konten.id_konten = videos.id_konten', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Mendapatkan video berdasarkan ID konten.
     * @param int $id_konten ID konten.
     * @return object|null Data video terkait atau null jika tidak ditemukan.
     */
    public function get_video_by_konten($id_konten) {
        $this->db->select('*');
        $this->db->from('videos');
        $this->db->where('id_konten', $id_konten);
        $query = $this->db->get();
        return $query->row(); // Mengembalikan satu baris data
    }

    /**
     * Menghapus video dan konten terkait.
     * @param int $id_konten ID konten yang ingin dihapus.
     * @return bool True jika berhasil, false jika gagal.
     */
    public function delete_video($id_konten) {
        // Hapus video terlebih dahulu
        $this->db->where('id_konten', $id_konten);
        $this->db->delete('videos');

        // Hapus konten
        $this->db->where('id_konten', $id_konten);
        return $this->db->delete('konten');
    }

    /**
     * Memperbarui konten dan video.
     * @param int $id_konten ID konten yang ingin diperbarui.
     * @param array $konten_data Data baru untuk tabel `konten`.
     * @param array $video_data Data baru untuk tabel `video`.
     * @return bool True jika berhasil, false jika gagal.
     */
    public function update_video($id_konten, $konten_data, $video_data) {
        // Update data di tabel `konten`
        $this->db->where('id_konten', $id_konten);
        $this->db->update('konten', $konten_data);

        // Update data di tabel `video`
        $this->db->where('id_konten', $id_konten);
        return $this->db->update('videos', $video_data);
    }
}
