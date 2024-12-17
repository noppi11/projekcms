<?php
defined('BASEPATH') OR exit('anda petugas?');

class User extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        //$this->load->model('User_Model');
        //if ($this->session->userdata('level')<>'Admin'){
           // redirect('auth');
        //}
    }
    public function index(){
        //$this->db->select('*')->from('user');
        //$this->db->order_by('nama','ASC');
        //$users = $this->db->get()->result_array();
        //$data = array('user' => $users);
        $this->load->model('User_Model');
        $data['users'] = $this->User_Model->get_all_user();
        $this->load->view('template/head');
        $this->load->view('template/sidebar');
        $this->load->view('admin/user',$data);
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
        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('password','password','required');
        $this->form_validation->set_rules('level','level','required');
        if ($this->form_validation->run() == FALSE){
            $this->load->view('admin/tambah_user');
        } else { 
            $this->load->model('User_Model');
            $username = $this->input->post('username');
            $this->db->from('user');
            $this->db->where('username',$username);
           $cek = $this->db->get()->result_array();
            if($cek<>NULL){
                $this->session->set_flashdata('alert','
                <div class="alert alert-danger" role="alert">username sudah digunakan</div>');
            redirect(site_url('user'));

            }
            $this->User_Model->add_user();
            $this->session->set_flashdata('alert', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <div class="d-flex align-items-center">
                    <i class="mdi mdi-check-circle-outline mr-3" style="font-size: 2rem;"></i>
                    <div>
                        <h4 class="alert-heading mb-1">Sukses!</h4>
                        <p class="mb-0">Data berhasil tersimpan dengan baik.</p>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        ');
        redirect(site_url('user'));
            //echo"berhasil";
        }

       // var_dump($this->input->post());
    }

    function delete($id_user){
        $this->load->model('User_Model');
        $this->User_Model->delete_user($id_user);
        redirect(site_url('user'));
    }

    function edit($id_user){
       
        $this->load->model('User_Model');
        $data['user'] = $this->User_Model->get_user_by_id($id_user);
        $this->load->view('template/head');
        $this->load->view('admin/edit_user',$data);
        $this->load->view('template/java');
    }

    function update(){
       $this->load->model('User_Model');
       $this->User_Model->update_user();
       redirect(site_url('user'));
    }
   
  
}