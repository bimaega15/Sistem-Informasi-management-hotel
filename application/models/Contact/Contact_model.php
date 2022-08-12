<?php
class Contact_model extends CI_Model
{
    public function checkEmail($email = null)
    {
        $this->db->select('*');
        $this->db->from('contact');
        if ($email != null) {
            $this->db->where('email', $email);
        }
        return $this->db->get();
    }
    public function get($id_contact = null)
    {
        $this->db->select('*');
        $this->db->from('contact');
        if ($id_contact != null) {
            $this->db->where('id_contact', $id_contact);
        }
        return $this->db->get();
    }
    public function update($data, $id_contact)
    {
        $this->db->where('id_contact', $id_contact);
        $this->db->update('contact', $data);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert('contact', $data);
        return $this->db->affected_rows();
    }
    public function delete($id_contact)
    {
        $this->db->delete('contact', ['id_contact' => $id_contact]);
        return $this->db->affected_rows();
    }
}
