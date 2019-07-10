<?php init_front_head_supplier(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('skin/css/jquery.jqChart.css') ?>" />
<script src="<?php echo base_url('skin/js/jquery.jqChart.min.js') ?>" type="text/javascript"></script>
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
    padding-bottom: 20px;
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
</style>
<div class="clearfix" style="margin-top: 20px;"></div>
<div class="col-md-10 col-md-offset-1">
<div class="row">
  <div class="col-md-12" style="height: 58px">
     <span class="msg"></span>
     <div class="content5">
          <div class="row">
            <div class="col-md-12">
               <div class="col-md-4 form-group">
                  <label>From Date</label>
                  <input type="text" class="datePicker-hide datepicker input-group-addon" id="fromDate"  name="fromDate" placeholder="dd/mm/yyyy" value="<?php echo isset($view['fromdate']) ?  $view['fromdate'] : date('Y-m-d') ?>" >
                      <div class="input-group">
                        <input class="form-control datepicker date-pic" id="alternate1" name="" value="<?php echo isset($view['fromdate']) ?  date('d/m/Y',strtotime($view['fromdate'])) : date('d/m/Y') ?>" >
                        <label for="alternate1" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                      </div>
                </div>
                <div class="col-md-4 form-group">
                  <label>To Date</label>
                  <input type="text"  class="datePicker-hide datepicker input-group-addon" id="toDate"  name="toDate" placeholder="dd/mm/yyyy" value="<?php echo isset($view['todate']) ? $view['todate'] : date('Y-m-d',strtotime('+1 day')) ?>">
                  <div class="input-group">
                      <input class="form-control datepicker date-pic" id="alternate2" name="" value="<?php echo isset($view['todate']) ? date('d/m/Y',strtotime($view['todate'])) : date('d/m/Y',strtotime('+1 day')) ?>" >
                      <label for="alternate2" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                  </div>
                </div>
                 <div class="col-md-4 form-group"><br>
                  <button class="pull-left btn btn-success" style="margin-top: 5px" id="report_search">Search</button>
                </div>
             </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
<br>
  <div class="row" style="">
    <div class="col-md-12">
      <div class="box-inn-sp">
        <div class="inn-title">
             <h3>Booking Report</h3>
        </div>
      </div>
    <div class="tab-inn">
      <br>
       <div id="jqChart" style="width: 500px; height: 300px;">
    </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    var nextDay = new Date($("#toDate").val());
    nextDay.setDate(nextDay.getDate() + 1);
    $("#fromDate").datepicker({
        altField: "#alternate1",
        dateFormat: "yy-mm-dd",
        altFormat: "dd/mm/yy",
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
    var background = {
                // type: 'linearGradient',
                // x0: 0,
                // y0: 0,
                // x1: 0,
                // y1: 1,
                // colorStops: [{ offset: 0, color: '#d2e6c9' },
                //              { offset: 1, color: 'white' }]
            };

            $('#jqChart').jqChart({
                title: { text: 'Pie Chart' },
                legend: { title: 'Bookings' },
                border: { strokeStyle: '#6ba851' },
                background: background,
                animation: { duration: 1 },
                shadows: {
                    enabled: true
                },
                series: [
                    {
                        type: 'pie',
                        fillStyles: ['#418CF0', '#E0400A'],
                        labels: {
                            stringFormat: '%.1f%%',
                            valueType: 'percentage',
                            font: '15px sans-serif',
                            fillStyle: 'white'
                        },
                        explodedRadius: 10,
                        explodedSlices: [5],
                        data: [['Accepted', <?php echo $accepted ?>], ['Cancelled', <?php echo $cancelled ?>]]
                    }
                ]
            });

            $('#jqChart').bind('tooltipFormat', function (e, data) {
                return '<b>' + data.dataItem[0] + '</b><br />' +
                       data.value;
            });

  }); 
  $("#report_search").click(function() {
        var from_date = $("#fromDate").val();
        var to_date   = $("#toDate").val();
        $.ajax({
          dataType: 'json',
          type: 'post',
          url: base_url+'HotelSupplier/BookingPatternReport?&fromdate='+from_date+'&todate='+to_date,
          cache: false,
          success: function (response) {
             var background = {
                // type: 'linearGradient',
                // x0: 0,
                // y0: 0,
                // x1: 0,
                // y1: 1,
                // colorStops: [{ offset: 0, color: '#d2e6c9' },
                //              { offset: 1, color: 'white' }]
            };

            $('#jqChart').jqChart({
                title: { text: 'Pie Chart' },
                legend: { title: 'Bookings' },
                border: { strokeStyle: '#6ba851' },
                background: background,
                animation: { duration: 1 },
                shadows: {
                    enabled: true
                },
                series: [
                    {
                        type: 'pie',
                        fillStyles: ['#418CF0', '#E0400A'],
                        labels: {
                            stringFormat: '%.1f%%',
                            valueType: 'percentage',
                            font: '15px sans-serif',
                            fillStyle: 'white'
                        },
                        explodedRadius: 10,
                        explodedSlices: [5],
                        // data: [['All', response.all], ['Accepted', response.accepted], ['Cancelled', response.cancelled]]
                        data: [['Accepted', response.accepted], ['Cancelled', response.cancelled]]
                    }
                ]
            });

            $('#jqChart').bind('tooltipFormat', function (e, data) {
                return '<b>' + data.dataItem[0] + '</b><br />' +
                       data.value;
            });
            
          } 
        });
  });   
</script>
<?php init_front_head_footer(); ?> 
