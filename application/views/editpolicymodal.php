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
        <form method="post" id="edit_policy" name="edit_policy" enctype="multipart/form-data"> 
        <input type="hidden" name="policyid" id="policyid" value="<?php echo isset($view[0]->id)?  $view[0]->id :"" ?>" >
        <div class="row">
            <div class="form-group col-md-4">
                <label for="room">Room</label>
                  <?php  if (isset($view[0]->roomType)) {
                        $room_type = explode(",", $view[0]->roomType);
                    } else {
                        $room_type = array();
                    }
                  ?>
                   <div class="multi-select-mod multi-select-trans">
                      <select id="room" name="room[]"  multiple="" class="form-control">
                        <?php 
                        $i=0;
                        foreach ($room_types as $key => $value) { 
                            if ($room_type[$i]==$value->id) {
                            $i++; ?>
                            <option selected="" value="<?php echo $value->id ?>"> <?php echo $value->room_name; ?></option>
                        <?php } else { ?>
                            <option value="<?php echo $value->id ?>">  <?php echo $value->room_name; ?></option>
                        <?php } }  ?>
                      </select>
                    </div>
            </div>
            <div class="col-sm-4">
              <label for="" class="control-label">From date</label>
                  <div class="">
                      <input type="text" class="datePicker-hide datepicker input-group-addon" id="bulk-alt-fromDate"  name="fromDate" placeholder="dd/mm/yyyy" value="<?php echo isset($view[0]->fromDate) ?  $view[0]->fromDate : date('Y-m-d') ?>" >
                      <div class="input-group">
                        <input class="form-control datepicker date-pic" id="alternate1" name="" value="<?php echo isset($view[0]->fromDate) ?  date('d/m/Y',strtotime($view[0]->fromDate)) : date('d/m/Y') ?>" >
                        <label for="alternate1" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                      </div>
                  </div>
            </div>
            <div class="col-sm-4">
              <label for="" class="control-label">To date</label>
              <div class="">
                  <input type="text"  class="datePicker-hide datepicker input-group-addon" id="bulk-alt-toDate"  name="toDate" placeholder="dd/mm/yyyy" value="<?php echo isset($view[0]->toDate) ? $view[0]->toDate : date('Y-m-d',strtotime('+1 month')) ?>">
                  <div class="input-group">
                      <input class="form-control datepicker date-pic" id="alternate2" name="" value="<?php echo isset($view[0]->toDAte) ? date('d/m/Y',strtotime($view[0]->toDate)) : date('d/m/Y',strtotime('+1 month')) ?>" >
                      <label for="alternate2" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                  </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-4">
                <label for="cancel_before">Days From</label><br>
                <input  type="number" id="cancel_before" name="cancel_before"  class="form-control" value="<?php echo isset($view[0]->daysFrom) ? $view[0]->daysFrom : '' ?>">
            </div>
             <div class="form-group col-md-4">
                <label for="application">Application</label><br>
                <select class="form-control" name="application" id="application">
                  <option value="">Select</option>
                  <option value="FULL STAY" <?php echo isset($view[0]->application) && $view[0]->application=="FULL STAY" ? "Selected" : "" ?>>FULL STAY</option>
                  <option <?php echo isset($view[0]->application) && $view[0]->application=="FIRST NIGHT" ? "Selected" : "" ?> value="FIRST NIGHT">FIRST NIGHT</option>
                  <option <?php echo isset($view[0]->application) && $view[0]->application=="FREE OF CHARGE" ? "Selected" : "" ?> value="FREE OF CHARGE">FREE OF CHARGE</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="percentage">Cancellation Percentage</label><br>
                <input  type="number" id="percentage" name="percentage"  class="form-control" id="percentage" value="<?php echo isset($view[0]->cancellationPercentage) ? $view[0]->cancellationPercentage : '' ?>"> 
            </div>
          </div>
        </form>
      </div>
       <div class="modal-footer">
          <button type="button" class="btn-sm btn-success" name="policy_update" id="policy_update">Update</button> <button class="yourmodalid hide"  data-toggle="modal" data-target="#yourmodalid">modal</button><br>


           <button class="yourmodalid hide"  data-toggle="modal" data-target="#yourmodalid">modal</button><br>
    
      </div>
    </div>
</span>
<script type="text/javascript">
  $(document).ready(function() {
   var nextDay = new Date($("#bulk-alt-toDate").val());
    nextDay.setDate(nextDay.getDate() + 1);
    $("#bulk-alt-fromDate").datepicker({
        altField: "#alternate1",
        dateFormat: "yy-mm-dd",
        altFormat: "dd/mm/yy",
        minDate: new Date(<?php date('d/m/Y') ?>),
        changeYear : true,
        changeMonth : true,
        onSelect: function(dateText) {
        var nextDay = new Date(dateText);
          nextDay.setDate(nextDay.getDate() + 1);
        $("#bulk-alt-toDate").datepicker('option', 'minDate', nextDay);
      }
    });

    $("#bulk-alt-toDate").datepicker({
        altField: "#alternate2",
        dateFormat: "yy-mm-dd",
        altFormat: "dd/mm/yy",
        minDate: new Date(<?php date('d/m/Y', strtotime('+ 1 day')) ?>),
        changeYear : true,
        changeMonth : true,
    });
    $("#alternate1").click(function() {
        $( "#bulk-alt-fromDate" ).trigger('focus');
    });
    $("#alternate2").click(function() {
        $( "#bulk-alt-toDate" ).trigger('focus');
    });
    $('#room').multiselect({
          allSelectedText: 'All',
          includeSelectAllOption: true,
          selectAllValue: 0
    });
  });
  </script>
  <script src="<?php echo base_url(); ?>skin/js/supplier.js"></script>

