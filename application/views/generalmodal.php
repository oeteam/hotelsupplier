 <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
  <!-- Select2 JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
    <style type="text/css">
      .ui-datepicker {
        z-index: 9999999 ! important;
      }
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
    .datePicker-hide {
      width: 0px !important;
      opacity: 0;
      position: absolute;
      z-index: -99999;
    }
    .dropdown-menu {
       max-width: 100% ! important;
       height: 250px;
       overflow: scroll;
    }
   .status {
      font-size: 12px;
    }
    .pad-0 {
      padding: 0px;
    }
    .close {
      opacity: 10;
    }

</style>
<div class="modal-dialog" style="overflow-y:auto;height: 100%;width: 55%;">
  <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><span class="list-img"><?php echo $title; ?></h4>
      </div>
      <div class="modal-body">
        <form method="post" id="add_generalsupplement" name="add_generalsupplement" enctype="multipart/form-data"> 
        <input type="hidden" name="contract_id" id="contract_id" value="<?php echo $contractid ?>" >
        <input type="hidden" name="hotel_id" id="hotel_id" value="<?php echo $hotel_id ?>" >
        <input type="hidden" name="id" id="id" value="<?php echo isset($id) ? $id : '' ?>" >
        <?php 
            $contract_type = array('Main'=>'Main','Sub'=>'Sub');
            $board = array('Breakfast'=>'Breakfast','Lunch'=>'Lunch','Dinner'=>'Dinner');
            ?>
        <div class="row">
          <div class="form-group col-md-4">
            <label for="age_from">Type :</label><span>*</span>
            <input type="text" name="type" id="type" class="form-control" value="<?php echo isset($id) ? $view[0]->type : '' ?>">
            <p class="text-danger er-msg hide type-err">required</p>
          </div>
          <div class="form-group col-md-4">
              <label for="room_type">Room Type :</label><span>*</span>
              <?php  if (isset($id)) {
                      $room_type = explode(",", $view[0]->roomType);
                  } else {
                      $room_type = array();
                  }
              ?>
              <div class="multi-select-mod">
                  <select class="form-control" multiple="" name="room_type[]" id="room_type">
                      <?php 
                      $i=0;
                      foreach ($room_types as $key => $value) { 
                          if ($room_type[$i]==$value->id) {
                          $i++; ?>
                          <option selected="" value="<?php echo $value->id ?>"><?php echo $value->Room_Type; ?>  <?php echo $value->room_name; ?></option>
                      <?php } else { ?>
                          <option value="<?php echo $value->id ?>"><?php echo $value->Room_Type ?>  <?php echo $value->room_name; ?></option>
                      <?php } }  ?>
                  </select>
              </div>
              <p class="text-danger er-msg hide room_type-err">required</p>
          </div>
          <div class="form-group col-md-4">
              <label>From Date</label>
              <input type="text"  class="datePicker-hide datepicker" id="fromDate" name="fromDate" readonly="" placeholder="dd/mm/yyyy" value="<?php echo isset($id) ? $view[0]->fromDate : '' ?>" >
              <div class="input-group">
                  <input class="datepicker form-control" id="alternate1" readonly="" value="<?php echo isset($id) && $view[0]->season=="Other" ?  date('d/m/Y' ,strtotime($view[0]->fromDate)) : '' ?>" >
                  <label for="alternate1" class="input-group-addon"><i class="fa fa-calendar"></i></label>
              </div>
              <p class="text-danger er-msg hide fromDate-err">required</p>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-4">
              <label>To Date</label>
              <input type="text"  class="datePicker-hide datepicker" id="toDate" name="toDate" readonly="" placeholder="dd/mm/yyyy" value="<?php echo isset($id) ? $view[0]->toDate : '' ?>" >
              <div class="input-group">
                  <input class="datepicker form-control" id="alternate2" readonly="" value="<?php echo isset($id) && $view[0]->season=="Other" ?  date('d/m/Y' ,strtotime($view[0]->toDate)) : '' ?>" >
                  <label for="alternate2" class="input-group-addon"><i class="fa fa-calendar"></i></label>
              </div>
              <p class="text-danger er-msg hide toDate-err">required</p>
          </div>
          <div class="form-group col-md-4">
              <label>Min Child Age</label><span>*</span>
              <input type="number" class="form-control" name="MinChildAge" id="MinChildAge" value="<?php echo isset($id) ? $view[0]->MinChildAge : '' ?>">
              <p class="text-danger er-msg hide MinChildAge-err">required</p>
          </div>

          <div class="form-group col-md-4">
            <label>Adult Amount</label><span>*</span>
            <input type="number" class="form-control" name="adultAmount" id="adultAmount" value="<?php echo isset($id) ? $view[0]->adultAmount : '' ?>">
            <p class="text-danger er-msg hide adultAmount-err">required</p>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-4">
              <label>Child Amount</label><span>*</span>
              <input type="number" class="form-control" name="childAmount" id="childAmount" value="<?php echo isset($id) ? $view[0]->childAmount : '' ?>">
            <p class="text-danger er-msg hide childAmount-err">required</p>
          </div>
          <div class="form-group col-md-4">
                <label>Application</label><span>*</span>
                <select class="form-control" id="application" name="application">
                    <option <?php echo isset($id) && $view[0]->application=="Per Person"  ? 'selected' : '' ?> value="Per Person">Per Person</option>
                    <option <?php echo isset($id) && $view[0]->application=="Per Room"  ? 'selected' : '' ?> value="Per Room">Per Room</option>
                </select>
            <p class="text-danger er-msg hide application-err">required</p>
            </div>
        </div>
        </form>
      </div>
       <div class="modal-footer">
        <?php if(isset($id) && $id!="") { ?>
          <button type="button" class="btn-sm btn-success" name="general_submit" id="general_submit">Update</button>
        <?php } else { ?>
            <button type="button" class="btn-sm btn-success" name="general_submit" id="general_submit">Submit</button> 
        <?php } ?>
    
      </div>
    </div>
</span>
 
<script type="text/javascript">
   $('#room_type').multiselect({
        includeSelectAllOption: true,
        selectAllValue: 0
    });
  $(document).ready(function() {
   var nextDay = new Date($("#date_picker1").val());
    nextDay.setDate(nextDay.getDate() + 1);
    $("#fromDate").datepicker({
        altField: "#alternate1",
        dateFormat: "yy-mm-dd",
        altFormat: "dd/mm/yy",
        minDate: new Date(<?php date('d/m/Y') ?>),
        changeYear : true,
        changeMonth : true,
        onSelect: function(dateText) {
        var nextDay = new Date(dateText);
          nextDay.setDate(nextDay.getDate() + 1);
        $("#toDate").datepicker('option', 'minDate', nextDay);
      }
    });

    $("#toDate").datepicker({
        altField: "#alternate2",
        dateFormat: "yy-mm-dd",
        altFormat: "dd/mm/yy",
        minDate: new Date(<?php date('d/m/Y', strtotime('+ 1 day')) ?>),
        changeYear : true,
        changeMonth : true,
    });
    $("#alternate1").click(function() {
        $( "#fromDate" ).trigger('focus');
    });
    $("#alternate2").click(function() {
        $( "#toDate" ).trigger('focus');
    });


    $("#general_submit").click(function() {
      $(".er-msg").addClass("hide");
      $.ajax({
          dataType: 'json',
          type: "Post",
          url: base_url+'HotelSupplier/generalsupplementsubmit',
          data: $("#add_generalsupplement").serialize(),
          success: function(data) {
            if (data['status']=="failed") {
              $.each(data['msg'], function(i, v) {
                  $('.'+i+'-err').removeClass("hide");
              });
            } else {
              $("#general_submit").prop("disabled",true);
              $(".close").trigger("click");
              AddToast("success","Updated Successfully","!");

              var generalsupplement_table = $('#generalsupplement_table').dataTable({
                "bDestroy": true,
                "ajax": {
                    url : base_url+'HotelSupplier/generalsupplementlist/<?php echo $contractid ?>',
                    type : 'GET'
                },
                 "fnDrawCallback": function(settings){
                    $('[data-toggle="tooltip"]').tooltip();          
                  }
              });
            }
          }
      });

    })

  });

  </script>
  <script src="<?php echo base_url(); ?>skin/js/supplier.js"></script>

