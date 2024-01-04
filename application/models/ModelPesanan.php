<?php
class ModelPesanan extends CI_Model
{
    public function getAllPesanan()
    {
        return $this->db->get('tb_pesanan')->result();
    }
    public function simpanPesanan($data)
    {
        $this->db->insert('tb_pesanan', $data);
    }
}
