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
$(document).on('change', '#category_id', function (e) {
    var categoryId = $('#category_id').val();
    //alert(categoryId);
    var url = BASE_URL+'Cardtype/ajaxSubcategoryData';
    $.ajax({
        type:'POST',
        url:url,
        data:{categoryId:categoryId},
        success: function(data)
        { 
          if(data !='')
          {                 
            var responce = jQuery.parseJSON(data);
            console.log(responce);
            var events = responce.all_subcategory_name;
            //console.log(events);
            if(events!="")
            {
              var optHtml = '';
              optHtml += '<option value="">Select Subcategory</option>';

              for(var i=0;i<events.length;i++)
              {
                  optHtml += '<option value="'+events[i].subcategoryid+'">'+events[i].subcategory_name+'</option>';
              }

              $('#subcategory_id').html(optHtml);
            }
          }
          else
          {
              alert("No event found for this category");
          }        
        }
    });
});
//========================================SUBCATEGORY LIST FROM CATEGORY===========================================//