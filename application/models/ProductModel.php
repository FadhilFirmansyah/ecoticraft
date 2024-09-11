<?php 

class ProductModel extends CI_Model{
    public function getAllData(){
        return $this->db->get('m_produk')->result_array();
    }

    public function getCountAllData($name = ''){
        $this->db->select('COUNT(id) AS count');
        $this->db->from('m_produk');

        if($name != ''){
            $this->db->where('nama', $name);
        }

        $query = $this->db->get();
        return $query->result_array();
    }
}


?>