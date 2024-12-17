<?php
defined('BASEPATH') OR exit('anda siapa?');

class Buku extends CI_Controller {

    public function index(){
        $this->load->model('Buku_Model');
        $data['books'] = $this->Buku_Model->get_all_buku();
        //var_dump($data->nama);
        $this->load->view('daftar_buku',$data);
        //echo "Selamat Datang di Toko Buku Dongeng";
    }

    public function tambah(){
        $this->load->view('tambah_buku');
    }

    function simpan(){

        $this->form_validation->set_rules('nama','Nama Buku','required');
        $this->form_validation->set_rules('deskripsi','Deskripsi Buku','required');
        if ($this->form_validation->run() == FALSE){
            $this->load->view('tambah_buku');
        } else {
            $this->load->model('Buku_Model');
            $this->Buku_Model->add_book();
            redirect(site_url('/'));
            //echo"berhasil";
        }
       // var_dump($this->input->post());
    }

    function delete($id){
        $this->load->model('Buku_Model');
        $this->Buku_Model->delete_book($id);
        redirect(site_url('/'));
    }

    function edit($id){
        $this->load->model('Buku_Model');
        $data['buku'] = $this->Buku_Model->get_book_by_id($id);
        $this->load->view('edit_buku',$data);
    }

    function update(){
       $this->load->model('Buku_Model');
       $this->Buku_Model->update_book();
       redirect(site_url('/'));
    }
}

?>