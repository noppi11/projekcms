<?php
class Kategori_Model extends CI_Model{
    public function get_all_kategori(){
        
        $query = $this->db->get('kategori');
        return $query->result();
    }
    
    function add_kategori(){
        $this->db->insert('kategori',$this->input->post());
    }
    function delete_kategori($id_kategori){
        $this->db->where('id_kategori',$id_kategori);
        $this->db->delete('kategori');
    }
    function get_kategori_by_id($id_kategori){
        $this->db->where('id_kategori',$id_kategori);
        $data = $this->db->get('kategori');
        return $data->row();
    }
    function update_kategori(){
       // $this->input->post()
        $data = array(
            //'username' => $this->input->post('username'),
            'nama_kategori' => $this->input->post('nama_kategori'),
            //'password' => $this->input->post('password'),
            //'level' => $this->input->post('level'),
        );
        $this->db->where('id_kategori', $this->input->post('id_kategori'));
        $this->db->update('kategori', $data);
    }

    //function delete_pemasukkan($id_transaksi){
        //$this->db->where('id_transaksi', $id_transaksi);
        //$this->db->delete('transaksi');
    //}
}
?>