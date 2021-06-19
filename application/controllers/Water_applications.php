<?php
/*
    Water_applications
    Controller for Management water_applications
    @author Supak Pukdam
    @Create Date 2564-06-13
*/
defined('BASEPATH') or exit('No direct script access allowed');

class Water_applications extends CI_Controller
{
    /*setup for water_applications
	* @name __construct
	* @input   -
	* @output  Model , Helper , config and etc.
	* @author Supak Pukdam
	* @Create Date 2564-06-13
	*/
    public function __construct()
    {
        parent::__construct();
        $this->config->load('server_config');
        $this->load->database();
        $this->load->model('Global_model');
        $this->load->model('Water_application_model');
        header('Access-Control-Allow-Origin: ' . $this->config->item('cors_url'));
        header('Access-Control-Allow-Headers: ' . $this->config->item('cors_url'));
        header('Access-Control-Allow-Methods: GET, POST'); 
    }

    /*get water_applications data
	* @name get_water_application
	* @input   -
	* @output  json water_applications data  
	* @author Supak Pukdam
	* @Create Date 2564-06-18
	*/
    public function get_water_application()
    {
        $this->output->set_content_type('application/json')->set_output(json_encode([
            'data' => ['result' => $this->Global_model->select('water_applications')->result()]
        ]));
    }

    /*add water_applications data
	* @name add_water_application
	* @input   insert $data
	* @output  water_applications insert query  
	* @author Supak Pukdam
	* @Create Date 2564-06-13
	*/
    public function add_water_application()
    {
        $this->output->set_content_type('application/json')->set_output(json_encode([
            'data' => ['result' => $this->Global_model->insert('water_applications', $this->input->post())]
        ]));
    }

    /*find_with_page data table
	* @name find_with_page
	* @input   params
	* @output  data table
	* @author Supak Pukdam
	* @Create Date 2564-06-19
	*/
    public function find_with_page()
    {
        $order_index = $this->input->post('order[0][column]');
        $param['page_size'] = $this->input->post('length');
        $param['start'] = $this->input->post('start');
        $param['draw'] = $this->input->post('draw');
        $param['keyword'] = trim($this->input->post('search[value]'));
        $param['column'] = $this->input->post("columns[{$order_index}][data]");
        $param['dir'] = $this->input->post('order[0][dir]');

        $results = $this->Water_application_model->find_with_page($param);

        $data['draw'] = $param['draw'];
        $data['recordsTotal'] = $results['count'];
        $data['recordsFiltered'] = $results['count_condition'];
        $data['data'] = $results['data'];
        $data['error'] = $results['error_message'];

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}
/* End of file Water_applications.php */
