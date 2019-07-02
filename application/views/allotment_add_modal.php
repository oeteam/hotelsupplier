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
        <form method="post" id="add_allotment" name="add_allotment" enctype="multipart/form-data"> 
        <input type="hidden" name="contractid" id="contractid" value="<?php echo $contractid ?>" >
        <input type="hidden" name="hotelid" id="hotelid" value="<?php echo $hotelid ?>" >
        <div class="row">
            <div class="form-group col-md-4">
                <label for="room">Room</label>
                   <div class="multi-select-mod multi-select-trans">
                      <select id="room" name="room[]"  multiple="" class="form-control">
                        <?php foreach ($rooms as $value) { ?>  
                          <option value="<?php echo $value->id ?>"><?php echo $value->roomName ?></option>
                        <?php } ?>
                      </select>
                    </div>
            </div>
            <div class="col-sm-4">
              <label for="" class="control-label">From date</label>
                  <div class="">
                      <input type="text" class="datePicker-hide datepicker input-group-addon" id="bulk-alt-fromDate"  name="bulk-alt-fromDate" placeholder="dd/mm/yyyy" value="<?php echo isset($view['fromdate']) ?  $view['fromdate'] : date('Y-m-d') ?>" >
                      <div class="input-group">
                        <input class="form-control datepicker date-pic" id="alternate1" name="" value="<?php echo isset($view['fromdate']) ?  date('d/m/Y',strtotime($view['fromdate'])) : date('d/m/Y') ?>" >
                        <label for="alternate1" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                      </div>
                  </div>
            </div>
            <div class="col-sm-4">
              <label for="" class="control-label">To date</label>
              <div class="">
                  <input type="text"  class="datePicker-hide datepicker input-group-addon" id="bulk-alt-toDate"  name="bulk-alt-toDate" placeholder="dd/mm/yyyy" value="<?php echo isset($view['todate']) ? $view['todate'] : date('Y-m-d',strtotime('+1 month')) ?>">
                  <div class="input-group">
                      <input class="form-control datepicker date-pic" id="alternate2" name="" value="<?php echo isset($view['todate']) ? date('d/m/Y',strtotime($view['todate'])) : date('d/m/Y',strtotime('+1 month')) ?>" >
                      <label for="alternate2" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                  </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <label>Weekdays</label><br>
              <input type="checkbox" id="all" checked="" name="all" />
              <label style="font-weight: 100 !important;" for="all">All </label>
              &nbsp 
              <input type="checkbox" class="filled-in week" id="sun" name="bulk-alt-days[]" value="Sun" />
              <label for="sun" style="font-weight: 100 !important;">Sunday</label>
              &nbsp 
              <input type="checkbox" class="filled-in week" id="mon" name="bulk-alt-days[]" value="Mon" />
              <label for="mon" style="font-weight: 100 !important;">Monday</label>
               &nbsp 
              <input type="checkbox" class="filled-in week" id="tue" name="bulk-alt-days[]" value="Tue" />
              <label for="tue" style="font-weight: 100 !important;">Tuesday</label>
              &nbsp
              <input type="checkbox" class="filled-in week" id="wed" name="bulk-alt-days[]" value="Wed" />
              <label for="wed" style="font-weight: 100 !important;">Wednesday</label>
              &nbsp 
              <input type="checkbox" class="filled-in week" id="thu" name="bulk-alt-days[]" value="Thu" />
              <label for="thu" style="font-weight: 100 !important;">Thursday</label>
              &nbsp 
              <input type="checkbox" class="filled-in week" id="fri" name="bulk-alt-days[]" value="Fri" />
              <label for="fri" style="font-weight: 100 !important;">Friday</label>
              &nbsp 
              <input type="checkbox" class="filled-in week" id="sat" name="bulk-alt-days[]" value="Sat" />
              <label for="sat" style="font-weight: 100 !important;">Saturday</label>       
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="form-group col-md-4">
                <label for="allotment">Allotment</label><br>
                <div class="col-md-6 pad-0">
                  <input type="checkbox" id="allotment_change" name="allotment_change" value="no_change" />
                  <label for="allotment_change" style="font-weight: 100 !important;">NoChange</label>
                </div>
                <div class="col-md-6 pad-0">
                  <input  type="number" id="allotment" name="allotment"  class="form-control" id="allotment">
                </div>
            </div>
             <div class="form-group col-md-4">
                <label for="price">Price</label>
                <br>
                <div class="col-md-6 pad-0">
                  <input type="checkbox" id="price_change" name="price_change" value="no_change" />
                  <label for="price_change" style="font-weight: 100 !important;">NoChange</label>
                </div>
                <div class="col-md-6 pad-0">
                  <input  type="number" id="price" name="price"  class="form-control" id="price">
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="cutoff">Cut-off</label><br>
                <div class="col-md-6 pad-0">
                  <input type="checkbox" id="cutoff_change" name="cutoff_change" value="no_change" />
                  <label for="cutoff_change" style="font-weight: 100 !important;">NoChange</label>
                </div>
                <div class="col-md-6 pad-0">
                  <input  type="number" id="cutoff" name="cutoff"  class="form-control" id="cutoff"> 
                </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label>Room status</label><br>
              <div class="col-md-4 pad-0">
                  <input type="radio" name="closedout" id="no_change" checked="" value="NoChange" />
                  <label for="no_change" style="font-weight: 100 !important;">NoChange</label>
              </div>
              <div class="col-md-4 pad-0">
                  <input type="radio" name="closedout" id="Close" value="Close" />
                  <label for="Close" style="font-weight: 100 !important;">Close</label>
              </div>
              <div class="col-md-4 pad-0">
                  <input type="radio" name="closedout" id="Open" value="Open" />
                  <label for="Open" style="font-weight: 100 !important;">Open</label>
              </div>
            </div>
           <?php if(!isset($view)) { ?>
            <div class="form-group col-md-6">
              <label>Cancellation Policy</label><br>
                <select id="policy" name="policy" class="form-control" onchange="cancellationfun();">
                    <option value="">No Change</option>
                    <option value="refundable">Refundable</option>
                    <option value="non-refundable">Non-Refundable</option>
                </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6 cancel_before hide">
              <label>Cancellation Before</label><br>
                  <input type="number"  class="form-control" id="cancel_before"  name="cancel_before">
            </div>
            <div class="form-group col-md-6 deduction hide">
              <label>Overdue Deduction</label><br>
                <select id="deduction" name="deduction" class="form-control">
                    <option value=""></option>
                    <option value="FULL STAY">Charge Full Stay</option>
                    <option value="FIRST NIGHT">Charge First Night</option>
                </select>
            </div>
          <?php } ?>
          </div>
        </form>
      </div>
       <div class="modal-footer">
          <button type="button" class="btn-sm btn-success" name="allotment-submit" id="allotment-submit">Submit</button> <button class="yourmodalid hide"  data-toggle="modal" data-target="#yourmodalid">modal</button><br>
           <button class="yourmodalid hide"  data-toggle="modal" data-target="#yourmodalid">modal</button><br>
    
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
<script type="text/javascript">
   function cancellationfun() {
    var cancel = $("#policy").val();
    if(cancel == "refundable") {
      $(".cancel_before").removeClass('hide');
      $(".deduction").removeClass('hide');
    } else {
      $(".cancel_before").addClass('hide');
      $(".deduction").addClass('hide');
    }   
   }
   function contractmarkupfun() {
    var con = $("input[name='contractmarkup']:checked"). val();
    if(con=="contractrate") {
      $('#markup').removeClass("hide");
    } else {
      $('#markup').addClass("hide");
    }
   }

  $(document).ready(function() {
   $(".week").prop('checked', true);
   $('input[name="all"]'). click(function(){
      if($(this). prop("checked") == true){
        $(".week").prop('checked', true);
      }
      else if($(this). prop("checked") == false){
       $('.week').prop("checked", false);
     }
   });
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

    $("#allotment_change").change(function() {
        if($(this). prop("checked") == true){
          $("#allotment").prop('disabled', true);
        } else {
         $('#allotment').prop("disabled", false);
       }
    })

    $("#price_change").change(function() {
        if($(this). prop("checked") == true){
          $("#price").prop('disabled', true);
        } else {
         $('#price').prop("disabled", false);
       }
    })

    $("#cutoff_change").change(function() {
        if($(this). prop("checked") == true){
          $("#cutoff").prop('disabled', true);
        } else {
         $('#cutoff').prop("disabled", false);
       }
    })
  });
  </script>
  <script src="<?php echo base_url(); ?>skin/js/supplier.js"></script>

