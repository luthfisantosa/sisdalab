<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_database_pad extends CI_Model {

	public function __construct() {
        parent::__construct();
    }

    public function getData() {
        $query = $this->db->get('pad'); // replace 'your_table' with your actual table name
        return $query->result();
    }

    public function get_data($table, $where = null)
    {
        if($where != null){
            $this->db->where($where);
        }else{
            $query = $this->db->get('pad');
            $this->db->order_by("id_pad", "desc");
            return $query->result(); // Return result as an array of objects
        }        
    }

    public function last_val()
    {
        $query = $this->db->get('pad');

        if ($query->num_rows() > 0) {
            $row = $query->last_row();
            $lastValue = $row->no_pad;
            // Do something with $lastValue
            return $lastValue;
        } else {
            // No rows found
            return null;
        }
    }

    public function summarize_columns($id) {
        $query = $this->db->query("SELECT SUM(jumlah_rp) as jumlah_rp FROM pad WHERE no_pad=$id");
        return $query->row();
    }

    public function save($data) {
        return $this->db->insert('pad', $data);
    }
}
