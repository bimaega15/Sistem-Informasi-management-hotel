<?php
class Client_model extends CI_Model
{
    public function get($id_client = null)
    {
        $this->db->select('*');
        $this->db->from('client');
        if ($id_client != null) {
            $this->db->where('id_client', $id_client);
        }
        return $this->db->get();
    }
    public function update($data, $id_client)
    {
        $this->db->where('id_client', $id_client);
        $this->db->update('client', $data);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert('client', $data);
        return $this->db->affected_rows();
    }
    public function delete($id_client)
    {
        $this->db->delete('client', ['id_client' => $id_client]);
        return $this->db->affected_rows();
    }
}
