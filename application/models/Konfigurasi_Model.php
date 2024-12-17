
<?php
class Konfigurasi_Model extends CI_Model{

    function update(){
        $where = array('id_konfigurasi' => 1);
        $data = array(
            'judul_website' => $this->input->post('judul_website'),
            'profil_website' => $this->input->post('profil_website'),
            'instagram' => $this->input->post('instagram'),
            'facebook' => $this->input->post('facebook'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'no_wa' => $this->input->post('no_wa')
        );
       // $this->db->where('id_konfigurasi', $this->input->post('id_konfigurasi'));
        $this->db->update('konfigurasi', $data);
    }
}