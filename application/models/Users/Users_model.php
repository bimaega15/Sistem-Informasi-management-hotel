<?php
class Users_model extends CI_Model
{
    public function get($id_users = null)
    {
        $this->db->select('*');
        $this->db->from('users');
        if ($id_users != null) {
            $this->db->where('id_users', $id_users);
        }
        return $this->db->get();
    }
    public function update($data, $id_users)
    {
        $this->db->where('id_users', $id_users);
        $this->db->update('users', $data);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert('users', $data);
        return $this->db->affected_rows();
    }
    public function delete($id_users)
    {
        $this->db->delete('users', ['id_users' => $id_users]);
        return $this->db->affected_rows();
    }
    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('users');
        if ($username != null && $password != null) {
            $this->db->where('username', $username);
            $this->db->where('password', md5($password));
        }
        return $this->db->get();
    }
}
