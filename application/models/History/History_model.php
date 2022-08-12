<?php
class History_model extends CI_Model
{
    public function allData($id_tamu = null, $id_reservasi = null)
    {
        $this->db->select('reservasi.*,kamar.id_kamar,kamar.nama_kamar,pembayaran.*,kamar.status_kamar_id');
        $this->db->from('reservasi');
        $this->db->join('kamar', 'kamar.id_kamar = reservasi.kamar_id');
        $this->db->join('pembayaran', 'pembayaran.reservasi_id = reservasi.id_reservasi');
        if ($id_tamu != null) {
            $this->db->where('reservasi.tamu_id', $id_tamu);
        }
        if ($id_reservasi != null) {
            $this->db->where('reservasi.id_reservasi', $id_reservasi);
        }
        $this->db->order_by('reservasi.id_reservasi', 'DESC');
        return $this->db->get();
    }

    public function delete($id_reservasi)
    {
        $this->db->delete('reservasi', ['id_reservasi' => $id_reservasi]);
        return $this->db->affected_rows();
    }
}
