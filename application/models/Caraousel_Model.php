<?php
class Caraousel_Model extends CI_Model{
    function delete_caraousel($id_caraousel){
        $this->db->where('id_caraousel',$id_caraousel);
        $this->db->delete('caraousel');
    }
    //function update_caraousel(){
       // $this->input->post()
       // $data = array(
            //'judul' => $this->input->post('judul'),
           // 'foto' => $this->input->post('foto'),
        //);
        //$this->db->where('id_caraousel', $this->input->post('id_caraousel'));
       // $this->db->update('caraousel', $data);
    //}

    
}
?>