 <?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
$ci =& get_instance();
if ($ci->session->userdata('supplier_id')!="") {
	$validate = $ci->db->query("Select id from hotel_tbl_agents where id= '".$ci->session->userdata('supplier_id')."' and extranetStatus = 1 and delflg = 1");
	$validate = $validate->result();
	if(count($validate) ==0) {
	  redirect(base_url()."/welcome/agent_logout");
	}
}
