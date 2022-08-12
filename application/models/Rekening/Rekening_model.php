<?php
class Rekening_model extends CI_Model
{
    public function get($id_rekening = null)
    {
        $this->db->select('*');
        $this->db->from('rekening');
        if ($id_rekening != null) {
            $this->db->where('id_rekening', $id_rekening);
        }
        return $this->db->get();
    }
    public function update($data, $id_rekening)
    {
        $this->db->where('id_rekening', $id_rekening);
        $this->db->update('rekening', $data);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert('rekening', $data);
        return $this->db->affected_rows();
    }
    public function delete($id_rekening)
    {
        $this->db->delete('rekening', ['id_rekening' => $id_rekening]);
        return $this->db->affected_rows();
    }
}
