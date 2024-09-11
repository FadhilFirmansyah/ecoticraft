<?php 

class AdminModel extends CI_Model{
    public function login($username, $password){
        if(!$username || !$password){
            return false;
        }

        $query = $this->db->query('SELECT * FROM admin WHERE BINARY username = ?', [$username])->row();
        if (!$query) {
            return false;
        }

        if (!password_verify($password, $query->password)) {
            return false;
        }

        return $query;
    }

    public function getAllData(){
        return $this->db->get('admin')->result_array();
    }
    public function getCountAdmin(){
        return $this->db->where('role', 'admin')->get('admin')->num_rows();
    }
}


?>