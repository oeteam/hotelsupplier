 <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
  <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
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
        width: 16.66%;
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
    .modal-header {
        background-color: black;
        color: white;
    }
    .modal-header .close {
        color: white;
    }
    .modal-body {
        padding: 40px;
    }
    .modal-footer {
        padding: 10px;
    }
    .dropdown-menu {
       max-width: 100% ! important;
       height: 250px;
       overflow: scroll;
    }
</style>
<div class="modal-dialog" style="overflow-y:auto;height: 100%;width: 55%;">
  <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><span class="list-img"><?php echo $title; ?></h4>
      </div>
      <div class="modal-body">
        <form method="post" id="allotement_form" enctype="multipart/form-data">
        <input type="hidden" name="hotel_id" id="hotel_id" value="<?php echo $hotelid ?>">
        <input type="hidden" name="room_id" id="room_id" value="<?php echo isset($view[0]->room_id) ?$view[0]->room_id : '' ?>">
        <div class="row">
            <div class="row">
              <div class="form-group col-md-6">
                    <label for="room_image"><span>Room Image</span><span class="right text-primary"><?php echo isset($view[0]->images) ?$view[0]->images : '' ?></span></label>.
                    <input id="room_image" type="file" name="image-file" class="form-control" onchange="return ValidateFileUpload(event);">
                </div>
                <div class="form-group col-md-6">
                    <label for="room_name">Room Name</label>
                    <input id="room_name" type="text" name="room_name" class="form-control" value="<?php echo isset($view[0]->room_name) ? $view[0]->room_name : '' ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="room_type">Select room type</label>
                    <select name="roomtype" id="room_type" class="form-control">
                        <option value="" selected="selected">Room Type</option>
                        <?php foreach ($room_type as $key => $value) { 
                              if (isset($view[0]->Room_Type) && $value->id==$view[0]->Room_Type) { ?>
                                 <option selected="" value="<?php echo $value->id; ?>"><?php echo $value->Room_Type; ?></option>
                            <?php  }  else { ?>
                            <option value="<?php echo $value->id; ?>"><?php echo $value->Room_Type; ?></option>
                        <?php } } ?>
                    </select>
                </div>
                <div class="form-group col-md-6 room_facilties">
                    <label for="room_facilties">Select room facilities</label>

                 <?php   if (isset($view[0]->room_facilities)) {
                            $room_facilities_val = explode(",",$view[0]->room_facilities);
                        } else {
                            $room_facilities_val = array();
                        }
                         $i=0; 
                            $selected_room_fac = "";
                  ?>
              
                            
                  <div class="multi-select-mod">
                      <select class="form-control" multiple="" name="room_facilties[]" id="room_facilties">
                          <?php 
                          $i=0;
                          foreach ($room_facilties as $key => $value) { 
                              if ($room_facilities_val[$i]==$value->id) {
                              $i++; ?>
                              <option selected="" data-icon="<?php echo base_url() ?><?php echo $value->icon_src ?>" value="<?php echo $value->id; ?>"><?php echo $value->Room_Facility; ?></option>

                          <?php } else { ?>
                              <option <?php echo $selected_room_fac; ?> data-icon="<?php echo base_url() ?><?php echo $value->icon_src ?>" value="<?php echo $value->id; ?>"><?php echo $value->Room_Facility; ?></option>
                          <?php } }  ?>
                      </select>
                  </div>
             </div> 

                           
                <div class="form-group col-md-6 room_facilties">
                    <label for="occupancy">Select Max Occupancy adults</label>
                    <select id="occupancy" name="occupancy" class="form-control">
                        <option value="" disabled selected>Adults</option>
                        <?php for ($i=0 ; $i<=9; $i++) { 
                          if (isset($view[0]->occupancy) && $i+1==$view[0]->occupancy) { ?>
                                 <option selected="" value="<?php echo $i+1; ?>"><?php echo $i+1; ?> adult(s)</option>
                            <?php  }  else { ?>
                            <option value="<?php echo $i+1; ?>"><?php echo $i+1; ?> adult(s)</option>
                        <?php } }?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="occupancy_child">Select Max Occupancy childs</label>
                    <select id="occupancy_child" name="occupancy_child" class="form-control">
                        <option value="" disabled selected>Children</option>
                        <?php for ($i=0 ; $i<=4; $i++) { 
                          if (isset($view[0]->occupancy_child) && $i+0==$view[0]->occupancy_child) { ?>
                                 <option selected="" value="<?php echo $i+0; ?>"><?php echo $i+0 ?> child(s)</option>
                            <?php  }  else { ?>
                            <option value="<?php echo $i+0; ?>"><?php echo $i+0; ?> child(s)</option>
                        <?php } } ?>
                    </select>
                </div>
              <!--   <div class="form-group col-md-6">
                    <label for="maxtotal">Maximum Capacity</label>
                    <input type="number" name="max_total" id="max_total" class="form-control" value="<?php echo isset($view[0]->max_total) ? $view[0]->max_total : '' ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="standard capacity">Standard capacity</label>
                    <input type="number" name="standarad" id="standarad" class="form-control" value="<?php echo isset($view[0]->standard_capacity) ? $view[0]->standard_capacity : '' ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="no_of_rooms">No of room's</label>
                    <input type="number" name="no_of_rooms" id="no_of_rooms"  class="form-control" value="<?php echo isset($view[0]->total_rooms) ? $view[0]->total_rooms : '' ?>">
                    <!-- <select id="no_of_rooms" name="no_of_rooms" class="form-control">
                        <option value="" disabled selected>Room's</option>
                        <?php for ($i=0 ; $i<=11; $i++) { 
                          if (isset($view[0]->total_rooms) && $i+1==$view[0]->total_rooms) { ?>
                                 <option selected="" value="<?php echo $i+1; ?>"><?php echo $i+1; ?></option>
                            <?php  }  else { ?>
                            <option value="<?php echo $i+1; ?>"><?php echo $i+1; ?></option>
                        <?php } }?>
                    </select> 
                </div> -->
            </div>
        </div>
      </form>
      </div>
      <div class="modal-footer">
      <div class="form-group col-md-12">
            <input type="button" class="sss pull-right btn-sm btn-success" onclick="room_add_fun();"    value="<?php echo isset($view[0]->room_id) ? 'Update' : 'Add' ?>" > 
            <button class="yourmodalid hide"  data-toggle="modal" data-target="#yourmodalid">modal</button><br>
      </div>
      </div>
  </div>
</span>
<!-- <?php if (isset($view[0]->room_id)) { ?> data-toggle="modal" data-target="#yourmodalid" onclick="update_fun();" <?php }else { ?> onclick="room_allotement_add_fun();" <?php  }?>
 -->
 
<div class="modal fade delete_modal" id="yourmodalid" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Update</h4>
        </div>
        <div class="modal-body">
              <p>Do you want to update?</p>
        </div>
        <div class="modal-footer">
              <div class="form-group col-md-12">
                  <button type="button" class="btn-sm btn-success"  id="update_room" onclick="room_update_fun();"  data-dismiss="modal">Update</button>
              </div>
        </div>
      </div>
    </div>
</div>
  

<script src="<?php echo base_url(); ?>skin/js/supplier.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#room_facilties').multiselect({
          allSelectedText: 'All',
          includeSelectAllOption: true,
          selectAllValue: 0
    });
  });
  </script>
