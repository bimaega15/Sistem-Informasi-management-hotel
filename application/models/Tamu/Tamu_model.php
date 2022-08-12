<?php
class Tamu_model extends CI_Model
{
    public function checkUsername($username = null)
    {
        $this->db->select('*');
        $this->db->from('tamu');
        if ($username != null) {
            $this->db->where('username', $username);
        }
        return $this->db->get();
    }
    public function get($id_tamu = null)
    {
        $this->db->select('*');
        $this->db->from('tamu');
        if ($id_tamu != null) {
            $this->db->where('id_tamu', $id_tamu);
        }
        return $this->db->get();
    }
    public function update($data, $id_tamu)
    {
        $this->db->where('id_tamu', $id_tamu);
        $this->db->update('tamu', $data);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert('tamu', $data);
        return $this->db->insert_id();
    }
    public function delete($id_tamu)
    {
        $this->db->delete('tamu', ['id_tamu' => $id_tamu]);
        return $this->db->affected_rows();
    }
    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('tamu');
        if ($username != null && $password != null) {
            $this->db->where('username', $username);
            $this->db->where('password', md5($password));
        }
        return $this->db->get();
    }
}
