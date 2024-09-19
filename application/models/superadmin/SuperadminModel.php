<?php

class SuperadminModel extends CI_Model
{

    public function vanillaQuery($sql, $id = null)
{
    if ($id != null) {
        $query = $this->db->query($sql, array($id));  
    } else {
        $query = $this->db->query($sql);
    }
    
    if ($query) {
        // Jika query adalah SELECT
        if (strpos(strtoupper($sql), 'SELECT') !== false) {
            return $query->result_array(); // Untuk SELECT, kembalikan hasil dalam bentuk array
        } else if(strpos(strtoupper($sql), 'INSERT') !== false || strpos(strtoupper($sql), 'UPDATE') !== false || strpos(strtoupper($sql), 'DELETE') !== false){
            return true; // Untuk INSERT, UPDATE, DELETE, kembalikan true jika berhasil
        } else {
            return $query->result_array();
        }
    } else {
        log_message('error', 'Query failed: ' . $this->db->last_query());
        return false;
    }
}
}
