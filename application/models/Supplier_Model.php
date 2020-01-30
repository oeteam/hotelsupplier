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
					  'supplierid' => $this->session->userdata('supplier_id'),
					  'delflg' => 2
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
		} else if($filter=='2') {
			$this->db->where('delflg','2');
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
					  'max_total'		   => $request['max_total'],
					  'standard_capacity'  => $request['standarad'],
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
		$data = array('hotel_id'               => $request['hotel_id'],
					  'room_name'              => $request['room_name'],
					  'room_type'              => $request['roomtype'], 
					  // 'allotement'             => $request['allotement'], 
					  // 'price'                  => $request['price'], 
					  'room_facilities'        => implode(",", $request['room_facilties']), 
					  'occupancy'              => $request['occupancy'], 
					  'occupancy_child'        => $request['occupancy_child'], 
					  'max_total'		   	   => $request['max_total'],
					  'standard_capacity'      => $request['standarad'],
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
		$nationality = '';
    	if (isset($request['nationality_to']) && count($request['nationality_to'])!=0) {
    		$nationality = implode(",", $request['nationality_to']);
    	}
    	$market = '';
    	if (isset($request['market']) && count($request['market'])!=0) {
    		$market = implode(",", $request['market']);
    	}

    	$id=$request['id'];
    	$array= array(	
			        	'board' 	=> $request['board'],
			        	'max_child_age' 	=> '12',
			        	'from_date' 		=> $request['date_picker'],
			        	'to_date' 			=> $request['date_picker1'],
			        	'contract_flg' 	=> $request['roomstatus'],
			        	'hotel_id' 			=> $id,
			        	'BookingCode' 		=> $request['bookingCode'],
			        	'contract_type' => 'Main',
			        	'nationalityPermission' => $nationality,
			        	'market'			=> $market,
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
		$this->db->select('id,contract_id,contract_flg,board');
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
				    			if (isset($request['price'][$key]) && $request['price'][$key]!="") {
					    			$data['amount'] = $request['price'][$key];
				    			}
				    			if (isset($request['allotment'][$key]) && $request['allotment'][$key]!="") {
					    			$data['allotement'] = $request['allotment'][$key];
				    			}
				    			if (isset($request['cutoff'][$key]) && $request['cutoff'][$key]!="") {
					    			$data['cut_off'] =  $request['cutoff'][$key];
				    			}
						    	$this->db->where('contract_id',$request['contractid']);
					    		$this->db->where('room_id',$value);
					    		$this->db->where('hotel_id',$request['hotelid']);
					    		$this->db->where('allotement_date',$query_out[$i][0]->allotement_date);
					    		if (isset($data)) {
						    		$this->db->update('hotel_tbl_allotement',$data);
					    		}
				    		} else {
				    			if (isset($request['price'][$key]) && $request['price'][$key]!="") {
					    			$array['amount'] = $request['price'][$key];
				    			}
				    			if (isset($request['allotment'][$key]) && $request['allotment'][$key]!="") {
					    			$array['allotement'] = $request['allotment'][$key];
				    			}
				    			if (isset($request['cutoff'][$key]) && $request['cutoff'][$key]!="") {
					    			$array['cut_off'] =  $request['cutoff'][$key];
				    			}
				    			$array['allotement_date'] =  $result[$i];
				    			$array['room_id'] =  $value;
				    			$array['hotel_id'] =  $request['hotelid'];
				    			$array['contract_id'] =  $request['contractid'];
				    			$array['contract_fr_id'] = str_replace('CON0','',$request['contractid']);
				    			// $array= array(
				    			// 	'allotement'		=>  $request['allotment'],
		    					//     'cut_off'			=> $request['cutoff'],
		    					//     'allotement_date'	=> $result[$i],
		    					//     'amount' 			=>$request['price'],
		    					//     'room_id'			=> $value,
								   //  'hotel_id'		=> $request['hotelid'],
							    // 	'contract_id' 	=> $request['contractid']
							    // );
				    			if ((isset($request['price'][$key]) && $request['price'][$key]!="") || (isset($request['allotment'][$key]) && $request['allotment'][$key]!="") || (isset($request['cutoff'][$key]) && $request['cutoff'][$key]!="")) {
					        		$this->db->insert('hotel_tbl_allotement',$array);
				    			}
				    		}
					    }
					}
			    }
			}
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
  		$nationality = '';
    	if (isset($request['nationality_to']) && count($request['nationality_to'])!=0) {
    		$nationality = implode(",", $request['nationality_to']);
    	}
    	$market = '';
    	if (isset($request['market']) && count($request['market'])!=0) {
    		$market = implode(",", $request['market']);
    	}
  		$array= array(	
			        	'board' 	=> $request['board'],
			        	'max_child_age' 	=> '12',
			        	'from_date' 		=> $request['date_picker'],
			        	'to_date' 			=> $request['date_picker1'],
			        	'BookingCode' 		=> $request['bookingCode'],
			        	'contract_type' => 'Main',
			        	'nationalityPermission' => $nationality,
			        	'market'			=> $market,
			        	'Created_Date' => date("Y-m-d H:i:s"),
        				'Created_By' =>  $this->session->userdata('supplier_id'),
					);
  		if(isset($request['roomstatus']) && $request['roomstatus']!="") {
  			$array['contract_flg'] = $request['roomstatus'];
  		}
  // 		if (isset($request['markup']) && $request['markup']!="") {
		// 	$array['markup'] = $request['markup'];
		// }
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
    public function hotel_booking_detail($book_id) {
        $this->db->select('*,hotel_tbl_booking.created_date as booking_date,hotel_tbl_booking.board as boardName,hotel_tbl_booking.id as bkid,hotel_tbl_agents.First_Name as AFName,hotel_tbl_agents.Last_Name as ALName');
        $this->db->from('hotel_tbl_booking');
        $this->db->join('hotel_tbl_hotels','hotel_tbl_booking.hotel_id = hotel_tbl_hotels.id', 'left');
        $this->db->join('hotel_tbl_hotel_room_type','hotel_tbl_booking.room_id = hotel_tbl_hotel_room_type.id', 'left');
        $this->db->join('hotel_tbl_room_type','hotel_tbl_hotel_room_type.room_type = hotel_tbl_room_type.id', 'left');
        $this->db->join('hotel_tbl_agents','hotel_tbl_booking.agent_id = hotel_tbl_agents.id', 'left');
        $this->db->where('hotel_tbl_booking.id',$book_id);
         $this->db->where('hotel_tbl_hotels.supplierid',$this->session->userdata('supplier_id'));
        $query=$this->db->get();
        return $query->result();
    } 
    public function board_booking_detail($book_id) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_bookingboard');
      $this->db->where('bookingID',$book_id);
      $query = $this->db->get();
      return $query->result();
    }
    public function general_booking_detail($book_id) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_bookgeneralsupplement');
      $this->db->where('bookingID',$book_id);
      $query = $this->db->get();
      return $query->result();
    }
    public function getExtrabedDetails($book_id){
      $this->db->select('*');
      $this->db->from('bookingextrabed');
      $this->db->where('bookID',$book_id);
      $query = $this->db->get();
      return $query->result();
  	}
  	public function get_cancellation_terms($request) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_bookcancellationpolicy');
      $this->db->where('hotel_tbl_bookcancellationpolicy.bookingId',$request);
      $this->db->order_by('hotel_tbl_bookcancellationpolicy.daysInAdvance','asc');
      $query=$this->db->get();
      return $query->result();
    }
    public function TotalBookingAmountDetailsGet($book_id) {
      $return['Cost'] = 0;
      $return['Selling'] = 0;
      $return['AgentProfit'] = 0;
      $return['AdminProfit'] = 0;
      $view = $this->Supplier_Model->booking_details($book_id);
      $board = $this->Supplier_Model->board_booking_detail($book_id);
      $general = $this->Supplier_Model->general_booking_detail($book_id);
      $cancelation =  $this->Supplier_Model->get_cancellation_terms($book_id);
      $ExBed =  $this->Supplier_Model->getExtrabedDetails($book_id);

      $total_markup = $view[0]->agent_markup+$view[0]->admin_markup+$view[0]->search_markup;
      $book_room_count = $view[0]->book_room_count;
      $individual_amount = explode(",", $view[0]->individual_amount);
      if ($view[0]->individual_discount!="") {
        $individual_discount = explode(",", $view[0]->individual_discount);
      }

      $tot_days = $view[0]->no_of_days;

      $roomExp = explode(",", $view[0]->room_id);
      $ExtrabedDiscount = explode(",", $view[0]->ExtrabedDiscount);
      $GeneralDiscount = explode(",", $view[0]->GeneralDiscount);
      $BoardDiscount = explode(",", $view[0]->BoardDiscount);
      $RequestType = explode(",", $view[0]->RequestType);

      for ($i=1; $i <= $book_room_count; $i++) {
        if (!isset($ExtrabedDiscount[$i-1])) {
          $ExtrabedDiscount[$i-1] = 0;
        }
        if (!isset($GeneralDiscount[$i-1])) {
          $GeneralDiscount[$i-1] = 0;
        }
        if (!isset($BoardDiscount[$i-1])) {
          $BoardDiscount[$i-1] = 0;
        }
        if (!isset($roomExp[$i-1])) {
          $room_id = $roomExp[0];
        } else {
          $room_id = $roomExp[$i-1];
        }

        $Fdays = 0;
        $discountType = "";
        $DisTypExplode = explode(",", $view[0]->discountType);
        $DisStayExplode = explode(",", $view[0]->discountStay);
        $DisPayExplode = explode(",", $view[0]->discountPay);
        $discountCode = explode(",", $view[0]->discountCode);
        if (!isset($DisTypExplode[$i])) {
          $DisTypExplode[$i] = $DisTypExplode[0];
        }
        if (!isset($DisStayExplode[$i])) {
          $DisStayExplode[$i] = $DisStayExplode[0];
        }
        if (!isset($DisTypExplode[$i])) {
          $DisPayExplode[$i] = $DisPayExplode[0];
        }
        if (!isset($discountCode[$i])) {
          $discountCode[$i] = $discountCode[0];
        }
        if (isset($DisTypExplode[$i-1]) && $DisTypExplode[$i-1]=="stay&pay") {
          $Cdays = $tot_days/$DisStayExplode[$i-1];
          $parts = explode('.', $Cdays);
          $Cdays = $parts[0];
          $Sdays = $DisStayExplode[$i-1]*$Cdays;
          $Pdays = $DisPayExplode[$i-1]*$Cdays;
          $Tdays = $tot_days-$Sdays;
          $Fdays = $Pdays+$Tdays;
          $discountType = $DisTypExplode[$i-1];
        }

        $varIndividual = 'Room'.$i.'individual_amount';
        if($view[0]->$varIndividual!="") {
          $individual_amount = explode(",", $view[0]->$varIndividual);
        }

        $varIndividualDis = 'Room'.$i.'Discount';
        if($view[0]->$varIndividual!="") {
          $individual_discount = explode(",", $view[0]->$varIndividualDis);
        }
        $oneNight = array();
        for ($j=0; $j < $tot_days ; $j++) { 
          if (!isset($individual_discount[$j])) {
            $individual_discount[$j] = 0;
          }
          $CPRMRate[$j]=0;
          $DisroomAmount[$j] = 0;
          $CPEAmoAD[$j] = 0;
          $ExAmount[$j] = 0;
          $TExAmount[$j] = 0;
          $CPGAmoAD[$j] = 0;
          $CPAmoAD[$j] = 0; 
          $GCamount[$j] = 0;
          $CPBAAmoAD[$j] = 0;
          $BAamount[$j] = 0;
          $TBAamount[$j] = 0;
          $CPBCAmoAd[$j]  = 0;
          $BCamount[$j] = 0;
          $TBCamount[$j]  = 0;
          $CPGAmoAD[$j] = 0;
          $GAamount[$j] = 0;
          $TPBAamount[$j] = 0;
          /* Room rates start */
          $rmAmount = 0;
          if ($view[0]->revenueMarkup!="" && $view[0]->revenueMarkup!=0) {
            if ($view[0]->revenueMarkupType=='Percentage') {
              $rmAmount = ($individual_amount[$j]*$view[0]->revenueMarkup)/100;
            } else {
              $rmAmount = $view[0]->revenueMarkup;
            }
          }
          // Cost Room price 
            $CPRMRate[$j] = $individual_amount[$j]-($individual_amount[$j]*$individual_discount[$j])/100;
          // Selling Room price start
            $roomAmount[$j] = (($individual_amount[$j]*$total_markup)/100)+$individual_amount[$j]+$rmAmount;
            $DisroomAmount[$j] = $roomAmount[$j]-($roomAmount[$j]*$individual_discount[$j])/100;
          /* Room rates end */
          /* Extrabed rate start */
            if (count($ExBed)!=0) {
              foreach ($ExBed as $Exkey => $Exvalue) {
                if ($Exvalue->date==date('Y-m-d', strtotime($view[0]->check_in. ' + '.$j.'  days'))) {
                  $exroomExplode = explode(",", $Exvalue->rooms);
                  $examountExplode = explode(",", $Exvalue->Exrwamount);
                  $exTypeExplode = explode(",", $Exvalue->Type);
                  foreach ($exroomExplode as $Exrkey => $EXRvalue) {
                    if ($EXRvalue==$i) {
                      $ExMAmount = 0;
                      if ($view[0]->revenueMarkup!="") {
                        if ($exTypeExplode[$Exrkey]=="Adult Extrabed" || $exTypeExplode[$Exrkey]=="Child Extrabed") {
                          if ($view[0]->revenueExtrabedMarkupType=='Percentage') {
                            $ExMAmount = ($examountExplode[$Exrkey]*$view[0]->revenueExtrabedMarkup)/100;
                          } else {
                            $ExMAmount = $view[0]->revenueExtrabedMarkup;
                          }
                        } else {
                          if ($view[0]->revenueBoardMarkupType=='Percentage') {
                            $ExMAmount = ($examountExplode[$Exrkey]*$view[0]->revenueBoardMarkup)/100;
                          } else {
                            $ExMAmount = $view[0]->revenueBoardMarkup;
                          }
                        }
                      }
                      $ExDis = 0;
                      if ($ExtrabedDiscount[$i-1]==1) {
                        $ExDis = $individual_discount[$j];
                      }
                      // Extrabed Cost Price
                      $CPEAmoAD[$j] = $examountExplode[$Exrkey]-(($examountExplode[$Exrkey]*$ExDis)/100);
                      // Extrabed Selling Price
                      $ExAmount[$j] = (($examountExplode[$Exrkey]*$total_markup)/100)+$examountExplode[$Exrkey]+$ExMAmount-(((($examountExplode[$Exrkey]*$total_markup)/100)+$examountExplode[$Exrkey]+$ExMAmount)*$ExDis/100);
                      $TExAmount[$j] +=$ExAmount[$j];
                    } 
                  } 
                } 
              }
            }
          /* Extrabed rate end */
 
          /* General supplement start */
            if (count($general)!=0) {
              
              foreach ($general as $gskey => $gsvalue) {
                if ($gsvalue->gstayDate==date('d/m/Y', strtotime($view[0]->check_in. ' + '.$j.'  days'))) {
                  $gsadultExplode = explode(",", $gsvalue->Rwadult);
                  $gsadultAmountExplode = explode(",", $gsvalue->Rwadultamount);
                  // Adult general supplements start
                  foreach ($gsadultExplode as $gsakey => $gsavalue) {
                    if ($gsavalue==$i) {
                      $GSMAmount = 0;
                      if ($view[0]->revenueMarkup!="") {
                        if ($view[0]->revenueGeneralMarkupType=='Percentage') {
                          $GSMAmount = ($gsadultAmountExplode[$gsakey]*$view[0]->revenueGeneralMarkup)/100;
                        } else {
                          $GSMAmount = $view[0]->revenueGeneralMarkup;
                        }
                      }
                      $GSDis = 0;
                      if ($GeneralDiscount[$i-1]==1) {
                        $GSDis = $individual_discount[$j];
                      }
                      // Adult general cost rate
                      $CPGAmoAD[$j] = $gsadultAmountExplode[$gsakey]-($gsadultAmountExplode[$gsakey]*$GSDis)/100;
                      // Adult general selling rate
                      $GAamount[$j] = ((($gsadultAmountExplode[$gsakey]*$total_markup)/100)+$gsadultAmountExplode[$gsakey]+$GSMAmount)-((($gsadultAmountExplode[$gsakey]*$total_markup)/100)+$gsadultAmountExplode[$gsakey]+$GSMAmount)*$GSDis/100;
                    }
                  }
                  // Adult general supplements end
                  // Child general supplements start
                  $gschildExplode = explode(",", $gsvalue->Rwchild);
                  $gschildAmountExplode = explode(",", $gsvalue->RwchildAmount);
                  foreach ($gschildExplode as $gsckey => $gscvalue) {
                    if ($gscvalue==$i) {
                      $GSMAmount = 0;
                      if ($view[0]->revenueMarkup!="") {
                        if ($view[0]->revenueGeneralMarkupType=='Percentage') {
                          $GSMAmount = ($gschildAmountExplode[$gsckey]*$view[0]->revenueGeneralMarkup)/100;
                        } else {
                          $GSMAmount = $view[0]->revenueGeneralMarkup;
                        }
                      }
                      $GSDis = 0;
                      if ($GeneralDiscount[$i-1]==1) {
                        $GSDis = $individual_discount[$j];
                      }
                      // Child general cost rate
                      $CPAmoAD[$j] = $gschildAmountExplode[$gsckey]-$gschildAmountExplode[$gsckey]*$GSDis/100;
                      // Child general selling rate
                      $GCamount[$j] = ((($gschildAmountExplode[$gsckey]*$total_markup)/100)+$gschildAmountExplode[$gsckey]+$GSMAmount)-((($gschildAmountExplode[$gsckey]*$total_markup)/100)+$gschildAmountExplode[$gsckey]+$GSMAmount)*$GSDis/100;
                    }
                  }
                  // Child general supplements end


                }
              }
            }
          /* General supplement end */

          /* Board supplement start */
          foreach ($board as $bkey => $bvalue) { 
            if (($room_id==$bvalue->room_id || $bvalue->room_id=="") && $bvalue->stayDate==date('d/m/Y', strtotime($view[0]->check_in. ' + '.$j.'  days'))) {

              // Adult Board start
              $ABReqwadultexplode = explode(",", $bvalue->Breqadults);
              $ABRwadultexplode = explode(",", $bvalue->Rwadult);
              $ABRwadultamountexplode = explode(",", $bvalue->RwadultAmount);
              foreach ($ABRwadultexplode as $ABRwkey => $ABRwvalue) {
                if ($ABRwvalue==$i) {
                  $BSMAmount = 0;
                  if ($view[0]->revenueMarkup!="") {
                    if ($view[0]->revenueBoardMarkupType=='Percentage') {
                      $BSMAmount = ($ABRwadultamountexplode[$ABRwkey]*$view[0]->revenueBoardMarkup)/100;
                    } else {
                      $BSMAmount = $view[0]->revenueBoardMarkup*$ABReqwadultexplode[$ABRwkey];
                    }
                  }
                  $BSDis = 0;
                  if ($BoardDiscount[$i-1]==1) {
                    $BSDis = $individual_discount[$j];
                  }
                  // Adult board cost rate
                  $CPBAAmoAD[$j] = $ABRwadultamountexplode[$ABRwkey]-($ABRwadultamountexplode[$ABRwkey]*$BSDis/100);
                  $TPBAamount[$j] += $CPBAAmoAD[$j];
                  
                  // Adult board selling rate
                  $BAamount[$j] = ((($ABRwadultamountexplode[$ABRwkey]*$total_markup)/100)+$ABRwadultamountexplode[$ABRwkey]+$BSMAmount)-((($ABRwadultamountexplode[$ABRwkey]*$total_markup)/100)+$ABRwadultamountexplode[$ABRwkey]+$BSMAmount)*$BSDis/100;
                  $TBAamount[$j] += $BAamount[$j];
                }
              }
              // Adult Board end

              // Child Board start
              $CBReqwchildexplode = explode(",", $bvalue->BreqchildCount);
              $CBRwchildexplode = explode(",", $bvalue->Rwchild);
              $CBRwchildamountexplode = explode(",", $bvalue->RwchildAmount);
              foreach ($CBRwchildexplode as $CBRwkey => $CBRwvalue) {
                if ($CBRwvalue==$i) {
                  $BSMAmount = 0;
                  if ($view[0]->revenueMarkup!="") {
                    if ($view[0]->revenueBoardMarkupType=='Percentage') {
                      $BSMAmount = ($CBRwchildamountexplode[$CBRwkey]*$view[0]->revenueBoardMarkup)/100;
                    } else {
                      $BSMAmount = $view[0]->revenueBoardMarkup*$CBReqwchildexplode[$CBRwkey];
                    }
                  }
                  $BSDis = 0;
                  if ($BoardDiscount[$i-1]==1) {
                    $BSDis = $individual_discount[$j];
                  }
                  // Child Board cost price
                  $CPBCAmoAd[$j] = $CBRwchildamountexplode[$CBRwkey]-($CBRwchildamountexplode[$CBRwkey]*$BSDis/100);
                  // Child Board selling price
                  $BCamount[$j] = ((($CBRwchildamountexplode[$CBRwkey]*$total_markup)/100)+$CBRwchildamountexplode[$CBRwkey]+$BSMAmount)-((($CBRwchildamountexplode[$CBRwkey]*$total_markup)/100)+$CBRwchildamountexplode[$CBRwkey]+$BSMAmount)*$BSDis/100;
                  $TBCamount[$j] += $BCamount[$j];
                }
              }
              // Child Board end

            }
          }
          /* Board supplement end */
        }

        // Roomwise total rates start
        if (isset($DisTypExplode[$i-1]) && $DisTypExplode[$i-1]=="stay&pay" && $Fdays!=0) {
        array_splice($CPRMRate, 1,$Fdays);
        array_splice($DisroomAmount, 1,$Fdays);
        if ($ExtrabedDiscount[$i-1]==1) {
          array_splice($CPEAmoAD,1,$Fdays);
          array_splice($TExAmount,1,$Fdays);
        }
        if ($GeneralDiscount[$i-1]==1) {
          array_splice($CPGAmoAD,1,$Fdays);
          array_splice($CPAmoAD,1,$Fdays);

          array_splice($GAamount,1,$Fdays);
          array_splice($GCamount,1,$Fdays);
        }
        if ($BoardDiscount[$i-1]==1) {
          array_splice($TPBAamount,1,$Fdays);
          array_splice($CPBCAmoAd,1,$Fdays);

          array_splice($TBAamount,1,$Fdays);
          array_splice($TBCamount,1,$Fdays);
        }
      } 
      $costPrice[$i] = array_sum($CPRMRate)+array_sum($CPEAmoAD)+array_sum($CPGAmoAD)+array_sum($CPAmoAD)+array_sum($TPBAamount)+array_sum($CPBCAmoAd);


      $totRmAmt[$i] = array_sum($DisroomAmount)+array_sum($TExAmount)+array_sum($GAamount)+array_sum($GCamount)+array_sum($TBAamount)+array_sum($TBCamount); 
        
      // Roomwise total rates end
      }
      $costPrice = array_sum($costPrice);
      if($view[0]->tax=="") {
      	$view[0]->tax = 0;
      }
      $sellingPrice = (array_sum($totRmAmt)*$view[0]->tax)/100+array_sum($totRmAmt);
      $Agentprofit= ($costPrice*($view[0]->agent_markup))/100;
      $Adminprofit= ($costPrice*($view[0]->admin_markup))/100;
      if ($Adminprofit==0) {
        $Adminprofit= $sellingPrice-($Agentprofit+$costPrice);
      }
      $return['Cost'] = $costPrice;
      $return['Selling'] = $sellingPrice;
      $return['AgentProfit'] = $Agentprofit;
      $return['AdminProfit'] = $Adminprofit;
      return $return;
    }
    public function booking_details($book_id) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_booking');
      $this->db->where('id',$book_id);
      $query=$this->db->get();
      return $query->result();
    }
    public function allbook($from,$to) {
        $this->db->select('hotel_tbl_booking.* ,hotel_tbl_hotels.supplierid');
        $this->db->from('hotel_tbl_booking');
        $this->db->join('hotel_tbl_hotels','hotel_tbl_booking.hotel_id = hotel_tbl_hotels.id', 'left');
        $this->db->where('hotel_tbl_hotels.supplierid',$this->session->userdata('supplier_id'));
	    $this->db->where('hotel_tbl_booking.Created_Date>=',$from);
	    $this->db->where('hotel_tbl_booking.Created_Date<=',$to);
	    $query = $this->db->get();
	    return count($query->result());
    }
    public function acceptbook($from,$to) {
        $this->db->select('hotel_tbl_booking.* ,hotel_tbl_hotels.supplierid');
        $this->db->from('hotel_tbl_booking');
        $this->db->join('hotel_tbl_hotels','hotel_tbl_booking.hotel_id = hotel_tbl_hotels.id', 'left');
        $this->db->where('hotel_tbl_hotels.supplierid',$this->session->userdata('supplier_id'));
	    $this->db->where('hotel_tbl_booking.Created_Date>=',$from);
	    $this->db->where('hotel_tbl_booking.Created_Date<=',$to);
        $this->db->where('hotel_tbl_booking.booking_flag !=','3');
        $query = $this->db->get();
        return count($query->result());
    }
    public function cancelbook($from,$to) {
       $this->db->select('hotel_tbl_booking.* ,hotel_tbl_hotels.supplierid');
        $this->db->from('hotel_tbl_booking');
        $this->db->join('hotel_tbl_hotels','hotel_tbl_booking.hotel_id = hotel_tbl_hotels.id', 'left');
        $this->db->where('hotel_tbl_hotels.supplierid',$this->session->userdata('supplier_id'));
	    $this->db->where('hotel_tbl_booking.Created_Date>=',$from);
	    $this->db->where('hotel_tbl_booking.Created_Date<=',$to);
        $this->db->where('hotel_tbl_booking.booking_flag','3');
        $query = $this->db->get();
        return count($query->result());
    }
    public function boardsupplementlist($contractid) {
    	$this->db->select('hotel_tbl_boardsupplement.*,hotel_tbl_boardsupplement.id as edit_id');
        $this->db->from('hotel_tbl_boardsupplement');
        $this->db->where('hotel_tbl_boardsupplement.contract_id',$contractid);
        return $query=$this->db->get();
    }
    public function generalsupplementlist($contractid) {
    	$this->db->select('hotel_tbl_generalsupplement.*,hotel_tbl_generalsupplement.id as edit_id');
        $this->db->from('hotel_tbl_generalsupplement');
        $this->db->where('hotel_tbl_generalsupplement.contract_id',$contractid);
        return $query=$this->db->get();
    }
    public function extrabedlist($contractid) {
    	$this->db->select('hotel_tbl_extrabed.*,hotel_tbl_extrabed.id as edit_id');
        $this->db->from('hotel_tbl_extrabed');
        $this->db->where('hotel_tbl_extrabed.contract_id',$contractid);
        return $query=$this->db->get();
    }
    public function minimumstaylist($contractid) {
    	$this->db->select('hotel_tbl_minimumstay.*,hotel_tbl_minimumstay.id as edit_id');
        $this->db->from('hotel_tbl_minimumstay');
        $this->db->where('hotel_tbl_minimumstay.contract_id',$contractid);
        return $query=$this->db->get();
    }
    public function stopSale_get_room_type($id) {
        $this->db->select('hotel_tbl_hotel_room_type.*,hotel_tbl_room_type.Room_Type');
        $this->db->from('hotel_tbl_hotel_room_type');
		$this->db->join('hotel_tbl_room_type', 'hotel_tbl_room_type.id = hotel_tbl_hotel_room_type.room_type', 'left');
        $this->db->where('hotel_tbl_hotel_room_type.delflg',1);
        $this->db->where('hotel_tbl_hotel_room_type.hotel_id',$id);
        // $this->db->group_by('hotel_tbl_room_type.room_type');
        $query=$this->db->get();
        return $query->result();
    }
    public function BoardSupplementSubmit($request) {
		$implode_room_types = "";
    	if (isset($request['room_type'])) {
    		$implode_room_types = implode(",", $request['room_type']);
    	}	
		if ($request['id']!="") {
    		$data= array( 
			 'board' 	      => $request['board'],
			 'roomType' 	  => $implode_room_types,
			 'season' 	      => 'Other',
			 'fromDate' 	  => $request['fromDate'],
			 'toDate' 	      => $request['toDate'],
			 'startAge' 	  => $request['StartAge'],
			 'finalAge' 	  => $request['FinalAge'],
			 'amount' 	      => $request['Amount'],
			 'UpdatedDate'    => date('Y-m-d H:i:s'),
			);
        	$this->db->where('id',$request['id']);
			$this->db->update('hotel_tbl_boardsupplement',$data);

    	} else {
			$data= array( 
			 'board' 	      => $request['board'],
			 'roomType' 	  => $implode_room_types,
			 'season' 	      => 'Other',
			 'fromDate' 	  => $request['fromDate'],
			 'toDate' 	      => $request['toDate'],
			 'startAge' 	  => $request['StartAge'],
			 'finalAge' 	  => $request['FinalAge'],
			 'amount' 	      => $request['Amount'],
			 'hotel_id' 	  => $request['hotel_id'],
			 'contract_id' 	  => $request['contract_id'],
			 'CreatedDate'    => date('Y-m-d H:i:s'),
			);
			$this->db->insert('hotel_tbl_boardsupplement',$data);
    	}

		return true;
	}
	public function BoardSupplementDetails($id) {
		$this->db->select('*');
        $this->db->from('hotel_tbl_boardsupplement');
        $this->db->where('id',$id);
        return $query=$this->db->get()->result();
	}
	public function delete_board($id) {
		$this->db->where('id',$id);
		$this->db->delete('hotel_tbl_boardsupplement');
		return true;
	}
	public function GeneralSupplementDetails($id) {
		$this->db->select('*');
        $this->db->from('hotel_tbl_generalsupplement');
        $this->db->where('id',$id);
        return $query=$this->db->get()->result();
	}
	public function GeneralSupplementSubmit($request) {
		$adultAmount = $request['adultAmount'];
		$childAmount = $request['childAmount'];
		$implode_room_types = "";
    	if (isset($request['room_type'])) {
    		$implode_room_types = implode(",", $request['room_type']);
    	}
	    if ($request['id']!="") {
    	    $data= array( 
		     'type'     		=> $request['type'],
		     'roomType'     	=> $implode_room_types,
		     'season'     		=> 'Other',
		     'fromDate'     	=> $request['fromDate'],
		     'toDate'     		=> $request['toDate'],
		     'adultAmount'    	=> $adultAmount,
		     'childAmount'    	=> $childAmount,
		     'application'    	=> $request['application'],
		     'mandatory' 		=> 1,
     		 'MinChildAge'	=> $request['MinChildAge'],
     		 'UpdatedDate'   => date('Y-m-d H:i:s'),

		    );
		    $this->db->where('id',$request['id']);
		    $this->db->update('hotel_tbl_generalsupplement',$data);
	    } else {
		    $data= array( 
		     'type'     		=> $request['type'],
		     'roomType'     	=> $implode_room_types,
		     'season'     		=> 'Other',
		     'fromDate'     	=> $request['fromDate'],
		     'toDate'     		=> $request['toDate'],
		     'adultAmount'    	=> $adultAmount,
		     'childAmount'    	=> $childAmount,
		     'hotel_id'     	=> $request['hotel_id'],
		     'contract_id'    	=> $request['contract_id'],
		     'application'    	=> $request['application'],
		     'mandatory' 		=> 1,
     		 'MinChildAge'	=> $request['MinChildAge'],
     		 'CreatedDate'   => date('Y-m-d H:i:s'),
		    );
		    $this->db->insert('hotel_tbl_generalsupplement',$data);
	    }
		return true;
	}
	public function delete_general($id) {
		$this->db->where('id',$id);
		$this->db->delete('hotel_tbl_generalsupplement');
		return true;
	}
	public function get_extrabed($id) {
		$this->db->select('*');
        $this->db->from('hotel_tbl_extrabed');
        $this->db->where('id',$id);
        return $query=$this->db->get()->result();
	}
	public function extrabedsubmit($request) {
		if ($request['Amount']!='' & $request['Amount']!=0) {
			$adultAmount = $request['Amount'];
		} else {
			$adultAmount = 0;
		}
		if ($request['ChildAmount']!='' & $request['ChildAmount']!=0) {
			$childAmount = $request['ChildAmount'];
		} else {
			$childAmount = 0;
		}
		

		$implode_room_types = "";
    	if (isset($request['room_type'])) {
    		$implode_room_types = implode(",", $request['room_type']);
    	}
	
    	if ($request['id']!="") {
			$data= array( 
			 'season' 	      => 'Other',
			 'from_date'     => $request['fromDate'],
			 'to_date' 	     => $request['toDate'],
			 'amount' 	     => $adultAmount,
			 'roomType' 	 => $implode_room_types,
		 	 'ChildAmount' 	  => $childAmount,
			 'ChildAgeFrom' 	  => $request['ChildAgeFrom'],
			 'ChildAgeTo' 	  => $request['ChildAgeTo'],
			 'UpdatedDate'   => date('Y-m-d H:i:s'),
			);	
			$this->db->where('id',$request['id']);
			$this->db->update('hotel_tbl_extrabed',$data);
    	} else {
			$data= array( 
			 'season' 	      => 'Other',
			 'from_date' 	  => $request['fromDate'],
			 'to_date' 	      => $request['toDate'],
			 'hotel_id' 	  => $request['hotel_id'],
			 'contract_id' 	  => $request['contract_id'],
			 'amount' 	      => $adultAmount,
			 'roomType' 	  => $implode_room_types,
		 	 'ChildAmount' 	  => $childAmount,
			 'ChildAgeFrom' 	  => $request['ChildAgeFrom'],
			 'ChildAgeTo' 	  => $request['ChildAgeTo'],
			 'CreatedDate'   => date('Y-m-d H:i:s'),
			);
			$this->db->insert('hotel_tbl_extrabed',$data);
    	}
		return true;
	}
	public function delete_extrabed($id) {
		$this->db->where('id',$id);
		$this->db->delete('hotel_tbl_extrabed');
		return true;
	}
	public function MinimumStaySubmit($request) {
    	if ($request['id']!="") {
			$data= array( 
			 'season' 	     => 'Other',
			 'fromDate'   => $request['fromDate'],
			 'toDate' 	  => $request['toDate'],
			 'minDay' 	  => $request['minDay'],
			 'UpdatedDate'   => date('Y-m-d H:i:s'),
			);
			$this->db->where('id',$request['id']);
			$this->db->update('hotel_tbl_minimumstay',$data);
    	} else {
			$data= array( 
			 'season' 	     => 'Other',
			 'fromDate' 	 => $request['fromDate'],
			 'toDate' 	     => $request['toDate'],
			 'minDay' 	     => $request['minDay'],
			 'hotel_id' 	 => $request['hotel_id'],
			 'contract_id' 	 => $request['contract_id'],
			 'CreatedDate'   => date('Y-m-d H:i:s'),
			);
			$this->db->insert('hotel_tbl_minimumstay',$data);
    	}
		return true;
	}
	public function get_minimumstay($id) {
		$this->db->select('*');
        $this->db->from('hotel_tbl_minimumstay');
        $this->db->where('id',$id);
        return $query=$this->db->get()->result();
	}
	public function delete_minimumstay($id) {
		$this->db->where('id',$id);
		$this->db->delete('hotel_tbl_minimumstay');
		return true;
	}
	public function roomName($id){
		$query = array();
		$roomid = explode(",", $id);
    	foreach ($roomid as $key => $Room) {
    		$this->db->select('hotel_tbl_hotel_room_type.*,hotel_tbl_room_type.Room_Type');
	        $this->db->from('hotel_tbl_hotel_room_type');
			$this->db->join('hotel_tbl_room_type','hotel_tbl_room_type.id = hotel_tbl_hotel_room_type.room_type', 'left');
	        $this->db->where('hotel_tbl_hotel_room_type.delflg',1);
	        $this->db->where('hotel_tbl_hotel_room_type.id',$Room);
	        // $this->db->group_by('hotel_tbl_room_type.room_type');
	        $query[$key]=$this->db->get()->result();
	    }
	    return $query;

	}
	public function cancellationsubmit($request) {
		$implode_room_types = "";
    	if (isset($request['room_type'])) {
    		$implode_room_types = implode(",", $request['room_type']);
    	}

    	if ($request['application']=="FREE OF CHARGE") {
    		$CancellationPercentage = 0;
    	} else {
    	    $CancellationPercentage = $request['CancellationPercentage'];
    	}
    	if ($request['id']!="") {
			$data= array( 
			 'roomType' 	          => $implode_room_types,
			 'season' 	             => 'Other',
			 'fromDate' 	          => $request['fromDate'],
			 'toDate' 	              => $request['toDate'],
			 'cancellationPercentage' => $CancellationPercentage,
			 'application' 	          => $request['application'],
			 'daysFrom'				 => $request['daysFrom'],
	 		 'daysTo'				 => $request['daysTo'],
	 		 'UpdatedDate'  		 => date('Y-m-d H:i:s'),
			);
			$this->db->where('id',$request['id']);
			$this->db->update('hotel_tbl_cancellationfee',$data);
    	} else {
			$data= array( 
			 'roomType' 	         => $implode_room_types,
			 'season' 	             => 'Other',
			 'fromDate' 	         => $request['fromDate'],
			 'toDate' 	             => $request['toDate'],
			 'cancellationPercentage'=> $CancellationPercentage,
			 'hotel_id' 	         => $request['hotel_id'],
			 'contract_id' 	         => $request['contract_id'],
			 'application' 	         => $request['application'],
			 'daysFrom'				 => $request['daysFrom'],
	 		 'daysTo'				 => $request['daysTo'],
	 		 'CreatedDate'   => date('Y-m-d H:i:s'),
			);
			$this->db->insert('hotel_tbl_cancellationfee',$data);
    	}
		return true;
	}
	public function nationalityList() {
		$this->db->select('id,name,continent');
        $this->db->from('countries');
        $this->db->where('name !=','');
        $query=$this->db->get();
        return $query->result();
	}
	public function getMarket() {
        $query=$this->db->query('select distinct continent from countries where continent!=""');
        return $query->result();
	}
}