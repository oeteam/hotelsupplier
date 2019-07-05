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
  <div class="col-md-12">
     <span class="msg"></span>
     <div class="sb2-2">
    <div class="sb2-2-3">
      <div class="col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-header text-uppercase" style="padding: 10px; border-bottom: 1px solid #ccc;"><h3>Hotel Details</h3>
            </div>
            <div class="card-block"  style="padding: 15px;">
                <div class="row m-b-1">
                <div class="col-md-3 col-sm-3">
                    <div class="text-center mb-sm-0" style="background-color: #eaeaea">
                      <?php  
                        if (isset($view[0]->Image1)) { ?>
                                            <img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $view[0]->hotel_id; ?>/<?php echo $view[0]->Image1;?>" width="70%"  >
                                            <?php  } else {  { ?>
                                            <img src="">
                                <?php  } }?>

                    </div>
                </div>
                <?php $currency="AED"; ?>
                <div class="col-md-9 col-sm-9">
                    <div class="row">
                      <div class="col-sm-6">
                         <form class="form-horizontal" role="form">
                                  <div class="form-group">
                                      <label class="col-sm-6 col-md-6 col-lg-5" style="color: #000; font-size: 13px;">
                                          <i class="fa fa-hotel" style="color: #4caf50;"></i>&nbsp;
                                            Hotel name :
                                      </label>
                                      <div class="col-sm-6 col-md-6 col-lg-7">
                                        <label for=""><?php echo $view[0]->hotel_name ?>
                                        
                                        </label>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-6 col-md-6 col-lg-5" style="color: #000; font-size: 13px;">
                                      <i class="fa fa-map-marker" style="color: #4caf50;"></i>&nbsp;
                                            Location :
                                      </label>
                                      <div class="col-sm-6 col-md-6 col-lg-7">
                                          <label for=""><?php echo $view[0]->location ?></label>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-6 col-md-6 col-lg-5" style="color: #000; font-size: 13px;">
                                      <i class="fa fa-calendar" style="color: #4caf50;"></i>&nbsp;
                                            Joining Date :
                                      </label>
                                      <div class="col-sm-6 col-md-6 col-lg-7">
                                          <label for=""><?php echo date('d/m/Y',strtotime($view[0]->Created_Date)) ?></label>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-6 col-md-6 col-lg-5" style="color: #000; font-size: 13px;">
                                            <i class="fa fa-mobile" style="color: #4caf50;"></i>&nbsp;
                                            Phone No :
                                      </label>
                                      <div class="col-sm-6 col-md-6 col-lg-7">
                                            <label for=""><?php echo $view[0]->sale_number ?></label>
                                      </div>
                                  </div>
                              </form>
                      </div>
                      <div class="col-sm-6">
                          <form class="form-horizontal" role="form">
                                  <div class="form-group">
                                      <label class="col-sm-6 col-md-6 col-lg-5" style="color: #000; font-size: 13px;">
                                      <i class="fa fa-address-book-o" style="color: #4caf50;"></i>&nbsp;
                                            Address :  
                                      </label>
                                      <div class="col-sm-6 col-md-6 col-lg-7">
                                           <label for=""><?php echo $view[0]->sale_address ?></label>
                                      </div>
                                  </div>
                              </form>                       
                      </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
      </div>

    <div class="col-md-12 sleft_bor">
      <div class="row">
        <div class="col-md-6">
          <h4 class="dark bold">Agent Name : <?php echo $view[0]->AFName.' '.$view[0]->ALName ?></h4>
          <br>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <h4 class="dark bold">Booking Details</h4>
          <br>
        </div>
        <div class="col-md-6">
            </br>
            <span class="pull-right" >
            <?php 
              if( $view[0]->booking_flag ==2 || $view[0]->booking_flag ==4) { ?>
              <a href="#" class="btn-sm btn-success  " data-toggle="modal" data-target="#booking_modal"  class="sb2-2-1-edit delete">Accept</a>  <?php } ?>
             &nbsp<a class="btn-sm btn-primary" href="<?php echo  base_url(); ?>HotelSupplier">back</a>
          </span>
        </div>
      </div>
      <input type="hidden" name="id" id="id" value="<?php echo $view[0]->bkid ?>">
      <input type="hidden" name="Hid" id="Hotelid" value="<?php echo $view[0]->hotel_id ?>">
      <input type="hidden" name="Aid" id="Agentid" value="<?php echo $view[0]->agent_id ?>">
    
        <!-- <div class="col-md-12">-->
      <div class="row">
        <div class="col-md-6"> 
          <span>Booking Id : <?php echo $view[0]->booking_id ?></span><br>
          <span>Room Type : <?php echo $view[0]->room_name." ".$view[0]->Room_Type ?></span>
          <br>
          <span>Booking date : <?php echo date('d/m/Y',strtotime($view[0]->booking_date)) ?></span>
          <br>
          <span>Nationality : <?php echo NationalityIduseGetName($view[0]->nationality) ?></span>
          <?php
           if ($view[0]->boardName!="") { ?>
            <br><span>Board : <?php echo $view[0]->boardName ?></span>
          <?php } ?>
        </div>
      </div>
      
      </br>
      <div class="row">
        <div class="col-md-6">
                <h4 class="dark bold" >Adult(s) Details - <?php echo $view[0]->adults_count ?> adults</h4>
        </div>
        <div class="col-md-6">
          <h4 class="dark bold"> Childs(s) Details - <?php echo $view[0]->childs_count ?> childs</h4>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="scol-md-12">
          <div class="col-md-9" >
            <h4 class="dark bold" >Contact Details</h4> <br>
            <table class="table table-bordered">
              <thead  style="background-color: #c1bfbf;">
                <tr>
                  <td>Rooms</td>
                  <td>Name</td>
                  <td>Email</td>
                  <td>Contact number</td>
                </tr>
              </thead>
              <tbody>
                <?php 
                for ($w=1; $w <=$view[0]->book_room_count; $w++) { 
                $RoomFname = "Room".$w."-FName";
                $RoomLname = "Room".$w."-LName";

                 ?>
                <tr>
                  <td>Room <?php echo $w ?></td>
                  <?php if ($w==1) { ?>
                    <td><?php echo $view[0]->bk_contact_fname." ".$view[0]->bk_contact_lname; ?></td>
                    <td><?php echo $view[0]->bk_contact_email ?></td>
                    <td><?php echo $view[0]->bk_contact_number ?></td>
                  <?php } else { ?>
                    <td><?php echo $view[0]->$RoomFname; ?> <?php echo isset($view[0]->$RoomLname) ? $view[0]->$RoomLname : '' ?></td>
                    <td></td>
                    <td></td>
                  <?php } ?>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
      <br>
      
      <div class="row">
        <div class="scol-md-12">
          <div class="col-md-9">
                <h4 class="dark bold" >Day Details</h4> 
                <br>
                <p>Total Days : <?php echo $view[0]->no_of_days ?></p>
                <p>No of rooms : <?php echo $view[0]->book_room_count ?></p>
                <span>Check In Date : </span><span class="bold"><?php $check_in=date_create($view[0]->check_in);
                echo date_format($check_in,'d-M-Y') ?></span>&nbsp
                <span class="left_bor">&nbsp  Check Out Date : </span><span class="bold"><?php $check_out=date_create($view[0]->check_out);
                echo date_format($check_out,'d-M-Y') ?></span>
          </div>
        </div>
      </div>
      </br>
                <?php 
                $net_adult_amount = 0;
                $net_child_amount = 0;
                ?>
      

        <div class="">
            <div class="card">
                <?php 
            $net_general_adult = 0;
            $net_general_child = 0;
            $net_Ex_amount  = 0;
            ?>
                    <div class="card-header text-uppercase" style="padding: 10px; border-bottom: 1px solid #ccc;">
                    
          <div class="card-header text-uppercase" style="padding: 10px; border-bottom: 1px solid #ccc; ">
                    <h3>Booking Amount Breakup - <?php echo $view[0]->contract_id ?>
                    <span class="pull-right" style="font-size: 18px; text-transform: capitalize;">progress : <?php if ($view[0]->booking_flag==0) { ?>
                <span class="text-danger">Rejected</span>
                <?php } else if($view[0]->booking_flag==1) { ?><span class="text-success">Success</span><?php } else if($view[0]->booking_flag==2) { ?><span class="label label-warning">Pending</span> <?php } else if($view[0]->booking_flag==3) { ?><span class="text-danger">Cancelled</span> <?php } else if($view[0]->booking_flag==4) { ?><span class="text-danger">Accepted Pending</span> <?php } else if($view[0]->booking_flag==5) { ?><span class="text-danger">Cancellation Pending</span> <?php } ?></span>
                </h3>
                </div>
                <div class="card-header text-uppercase" style="padding: 10px; border-bottom: 1px solid #ccc; ">
              <?php 
          // print_r($board);
              $total_markup    = $view[0]->agent_markup+$view[0]->admin_markup+$view[0]->search_markup;
              $book_room_count = $view[0]->book_room_count;
              $individual_amount = explode(",", $view[0]->individual_amount);
              $individual_discount = explode(",", $view[0]->individual_discount);
              $checkin_date=date_create($view[0]->check_in);
              $checkout_date=date_create($view[0]->check_in);
              $no_of_days=date_diff($checkin_date,$check_out);
              $tot_days = $no_of_days->format("%a");
              for ($i=1; $i <= $book_room_count; $i++) { ?>
              <div class="row payment-table-wrap"><div class="row payment-table-wrap">
                <div class="col-md-12">
                  <h4 class="room-name">Room <?php echo $i; ?></h4>
                  <table class="table-bordered" >
                    <thead>
                      <tr>
                        <th style="width: 85px;">Date</th>
                        <th style="width: calc(100% - 265px);">Room Type</th>
                        <th style="width: 60px; text-align: center">Board</th>
                        <th style="width: 120px; text-align: right">Rate</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $oneNight = array();
                      for ($j=0; $j < $tot_days ; $j++) { 
                        $ExAmount[$j] = 0;
                        $GAamount[$j] = 0;
                        $GCamount[$j] = 0;
                        $BAamount[$j] = 0;
                        $BCamount[$j] = 0;
                        $TBAamount[$j] = 0;
                        $TBCamount[$j] = 0;
                            ?>
                            <tr>
                              <td><?php echo date('d/m/Y', strtotime($view[0]->check_in. ' + '.$j.'  days')); ?></td>
                              <td><?php echo $view[0]->room_name." ".$view[0]->Room_Type ?></td>
                              <td style="text-align: center"><?php echo $view[0]->boardName; ?></td>
                              <td style="text-align: right">
                                <p class="new-price">

                                  <?php 
                                  if (!isset($individual_discount[$j])!=0) {
                                    $individual_discount[$j] = 0;
                                  }
                                $roomAmount[$j] = $individual_amount[$j];

                                $DisroomAmount[$j] = $roomAmount[$j]-($roomAmount[$j]*$individual_discount[$j])/100;

                                  if ($individual_discount[$j]!=0) { ?>
                                  <small class="old-price text-danger"><?php 
                                  echo currency_type($currency_type,$roomAmount[$j]) ?> <?php echo $currency_type ?></small>
                                  <br>
                                  <?php }
                                  if ($j==0) {
                                    $oneNight[] = $DisroomAmount[0];
                                  }
                                  echo currency_type(agent_currency(),$DisroomAmount[$j]); ?> <?php echo agent_currency() ?>
                                 </p>
                              </td>
                            </tr>
                            <!-- Extrabed list start -->
                            <?php if (count($ExBed)!=0) {
                              foreach ($ExBed as $Exkey => $Exvalue) {
                                if ($Exvalue->date==date('Y-m-d', strtotime($view[0]->check_in. ' + '.$j.'  days'))) {
                                  $exroomExplode = explode(",", $Exvalue->rooms);
                                  $examountExplode = explode(",", $Exvalue->Exrwamount);
                                  $exTypeExplode = explode(",", $Exvalue->Type);
                                  foreach ($exroomExplode as $Exrkey => $EXRvalue) {
                                    if ($EXRvalue==$i) {
                             ?>
                                 <tr>
                                  <td></td>
                                  <td><?php echo $exTypeExplode[$Exrkey] ?></td>
                                  <td class="text-center">-</td>
                                  <td class="text-right"><?php 
                                  $ExAmount[$j]+= $examountExplode[$Exrkey];
                                  if ($j==0) {
                                    $oneNight[] = $ExAmount[0];
                                  }
                                  echo currency_type(agent_currency(),$examountExplode[$Exrkey]); ?> <?php echo agent_currency();
                                  ?> </td>
                                 </tr>

                            <?php } } } } } ?>
                            <!-- Extrabed list end -->
                            <!-- Adult and room General supplement list start -->
                            <?php if (count($general)!=0) {
                              foreach ($general as $gskey => $gsvalue) {
                                if ($gsvalue->gstayDate==date('d/m/Y', strtotime($view[0]->check_in. ' + '.$j.'  days'))) {
                                  $gsadultExplode = explode(",", $gsvalue->Rwadult);
                                  $gsadultAmountExplode = explode(",", $gsvalue->Rwadultamount);
                                  foreach ($gsadultExplode as $gsakey => $gsavalue) {
                                    if ($gsavalue==$i) {
                             ?>
                                 <tr>
                                  <td></td>
                                  <td><?php echo $gsvalue->application=="Per Room" ? $gsvalue->generalType : 'Adults '.$gsvalue->generalType ; ?></td>
                                  <td class="text-center">-</td>
                                  <td class="text-right"><?php 
                                    $GAamount[$j]=$gsadultAmountExplode[$gsakey];
                                    if ($j==0) {
                                      $oneNight[] = $GAamount[0];
                                    }
                                    echo currency_type(agent_currency(),$GAamount[$j]); ?> <?php echo agent_currency();
                                  ?>
                                   </td>
                                 </tr>
                            <?php } } ?> 
                            <!-- Adult and room General supplement list end -->
                            <!-- Adult General supplement list start -->

                            <?php
                              $gschildExplode = explode(",", $gsvalue->Rwchild);
                          $gschildAmountExplode = explode(",", $gsvalue->RwchildAmount);
                             foreach ($gschildExplode as $gsckey => $gscvalue) {
                                    if ($gscvalue==$i) { ?>
                            <tr>
                                  <td></td>
                                  <td><?php echo 'Child '.$gsvalue->generalType ; ?></td>
                                  <td class="text-center">-</td>
                                  <td class="text-right"><?php 
                                    $GCamount[$j]=$gschildAmountExplode[$gsckey];
                                    if ($j==0) {
                                      $oneNight[] = $GCamount[0];
                                    }
                                    echo currency_type(agent_currency(),$GCamount[$j]); ?> <?php echo agent_currency();
                                   ?> </td>
                                 </tr>
                            <?php } } ?> 

                            <?php } } } ?>
                            <!-- Adult General supplement list end -->
                            <!-- Adults Board supplement list start -->
                            <?php foreach ($board as $bkey => $bvalue) { 
                              if ($bvalue->stayDate==date('d/m/Y', strtotime($view[0]->check_in. ' + '.$j.'  days'))) {
                                $ABRwadultexplode = explode(",", $bvalue->Rwadult);
                                $ABRwadultamountexplode = explode(",", $bvalue->RwadultAmount);
                                foreach ($ABRwadultexplode as $ABRwkey => $ABRwvalue) {
                                  if ($ABRwvalue==$i) {
                              ?>
                              <tr>
                                <td></td>
                                <td>Adult <?php echo $bvalue->board; ?></td>
                                <td class="text-center">-</td>
                                <td class="text-right"><?php 
                                  $BAamount[$j] = $ABRwadultamountexplode[$ABRwkey];
                                  $TBAamount[$j] += $BAamount[$j];
                                  if ($j==0) {
                                    $oneNight[] = $BAamount[0];
                                  }
                                  echo currency_type(agent_currency(),$BAamount[$j]); ?> <?php echo agent_currency();
                                 ?></td>
                              </tr>
                              
                            <?php } } ?>
                            <!-- Adults Board supplement list end -->
                            <!-- Child Board supplement list start -->
                            <?php 
                                $CBRwchildexplode = explode(",", $bvalue->Rwchild);
                                $CBRwchildamountexplode = explode(",", $bvalue->RwchildAmount);
                                foreach ($CBRwchildexplode as $CBRwkey => $CBRwvalue) {
                                  if ($CBRwvalue==$i) {
                              ?>
                              <tr>
                                <td></td>
                                <td>Child <?php echo $bvalue->board; ?></td>
                                <td class="text-center">-</td>
                                <td class="text-right"><?php 
                                  $BCamount[$j] = $CBRwchildamountexplode[$CBRwkey];;
                                  $TBCamount[$j] += $BCamount[$j];
                                  if ($j==0) {
                                    $oneNight[] = $BCamount[0];
                                  }
                                  echo currency_type(agent_currency(),$TBCamount[$j]); ?> <?php echo agent_currency();
                                 ?></td>
                              </tr>
                              
                            <?php } }  ?>
                            <?php } } ?>
                            <!-- Child Board supplement list end -->
                            <?php } ?>
                          </tbody>
                          <tfoot>
                            <tr>
                              <?php 

                              $total[$i] = array_sum($DisroomAmount)+array_sum($ExAmount)+array_sum($GAamount)+array_sum($GCamount)+array_sum($TBAamount)+array_sum($TBCamount); 

                              
                              $totalNotMar[$i] = array_sum($roomAmount)+array_sum($ExAmount)+array_sum($GAamount)+array_sum($GCamount)+array_sum($TBAamount)+array_sum($TBCamount); 

                              
                              ?>
                              <?php  ?>
                              <td colspan="3" style="text-align: right"><strong class="text-blue">Total</strong></td>
                              <td style="text-align: right; font-weight: 700; color: #0074b9"><?php 
                              echo currency_type(agent_currency(),$total[$i]); ?> <?php echo agent_currency();
                             ?> </td>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                    </div>
                    <?php } ?>
            </div>
        
            <div class="card-block"  style="padding: 15px;">
                    <div class="row m-b-1">
                      <div class="col-md-12">
                        <div class="col-md-12">
          
                <div class="col-md-6">
                  <p>Tax</p>
                </div>
                <div class="col-md-6">
                  <p><?php echo $view[0]->tax ?>%</p>
                </div>
               
                <?php 
                $array_sumTotal   = (array_sum($total)*$view[0]->tax)/100 + array_sum($total);
                $wioarray_sumTotal  = (array_sum($totalNotMar)*$view[0]->tax)/100 + array_sum($totalNotMar);
                $array_sumTotalNM = (array_sum($totalNotMar));
               // $array_sumTotal = (array_sum($totRmAmt)*$view[0]->tax)/100+array_sum($totRmAmt);
               // $wioarray_sumTotal = ceil((array_sum($witotal)*$view[0]->tax)/100+array_sum($witotal));

                
          if ($view[0]->discount!=0) { ?>
            <div class="col-md-6 bold">
              <p></p>
            </div>
            <div class="col-md-6 bold">
              <p><div class="slashed-price">
                <small class="old-price text-danger">
                  <?php 

                  echo currency_type(agent_currency(),$wioarray_sumTotal) ?> <?php echo agent_currency() ?>
                </small>
                <span><?php echo $discountType ?></span>
              </div>
            </p>
            </div>
          <?php } 
          if ($view[0]->discountType=="stay&pay") { ?>
                  <div class="col-md-6 bold">
              <p></p>
            </div>
            <div class="col-md-6 bold">
              <p><div class="slashed-price">
                <small class="old-price text-danger">
                  <?php 

                  echo currency_type(agent_currency(),$wioarray_sumTotal) ?> <?php echo agent_currency() ?>
                </small>
                <span><?php echo $discountType ?></span>
              </div>
            </p>
            </div>
                <?php }
                ?>
                
                <div class="col-md-6 bold">
                  <p>GRAND TOTAL</p>
                </div>

                 <div class="col-md-6 bold">
                  <p><?php 
                  $final_total = $array_sumTotal;

                  echo agent_currency() ?> <?php echo currency_type(agent_currency(),ceil($final_total)) ?></p>
                </div>
            </div>
                        
                </div>
              </div>
            </div> 
        </div>
      </div>
    </div>
  </div>
</div>
<?php if ($view[0]->SpecialRequest!="") { ?>
<div class="col-sm-12 col-xs-12">
  <div class="card">
    <div class="card-header text-uppercase" style="padding: 10px; border-bottom: 1px solid #ccc;">
      <h4 class="bold">Special Request</h4>
      <br>
      <p><?php echo $view[0]->SpecialRequest ?></p>
    </div>
  </div>
</div>
<?php } ?>
<?php if(count($cancelation)!=0) {
       ?>
      <div class="col-md-12">
        <h4 class="bold">Cancelation Policy</h4>
        <table class="table table-bordered table-hover">
            <thead>
                <tr style="background-color: #0074b9;color: white">
                  <th>Cancelled on or After</th>
                  <th>Cancelled on or Before</th>
                  <th>Cancellation Charge</th>
                </tr>
              </thead>
              <tbody> 
                <?php foreach ($cancelation as $Canckey => $Cancvalue) { 
                  if ($Cancvalue->application=="NON REFUNDABLE") {  ?>
                  <tr>
                    <td><?php echo date('d/m/Y',strtotime($view[0]->Created_Date)) ?></td>
                    <td><?php echo date('d/m/Y',strtotime($view[0]->check_in)) ?></td>
                    <td><?php $charge = $final_total * ($Cancvalue->cancellationPercentage/100); 
                       echo agent_currency() ?> <?php echo currency_type(agent_currency(),ceil($charge));
                    ?>
                    (<?php echo $Cancvalue->application ?>)</td>
                  </tr>
                <?php   } else { ?>
                  <tr>
                    <td><?php 
                    $lastAmt = array_sum($oneNight);
                    if(date('Y-m-d' , strtotime('-'.($Cancvalue->daysFrom).' days', strtotime($view[0]->check_in))) < date('Y-m-d')) {
                      echo date('d/m/Y');
                    } else {
                      echo date('d/m/Y' , strtotime('-'.($Cancvalue->daysFrom).' days', strtotime($view[0]->check_in)));
                    }
                    ?></td>
                    <td><?php echo date('d/m/Y' , strtotime('-'.$Cancvalue->daysTo.' days', strtotime($view[0]->check_in))) ?></td>
                    <td><?php 
                      if ($Cancvalue->application=="FIRST NIGHT") {
                        $charge = $lastAmt*($Cancvalue->cancellationPercentage/100);
                      } else {
                        $charge = $final_total * ($Cancvalue->cancellationPercentage/100); 
                      }
                      
                       echo agent_currency() ?> <?php echo currency_type(agent_currency(),ceil($charge));
                    ?>
                    (<?php echo $Cancvalue->application ?>)</td>
                  </tr>
              <?php } } ?>
              </tbody>
        </table>
      </div>
      <?php } ?>
      <div class="col-md-12">
        <h4 class="bold">Important Notes</h4>
        <div><?php  echo isset($view[0]->Important_Notes_Conditions) ? $view[0]->Important_Notes_Conditions : '' ?></div>
      </div>   
    </div>   
    <div class="row">
      <div class="col-md-12">
        <h4>progress : <?php if ($view[0]->booking_flag==0) { ?>
          <span class="red">Rejected</span>
        <?php } else if($view[0]->booking_flag==1) { ?><span class="green">Success</span><?php } else if($view[0]->booking_flag==2) { ?><span class="orange">Pending</span> <?php } ?></h4>
      </div>
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
            url : base_url+'HotelSupplier/hotel_booking_list',
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
            url : base_url+'HotelSupplier/hotel_booking_list?filter='+val,
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
