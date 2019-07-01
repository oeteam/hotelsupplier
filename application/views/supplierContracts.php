<?php init_front_head_supplier(); ?>
<script src="<?php echo base_url(); ?>skin/js/booking.js"></script>
<style>
 .nav-tabs li {
  background: black;
 }
.hotel-list li,.contractlist li {
  cursor: pointer;
 }
 .myTab2pos {
  padding : 10px;
 }
 .content5 {
    width: 100%;
    background-color: #e8e8e8;
    font-size: 11px;
    padding-top: 10px;
    padding-bottom: 10px;
}
.form-control {
    font-size: 11px;
    height: 29px;
}
.form-group {
    margin-bottom: 2px;
}
.btn {
  font-size: 11px;
} 
.hotel-list ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  font-size: 12px;
}
.hotel-list li {
  display: inline;
  margin-top: 10px;
}
.hotel-list  li a {
  display: inline-block;
  height: 30px;
  overflow: hidden;
  float: left;
  max-width: 200px;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
  width: auto;
  padding: 15px;
}
.hotel-list .hotels li a.active {
  color: #0583ae;
  font-weight: bolder;
  text-decoration: underline;
}
/*.hotel-list li a:hover:not(.active) {
  background-color: #555;
  color: white;
}*/
.contractlist ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  font-size: 12px;
}
.contractlist li {
  display: inline;
  margin-top: 10px;
  cursor: pointer;
}
.contractlist li a {
  display: inline-block;
  height: 30px;
  overflow: hidden;
  float: left;
  max-width: 200px;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
  width: auto;
  padding: 15px;
}
.contractlist li a.active {
  color: #0074b9;
  text-decoration:underline; 
}
/*.contractlist li a:hover:not(.active) {
  //background-color: #555;
  color: white;
}*/
.contractlist {
    background-color: #e8e8e8;
    min-height: 77px;
}
thead{
    background: #0074b9;
    color: white;
    font-size: 15px;
}
th {
  width: 12.5%;
}
.closeout {
    text-align: right;
    font-weight: bold;
    font-size: 10px;
}
.amount {
    color: orange;
    font-weight: bold;
    text-align: center;
    font-size: 12px;
    line-height: 1px;
}
.allotment {
  text-align: center;
}
.date {
  text-align: center;
  font-weight: bold;
}
.hotel-list .pagination  li a {
  line-height: 0px;
}
.pagination li a.active {
  background: #0074b9;
  color: white;
}
.cutoff {
  text-align: center;
  font-size: smaller;
}
.closeout {
    cursor: pointer;
    border: 1px solid #0074b9;
    height: 18px;
    width: 31px;
    text-align: center;
    line-height: 18px;
    position: absolute;
    top: 0;
    left: auto;
    right: 0;
    margin: 0;
}
.stopsale {
  background: #ff8d0080;
}
.tabs {
  padding: 0px;
}
</style>
<div class="clearfix" style="margin-top: 20px;"></div>
<div class="col-md-10 col-md-offset-1">
<div class="row">
  <div class="col-md-12" style="height: 58px">
     <span class="msg"></span>
     <div class="content5">
          <div class="row">
            <div class="col-md-12" >
                <div class="col-md-2 form-group">
                  <label>Hotelname</label>
                  <select class="form-control" name="HotelSelect" id="HotelSelect">
                    <option value="">Select Hotel</option>
                    <?php foreach ($hotels as $value) { ?>
                      <option value="<?php echo $value->id ?>"><?php echo $value->hotel_name?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-md-2 form-group">
                  <label>Country</label>
                  <select name="con" id="con" class="form-control" onchange ="ConSelect();">
                    <option value=""> Country </option>
                    <?php $count=count($contry);
                    for ($i=0; $i <$count ; $i++) { ?>
                    <option value="<?php echo $contry[$i]->id;?>" sortname="<?php echo  $contry[$i]->sortname; ?>"><?php echo $contry[$i]->name; ?></option>
                    <?php  } ?>
                  </select>
                </div>
                <div class="col-md-2 form-group">
                  <label>State</label>
                  <input type="hidden" id="hiddenSt">
                    <div class="multi-select-mod multi-select-trans multi-select-trans1">
                    <select name="state" id="state"  class="form-control">
                    <option value="">Select</option>
                    </select> 
                  </div>
                </div>
                <div class="col-md-2 form-group">
                  <label>Cityname</label>
                  <input type="text" name="city" class="form-control" id="citys">
                </div>
                <div class="col-md-2 form-group">
                  <label title="Property Name">Prov.</label>
                  <input type="text" name="prov" class="form-control" id="prov">
                </div>
                
                <div class="col-md-2 form-group">
                  <label>Rating</label>
                  <select class="form-control" name="starRate" id="starRate">
                    <option value="">Select</option>
                    <option value="all">All</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                    <option value="10">Apartment</option>
                  </select>
                </div>
                <div class="clearfix"></div>
                <br>
                <div class="col-md-12 form-group">
                  <button class="pull-right btn btn-success ml10" data-toggle="modal" data-target="#myModal" onclick="add_contractmodal();">Add</button> 
                  <button class="pull-right btn btn-success ml10" id="roomhotelSearch">Search</button>
                </div>         
             </div>
          </div>
          <div class="row">
              <div class="col-md-12 hotel-list" id="hotel-list">
                <ul class="hotels">
                <?php if(isset($HotelList) && $HotelList!="") {
                   foreach ($HotelList as $key => $value) {
                    if($key==0) { ?>
                      <li><a class="active" id="<?php echo $value->id ?>" onclick="loadcontracts(<?php echo $value->id ?>)"><?php echo $value->hotel_name ?></a></li>
                    <?php } else { ?>
                      <li><a id="<?php echo $value->id ?>" onclick="loadcontracts(<?php echo $value->id ?>)"><?php echo $value->hotel_name?></a></li>
                    <?php } 
                  }
                }
                ?>
              </ul>
              <br>
               <div class="col-md-12 pull-right"><div class="hpadding20">
                      <ul class="pagination right paddingbtm20">
                      <?php echo $links ?>
                      </ul>
                      </div></div>
          </div>
      </div>
  </div>
</div>
  </div>
    <div class="clearfix"></div><br><br>
      <div class="col-md-12 form-group">
       <button class="btn btn-success" style="margin-left: -15px" data-toggle="modal" data-target="#myModal" onclick="contract_list_modal();">Manage Contracts</button> 
      </div>  
    <div class="col-md-12 contractlist" id="contractlist">
        <?php if(isset($contractlist) && $contractlist!="") {
           foreach ($contractlist as $key => $value) {
            if($key==0) { ?>
              <li><a class="active cm-contract" id="<?php echo $value->contract_id ?>" onclick="loadallotment('<?php echo $value->contract_id ?>')"><?php echo $value->contract_id ?></a></li>
            <?php } else { ?>
              <li><a class="cm-contract" id="<?php echo $value->contract_id ?>" onclick="loadallotment('<?php echo $value->contract_id ?>')"><?php echo $value->contract_id?></a></li>
            <?php } 
          }
        }
        ?>
        <br>
    </div>
    <div class="clearfix"></div><br><br>
    <div class="col-md-12 form-group">
      <button class="btn btn-success" style="margin-left: -15px" data-toggle="modal" data-target="#myModal" onclick="add_allotment_modal(1);">Add Allotment</button> 
    </div>  
  <div class="row" >
    <div class="col-md-12">
      <p class="text-center spin-wrapper"><strong>We are getting the results.Please wait few moments..</strong></p>
    </div>
    <div class="col-md-2 col-md-offset-5">
      <div class="spin-wrapper" style="">
        <img style="width: 100px;" src="<?php echo base_url(); ?>/assets/images/ellipsis-spinner.gif" alt="">
      </div>
    </div>
    <div class="col-md-12 pre-page hide">
      <div class="box-inn-sp">
        <div class="inn-title">
             <h3>Allotment List
             <small class="pull-right">
             <div class="ctrl-page left-gap">
                <!-- <label class="ctrl-label">
                    <select class="in-select" id="selectCalendarType">
                        <option value="week" selected="selected">by week</option>
                        <option value="month">by month</option>
                    </select>
                </label> -->
                <a href="javascript:;" class="btn btn-primary btn-small pull-left" id="btnLastTimeSpan">Pre 7d</a>
                <div style="width: 120px;display: block;float: left;">
                    <input type="text"  class="datePicker-hide datepicker input-group-addon" style="height: 0px" id="txtCurrentDate"  name="txtCurrentDate" placeholder="dd/mm/yyyy" value="<?php echo date('Y-m-d') ?>">
                    <div class="input-group" style="transform: translateY(-14px);">
                        <input class="form-control datepicker date-pic" id="alternate3" name="" value="<?php echo isset($view[0]->to_date) ? date('d/m/Y',strtotime($view[0]->to_date)) : date('d/m/Y') ?>" >
                        <label for="alternate3" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                    </div>
                <!-- <input type="text" id="txtCurrentDate" class="form-control" value="<?php echo date('Y-m-d') ?>"> -->
                </div>
                <a href="javascript:;" class="btn btn-primary btn-small pull-left" id="btnNextTimeSpan">Next 7d</a>
            </div>
            </small></h3>
        </div>
    </div>
    <div class="tab-inn">
      <table class="table table-bordered" id="allotment_table">
      </table>
      <input type="hidden" id="fromdate" value="<?php echo date('Y-m-d') ?>">
      <input type="hidden" id="todate" value="<?php echo date('Y-m-d',strtotime('+7 day')) ?>">
    </div>
  </div>
</div> 
</div>
  <div id="myModal" class="modal fade" role="dialog">
</div>
<div id="delModal" class="delete_modal modal">
        <div class="modal-content modal-content  col-md-6 col-md-offset-3">
          
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          <div class="modal-body">
            <h4>Do you want to send request to delete this !</h4>
            <form action="<?php echo base_url(); ?>welcome/" class="delete_id" id="delete_form">
                <input type="hidden" id="delete_id" name="delete_id" value="<?php echo isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ?>">
                <button type="button" onclick="commonDeleteroom();" class="waves-effect waves-light btn-sm btn-danger pull-right">Delete</button><br><br>
            </form>
          </div>
        </div>
      </div>

  <script type="text/javascript">
    function add_contractmodal() {
      var hotelid = $("#hotel-list li a.active").attr('id');
      $("#myModal").load(base_url+'HotelSupplier/addcontractmodal/'+hotelid);
      $('#myModal').modal({
          backdrop: 'static',
          keyboard: false
      });
    }
    function editcontract(id) {
    var hotelid = $("#hotel-list li a.active").attr('id');
    $("#myModal").load(base_url+'HotelSupplier/addcontractmodal/'+hotelid+'?contracts_edit_id='+id);
      $('#myModal').modal({
          backdrop: 'static',
          keyboard: false
      });
  }
     function divLoading(flag) {
    var spinWrapper = $('.spin-wrapper');
      if (flag === 'start') {
          spinWrapper.show();
      }
      if (flag === 'stop') {
          spinWrapper.fadeOut();
          $(".pre-page").removeClass("hide");
      }
  }

    function add_allotment_modal(value) {
      var contractid = $("#contractlist li a.active").attr('id');
      var hotelid = $("#hotel-list li a.active").attr('id');
      var todate       = $("#todate").val();
      var fromdate     = $("#fromdate").val();
      if(value==1) {
        $("#myModal").load(base_url+'HotelSupplier/add_allotment_modal/'+contractid+'/'+hotelid);
      } else if(value==2) {
        $("#myModal").load(base_url+'HotelSupplier/add_allotment_modal/'+contractid+'/'+hotelid+'?todate='+todate+'&fromdate='+fromdate);
      }
      $('#myModal').modal({
          backdrop: 'static',
          keyboard: false
      });
    }
    function contract_list_modal() {
       var hotelid = $("#hotel-list li a.active").attr('id');
        $("#myModal").load(base_url+'HotelSupplier/contractlistmodal/'+hotelid);
          $('#myModal').modal({
              backdrop: 'static',
              keyboard: false
          });
    }
    // function deleteroomfun(id) {
    //   deletepopupfun(base_url+"hotelsupplier/delete_room",id);
    // }


  $("#roomhotelSearch").click(function() {
        var Con       = $("#con option:selected").val();
        var state       = $("#state option:selected").val();
        var hotelid      = $("#HotelSelect option:selected").val();
        var city = $('#citys').val();
        var prov = $("#prov").val();
        var rating = $("#starRate").val();
        $.ajax({
        dataType: 'json',
        type: 'post',
        url:  base_url+'HotelSupplier/contracthotelsearch?hotel='+hotelid+
            '&con='+Con+'&state='+state+'&city='+city+'&prov='+prov+'&rating='+rating,
        cache: false,
        success: function (response) {
          $("#hotel-list").html(response.list);
          $("#contractlist").html(response.list2);
        }
      });      
  });
  $(document).on('click',"#hotel-list li a",function(){
    $("#hotel-list li a.active").removeClass("active");
    $(this).addClass('active');
   })
  function page_click(page) {
    $("#page").val(page);
    var Con       = $("#con option:selected").val();
    var state       = $("#state option:selected").val();
    var hotelid      = $("#HotelSelect option:selected").val();
    var city = $('#citys').val();
    var prov = $("#prov").val();
    var rating = $("#starRate").val();
    $.ajax({
      dataType: 'json',
      type: 'post',
      url:  base_url+'HotelSupplier/roomhotelsearch?hotel='+hotelid+
          '&con='+Con+'&state='+state+'&city='+city+'&prov='+prov+'&rating='+rating+'&page='+page,
      cache: false,
      success: function (response) {
        $("#hotel-list").find('.hotels').html(response.list);
      }
    });      
  }
  function loadcontracts(id) {
   var hotelid = $("#hotel-list .hotels li a.active").attr('id');
   $.ajax({
      dataType: 'json',
      type: 'post',
      url:  base_url+'HotelSupplier/hotel_contract_list/'+hotelid,
      cache: false,
      success: function (response) {
        $("#contractlist").html(response.list);
      }
    });    
    $("#contractlist").find('a').first('.active').trigger("click");
  }
  function loadallotment(id) {
     divLoading("start");
     var todate       = $("#todate").val();
     var fromdate     = $("#fromdate").val();
     $(".cm-contract").removeClass("active");
     $("#"+id).addClass("active");
     var hotelid = $("#hotel-list li a.active").attr('id');
     $.ajax({
      dataType: 'json',
      type: 'post',
      url:  base_url+'HotelSupplier/allotment_list?value=&todate='+todate+'&fromdate='+fromdate+'&hotelid='+hotelid+'&contractid='+id,
      cache: false,
      success: function (response) {
        $("#allotment_table").html(response.list);
        divLoading("stop");
      }
    });     
   }
   $(document).ready(function() {
    $("#contractlist").find('a').first('.active').trigger("click");
    $("#txtCurrentDate").datepicker({
        altField: "#alternate3",
        dateFormat: "yy-mm-dd",
        altFormat: "dd/mm/yy",
        minDate: new Date(<?php date('d/m/Y') ?>),
        changeYear : true,
        changeMonth : true,
        onSelect: function(dateText) {
          $('#fromdate').val($( "#txtCurrentDate" ).val());
          allotmentPager();
      }
    });
    $("#alternate3").click(function() {
        $( "#txtCurrentDate" ).trigger('focus');
    });
   })

   $("#btnLastTimeSpan").click(function() {
        $(".pre-page").addClass("hide");
        divLoading("start");
        var todate       = $("#todate").val();
        var fromdate     = $("#fromdate").val();
        var hotelid = $("#hotel-list li a.active").attr('id');
        var contractid = $("#contractlist li a.active").attr('id');
        $.ajax({
        dataType: 'json',
        type: 'post',
        url:  base_url+'HotelSupplier/allotment_list?value=prev&todate='+todate+'&fromdate='+fromdate+'&hotelid='+hotelid+'&contractid='+contractid,
        cache: false,
        success: function (response) {
          $("#allotment_table").html(response.list);
          $('#txtCurrentDate').val(response.chdate);
          $('#fromdate').val(response.chdate);
          $('#todate').val(response.todate);
          divLoading("stop");
        }
      });      
  });
  $("#btnNextTimeSpan").click(function() {
        $(".pre-page").addClass("hide");
        divLoading("start");
        var todate       = $("#todate").val();
        var fromdate     = $("#fromdate").val();
        var hotelid = $("#hotel-list li a.active").attr('id');
        var contractid = $("#contractlist li a.active").attr('id');
        $.ajax({
        dataType: 'json',
        type: 'post',
        url:  base_url+'HotelSupplier/allotment_list?value=next&todate='+todate+'&fromdate='+fromdate+'&hotelid='+hotelid+'&contractid='+contractid,
        cache: false,
        success: function (response) {
          $("#allotment_table").html(response.list);
          $('#txtCurrentDate').val(response.chdate);
          $('#fromdate').val(response.chdate);
          $('#todate').val(response.todate);
          divLoading("stop");
        }
      });      
  });
  function allotmentPager() {
    $(".pre-page").addClass("hide");
        divLoading("start");
        var todate       = $("#txtCurrentDate").val();
        var fromdate     = $("#fromdate").val();
        var hotelid = $("#hotel-list li a.active").attr('id');
        var contractid = $("#contractlist li a.active").attr('id');
        $.ajax({
        dataType: 'json',
        type: 'post',
        url:  base_url+'HotelSupplier/allotment_list?value=next&todate='+todate+'&fromdate='+fromdate+'&hotelid='+hotelid+'&contractid='+contractid,
        cache: false,
        success: function (response) {
          $("#allotment_table").html(response.list);
          $('#txtCurrentDate').val(response.chdate);
          $('#fromdate').val(response.chdate);
          $('#todate').val(response.todate);
          divLoading("stop");
        }
      });      
  }
  </script>
  <script src="<?php echo base_url(); ?>skin/js/supplier.js"></script>
<?php init_front_head_footer(); ?> 
