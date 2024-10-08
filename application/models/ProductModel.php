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
            $this->db->where('mp.id', $id);
            $this->db->order_by('mp.id', 'DESC');
            $query = $this->db->get();
            return $query->row_array();
        } else {
            $this->db->select('*');
            $this->db->from('m_produk');
            $this->db->where('id', $id);
            $query = $this->db->get();
            return $query->row_array();
        }
    }

    public function getVariasi($getId = null)
    {
        if ($getId != null) {
            $this->db->select('vp.id, vp.id_produk, vp.variasi, vp.harga');
            $this->db->from('m_produk mp');
            $this->db->join('variasi_produk vp', 'mp.id = vp.id_produk', 'left');
            $this->db->where('mp.id', $getId);
            $query = $this->db->get();

            return $query->result_array();  // Mengambil hasil dalam bentuk array
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

    public function updateProduct($id, $data)
    {
        if ($id && !empty($data)) {

            $this->db->where('id', $id);
            $this->db->update('m_produk', $data);


            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function updateHarga($idVariasi, $data)
    {
        if ($idVariasi && !empty($data)) {

            $this->db->where_in('id', $idVariasi);
            $this->db->delete('variasi_produk');

            $this->db->insert_batch('variasi_produk', $data);


            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function delHarga($idVariasi = null, $idProduct = null)
    {
        if ($idVariasi != null) {
            $this->db->where_in('id', $idVariasi);
            $this->db->delete('variasi_produk');
            return $this->db->affected_rows() > 0;
        } else if ($idProduct != null) {
            $this->db->where('id_produk', $idProduct);
            $this->db->delete('variasi_produk');
            return $this->db->affected_rows() > 0;
        } else {
            $this->db->delete('variasi_produk');
            return $this->db->affected_rows() > 0;
        }
    }
}
