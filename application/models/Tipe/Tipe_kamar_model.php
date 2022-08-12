<?php
class Tipe_kamar_model extends CI_Model
{
    public function get($id_tipe_kamar = null)
    {
        $this->db->select('*');
        $this->db->from('tipe_kamar');
        if ($id_tipe_kamar != null) {
            $this->db->where('id_tipe_kamar', $id_tipe_kamar);
        }
        return $this->db->get();
    }
    public function update($data, $id_tipe_kamar)
    {
        $this->db->where('id_tipe_kamar', $id_tipe_kamar);
        $this->db->update('tipe_kamar', $data);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert('tipe_kamar', $data);
        return $this->db->affected_rows();
    }
    public function delete($id_tipe_kamar)
    {
        $this->db->delete('tipe_kamar', ['id_tipe_kamar' => $id_tipe_kamar]);
        return $this->db->affected_rows();
    }
}
