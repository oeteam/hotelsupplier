<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HotelSupplier extends MY_Controller {
	
	public function __construct()
     {
          parent::__construct();
          $this->load->library('pagination');
          $this->load->library("Ajax_pagination");
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->model('Supplier_Model');
          $this->load->helper('upload');
          $this->load->helper('common');
     }
	public function index()	{
    if ($this->session->userdata('supplier_name')=="") {
     redirect("welcome/agent_logout");
    }
    $this->load->view('supplier');
  }
  public function hotels() {
    if ($this->session->userdata('supplier_name')=="") {
        redirect("welcome/agent_logout");
    }
    $data['contry']= $this->Supplier_Model->SelectCountry();
    if(isset($_REQUEST['filter'])) {
      $value = $_REQUEST['filter'];
    } else {
      $value = '4';
    }
    $data['hotels'] = $this->Supplier_Model->hotel_list_select($value)->result();
    $this->load->view('supplierHotel',$data);
  }
  public function rooms() {
    if ($this->session->userdata('supplier_name')=="") {
        redirect("welcome/agent_logout");
    }
    $config['first_link'] = 'First';
    $config['div'] = 'hotel-list'; //Div tag id
    $config['base_url'] = base_url() . "hotelsupplier/rooms";
    $config['total_rows'] = $this->Supplier_Model->get_total_hotels($_REQUEST);
    $config['per_page'] = 20;
    $config['postVar'] = 'page';
    $this->ajax_pagination->initialize($config);
    if (!isset($_REQUEST['page']) || $_REQUEST['page']=="") {
      $page = 0;
    } else {
      $page = $_REQUEST['page'];
    }
    $data["links"] = $this->ajax_pagination->create_links();
    $data['HotelList']= $this->Supplier_Model->hotel_search_list_rooms($config['per_page'],$page);
    $data['contry']= $this->Supplier_Model->SelectCountry();
    $data['hotels'] = $this->Supplier_Model->hotel_list_select(1)->result();
    $this->load->view('supplierRooms',$data);
  }
  public function addhotelmodal() {
    if ($this->session->userdata('supplier_name')=="") {
        redirect("welcome/agent_logout");
    }
    $data['hotel_facilties'] = $this->Supplier_Model->hotel_facilties_get();
         $data['room_type'] = $this->Supplier_Model->room_type_get();
         $data['room_facilties'] = $this->Supplier_Model->room_facilties_get();
         $data['room_aminities'] = $this->Supplier_Model->room_aminities_get();
         $data['contry']= $this->Supplier_Model->SelectCountry();
         $data['currency_list']= $this->Supplier_Model->currency();
    if (isset($_REQUEST['hotels_edit_id'])) {
         $data['view'] =$this->Supplier_Model->hotel_detail_get($_REQUEST['hotels_edit_id']);
         $this->load->view('addhotelmodal',$data);
    } else {
         $this->load->view('addhotelmodal',$data);
    }
   
  }
  public function StateSelect() {
        $data = $this->Supplier_Model->SelectState($_REQUEST['Conid']);
        echo json_encode($data);
  }
  public function add_new_hotel() {
    if ($this->session->userdata('supplier_name')=="") {
        redirect("welcome/agent_logout");
    }
    if ($_REQUEST['hotels_edit_id']!="") {
         $update = $this->Supplier_Model->update_hotel($_REQUEST,$_REQUEST['hotels_edit_id']);
         for ($i=1; $i <=5 ; $i++) { 
              if ($_FILES['img'.$i]['name']!="") {
                   handle_hotel_gallery_image_upload($_REQUEST['hotels_edit_id'],$i);
              }
         }
         $description = 'Hotel details updated [id:'.$_REQUEST['hotels_edit_id'].', Hotel Code: HE0'.$_REQUEST['hotels_edit_id'].']';
         AgentlogActivity($description);
    } else {
         $last_id = $this->Supplier_Model->maxgetid();
         $hotel_last_id = $last_id[0]['id']+1;
         $passwording = $last_id[0]['id']+423;
         $password = "temp".$passwording."";
         $hotel_code = "HE0".$hotel_last_id."";
         $contract_code = "CON0".$hotel_last_id."";
         $hotel_id = $this->Supplier_Model->add_new_hotel($_REQUEST,$password,$hotel_code);
         if ($hotel_id!="") {
              for ($i=1; $i <=5 ; $i++) { 
                   if ($_FILES['img'.$i]['name']!="") {
                        handle_hotel_gallery_image_upload($hotel_id,$i);
                   }
              }
              $description = 'New hotel added [id:'.$hotel_id.', Hotel Code: '.$hotel_code.']';
              AgentlogActivity($description);
         }          
    } 
      redirect("hotelsupplier/hotels"); 
  }
  public function hotel_list() {
    if ($this->session->userdata('supplier_name')=="") {
        redirect("welcome/agent_logout");
    }
    $data = array();
    // Datatables Variables
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    if(isset($_REQUEST['filter'])) {
      $value = $_REQUEST['filter'];
    } else {
      $value = '4';
    }
    $hotel = $this->Supplier_Model->hotel_list_select($value);
    foreach($hotel->result() as $key => $r) {
         $cross = '<a href="#" title="click to delete" onclick="deletehotelper('.$r->id.');" data-toggle="modal" data-target="#myModal" class="sb2-2-1-edit delete"><i class="red accent-4 fa fa-trash-o" aria-hidden="true"></i></a>';  
         $edit='<a title="click to Edit" href="#" onclick="edithotel('.$r->id.');" data-toggle="modal" data-target="#myModal" class="sb2-2-1-edit"><i style="color: #0074b9;" class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
        if ($r->delflg==1) {
            $switch = '<label class="switch">
                        <input type="checkbox" id="hotelid'.$r->id.'"  onchange="updateStatus('."'$r->id'".');" checked >
                        <span class="slider round"></span>
                      </label>';
        } else {
            $switch = '<label class="switch">
                        <input type="checkbox" id="hotelid'.$r->id.'"  onchange="updateStatus('."'$r->id'".');">
                        <span class="slider round"></span>
                      </label>';
        }
              $data[] = array(
                   '<input type="checkbox" class="cmn-check" value="'.$r->id.'">',
                   $key+1,
                   '<a title="click to view" href="hotel_detail_view?hotel_id='.$r->id.'" style="color: #0074b9;"  class="sb2-2-1-edit">'.$r->hotel_name.'</a> '.' <small>('.$r->hotel_code.')</small> '.$edit,
                   $r->country,
                   $r->sale_number,
                   $r->sale_mail,
                   $switch,
                   $cross,
              );
    }
    $output = array(
         "draw"             => $draw,
          "recordsTotal"    => $hotel->num_rows(),
          "recordsFiltered" => $hotel->num_rows(),
          "data"            => $data
    );
    echo json_encode($output);
  }
  public function checkHotel($hotel) {
    if ($this->session->userdata('supplier_name')=="") {
        redirect("welcome/agent_logout");
    }
    $status = $this->Supplier_Model->checkHotel($hotel);
    if($status!=0) {
         $return['status'] = '1';
    } else {
         $return['status'] = '0';
    }
    echo json_encode($return);
   }
   public function hotel_detail_view() {
    if ($this->session->userdata('supplier_name')=="") {
        redirect("welcome/agent_logout");
    }
    $data['view'] =$this->Supplier_Model->hotel_detail_get($_REQUEST['hotel_id']);
    $hotel_facilities = explode(",",$data['view'][0]->hotel_facilities); 
    foreach ($hotel_facilities as $key => $value) {
         $data['hotel_facilities'][$key] = $this->Supplier_Model->hotel_facilities($value);
    }
    $room_facilities = explode(",",$data['view'][0]->room_facilities);
    foreach ($room_facilities as $key => $value) {
       $data['room_facilities'][$key] = $this->Supplier_Model->room_facilities_data($value);
    } 
    if ($data['view'][0]->board!="" && isset($data['view'][0]->board)) {
         $data['board'] = array($data['view'][0]->board => $data['view'][0]->board,'RO'=> 'RO' ,'BB' => 'BB','HB' => 'HB','FB' => 'FB','AL' => 'AL'); 
    } else {
         $data['board'] = array('' => '','RO'=> 'RO' ,'BB' => 'BB','HB' => 'HB','FB' => 'FB','AL' => 'AL'); 
    }
    $this->load->view('hotel_view',$data);
   }
   public function delete_hotelper() {
    if ($this->session->userdata('supplier_name')=="") {
        redirect("welcome");
    }
    $result = $this->Supplier_Model->deleteHotelPer($_REQUEST['delete_id']);
    if ($result==true) {
         $Return['status'] = '1';
         $description = 'Existing hotel details deleted [id:'.$_REQUEST['delete_id'].', Hotel Code: HE0'.$_REQUEST['delete_id'].']';
      AgentlogActivity($description);
    } else {
         $Return['status'] = "0";
    }
    echo json_encode($Return);
  }
  public function hotelsearch() {
    if ($this->session->userdata('supplier_name')=="") {
        redirect("welcome/agent_logout");
    }
    $data = array();
    // Datatables Variables
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $hotel = $this->Supplier_Model->hotel_search_list($_REQUEST);
    foreach($hotel->result() as $key => $r) {
         $cross = '<a href="#" title="click to delete" onclick="deletehotelper('.$r->id.');" data-toggle="modal" data-target="#myModal" class="sb2-2-1-edit delete"><i class="red accent-4 fa fa-trash-o" aria-hidden="true"></i></a>';  
         $edit='<a title="click to Edit" href="#" onclick="edithotel('.$r->id.');" data-toggle="modal" data-target="#myModal" class="sb2-2-1-edit"><i style="color: #0074b9;" class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
          if ($r->delflg==1) {
            $switch = '<label class="switch">
                        <input type="checkbox" id="hotelid'.$r->id.'"  onchange="updateStatus('."'$r->id'".');" checked >
                        <span class="slider round"></span>
                      </label>';
          } else {
              $switch = '<label class="switch">
                          <input type="checkbox" id="hotelid'.$r->id.'"  onchange="updateStatus('."'$r->id'".');">
                          <span class="slider round"></span>
                        </label>';
          }
              $data[] = array(
                   '<input type="checkbox" class="cmn-check" value="'.$r->id.'">',
                   $key+1,
                   '<a title="click to view" href="#" style="color: #0074b9;" data-toggle="modal" data-target="#myModal" class="sb2-2-1-edit"  onclick="viewhotel('.$r->id.');">'.$r->hotel_name.'</a> '.' <small>('.$r->hotel_code.')</small> '.$edit,
                   $r->country,
                   $r->sale_number,
                   $r->sale_mail,
                   $switch,
                   $cross,
              );
    }
    $output = array(
         "draw"             => $draw,
          "recordsTotal"    => $hotel->num_rows(),
          "recordsFiltered" => $hotel->num_rows(),
          "data"            => $data
    );
    echo json_encode($output);
  }
  public function review_view() {
    if ($this->session->userdata('supplier_name')=="") {
       redirect("welcome/agent_logout");
    }
    $data = array();
    $result= $this->Supplier_Model->review_view($_REQUEST['hotel_id']);
    if(count($result)!=0) {
    foreach ($result as $key => $value) {
     $Cleanliness = explode(";", $value->Cleanliness);
     $Room_Comfort = explode(";", $value->Room_Comfort);
     $Location = explode(";", $value->Location);
     $Service_Staff = explode(";", $value->Service_Staff);
     $Sleep_Quality = explode(";", $value->Sleep_Quality);
     $Value_Price = explode(";", $value->Value_Price);
     if ($Cleanliness['1'] == "1" || $Cleanliness['1'] == "2" || $Cleanliness['1'] == "3" || $Cleanliness['1'] == "4" || $Cleanliness['1'] == "5") {
       $Cleanliness['1'] = $Cleanliness['1'].".0";
     }
     if ($Room_Comfort['1'] == "1" || $Room_Comfort['1'] == "2" || $Room_Comfort['1'] == "3" || $Room_Comfort['1'] == "4" || $Room_Comfort['1'] == "5") {
       $Room_Comfort['1'] = $Room_Comfort['1'].".0";
     }
     if ($Location['1'] == "1" || $Location['1'] == "2" || $Location['1'] == "3" || $Location['1'] == "4" || $Location['1'] == "5") {
       $Location['1'] = $Location['1'].".0";
     }
     if ($Service_Staff['1'] == "1" || $Service_Staff['1'] == "2" || $Service_Staff['1'] == "3" || $Service_Staff['1'] == "4" || $Service_Staff['1'] == "5") {
       $Service_Staff['1'] = $Service_Staff['1'].".0";
     }
     if ($Sleep_Quality['1'] == "1" || $Sleep_Quality['1'] == "2" || $Sleep_Quality['1'] == "3" || $Sleep_Quality['1'] == "4" || $Sleep_Quality['1'] == "5") {
       $Sleep_Quality['1'] = $Sleep_Quality['1'].".0";
     }
     if ($Value_Price['1'] == "1" || $Value_Price['1'] == "2" || $Value_Price['1'] == "3" || $Value_Price['1'] == "4" || $Value_Price['1'] == "5") {
       $Value_Price['1'] = $Value_Price['1'].".0";
     }
    $data[] = '<div class="hpadding20">  
                 <div class="col-md-4 offset-0 center">
                   <div class="padding20">
                     <div class="bordertype5">
                       <div class="circlewrap">
                         <img src="'.base_url().'skin/images/user-avatar.jpg" class="circleimg" alt=""/>
                         <span>4.5</span>
                       </div>
                       <span class="dark">by '.$value->Username.'</span><br/>
                       <img src="'.base_url().'skin/images/check.png" alt=""/><br/>
                       <span class="green">Recommended<br/>for Everyone</span>
                     </div>
                     
                   </div>
                 </div>
                 <div class="col-md-8 offset-0">
                   <div class="padding20">
                     <span class="opensans size16 dark">'.$value->Evaluation.'</span><br/>
                     <span class="opensans size13 lgrey">Posted on '.$value->Updated_Date.' </span><br/>
                     <p>'.$value->Comment.'</p>  
                     <ul class="circle-list">
                       <li>'.$Cleanliness['1'].'</li>
                       <li>'.$Room_Comfort['1'].'</li>
                       <li>'.$Location['1'].'</li>
                       <li>'.$Service_Staff['1'].'</li>
                       <li>'.$Sleep_Quality['1'].'</li>
                       <li>'.$Value_Price['1'].'</li>
                     </ul>
                   </div>
                 </div>
                 <div class="clearfix"></div>              
               </div>  
               <div class="line2"></div>';
    }
    } else {
     $data[] = '<div class="col-md-12 center" style="margin-top: 31px;">No reviews</div>
                 <div class="clearfix"></div>';
    }
    echo json_encode($data);
  }
  public function average_ratings() {
    if ($this->session->userdata('supplier_name')=="") {
        redirect("welcome");
    }
   $data = array();
   $Cleanliness_arry = array();
   $Room_Comfort_arry = array();
   $Location_arry = array();
   $Service_Staff_arry = array();
   $Sleep_Quality_arry = array();
   $Value_Price_arry = array();
   $result=$this->Supplier_Model->average_ratings($_REQUEST['hotel_id']);
   $recommended_count=$this->Supplier_Model->recommended_count($_REQUEST['hotel_id']);
   $count = count($result);
   if ($count!=0) {
     foreach ($result as $key => $value) {
       $clean[$key] = explode(";", $value->Cleanliness);
       $Cleanliness_arry[$key] = $clean[$key][1];
       $room[$key] = explode(";", $value->Room_Comfort);
       $Room_Comfort_arry[$key] = $room[$key][1];
       $location[$key] = explode(";", $value->Location);
       $Location_arry[$key] = $location[$key][1];
       $service_staff[$key] = explode(";", $value->Service_Staff);
       $Service_Staff_arry[$key] = $service_staff[$key][1];
       $sleep_quality[$key] = explode(";", $value->Sleep_Quality);
       $Sleep_Quality_arry[$key] = $clean[$key][1];
       $value_price[$key] = explode(";", $value->Value_Price);
       $Value_Price_arry[$key] = $clean[$key][1];
     }
  
       $tot_cleanliness = array_sum($Cleanliness_arry);
       $total_cleanliness=round($tot_cleanliness/$count,1);
       $tot_room_comfort = array_sum($Room_Comfort_arry);
       $total_room_comfort=round($tot_room_comfort/$count,1);
       $tot_location = array_sum($Location_arry);
       $total_location=round($tot_location/$count,1);
       $tot_service_staff = array_sum($Service_Staff_arry);
       $total_service_staff=round($tot_service_staff/$count,1);
       $tot_sleep_quality = array_sum($Sleep_Quality_arry);
       $total_sleep_quality=round($tot_sleep_quality/$count,1);
       $tot_value_price = array_sum($Value_Price_arry);
       $total_value_price=round($tot_value_price/$count,1);
     if ($total_cleanliness == "1" || $total_cleanliness == "2" || $total_cleanliness == "3" || $total_cleanliness == "4" || $total_cleanliness == "5") {
       $total_cleanliness = $total_cleanliness.".0";
     }
     if ($total_room_comfort == "1" || $total_room_comfort == "2" || $total_room_comfort == "3" || $total_room_comfort == "4" || $total_room_comfort == "5") {
       $total_room_comfort = $total_room_comfort.".0";
     }
     if ($total_location == "1" || $total_location == "2" || $total_location == "3" || $total_location == "4" || $total_location == "5") {
       $total_location = $total_location.".0";
     }
     if ($total_service_staff == "1" || $total_service_staff == "2" || $total_service_staff == "3" || $total_service_staff == "4" || $total_service_staff == "5") {
       $total_service_staff = $total_service_staff.".0";
     }
     if ($total_sleep_quality == "1" || $total_sleep_quality == "2" || $total_sleep_quality == "3" || $total_sleep_quality == "4" || $total_sleep_quality == "5") {
       $total_sleep_quality = $total_sleep_quality.".0";
     }
     if ($total_value_price == "1" || $total_value_price == "2" || $total_value_price == "3" || $total_value_price == "4" || $total_value_price == "5") {
       $total_value_price = $total_value_price.".0";
     }

     $review_rating = ($total_cleanliness+$total_room_comfort+$total_location+$total_service_staff+$total_sleep_quality+$total_value_price)/6;
     $total_review_rating_round=ceil($review_rating);
     $percentange_rate = $total_review_rating_round*"2"."0";
     $total_review_rating=substr($review_rating, 0, 3);
     $ceil_starsrating = ceil($total_review_rating);

     $rating_insert =  $this->Supplier_Model->rating_update($_REQUEST['hotel_id'],$total_review_rating,$count,$ceil_starsrating);

     $recommended_total =$count - $recommended_count;
     $count_percnt = ($count/$count)*100;
     $get_count_percnt = ($recommended_total/$count)*100;

     $data['guest_recomend_percentage'][] = '<span class="opensans size30 bold grey2">'.ceil($get_count_percnt).'%</span><br/>
         of guests<br/>recommend';

     $data['review_guest_rating'][] = '<span class="opensans size30 bold grey2">'.$total_review_rating.'</span>/5<br/>
         guest ratings';

     $data['review_rating_count'][] = '<img src="'.base_url().'skin/images/user-rating-'.$total_review_rating_round.'.png" alt=""/><br/>
         '.$count.' reviews';

     $data['review_rating'][] ='<div class="col-md-4 offset-0">
               <span class="opensans dark size60 slim lh3 ">'.$total_review_rating.'/5</span><br/>
               <img src="'.base_url().'skin/images/user-rating-'.$total_review_rating_round.'.png" alt=""/>
             </div>
             <div class="col-md-8 offset-0">
               <div class="progress progress-striped">
                 <div class="progress-bar progress-bar-success wh'.$percentange_rate.'percent" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                 <span class="sr-only">'.$total_review_rating.' out of 5</span>
                 </div>
               </div>    
               <div class="progress progress-striped">
                 <div class="progress-bar progress-bar-success wh'.ceil($get_count_percnt).'percent" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                 <span class="sr-only">'.ceil($get_count_percnt).'% of guests recommend</span>
                 </div>
               </div>
               <div class="clearfix"></div>
               Ratings based on 5 Verified Reviews
             </div>';

     $data['review_count'][] = '<div class="col-md-4 offset-0">
                 <div class="scircle left">'.$total_cleanliness.'</div>
                 <div class="sctext left margtop15">Cleanliness</div>
                 <div class="clearfix"></div>
                 <div class="scircle left">'.$total_service_staff.'</div>
                 <div class="sctext left margtop15">Service & staff</div>
                 <div class="clearfix"></div>                
               </div>
               <div class="col-md-4 offset-0">
                 <div class="scircle left">'.$total_room_comfort.'</div>
                 <div class="sctext left margtop15">Room comfort</div>
                 <div class="clearfix"></div>
                 <div class="scircle left">'.$total_sleep_quality.'</div>
                 <div class="sctext left margtop15">Sleep Quality</div>      
                 <div class="clearfix"></div>                    
               </div>
               <div class="col-md-4 offset-0">
                 <div class="scircle left">'.$total_location.'</div>
                 <div class="sctext left margtop15">Location</div>
                 <div class="clearfix"></div>
                 <div class="scircle left">'.$total_value_price.'</div>
                 <div class="sctext left margtop15">Value for Price</div>  
                 <div class="clearfix"></div>                
               </div>  ';
   } else {
       $data['guest_recomend_percentage'][] = '<span class="opensans size30 bold grey2">0%</span><br/>
         of guests<br/>recommend';

       $data['review_guest_rating'][] = '<span class="opensans size30 bold grey2">0.0</span>/5<br/>
         guest ratings';

       $data['review_rating_count'][] = '<img src="'.base_url().'skin/images/user-rating-0.png" alt=""/><br/>
         0 reviews';

       $data['review_count'][] = '<div class="col-md-4 offset-0">
                 <div class="scircle left">0.0</div>
                 <div class="sctext left margtop15">Cleanliness</div>
                 <div class="clearfix"></div>
                 <div class="scircle left">0.0</div>
                 <div class="sctext left margtop15">Service & staff</div>
                 <div class="clearfix"></div>                
               </div>
               <div class="col-md-4 offset-0">
                 <div class="scircle left">0.0</div>
                 <div class="sctext left margtop15">Room comfort</div>
                 <div class="clearfix"></div>
                 <div class="scircle left">0.0</div>
                 <div class="sctext left margtop15">Sleep Quality</div>      
                 <div class="clearfix"></div>                    
               </div>
               <div class="col-md-4 offset-0">
                 <div class="scircle left">0.0</div>
                 <div class="sctext left margtop15">Location</div>
                 <div class="clearfix"></div>
                 <div class="scircle left">0.0</div>
                 <div class="sctext left margtop15">Value for Price</div>  
                 <div class="clearfix"></div>                
               </div>  ';
       $data['review_rating'][] ='<div class="col-md-4 offset-0">
               <span class="opensans dark size60 slim lh3 ">0.0/5</span><br/>
               <img src="'.base_url().'skin/images/user-rating-0.png" alt=""/>
             </div>
             <div class="col-md-8 offset-0">
               <div class="progress progress-striped">
                 <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                 <span class="sr-only">0.0 out of 5</span>
                 </div>
               </div>    
               <div class="progress progress-striped">
                 <div class="progress-bar progress-bar-success wh100percent" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                 <span class="sr-only">100% of guests recommend</span>
                 </div>
               </div>
               <div class="clearfix"></div>
               Ratings based on 5 Verified Reviews
             </div>';
   }
    echo json_encode($data);
  }
  public function review_insert() {
          if ($this->session->userdata('supplier_name')=="") {
           redirect("welcome/agent_logout");
         }
         if ($_REQUEST['review_uname']=="") {
           $Return['error'] = "Name field is required !";
           $Return['status'] = "0";
         } else if ($_REQUEST['title']=="") {
           $Return['error'] = "Title field is required !";
           $Return['status'] = "0";
         } else if ($_REQUEST['comment']=="") {
           $Return['error'] = "Comment field is required !";
           $Return['status'] = "0"; 
         } else {
           $Return['error'] = "Successfully Submitted !";
           $review= $this->Supplier_Model->review_add($_REQUEST);
           $Return['status'] = "1";
         }
       echo json_encode($Return);
  }
  public function addroommodal($hotelid) {
    if ($this->session->userdata('supplier_name')=="") {
           redirect("welcome/agent_logout");
    }
    $data['hotelid'] = $hotelid;
    $data['room_type'] = $this->Supplier_Model->room_type_get();
    $data['room_facilties'] = $this->Supplier_Model->room_facilties_get();   
    if (isset($_REQUEST['room_id'])) {
      $data['title'] = "Edit Room";
      $data['view'] =$this->Supplier_Model->hotel_detail_view_room_type($_REQUEST['room_id']);
      $data['room_names'] = $this->Supplier_Model->room_names_get($data['view'][0]->hotel_id);
      $this->load->view('room_add_modal',$data);       
    } else {
      $data['title'] = "Add Room";  
      $this->load->view('room_add_modal',$data);  
    }     
  }
  public function roomhotelsearch() {
    if ($this->session->userdata('supplier_name')=="") {
        redirect("welcome/agent_logout");
    }
    $config['first_link'] = 'First';
    $config['div'] = 'result_search'; //Div tag id
    $config['base_url'] = base_url() . "lists/index";
    $config['total_rows'] = $this->Supplier_Model->get_total_hotels($_REQUEST);
    $config['per_page'] = 20;
    $config['postVar'] = 'page';
    $this->ajax_pagination->initialize($config);
    if (!isset($_REQUEST['page']) || $_REQUEST['page']=="") {
      $page = 0;
    } else {
      $page = $_REQUEST['page'];
    }
    $result["links"] = $this->ajax_pagination->create_links();
    $HotelList = $this->Supplier_Model->hotel_search_list_rooms($config['per_page'],$page);
      $data['list'] ='';
      foreach ($HotelList as $key => $value) {
        $stopsalehotel = '';
        if($value->delflg==0) { 
          $stopsalehotel = " <span style='color:red;top: 0.8em;left: -16px;'>".'【Stop sale】'."</span>"; 
        }
        if($key==0) {
          $data['list'].= '<li><a class="active" id="'.$value->id.'" onclick="loadcontracts('.$value->id.')">'.$value->hotel_name.$stopsalehotel.'</a></li>';
        } else {
          $data['list'].= '<li><a id="'.$value->id.'" onclick="loadcontracts('.$value->id.')">'.$value->hotel_name.$stopsalehotel.'</a></li>';
        }
      }
      // $data['list'].= '</ul>';
    echo json_encode($data);
  }
  public function add_room() {
      if ($_REQUEST['room_id']!="") {
        $update = $this->Supplier_Model->update_room($_REQUEST);
        if ($_FILES['image-file']['name']!="") {
        handle_hotel_room_image_login_upload($_REQUEST['room_id']);
      }
      $description = 'Room details updated [id:'.$_REQUEST['room_id'].', Hotel Code: HE0'.$_REQUEST['hotel_id'].']';
      AgentlogActivity($description);
      } else {
      $hotel_room_id = $this->Supplier_Model->add_new_room($_REQUEST);
      handle_hotel_room_image_login_upload($hotel_room_id);
      $description = 'New room added [id:'.$hotel_room_id.', Hotel Code: HE0'.$_REQUEST['hotel_id'].']';
      AgentlogActivity($description);
      }
      redirect('hotelsupplier/rooms');
  }
   public function hotel_room_list($hotelid) {
    if ($this->session->userdata('supplier_name')=="") {
      redirect("welcome/agent_logout");
    }
    $data = array();
    // Datatables Variables
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    if (isset($_REQUEST['filter'])) {
      $filter = $_REQUEST['filter'];
    } else {
      $filter = 0;
    }
    $rooms = $this->Supplier_Model->hotel_rooms_list($hotelid,$filter);
      foreach($rooms->result() as $key => $r) {
        $edit='<a title="click to Edit" href="#" onclick="edithotel('.$r->id.');" data-toggle="modal" data-target="#myModal" class="sb2-2-1-edit"><i style="color: #0074b9;" class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
        $edit = '<a href="#"  data-toggle="modal"onclick="editroom('.$r->id.');"  data-target="#large_modal" class="sb2-2-1-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';       
        $delete = '<a  href="#" onclick="deleteroomfun('.$r->id.');" data-toggle="modal" data-target="#myModal" class="sb2-2-1-edit delete"><i class="red accent-4 fa fa-trash-o" aria-hidden="true"></i></a>';   
        if ($r->delflg==1) {
          $status = "<span class='text-success bold'>Active</span>";
        } else {
          $status = "<span class='text-danger bold'>Inactive</span>";
        }
        if ($r->images!="") {
              $img_path = base_url()."uploads/rooms/".$r->id."/".$r->images."";
          } else {
              $img_path = base_url()."assets/images/user/1.png";
          }
      $data[] = array(
        '<input type="checkbox" class="cmn-check" value="'.$r->id.'">',
        $r->room_name.'-'.$r->room_type_name.' '.$edit,
        $r->occupancy,
        $r->occupancy_child,
        $delete       
      );
        }
    $output = array(
        "draw" => $draw,
       "recordsTotal" => $rooms->num_rows(),
       "recordsFiltered" => $rooms->num_rows(),
       "data" => $data
    );
    echo json_encode($output);
    exit();
  }
  public function delete_room() {
    if ($this->session->userdata('supplier_name')=="") {
      redirect("welcome/agent_logout");
    }
    $result = $this->Supplier_Model->delete_room($_REQUEST['delete_id']);
    if ($result==true) {
      $Return['status'] = '1';
      $description = 'Room details delete request send [id:'.$_REQUEST['delete_id'].']';
      AgentlogActivity($description);
    } else {
      $Return['status'] = '0';
    }
    echo json_encode($Return);
  }
  public function contracts() {
    if ($this->session->userdata('supplier_name')=="") {
      redirect("welcome/agent_logout");
    }
    $config['first_link'] = 'First';
    $config['div'] = 'hotel-list'; //Div tag id
    $config['base_url'] = base_url() . "hotelsupplier/contracts";
    $config['total_rows'] = $this->Supplier_Model->get_total_hotels($_REQUEST);
    $config['per_page'] = 20;
    $config['postVar'] = 'page';
    $this->ajax_pagination->initialize($config);
    if (!isset($_REQUEST['page']) || $_REQUEST['page']=="") {
      $page = 0;
    } else {
      $page = $_REQUEST['page'];
    }
    $data["links"] = $this->ajax_pagination->create_links();
    $data['HotelList']= $this->Supplier_Model->hotel_search_list_rooms($config['per_page'],$page);
    $data['contry']= $this->Supplier_Model->SelectCountry();
    if(isset($_REQUEST['filter'])) {
      $value = $_REQUEST['filter'];
    } else {
      $value = '4';
    }
    $data['hotels'] = $this->Supplier_Model->hotel_list_select($value)->result();
    $data['contractlist']= $this->Supplier_Model->contractlist($data['HotelList'][0]->id);
    $this->load->view('supplierContracts',$data);
  }
  public function addcontractmodal($hotelid) {
    if ($this->session->userdata('supplier_name')=="") {
      redirect("welcome/agent_logout");
    }
    $data['hotelid'] = $hotelid;  
    if (isset($_REQUEST['contracts_edit_id'])) {
        $data['view'] =$this->Supplier_Model->contract_detail_get($_REQUEST['contracts_edit_id']);
        $data['title'] = "Edit Contract";
    } else {
        $data['title'] = "Add Contract";
    }
    $this->load->view('contract_add_modal',$data);      
  }
  public function add_contract(){
    if (isset($_REQUEST['contracts_edit_id']) && $_REQUEST['contracts_edit_id']!="") {
      $update = $this->Supplier_Model->update_contract($_REQUEST,$_REQUEST['contracts_edit_id']);
      $description = 'Contract details updated [id:'.$_REQUEST['contracts_edit_id'].', Contract ID: CON0'.$_REQUEST['contracts_edit_id'].']';
      AgentlogActivity($description);
    }  else {
      $view = $this->Supplier_Model->add_contract($_REQUEST);
      $description = 'New contract added [Hotel Code: HE0'.$_REQUEST['id'].', Contract ID: CON0'.$view.']';
      AgentlogActivity($description);
    } 
    redirect("hotelsupplier/contracts");
  }
  public function hotel_contract_list($hotelid) {
    if ($this->session->userdata('supplier_name')=="") {
        redirect("welcome/agent_logout");
    }
    $contractlist = $this->Supplier_Model->contractList($hotelid);
      $data['list'] ='';
      foreach ($contractlist as $key => $value) {
        $stopsale = '';
        if($value->contract_flg=='0') { 
          $stopsale = " <span style='color:red;top: 0.8em;left: -16px;'>".'【Stop sale】'."</span>";
        }
        if($key==0) {
          $data['list'].= '<li><a class="active cm-contract" onclick="loadallotment(\''.$value->contract_id.'\')" id="'.$value->contract_id.'" >'.$value->contract_id.$stopsale.'</a></li>';
        } else {
          $data['list'].= '<li><a class="cm-contract" onclick="loadallotment(\''.$value->contract_id.'\')" id="'.$value->contract_id.'">'.$value->contract_id.$stopsale.'</a></li>';
        }
      }
    echo json_encode($data);
  }
  public function add_allotment_modal($contractid,$hotelid) {
    if ($this->session->userdata('supplier_name')=="") {
      redirect("welcome/agent_logout");
    }
    $data['rooms'] = $this->Supplier_Model->getRooms($hotelid);
    $data['contractid'] = $contractid;
    $data['hotelid'] = $hotelid;
    $data['title'] = "Add Allotment";
    if(isset($_REQUEST['todate'])&&isset($_REQUEST['fromdate'])) {
      $data['title'] = "Edit Allotment";
      $data['view'] = array("todate" => $_REQUEST['todate'],
                            "fromdate" =>$_REQUEST['fromdate']);
    }  
    $this->load->view('allotment_add_modal',$data);      
  }
  public function add_allotment(){
    $query = $this->Supplier_Model->add_closedout($_REQUEST);
    $view = $this->Supplier_Model->add_allotment($_REQUEST);
    if ($view==true) {
      $Return['status'] = '1';
       $description = 'New allotment added [Hotel Code: HE0'.$_REQUEST['hotelid'].', Contract ID: CON0'.$_REQUEST['contractid'].']';
       AgentlogActivity($description);
    } else {
      $Return['status'] = '0';
    }
    echo json_encode($Return);
  }
  public function allotment_list() {
    if ($this->session->userdata('supplier_name')=="") {
      redirect("welcome/agent_logout");
    }
    $contractid = $_REQUEST['contractid'];
    $hotelid = $_REQUEST['hotelid'];
    $fromdate = $_REQUEST['fromdate'];
    $type = $_REQUEST['type'];
    $daycount = 7;
    if ($type=="month") {
      $daycount = 35;
      if($_REQUEST['value']=="prev") {
        $chdate = date('Y-m-d',strtotime($fromdate . "-1 month"));
      } else if($_REQUEST['value']=="next") {
        $chdate = date('Y-m-d',strtotime($fromdate . "+1 month"));
      } else if($_REQUEST['value']=="") {
        $chdate = $fromdate;
      }
    } else {
      if($_REQUEST['value']=="prev") {
        $chdate = date('Y-m-d',strtotime($fromdate . "-7 day"));
      } else if($_REQUEST['value']=="next") {
        $chdate = date('Y-m-d',strtotime($fromdate . "+7 day"));
      } else if($_REQUEST['value']=="") {
        $chdate = $fromdate;
      }
    }
    $rooms = $this->Supplier_Model->getRooms_contracts($hotelid);
    $output['list'] = '<thead><tr><th>Room</th>';
    for($i=0;$i<$daycount;$i++) {
      if ($i<7) {
        if ($type!="month" && $i==0 && date('Y-m-d',strtotime($chdate . "+".$i." day"))==date('Y-m-d')) {
          $output['list'] .= '<th>Today</th>';
        } else {
          $output['list'] .= '<th>'.date('D',strtotime($chdate . "+".$i." day")).'</th>';
        }
      }
      $ndate = date('Y-m-d',strtotime("+".$i." day"));
        // $allotment[]= $this->Supplier_Model->allotmentList($contractid,$ndate);
    }
    $output['list'] .= '<th>Action</th>';
      // print_r(date('Y-m-d',strtotime($chdate . "+1 day")));exit;
    $output['list'] .= '</tr></thead><tbody>';
    foreach ($rooms as $key => $value) {
      if ($type=="month") {
        $i = 0;
        for ($x=1; $x <= ($daycount/7); $x++) { 
          if ($x==1) {
            $output['list'] .= '<tr><td class="roomname" rowspan="5">'.$value->roomName.'</td>';
          } else {
            $output['list'] .= '<tr>';
          }

          for($i=$i;$i<(7*$x);$i++) {
            if (date('m',strtotime($chdate)) != date('m',strtotime($chdate . "+".$i." day"))) {
                $output['list'] .= '<td style="background-color:#cecaca"></td>';
            } else {
              $ndate =  date('Y-m-d',strtotime($chdate . "+".$i." day"));
              $data = $this->Supplier_Model->allotmentList($value->id,$contractid,$ndate);
              $room_booking = $this->Supplier_Model->room_booking($hotelid,$value->id,$ndate,$contractid);
              if (count($data)!=0 && $data[0]->closedDate=="") {
                 $close = '<span class="closeout closeout'.$value->id.$ndate.'" onClick="closeoutUpdate(\'closeout'.$value->id.$ndate.'\',\''.$contractid.'\','.$value->id.','.$hotelid.','."'$ndate'".')"><span class="text-success">ON</span></span>';
                 $stopsale = '';
               } else {
                 $close = '<span class="closeout closeout'.$value->id.$ndate.'" onClick="closeoutUpdate(\'closeout'.$value->id.$ndate.'\',\''.$contractid.'\','.$value->id.','.$hotelid.',\''.$ndate.'\');"><span class="text-danger">OFF</span></span>';
                 $stopsale = 'stopsale';
               }
              if (count($data)!=0) {
                $output['list'] .= '<td style="padding: 3px;" class="'.$stopsale.'"><div style="position:relative;">'.$close .'<p class="date">'.date('d-m',strtotime($data[0]->allotement_date)).'</p><p class="amount">AED '.$data[0]->amount.'</p><p class="allotment">'.$data[0]->allotement.'/'.$room_booking.'</p><p class="cutoff"><b>Cut Off:</b> '.$data[0]->cut_off.'</p><div></td>';
              } else {
                $output['list'] .= '<td style="background-color:#cecaca"><br><p class="date">'.date('d-m',strtotime($ndate)).'</p></td>';
              } 
            }
          }
          $i = 7*$x;
          if ($x==1) {
            $output['list'] .= '<td rowspan="5"><br><a data-toggle="modal" data-target="#myModal" onclick="add_allotment_modal(2);" class="date" style="cursor:pointer">Edit</a></td></tr>';
          } else {
            $output['list'] .= '</tr>';
          }
        }
      } else {
        $output['list'] .= '<tr><td class="roomname">'.$value->roomName.'</td>';
        for($i=0;$i<$daycount;$i++) {
          
           $ndate =  date('Y-m-d',strtotime($chdate . "+".$i." day"));
           $data = $this->Supplier_Model->allotmentList($value->id,$contractid,$ndate);
           $room_booking = $this->Supplier_Model->room_booking($hotelid,$value->id,$ndate,$contractid);
          if (count($data)!=0 && $data[0]->closedDate=="") {
             $close = '<span class="closeout closeout'.$value->id.$ndate.'" onClick="closeoutUpdate(\'closeout'.$value->id.$ndate.'\',\''.$contractid.'\','.$value->id.','.$hotelid.','."'$ndate'".')"><span class="text-success">ON</span></span>';
             $stopsale = '';
           } else {
             $close = '<span class="closeout closeout'.$value->id.$ndate.'" onClick="closeoutUpdate(\'closeout'.$value->id.$ndate.'\',\''.$contractid.'\','.$value->id.','.$hotelid.',\''.$ndate.'\');"><span class="text-danger">OFF</span></span>';
             $stopsale = 'stopsale';
           }
          if (count($data)!=0) {
            $output['list'] .= '<td style="padding: 3px;" class="'.$stopsale.'"><div style="position:relative;">'.$close .'<p class="date">'.date('d-m',strtotime($data[0]->allotement_date)).'</p><p class="amount">AED '.$data[0]->amount.'</p><p class="allotment">'.$data[0]->allotement.'/'.$room_booking.'</p><p class="cutoff"><b>Cut Off:</b> '.$data[0]->cut_off.'</p><div></td>';
          } else {
            $output['list'] .= '<td style="background-color:#cecaca"><br><p class="date">'.date('d-m',strtotime($ndate)).'</p></td>';
          } 
        }
        $output['list'] .= '<td><br><a data-toggle="modal" data-target="#myModal" onclick="add_allotment_modal(2);" class="date">Edit</a></td>';
        $output['list'] .= '</tr>';
      }
    }
      $output['list'] .= '</tbody>';
      $output['chdate'] = $chdate;
      $output['altchdate'] = date('d/m/Y',strtotime($chdate));
      if ($type="month") {
        $to = 30;
      } else {
        $to = 6;
      }
      $output['todate'] = date('Y-m-d',strtotime($chdate . "+".$to." day"));
    echo json_encode($output);
    exit();
  }
  public function contracthotelsearch() {
    if ($this->session->userdata('supplier_name')=="") {
        redirect("welcome/agent_logout");
    }
    $config['first_link'] = 'First';
    $config['div'] = 'result_search'; //Div tag id
    $config['base_url'] = base_url() . "lists/index";
    $config['total_rows'] = $this->Supplier_Model->get_total_hotels($_REQUEST);
    $config['per_page'] = 20;
    $config['postVar'] = 'page';
    $this->ajax_pagination->initialize($config);
    if (!isset($_REQUEST['page']) || $_REQUEST['page']=="") {
      $page = 0;
    } else {
      $page = $_REQUEST['page'];
    }
    $hotelid="";
    $result["links"] = $this->ajax_pagination->create_links();
    $HotelList = $this->Supplier_Model->hotel_search_list_rooms($config['per_page'],$page);
      $data['list'] ='<ul class="hotels">';
      foreach ($HotelList as $key => $value) {
        $stopsalehotel = '';
        if($value->delflg==0) { 
          $stopsalehotel = " <span style='color:red;top: 0.8em;left: -16px;'>".'【Stop sale】'."</span>"; 
        }
        if($key==0) {
          $hotelid = $value->id;
          $data['list'].= '<li><a class="active" id="'.$value->id.'" onclick="loadcontracts('.$value->id.')">'.$value->hotel_name.$stopsalehotel.'</a></li>';
        } else {
          $data['list'].= '<li><a id="'.$value->id.'" onclick="loadcontracts('.$value->id.')">'.$value->hotel_name.$stopsalehotel.'</a></li>';
        }
      }
      $data['list'].= '</ul>
                        <br>
                        <div class="row pull-right" style="margin-top: 10px;"><div class="hpadding20">
                      <ul class="pagination right ">
                      '.$result["links"].'
                      </ul>
                      </div></div>';
      $contractlist = $this->Supplier_Model->contractList($hotelid);
      $data['list2'] ='';
      foreach ($contractlist as $key => $value) {
        $stopsale = '';
        if($value->contract_flg=='0') { 
          $stopsale = " <span style='color:red;top: 0.8em;left: -16px;'>".'【Stop sale】'."</span>"; 
        }
        if($key==0) {
          $data['list2'].= '<li><a class="active cm-contract" onclick="loadallotment(\''.$value->contract_id.'\')" id="'.$value->contract_id.'" >'.$value->contract_id.$stopsale.'</a></li>';
        } else {
          $data['list2'].= '<li><a class="cm-contract" onclick="loadallotment(\''.$value->contract_id.'\')" id="'.$value->contract_id.'">'.$value->contract_id.$stopsale.'</a></li>';
        }
      }
      $data['list2'].= '<br>';
    echo json_encode($data);
  }
  public function closeoutupdate() {
    $result = $this->Supplier_Model->closeOutSingleUpdate($_REQUEST['ndate'],$_REQUEST['hotelid'],$_REQUEST['contractid'],$_REQUEST['roomid'],$_REQUEST['closedout']);
    $Return['status'] = '1';
    
    echo json_encode($Return);
  }
  public function updatecontractStatus() {
    $this->Supplier_Model->updatecontractStatus($_REQUEST['contractid'],$_REQUEST['value']);
    echo json_encode(true);
  }
  public function contractlistmodal($hotelid)
  {
     if ($this->session->userdata('supplier_name')=="") {
      redirect("welcome/agent_logout");
    }
    $data['hotelid'] = $hotelid;
    $data['title'] = "Contracts";
    $data['contractlist']= $this->Supplier_Model->allcontractlist($hotelid);
    $this->load->view('contractlistmodal',$data); 
  }
  public function updatehotelStatus() {
    $this->Supplier_Model->updatehotelStatus($_REQUEST['hotelid'],$_REQUEST['value']);
    echo json_encode(true);
  }
  public function cancellationlist($contractid) {
    if ($this->session->userdata('supplier_name')=="") {
        redirect("welcome/agent_logout");
    }
    $data = array();
    // Datatables Variables
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $list = $this->Supplier_Model->cancellationlist($contractid);
    foreach($list->result() as $key => $r) {
         $delete = '<a  href="#" onclick="deletepolicyfun('.$r->id.');" data-toggle="modal" data-target="#delModal" class="sb2-2-1-edit delete"><i class="red accent-4 fa fa-trash-o" aria-hidden="true"></i> Delete</a>';   
         $edit='<a title="click to Edit" href="#" onclick="editpolicy('.$r->id.');" data-toggle="modal" data-target="#myModal" class="sb2-2-1-edit"><i style="color: #0074b9;" class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>';
              $data[] = array(
                   $r->fromDate,
                   $r->toDate,
                   $r->daysFrom,
                   $r->cancellationPercentage,
                   $r->application,
                   $edit."<br>".$delete,
              );
    }
    $output = array(
         "draw"             => $draw,
          "recordsTotal"    => $list->num_rows(),
          "recordsFiltered" => $list->num_rows(),
          "data"            => $data
    );
    echo json_encode($output);
  }
  public function delete_policy() {
    if ($this->session->userdata('supplier_name')=="") {
      redirect("welcome/agent_logout");
    }
    $result = $this->Supplier_Model->delete_policy($_REQUEST['delete_id']);
    if ($result==true) {
      $Return['status'] = '1';
      $description = 'Cancellation policy deleted [id:'.$_REQUEST['delete_id'].']';
      AgentlogActivity($description);
    } else {
      $Return['status'] = '0';
    }
    echo json_encode($Return);
  }
  public function editpolicymodal() {
    if ($this->session->userdata('supplier_name')=="") {
        redirect("welcome/agent_logout");
    }
    $data['title'] = "Edit Cancellation Policy";
    $data['room_types'] = $this->Supplier_Model->getRooms($_REQUEST['hotelid']);
    $data['view'] =$this->Supplier_Model->policy_detail_get($_REQUEST['policyid']);
    $this->load->view('editpolicymodal',$data);
  }
  public function update_policy(){
    $view = $this->Supplier_Model->update_policy($_REQUEST);
    if ($view==true) {
      $Return['status'] = '1';
       $description = 'Cancellation Policy Updated [id: '.$_REQUEST['policyid'].']';
       AgentlogActivity($description);
    } else {
      $Return['status'] = '0';
    }
    echo json_encode($Return);
  }
}