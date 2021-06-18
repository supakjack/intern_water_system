<?php
/*
    Users
    Controller for Management Users
    @author Supak Pukdam
    @Create Date 2564-06-13
*/
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    /*setup for Users
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
        $this->load->library('bcrypt');
    }

    /*get users data
	* @name get_user
	* @input   -
	* @output  json users data  
	* @author Supak Pukdam
	* @Create Date 2564-06-13
	*/
    public function get_user()
    {
        response_ajax($this->Global_model->select('users')->result());
    }

    /*add users data
	* @name add_user
	* @input   insert $data
	* @output  users insert query  
	* @author Supak Pukdam
	* @Create Date 2564-06-13
	*/
    public function add_user()
    {
        $data = $this->input->post();
        $data['user_password'] = $this->bcrypt->hash_password($data['user_password']);
        response_ajax($this->Global_model->insert('users', $data));
    }

    /*update users data
	* @name update_user
	* @input   insert $data
	* @output  users insert query  
	* @author Supak Pukdam
	* @Create Date 2564-06-13
	*/
    public function update_user()
    {
        $data = $this->input->post();
        $data['user_password'] = $this->bcrypt->hash_password($data['user_password']);
        response_ajax($this->Global_model->update('users',  $data, [$this->input->get()]));
    }

    /*login to system
	* @name login_user
	* @input   login $data
	* @output  login user query  
	* @author Supak Pukdam
	* @Create Date 2564-06-13
	*/
    public function login_user()
    {
        $select_user = $this->Global_model->select('users', [['user_username' => $this->input->post('user_username')]])->result()[0];

        if ($this->bcrypt->check_password($this->input->post('user_password'), $select_user->user_password)) {
            unset($select_user->user_password);
            $this->session->set_userdata('user', $select_user);
            response_ajax($this->session);
        } else {
            response_ajax("Not found");
        }
    }

    /*logout to system
	* @name logout_user
	* @input   logout $data
	* @output  logout user query  
	* @author Supak Pukdam
	* @Create Date 2564-06-13
	*/
    public function logout_user()
    {
        $this->session->sess_destroy();
        response_ajax($this->session->userdata('user'));
    }
}
/* End of file Users.php */
