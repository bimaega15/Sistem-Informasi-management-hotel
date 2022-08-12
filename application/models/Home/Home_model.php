<?php
class Home_model extends CI_Model
{
    public function get($id_kamar = null)
    {
        $this->db->select('kamar.status_kamar_id,kamar.tipe_kamar_id,kamar.id_kamar, kamar.dewasa, kamar.anak, kamar.nama_kamar,kamar.no_kamar,kamar.keterangan,kamar.harga,hotel.id_hotel,hotel.nama_hotel,tipe_kamar.id_tipe_kamar,tipe_kamar.nama_tipe_kamar,status_kamar.id_status_kamar, status_kamar.nama_status_kamar,kamar.slider');
        $this->db->from('kamar');
        $this->db->join('status_kamar', 'status_kamar.id_status_kamar = kamar.status_kamar_id');
        $this->db->join('tipe_kamar', 'tipe_kamar.id_tipe_kamar = kamar.tipe_kamar_id');
        $this->db->join('hotel', 'hotel.id_hotel = kamar.hotel_id');
        if ($id_kamar != null) {
            $this->db->where('id_kamar', $id_kamar);
        }
        $this->db->order_by('id_kamar', 'desc');
        return $this->db->get();
    }
    public function getSlider($id_kamar = null)
    {
        $this->db->select('kamar.status_kamar_id,kamar.tipe_kamar_id,kamar.id_kamar, kamar.dewasa, kamar.anak, kamar.nama_kamar,kamar.no_kamar,kamar.keterangan,kamar.harga,hotel.id_hotel,hotel.nama_hotel,tipe_kamar.id_tipe_kamar,tipe_kamar.nama_tipe_kamar,status_kamar.id_status_kamar, status_kamar.nama_status_kamar,kamar.slider');
        $this->db->from('kamar');
        $this->db->join('status_kamar', 'status_kamar.id_status_kamar = kamar.status_kamar_id');
        $this->db->join('tipe_kamar', 'tipe_kamar.id_tipe_kamar = kamar.tipe_kamar_id');
        $this->db->join('hotel', 'hotel.id_hotel = kamar.hotel_id');
        if ($id_kamar != null) {
            $this->db->where('id_kamar', $id_kamar);
        }
        $this->db->where('kamar.slider', 'iya');
        $this->db->order_by('id_kamar', 'desc');
        return $this->db->get();
    }
    public function getRekomendasi($id_kamar = null)
    {
        $this->db->select('kamar.status_kamar_id,kamar.tipe_kamar_id,kamar.id_kamar, kamar.dewasa, kamar.anak, kamar.nama_kamar,kamar.no_kamar,kamar.keterangan,kamar.harga,hotel.id_hotel,hotel.nama_hotel,tipe_kamar.id_tipe_kamar,tipe_kamar.nama_tipe_kamar,status_kamar.id_status_kamar, status_kamar.nama_status_kamar,kamar.slider');
        $this->db->from('kamar');
        $this->db->join('status_kamar', 'status_kamar.id_status_kamar = kamar.status_kamar_id');
        $this->db->join('tipe_kamar', 'tipe_kamar.id_tipe_kamar = kamar.tipe_kamar_id');
        $this->db->join('hotel', 'hotel.id_hotel = kamar.hotel_id');
        if ($id_kamar != null) {
            $this->db->where('id_kamar', $id_kamar);
        }
        $this->db->where('kamar.rekomendasi', 'iya');
        $this->db->order_by('id_kamar', 'desc');
        return $this->db->get();
    }
    public function getPenawaran($id_kamar = null)
    {
        $this->db->select('kamar.status_kamar_id,kamar.tipe_kamar_id,kamar.id_kamar, kamar.dewasa, kamar.anak, kamar.nama_kamar,kamar.no_kamar,kamar.keterangan,kamar.harga,hotel.id_hotel,hotel.nama_hotel,tipe_kamar.id_tipe_kamar,tipe_kamar.nama_tipe_kamar,status_kamar.id_status_kamar, status_kamar.nama_status_kamar,kamar.slider');
        $this->db->from('kamar');
        $this->db->join('status_kamar', 'status_kamar.id_status_kamar = kamar.status_kamar_id');
        $this->db->join('tipe_kamar', 'tipe_kamar.id_tipe_kamar = kamar.tipe_kamar_id');
        $this->db->join('hotel', 'hotel.id_hotel = kamar.hotel_id');
        if ($id_kamar != null) {
            $this->db->where('id_kamar', $id_kamar);
        }
        $this->db->where('kamar.penawaran', 'iya');
        $this->db->limit(4, 0);
        $this->db->order_by('id_kamar', 'desc');
        return $this->db->get();
    }
    public function getKamarBaru6($id_kamar = null)
    {
        $this->db->select('kamar.status_kamar_id,kamar.tipe_kamar_id,kamar.id_kamar, kamar.dewasa, kamar.anak, kamar.nama_kamar,kamar.no_kamar,kamar.keterangan,kamar.harga,hotel.id_hotel,hotel.nama_hotel,tipe_kamar.id_tipe_kamar,tipe_kamar.nama_tipe_kamar,status_kamar.id_status_kamar, status_kamar.nama_status_kamar,kamar.slider');
        $this->db->from('kamar');
        $this->db->join('status_kamar', 'status_kamar.id_status_kamar = kamar.status_kamar_id');
        $this->db->join('tipe_kamar', 'tipe_kamar.id_tipe_kamar = kamar.tipe_kamar_id');
        $this->db->join('hotel', 'hotel.id_hotel = kamar.hotel_id');
        if ($id_kamar != null) {
            $this->db->where('id_kamar', $id_kamar);
        }
        $this->db->limit(6, 0);
        $this->db->order_by('id_kamar', 'desc');
        return $this->db->get();
    }
    public function getClient()
    {
        $this->db->select('*');
        $this->db->from('client');
        $this->db->order_by('client.id_client', 'desc');
        return $this->db->get();
    }
    public function getGaleri()
    {
        $this->db->select('*');
        $this->db->from('galeri');
        $this->db->limit(6, 0);
        $this->db->order_by('galeri.id_galeri', 'desc');
        return $this->db->get();
    }
}
