<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
       

    }
    public function authorize($uname, $password) {
    	$this->db->select('id,Email,First_Name,Last_Name,Sex,Category');
    	$this->db->where('Email',$uname);
    	$this->db->where('Password',$password);
    	$this->db->where('Del_Flag',"1");
    	$this->db->from('hotel_tbl_user');
    	$this->db->limit('1');
    	$query = $this->db->get();
    	if (count($query->result())!=0) {
    		return $query->result();
    	} else {
    		return "failed";
    	}
    }
    // public function authorizeagent($user_name, $password,$agent_code) {
    //     $this->db->select('id,Email,First_Name,Last_Name,Sex');
    //     $this->db->where('Username',$user_name);
    //     $this->db->where('password',$password);
    //     $this->db->where('Agent_Code',$agent_code);
    //     $this->db->where('delflg',"1");
    //     $this->db->from('hotel_tbl_agents');
    //     $this->db->limit('1');
    //     $query = $this->db->get();
    //     if (count($query->result())!=0) {
    //         return $query->result();
    //     } else {
    //         return "failed";
    //     }
    // }
    public function authorizeagent($user_name, $password,$agent_code) {
        /*Main Agent authorization start*/
        $this->db->select('id,Email,First_Name,Last_Name,Sex,extranetStatus');
        $this->db->where('Username',$user_name);
        $this->db->where('password',$password);
        $this->db->where('Agent_Code',$agent_code);
        $this->db->where('delflg',"1");
        $this->db->from('hotel_tbl_agents');
        $this->db->limit('1');
        $query = $this->db->get()->result();
        /*Main Agent authorization end*/
        if(count($query)!=0 && $query[0]->extranetStatus==0) {
            return "denied";
        } else if (count($query)==0) {
            return "failed";
        } else {
            return $query;
        }
    }
    public function update_login_record_agent($data,$id) {
        $this->db->insert('hotel_tbl_agent_log',$data);
        $id = $this->db->insert_id();
        return $id;
    }
    public function update_agent_active_status($agent_id,$data){
        $this->db->where('id',$agent_id);
        $this->db->update('hotel_tbl_agents',$data);
        return true;
    } 
    public function update_agent_login_record($last_data,$id,$logged_id) {
        $this->db->where('id',$logged_id);
        $this->db->update('hotel_tbl_agent_log',$last_data);
        return true;
    }
}