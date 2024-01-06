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


