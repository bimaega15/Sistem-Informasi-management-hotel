<?php
class Galeri_model extends CI_Model
{
    public function get($id_galeri = null, $value = null, $limit = null)
    {
        $this->db->select('*');
        $this->db->from('galeri');
        if ($id_galeri != null) {
            $this->db->where('id_galeri', $id_galeri);
        }
        if ($value != null || $limit != null) {
            $this->db->limit($value, $limit);
        }
        return $this->db->get();
    }
    public function update($data, $id_galeri)
    {
        $this->db->where('id_galeri', $id_galeri);
        $this->db->update('galeri', $data);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert('galeri', $data);
        return $this->db->affected_rows();
    }
    public function delete($id_galeri)
    {
        $this->db->delete('galeri', ['id_galeri' => $id_galeri]);
        return $this->db->affected_rows();
    }
}
