<?php
defined('BASEPATH') OR exit('anda petugas?');

class Caraousel extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        //if ($this->session->userdata('level')==NULL){
           // redirect('auth');
        //}
    }
    public function index(){

       // $this->load->model('Konten_Model');
        //$data['konten'] = $this->Konten_Model->get_all_konten();
        //$this->load->view('admin/daftar_produk',$data);
       $this->db->from('caraousel');
       $caraousel = $this->db->get()->result_array();
       $data = array(
            'judul_halaman' => 'Hal Caraousel',
            'caraousel' => $caraousel
         );
        //$data['kategori'] = $this->Kategori_Model->get_all_kategori();
        //$data = array('user' => $users);
        //$this->load->model('User_Model');
        //$data['users'] = $this->User_Model->get_all_user();
        $this->load->view('template/head');
        $this->load->view('template/sidebar');
        $this->load->view('admin/caraousel', $data);
        $this->load->view('template/java');

    }

    public function tambah(){
        $this->db->from('kategori');
        $this->db->order_by('nama_kategori','ASC');
        $konten = $this->db->get()->result_array();
        $data = array (
            'title' => 'Form Tambah Penguna',
            'kategori' => $kategori
        );
        $this->load->view('template/head');
        $this->load->view('admin/tambah_user');
        $this->load->view('template/java');
        
    } 

    function simpan(){
        $judul = $this->input->post('judul');
        $foto = $_FILES['foto']['name'];
        if ($foto = ''){}else{
            $namafoto = date('YmdHis').'jpg';
            $config['upload_path']          = './tema/upload/caraousel/';
            //$config['max-size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['file_name']            = $namafoto;
        
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')){
            echo "gambar gagal diupload!" . $this->upload->display_errors();
        } else {
            $foto = $this->upload->data('file_name');
        }
       }
        $data = array(
            'judul'  => $judul, //$this->input->post('judul'),
             //$this->input->post('id_kategori'),
            //'keterangan'   => $keterangan,
            //'id_kategori'  => $id_kategori,
            //'keterangan'  => $this->input->post('keterangan'),
            //'tanggal'  =>$tanggal, //date('Y-m-d'),
            'foto'  => $foto
            //'username'  => $this->session->userdata('username'),
            //'slug'  => str_replace(' ','-',$this->input->post('judul')),
            );
        //$this ->db->insert('konten',$data);
        //$this->session->set_flashdata('alert','
        //<div class="col-sm-6 col-md-4 col-lg-3">
        //<i class="mdi mdi-account-outline"></i>
                 //selamat berhasil tersimpan
                //</div>');
        //redirect(site_url('konten'));
            //echo"berhasil";
             // var_dump($this->input->post());
             //$this->Konten_Model->add_contents($data, 'konten');
             //redirect('konten');
             $this->db->insert('caraousel', $data);
             redirect('caraousel');
     }

     function delete($id_caraousel){
        $this->load->model('Caraousel_Model');
        $this->Caraousel_Model->delete_caraousel($id_caraousel);
        redirect(site_url('caraousel'));
    }

    function edit($id_konten){
       
        $this->load->model('Konten_Model');
        $data['kategori'] = $this->Konten_Model->get_konten_by_id($id_konten);
        //$this->load->view('template/head');
        //$this->load->view('admin/edit_user',$data);
        //$this->load->view('template/java');
    }

    function update(){
       $this->load->model('Caraousel_Model');
       $this->Caraousel_Model->update_caraousel();
       redirect(site_url('caraousel'));
    }
                   
}