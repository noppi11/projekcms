<?php
defined('BASEPATH') OR exit('anda siapa?');

class Home extends CI_Controller {
   public function __construct(){
    parent:: __construct();
    if ($this->session->userdata('level')!='Admin'){
            redirect('auth');
        }
}

    public function index(){
        //$this->load->model('Buku_Model');
        //$data['books'] = $this->Buku_Model->get_all_buku();
        //var_dump($data->nama);
        $this->load->view('template/head');
        $this->load->view('template/sidebar');
        $this->load->view('admin/dashboard');
         //$this->load->view('admin/beranda');
        $this->load->view('template/foother');
        $this->load->view('template/java');
        //echo "Selamat Datang di Toko Buku Dongeng";
    }
}
?>
