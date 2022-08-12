<?php
class Gambarkamar_model extends CI_Model
{
    public function get($id_gambar_kamar = null, $kamar_id = null, $status_gambar = 'utama')
    {
        $this->db->select('*');
        $this->db->from('gambar_kamar');
        if ($id_gambar_kamar != null) {
            $this->db->where('id_gambar_kamar', $id_gambar_kamar);
        }
        if ($kamar_id != null) {
            $this->db->where('kamar_id', $kamar_id);
        }
        if ($status_gambar != null) {
            $this->db->where('pilihan', $status_gambar);
        }
        return $this->db->get();
    }
    public function update($data, $id_gambar_kamar)
    {
        $this->db->where('id_gambar_kamar', $id_gambar_kamar);
        $this->db->update('gambar_kamar', $data);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert('gambar_kamar', $data);
        return $this->db->affected_rows();
    }
    public function delete($id_gambar_kamar)
    {
        $this->db->delete('gambar_kamar', ['id_gambar_kamar' => $id_gambar_kamar]);
        return $this->db->affected_rows();
    }
    public function allData($id_gambar_kamar = null)
    {
        $this->db->select('kamar.status_kamar_id,kamar.tipe_kamar_id,kamar.id_kamar, kamar.dewasa, kamar.anak, kamar.nama_kamar,kamar.no_kamar,kamar.keterangan,kamar.harga,hotel.id_hotel,hotel.nama_hotel,tipe_kamar.id_tipe_kamar,tipe_kamar.nama_tipe_kamar,status_kamar.id_status_kamar, status_kamar.nama_status_kamar,gambar_kamar.*');
        $this->db->from('gambar_kamar');
        $this->db->join('kamar', 'kamar.id_kamar = gambar_kamar.kamar_id');
        $this->db->join('status_kamar', 'status_kamar.id_status_kamar = kamar.status_kamar_id');
        $this->db->join('tipe_kamar', 'tipe_kamar.id_tipe_kamar = kamar.tipe_kamar_id');
        $this->db->join('hotel', 'hotel.id_hotel = kamar.hotel_id');
        if ($id_gambar_kamar != null) {
            $this->db->where('id_gambar_kamar', $id_gambar_kamar);
        }
        return $this->db->get();
    }
    public function getImageMain($id_kamar = null)
    {
        $this->db->select('*');
        $this->db->from('gambar_kamar');
        if ($id_kamar != null) {
            $this->db->where('kamar_id', $id_kamar);
            $this->db->where('pilihan', 'utama');
        }
        return $this->db->get();
    }
    public function getImage($id_kamar = null)
    {
        $this->db->select('*');
        $this->db->from('gambar_kamar');
        if ($id_kamar != null) {
            $this->db->where('kamar_id', $id_kamar);
        }
        $this->db->order_by('id_gambar_kamar', 'desc');
        return $this->db->get();
    }
}
