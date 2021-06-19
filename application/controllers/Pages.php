<?php
/*
    Pages
    Controller for Management Pages
    @author Supak Pukdam
    @Create Date 2564-06-13
*/
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{
    /*setup for Pages
	* @name __construct
	* @input   -
	* @output  Model , Helper , config and etc.
	* @author Supak Pukdam
	* @Create Date 2564-06-13
	*/
    public function __construct()
    {
        parent::__construct();
    }

    /*load theme of web
	* @name output
	* @input   -
	* @output  'v_header' for header page and 'v_footer' for footer page  
	* @author Supak Pukdam
	* @Create Date 2564-06-13
	*/
    public function output($view, $data = null)
    {
        $this->load->view('templates/v_header', $data);
        $this->load->view($view);
        $this->load->view('templates/v_footer');
    }

    /*show Water Application page
	* @name index
	* @input   -
	* @output  'v_water_application' for Water Application
	* @author Supak Pukdam
	* @Create Date 2564-06-18
	*/
    public function water_application()
    {
        $this->output('v_water_application', [
            "page_title" => "ลงทะเบียนขอรับน้ำดื่ม"
        ]);
    }

    /*show Water Application Management page
	* @name index
	* @input   -
	* @output  'v_water_application' for Water Application
	* @author Supak Pukdam
	* @Create Date 2564-06-18
	*/
    public function water_application_management()
    {
        $this->output('v_water_application_management', [
            "page_title" => "จัดการลงทะเบียนขอรับน้ำดื่ม"
        ]);
    }
}
/* End of file Pages.php */
