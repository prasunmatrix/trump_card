var BASE_URL  = 'http://localhost/mridayaitservices/trump_card/';
var base_url  = window.location.origin;
var host      = window.location.host;
var pathArray = window.location.pathname.split('/');

//popup message like alert
function openModel(message)
{
    $('body #PopupMessages').html('');
    $('body #PopupMessages').append('<div class="modal fade" id="MessageModal" tabindex="-1" role="dialog" aria-labelledby="ExampleModalLongTitle" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body text">'+message+'</div><div class="modal-footer"><button type="button" class="btn btn-danger" data-dismiss="modal">Close</button></div></div></div></div>');
    $('#MessageModal').modal({show:true});

    setTimeout(function() 
    {
        $('#MessageModal').modal('hide');
    }, 

    3000);
}

$( function() {
  $(".date").datepicker({
    changeMonth: true,
    changeYear: true,
  });
});

//========================================MEMBER FILTER====================================================//

$(document).on('change', '#mem_filter', function (e) {
    var value = $('#mem_filter').val();
    var url = BASE_URL+'Members/ajaxSearchData';
    $.ajax({
        type:'GET',
        url:url,
        data:{value:value},
        success: function(data)
        { 
            if(data !='')
            {                
                $('#Ajax_View').html(data); 
                window.history.replaceState({foo: 'bar'}, '', BASE_URL+"Members/all_members?members="+value);
                location.reload();
                return true;
            }
            else
            {
                openModel("No data found");
                return false;
            }        
        }
    });
});

//========================================MEMBER FILTER BY DATE====================================================//

$(document).on('click', '#date_filter', function (e) {
    var from_date = $('#from_date').val();
    var to_date = $('#to_date').val();
    if(from_date=="")
    {
      openModel("Please insert from date");
      $('#from_date').focus();
      return false;
    }
    else if(to_date=="")
    {
      openModel("Please insert to date");
      $('#to_date').focus();
      return false;
    }
    else if(from_date>to_date)
    {
      openModel("From date should not be greater than end date");
      $('#from_date').val('');
      $('#to_date').val('');
      $('#from_date').focus();
    }
    else
    {
      var url = BASE_URL+'Members/ajaxSearchDataByDate';
      $.ajax({
          type:'GET',
          url:url,
          data:{from_date:from_date,to_date:to_date},
          success: function(data)
          { 
           //console.log(data);
              if(data !='')
              {              
                $('#Ajax_View').html(data); 
                window.history.replaceState({foo: 'bar'}, '', BASE_URL+"Members/all_members?fromDate="+from_date+"&toDate="+to_date);
                location.reload();
                return true;
              }
              else
              {
                openModel("No data found");
                return false;
              }        
          }
      });
    }
});
//========================================MEMBER FILTER BY DATE====================================================//

//========================================STATUS CHANGE MESSAGE====================================================//
function statusChange()
{
  var answer;
  answer = confirm('Do you want to change status?');
  if (answer == true )
  {
  return true;
  }
  else
  {
  return false;
  }
}
//========================================STATUS CHANGE MESSAGE====================================================//
//========================================SUBCATEGORY LIST FROM CATEGORY===========================================//
$(document).on('change', '#Category_Id', function (e) {

    var category = $('#Category_Id').val();
    var url = BASE_URL+'Cardtype/get_subcategory';        
    var dataString = "category="+category;
    
    $.ajax({
        type: "POST",
        url: url,
        data: dataString,
        cache: false,
        success: function(result) 
        {
            if(result.status == 1) 
            {                   
              var subcategory = result.subcategory;
              
              var optHtml = '';

              optHtml += '<option value="">Select Subcategory</option>';

              for(var i=0;i<subcategory.length;i++)
              {
                  optHtml += '<option value="'+subcategory[i].subcategoryid+'">'+subcategory[i].subcategory_name+'</option>';
              }

              $('#subcategory_id').html(optHtml);

              return true;
            } 
            else 
            {
              $('#Category_Id').val('');

              $('#subcategory_id').html('');
              $('#cardtype_id').html('');
              openModel("No subcategory found for this category");

              return false;
            }
        }
    });
});
//========================================SUBCATEGORY LIST FROM CATEGORY===========================================//
//========================================CARDTYPE LIST FROM SUBCATEGORY===========================================//
$(document).on('change', '.subcategory_id', function (e) {
    var subcategory = $('.subcategory_id').val();
    var url = BASE_URL+'Attribute/get_cardtype';        
    var dataString = "subcategory="+subcategory;
    
    $.ajax({
        type: "POST",
        url: url,
        data: dataString,
        cache: false,
        success: function(result) 
        {
            if(result.status == 1) 
            {                   
              var cardtype = result.cardtype;
              
              var optHtml = '';

              optHtml += '<option value="">Select Card Type</option>';

              for(var i=0;i<cardtype.length;i++)
              {
                  optHtml += '<option value="'+cardtype[i].cardtypeid+'">'+cardtype[i].card_type+'</option>';
              }

              $('#cardtype_id').html(optHtml);

              return true;
            } 
            else 
            {
              $('#Category_Id').val('');
              $('.subcategory_id').val('');
              $('#cardtype_id').html('');
              openModel("No card type found for this subcategory");
              return false;
            }
        }
    });
});
//========================================CARDTYPE LIST FROM SUBCATEGORY===========================================//
//========================================ATTRIBUTE LIST FROM CARD TYPE===========================================//
// $(document).ready(function(){
//   get_details();
//   function get_details()
//   {
//     var cardtypeId = $('.cardtypeId').val();
//     var url = BASE_URL+'Cards/get_attribute';        
//     var dataString = "cardtypeId="+cardtypeId;
      
//     $.ajax({
//       type: "POST",
//       url: url,
//       data: dataString,
//       cache: false,
//       success: function(result) 
//       {
//         if(result!= "") 
//         {                  
//             $('#attribute_data').html(result);

//             $('#addcard').prop('disabled', false);

//             return true;
//         } 
//         else
//         {
//             $('#attribute_data').html('<tr><td colspan="2" align="center" style="color:#ff0000;font-weight: bold;"">NO DATA FOUND</td></tr>');

//             $('#addcard').prop('disabled', true);

//             return false;
//         }
//       }
//     });
//   }
//   $('.cardtypeId').change(function(){
//     get_details();
//   });
// });

$(document).on('change', '.cardtypeId', function(e){
  var cardtypeId = $('.cardtypeId').val();
  //alert(cardtypeId);
  var url = BASE_URL+'Cards/get_attribute';        
  var dataString = "cardtypeId="+cardtypeId;
    
  $.ajax({
    type: "POST",
    url: url,
    data: dataString,
    cache: false,
    success: function(result) 
    {
      if(result!= "") 
      {                  
        $('#attribute_data').html(result);
        $('#addcards').prop('disabled', false);
        return true;
      } 
      else 
      {
        //openModel("No card type found for this subcategory");
        $('#attribute_data').html("<tr><td colspan='2' align='center' style='color:#ff0000;font-weight: bold;'>No data found!</td></tr>");
        $('#addcards').prop('disabled', true);
        return false;
      }
    }
  });
});
//========================================ATTRIBUTE LIST FROM CARD TYPE===========================================//

//========================================CARDS LIST FROM CARD TYPE===========================================//
$(document).on('change', '.cardtypeId', function (e) {
  var cardtypeId = $('.cardtypeId').val();
  //alert(cardtypeId);
  var url = BASE_URL+'Cards/get_carddetails';        
  var dataString = "cardtypeId="+cardtypeId;
    
  $.ajax({
    type: "POST",
    url: url,
    data: dataString,
    cache: false,
    success: function(result) 
    {
      if(result.status == 1) 
      {                   
        var carddetails = result.carddetails;
        
        var optHtml = '';

        optHtml += '<option value="">Select Cards Details</option>';

        for(var i=0;i<carddetails.length;i++)
        {
            optHtml += '<option value="'+carddetails[i].carddetailsid+'">'+carddetails[i].card_name+'</option>';
        }

        $('#carddetails_id').html(optHtml);

        return true;
      } 
      else 
      {
        $('#Category_Id').val('');
        $('.subcategory_id').val('');
        $('.cardtypeId').val('');
        $('#carddetails_id').html('');
        openModel("No carddetails found for this card type");
        return false;
      }
    }
  });
});
//========================================ATTRIBUTE LIST FROM CARD TYPE===========================================//
//===========================================CREATE URL SLUG======================================================//
$("#page_title").keyup(function(){
  var Text = $(this).val();
  Text = Text.toLowerCase();
  Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
  $("#page_slug").val(Text);        
});

//===========================================CREATE URL SLUG======================================================//
//======================================SUMMERNOTE IMAGE UPLOAD TO DIRECTORY=====================================//

$(document).ready(function() {
  $("#summernote").summernote({
    placeholder: 'enter page content here...',
      height: 300,
       callbacks: {
      onImageUpload : function(files, editor, welEditable) {

         for(var i = files.length - 1; i >= 0; i--) {
                 sendFile(files[i], this);
        }
      }
    }
    });
});

function sendFile(file, el) {
var form_data = new FormData();
form_data.append('file', file);
var url = BASE_URL+'Managecms/uploadSummernoteImage';
$.ajax({
    data: form_data,
    type: "POST",
    url: url,
    cache: false,
    contentType: false,
    processData: false,
    success: function(response) {
        $(el).summernote('editor.insertImage', response);
    }
});
}

//======================================SUMMERNOTE IMAGE UPLOAD TO DIRECTORY=====================================//
//======================================TOURNAMENT LIST FROM SUBCATEGORY=========================================//
$(document).on('change', '.subcategoryId', function (e) {
    var subcategory = $('.subcategoryId').val();
    var url = BASE_URL+'Point/get_tournament';        
    var dataString = "subcategory="+subcategory;
    
    $.ajax({
        type: "POST",
        url: url,
        data: dataString,
        cache: false,
        success: function(result) 
        {
            if(result.status == 1) 
            {                   
              var tournament = result.tournament;
              
              var optHtml = '';

              optHtml += '<option value="">Select Tournament</option>';

              for(var i=0;i<tournament.length;i++)
              {
                  optHtml += '<option value="'+tournament[i].tournamentid+'">'+tournament[i].tournament_name+'</option>';
              }

              $('#tournament_id').html(optHtml);

              return true;
            } 
            else 
            {
              $('#Category_Id').val('');
              $('.subcategoryId').val('');
              $('#tournament_id').html('');
              openModel("No tournament found for this subcategory");
              return false;
            }
        }
    });
});
//======================================TOURNAMENT LIST FROM SUBCATEGORY=========================================//
//=====================POINT TENURE FROM DATE  SHOULD NOT BE GREATER THAN END DATE==============================//
$(document).on('click', '#addpoint', function (e) {
  var formDate = $('#formDate').val();
  var toDate = $('#toDate').val();
  if(formDate>toDate)
  {
    openModel("From date should not be greater than end date");
    $('#formDate').val('');
    $('#toDate').val('');
    $('#formDate').focus();
    return false;
  }
  else
  {
    return true;
  }
});

$(document).on('click', '#editpoint', function (e) {
  var formDate = $('#formDate').val();
  var toDate = $('#toDate').val();
  if(formDate>toDate)
  {
    openModel("From date should not be greater than end date");
    setTimeout(function() {
    location.reload();
    }, 2000);
    $('#formDate').focus();
    return false;
  }
  else
  {
    return true;
  }
}); 
//=====================POINT TENURE FROM DATE  SHOULD NOT BE GREATER THAN END DATE==============================//
//=================================MODAL NOT OPEN AFTER REPLY ALREADY DONE=====================================//
$(document).on('click', '#reply', function (e){
  openModel("You already reply of this message");
 }); 
//=================================MODAL NOT OPEN AFTER REPLY ALREADY DONE=====================================//