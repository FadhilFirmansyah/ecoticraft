<?php 

class VPageModel extends CI_Model{
    public function getAllData(){
        return $this->db->get('view_page')->result_array();
    }

    public function getCountAllData($page = '', $curdate = ''){
        $this->db->select('COUNT(id) AS count');

        $this->db->from('view_page');
        if($page != ''){
            $this->db->where('page_name', $page);
        }
        if($curdate != ''){
            $this->db->where('getDate', $curdate);
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getCountDate($page = ''){
        $this->db->select('getDate, COUNT(*) AS count');
        $this->db->from('view_page');
        if($page != ''){
            $this->db->where('page_name', $page);
        }
        $this->db->group_by('getDate');
        $this->db->order_by('getDate', 'DESC');
        $this->db->limit(7);

        $query = $this->db->get();
        return array_reverse($query->result_array()); // CARA OUTPUTNYA DI REVERSE
    }

    public function insertCountView($data){
        $this->db->set('page_name', $data);
        $this->db->insert('view_page');
        $insert = $this->db->insert_id();
        return $insert;
    }
}


?>