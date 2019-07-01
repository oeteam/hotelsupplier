 $("#hname").keyup(function() {
    $(".avail-next").addClass("hide");
 })
 $("#hotel_check").click(function() {
    var hotel_name = $("#hname").val();
    if (hotel_name=="") {
      $("#hname").focus();
      $('.msg').append('<script type="text/javascript"> AddToast("danger","Hotelname is not entered!","!");</script>');
    } else if(hotel_name!="") {
       $.ajax({
            dataType: 'json',
            url: base_url+'HotelSupplier/checkHotel/'+hotel_name,
            cache: false,
            success: function (response) {
              if(response.status == '1') {
                $(".avail-msg").text("Hotel already exists !");
                $(".avail-msg").addClass("text-danger");
                $(".avail-msg").removeClass("text-success");
              } else {
                $("#hotel_name").val(hotel_name);
                $(".avail-msg").text("This Hotel name is available");
                $(".avail-msg").removeClass("text-danger");
                $(".avail-msg").addClass("text-success");
                $(".avail-next").removeClass("hide")
              }
            }
          });
    }
  });
 $("#hotel_next").click(function() {
    $("#home").addClass("in active")
    $("#check").removeClass("in active")
    $(".home").addClass("active")
    $(".check").removeClass("active")
 });
 $("#hotel_tab_1").click(function() {
    ConSelectFun();
    var map_location = $("#us3-address").val();
    var map_error = "";
    if (map_location=="") {
      $("#us3-address").focus();
      $('.msg').append('<script type="text/javascript"> AddToast("danger","Map location field is required!","!");</script>');
    } else if(map_location!="") {
      $("#menu1").addClass("in active")
      $("#home").removeClass("in active")
      $("#check").removeClass("in active")
      $(".menu1").addClass("active")
      $(".home").removeClass("active")
      $(".check").removeClass("active")
    }
  });
 $("#hotel_tab_1_prev").click(function() {
    $("#home").removeClass("in active")
    $("#check").addClass("in active")
    $(".home").removeClass("active")
    $(".check").addClass("active")
  });
  $("#hotel_tab_2").click(function() {
    $("#room_aminities").val($("#chip1").text());
    $("#keywords").val($("#chip2").text());
    var hotel_name = $("#hotel_name").val();
    var city = $("#city").val();
    var citydes = $("#citydes").val();
    var citynearby = $("#citynearby").val();
    var contry = $("#ConSelect").val();
    var state = $("#stateSelect").val();
    // var room_aminities = $("#room_aminities").val();
    //var room_aminities=$("#chip1").material_chip('data');
    //var keywords=$("#chip2").material_chip('data');
    var hotel_facilties = $("#hotel_facilties").val();
    var room_facilties1 = $("#room_facilties1").val();
    var hotel_description = $("#hotel_description").val();
    var total_no_of_rooms = $("#total_no_of_rooms").val();
    // var Website = $("#Website").val();
    var sell_currency = $("#sell_currency").val();
    if (hotel_name=="") {
      $('.msg').append('<script type="text/javascript"> AddToast("danger","Hotel Name field is required!","!");</script>');
      $("#hotel_name").focus();
    }  else if (contry=="") {
      $('.msg').append('<script type="text/javascript"> AddToast("danger","Country field is required!","!");</script>');
      $("#ConSelect").focus();
    }  else if (state=="") {
      $('.msg').append('<script type="text/javascript"> AddToast("danger","State field is required","!");</script>');
      $("#stateSelect").focus();
    } else if (city=="") {
      $('.msg').append('<script type="text/javascript"> AddToast("danger","City field is required!","!");</script>');
      $("#city").focus();
    } else if (citydes=="") {
      $('.msg').append('<script type="text/javascript"> AddToast("danger","City description field is required!","!");</script>');
      $("#citydes").focus();
    } else if (citynearby=="") {
      $('.msg').append('<script type="text/javascript"> AddToast("danger","City near by places field is required!","!");</script>');
      $("#citynearby").focus();
    } else if (hotel_facilties=="") {
      $('.msg').append('<script type="text/javascript"> AddToast("danger","Hotel facilities field is required!","!");</script>');
      a$("#hotel_facilties").focus();
    } else if (room_facilties1=="") {
      $('.msg').append('<script type="text/javascript"> AddToast("danger","Room facilities field is required!","!");</script>');
      $("#room_facilties1").focus();
    // } else if (room_aminities=="") {
    //   $('.msg').append('<script type="text/javascript"> AddToast("danger","Room aminities field is required!","!");</script>');
    //   $("#chip1").focus();
    // } else if (keywords=="") {
    //   $('.msg').append('<script type="text/javascript"> AddToast("danger","Keywords field is required!","!");</script>');
    //   $("#chip2").focus();
    } else if (hotel_description=="") {
      $('.msg').append('<script type="text/javascript"> AddToast("danger","Hotel description field is required!","!");</script>');
      $("#hotel_description").focus();
    } else if (total_no_of_rooms=="") {
      $('.msg').append('<script type="text/javascript"> AddToast("danger","No of Rooms field is required!","!");</script>');
      $("#total_no_of_rooms").focus();
    } else if (Website=="") {
      $('.msg').append('<script type="text/javascript"> AddToast("danger","Website field is required!","!");</script>');
      $("#Website").focus();
    } else if (sell_currency=="") {
      $('.msg').append('<script type="text/javascript"> AddToast("danger","Selling Currency field is required!","!");</script>');
      $("#sell_currency").focus();
    } else {
      $("#menu3").addClass("in active")
      $("#menu1").removeClass("in active")
      $("#home").removeClass("in active")
      $("#check").removeClass("in active")
      $(".menu3").addClass("active")
      $(".menu1").removeClass("active")
      $(".home").removeClass("active")
      $(".check").removeClass("active")
    }
  });
  $("#hotel_tab_2_prev").click(function() {
    $("#menu1").removeClass("in active")
    $("#check").removeClass("in active")
    $("#home").addClass("in active")
    $(".menu1").removeClass("active")
    $(".check").removeClass("active")
    $(".home").addClass("active")
  });
  $("#hotel_tab_4").click(function() {
        $("#menu4").addClass("in active")
        $("#menu3").removeClass("in active")
        $("#menu2").removeClass("in active")
        $("#menu1").removeClass("in active")
        $("#home").removeClass("in active")
        $("#check").removeClass("in active")
        $(".menu4").addClass("active")
        $(".menu3").removeClass("active")
        $(".menu2").removeClass("active")
        $(".menu1").removeClass("active")
        $(".home").removeClass("active")
        $(".check").removeClass("active")
      //}
  });
  $("#hotel_tab_4_prev").click(function() {
    $("#menu1").addClass("in active")
    $("#menu4").removeClass("in active")
    $("#menu3").removeClass("in active")
    $("#home").removeClass("in active")
    $("#check").removeClass("in active")
    $(".menu1").addClass("active")
    $(".menu4").removeClass("active")
    $(".menu3").removeClass("active")
    $(".home").removeClass("active")
    $("#check").removeClass("active")
  });
  $("#hotel_tab_5").click(function() {
      $("#menu5").addClass("in active")
      $("#menu4").removeClass("in active")
      $("#menu3").removeClass("in active")
      $("#menu2").removeClass("in active")
      $("#menu1").removeClass("in active")
      $("#home").removeClass("in active")
      $("#check").removeClass("in active")
      $(".menu5").addClass("active")
      $(".menu4").removeClass("active")
      $(".menu3").removeClass("active")
      $(".menu2").removeClass("active")
      $(".menu1").removeClass("active")
      $(".home").removeClass("active")
      $("#check").removeClass("active")
  });
  $("#hotel_tab_5_prev").click(function() {
    $("#menu3").addClass("in active")
    $("#menu5").removeClass("in active")
    $("#menu4").removeClass("in active")
    $("#menu2").removeClass("in active")
    $("#menu1").removeClass("in active")
    $("#home").removeClass("in active")
    $("#check").removeClass("in active")
    $(".menu3").addClass("active")
    $(".menu5").removeClass("active")
    $(".menu4").removeClass("active")
    $(".menu2").removeClass("active")
    $(".menu1").removeClass("active")
    $(".home").removeClass("active")
    $("#check").removeClass("active")
  });
   $("#check1").click(function(){
    if($(this).is(':checked')){     
    var sales_fname = $(".sales_fname").val();
    var sales_lname = $(".sales_lname").val();
    var sales_phone = $(".sales_phone").val();
    var sales_mobile = $(".sales_mobile").val();
    var sales_mail = $(".sales_mail").val();
    var sales_address = $(".sales_address").val();
    var sales_password=$(".sales_password").val();
    $(".revenue_fname").val(sales_fname);
    $(".revenue_lname").val(sales_lname);
    $(".revenue_mail").val(sales_mail);
    $(".revenue_phone").val(sales_phone);
    $(".revenue_mobile").val(sales_mobile);
    $(".revenue_address").val(sales_address);
    $(".revenue_password").val(sales_password);
    // document.getElementById("revenue_address").value("sales_address");
    }
  });
  $("#check2").click(function(){
    if($(this).is(':checked')){
    var revenue_fname = $(".revenue_fname").val();
    var revenue_lname = $(".revenue_lname").val();
    var revenue_mail = $(".revenue_mail").val();
    var revenue_phone = $(".revenue_phone").val();
    var revenue_mobile = $(".revenue_mobile").val();
    var revenue_address = $(".revenue_address").val();
    var revenue_password = $(".revenue_password").val();
    $(".contract_fname").val(revenue_fname);
    $(".contract_lname").val(revenue_lname);
    $(".contract_mail").val(revenue_mail);
    $(".contract_phone").val(revenue_phone);
    $(".contract_mobile").val(revenue_mobile);
    $(".contracts_address").val(revenue_address);
    $(".contract_password").val(revenue_password);
    }
  });
  $("#check3").click(function(){
    if($(this).is(':checked')){
    var contract_fname = $(".contract_fname").val();
    var contract_lname = $(".contract_lname").val();
    var contract_mail = $(".contract_mail").val();
    var contract_phone = $(".contract_phone").val();
    var contract_mobile = $(".contract_mobile").val();
    var contracts_address = $(".contracts_address").val();
    var contract_password = $(".contract_password").val();
    $(".finance_fname").val(contract_fname);
    $(".finance_lname").val(contract_lname);
    $(".finance_mail").val(contract_mail);
    $(".finance_phone").val(contract_phone);
    $(".finance_mobile").val(contract_mobile);
    $(".finance_address").val(contracts_address);
    $(".finance_password").val(contract_password);
    }
  });
  $("#hotel_tab_6").click(function() {
    var sales_fname = $(".sales_fname").val();
    var sales_phone = $(".sales_phone").val();
    var sales_mobile = $(".sales_mobile").val();
    var sales_mail = $(".sales_mail").val();
    var sales_address = $(".sales_address").val();
    var sales_password  = $(".sales_password").val();
    var revenue_fname = $(".revenue_fname").val();
    var revenue_mail = $(".revenue_mail").val();
    var revenue_phone = $(".revenue_phone").val();
    var revenue_mobile = $(".revenue_mobile").val();
    var revenue_address = $(".revenue_address").val();
    var contract_fname = $(".contract_fname").val();
    var contract_mail = $(".contract_mail").val();
    var contract_phone = $(".contract_phone").val();
    var contract_mobile = $(".contract_mobile").val();
    var contracts_address = $(".contracts_address").val();
    var finance_fname = $(".finance_fname").val();
    var finance_mail = $(".finance_mail").val();
    var finance_phone = $(".finance_phone").val();
    var finance_mobile = $(".finance_mobile").val();
    var finance_address = $(".finance_address").val();
    var finance_password = $(".finance_password").val();
    var revenue_password  = $(".revenue_password").val();
    var contract_password  = $(".contract_password").val();
      if (sales_fname=="") {
        $('.msg').append('<script type="text/javascript"> AddToast("danger","Sales Team First name field is required!","!");</script>');
        $("#sales_fname").focus();
      }  else if (sales_phone=="") {
        $('.msg').append('<script type="text/javascript"> AddToast("danger","Sales Team Phone field is required!","!");</script>');
        $("#sales_phone").focus();
      } else if (sales_mobile=="") {
        $('.msg').append('<script type="text/javascript"> AddToast("danger","Sales Team Mobile field is required!","!");</script>');
        $("#sales_mobile").focus();
      } else if (sales_mail=="") {
        $('.msg').append('<script type="text/javascript"> AddToast("danger","Sales Team Email field is required!","!");</script>');
        $("#sales_mail").focus();
      } else if (sales_address=="") {
        $('.msg').append('<script type="text/javascript"> AddToast("danger","Sales Team Address field is required!","!");</script>');
        $("#sales_address").focus();
      } else if (sales_password=="") {
        $('.msg').append('<script type="text/javascript"> AddToast("danger","Sales Team Password field is required!","!");</script>');
        $("#sales_password").focus();
      }else if (revenue_fname=="") {
        $('.msg').append('<script type="text/javascript"> AddToast("danger","Revenue Team First name field is required!","!");</script>');
        $("#revenue_fname").focus();
      }  else if (revenue_phone=="") {
        $('.msg').append('<script type="text/javascript"> AddToast("danger","Revenue Team Phone field is required!","!");</script>');
        $("#revenue_phone").focus();
      } else if (revenue_mobile=="") {
        $('.msg').append('<script type="text/javascript"> AddToast("danger","Revenue Team Mobile field is required!","!");</script>');
        $("#revenue_mobile").focus();
      } else if (revenue_mail=="") {
        $('.msg').append('<script type="text/javascript"> AddToast("danger","Revenue Team Email field is required!","!");</script>');
        $("#revenue_mail").focus();
      } else if (revenue_address=="") {
        $('.msg').append('<script type="text/javascript"> AddToast("danger","Revenue Team Address field is required!","!");</script>');
        $("#revenue_address").focus();
      } else if (contract_fname=="") {
        $('.msg').append('<script type="text/javascript"> AddToast("danger","Reservation team First name field is required!","!");</script>');
        $("#contract_fname").focus();
      }  else if (contract_phone=="") {
        $('.msg').append('<script type="text/javascript"> AddToast("danger","Reservation team Phone field is required!","!");</script>');
        $("#contract_phone").focus();
      } else if (contract_mobile=="") {
        $('.msg').append('<script type="text/javascript"> AddToast("danger","Reservation team Mobile field is required!","!");</script>');
        $("#contract_mobile").focus();
      } else if (contract_mail=="") {
        $('.msg').append('<script type="text/javascript"> AddToast("danger","Reservation team Email field is required!","!");</script>');
        $("#contract_mail").focus();
      } else if (contracts_address=="") {
        $('.msg').append('<script type="text/javascript"> AddToast("danger","Reservation team Address field is required!","!");</script>');
        $("#contracts_address").focus();
      } else if (finance_fname=="") {
        $('.msg').append('<script type="text/javascript"> AddToast("danger","Finance Team First name field is required!","!");</script>');
        $("#finance_fname").focus();
      } else if (finance_phone=="") {
        $('.msg').append('<script type="text/javascript"> AddToast("danger","Finance Team Phone field is required!","!");</script>');
        $("#finance_phone").focus();
      } else if (finance_mobile=="") {
        $('.msg').append('<script type="text/javascript"> AddToast("danger","Finance Team Mobile field is required!","!");</script>');
        $("#finance_mobile").focus();
      } else if (finance_mail=="") {
        $('.msg').append('<script type="text/javascript"> AddToast("danger","Finance Team Email field is required!","!");</script>');
        $("#finance_mail").focus();
      } else if (finance_address=="") {
        $('.msg').append('<script type="text/javascript"> AddToast("danger","Finance Team Address field is required!","!");</script>');
        $("#finance_address").focus();
      }else if (revenue_password=="") {
        $('.msg').append('<script type="text/javascript"> AddToast("danger","Revenue Team Password field is required!","!");</script>');
        $("#revenue_password").focus();
      }else if (contract_password=="") {
        $('.msg').append('<script type="text/javascript"> AddToast("danger","Reservation Team Password field is required!","!");</script>');
        $("#contract_password").focus();
      }else if (finance_password=="") {
        $('.msg').append('<script type="text/javascript"> AddToast("danger","Finance Team Password field is required!","!");</script>');
        $("#finance_password").focus();
      }
      else {
        //addHotelSubmitfunc();
        $("#new_hotel_form").submit();
      }
  });
//  function addHotelSubmitfunc() {
//         $.ajax({
//             dataType: 'json',
//             url: base_url+'HotelSupplier/add_new_hotel',
//             cache: false,
//             data : $("#new_hotel_form").serialize(),
//             success: function (response) {
//               $(".msg").append('<script type="text/javascript"> AddToast("success","Inserted Successfully","!");</script>');
//             }
//           });
// }
  $("#hotel_tab_6_prev").click(function() {
    $("#menu4").addClass("in active")
    $("#menu6").removeClass("in active")
    $("#menu5").removeClass("in active")
    $("#menu3").removeClass("in active")
    $("#menu2").removeClass("in active")
    $("#menu1").removeClass("in active")
    $("#home").removeClass("in active")
    $("#check").removeClass("in active")
    $(".menu4").addClass("active")
    $(".menu5").removeClass("active")
    $(".menu5").removeClass("active")
    $(".menu3").removeClass("active")
    $(".menu2").removeClass("active")
    $(".menu1").removeClass("active")
    $(".home").removeClass("active")
    $("#check").removeClass("active")
  });
  function ValidateImageFileUpload(inputId) {
        var fuData = document.getElementById(inputId);
        var FileUploadPath = fuData.value;

//To check if user upload any file
      
        var Extension = FileUploadPath.substring(
        FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

  if (Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") {

// To Display
          if (fuData.files && fuData.files[0]) {
              var reader = new FileReader();
              reader.onload = function(e) {
                  $('.'+inputId+'preview').attr('src', e.target.result);
              }
              reader.readAsDataURL(fuData.files[0]);
          }

      } 
    }
function deletepopupfun(action,id) {
    $("#delete_id").val(id);
    $("#delete_form").attr("action",action);
    $('#delModal').modal();
  }
function commonDelete() {
    $.ajax({
      dataType: 'json',
      type: "POST",
      url: $("#delete_form").attr("action"),
      data: $("#delete_form").serialize(),
      cache: false,
      success: function (response) {
          close_delete_modal();
          if(response.status=='1') {
             $(".msg").append('<script type="text/javascript"> AddToast("success","Deleted Successfully","!");</script>');
          } else {
             $(".msg").append('<script type="text/javascript"> AddToast("danger","Error Occured","!");</script>');
          }
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
      }
    });
}
function close_delete_modal() {
   $('.close').trigger('click');
}
function ConSelect() {
    var hiddenState = $("#hiddenSt").val();
    $('#state option').remove();
      var ConSelect = $('#con').val();
      $.ajax({
          url: base_url+'/HotelSupplier/StateSelect?Conid='+ConSelect,
          type: "POST",
          data:{},
          dataType: "json",
          success:function(data) {
            $('#state').append('<option value="">Select</option>');
              $.each(data, function(i, v) {
                  if (hiddenState==v.id) {
                    selected = 'selected';
                  } else {
                    selected = '';
                  }
                  $('#state').append('<option '+selected+' value="'+ v.id +'">'+ v.name +'</option>');
              });
          }
      });
      // CitySelectFun();
}
function room_add_fun() {
    var room_name     = $("#room_name").val();
    var room_type     = $("#room_type").val();
    var room_facilties = $("#room_facilties").val();
    var occupancy = $("#occupancy").val();
    var occupancy_child = $("#occupancy_child").val();
    if (room_name=="") {
      $(".msg").append('<script type="text/javascript"> AddToast("danger","Room name field is required","!");</script>');
      $("#room_name").focus();
    } else if(room_type=="") {
      $(".msg").append('<script type="text/javascript"> AddToast("danger","Room type field is required","!");</script>');
      $("#room_type").focus();
    }  else if(room_facilties=="") {
      $(".msg").append('<script type="text/javascript"> AddToast("danger","Room facilities field is required","!");</script>');
      $("#room_facilties").focus();
    } else if(occupancy==null) {
      $(".msg").append('<script type="text/javascript"> AddToast("danger","Occupancy Adult field is required","!");</script>');
      $("#room_facilties").focus();
    } else if(occupancy_child==null) {
      $(".msg").append('<script type="text/javascript"> AddToast("danger","Occupancy Child field is required","!");</script>');
      $("#room_facilties").focus();
    } else {
      if ($("#room_id").val()!="") {
        $('.yourmodalid').trigger('click');
      } else {
        $(".msg").append('<script type="text/javascript"> AddToast("success","Inserted Successfully","!");</script>');
        $("#allotement_form").attr('action',base_url+'hotelsupplier/add_room');
        $("#allotement_form").submit();
      }  
    }
}
function ValidateFileUpload() {
        var fuData = document.getElementById('room_image');
        var FileUploadPath = fuData.value;

//To check if user upload any file
      
        var Extension = FileUploadPath.substring(
        FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

if (Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") {

// To Display
          if (fuData.files && fuData.files[0]) {
              var reader = new FileReader();
              reader.onload = function(e) {
              }

              reader.readAsDataURL(fuData.files[0]);
          }

      } 
//The file upload is NOT an image
else {
      error = "Photo only allows file types of JPG, JPEG and BMP. ";
      color = "red";
      $("#room_image").val("");
      $(".msg").append('<script type="text/javascript"> AddToast("danger","Photo only allows file types of JPG, JPEG and BMP. ","!");</script>');
      }
}
function room_update_fun(){
    if ($("#room_id").val()!="") {
      $(".msg").append('<script type="text/javascript"> AddToast("success","Updated Successfully","!");</script>');
    }
    $("#allotement_form").attr('action',base_url+'hotelsupplier/add_room');
    $("#allotement_form").submit();
}
function commonDeleteroom() {
    $.ajax({
      dataType: 'json',
      type: "POST",
      url: $("#delete_form").attr("action"),
      data: $("#delete_form").serialize(),
      cache: false,
      success: function (response) {
          close_delete_modal();
          if(response.status=='1') {
             $(".msg").append('<script type="text/javascript"> AddToast("success","Delete Request Send Successfully","!");</script>');
          } else {
             $(".msg").append('<script type="text/javascript"> AddToast("danger","Error Occured","!");</script>');
          }
           var hotelid = $("#hotel-list li a.active").attr('id');
            var room_table = $('#room_table').dataTable({
          "bDestroy": true,
          "ajax": {
              url : base_url+'HotelSupplier/hotel_room_list/'+hotelid,
              type : 'GET'
          },
       "fnDrawCallback": function(settings){
          $('[data-toggle="tooltip"]').tooltip();          
        }
    });
      }
    });
}
 $('#contract_submit').click(function () {
    var contractmarkup = $("#contractmarkup").val();
    var markup = $("#markup").val();
    var markup_type = $("#markup_type").val();
    var bookingcode = $("#bookingcode").val();
    if(contractmarkup=="")
    {
      $(".msg").append('<script type="text/javascript"> AddToast("danger","Amount field is required","!");</script>');
      $("#contractmarkup").focus();
    } 
    else if(markup=="") 
    {
      $(".msg").append('<script type="text/javascript"> AddToast("danger","Markup field is required","!");</script>');
      $("#markup").focus();
    }
    else if(bookingcode=="")
    {
      $(".msg").append('<script type="text/javascript"> AddToast("danger","Booking Code field is required","!");</script>');
      $("#bookingcode").focus();
    } else if(markup_type=="") {
      $(".msg").append('<script type="text/javascript"> AddToast("danger","Markup Type field is required","!");</script>');
      $("#markup_type").focus();
    }
    else {
       $(".msg").append('<script type="text/javascript"> AddToast("success","Contract added successfully","!");</script>');
       $("#add_contract").attr('action',base_url+'hotelsupplier/add_contract');
       $("#add_contract").submit();
     }
   });
  $('#allotment-submit').click(function () {
    var contractid = $("#contractid").val();
    var room = $("#room").val();
    var allotment = $("#allotment").val();
    var price = $("#price").val();
    var cutoff = $("#cutoff").val();
    var from_date = $("#bulk-alt-fromDate").val();
    var to_date = $("#bulk-alt-toDate").val();
    var dayss = [];
    $("input:checkbox[name=bulk-alt-days]:checked").each(function(){
     dayss.push($(this).val());
    });
    if(room=="") 
    {
      $(".msg").append('<script type="text/javascript"> AddToast("danger","Room field is required","!");</script>');
      $("#room").focus();
    }
    else if(from_date=="")
    {
      $(".msg").append('<script type="text/javascript"> AddToast("danger","From date field is required","!");</script>');
      $("#bulk-alt-fromDate").focus();
    }
    else if(to_date=="")
    {
      $(".msg").append('<script type="text/javascript"> AddToast("danger","To date field is required","!");</script>');
      $("#bulk-alt-toDate").focus();
    // }
    // else if(dayss=="")
    // {
    //   $(".msg").append('<script type="text/javascript"> AddToast("danger","Days field is required","!");</script>');
    // }
    // else if(allotment=="")
    // {
    //   $(".msg").append('<script type="text/javascript"> AddToast("danger","Allotment field is required","!");</script>');
    //   $("#allotment").focus();
    // } 
    // else if(price=="") 
    // {
    //   $(".msg").append('<script type="text/javascript"> AddToast("danger","Price field is required","!");</script>');
    //   $("#price").focus();
    // }
    // else if(cutoff=="")
    // {
    //   $(".msg").append('<script type="text/javascript"> AddToast("danger","Cutoff field is required","!");</script>');
    //   $("#cutoff").focus();
    } else {
      $.ajax({
      dataType: 'json',
      type: "POST",
      url: base_url+'hotelsupplier/add_allotment',
      data:$("#add_allotment").serialize(),
      cache: false,
      success: function (response) {
          close_delete_modal();
          $(".pre-page").addClass("hide");
          if(response.status=='1') {
            $(".msg").append('<script type="text/javascript"> AddToast("success","Allotment added successfully","!");</script>');
          } else {
            $(".msg").append('<script type="text/javascript"> AddToast("danger","Error Occured","!");</script>');
          }
          loadallotment(contractid);  
        }
      });
     }
   });
function closeoutUpdate(value,contractid,roomid,hotelid,ndate) {
    var closeval = $("."+value).find('span').text();
    if (closeval=="OFF") {
      $("."+value).html('<span class="text-success">ON</span>');
      val = 'Open';
      $("."+value).closest('td').removeClass('stopsale');
    } else {
      $("."+value).html('<span class="text-danger">OFF</span>');
      val = 'Close';
      $("."+value).closest('td').addClass('stopsale');
    }
    $.ajax({
      dataType: 'json',
      type: "POST",
      url: base_url+'hotelsupplier/closeoutupdate?closedout='+val+'&contractid='+contractid+'&roomid='+roomid+'&hotelid='+hotelid+'&ndate='+ndate,
      cache: false,
      success: function (response) {
          if(response.status=='1') {
             $(".msg").append('<script type="text/javascript"> AddToast("success","Updated Successfully","!");</script>');
          } else {
             $(".msg").append('<script type="text/javascript"> AddToast("danger","Error Occured","!");</script>');
          }
      }
    });
}
function updateStatus(hotelid) {
  var status = $("#hotelid"+hotelid).val();
  if($("#hotelid"+hotelid).is(':checked')) { 
    var  flag = '1';
  } else {
    var flag = '0';
  }
  $.ajax({
      dataType: 'json',
      type: "Post",
      url: base_url+'hotelsupplier/updatehotelStatus?hotelid='+hotelid+'&value='+flag,
      success: function(data) {
        $(".msg").append('<script type="text/javascript"> AddToast("success","Updated Successfully","!");</script>');
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
      }
  });
}
