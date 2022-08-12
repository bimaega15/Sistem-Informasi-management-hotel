<?php
class Hotel_model extends CI_Model
{
    public function get($id_hotel = null)
    {
        $this->db->select('*');
        $this->db->from('hotel');
        if ($id_hotel != null) {
            $this->db->where('id_hotel', $id_hotel);
        }
        return $this->db->get();
    }
    public function update($data, $id_hotel)
    {
        $this->db->where('id_hotel', $id_hotel);
        $this->db->update('hotel', $data);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert('hotel', $data);
        return $this->db->affected_rows();
    }
    public function delete($id_hotel)
    {
        $this->db->delete('hotel', ['id_hotel' => $id_hotel]);
        return $this->db->affected_rows();
    }
  
}
