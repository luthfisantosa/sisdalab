<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_kegiatan extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_data($table, $where = null)
    {
        if ($where != null) {
            $this->db->where($where);
        } else {
            $query = $this->db->get('laporan_kegiatan');
            $this->db->order_by("id_kegiatan", "asc");
            return $query->result(); // Return result as an array of objects
        }
    }

    public function last_val()
    {
        $query = $this->db->get('laporan_kegiatan');

        if ($query->num_rows() > 0) {
            $row = $query->last_row();
            $lastValue = $row->no_reg;
            // Do something with $lastValue
            return $lastValue;
        } else {
            // No rows found
            return null;
        }
    }

    public function insert_data($data) {
        $this->db->insert('laporan_kegiatan', $data);
    }

    public function delete_row($id) {
        // Delete row from the table
        $this->db->where('id_kegiatan', $id);
        return $this->db->delete('laporan_kegiatan');
    }
}
