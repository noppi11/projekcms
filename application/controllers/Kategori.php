<?php
defined('BASEPATH') OR exit('anda petugas?');

class Kategori extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        //if ($this->session->userdata('level')==NULL){
           // redirect('auth');
        //}
    }
    public function index(){
       // $this->db->from('kategori');
        //$this->db->order_by('nama_kategori','ASC');
        //$kategori = $this->db->get()->result_array();
        $data['kategori'] = $this->Kategori_Model->get_all_kategori();
        //$data = array('user' => $users);
        //$this->load->model('User_Model');
        //$data['users'] = $this->User_Model->get_all_user();
        $this->load->view('template/head');
        $this->load->view('template/sidebar');
        $this->load->view('admin/kategori', $data);
        $this->load->view('template/java');

    }

    public function tambah(){
        $data = array (
            'title' => 'Form Tambah Penguna',
            'judul' => 'Halaman tambah user'
        );
        $this->load->view('template/head');
        $this->load->view('admin/tambah_user');
        $this->load->view('template/java');
       
    }
    function simpan(){
        $this->db->from('kategori');
        $this->db->where('nama_kategori',$this->input->post('nama_kategori'));
        $cek = $this->db->get()->result_array();
        if($cek<>NULL){
            $this->session->set_flashdata('alert','
            <div class="alert alert-danger" role="alert">nama kategori sudah digunakan</div>');
        redirect(site_url('kategori'));
        }
        $data = array(
            'nama_kategori'  => $this->input->post('nama_kategori')
        );
        $this->db->insert('kategori',$data);
        $this->session->set_flashdata('alert','
        <div class="col-sm-6 col-md-4 col-lg-3">
        <i class="mdi mdi-account-outline"></i>
                 selamat berhasil tersimpan
                </div>');
        redirect(site_url('kategori'));
            //echo"berhasil";
        }

       // var_dump($this->input->post());

    function delete($id_kategori){
        $this->load->model('Kategori_Model');
        $this->Kategori_Model->delete_kategori($id_kategori);
        redirect(site_url('kategori'));
    }

    function edit($id_kategori){
       
        $this->load->model('Kategori_Model');
        $data['kategori'] = $this->Kategori_Model->get_kategori_by_id($id_kategori);
        //$this->load->view('template/head');
        //$this->load->view('admin/edit_user',$data);
        //$this->load->view('template/java');
    }

    function update(){
       $this->load->model('Kategori_Model');
       $this->Kategori_Model->update_kategori();
       redirect(site_url('kategori'));
    }
   
  
}