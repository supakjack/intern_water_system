<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Global_model extends CI_Model
{

    public function select($table_name, $where_conditions = [])
    {
        foreach ($where_conditions as $where_condition) {
            $this->db->where($where_condition);
        }
        return $this->db->get($table_name);
    }

    public function insert($table_name, $data)
    {
        return $this->db->insert($table_name, $data);
    }

    public function update($table_name, $data, $where_conditions = [])
    {
        foreach ($where_conditions as $where_condition) {
            $this->db->where($where_condition);
        }
        $this->db->set($data);
        return $this->db->update($table_name);
    }
}

/* End of file Global_model.php */
