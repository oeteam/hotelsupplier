 <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
  <!-- Select2 JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/prettify.css" />
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
        <form method="post" id="add_contract" name="add_contract" enctype="multipart/form-data"> 
        <input type="hidden" name="id" id="id" value="<?php echo $hotelid ?>" >
        <input type="hidden" name="contracts_edit_id" id="contracts_edit_id" value="<?php echo isset($_REQUEST['contracts_edit_id']) ? $view[0]->id : '' ?>" >
        <?php 
            $contract_type = array('Main'=>'Main','Sub'=>'Sub');
            $board = array('RO'=>'RO','BB'=>'BB','HB'=>'HB','FB'=>'FB','AI'=>'AI');
            ?>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="board">Board</label>
                <select name="board" id="board" class="form-control">
                    <?php foreach ($board as $key => $value) { 
                        if(isset($_REQUEST['contracts_edit_id']) && $view[0]->board==$value  ) { ?>
                        <option selected="" value="<?php echo $value ?>"><?php echo $value ?></option>
                    <?php } else { ?>
                        <option value="<?php echo $value ?>"><?php echo $value ?></option>
                    <?php } } ?>
                </select>
            </div> 

            <div class="form-group col-md-4">
                <label for="datepicker">From date</label>
                <input type="text" class="datePicker-hide datepicker input-group-addon" id="date_picker" name="date_picker" placeholder="dd/mm/yyyy" value="<?php echo isset($view[0]->from_date) ?  $view[0]->from_date : date('Y-m-d') ?>" />
                <div class="input-group">
                    <input class="form-control datepicker date-pic" id="alternate1" name="" value="<?php echo isset($view[0]->from_date) ?  date('d/m/Y',strtotime($view[0]->from_date)) : date('d/m/Y') ?>">
                    <label for="alternate1" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="datepicker">To date</label>
                <input type="text" class="datePicker-hide datepicker input-group-addon" id="date_picker1" name="date_picker1" placeholder="dd/mm/yyyy" value="<?php echo isset($view[0]->to_date) ? $view[0]->to_date : date('Y-m-d',strtotime('+1 month')) ?>" />
                <div class="input-group">
                    <input class="form-control datepicker date-pic" id="alternate2" name="" value="<?php echo isset($view[0]->to_date) ? date('d/m/Y',strtotime($view[0]->to_date)) : date('d/m/Y',strtotime('+1 month')) ?>">
                    <label for="alternate2" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                </div>
            </div>
          </div>
        <div class="row">
           
            <div class="form-group col-md-4">
                <label for="max_age">Contract Status</label><br>
                <?php if(isset($_REQUEST['contracts_edit_id'])&&($_REQUEST['contracts_edit_id']!="")) { ?>
                <input name="roomstatus" type="radio" class="with-gap" id="nochange" value=""/>
                <label for="nochange" class="status">No Change</label>
                <?php } ?>
                <input name="roomstatus" type="radio" class="with-gap" id="open" <?php echo isset($view[0]->contract_flg) && $view[0]->contract_flg=='0' ?  'checked' : 'checked' ?>   value="0" />
                <label for="open" class="status">Open</label>
                <input name="roomstatus" type="radio" class="with-gap" id="close" <?php echo isset($view[0]->contract_flg) && $view[0]->contract_flg=='1' ?  'checked' : 'checked' ?> value="1" />
                <label for="close" class="status">Close</label>
            </div>
            <div class="form-group col-md-4">
                <label for="bookingCode">Booking Code</label>
                <input  type="text" name="bookingCode"  class="form-control" id="bookingCode"  value="<?php echo isset($view[0]->BookingCode) ?  $view[0]->BookingCode : '' ?>">
            </div>
            <div class="form-group col-md-4">        
                <span>Active Markets</span>
                <?php
                $tempmarket = array();
                if (isset($view[0]->market) && $view[0]->market!="") {
                    $tempmarket = explode(",", $view[0]->market);
                }
                ?>
                <input type="hidden" id="market_check" value="<?php echo isset($view[0]->market) ? $view[0]->market : '' ?>">
                <div class="multi-select-mod">
                <select name="market[]" id="market" class="form-control"  multiple="" onchange="selectCountry();">
                    <?php foreach ($market as $key => $value) {
                        if (!isset($_REQUEST['contracts_edit_id'])) {
                            $selected = 'selected';
                        } else if (isset($_REQUEST['contracts_edit_id']) && in_array($value->continent,$tempmarket)!='') {
                            $selected = 'selected';
                        } else {
                            $selected = '';
                        }
                     ?>
                        <option <?php echo  $selected ?>  value="<?php echo $value->continent ?>"><?php echo $value->continent ?></option>
                    <?php } ?>
                </select>     
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4>Nationality Permission</h4>
                <br>
            </div>
            <div class="row">
                <input type="hidden" id="permission_check" value="<?php echo isset($view[0]->nationalityPermission) ? $view[0]->nationalityPermission : '' ?>">
                <div class="col-md-12">
                    <div class="col-xs-5">
                        <span>Active Nationality</span>
                        <select name="nationality_from[]" id="undo_redo" style="width:100%" size="13" multiple="multiple">
                            <?php foreach ($nationality as $key => $value) { ?>
                                <option value="<?php echo $value->id ?>" continent="<?php echo $value->continent!="" ? $value->continent : 'other' ?>"><?php echo $value->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="col-xs-2">
                        <button type="button" id="undo_redo_undo" class="mt-6 no-border btn-sm btn-primary btn-block">Undo</button>
                        <button type="button" id="undo_redo_rightAll" class="no-border btn-sm btn-default btn-block"><i class="fa fa-forward"></i></button>
                        <button type="button" id="undo_redo_rightSelected" class="no-border btn-sm btn-default btn-block"><i class="fa fa-chevron-right"></i></button>
                        <button type="button" id="undo_redo_leftSelected" class="no-border btn-sm btn-default btn-block"><i class="fa fa-chevron-left"></i></button>
                        <button type="button" id="undo_redo_leftAll" class="no-border btn-sm btn-default btn-block"><i class="fa fa-backward"></i></button>
                        <button type="button" id="undo_redo_redo" class="no-border btn-sm btn-primary btn-block">Redo</button>
                    </div>
                    
                    <div class="col-xs-5">
                        <span>Inactive Nationality</span>
                        <form id="country_permission_form" method="post">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>"> 
                        <select name="nationality_to[]" id="undo_redo_to" style="width:100%" size="13" multiple="multiple">
                            
                        </select>
                         
                          <input type="hidden" name="context" id="context"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </form>
      </div>
       <div class="modal-footer">
        <?php if(isset($_REQUEST['contracts_edit_id']) && $_REQUEST['contracts_edit_id']!="") { ?>
          <button type="button" class="btn-sm btn-success" name="contract_update" id="contract_update">Update</button> <button class="yourmodalid hide"  data-toggle="modal" data-target="#yourmodalid">modal</button><br>
           <button class="yourmodalid hide"  data-toggle="modal" data-target="#yourmodalid">modal</button><br>
        <?php } else { ?>
            <button type="button" class="btn-sm btn-success" name="contract_submit" id="contract_submit">Submit</button> <button class="yourmodalid hide"  data-toggle="modal" data-target="#yourmodalid">modal</button><br>
           <button class="yourmodalid hide"  data-toggle="modal" data-target="#yourmodalid">modal</button><br>
        <?php } ?>
    
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
<script src="<?php echo base_url(); ?>assets/js/bootstrap-multiselect.js"></script>
<script type="text/javascript">
    $(document).ready(function()  {
        $('#market').multiselect({
                includeSelectAllOption: true,
                selectAllValue: 0
        });
    });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/prettify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/multiselect.min.js"></script>
<script type="text/javascript">
  window.prettyPrint && prettyPrint();
    $('#undo_redo').multiselect({
        search: {
            left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
            right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
        },
        fireSearch: function(value) {
            return value.length = 1;
        }
    });
   function cancellationfun() {
    var cancel = $("#cancellation").val();
    if(cancel == "refundable") {
      $(".deadline").removeClass('hide');
    } else {
      $(".deadline").addClass('hide');
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
   var nextDay = new Date($("#date_picker1").val());
    nextDay.setDate(nextDay.getDate() + 1);
    $("#date_picker").datepicker({
        altField: "#alternate1",
        dateFormat: "yy-mm-dd",
        altFormat: "dd/mm/yy",
        minDate: new Date(<?php date('d/m/Y') ?>),
        changeYear : true,
        changeMonth : true,
        onSelect: function(dateText) {
        var nextDay = new Date(dateText);
          nextDay.setDate(nextDay.getDate() + 1);
        $("#date_picker1").datepicker('option', 'minDate', nextDay);
      }
    });

    $("#date_picker1").datepicker({
        altField: "#alternate2",
        dateFormat: "yy-mm-dd",
        altFormat: "dd/mm/yy",
        minDate: new Date(<?php date('d/m/Y', strtotime('+ 1 day')) ?>),
        changeYear : true,
        changeMonth : true,
    });
    $("#alternate1").click(function() {
        $( "#date_picker" ).trigger('focus');
    });
    $("#alternate2").click(function() {
        $( "#date_picker1" ).trigger('focus');
    });
    $('#bulk-alt-days').multiselect({
          allSelectedText: 'All',
          includeSelectAllOption: true,
          selectAllValue: 0
    });
  });
  $("#contractmarkup").change(function() {
        if($(this). prop("checked") == true){
          $("#markup").prop('disabled', true);
        } else {
         $('#markup').prop("disabled", false);
       }
    })

  function nationatilitycheck() {
      <?php if (isset($view[0]->nationalityPermission) && $view[0]->nationalityPermission!="") { ?>
      var permission_check = $("#permission_check").val().split(",");
      $.each(permission_check, function(i, v) {
       $('#undo_redo option[value='+v+']').attr('selected','selected');
      });
      <?php } ?>

      <?php if (isset($view[0]->nationalityPermission)  && $view[0]->nationalityPermission!="") { ?>
      $("#undo_redo_rightSelected").trigger('click');
      $('#undo_redo_to').prop('selectedIndex', 0).focus(); 
      <?php } ?>
  }

  function selectCountry() {
        $.each($("#market option:selected"), function(){ 
            $('#undo_redo_to option[continent="'+$(this).val()+'"]').prop('selected',true); 
            $("#undo_redo_leftSelected").trigger('click'); 
        });

        $.each($("#market option:not(:selected)"), function(){   
            $('#undo_redo option[continent="'+$(this).val()+'"]').prop('selected',true); 
            $("#undo_redo_rightSelected").trigger('click'); 
        });
    }
    <?php if (isset($_REQUEST['contracts_edit_id']) && $view[0]->market!='') { ?>
        selectCountry();
    <?php } ?>
    nationatilitycheck();
  </script>
  <script src="<?php echo base_url(); ?>skin/js/supplier.js"></script>

