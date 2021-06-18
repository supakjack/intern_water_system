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
        $this->load->database();
        $this->load->model('Global_model');
        $this->load->helper('ajax_helper');
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
        response_ajax($this->Global_model->select('water_applications')->result());
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
        response_ajax($this->Global_model->insert('water_applications', $this->input->post()));
    }
}
/* End of file Water_applications.php */
