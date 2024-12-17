<?php
 
 class Registrasi extends CI_Controller{
    public function index(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        
        if($this->form_validation->run() == FALSE){
          
            $this->load->view('registrasi');
            
            } else {
                $data = array(
                    'id_user' => '',
                    'nama' => $this->input->post('nama'),
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password')),
                    'level' => 'kontributor'
                );
    
                $this->db->insert('user', $data);
                redirect('auth');
            }
      }

}