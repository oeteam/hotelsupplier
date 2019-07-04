<?php init_front_head_supplier(); ?>
<style>
 .nav-tabs li {
  background: black;
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
.details {
  margin-top: 230px;
}
.tabs {
  padding: 0px;
}
.switch {
  position: relative;
  display: inline-block;
  width: 40px;
  height: 15px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 20px;
  width: 20px;
  left: 0px;
  bottom: -2px;
  background-color: black;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

</style>
<div class="clearfix" style="margin-top: 20px;"></div>
<div class="col-md-10 col-md-offset-1">
<div class="row">
  <div class="col-md-12" style="height: 58px">
     <span class="msg"></span>
     <div class="content5">
          <div class="row">
            <div class="col-md-12">
               <div class="col-md-2 form-group">
                  <label>Hotelname</label>
                  <select class="form-control">
                    <option>Hotelname</option>
                  </select>
                </div>
                <div class="col-md-2 form-group">
                  <label>Country</label>
                  <input type="text" name="co" class="form-control" id="co">
                </div>
                <div class="col-md-2 form-group">
                  <label>State</label>
                  <input type="text" class="form-control">
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
                  <select class="form-control">
                    <option>All</option>
                  </select>
                </div>

                <div class="col-md-2 form-group">
                  <label>Booking No.</label>
                  <input type="text" name="label" class="form-control" id="label">
                </div>
                <div class="col-md-2 form-group">
                  <label>Reference No.</label>
                  <input type="text" name="ctrip" class="form-control" id="ctrip">
                </div>
                <div class="col-md-2 form-group">
                  <label>Date</label>
                  <select class="form-control">
                    <option>All</option>
                  </select>
                </div>
                <div class="col-md-2 form-group">
                  <label>Check In</label>
                  <input type="text" name="ctrip" class="form-control" id="ctrip">
                </div>
                <div class="col-md-2 form-group">
                  <label>Check out</label>
                  <input type="text" name="ctrip" class="form-control" id="ctrip">
                </div>
                
             </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
            <div class="col-md-12">
              <button class="pull-right btn btn-success" id="search">Search</button>
            </div> 
            </div> 
          </div>
        </div>
      </div>
    </div>

  <div class="row" style="">
    <div class="col-md-12">
      <div class="box-inn-sp">
        <div class="inn-title">
             <h3>Hotel List</h3>
        </div>
        <div class="row">
          <div class="col-md-12 mar_top_10">
            <ul class="tabs" style="box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.16);">
              <li class="tab col"><a class="all active" href="#" onclick="filter('0')">All</a></li>
              <li class="tab col"><a class="Accepted" href="#" onclick="filter('1')">Accepted</a></li>
              <li class="tab col"><a class="Rejected" href="#" onclick="filter('3')">Cancelled</a></li>
            </ul>
          </div>
        </div>
    </div>
    <div class="tab-inn">
      <br>
      <table class="table table-hover" id="hotel_booking_table">
        <thead>
            <tr>
              <td>Slno</td>
              <td>Booking Id</td>
              <td>Booking Date</td>
              <td>Hotel Name</td>
              <td>Room Type</td>
              <td>Check In</td>
              <td>Check Out</td>
              <td>No of days</td>
              <td>No of rooms</td>
              <td>Price</td>
              <td>Status</td>
              <td title="Confirmation Number">C No</td>
              <td>Action</td>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
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
            <h4>Do you want to delete this !</h4>
            <form action="<?php echo base_url(); ?>welcome/" class="delete_id" id="delete_form">
                <input type="hidden" id="delete_id" name="delete_id" value="<?php echo isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ?>">
                <button type="button" onclick="commonDelete();" class="waves-effect waves-light btn-sm btn-danger pull-right">Delete</button><br><br>
            </form>
          </div>
        </div>
      </div>
<script>
  $(document).ready(function() {
    var hotel_booking_table = $('#hotel_booking_table').dataTable({
        "bDestroy": true,
        "order": [[ 2, 'desc' ]],
        "ajax": {
            url : base_url+'hotelsupplier/hotel_booking_list',
            type : 'GET'
        },
    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
        $("td:first", nRow).html(iDisplayIndex +1);
       return nRow;
    }
  });
  });
  function filter(val) {
     if (val==0) {
      $('.all').addClass('active');
      $('.Accepted').removeClass('active');
      $('.Cancelled').removeClass('active');
    } else if(val==1) {
      $('.Accepted').addClass('active');
      $('.all').removeClass('active');
      $('.Cancelled').removeClass('active');
    } else {
      $('.Cancelled').addClass('active');
      $('.all').removeClass('active');
      $('.Accepted').removeClass('active');
    }
    var hotel_booking_table = $('#hotel_booking_table').dataTable({
        "bDestroy": true,
        "order": [[ 2, 'desc' ]],
        "ajax": {
            url : base_url+'hotelsupplier/hotel_booking_list?filter='+val,
            type : 'GET'
        },
    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
        $("td:first", nRow).html(iDisplayIndex +1);
       return nRow;
    }
  }); 
}

  
 </script>
<?php init_front_head_footer(); ?> 
