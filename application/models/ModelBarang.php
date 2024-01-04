<?php

class ModelBarang extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_barang')->result();
    }

    public function getItemByID($id)
    {
        return $this->db->get_where('tb_barang', array('id_brg' => $id))->row_array();
    }
    // Di dalam model ModelBarang
    public function getBarangById($id_brg)
    {
        return $this->db->get_where('tb_barang', ['id_brg' => $id_brg])->row_array();
    }

    public function tambah_barang($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function edit_barang($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function find($id)
    {
        $result = $this->db->where('id_brg', $id)->limit(1)->get('tb_barang');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
    public function detail_brg($id_brg)
    {
        $result = $this->db->where('id_brg', $id_brg)->get('tb_barang');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function updateStokBarang($id_brg, $jml_pembelian)
    {
        // Pastikan $jml_pembelian adalah angka yang valid dan tidak negatif
        if (is_numeric($jml_pembelian) && $jml_pembelian >= 0) {
            $this->db->set('stok', 'stok - ' . $jml_pembelian, FALSE);
            $this->db->where('id_brg', $id_brg);
            if (!$this->db->update('barang')) {
                echo "Gagal mengurangi stok barang. Silakan coba lagi nanti.";
            }
        } else {
            echo "Jumlah pembelian tidak valid atau stok barang tidak mencukupi.";
        }
    }
}
