<?php
class Pembayaran_model extends CI_Model
{
    public function get($id_pembayaran = null, $reservasi_id = null)
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        if ($id_pembayaran != null) {
            $this->db->where('id_pembayaran', $id_pembayaran);
        }
        if ($reservasi_id != null) {
            $this->db->where('reservasi_id', $reservasi_id);
        }
        return $this->db->get();
    }

    public function update($data, $id_pembayaran)
    {
        $this->db->where('id_pembayaran', $id_pembayaran);
        $this->db->update('pembayaran', $data);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert('pembayaran', $data);
        return $this->db->insert_id();
    }
    public function delete($id_pembayaran)
    {
        $this->db->delete('pembayaran', ['id_pembayaran' => $id_pembayaran]);
        return $this->db->affected_rows();
    }
}
