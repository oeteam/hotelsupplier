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
    .datePicker-hide {
      width: 0px !important;
      opacity: 0;
      position: absolute;
      z-index: -99999;
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
        <input type="hidden" name="contract_id" id="contract_id" value="<?php echo isset($_REQUEST['id']) ? $view[0]->contract_id : '' ?>" >
        <?php 
            $contract_type = array('Main'=>'Main','Sub'=>'Sub');
            $board = array('RO'=>'RO','BB'=>'BB','HB'=>'HB','FB'=>'FB','AI'=>'AI');
            ?>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="board">Board</label>
                <select name="board" id="board" class="form-control">
                    <?php foreach ($board as $key => $value) { 
                        if(isset($_REQUEST['id']) && $view[0]->board==$value  ) { ?>
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
                <label for="tax">Tax Pecentage : </label>
                <input id="tax" name="tax" type="number" value="<?php echo isset($view[0]->tax_percentage) ? $view[0]->tax_percentage : '' ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="max_age">Max child age : </label>
                <select name="max_age" id="max_age" class="form-control">
                    <?php for ($i=1; $i <= 18; $i++) { 
                        if ($view[0]->max_child_age==$i) { ?>
                            <option selected="selected" value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php } else { ?>
                            <option  value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php } } ?>
                </select>
            </div>
           <!--  <div class="form-group col-md-4">
                <label for="markup">Markup(%) :</label>
                <input id="markup"  name="markup" type="number" value="<?php echo isset($view[0]->markup) ? $view[0]->markup : '' ?>">
            </div> -->
        <!-- </div>
        <div class="row"> -->
            <div class="form-group col-md-4">
                <label for="contract_type">Contract Type</label>
                <select name="contract_type" id="contract_type" class="form-control" onchange="maincontractCheck();">
                    <?php foreach ($contract_type as $key => $value1) { 
                         if(isset($_REQUEST['id']) && $view[0]->contract_type==$value1  ) { ?>
                        <option selected="" value="<?php echo $value1 ?>"><?php echo $value1 ?></option>
                    <?php } else { ?>
                        <option value="<?php echo $value1 ?>"><?php echo $value1 ?></option>
                    <?php } } ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label>Contract Name</label><span>*</span>
                <input type="text" name="contract_name" id="contract_name" class="form-control" value="<?php echo isset($view[0]->contractName) ? $view[0]->contractName : '' ?>">
            </div>
            <div class="form-group col-md-4">
                <label>Booking Code</label>
                <input type="text" name="BookingCode" id="BookingCode" class="form-control" value="<?php echo isset($view[0]->BookingCode) ? $view[0]->BookingCode : '' ?>">
            </div>
             <div class="form-group col-md-4">
                <label for="contract_type">Contract Agreement</label>
                <select name="contract_agreement" id="contract_agreement" class="form-control">
                    <option value="fit" <?php echo isset($view[0]->contract_agreement)&&$view[0]->contract_agreement == 'fit' ? 'selected' : '' ?>>Fit</option>
                   <option value="offer" <?php echo isset($view[0]->contract_agreement)&&$view[0]->contract_agreement == 'offer' ? 'selected' : '' ?>>Offer</option> 
                    <option value="commissionable" <?php echo isset($view[0]->contract_agreement)&&$view[0]->contract_agreement == 'commissionable' ? 'selected' : '' ?>>Commissionable</option>                
                </select>
            </div>
            <div class="form-group col-md-4 linked_contract">
                <input type="hidden" class="lin_con" value="<?php echo isset($view[0]->linkedContract) ? $view[0]->linkedContract : '' ?>">
                <label>Linked Contract</label><span>*</span>
                <select class="form-control" id="linked_contract" name="linked_contract">
                    <option>--Select Contract--</option>
                </select>
            </div>
            
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <p>
                  <input type="checkbox" class="filled-in non-refundable" name="nonRefundable" <?php echo isset($view[0]->nonRefundable) && $view[0]->nonRefundable==1 ? 'checked' : '' ?> id="non-refundable"  />
                  <label for="non-refundable">Non Refundable</label>
                </p>
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
                    <?php foreach ($market as $key => $value) { ?>
                        <option <?php echo in_array($value->continent,$tempmarket)!='' ? 'selected' : '' ?>  value="<?php echo $value->continent ?>"><?php echo $value->continent ?></option>
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
                        <select name="nationality_from[]" id="undo_redo" class="form-control" size="13" multiple="multiple">
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
                        <select name="nationality_to[]" id="undo_redo_to" class="form-control" size="13" multiple="multiple">
                            <?php foreach ($nationality as $key => $value) { ?>
                                <option value="<?php echo $value->id ?>" continent="<?php echo $value->continent!="" ? $value->continent : 'other' ?>"><?php echo $value->name ?></option>
                            <?php } ?>
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
  $(document).ready(function() {
      $('#room_facilties').multiselect();
  });
  $('#room_facilties').multiselect({
        includeSelectAllOption: true,
        selectAllValue: 0
  });
  </script>
