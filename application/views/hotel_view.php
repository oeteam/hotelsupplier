<?php init_front_head_supplier(); ?>
<!-- <script src="<?php echo base_url(); ?>assets/js/locationpicker.jquery.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>skin/assets/js/jquery-ui.js"></script>   -->
<link rel="stylesheet" href="<?php echo base_url(); ?>skin/plugins/jslider/css/jslider.css" type="text/css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>skin/plugins/jslider/css/jslider.round-blue.css" type="text/css">
<style type="text/css">
  .modal-backdrop {
    z-index: 500;
  }
  .modal {
    z-index: 501;
  }
    #sales_password + .fa {
        cursor: pointer;
        pointer-events: all;
    }
     #revenue_password + .fa {
        cursor: pointer;
        pointer-events: all;
    }
     #contract_password + .fa {
        cursor: pointer;
        pointer-events: all;
    }
     #finance_password + .fa {
        cursor: pointer;
        pointer-events: all;
    }
    .multi-select-trans .select-wrapper input.select-dropdown, .dropdown-content.select-dropdown.multiple-select-dropdown{
        display: none !important;
    }

    .multi-select-trans .multiselect.dropdown-toggle.btn.btn-default {
        border-color: transparent !important;
        transform: translateY(-8px) !important;
        padding: 0 !important;
        overflow: hidden !important;
    }
    .multi-select-trans .form-control {
        padding: 6px 0 !important;
    }
    .multi-select-trans1 .form-control {
        padding: 0px 0 !important;
    }
    .multi-select-mod button {
        background-color: transparent;
        color: #ccc;
        box-shadow: none;
        border: 1px solid #ccc;
        height: 34px;
        font-size: 14px;
        font-weight: normal;
        text-transform: capitalize;
        padding: 0 1rem;
    }

    .multi-select-mod button:hover {
        background-color: transparent;
        box-shadow: none;
        color: #ccc;
        border: 1px solid #ccc;
    }

    .multi-select-mod .dropdown-menu {
        left: 0;
        top: 34px;
    }

    .multi-select-mod label {
        color: black;
    }
    .multi-select-mod li.active a, .multi-select-mod li.active a:hover {
        background-color: #f1f1f1;
    }

    .multi-select-mod li.active a label {
        color: #000;
    }
    .multi-select-mod [type="checkbox"]:not(:checked), [type="checkbox"]:checked {
        left: auto !important;
        opacity: 1 !important;
    }

    .multi-select-mod .btn-group, .multi-select-mod button, .multi-select-mod .dropdown-menu {
        width: 100%;
    }
    .multi-select-trans .multiselect.dropdown-toggle.btn.btn-default {
        border: 1px solid #cccccc ! important;
        margin-top: 9px;
    }
    .caret {
        display: none;
    } 
    .select {
        -webkit-appearance:none
    }  .multiselect {
        width:20em;
        height:15em;
        border:solid 1px #c0c0c0;
        overflow:auto;
    }
     
    .multiselect label {
        display:block;
    }
     
    .multiselect-on {
        color:#ffffff;
        background-color:#000099;
    }
    .custom-select-option{
        font-size: 10px;
    }

    .custom-dd-style {
        transform: translateY(10px);
        position: absolute;
        background: #fff;
        box-shadow: 0 2px 1px 0 #ccc;
        padding: 10px;
        z-index: 1;
        display: none;
    }
    .tab-content {
      background-color: white;
    }
    .tab-list li {
        width: 20%;
        text-align: center;
    }
    .js--image-preview {
      height: 213px;
      width: 100%;
      position: relative;
      overflow: hidden;
      background-image: url("");
      background-color: white;
      background-position: center center;
      background-repeat: no-repeat;
      background-size: cover;
    } 
    .box img {
      height:100%;
      width:100%;
    }
    .box {
      display: inline-block;
      height: 259px;
      width: 259px;
      margin: 10px;
      background-color: white;
      border-radius: 5px;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
      -webkit-transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
      transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
      overflow: hidden;
    }
    .upload-options {
      position: relative;
      height: 40px;
      cursor: pointer;
      overflow: hidden;
      text-align: center;
      -webkit-transition: background-color ease-in-out 150ms;
      transition: background-color ease-in-out 150ms;
    }
    .upload-options label p i {
      font-size: 22px;
      color: #f7f7f7;
    }
    .upload-options input {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }
    .nav-tabs > li {
        background: black;
    }
</style>
<div class="container"><br><br>
    <input type="hidden" id="currencyPic" value="<?php echo $this->session->userdata('currency') ?>">
    <input type="hidden" id="providers" value="<?php echo isset($_REQUEST['providers']) ? $_REQUEST['providers'] : 'otelseasy' ?>">
    <div class="container pagecontainer offset-0">  
            <!-- SLIDER -->
            <div class="col-md-8 details-slider">
                <div id="c-carousel">
                    <div id="wrapper">
                    <div id="inner">
                        <div id="caroufredsel_wrapper2">
                            <div id="carousel">
                                <?php 
                                    for ($q=1; $q <= 5; $q++) { 
                                        $image = 'Image'.$q;
                                     ?>
                                    
                                    <img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $view[0]->id; ?>/<?php echo $view[0]->$image; ?>" alt=""/>
                                <?php } ?>                  
                            </div>
                        </div>
                        <div id="pager-wrapper">
                            <div id="pager">
                                <?php for ($q=1; $q <= 5; $q++) { 
                                        $image = 'Image'.$q;
                                 ?>
                                    <img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $view[0]->id; ?>/<?php echo $view[0]->$image; ?>" width="120" height="68" alt=""/>
                                <?php } ?>                      
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <button id="prev_btn2" class="prev2"><img src="<?php echo base_url(); ?>skin/images/spacer.png" alt=""/></button>
                    <button id="next_btn2" class="next2"><img src="<?php echo base_url(); ?>skin/images/spacer.png" alt=""/></button>       
                        
                    </div>
                </div> <!-- /c-carousel -->
            </div>
            <!-- END OF SLIDER -->          
            <!-- RIGHT INFO -->
            <div class="col-md-4 detailsright offset-0">
                <div class="padding20">
                    <h4 class="lh1"><?php echo $view[0]->hotel_name ?></h4>
                    <img src="<?php echo base_url(); ?>skin/images/smallrating-<?php echo $view[0]->rating ?>.png" alt=""/>
                </div>
                
                <div class="line3"></div>
                
                <div class="hpadding20">
                    <h2 class="opensans slim green2">Wonderful!</h2>
                </div>
                
                <div class="line3 margtop20"></div>
                
                <div class="col-md-6 bordertype1 padding20">
                    <div id="guest_recomend_percentage"></div>
                </div>
                <div class="col-md-6 bordertype2 padding20">
                    <div id="review_guest_rating"></div>
                </div>
                <div class="col-md-6 bordertype3">
                    <div id="review_rating_count"></div>
                </div>
                <div class="col-md-6 bordertype3">
                    <a onclick="add_review();trigerJslider(); trigerJslider2(); trigerJslider3(); trigerJslider4(); trigerJslider5(); trigerJslider6();" data-toggle="tab" href="#reviews" class="grey">+Add review</a>
                </div>
                <div class="clearfix"></div><br/>
                
             
            </div>
            <!-- END OF RIGHT INFO -->
    </div>
    <div class="container mt25 offset-0">
            <div class="col-md-12 pagecontainer2 offset-0">
                <div class="cstyle10"></div>
        
                <ul class="nav nav-tabs" id="myTab">
                    <li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#summary"><span class="summary"></span><span class="hidetext">Summary</span>&nbsp;</a></li>
                    <li onclick="mySelectUpdate()" class="active"><a data-toggle="tab" href="#roomrates"><span class="rates"></span><span class="hidetext">Room rates</span>&nbsp;</a></li>
                    <li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#preferences"><span class="preferences"></span><span class="hidetext">Preferences</span>&nbsp;</a></li>
                    <li onclick="loadScript()" class=""><a data-toggle="tab" href="#maps"><span class="maps"></span><span class="hidetext">Maps</span>&nbsp;</a></li>
                    <li class="reviews_li" onclick="mySelectUpdate(); trigerJslider(); trigerJslider2(); trigerJslider3(); trigerJslider4(); trigerJslider5(); trigerJslider6();" class=""><a data-toggle="tab" href="#reviews"><span class="reviews"></span><span class="hidetext">Reviews</span>&nbsp;</a></li>
                    <!-- <li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#thingstodo"><span class="thingstodo"></span><span class="hidetext">Things to do</span>&nbsp;</a></li> -->

                </ul>           
                <div class="tab-content4" >
                    <!-- TAB 1 -->              
                    <div id="summary" class="tab-pane fade ">
                        <p class="hpadding20">
                            <?php echo $view[0]->hotel_description ?> 
                        </p>
                        <div class="line4"></div>
                        
                        <!-- Collapse 1 --> 
                        <button type="button" class="collapsebtn2" data-toggle="collapse" data-target="#collapse1">
                          <?php echo $view[0]->city ?> <span class="collapsearrow"></span>
                        </button>
                        
                        <div id="collapse1" class="collapse in">
                            <div class="hpadding20">
                                <?php echo $view[0]->city_description ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- End of collapse 1 -->  
                        
                        <div class="line4"></div>                       
                        
                        <!-- Collapse 2 --> 
                        <button type="button" class="collapsebtn2" data-toggle="collapse" data-target="#collapse2">
                          Near by places <span class="collapsearrow"></span>
                        </button>
                        
                        <div id="collapse2" class="collapse in">
                            <div class="hpadding20">
                                <?php echo $view[0]->city_near_by ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- End of collapse 2 -->  
                        
                        <div class="line4"></div>                       
                        
                        <!-- Collapse 3 --> 
                        <button type="button" class="collapsebtn2 collapsed" data-toggle="collapse" data-target="#collapse3">
                          Complimentary Wi-Fi <span class="collapsearrow"></span>
                        </button>
                        
                        <div id="collapse3" class="collapse">
                            <div class="hpadding20">
                                <?php echo $view[0]->wifi=='on' ? 'Yes' : 'No' ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- End of collapse 3 -->  
                        
                        <div class="line4"></div>                           
                        
                        <!-- Collapse 4 --> 
                        <button type="button" class="collapsebtn2 collapsed" data-toggle="collapse" data-target="#collapse4">
                          Internet <span class="collapsearrow"></span>
                        </button>
                        
                        <div id="collapse4" class="collapse">
                            <div class="hpadding20">
                                <?php echo $view[0]->internet=='on' ? 'Yes' : 'No' ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- End of collapse 4 -->      

                        <div class="line4"></div>                               

                        <!-- Collapse 5 --> 
                        <button type="button" class="collapsebtn2 collapsed" data-toggle="collapse" data-target="#collapse5">
                          Parking <span class="collapsearrow"></span>
                        </button>
                        
                        <div id="collapse5" class="collapse">
                            <div class="hpadding20">
                                <?php echo $view[0]->parking=='on' ? 'Yes' : 'No' ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- End of collapse 5 -->              

                        <div class="line4"></div>                               

                        <!-- Collapse 6 --> 
                        <!-- <button type="button" class="collapsebtn2" data-toggle="collapse" data-target="#collapse6">
                          Room Amenities <span class="collapsearrow"></span>
                        </button>
                        
                        <div id="collapse6" class="collapse in">
                            <?php $room_aminities =  explode("close", $view[0]->room_aminities); ?>
                            <div class="hpadding20">
                                <div class="col-md-12">
                                    <ul class="checklist">
                                        <?php foreach ($room_aminities as $key => $value) { 
                                            if ($value!="") {
                                            ?>
                                            <li><?php echo $value; ?></li>
                                        <?php }
                                        } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div> -->
                        <!-- End of collapse 6 -->                              
                    </div>
                    <!-- TAB 2 -->
                    <div id="roomrates" class="tab-pane fade active in">
                       <!--  <form id="hotel_booking_form_id" name="hotel_booking_form_id" method="get" action="<?php echo base_url();?>payment">
                            <input type="hidden" name="RequestType" id="RequestType">
                        <div class="hpadding20">
                            <p class="dark">Your travel rates</p>
                            <div class="row">
                                <div class="col-sm-2">
                                        <input type="hidden" name="location" value="<?php echo isset($_REQUEST['location']) ? $_REQUEST['location'] : '' ?>">
                                        <input type="hidden" name="hotel_id" id="hotel_id" value="<?php echo $_REQUEST['search_id'] ?>">
                                        <input type="hidden" name="countryname" id="countryname" value="<?php echo isset($_REQUEST['countryname']) ? $_REQUEST['countryname'] : '' ?>">
                                        <input type="hidden" name="hotel_name" id="hotel_name" value="<?php echo isset($_REQUEST['hotel_name']) ? $_REQUEST['hotel_name'] : '' ?>">
                                        <input type="hidden" name="cityname" id="cityname" value="<?php echo isset($_REQUEST['cityname']) ? $_REQUEST['cityname'] : '' ?>">
                                        <input type="hidden" name="citycode" id="citycode" value="<?php echo isset($_REQUEST['citycode']) ? $_REQUEST['citycode'] : '' ?>">
                                        <input type="hidden" name="contract_id" id="contract_id" value="">
                                        <input type="hidden" name="max_child_age" id="max_child_age" value="">
                                    <div class=" textleft">
                                        <label class="control-label">Check in</label>
                                        <input type="text" style="opacity: 0;height: 34px" class="mySelectCalendar" id="datepicker1" placeholder="mm/dd/yyyy" name="Check_in" value="<?php echo isset($_REQUEST['Check_in']) ? $_REQUEST['Check_in'] : '' ?>" />
                                    </div>
                                    <div class="input-group" style="transform: translateY(-36px);">
                                          <input type="text" name=""  class="form-control" id="alternate" value="<?php echo isset($_REQUEST['Check_in']) ? date('d/m/Y' ,strtotime($_REQUEST['Check_in'])) : '' ?>">
                                          <label for="datepicker1" class="datepickerLabel input-group-addon"><i class="fa fa-calendar"></i></label>
                                    </div>
                                    <input type="hidden" name="mark_up" value="<?php echo $_REQUEST['mark_up'] ?>">
                                    <input type="hidden" name="room_id" id="room_id">
                                    <?php if($_REQUEST['nationality']!="") { ?>
                                        <input type="hidden" id="Nationality" name="nationality" value="<?php echo $_REQUEST['nationality']; ?>">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2">
                                    <label class="control-label">Check out</label>
                                    <input type="text" style="opacity: 0;height: 34px" class=" mySelectCalendar" id="datepicker2" placeholder="mm/dd/yyyy" name="Check_out" value="<?php echo isset($_REQUEST['Check_out']) ? $_REQUEST['Check_out'] : '' ?>" />
                                    <div class="input-group"  style="transform: translateY(-36px);">
                                          <input type="text" name="" class="form-control" id="alternate2" value="<?php echo isset($_REQUEST['Check_out']) ? date('d/m/Y' ,strtotime($_REQUEST['Check_out'])) : '' ?>">
                                          <label for="datepicker2" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                                    </div>
                                </div>
                                <?php if($_REQUEST['nationality']=="") { ?>
                                <div class="col-sm-2">
                                    <label class="nat_err control-label">Nationality</label>
                                    <select class="form-control" id="Nationality" name="nationality" onchange="available_check();">
                                        <option value="">--select--</option>
                                        <?php foreach ($nationality as $key => $value) { ?>
                                            <option  value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <?php } ?>
                                <div class="col-sm-6">
                                    <input type="hidden" name="no_of_rooms" id="no_of_rooms" value="<?php echo count($adults) ?>">
                                    <div class="row">
                                    <div class="col-md-6 offset-0">
                                        <div class="room1" >
                                            <div class="w50percent">
                                                <div class="wh90percent textleft">
                                                    <span class="opensans size13"><b>ROOM 1</b></span><br/> -->
                                                    
                                                    <!-- <div class="addroom1 block"><a onclick="addroom2()" class="grey cpointer">+ Add room</a></div> -->
                                              <!--   </div>
                                            </div>
                                            <div class="w50percentlast">    
                                                <div class="wh90percent textleft right ohidden">
                                                    <div class="w50percent">
                                                        <div class="wh90percent textleft left">
                                                            <span class="opensans size13">Adult </span>
                                                            <select class="form-control mySelectBoxClass" name="adults[]" id="room1-adults" onchange="available_check();">
                                                                <?php for ($i=1; $i <=30 ; $i++) { 
                                                                    if ($adults[0]==$i) {?>
                                                                    <option  selected="" value="<?php echo $i?>"><?php echo $i?></option>
                                                                <?php } else { ?>
                                                                    <option value="<?php echo $i?>"><?php echo $i?></option>

                                                                <?php   }
                                                                } ?>
                                                            </select>
                                                        </div>
                                                    </div>                          
                                                    <div class="w50percentlast">
                                                        <div class="wh90percent textleft right ohidden">
                                                        <span class="opensans size13">Child</span>
                                                            <select name="Child[]" class="form-control mySelectBoxClass room1-child">
                                                              <?php for ($i=0; $i <5 ; $i++) { 
                                                                    if ($child[0]==$i) {?>
                                                                    <option  selected="" value="<?php echo $i?>"><?php echo $i?></option>
                                                                <?php } else { ?>
                                                                    <option value="<?php echo $i?>"><?php echo $i?></option>

                                                                <?php   }
                                                                } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                    <?php
                                        if (isset($_REQUEST['Room1ChildAge'])) {
                                            $Room1ChildAges = explode(",", $_REQUEST['Room1ChildAge']);
                                        }
                                    ?>
                                    <div class="row col-md-12">
                                        <div class="addroom1 <?php echo isset($child[1]) ? 'none' : 'block' ?>"><a onclick="addroomcustom2('2'); available_check();" class="grey cpointer">+ Add room</a></div>
                                    </div>
                                </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="row room1-childAge <?php echo isset($Room1ChildAges[0]) && $Room1ChildAges[0]!="" ? '' : 'hide' ?>" style="transform: translateX(-8px);margin: 0 -8px;">
                                    <p class="room1-child-p" style="padding-left: 15px;margin-bottom: 0px;">Children Age</p>
                                    <?php for ($l=1; $l <= 4 ; $l++) {  ?>
                                        <div class="col-xs-3 room1-child<?php echo $l; ?> <?php echo isset($Room1ChildAges[$l-1]) && $Room1ChildAges[$l-1]!="" ? '' : 'hide' ?>" style="padding-right: 0;">
                                            <select name="room1-childAge[]" class="child-age-option form-control mySelectBoxClass room1-childAges<?php echo $l; ?>" <?php echo isset($Room1ChildAges[$l-1]) && $Room1ChildAges[$l-1]!="" ? '' : 'disabled' ?>  id="room1-childAge<?php echo $l; ?>"  onchange="MaxChildAgeCheck('room1-childAges<?php echo $l; ?>'); available_check();">
                                                <?php for ($i=0; $i <18 ; $i++) { 
                                                    if (isset($Room1ChildAges[$l-1]) && $Room1ChildAges[$l-1]==$i) { ?>
                                                      <option selected="" value="<?php echo $i ?>"><?php echo $i ?></option>
                                                <?php } else { ?>
                                                      <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                <?php }  } ?>
                                            </select>
                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>
                                </div>
                            <?php for ($i=2; $i <=10 ; $i++) { ?>
                                <div class="row room<?php echo $i; ?> <?php echo isset($adults[$i-1]) ? 'block' : 'none' ?>">
                                    <div class="col-md-6 offset-0">
                                        <div class="room<?php echo $i; ?> <?php echo isset($adults[$i-1]) ? 'block' : 'none' ?>">
                                            <div class="clearfix"></div>
                                            <div class="line1"></div>
                                            <div class="w50percent">
                                                <div class="wh90percent textleft">
                                                    <span class="opensans size13"><b>ROOM <?php echo $i; ?></b></span><br/>
                                                </div>
                                            </div>
                                            <div class="w50percentlast">    
                                                <div class="wh90percent textleft right">
                                                    <div class="w50percent">
                                                        <div class="wh90percent textleft left">
                                                            <span class="opensans size13">Adult</span>
                                                            <select name="adults[]" class="form-control mySelectBoxClass" id="room<?php echo $i ?>-adults" <?php echo isset($adults[$i-1]) ? '' : 'disabled' ?> onchange="available_check();">
                                                                <?php for ($q=1; $q <= 30 ; $q++) { 
                                                                    if (isset($adults[$i-1]) && $adults[$i-1]==$q) { ?>
                                                                    <option selected="" value="<?php echo $q ?>"><?php echo $q ?></option>
                                                                <?php } else { ?>
                                                                    <option value="<?php echo $q ?>"><?php echo $q ?></option>
                                                                <?php } } ?>
                                                            </select>
                                                        </div>
                                                    </div>                          
                                                    <div class="w50percentlast">
                                                        <div class="wh90percent textleft right">
                                                        <span class="opensans size13">Child</span>
                                                            <select name="Child[]" onchange="available_check();" class="form-control mySelectBoxClass room<?php echo $i ?>-child" <?php echo isset($child[$i-1]) ? '' : 'disabled' ?>>
                                                                <?php for ($q=0; $q <= 4 ; $q++) { 
                                                                    if (isset($child[$i-1]) && $child[$i-1]==$q) { ?>
                                                                    <option selected="" value="<?php echo $q ?>"><?php echo $q ?></option>
                                                                <?php } else { ?>
                                                                    <option value="<?php echo $q ?>"><?php echo $q ?></option>
                                                                <?php } } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="row col-md-12">
                                                <?php if ($i!=10) { ?>
                                                <div class="addroom<?php echo $i; ?> <?php echo isset($adults[$i]) ? 'none' : 'block' ?> grey"><a onclick="addroomcustom<?php echo $i+1; ?>(<?php echo $i+1; ?>); available_check();" class="grey cpointer">+ Add room</a> | <a onclick="removeroomcustom<?php echo $i; ?>(<?php echo $i; ?>);  available_check();" class="orange cpointer"><img src="<?php echo base_url(); ?>skin/images/delete.png" alt="delete"/></a></div>
                                                <?php } else { ?>
                                                <a onclick="removeroomcustom<?php echo $i; ?>(<?php echo $i; ?>); available_check();" class="orange cpointer"><img src="<?php echo base_url(); ?>skin/images/delete.png" alt="delete"/></a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <?php   
                                        if (isset($_REQUEST['Room'.$i.'ChildAge'])) {

                                            $childAges[$i] = explode(",", $_REQUEST['Room'.$i.'ChildAge']);
                                        }
                                     ?>
                                        
                                        <div class="row room<?php echo $i; ?>-childAge <?php echo isset( $_REQUEST['Room'.$i.'ChildAge']) ? '' : 'hide' ?>" style="transform: translateX(-8px);margin: 0 -8px;">
                                            <div class="clearfix "></div>
                                        <div class="line1 "></div>
                                            <p class="room<?php echo $i; ?>-child-p" style="padding-left: 15px;margin-bottom: 0px">Children's Age</p>
                                        <?php for ($k=1; $k <=4 ; $k++) { ?>
                                            <div class="col-xs-3 room<?php echo $i; ?>-child<?php echo $k; ?>  <?php echo isset($childAges[$i][$k-1]) ? '' : 'hide' ?>" style="padding-right: 0;">

                                            <select name="room<?php echo $i; ?>-childAge[]" class="child-age-option form-control mySelectBoxClass room<?php echo $i; ?>-childAges<?php echo $k ?>" id="room<?php echo $i; ?>-childAge"  <?php echo isset($childAges[$i][$k-1]) && $childAges[$i][$k-1]!="" ? '' : 'disabled' ?> onchange="MaxChildAgeCheck('room<?php echo $i; ?>-childAges<?php echo $k ?>'); available_check();">
                                                <?php for ($j=0; $j <18 ; $j++) {
                                                    if (isset($childAges[$i][$k-1]) && $childAges[$i][$k-1]==$j) { ?>
                                                      <option selected="" value="<?php echo $j ?>"><?php echo $j ?></option>
                                                <?php } else { ?>
                                                      <option value="<?php echo $j ?>"><?php echo $j ?></option>
                                                <?php } } ?>
                                            </select>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                                </div>
                                    
                                <?php } ?>
                                    </div>
                                
                            </div>
                            

                        <div class="clearfix"></div>
                        </div>
                        <div class="dateCheckLoad">
                            <div class="line2"></div>
                            <div class="spin-wrapper" style="/* display: none; */text-align: center;">
                                <img src="<?php echo base_url(); ?>/assets/images/ellipsis-spinner.gif" alt="" style="width: 100px;">
                            </div>
                            <div class="line2"></div>
                        </div>
                        <div class="dateCheckLoadAfter">
                        <h4 class="hpadding20 dark contractCheckDiv">Room type</h4>
                        <div id="modal" name = "modal" class="modal fade-scale" role="dialog">
                        </div>
                        <div class="line2"></div>
                        <!-- <div class="board-list-div col-md-12 contractCheckDiv"></div> -->
                        <!-- <div class="roomListsortClass"></div> -->
                        <!-- <div class="hides contractCheckDiv">
                        <?php 
                            if ($contractList==false) {  ?>
                            
                        <?php  
                         } else {
                            $price = array();
                                foreach ($contractList['contract_id'] as $key3 => $value3) {    ?>
                                <input type="hidden" class="contract_ajax_id" name="contract_ajax_id[]" value="<?php echo $value3 ?>">
                            <?php   }
                                foreach ($view['rooms'] as $key => $value) { ?>
                                <input type="hidden" name="room_ajax_id[]" id="room_ajax_id" value="<?php echo $value->id ?>">
                                <div class="RateCheckdiv<?php echo $value->id  ?>">
                                    <div class="padding20">
                                        <div class="col-md-4 offset-0">
                                            <?php if ($value->images!="") { ?>
                                                <a href="#"><img src="<?php echo base_url(); ?>uploads/rooms/<?php echo $value->id ?>/<?php echo $value->images; ?>" alt="" class="fwimg"/></a>
                                            <?php  } else { ?>
                                                <a href="#"><img src="<?php echo base_url(); ?>skin/images/items2/item1.jpg" alt="" class="fwimg"/></a>
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-8 offset-0">
                                            <div class="col-md-12 mediafix1">
                                                <h4 class="opensans text-transform dark bold margtop1"><?php echo $value->room_name." ".$value->room_type_name ?></h4>
                                                <p>Max Occupancy: <?php echo $value->occupancy ?> adults, <?php if ($value->occupancy_child!=0 && $value->occupancy_child!="") {
                                                 echo $value->occupancy_child==1 ? $value->occupancy_child.' child' : $value->occupancy_child.' childrens'; } ?></p>
                                            </div>
                                            <div class="col-md-12 mediafix1 pad_left_0">
                                                <div class="clearfix"></div>
                                                <div class="roomRateCheckdiv">
                                                    <?php foreach ($contractList['contract_id'] as $key3 => $value3) { ?>
                                                    <div class="col-md-3">
                                                    <input type="hidden" name="room_count" class="room_count_val<?php echo $value->id ?>"  value="<?php echo $value->total_rooms ?>">
                                                        
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                              
                                </div>

                                <div class="clearfix clearfixdiv<?php echo $value->id ?>"></div>
                                <div class="line2 linediv<?php echo $value->id ?>"></div>

                            <?php } 
                        // }
                        } ?>
                        </div>
                        <div class="contractCheckSuccessDiv hide text-center col-md-12">
                            <p>Rooms not available for these days!</p>
                        </div>
                        <div class="line2 contractCheckSuccessDiv hide"></div>
                        </div>
                      <input type="hidden" id="token" name="token" value="<?php echo date('YmdHis'); ?>">
                        </form> --> 
                    </div>
                    <!-- TAB 3 -->                  
                    <div id="preferences" class="tab-pane fade">
                        <p class="hpadding20">
                            <?php echo $view[0]->hotel_description ?>
                        </p>
                        
                        <div class="line4"></div>
                        
                        <!-- Collapse 7 --> 
                        <button type="button" class="collapsebtn2" data-toggle="collapse" data-target="#collapse7">
                          Hotel facilities <span class="collapsearrow"></span>
                        </button>
                        
                        <!-- <div id="collapse7" class="collapse in">
                            <div class="hpadding20">
                                <div class="col-md-12 offset-0">
                                    <ul class="hotelpreferences2 left">
                                        <?php if (count($hotel_facilities[0])!=0) {
                                         foreach ($hotel_facilities as $key => $value) {
                                            ?>
                                            <span><img src="<?php echo $value[0]->icon_src ?>"> <?php echo $value[0]->Hotel_Facility ?></span>
                                        <?php } } ?>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            
                        </div> -->

                        <div id="collapse7" class="collapse in">
                            <div class="hpadding20">
                                <div class="col-md-12">
                                    <ul class="checklist">
                                        <?php if (count($hotel_facilities[0])!=0) {
                                            foreach ($hotel_facilities as $key1 => $value3) {
                                            ?>
                                            <li><?php echo $value3[0]->Hotel_Facility; ?></li>
                                        <?php } } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- End of collapse 7 -->      
                        <br/>
                        <div class="line4"></div>                           
                        
                        <!-- Collapse 8 --> 
                        <button type="button" class="collapsebtn2" data-toggle="collapse" data-target="#collapse8">
                          Room facilities / Amenities <span class="collapsearrow"></span>
                        </button>
                        
                        <div id="collapse8" class="collapse in">
                            <div class="hpadding20">
                                <div class="col-md-12">
                                    <ul class="checklist">
                                        <?php if (count($room_facilities[0])!=0) {
                                            foreach ($room_facilities as $key1 => $value3) {
                                            ?>
                                            <li><?php echo $value3[0]->Room_Facility; ?></li>
                                        <?php } } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- End of collapse 8 -->              
                    </div>
                    
                    <!-- TAB 4 -->                  
                    <div id="maps" class="tab-pane fade">
                        <div class="hpadding20">
                            <div id="map-canvas"></div>
                        </div>
                    </div>
                    
                    <!-- TAB 5 -->                  
                    <div id="reviews" class="tab-pane fade ">
                        <div class="hpadding20">
                            <div id="review_rating"></div>      
                            <div class="clearfix"></div>
                            <br/>
                            <span class="opensans dark size16 bold">Average ratings</span>
                        </div>
                        
                        <div class="line4"></div>
                        
                        <div class="hpadding20">
                            <div id="average_rating">
                                
                            </div>  
                            <div class="clearfix"></div>
                            <br/>
                            <span class="opensans dark size16 bold">Reviews</span>
                        </div>
                        
                        <div class="line2"></div>
                        <div id="review_data_id">
                            
                        </div>
                        <br/>
                        <br/>
                        <div class="hpadding20">
                            <span class="opensans dark size16 bold">Reviews</span> <br>
                                <i class="success_error err_hide"></i>
                        </div>
                        
                        <div class="line2"></div>

                        <div class="wh33percent left center">
                            <ul class="jslidetext">
                                <li>Cleanliness</li>
                                <li>Room comfort</li>
                                <li>Location</li>
                                <li>Service & staff</li>
                                <li>Sleep quality</li>
                                <li>Value for Price</li>
                            </ul>
                            
                            <ul class="jslidetext2">
                                <li>Name</li>
                                <li>Evaluation</li>
                                <li>Title</li>
                                <li>Comment</li>
                            </ul>
                        </div>
                        <div class="wh66percent right offset-0">
                            <form name="review_form" method="post" action="<?php echo base_url('details/review_insert'); ?>" id="review_form">
                                <input type="hidden" name="hotel_id" id="hotel_id" value="<?php echo $view[0]->id ?>">
                            <script>
                                //This is a fix for when the slider is used in a hidden div
                                function testTriger(){
                                    setTimeout(function (){
                                        $(".cstyle01").resize();
                                    }, 500);    
                                }
                            </script>
                            <div class="padding20 relative wh70percent">
                                <div class="layout-slider wh100percent">
                                <span class="cstyle01"><input id="Slider1" type="slider" name="cleanliness" value="0;4.2" /></span>
                                </div>
                                <script type="text/javascript" >
                                function trigerJslider(){
                                  jQuery("#Slider1").slider({ from: 0, to: 5, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
                                  testTriger();
                                  }
                                </script>
                                <div class="layout-slider margtop10 wh100percent">
                                <span class="cstyle01"><input id="Slider2" type="slider" name="room_comfort" value="0;5.0" /></span>
                                </div>
                                <script type="text/javascript" >
                                function trigerJslider2(){
                                  jQuery("#Slider2").slider({ from: 0, to: 5, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
                                  }
                                </script>
                                
                                <div class="layout-slider margtop10 wh100percent">
                                <span class="cstyle01"><input id="Slider3" type="slider" name="location" value="0;2.5" /></span>
                                </div>
                                <script type="text/javascript" >
                                function trigerJslider3(){
                                  jQuery("#Slider3").slider({ from: 0, to: 5, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
                                  }
                                </script>

                                <div class="layout-slider margtop10 wh100percent">
                                <span class="cstyle01"><input id="Slider4" type="slider" name="service_staff" value="0;3.8" /></span>
                                </div>
                                <script type="text/javascript" >
                                function trigerJslider4(){
                                  jQuery("#Slider4").slider({ from: 0, to: 5, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
                                  }
                                </script>
                                
                                <div class="layout-slider margtop10 wh100percent">
                                <span class="cstyle01"><input id="Slider5" type="slider" name="sleep_quality" value="0;4.4" /></span>
                                </div>
                                <script type="text/javascript" >
                                function trigerJslider5(){
                                  jQuery("#Slider5").slider({ from: 0, to: 5, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
                                  }
                                </script>
                                
                                <div class="layout-slider margtop10 wh100percent">
                                <span class="cstyle01"><input id="Slider6" type="slider" name="value_price" value="0;4.0" /></span>
                                </div>
                                <script type="text/javascript" >
                                function trigerJslider6(){
                                  jQuery("#Slider6").slider({ from: 0, to: 5, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
                                  }
                                </script>
                                
                                <input type="text" id="review_uname" class="form-control margtop10 " placeholder="" name="review_uname">
                                <i class="name_error err_hide"></i>

                                <select class="form-control mySelectBoxClass margtop10" name="evaluation" id="evaluation">
                                  <option selected>Wonderful!</option>
                                  <option>Nice</option>
                                  <option>Neutral</option>
                                  <option>Don't recommend</option>
                                </select>
                                <input type="text" class="form-control margtop10" placeholder="" name="title" id="title">
                                <i class="title_error err_hide"></i>
                                <textarea class="form-control margtop10" rows="3" name="comment" id="comment"></textarea>
                                <i class="comment_error err_hide"></i>
                                <div class="clearfix"></div>
                                <button type="button" class="btn-search4 margtop20" id="details_review_add_button" name="details_review_add_button">Submit</button> 

                            
                                <br/>
                                <br/>
                                <br/>

                                <!-- <input type="hidden" name="hotel_id" id="hotel_id"> -->
                                <input type="hidden" name="roomIndex" id="roomIndex">
                                <input type="hidden" name="roomName" id="roomName">
                            </form>
                            </div>                          
                        </div>

                        <div class="clearfix"></div>
                    </div>     
                </div> <br><br> <br><br> 
            </div>
    </div>
    <?php init_front_head_footer(); ?> 
    <script type="text/javascript">
        $(document).ready(function() {
            var hotel_id = $("#hotel_id").val();
            review_get_data(hotel_id);
            average_ratings(hotel_id);
            function review_get_data(id) {
               $.ajax({
                  type: 'post',
                  url: base_url+'hotelsupplier/review_view?hotel_id='+id,
                  dataType: 'json',
                  cache: false,
                  data: $('#review_form').serialize(),
                  success: function (response) {
                    // alert(response);
                    $("#review_data_id").html(response);
                  },
                   error: function (xhr,status,error) {
                     alert("Error: " + error);
                  }
                 });
            }
            function average_ratings(id) {
               $.ajax({
                  type: 'post',
                  url: base_url+'hotelsupplier/average_ratings?hotel_id='+id,
                  dataType: 'json',
                  cache: false,
                  data: $('#review_form').serialize(),
                  success: function (response) {
                    $("#average_rating").html(response.review_count);
                    $("#review_rating").html(response.review_rating);
                    $("#review_rating_count").html(response.review_rating_count);
                    $("#review_guest_rating").html(response.review_guest_rating);
                    $("#guest_recomend_percentage").html(response.guest_recomend_percentage);
                  },
                   error: function (xhr,status,error) {
                     alert("Error: " + error);
                  }
                 });
            }
        });
        function add_review() {
                $("#myTab li").removeClass("active");
                $("#myTab .reviews_li").addClass("active");
                $("#review_uname").focus();
                window.scrollTo(0, document.body.scrollHeight);
        }
        $('#details_review_add_button').click(function (e) {
          e.preventDefault();
              $.ajax({
              dataType: 'json',
              type: 'post',
              url: base_url+'hotelsupplier/review_insert',
              data: $('#review_form').serialize(),
              cache: false,
              success: function (response) {
                if (response.status != "1") {
                  if (response.error == "Name field is required !") {
                    $(".name_error").css("color","red");
                    $(".name_error").text(response.error);
                  } else if (response.error == "Title field is required !") {
                    $(".title_error").css("color","red");
                    $(".title_error").text(response.error);
                  } else if (response.error == "Comment field is required !") {
                    $(".comment_error").css("color","red");
                    $(".comment_error").text(response.error);
                  }
                } else {
                    $(".success_error").css("color","green");
                    $(".success_error").text(response.error);
                    $(".name_error").text('');
                    $(".title_error").text('');
                    $(".comment_error").text('');
                    average_ratings(hotel_id);
                    review_get_data(hotel_id);
                    review_clear();
                  // addToast(response.error,response.color);
                }
              },
               error: function (xhr,status,error) {
                 alert("Error: " + error);
              }
             });
        });
    </script>
    <script src="<?php echo base_url(); ?>skin/assets/js/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>skin/plugins/jslider/js/jshashtable-2.1_src.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>skin/plugins/jslider/js/jquery.numberformatter-1.2.3.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>skin/plugins/jslider/js/tmpl.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>skin/plugins/jslider/js/jquery.dependClass-0.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>skin/plugins/jslider/js/draggable-0.1.js"></script>
     <script type="text/javascript" src="<?php echo base_url(); ?>skin/plugins/jslider/js/jquery.slider.js"></script>