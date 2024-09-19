<?php

class UmkmModel extends CI_Model
{


    public function getAllData($limit = '', $offset = 0)
    {
        $this->db->select('*');
        $this->db->from('m_umkm');
        $this->db->order_by('id', 'DESC');

        if ($limit != '') {
            $this->db->limit($limit, $offset);
        }

        $query = $this->db->get();  // Gunakan $query
        return $query->result_array();  // Ubah $result menjadi $query
    }

    public function getData($id = '')
    {
        $this->db->select('*');
        $this->db->from('m_umkm');
        $this->db->where('id', $id);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->row_array();
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
        $this->db->from('m_umkm');

        if ($name != '') {
            $this->db->where('nama', $name);
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    public function insertUmkm($data)
    {
        return $this->db->insert('m_umkm', $data);
    }

    public function updateUmkm($id, $data)
    {
        if ($id && !empty($data)) {

            $this->db->where('id', $id);
            $this->db->update('m_umkm', $data);


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
