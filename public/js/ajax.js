$(document).ready(function(){

    $.ajax({
		type: 'GET',
		url: baseUrl + '/admin/vesti/search',
		success: function(data, xhr){
			console.log(data);
			console.log(xhr);
			showNews(data);
			
		} , 
		error: function(xhr, status, error){
			console.log(xhr);
			console.log(status);
			console.log(error);
		}

	});

    $('#btnSearch').click(function(){
        var uneto=$('input[name="search"]').val();
        $.ajax({
            type:'POST',
            url:baseUrl+'/admin/vesti',
            data:{unos:uneto,_token:token},
            success:function(data,xhr){
                console.log(data);
                console.log(xhr);
                showNews(data);
            },
            error:function(xhr,status,error){
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });        
    });



 function showNews(data){
 	var postsHtml = "";
 	$.each(data, function(key, value){
         postsHtml +=' <table class="table table-hover" border="1 solid #FFA489">'+
         '  <thead class="thead-dark">'+
         '<tr>'
        '<th class="tg-s6z2"  collspan="3"><b>ID</b></th>'+
                '<th class="tg-s6z2"  collspan="3"><b>Naslov</b></th>'+
               ' <th class="tg-s6z2"  collspan="3"><b>Kategorija</b></th>'+
                '<th class="tg-obcv" collspan="3"><b>Slika</b></th>'	+			
               
          ' </tr> '+
            '</thead>'+
           
           '<tr>'+
           '<td class="tg-s6z2"  collspan="3">'+value.id_news+'</td>'+
          '<td class="tg-s6z2"  collspan="3">'+value.title+'</td>'+
           '<td class="tg-s6z2"  collspan="3">'+value.naziv+'</td>'+
           '<td class="tg-s6z2"  collspan="3"><img src='+baseUrl + '/'+value.image+' class="rounded-circle" height="100px" width="100px"></td>'+
            '</tr>'+
             '</table>';
	});

	$('#postovi').html(postsHtml);
}























});



 </div> 

<script> 

$(document).ready(function(){ 

fetch_customer_data(); 

function fetch_customer_data(query = '') 

{ 

  $.ajax({ 

   url:"{{ route('live_search.action') }}", 

   method:'GET', 

   data:{query:query}, 

   dataType:'json', 

   success:function(data) 

   { 

    $('tbody').html(data.table_data); 

    $('#total_records').text(data.total_data); 

   } 

  }) 

} 

$(document).on('keyup', '#search', function(){ 

  var query = $(this).val(); 

  fetch_customer_data(query); 

}); 

$(document).on('click', '.delete', function(){ 

  var id = $(this).attr("id"); 

  if(confirm("Are you sure you want to delete this records?")) 

  { 

   $.ajax({ 

    url:"{{ route('deleteUser') }}", 

    method:"POST", 

    data:{id:id, _token:token}, 

    success:function(data) 

    { 

     $('#message').html(data); 

     fetch_customer_data(); 

    } 

   }); 

} 

}); 

}); 

</script> 