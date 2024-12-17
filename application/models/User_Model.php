<?php
class User_Model extends CI_Model{
    public function get_all_user(){
        
        $query = $this->db->get('user');
        return $query->result();
    }
    function add_user(){
        $this->db->insert('user',$this->input->post());
    }
    function add_users(){
        $this->db->insert('user', $this->input->post());
    }
    function delete_user($id_user){
        $this->db->where('id_user',$id_user);
        $this->db->delete('user');
    }
    function get_user_by_id($id_user){
        $this->db->where('id_user',$id_user);
        $data = $this->db->get('user');
        return $data->row();
    }
    function update_user(){
       // $this->input->post()
        $data = array(
            'username' => $this->input->post('username'),
            'nama' => $this->input->post('nama'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level'),
        );
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', $data);
    }

    //function delete_pemasukkan($id_transaksi){
        //$this->db->where('id_transaksi', $id_transaksi);
        //$this->db->delete('transaksi');
    //}

    // Fungsi untuk cek apakah username sudah terdaftar
    public function check_username_exists($username) {
        $query = $this->db->get_where('user', array('username' => $username));
        return $query->num_rows() > 0; // Jika ada username yang sama, return true
    }
}
?>