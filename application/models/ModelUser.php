<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelUser extends CI_Model
{
    public function getUserById($id_user)
    {
        return $this->db->get_where('user', ['id_user' => $id_user])->row_array();
    }
    public function getDataByUsername($nama)
    {
        // Ganti 'users' dengan nama tabel pengguna Anda
        $this->db->where('nama', $nama);
        $query = $this->db->get('user'); // 'users' adalah nama tabel

        // Mengembalikan hasil query dalam bentuk array
        return $query->row_array();
    }
    public function simpanData($data = null)
    {
        $this->db->insert('user', $data);
    }
    public function tampil_data()
    {
        return $this->db->get('user');
    }
    public function cekData($where = null)
    {
        return $this->db->get_where('user', $where);
    }
    public function getUserWhere($where = null)
    {
        return $this->db->get_where('user', $where);
    }
    public function cekUserAccess($where = null)
    {
        $this->db->select('*');
        $this->db->from('access_menu');
        $this->db->where($where);
        return $this->db->get();
    }
    public function getUserLimit()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->limit(10, 0);
        return $this->db->get();
    }
}
