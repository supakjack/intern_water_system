<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Water_application_model extends CI_Model
{
	public function find_with_page($param)
	{
		$keyword = $param['keyword'];
		$this->db->select('water_application_id AS id , CONCAT(water_application_firstname, " ", water_application_lastname) AS name , water_application_create_date AS create_date , water_application_pending_status AS status');

		$condition = "1=1";
		if (!empty($keyword)) {
			$condition .= " and (water_application_firstname like '%{$keyword}%' or water_application_lastname like '%{$keyword}%' or water_application_pending_status like '%{$keyword}%' or water_application_create_date like '%{$keyword}%')";
		}

		$this->db->where($condition);
		$this->db->where_not_in('water_application_status', 'delete');
		$this->db->limit($param['page_size'], $param['start']);
		$this->db->order_by($param['column'], $param['dir']);

		$query = $this->db->get('water_applications');
		$data = [];
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
		}

		$count_condition = $this->db->from('water_applications')->where($condition)->count_all_results();
		$count = $this->db->from('water_applications')->count_all_results();
		$result = array('count' => $count, 'count_condition' => $count_condition, 'data' => $data, 'error_message' => '');
		return $result;
	}
}

/* End of file Ssr_table_model.php */
