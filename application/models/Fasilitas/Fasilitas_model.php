<?php
class Fasilitas_model extends CI_Model
{
    public function get($id_fasilitas = null, $value = null, $limit = null)
    {
        $this->db->select('*');
        $this->db->from('fasilitas');
        if ($id_fasilitas != null) {
            $this->db->where('id_fasilitas', $id_fasilitas);
        }
        if ($value != null || $limit != null) {
            $this->db->group_by('icon_id');
            $this->db->limit($value, $limit);
        }
        $this->db->order_by('id_fasilitas', 'asc');
        return $this->db->get();
    }
    public function getKamar($id_kamar = null)
    {
        $this->db->select('*');
        $this->db->from('fasilitas');
        if ($id_kamar != null) {
            $this->db->where('kamar_id', $id_kamar);
        }
        return $this->db->get();
    }
    public function allData($id_fasilitas = null)
    {
        $this->db->select('fasilitas.*,kamar.status_kamar_id,kamar.tipe_kamar_id,kamar.id_kamar, kamar.dewasa, kamar.anak, kamar.nama_kamar,kamar.no_kamar,kamar.keterangan,kamar.harga,fasilitas.icon_id as icon_fasilitas, tipe_kamar.id_tipe_kamar,tipe_kamar.nama_tipe_kamar,status_kamar.id_status_kamar, status_kamar.nama_status_kamar');
        $this->db->from('fasilitas');
        $this->db->join('kamar', 'kamar.id_kamar = fasilitas.kamar_id');
        $this->db->join('status_kamar', 'kamar.status_kamar_id = status_kamar.id_status_kamar');
        $this->db->join('tipe_kamar', 'kamar.tipe_kamar_id = tipe_kamar.id_tipe_kamar');
        if ($id_fasilitas != null) {
            $this->db->where('id_fasilitas', $id_fasilitas);
        }
        return $this->db->get();
    }
    public function update($data, $id_fasilitas)
    {
        $this->db->where('id_fasilitas', $id_fasilitas);
        $this->db->update('fasilitas', $data);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert('fasilitas', $data);
        return $this->db->affected_rows();
    }
    public function delete($id_fasilitas)
    {
        $this->db->delete('fasilitas', ['id_fasilitas' => $id_fasilitas]);
        return $this->db->affected_rows();
    }
}
