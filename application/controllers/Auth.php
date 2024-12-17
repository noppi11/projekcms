<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
    public function index(){
    //echo "Selamat Datang d";
   // $this->load->model('User_Model');
    //$data['books'] = $this->Buku_Model->get_all_buku();
    //var_dump($data->judul);
     $this->load->view('template/head');
     $this->load->view('login');
     $this->load->view('template/java');

    }

    public function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->db->from('user')->where('username', $username);
        $user = $this->db->get()->row();

        if ($user == NULL) {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-info" role="alert">
            Username tidak ada
            </div>
            ');
            redirect('auth');
        } else if ($user->password == $password) {
            $data = array(
                'username' => $user->username,
                'nama' => $user->nama,
                'level' => $user->level,
                'id_user' => $user->id_user,
                'logged_in' => TRUE // Menandakan pengguna sudah login
            );
            $this->session->set_userdata($data);
            $redirect_url = $this->session->userdata('redirect_url');
            if ($redirect_url) {
                // Hapus URL redirect setelah digunakan
                $this->session->unset_userdata('redirect_url');
                // Redirect pengguna kembali ke halaman yang diinginkan
                redirect($redirect_url);
            } else {
                // Jika tidak ada redirect URL, arahkan ke halaman utama
                redirect('home');
            }
            //if ($user->level == 'Admin') {
                //redirect('admin/home'); // Arahkan admin ke halaman admin
            //} elseif ($user->level == 'user') {
                // Opsi 1: Arahkan ke halaman daftar video
               // redirect('video/list');

                // Opsi 2: Arahkan langsung ke video tertentu
                 //$this->db->from('konten')->order_by('tanggal', 'DESC');
                // $video = $this->db->get()->row();
                 //if ($video) {
                    // redirect('video/' . $video->slug);
                 //} else {
                  //   redirect('home');
                 //}
            //} else {
                //redirect('auth'); // Arahkan ke login jika level tidak valid
           // }
        } else {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-info" role="alert">
            Password salah
            </div>
            ');
            redirect('auth');
        }
    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect('auth');
    }
    function registrasi(){
        $this->load->view('registrasi');
    }
    
    function simpan(){
        //$this->buku_model->simpan_data();
        //return redirect('');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
       
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('registrasi');
        } else {
            //echo "berhasil";
            $this->load->model('User_Model');
            $username = $this->input->post('username');
            $this->db->from('user');
            $this->db->where('username', $username);
            $cek = $this->db->get()->result_array();
            if($cek<>NULL){
                $this->session->set_flashdata('alert', '
                <div class="alert alert-danger" role="alert">
                Username sudah digunakan
                </div>
                ');
                redirect(site_url('auth'));
            }
            $this->User_Model->add_users();
            $this->session->set_flashdata('alert', '
            <div class="alert alert-info" role="alert">
            yey berhasil disimpan
            </div>
            ');
            redirect(site_url('auth'));

        }
        //var_dump($this->input->post());
    }
    

}


