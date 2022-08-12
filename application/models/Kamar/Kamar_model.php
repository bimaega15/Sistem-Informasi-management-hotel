<?php
class Kamar_model extends CI_Model
{
    public function get($id_kamar = null, $value = null, $limit = null, $dari_tanggal = null, $sampai_tanggal = null, $dari_harga = null, $sampai_harga = null, $berapa_kamar = null, $berapa_orang = null, $search = null)
    {
        $this->db->select('*');
        $this->db->from('kamar');
        if ($id_kamar != null) {
            $this->db->where('id_kamar', $id_kamar);
        }
        if ($dari_tanggal != null && $sampai_tanggal != null) {
        }
        if ($dari_harga != null && $sampai_harga != null) {

            $this->db->where('harga >= ', $dari_harga);
            $this->db->where('harga <= ', $sampai_harga);
        }
        if ($berapa_orang != null) {
            $this->db->or_where('dewasa >= ', $berapa_orang);
            $this->db->or_where('anak >=', $berapa_orang);
        }
        if ($search != null) {
            $this->db->like('nama_kamar', $search);
        }

        if ($value != null || $limit != null) {
            $this->db->limit($value, $limit);
        }

        if ($berapa_kamar != null) {
            $this->db->limit($berapa_kamar, 0);
        }

        return $this->db->get();
    }
    public function update($data, $id_kamar)
    {
        $this->db->where('id_kamar', $id_kamar);
        $this->db->update('kamar', $data);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert('kamar', $data);
        return $this->db->insert_id();
    }
    public function delete($id_kamar)
    {
        $this->db->delete('kamar', ['id_kamar' => $id_kamar]);
        return $this->db->affected_rows();
    }
    public function allData($id_kamar = null)
    {
        $this->db->select('kamar.status_kamar_id,kamar.tipe_kamar_id,kamar.id_kamar, kamar.dewasa, kamar.anak, kamar.nama_kamar,kamar.no_kamar,kamar.keterangan,kamar.harga,hotel.id_hotel,hotel.nama_hotel,tipe_kamar.id_tipe_kamar,tipe_kamar.nama_tipe_kamar,status_kamar.id_status_kamar, status_kamar.nama_status_kamar,kamar.slider,kamar.rekomendasi,kamar.penawaran');
        $this->db->from('kamar');
        $this->db->join('status_kamar', 'status_kamar.id_status_kamar = kamar.status_kamar_id');
        $this->db->join('tipe_kamar', 'tipe_kamar.id_tipe_kamar = kamar.tipe_kamar_id');
        $this->db->join('hotel', 'hotel.id_hotel = kamar.hotel_id');
        if ($id_kamar != null) {
            $this->db->where('id_kamar', $id_kamar);
        }
        return $this->db->get();
    }
}
