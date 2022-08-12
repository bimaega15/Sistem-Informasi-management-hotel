<?php
class Laporan_model extends CI_Model
{
    public function get($dari_tanggal = null, $sampai_tanggal = null)
    {
        $this->db->select('reservasi.*,kamar.id_kamar,kamar.nama_kamar,pembayaran.*,kamar.status_kamar_id,kamar.no_kamar,kamar.tipe_kamar_id');
        $this->db->from('reservasi');
        $this->db->join('kamar', 'kamar.id_kamar = reservasi.kamar_id');
        $this->db->join('pembayaran', 'pembayaran.reservasi_id = reservasi.id_reservasi');
        if ($dari_tanggal != null && $sampai_tanggal != null) {
            $this->db->where("DATE_FORMAT(reservasi.tanggal,'%Y-%m-%d') >= ", $dari_tanggal);
            $this->db->where("DATE_FORMAT(reservasi.tanggal,'%Y-%m-%d') <= ", $sampai_tanggal);
        }
        $this->db->order_by('reservasi.id_reservasi', 'DESC');
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
