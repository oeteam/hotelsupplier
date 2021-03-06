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
      <div class="clearfix"></div>
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
                  <button class="pull-right btn btn-success ml10" data-toggle="modal" data-target="#myModal" onclick="addhotelmodal();">Add</button> 
                  <button class="pull-right btn btn-success ml10" id="hotelSearch">Search</button>
                </div>         
             </div>
          </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row" style="">
    <div class="col-md-12">
      <div class="box-inn-sp">
        <div class="inn-title">
             <h3>Hotel List</h3>
        </div>
        <div class="row">
          <div class="col-md-12 mar_top_10">
            <ul class="tabs" style="box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.16);">
             <!--  <li class="tab col s2"><a class="Accepted active" href="#" onclick="filter('0')">Hotel</a></li> -->
            <!--   <li class="tab col s2"><a class="Pending" href="#" onclick="filter('1')">Removal Requests</a></li> -->
              <li class="tab col s2"><a class="all active" href="#" onclick="filter('4')">All</a></li>
              <li class="tab col s2"><a class="activeall" href="#" onclick="filter('1')">Active</a></li>
              <li class="tab col s2"><a class="stopsale" href="#" onclick="filter('2')">StopSale</a></li>
            </ul>
          </div>
        </div>
    </div>
    <div class="tab-inn">
      <br>
      <table class="table table-hover" id="hotel_table">
        <thead>
            <tr>
                <th><input type="checkbox" class="check-all"></th>
                <th>sl.no</th>
                <th>Hotel</th>
                <th>country</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
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
<div id="delModal" class=" modal" >
        <div class="modal-content modal-content  col-md-6 col-md-offset-3">
          <div class="modal-body">
            <h4>Do you want to delete this !</h4>
            <form action="<?php echo base_url(); ?>welcome/" class="delete_id" id="delete_form">
                <input type="hidden" id="delete_id" name="delete_id" value="<?php echo isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ?>">
                <button type="button" onclick="commonDelete();" class="waves-effect waves-light btn-sm btn-danger pull-right">Delete</button>
                <button type="button" data-dismiss="modal"  class="close-modal waves-effect waves-light btn-sm btn-primary pull-right">No</button>
                <br><br>
            </form>
          </div>
        </div>
      </div>
<script>
  function edithotel(id) {
    $("#myModal").load(base_url+'HotelSupplier/addhotelmodal?hotels_edit_id='+id);
      $('#myModal').modal({
          backdrop: 'static',
          keyboard: false
      });
  }
  function viewhotel(id) {
    $("#myModal").load(base_url+'HotelSupplier/hotel_detail_view?id='+id);
      $('#myModal').modal({
          backdrop: 'static',
          keyboard: false
      });
  }
  function addhotelmodal() {
    $("#myModal").load(base_url+'HotelSupplier/addhotelmodal');
    $('#myModal').modal({
        backdrop: 'static',
        keyboard: false
    });
  }
  function deletehotelper(id) {
    deletepopupfun(base_url+"HotelSupplier/delete_hotelper",id);
  }
  $(document).ready(function() {
    var hotel_table = $('#hotel_table').dataTable({
          "bDestroy": true,
          "ajax": {
              url : base_url+'HotelSupplier/hotel_list',
              type : 'GET'
          },
       "fnDrawCallback": function(settings){
          $('[data-toggle="tooltip"]').tooltip();          
        }
    });
  });
  $("#hotelSearch").click(function() {
        var Con       = $("#con option:selected").val();
        var state       = $("#state option:selected").val();
        var hotelid      = $("#HotelSelect option:selected").val();
        var city = $('#citys').val();
        var prov = $("#prov").val();
        var rating = $("#starRate").val();
        var hotel_table = $('#hotel_table').dataTable({
          "pageLength": 100,
          "ordering":false,
          "bDestroy": true,
          "ajax": {
            url : base_url+'HotelSupplier/hotelsearch?hotel='+hotelid+
            '&con='+Con+'&state='+state+'&city='+city+'&prov='+prov+'&rating='+rating,
            type : 'POST' 
            },

          "fnDrawCallback": function(settings){
                 $('[data-toggle="tooltip"]').tooltip();          
          },
        }); 
            
          
  });
  function filter(val) {
    if (val==4) {
      $('.all').addClass('active');
      $('.activeall').removeClass('active');
      $('.stopsale').removeClass('active');
    } else if(val==1) {
      $('.activeall').addClass('active');
      $('.all').removeClass('active');
      $('.stopsale').removeClass('active');
    } else {
      $('.stopsale').addClass('active');
      $('.all').removeClass('active');
      $('.activeall').removeClass('active');
    }
    var hotelid = $("#hotel-list li a.active").attr('id');
    var hotel_table = $('#hotel_table').dataTable({
          "bDestroy": true,
          "ajax": {
              url : base_url+'HotelSupplier/hotel_list/'+hotelid+'?filter='+val,
              type : 'GET'
          },
       "fnDrawCallback": function(settings){
          $('[data-toggle="tooltip"]').tooltip();          
        }
    });
  }
 </script>
 <script src="<?php echo base_url(); ?>skin/js/supplier.js"></script>
<?php init_front_head_footer(); ?> 
