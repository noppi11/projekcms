<?php
defined('BASEPATH') OR exit('anda petugas?');

class Konten extends CI_Controller {
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
       $this->db->from('kategori');
        $this->db->order_by('nama_kategori','ASC');
       $kategori = $this->db->get()->result_array();

        $this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori');
       // $this->db->order_by('tanggal','DESC');
        $konten = $this->db->get()->result_array();
        
        $data = array(
            'kategori' => $kategori,
            'konten' => $konten
        );
        //$data['kategori'] = $this->Kategori_Model->get_all_kategori();
        //$data = array('user' => $users);
        //$this->load->model('User_Model');
        //$data['users'] = $this->User_Model->get_all_user();
        $this->load->view('template/head');
        $this->load->view('template/sidebar');
        $this->load->view('admin/konten', $data);
        $this->load->view('template/java');

    }

    public function tambah(){
        $data = array (
            'title' => 'Form Tambah Penguna',
            'judul' => 'Halaman'
        );
        $this->load->view('template/head');
        $this->load->view('admin/tambah_user');
        $this->load->view('template/java');
        
    } 

    function simpan(){
        $judul = $this->input->post('judul');
        $keterangan = $this->input->post('keterangan');
        $deskripsi = $this->input->post('deskripsi');
        $id_kategori = $this->input->post('id_kategori');
        $tanggal = $this->input->post('tanggal');
        $foto = $_FILES['foto']['name'];
        if ($foto = ''){}else{
            $namafoto = date('YmdHis').'.jpg';
            $config['upload_path']          = 'tema/upload/konten/';
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

       $video = $this->input->post('video');
        $data = array(
            'judul'  => $judul, //$this->input->post('judul'),
             //$this->input->post('id_kategori'),
            'keterangan'   => $keterangan,
            'deskripsi'   => $deskripsi,
            'id_kategori'  => $id_kategori,
            //'keterangan'  => $this->input->post('keterangan'),
            'tanggal'  =>$tanggal, //date('Y-m-d'),
            'foto'  => $foto,
            'video' => $video,
            //'username'  => $this->session->userdata('username'),
            'slug'  => str_replace(' ','-',$this->input->post('judul')),
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
             $this->Konten_Model->add_contents($data, 'konten');
             redirect('konten');
             //$this->db->insert('konten, $data');
             //redirect('konten');
     }
     function delete($id_konten){
        $this->load->model('konten_Model');
        $this->Konten_Model->delete_konten($id_konten);
        redirect(site_url('konten'));
    }

    function edit($id_konten){
       
        $this->load->model('Konten_Model');
        $data['kategori'] = $this->Konten_Model->get_konten_by_id($id_konten);
        //$this->load->view('template/head');
        //$this->load->view('admin/edit_user',$data);
        //$this->load->view('template/java');
    }

    function update(){
       $this->load->model('Konten_Model');
       $this->Konten_Model->update_konten();
       redirect(site_url('konten'));
    }
                   
}