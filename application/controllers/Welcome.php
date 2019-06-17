<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->model('User_Model');
          $this->load->helper('common');

     }
	public function index()
	{
		$this->load->view('login');
	}
	public function login() {
        if ($_REQUEST['agent_code']=="") {
          $Return['error'] = 'Agent Code field is required!';
          $Return['color'] = 'orange';
        }else if ($_REQUEST['user_name']=="") {
          $Return['error'] = 'User Name field is required!';
          $Return['color'] = 'orange';
        } else if ($_REQUEST['password']=="") {
          $Return['error'] = 'Password field is required!';
          $Return['color'] = 'orange';
        } else {
          $username  = $_REQUEST['user_name'];
          $password  = md5($_REQUEST['password']);
          $agent_code = $_REQUEST['agent_code'];
          $result = $this->User_Model->authorizeagent($username,$password,$agent_code);
          if ($result=="failed") {
              $Return['error'] = 'Login failed';
              $Return['color'] = 'red';
          } else  {
              $active_data = array(
                'active_status' => '1'
              );
              $active_id = $this->User_Model->update_agent_active_status($result[0]->id,$active_data);
              $data = array(
                'is_logged_in' => '1',
                'last_login_date' => date('d-m-Y H:i:s')
              ); 
              $login_id = $this->User_Model->update_login_record_agent($data,$result[0]->id);
              $newdata = array(
                      'logeed_id'  => $login_id,
                      'supplier_id'  => $result[0]->id,
                      'supplier_email'     => $result[0]->Email,
                      'supplier_name'     => $result[0]->First_Name." ".$result[0]->Last_Name,
                      'supplier_currency'     => agentIp_currency($result[0]->id),
              );
              
              $this->session->set_userdata($newdata);
              $Return['error'] = 'Login Successfully';
              $Return['color'] = 'green';
              $Return['status'] = '1';
          }
        }
        echo json_encode($Return);
    } 
    public function agent_logout() {
      $session = $this->session->userdata('supplier_name');
      $agent_id = $this->session->userdata('supplier_id');
      $active_data = array(
                'active_status' => '0'
              );
              $active_id = $this->User_Model->update_agent_active_status($agent_id,$active_data);
      $last_data = array(
        'is_logged_in' => '0',
        'last_logout_date' => date('d-m-Y H:i:s')
      ); 
      $this->User_Model->update_agent_login_record($last_data, $this->session->userdata('supplier_id'), $this->session->userdata('logeed_id'));
          
      // Removing session data
      $sess_array = array('name' => '');
      $this->session->unset_userdata('logeed_id');
      $this->session->unset_userdata('supplier_id');
      $this->session->unset_userdata('supplier_email');
      $this->session->unset_userdata('supplier_name');
      $this->session->unset_userdata('supplier_currency');
      // $this->session->sess_destroy();
      redirect('../', 'refresh');
        // redirect("../backend/");
    }
}
