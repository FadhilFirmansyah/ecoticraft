<?php

class ProductModel extends CI_Model
{


    public function getAllData($variasi = TRUE, $limit = '', $offset = 0)
    {
        if ($variasi) {
            $this->db->select('mp.*, GROUP_CONCAT(vp.variasi ORDER BY vp.variasi SEPARATOR ", ") AS variasi, IF(MIN(vp.harga) = MAX(vp.harga), MIN(vp.harga), CONCAT(MIN(vp.harga), "-", MAX(vp.harga))) AS harga_range');
            $this->db->from('m_produk mp');
            $this->db->join('variasi_produk vp', 'mp.id = vp.id_produk', 'left');
            $this->db->group_by('mp.id');
            $this->db->order_by('mp.id', 'DESC');

            if ($limit != '') {
                $this->db->limit($limit, $offset);
            }

            $query = $this->db->get();
            return $query->result_array();
        } else {
            return $this->db->get('m_produk')->result_array();
        }
    }

    public function getData($id = '', $variasi = TRUE)
    {
        if ($variasi) {
            $this->db->select('mp.*, vp.id AS id_variasi, vp.variasi, vp.harga');
            $this->db->from('m_produk mp');
            $this->db->join('variasi_produk vp', 'mp.id = vp.id_produk', 'left');
            $this->db->where('id', $id);
            $this->db->order_by('mp.id', 'DESC');
            $query = $this->db->get();
            return $query->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('m_produk');
            $this->db->where('id', $id);
            $query = $this->db->get();
            return $query;
        }
    }

    public function getCountAllData($name = '')
    {
        $this->db->select('COUNT(id) AS count');
        $this->db->from('m_produk');

        if ($name != '') {
            $this->db->where('nama', $name);
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    public function insertProduct($data)
    {
        return $this->db->insert('m_produk', $data);
    }
    public function insertHarga($data)
    {
        $this->db->insert_batch('variasi_produk', $data);
        return $this->db->affected_rows() > 0;
    }
}
