<?php
class Reservasi_model extends CI_Model
{
    public function get($id_reservasi = null, $tamu_id = null)
    {
        $this->db->select('*');
        $this->db->from('reservasi');
        if ($id_reservasi != null) {
            $this->db->where('id_reservasi', $id_reservasi);
        }
        if ($tamu_id != null) {
            $this->db->where('tamu_id', $tamu_id);
        }
        return $this->db->get();
    }
    public function checkKamar($id_reservasi = null, $dari_tanggal = null, $sampai_tanggal = null, $kamar = null)
    {
        $this->db->select('*');
        $this->db->from('reservasi');
        if ($id_reservasi != null) {
            $this->db->where('id_reservasi', $id_reservasi);
        }
        if ($dari_tanggal != null && $sampai_tanggal != null) {
            $this->db->where('check_in >= ', $dari_tanggal);
            $this->db->where('check_out >= ', $sampai_tanggal);
        }
        if ($kamar != null) {
            $this->db->where('kamar_id', $kamar);
        }
        return $this->db->get();
    }
    public function checkIn()
    {
        $this->db->select('*');
        $this->db->from('reservasi');
        $this->db->join('kamar', 'kamar.id_kamar = reservasi.kamar_id');
        $this->db->where('kamar.status_kamar_id', 4);
        return $this->db->get();
    }
    public function checkOut()
    {
        $this->db->select('*');
        $this->db->from('reservasi');
        $this->db->where('reservasi.status', 'check out');
        return $this->db->get();
    }
    public function booking()
    {
        $this->db->select('*');
        $this->db->from('reservasi');
        $this->db->join('kamar', 'kamar.id_kamar = reservasi.kamar_id');
        $this->db->where('kamar.status_kamar_id', 3);
        return $this->db->get();
    }
    public function transaksiToday()
    {
        $this->db->select('sum(pembayaran.total_bayar) as total_bayar_today');
        $this->db->from('reservasi');
        $this->db->join('pembayaran', 'pembayaran.reservasi_id = reservasi.id_reservasi');
        $this->db->where("DATE_FORMAT(reservasi.tanggal,'%Y-%m-%d') = ", date('Y-m-d'));
        return $this->db->get();
    }
    public function grafikTransaksi()
    {
        $this->db->select('sum(pembayaran.total_bayar) as total_bayar, reservasi.tanggal');
        $this->db->from('reservasi');
        $this->db->join('pembayaran', 'pembayaran.reservasi_id = reservasi.id_reservasi');
        $this->db->group_by('reservasi.tanggal');
        $this->db->order_by('reservasi.id_reservasi', 'desc');
        return $this->db->get();
    }
    public function transaksiMonth()
    {
        $this->db->select('sum(pembayaran.total_bayar) as total_bayar_month');
        $this->db->from('reservasi');
        $this->db->join('pembayaran', 'pembayaran.reservasi_id = reservasi.id_reservasi');
        $this->db->where('MONTH(reservasi.tanggal)', date('n'));
        return $this->db->get();
    }
    public function update($data, $id_reservasi)
    {
        $this->db->where('id_reservasi', $id_reservasi);
        $this->db->update('reservasi', $data);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert('reservasi', $data);
        return $this->db->insert_id();
    }
    public function delete($id_reservasi)
    {
        $this->db->delete('reservasi', ['id_reservasi' => $id_reservasi]);
        return $this->db->affected_rows();
    }
}
