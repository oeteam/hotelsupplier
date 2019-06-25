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
.hotel-list li a {
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
.hotel-list li a.active {
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


</style>
<div class="clearfix" style="margin-top: 20px;"></div>
<div class="col-md-8 col-md-offset-2">
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
    <div class="col-md-12 contractlist" id="contractlist">
        <?php if(isset($contractlist) && $contractlist!="") {
           foreach ($contractlist as $key => $value) {
            if($key==0) { ?>
              <li><a class="active" id="<?php echo $value->id ?>" onclick="loadallotment(<?php echo $value->id ?>)"><?php echo $value->contract_id ?></a></li>
            <?php } else { ?>
              <li><a id="<?php echo $value->id ?>" onclick="loadallotment(<?php echo $value->id ?>)"><?php echo $value->contract_id?></a></li>
            <?php } 
          }
        }
        ?>
        <br>
        <div class="col-md-12 pull-right"><div class="hpadding20">
          <ul class="pagination right paddingbtm20">
          <?php echo $clinks ?>
          </ul>
        </div></div>
    </div>
    <div class="clearfix"></div><br><br>
    <div class="col-md-12 form-group">
      <button class="btn btn-success" style="margin-left: -15px" data-toggle="modal" data-target="#myModal" onclick="add_allotment_modal();">Add Allotment</button> 
    </div>  
  <div class="row" >
    <div class="col-md-12">
      <div class="box-inn-sp">
        <div class="inn-title">
             <h3>Allotment List</h3>
        </div>
    </div>
    <div class="tab-inn">
      <table class="table table-hover table-bordered" id="allotment_table">
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
    function add_allotment_modal() {
      var contractid = $("#contractlist li a.active").attr('id');
      var hotelid = $("#hotel-list li a.active").attr('id');
      $("#myModal").load(base_url+'HotelSupplier/add_allotment_modal/'+contractid+'/'+hotelid);
      $('#myModal').modal({
          backdrop: 'static',
          keyboard: false
      });
    }
    // function editroom(id) {
    //    var hotelid = $("#hotel-list li a.active").attr('id');
    //     $("#myModal").load(base_url+'HotelSupplier/addroommodal/'+hotelid+'/?room_id='+id);
    //       $('#myModal').modal({
    //           backdrop: 'static',
    //           keyboard: false
    //       });
    // }
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
        $("#hotel-list").html(response.list);
      }
    });      
  }
  function loadcontracts(id) {
   var hotelid = $("#hotel-list li a.active").attr('id');
   $.ajax({
      dataType: 'json',
      type: 'post',
      url:  base_url+'HotelSupplier/hotel_contract_list/'+hotelid,
      cache: false,
      success: function (response) {
        $("#contractlist").html(response.list);
      }
    });    
  }
  function loadallotment(id) {
     var hotelid = $("#hotel-list li a.active").attr('id');
     $.ajax({
      dataType: 'json',
      type: 'post',
      url:  base_url+'HotelSupplier/allotment_list/'+id+'/'+hotelid,
      cache: false,
      success: function (response) {
        $("#allotment_table").html(response.list);
      }
    });     
   }
  </script>
  <script src="<?php echo base_url(); ?>skin/js/supplier.js"></script>
<?php init_front_head_footer(); ?> 
