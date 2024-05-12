<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_All_database extends CI_Model {

	public function __construct() {
        parent::__construct();
    }

    public function get_data($table = null, $where = null)
    {
        if($where != null){
            $this->db->where($where);
        }else{
            $query = $this->db->get('pad');
            $this->db->order_by("id_pad", "asc");
            $query = $this->db->query("SELECT no_reg, kode_rekening, tanggal_dibuat, jenis_pekerjaan, cv, nama_kegiatan FROM laporan_kegiatan");
            return $query->result(); // Return result as an array of objects
        }        
    }

    public function get_data_union($table = null, $where = null)
    {
        if($where != null){
            $this->db->where($where);
        }else{
            $query = $this->db->query("
                SELECT laporan_kegiatan.no_reg, laporan_kegiatan.kode_rekening, laporan_kegiatan.cv, laporan_kegiatan.nama_kegiatan, pad.rekening, laporan_kegiatan.jenis_pekerjaan, pad.harga, pad.jumlah, pad.total
                FROM laporan_kegiatan
                LEFT JOIN pad on laporan_kegiatan.kode_rekening = pad.rekening
                UNION
                SELECT laporan_kegiatan.no_reg, laporan_kegiatan.kode_rekening, laporan_kegiatan.cv, laporan_kegiatan.nama_kegiatan, pad.rekening, laporan_kegiatan.jenis_pekerjaan, pad.harga, pad.jumlah, pad.total
                FROM laporan_kegiatan
                RIGHT JOIN pad on laporan_kegiatan.kode_rekening = pad.rekening

                ");
            return $query->result(); // Return result as an array of objects
        }        
    }

    public function get_inner()
    {
        $query = $this->db->query("
                SELECT laporan_kegiatan.no_reg, laporan_kegiatan.kode_rekening, laporan_kegiatan.cv, laporan_kegiatan.nama_kegiatan, pad.rekening, laporan_kegiatan.jenis_pekerjaan, pad.harga, pad.jumlah, pad.total, pad.jumlah_rp, laporan_kegiatan.tanggal_dibuat, pad.tanggal
                FROM laporan_kegiatan
                LEFT JOIN pad on laporan_kegiatan.kode_rekening = pad.rekening
                ");
            return $query->result(); // Return result as an array of objects       
    }
    
}
