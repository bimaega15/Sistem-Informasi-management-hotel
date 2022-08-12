<?php
class Subscribe_model extends CI_Model
{
    public function checkEmail($email = null)
    {
        $this->db->select('*');
        $this->db->from('subscribe');
        if ($email != null) {
            $this->db->where('email', $email);
        }
        return $this->db->get();
    }
    public function get($id_subscribe = null)
    {
        $this->db->select('*');
        $this->db->from('subscribe');
        if ($id_subscribe != null) {
            $this->db->where('id_subscribe', $id_subscribe);
        }
        return $this->db->get();
    }
    public function update($data, $id_subscribe)
    {
        $this->db->where('id_subscribe', $id_subscribe);
        $this->db->update('subscribe', $data);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert('subscribe', $data);
        return $this->db->affected_rows();
    }
    public function delete($id_subscribe)
    {
        $this->db->delete('subscribe', ['id_subscribe' => $id_subscribe]);
        return $this->db->affected_rows();
    }
}
