<?php
class Status_kamar_model extends CI_Model
{
    public function get($id_status_kamar = null)
    {
        $this->db->select('*');
        $this->db->from('status_kamar');
        if ($id_status_kamar != null) {
            $this->db->where('id_status_kamar', $id_status_kamar);
        }
        return $this->db->get();
    }
    public function update($data, $id_status_kamar)
    {
        $this->db->where('id_status_kamar', $id_status_kamar);
        $this->db->update('status_kamar', $data);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert('status_kamar', $data);
        return $this->db->affected_rows();
    }
    public function delete($id_status_kamar)
    {
        $this->db->delete('status_kamar', ['id_status_kamar' => $id_status_kamar]);
        return $this->db->affected_rows();
    }
}
