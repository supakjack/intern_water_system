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
        $this->config->load('server_config');
        $this->load->database();
        $this->load->model('Global_model');
        $this->load->library('bcrypt');
        header('Access-Control-Allow-Origin: ' . $this->config->item('cors_url'));
        header('Access-Control-Allow-Headers: ' . $this->config->item('cors_url'));
        header('Access-Control-Allow-Methods: GET, POST');
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
        $this->output->set_content_type('application/json')->set_output(json_encode([
            'data' => ['result' => $this->Global_model->select('users')->result()]
        ]));
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
        $this->output->set_content_type('application/json')->set_output(json_encode([
            'data' => ['result' => $this->Global_model->insert('users', $data)]
        ]));
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
        $this->output->set_content_type('application/json')->set_output(json_encode([
            'data' => ['result' => $this->Global_model->update('users',  $data, [$this->input->get()])]
        ]));
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
        $select_user = $this->Global_model->select('users', [['user_username' => $this->input->post('user_username')]])->result();
        if (COUNT($select_user) != 0) {
            $select_user = $select_user[0];
            if ($this->bcrypt->check_password($this->input->post('user_password'), $select_user->user_password)) {
                unset($select_user->user_password);
                $this->session->set_userdata('user', $select_user);
                $this->output->set_content_type('application/json')->set_output(json_encode([
                    'data' => ['result' => $this->session]
                ]));
            }
        } else {
            $this->output->set_content_type('application/json')->set_output(json_encode([
                'data' => ['result' => "Not found"]
            ]));
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
        $this->output->set_content_type('application/json')->set_output(json_encode([
            'data' => ['result' => $this->session->userdata('user')]
        ]));
    }
}
/* End of file Users.php */
