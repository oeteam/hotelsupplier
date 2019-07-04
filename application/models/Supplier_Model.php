<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Supplier_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function hotel_facilties_get() {
		$this->db->select('hotel_tbl_hotel_facility.* , hotel_tbl_icons.icon_src');
		$this->db->from('hotel_tbl_hotel_facility');
		$this->db->join('hotel_tbl_icons','hotel_tbl_hotel_facility.Icon = hotel_tbl_icons.id');
		$this->db->where('hotel_tbl_hotel_facility.delflg',1);
		$this->db->order_by('hotel_tbl_hotel_facility.id','desc');
	    $query=$this->db->get();
		return $query->result();
	}
	public function room_type_get() {
		$this->db->select('*');
		$this->db->from('hotel_tbl_room_type');
		$this->db->where('delflg',1);
		$this->db->order_by('id','desc');
	    $query=$this->db->get();
		return $query->result();
	}
	public function room_facilties_get() {
		$this->db->select('hotel_tbl_room_facility.* , hotel_tbl_icons.icon_src');
		$this->db->from('hotel_tbl_room_facility');
		$this->db->join('hotel_tbl_icons','hotel_tbl_room_facility.Icon = hotel_tbl_icons.id');
		$this->db->where('hotel_tbl_room_facility.delflg',1);
		$this->db->order_by('hotel_tbl_room_facility.id','desc');
	    $query=$this->db->get();
		return $query->result();
	}
	public function room_aminities_get(){
		$this->db->select('*');
		$this->db->from('hotel_tbl_roomaminities');
		$query=$this->db->get();
		return $query->result();
	}
	public function SelectCountry() {
	    $this->db->select('*');
        $this->db->from('countries');
        $this->db->order_by('id','asce');
        $query=$this->db->get();
        return $query->result();
    }
    public function currency(){
	    $this->db->select('*');
	    $this->db->from('currency_update');
	    $query=$this->db->get();
	    return $query->result();
	}
	public function SelectState($Conid){
    	$this->db->select('*');
        $this->db->from('states');
        $this->db->where('country_id',$Conid);
        $this->db->order_by('id','asce');
        $query=$this->db->get();
        return $query->result();
    }
    public function maxgetid() {
		$this->db->select_max('id');
		$this->db->from('hotel_tbl_hotels');
		$query=$this->db->get();
		return $query->result_array();
	}
	public function add_new_hotel($data,$password,$hotel_id) {
		if (!isset($data['parking'])) {
			$data['parking']=0;
		}
		if (!isset($data['wifi'])) {
			$data['wifi']=0;
		}
		if (!isset($data['internet'])) {
			$data['internet']=0;
		}
		if (!isset($data['accepting'])) {
			$data['accepting'] = 1;
		}
		if (!isset($data['rating'])) {
			$data['rating'] = 2;
		}
		$data = array('location' => $data['location'],
					  'lattitude' => $data['latitude'], 
					  'longitude' => $data['longitude'], 
					  'hotel_name' => $data['hotel_name'], 
					  // 'market' => $data['market'], 
					  'property_name' => $data['property_name'], 
					  'brand_name' => $data['brand_name'], 
					  // 'board' => $data['board'], 
					  'country' => $data['ConSelect'],
					  'state'=> $data['stateSelect'], 
					  'city' => $data['city'], 
					  'city_near_by' => $data['citynearby'], 
					  'city_description' => $data['citydes'], 
					  'hotel_facilities' => implode(",",$data['hotel_facilties']),
					  'room_facilities' => implode(",",$data['room_facilties1']), 
					  'keywords'=>$data['keywords'], 
					  'wifi' => $data['wifi'], 
					  'internet' => $data['internet'], 
					  'parking' => $data['parking'], 
					  'rating' => $data['rating'], 
					  'hotel_description' => $data['hotel_description'], 
					  'Number_of_room' => $data['total_no_of_rooms'], 
					  'website' => $data['Website'], 
					  'accepting_vcc' => $data['accepting'], 
					  'channel' => $data['channel_manager'], 
					  'chain' => $data['part_of_chain'], 
					  'sell_currency' => $data['sell_currency'], 
					  'facebook' => $data['facebook'], 
					  'google_plus' => $data['googleplus'], 
					  'twitter' => $data['twitter'], 
					  'linked_in' => $data['Linkedin'], 
					  'whatsapp' => $data['WhatsApp'], 
					  'vk_url' => $data['vkcom'], 
					  'sale_name' => $data['sales_fname'], 
					  'sale_lname' => $data['sales_lname'], 
					  'sale_number' => $data['sales_phone'], 
					  'sale_mobile' => $data['sales_mobile'], 
					  'sale_mail' => $data['sales_mail'], 
					  'sale_address' => $data['sales_address'], 
					  'sale_password' => $data['sales_password'],
					  'password_sale' => md5($data['sales_password']),
					  'revenu_name' => $data['revenue_fname'], 
					  'revenu_lname' => $data['revenue_lname'], 
					  'revenu_mail' => $data['revenue_mail'], 
					  'revenu_number' => $data['revenue_phone'], 
					  'revenu_mobile' => $data['revenue_mobile'], 
					  'revenu_address' => $data['revenue_address'],
					  'revenue_password'=>$data['revenue_password'],
					  'password_revenue'=>md5($data['revenue_password']),
					  'contract_name' => $data['contract_fname'], 
					  'contract_lname' => $data['contract_lname'], 
					  'contract_mail' => $data['contract_mail'], 
					  'contract_number' => $data['contract_phone'], 
					  'contract_mobile' => $data['contract_mobile'], 
					  'contracts_address' => $data['contracts_address'],
					  'contract_password' => $data['contract_password'],
					  'password_contract' => md5($data['contract_password']),
					  'finance_name' => $data['finance_fname'], 
					  'finance_lname' => $data['finance_lname'], 
					  'finance_number' => $data['finance_phone'], 
					  'finance_mobile' => $data['finance_mobile'], 
					  'finance_mail' => $data['finance_mail'], 
					  'finance_address' => $data['finance_address'], 
					  'finance_password' => $data['finance_password'],
					  'password_finance' => md5($data['finance_password']),
					  'password' => md5($password),
					  'hotel_code' => $hotel_id, 
					  'country_code' => $data['country'],
					  'Preferred_currency' 	=> $data['Preferred_currency'],
					  'created_date' => date('Y-m-d'), 
					  'created_by' => $this->session->userdata('supplier_id'), 
					  'supplier' =>'1',
					  'supplierid' => $this->session->userdata('supplier_id')
				);
		$this->db->insert('hotel_tbl_hotels',$data);
        $hotel_id = $this->db->insert_id();
		return $hotel_id; 
	}
	public function checkHotel($hotel) {
		$result = $this->db->query('select * from hotel_tbl_hotels where hotel_name like "%'.$hotel.'%" ')->result();
		return count($result);
	}
	public function hotel_list_select($filter) {
		$this->db->select('*');
		$this->db->from('hotel_tbl_hotels');
		$this->db->where('supplier','1');
		$this->db->where('supplierid',$this->session->userdata('supplier_id'));
		if($filter=='1') {
			$this->db->where('delflg','1');
		} else if($filter=='0') {
			$this->db->where('delflg','0');
		}
		$this->db->order_by('id','desc');
	    $query=$this->db->get();
		return $query;
	}
	public function hotel_detail_get($id) {
        $this->db->select('*');
        $this->db->from('hotel_tbl_hotels');
        $this->db->where('hotel_tbl_hotels.id',$id);
        $query=$this->db->get();
        return $query->result();
    } 
     public function get_aminity_text($value) {
    	$this->db->select('*');
    	$this->db->from('hotel_tbl_roomaminities');
    	$this->db->where('id',$value);
      	$query=$this->db->get();
      	return $query->result();
    }
     public function update_hotel($data,$hotel_id) {
		if (!isset($data['parking'])) {
			$data['parking']=0;
		}
		if (!isset($data['wifi'])) {
			$data['wifi']=0;
		}
		if (!isset($data['internet'])) {
			$data['internet']=0;
		}
		if (!isset($data['accepting'])) {
			$data['accepting'] = 1;
		}
		if (!isset($data['rating'])) {
			$data['rating'] = 2;
		}
		$data = array('location' 			=> $data['location'],
					  'lattitude' 		    => $data['latitude'], 
					  'longitude' 			=> $data['longitude'], 
					  'hotel_name' 			=> $data['hotel_name'], 
					  // 'market' 				=> $data['market'], 
					  'property_name' 		=> $data['property_name'], 
					  'brand_name' 			=> $data['brand_name'], 
					  // 'board' 				=> $data['board'], 
					  'city' 				=> $data['city'],
					  'country' 			=> $data['ConSelect'],
					  'state' 				=> $data['stateSelect'], 
					  'city_near_by' 		=> $data['citynearby'], 
					  'city_description' 	=> $data['citydes'], 
					  'hotel_facilities' 	=> implode(",",$data['hotel_facilties']),
					  'room_facilities' 	=> implode(",",$data['room_facilties1']), 
					  'keywords'			=> $data['keywords'], 
					  'wifi' 				=> $data['wifi'], 
					  'internet' 			=> $data['internet'], 
					  'parking' 			=> $data['parking'], 
					  'rating' 				=> $data['rating'], 
					  'hotel_description' 	=> $data['hotel_description'], 
					  'Number_of_room' 		=> $data['total_no_of_rooms'], 
					  'website' 			=> $data['Website'], 
					  'accepting_vcc' 		=> $data['accepting'], 
					  'channel' 			=> $data['channel_manager'], 
					  'chain' 				=> $data['part_of_chain'], 
					  'sell_currency' 		=> $data['sell_currency'], 
					  'facebook' 			=> $data['facebook'], 
					  'google_plus' 		=> $data['googleplus'], 
					  'twitter' 			=> $data['twitter'], 
					  'linked_in' 			=> $data['Linkedin'], 
					  'whatsapp' 			=> $data['WhatsApp'], 
					  'vk_url' 				=> $data['vkcom'], 
					  'sale_name' 			=> $data['sales_fname'], 
					  'sale_lname' 			=> $data['sales_lname'], 
					  'sale_number' 		=> $data['sales_phone'], 
					  'sale_mobile' 		=> $data['sales_mobile'], 
					  'sale_mail' 			=> $data['sales_mail'], 
					  'sale_address' 		=> $data['sales_address'],
					  'sale_password'	 	=> $data['sales_password'],
					  'password_sale' 		=> md5($data['sales_password']),
					  'revenu_name' 		=> $data['revenue_fname'], 
					  'revenu_lname' 		=> $data['revenue_lname'], 
					  'revenu_mail' 		=> $data['revenue_mail'], 
					  'revenu_number' 		=> $data['revenue_phone'], 
					  'revenu_mobile' 		=> $data['revenue_mobile'], 
					  'revenu_address' 		=> $data['revenue_address'],
					  'revenue_password'	=>$data['revenue_password'],
					  'password_revenue'	=>md5($data['revenue_password']),
					  'contract_name' 		=> $data['contract_fname'], 
					  'contract_lname' 		=> $data['contract_lname'], 
					  'contract_mail' 		=> $data['contract_mail'], 
					  'contract_number' 	=> $data['contract_phone'], 
					  'contract_mobile' 	=> $data['contract_mobile'], 
					  'contracts_address' 	=> $data['contracts_address'],
					  'contract_password' 	=> $data['contract_password'],
					  'password_contract' 	=> md5($data['contract_password']),
					  'finance_name' 		=> $data['finance_fname'], 
					  'finance_lname' 		=> $data['finance_lname'], 
					  'finance_number' 		=> $data['finance_phone'], 
					  'finance_mobile' 		=> $data['finance_mobile'], 
					  'finance_mail' 		=> $data['finance_mail'], 
					  'finance_address' 	=> $data['finance_address'],
					  'finance_password' 	=> $data['finance_password'],
					  'password_finance' 	=> md5($data['finance_password']),
					  'country_code' 		=> $data['country'],
					  'Preferred_currency' 	=> $data['Preferred_currency'],
					  'updated_date' 		=> date('Y-m-d'), 
					  'updated_by' 			=> $this->session->userdata('supplier_id'), 
				);

		$this->db->where('id',$hotel_id);
		$result = $this->db->update('hotel_tbl_hotels',$data);
		return $result; 
	}
	public function hotel_facilities($id) {
        $this->db->select('hotel_tbl_hotel_facility.* , hotel_tbl_icons.icon_src');
      	$this->db->from('hotel_tbl_hotel_facility');
      	$this->db->join('hotel_tbl_icons','hotel_tbl_icons.id = hotel_tbl_hotel_facility.Icon', 'left');
      	$this->db->where('hotel_tbl_hotel_facility.id',$id);
      	$query=$this->db->get();
      	return $query->result();
   	}
   	public function room_facilities_data($id) {
      $this->db->select('hotel_tbl_room_facility.* , hotel_tbl_icons.icon_src');
      $this->db->from('hotel_tbl_room_facility');
      $this->db->join('hotel_tbl_icons','hotel_tbl_icons.id = hotel_tbl_room_facility.Icon', 'left');
      $this->db->where('hotel_tbl_room_facility.id',$id);
      $query=$this->db->get();
      return $query->result();
    }
    public function deleteHotelPer($id)	{
		$this->db->where('id',$id);
		$this->db->delete('hotel_tbl_hotels');
		return true;
	}
	public function hotel_search_list($request) {
		$this->db->select('*');
		$this->db->from('hotel_tbl_hotels');
		if($request['hotel']!="") {
			$this->db->where('id',$request['hotel']);
		}
		if($request['con']!="") {
			$this->db->where('country',$request['con']);
		}
		if($request['state']!="") {
			$this->db->where('state',$request['state']);
		}
		if($request['state']!="") {
			$this->db->where('state',$request['state']);
		}
		if($request['city']!="") {
			$this->db->like('city',$request['city']);
		}
		if($request['prov']!="") {
			$this->db->like('property_name',$request['prov']);
		}
		if($request['rating']!="" && $request['rating']!='all') {
			$this->db->where('rating',$request['rating']);
		}
		$this->db->where('supplier','1');
		$this->db->where('supplierid',$this->session->userdata('supplier_id'));
		$this->db->order_by('id','desc');
		$query=$this->db->get();
		return $query;
  	}
  	public function review_view($id) {
	    $this->db->select('*');
	    $this->db->from('hotel_tbl_review');
	    $this->db->where('Hotel_Id',$id);
	    $this->db->where('delflg',1);
	    $this->db->order_by('id','desc');
	    $query=$this->db->get();
	    return $query->result();
	}
	public function average_ratings($id) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_review');
      $this->db->where('Hotel_Id',$id);
      $this->db->where('delflg',1);
      $query=$this->db->get();
      return $query->result();
    }
    public function recommended_count($id) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_review');
      $this->db->where('Hotel_Id',$id);
      $this->db->where('Evaluation',"Don't recommend");
      $this->db->where('delflg',1);
      $query=$this->db->get();
      return $query->num_rows();
    }
    public function review_add($data) {
	    $data= array(
	      'Username' =>$data['review_uname'],
	      'Evaluation' =>$data['evaluation'],
	      'Title' =>$data['title'],
	      'Comment' =>$data['comment'],
	      'Cleanliness' =>$data['cleanliness'],
	      'Room_Comfort' =>$data['room_comfort'],
	      'Location' =>$data['location'],
	      'Service_Staff' =>$data['service_staff'],
	      'Sleep_Quality' =>$data['sleep_quality'],
	      'Value_Price' =>$data['value_price'],
	      'Hotel_Id' => $_REQUEST['hotel_id'],
	      'Created_Date' => date('Y-m-d'),
	    );
	    $this->db->insert('hotel_tbl_review',$data);
	    return true;
    }
    public function rating_update($id ,$rating,$reviews,$ceil_starsrating) {
      $data= array(
        'starsrating' =>$rating,
        'reviews' =>$reviews,
        'ceil_starsrating' =>$ceil_starsrating,
      );
      $this->db->where('id',$id);
      $this->db->update('hotel_tbl_hotels',$data);
      return true;
    }
    public function get_total_hotels() {
		$this->db->select('*');
		$this->db->from('hotel_tbl_hotels');
		if(isset($_REQUEST['hotel'])&&$_REQUEST['hotel']!="") {
			$this->db->where('id',$_REQUEST['hotel']);
		}
		if(isset($_REQUEST['con'])&&$_REQUEST['con']!="") {
			$this->db->where('country',$_REQUEST['con']);
		}
		if(isset($_REQUEST['state'])&&$_REQUEST['state']!="") {
			$this->db->where('state',$_REQUEST['state']);
		}
		if(isset($_REQUEST['city'])&&$_REQUEST['city']!="") {
			$this->db->like('city',$_REQUEST['city']);
		}
		if(isset($_REQUEST['prov'])&&$_REQUEST['prov']!="") {
			$this->db->like('property_name',$_REQUEST['prov']);
		}
		if(isset($_REQUEST['rating'])&&$_REQUEST['rating']!="" && $_REQUEST['rating']!='all') {
			$this->db->where('rating',$_REQUEST['rating']);
		}
		$this->db->where('supplier','1');
		$this->db->where('supplierid',$this->session->userdata('supplier_id'));
		$this->db->order_by('id','desc');
		$query=$this->db->get()->result();
		return count($query);
    }
    public function hotel_search_list_rooms($limit,$start) {
		$this->db->select('id,hotel_name,delflg');
		$this->db->from('hotel_tbl_hotels');
		if(isset($_REQUEST['hotel'])&&$_REQUEST['hotel']!="") {
			$this->db->where('id',$_REQUEST['hotel']);
		}
		if(isset($_REQUEST['con'])&&$_REQUEST['con']!="") {
			$this->db->where('country',$_REQUEST['con']);
		}
		if(isset($_REQUEST['state'])&&$_REQUEST['state']!="") {
			$this->db->where('state',$_REQUEST['state']);
		}
		if(isset($_REQUEST['city'])&&$_REQUEST['city']!="") {
			$this->db->like('city',$_REQUEST['city']);
		}
		if(isset($_REQUEST['prov'])&&$_REQUEST['prov']!="") {
			$this->db->like('property_name',$_REQUEST['prov']);
		}
		if(isset($_REQUEST['rating'])&&$_REQUEST['rating']!="" && $_REQUEST['rating']!='all') {
			$this->db->where('rating',$_REQUEST['rating']);
		}
		$this->db->where('supplier','1');
		$this->db->where('supplierid',$this->session->userdata('supplier_id'));
		$this->db->order_by('id','desc');
		$this->db->limit($limit, $start);
		$query=$this->db->get()->result();
		return $query;
  	}
  	public function hotel_list($limit,$start) {
		$this->db->select('*');
		$this->db->from('hotel_tbl_hotels');
		$this->db->where('supplier','1');
		$this->db->where('supplierid',$this->session->userdata('supplier_id'));
		$this->db->order_by('id','desc');
		$this->db->limit($limit, $start);
		$query=$this->db->get();
		return $query;
  	}
  	public function update_room($request) {
    	if (!isset($request['allotement_room_name'])) {
    		$request['allotement_room_name']="";
    	}
    	if (!isset($request['allotement_room_type'])) {
    		$request['allotement_room_type']="";
    	}
    	if (!isset($request['allotement_id'])) {
    		$request['allotement_id']="";
    	}
    	$max_total = $request['occupancy'] + $request['occupancy_child'];
		$data = array('hotel_id'           => $request['hotel_id'],
					  'room_name'          => $request['room_name'],
					  'room_type'          => $request['roomtype'], 
					  'room_facilities'    => implode(",", $request['room_facilties']), 
					  'occupancy'          => $request['occupancy'], 
					  'occupancy_child'    => $request['occupancy_child'], 
					  'max_total'		   => $max_total,
					  'standard_capacity'  => $max_total,
					  'updated_date'       => date('Y-m-d'), 
					  'updated_by' => $this->session->userdata('agent_id'), 
				);
		$this->db->where('id',$request['room_id']);
		$this->db->update('hotel_tbl_hotel_room_type',$data);
		return true;
	}
	public function add_new_room($request) {
    	if (!isset($request['allotement_room_name'])) {
    		$request['allotement_room_name']="";
    	}
    	if (!isset($request['allotement_room_type'])) {
    		$request['allotement_room_type']="";
    	}
    	if (!isset($request['allotement_id'])) {
    		$request['allotement_id']="";
    	}
    	$max_total = $request['occupancy'] + $request['occupancy_child'];
		$data = array('hotel_id'               => $request['hotel_id'],
					  'room_name'              => $request['room_name'],
					  'room_type'              => $request['roomtype'], 
					  // 'allotement'             => $request['allotement'], 
					  // 'price'                  => $request['price'], 
					  'room_facilities'        => implode(",", $request['room_facilties']), 
					  'occupancy'              => $request['occupancy'], 
					  'occupancy_child'        => $request['occupancy_child'], 
					  'max_total'		   	   => $max_total,
					  'standard_capacity'      => $max_total,
					  'created_date'           => date('Y-m-d'), 
					  'created_by'             => $this->session->userdata('agent_id'), 
				);
		$this->db->insert('hotel_tbl_hotel_room_type',$data);
        $hotel_room_id = $this->db->insert_id();
		return $hotel_room_id;
	}
	public function hotel_rooms_list($id,$filter) {
        $this->db->select('hotel_tbl_hotel_room_type.*,hotel_tbl_room_type.Room_Type as room_type_name');
        $this->db->from('hotel_tbl_hotel_room_type');
        $this->db->join('hotel_tbl_room_type','hotel_tbl_room_type.id = hotel_tbl_hotel_room_type.room_type', 'left');
        $this->db->where('hotel_tbl_hotel_room_type.hotel_id',$id);
        $this->db->where('hotel_tbl_hotel_room_type.delflg',1);
        $this->db->where('hotel_tbl_hotel_room_type.delrequest',$filter);
        $this->db->order_by('hotel_tbl_hotel_room_type.id','desc');
        return $query=$this->db->get();
    }
    public function hotel_detail_view_room_type($id) {
        $this->db->select('hotel_tbl_hotel_room_type.*,hotel_tbl_room_type.*,hotel_tbl_hotel_room_type.id as room_id');
        $this->db->from('hotel_tbl_hotel_room_type');
		$this->db->join('hotel_tbl_room_type', 'hotel_tbl_room_type.id = hotel_tbl_hotel_room_type.room_type', 'left');
        $this->db->where('hotel_tbl_hotel_room_type.delflg',1);
        $this->db->where('hotel_tbl_hotel_room_type.id',$id);
        $query=$this->db->get();
        return $query->result();
    }
    public function room_names_get($hotel_id) {
    	$this->db->select('room_name');
        $this->db->from('hotel_tbl_hotel_room_type');
        $this->db->where('hotel_id',$hotel_id);
        $this->db->where('delflg',1);
        $query=$this->db->get();
        return $query->result();
    }
    public function delete_room($id) {
		$data = array('delrequest' => 1,
					  'updated_date' => date('Y-m-d'), 
					  'updated_by' => $this->session->userdata('supplier_id'), 
				);
		$this->db->where('id',$id);
		$this->db->update('hotel_tbl_hotel_room_type',$data);
		return true;
	}
	public function add_contract($request){
    	$id=$request['id'];
    	$array= array(	
			        	'board' 	=> $request['board'],
			        	'max_child_age' 	=> '12',
			        	'from_date' 		=> $request['date_picker'],
			        	'to_date' 			=> $request['date_picker1'],
			        	'contract_flg' 	=> $request['roomstatus'],
			        	'markup' 			=> $request['markup'],
			        	'markupType' => $request['markup_type'],
			        	'hotel_id' 			=> $id,
			        	'BookingCode' 		=> $request['bookingCode'],
			        	'contract_type' => 'Main',
			        	'Created_Date' => date("Y-m-d H:i:s"),
        				'Created_By' =>  $this->session->userdata('supplier_id'),
					);
		$this->db->insert('hotel_tbl_contract',$array);
		$con_id = $this->db->insert_id();
		
		if($con_id!=""){
        	$contract_id='CON0'.$con_id;
        }
        else{
        	$contract_id="CON01";
    	}
    	$array = array(
    					'contract_id' => $contract_id,
    					'Updated_Date' => date("Y-m-d H:i:s"),
        				'Updated_By' =>  $this->session->userdata('supplier_id'),
					);
		$this->db->where('id', $con_id);
		$this->db->update('hotel_tbl_contract', $array);
		return $con_id;
    }
    public function get_total_contracts($hotel) {
		$this->db->select('*');
		$this->db->from('hotel_tbl_contract');
		$this->db->where('hotel_id',$hotel);
		$this->db->where('Created_By',$this->session->userdata('supplier_id'));
		$this->db->order_by('id','desc');
		$query=$this->db->get()->result();
		return count($query);
    }
    public function contractList($hotel) {
		$this->db->select('id,contract_id,contract_flg');
		$this->db->from('hotel_tbl_contract');
		$this->db->where('hotel_id',$hotel);
		$this->db->where('Created_By',$this->session->userdata('supplier_id'));
		$this->db->order_by('id','desc');
		$query=$this->db->get()->result();
		return $query;
  	}
  	public function getRooms($hotelid) {
  		$this->db->select('a.id,a.room_name,a.Room_Type,CONCAT(a.room_name," ",b.Room_Type) as roomName');
		$this->db->from('hotel_tbl_hotel_room_type a');
        $this->db->join('hotel_tbl_room_type b','b.id = a.room_type', 'left');
		$this->db->where('a.hotel_id',$hotelid);
		$this->db->where('a.delrequest','0');
		$this->db->order_by('id','desc');
		$query=$this->db->get()->result();
		return $query;
  	}
  	public function add_allotment($request){
  		$start_date=date_create($request['bulk-alt-fromDate']);
        $end_date=date_create($request['bulk-alt-toDate']);
        $no_of_days=date_diff($start_date,$end_date);
        $tot_days = $no_of_days->format("%a");

	    if (isset($request['room'])) {
		    foreach ($request['room'] as $key => $value) {	
    			foreach ($_REQUEST['bulk-alt-days'] as $DayCKkey => $DayCKvalue) {
		        	for($i = 0; $i <= $tot_days; $i++) {
	        			if ($DayCKvalue==date('D', strtotime($request['bulk-alt-fromDate']. ' + '.$i.'  days'))) { 
					        $result[$i]= date('Y-m-d', strtotime($request['bulk-alt-fromDate']. ' + '.$i.'  days'));

				        	$query_out[$i]=$this->db->query('select * from hotel_tbl_allotement where room_id = '.$value.' AND allotement_date = "'.$result[$i].'" AND hotel_id = '.$request['hotelid'].' AND contract_id = "'.$request['contractid'].'" ')->result();

				    		if (count($query_out[$i])!=0) {
				    			if (isset($request['price']) && $request['price']!="") {
					    			$data['amount'] = $request['price'];
				    			}
				    			if (isset($request['allotment']) && $request['allotment']!="") {
					    			$data['allotement'] = $request['allotment'];
				    			}
				    			if (isset($request['cutoff']) && $request['cutoff']!="") {
					    			$data['cut_off'] =  $request['cutoff'];
				    			}
						    	$this->db->where('contract_id',$request['contractid']);
					    		$this->db->where('room_id',$value);
					    		$this->db->where('hotel_id',$request['hotelid']);
					    		$this->db->where('allotement_date',$query_out[$i][0]->allotement_date);
					    		if (isset($data)) {
						    		$this->db->update('hotel_tbl_allotement',$data);
					    		}
				    		} else {
				    			if (isset($request['price']) && $request['price']!="") {
					    			$array['amount'] = $request['price'];
				    			}
				    			if (isset($request['allotment']) && $request['allotment']!="") {
					    			$array['allotement'] = $request['allotment'];
				    			}
				    			if (isset($request['cutoff']) && $request['cutoff']!="") {
					    			$array['cut_off'] =  $request['cutoff'];
				    			}
				    			$array['allotement_date'] =  $result[$i];
				    			$array['room_id'] =  $value;
				    			$array['hotel_id'] =  $request['hotelid'];
				    			$array['contract_id'] =  $request['contractid'];
				    			// $array= array(
				    			// 	'allotement'		=>  $request['allotment'],
		    					//     'cut_off'			=> $request['cutoff'],
		    					//     'allotement_date'	=> $result[$i],
		    					//     'amount' 			=>$request['price'],
		    					//     'room_id'			=> $value,
								   //  'hotel_id'		=> $request['hotelid'],
							    // 	'contract_id' 	=> $request['contractid']
							    // );
				    			if ((isset($request['price']) && $request['price']!="") || (isset($request['allotment']) && $request['allotment']!="") || (isset($request['cutoff']) && $request['cutoff']!="")) {
					        		$this->db->insert('hotel_tbl_allotement',$array);
				    			}
				    		}
					    }
					}
			    }
			}
		}
		if(isset($request['policy'])&&$request['policy']!="") {
			$rooms = implode(",",$request['room']);
			if($request['policy']=="non-refundable") {
					$application = "FULL STAY";
			} else {
				$application = $request['deduction'];
			}
			$data = array('fromDate' => $request['bulk-alt-fromDate'],
						'toDate' => $request['bulk-alt-toDate'],
						'roomType' => $rooms,
						'cancellationPercentage' => 100,
						'hotel_id' => $request['hotelid'],
						'contract_id' => $request['contractid'],
						'application' => $application,
						'daysFrom' => $request['cancel_before'],
						'CreatedDate' => date('Y-m-d'),
						'CreatedBy' => $this->session->userdata('supplier_id'));
			$this->db->insert('hotel_tbl_cancellationfee',$data);
		}
		return true;
    }
    public function add_closedout($request){
    	$start_date=date_create($request['bulk-alt-fromDate']);
        $end_date=date_create($request['bulk-alt-toDate']);
        $no_of_days=date_diff($start_date,$end_date);
        $tot_days = $no_of_days->format("%a");
    	if (isset($request['room'])) {
		    foreach ($request['room'] as $key => $value) {	
    			foreach ($_REQUEST['bulk-alt-days'] as $DayCKkey => $DayCKvalue) {
		        	for($i = 0; $i <= $tot_days; $i++) {
	        			if ($DayCKvalue==date('D', strtotime($request['bulk-alt-fromDate']. ' + '.$i.'  days'))) { 
					        $result[$i]= date('Y-m-d', strtotime($request['bulk-alt-fromDate']. ' + '.$i.'  days'));
						    /* closed out check */
							if ($request['closedout']!='NoChange') {

								$query1=$this->db->query('select * from hotel_tbl_closeout_period where closedDate = "'.$result[$i].'" AND hotel_id = '.$request['hotelid'].' AND contract_id = "'.$request['contractid'].'" ')->result();

								if ($request['closedout']=='Close') {
					      	  		if (count($query1)!=0) {
					      	  			$InroomArr[0] = $value;
										$explodeCoRR = explode(",", $query1[0]->roomType);
				      	  				$arr_1 = array_merge($explodeCoRR,$InroomArr);
				      	  				$implode_room_types = implode(",", array_unique($arr_1));
				      	  				$data1= array('roomType'      =>$implode_room_types,
											          'reason'       => "",
											        );
										$this->db->where('closedDate',$result[$i]);
										$this->db->where('hotel_id',$request['hotelid']);
										$this->db->where('contract_id',$request['contractid']);
										$this->db->update('hotel_tbl_closeout_period',$data1);
									} else {
					      	  			$data2= array( 'hotel_id'     => $request['hotelid'],
											          'contract_id'  => $request['contractid'],
											          'closedDate'   => $result[$i],
											          'reason'       => "",
											          'roomType'     => $value,
											          'delflg'       => 1,
											        );
										$this->db->insert('hotel_tbl_closeout_period',$data2);
									}
								}

								if ($request['closedout']=='Open') {
									if (count($query1)!=0) {
										$InroomArr[0] = $value;
										$explodeCoRR = explode(",", $query1[0]->roomType);
				      	  				$arr_1 = array_diff($explodeCoRR,$InroomArr);
				      	  				if (count($arr_1)!=0) {
				      	  					$implode_room_types = implode(",", $arr_1);
					      	  				$data1= array('roomType'   	 => $implode_room_types,
											          'reason'     	 => "",
										        );
											$this->db->where('closedDate',$result[$i]);
											$this->db->where('hotel_id',$request['hotelid']);
											$this->db->where('contract_id',$request['contractid']);
											$this->db->update('hotel_tbl_closeout_period',$data1);
				      	  				} else {
						  	  				$this->db->where('closedDate',$result[$i]);
											$this->db->where('hotel_id',$request['hotelid']);
											$this->db->where('contract_id',$request['contractid']);
											$this->db->delete('hotel_tbl_closeout_period');
				      	  				}
									}
								}
							}
					    }
						
					}
			    }
			}
		}
		return true;
	}
    public function allotmentList($roomid,$contractid,$ndate) {
    	$this->db->select('a.*,c.closedDate');
		$this->db->from('hotel_tbl_allotement a');
		$this->db->join('hotel_tbl_closeout_period c','FIND_IN_SET(a.room_id,c.roomType) > 0 and c.contract_id=a.contract_id and c.closedDate=a.allotement_date','left');
		$this->db->where('a.allotement_date',$ndate);
		$this->db->where('a.contract_id',$contractid);
		$this->db->where('a.room_id',$roomid);
		$query=$this->db->get()->result();
		return $query;
    }
    public function get_total_rooms($hotel) {
		$this->db->select('*');
		$this->db->from('hotel_tbl_hotel_room_type');
		$this->db->where('hotel_id',$hotel);
		$this->db->where('Created_By',$this->session->userdata('supplier_id'));
		$this->db->order_by('id','desc');
		$query=$this->db->get()->result();
		return count($query);
    }
    public function getRooms_contracts($hotelid) {
  		$this->db->select('a.id,CONCAT(a.room_name," ",b.Room_Type) as roomName');
		$this->db->from('hotel_tbl_hotel_room_type a');
        $this->db->join('hotel_tbl_room_type b','b.id = a.room_type', 'left');
		$this->db->where('a.hotel_id',$hotelid);
		$this->db->where('a.delrequest','0');
		// $this->db->limit($limit, $start);
		$query=$this->db->get()->result();
		return $query;
  	}
  	public function closeOutSingleUpdate($closedDate,$hotel_id,$contract_id,$room_id,$closedout) {

		$query1=$this->db->query('select * from hotel_tbl_closeout_period where closedDate = "'.$closedDate.'" AND hotel_id = '.$hotel_id.' AND contract_id = "'.$contract_id.'" ')->result();
		if ($closedout=='Close') {
		  		if (count($query1)!=0) {
		  			$InroomArr[0] = $room_id;
				$explodeCoRR = explode(",", $query1[0]->roomType);
	  				$arr_1 = array_merge($explodeCoRR,$InroomArr);
	  				$implode_room_types = implode(",", array_unique($arr_1));
	  				$data1= array('roomType'      =>$implode_room_types,
					          'reason'       => "",
					        );
				$this->db->where('closedDate',$closedDate);
				$this->db->where('hotel_id',$hotel_id);
				$this->db->where('contract_id',$contract_id);
				$this->db->update('hotel_tbl_closeout_period',$data1);
			} else {
		  			$data2= array( 'hotel_id'     => $hotel_id,
					          'contract_id'  => $contract_id,
					          'closedDate'   => $closedDate,
					          'reason'       => "",
					          'roomType'     => $room_id,
					          'delflg'       => 1,
					        );
				$this->db->insert('hotel_tbl_closeout_period',$data2);
			}
		}

		if ($closedout=='Open') {
			if (count($query1)!=0) {
					$InroomArr[0] = $room_id;
					$explodeCoRR = explode(",", $query1[0]->roomType);
	  				$arr_1 = array_diff($explodeCoRR,$InroomArr);
	  				if (count($arr_1)!=0) {
	  					$implode_room_types = implode(",", $arr_1);
		  				$data1= array('roomType'   	 => $implode_room_types,
					          'reason'     	 => "",
				        );
						$this->db->where('closedDate',$closedDate);
						$this->db->where('hotel_id',$hotel_id);
						$this->db->where('contract_id',$contract_id);
						$this->db->update('hotel_tbl_closeout_period',$data1);
	  				} else {
		  				$this->db->where('closedDate',$closedDate);
						$this->db->where('hotel_id',$hotel_id);
						$this->db->where('contract_id',$contract_id);
						$this->db->delete('hotel_tbl_closeout_period');
	  				}
			}
		}
        return true;
	}
	public function closeOutSingleDelete($closedDate,$hotel_id,$contract_id,$room_id) {
		$this->db->select('*');
    	$this->db->from('hotel_tbl_contract');
    	$this->db->where('hotel_id',$hotel_id);
    	$this->db->where('contract_id',$contract_id);
    	$contract_type = $this->db->get()->result();
		// if ($contract_type[0]->contract_type=="Main") {
			$this->db->select('*');
			$this->db->from('hotel_tbl_closeout_period');
	        $this->db->where('hotel_id',$hotel_id);
	        $this->db->where('contract_id',$contract_id);
	        $this->db->where('closedDate',$closedDate);
	        $query = $this->db->get()->result();

	        if (count($query)!=0) {
	        	if ($query[0]->roomType==$room_id) {
	        		$this->db->from('hotel_tbl_closeout_period');
			        $this->db->where('hotel_id',$hotel_id);
			        $this->db->where('contract_id',$contract_id);
			        $this->db->where('closedDate',$closedDate);
					$this->db->delete('hotel_tbl_closeout_period');
	        	} else {
	        		$exploderoomType = explode(",", $query[0]->roomType);
	        		foreach ($exploderoomType as $key => $value) {
		        		if ($value!=$room_id) {
		        			$implodeData[$key] = $value; 
		        		} 
		        	}
		        	$implodeRoomType = implode(",", $implodeData);
		        	$data1= array( 
					 'roomType' 	  => $implodeRoomType,
					);

					$this->db->where('hotel_id',$hotel_id);
		        	$this->db->where('contract_id',$contract_id);
		        	$this->db->where('closedDate',$closedDate);
					$this->db->update('hotel_tbl_closeout_period',$data1);
	        	}
	        }
		// }
        return true;
	}
	public function room_booking($hotel_id,$room_id,$date,$con_id) {
      $date_split = explode("-", $date);
      if ($date=="") {
        $check_date = $date;
      } else {
        $check_date = $date_split[1]."/".$date_split[2]."/".$date_split[0];
      }

      $this->db->select('book_room_count');
      $this->db->from('hotel_tbl_booking');
      $this->db->where('hotel_id',$hotel_id);
      $this->db->where('room_id',$room_id);
      $this->db->where('"'.$check_date.'" >= check_in');
      $this->db->where('"'.$check_date.'" < check_out');
      $this->db->where('booking_flag !=',0);
      $this->db->where('booking_flag !=',3);
      $query=$this->db->get();
      $result = $query->result();
      if (count($result)!=0) {
        foreach ($result as $key => $value) {
            $room_count[] = $value->book_room_count;
        }
        $booking = array_sum($room_count);
      } else {
          $booking = 0;
      }
      return $booking;
    }
    public function updatehotelStatus($hotelid,$value) {
		$data= array( 
			 'delflg' 	  => $value,
			);
		$this->db->where('id',$hotelid);
		$this->db->update('hotel_tbl_hotels',$data);
		return true;
	}
	public function allcontractList($hotel) {
		$this->db->select('*');
		$this->db->from('hotel_tbl_contract');
		$this->db->where('hotel_id',$hotel);
		$this->db->where('Created_By',$this->session->userdata('supplier_id'));
		$this->db->order_by('id','desc');
		$query=$this->db->get()->result();
		return $query;
  	}
  	public function contract_detail_get($contractid) {
  		$this->db->select('*');
		$this->db->from('hotel_tbl_contract');
		$this->db->where('id',$contractid);
		$query=$this->db->get()->result();
		return $query;
  	}
  	public function update_contract($request,$contractid){
  		$array= array(	
			        	'board' 	=> $request['board'],
			        	'max_child_age' 	=> '12',
			        	'from_date' 		=> $request['date_picker'],
			        	'to_date' 			=> $request['date_picker1'],
			        	'markupType' => $request['markup_type'],
			        	'BookingCode' 		=> $request['bookingCode'],
			        	'contract_type' => 'Main',
			        	'Created_Date' => date("Y-m-d H:i:s"),
        				'Created_By' =>  $this->session->userdata('supplier_id'),
					);
  		if(isset($request['roomstatus']) && $request['roomstatus']!="") {
  			$array['contract_flg'] = $request['roomstatus'];
  		}
  		if (isset($request['markup']) && $request['markup']!="") {
			$array['markup'] = $request['markup'];
		}
    	$this->db->where('id',$contractid);
		$this->db->update('hotel_tbl_contract',$array);
		return true;
    }
     public function updatecontractStatus($contractid,$value) {
		$data= array( 
			 'contract_flg' 	  => $value,
			);
		$this->db->where('id',$contractid);
		$this->db->update('hotel_tbl_contract',$data);
		return true;
	}
	public function cancellationlist($contractid) {
		$this->db->select('*');
		$this->db->from('hotel_tbl_cancellationfee');
		$this->db->where('contract_id',$contractid);
		$this->db->order_by('id','desc');
		$query=$this->db->get();
		return $query;
    }
    public function delete_policy($id) {
		$this->db->where('id',$id);
		$this->db->delete('hotel_tbl_cancellationfee');
		return true;
	}
	public function policy_detail_get($id) {
        $this->db->select('*');
        $this->db->from('hotel_tbl_cancellationfee');
        $this->db->where('id',$id);
        $query=$this->db->get();
        return $query->result();
    } 
    public function update_policy($request) {
    	$rooms = implode(",",$request['room']);
    	$array = array('fromDate' => $request['fromDate'],
						'toDate' => $request['toDate'],
						'roomType' => $rooms,
						'cancellationPercentage' => $request['percentage'],
						'application' => $request['application'],
						'daysFrom' => $request['cancel_before'],
						'UpdatedDate' => date('Y-m-d'),
						'UpdatedBy' => $this->session->userdata('supplier_id'));
		$this->db->where('id', $request['policyid']);
		$this->db->update('hotel_tbl_cancellationfee', $array);
		return true;
    }
    public function hotel_booking_list($filter) {
        $this->db->select('hotel_tbl_booking.* ,hotel_tbl_booking.id as book_id,hotel_tbl_hotels.supplierid as supplier, hotel_tbl_hotels.hotel_name, ,hotel_tbl_room_type.Room_Type,hotel_tbl_hotel_room_type.room_name');
        $this->db->from('hotel_tbl_booking');
        $this->db->join('hotel_tbl_hotels','hotel_tbl_booking.hotel_id = hotel_tbl_hotels.id', 'left');
        $this->db->join('hotel_tbl_hotel_room_type','hotel_tbl_booking.room_id = hotel_tbl_hotel_room_type.id', 'left');
        $this->db->join('hotel_tbl_room_type','hotel_tbl_hotel_room_type.room_type = hotel_tbl_room_type.id', 'left');
        if($filter!=0) {
        	$this->db->where('hotel_tbl_booking.booking_flag',$filter);
        }
        $this->db->where('hotel_tbl_hotels.supplierid',$this->session->userdata('supplier_id'));
        $this->db->order_by('hotel_tbl_booking.id','desc') ;
        return $query=$this->db->get();
    } 
}