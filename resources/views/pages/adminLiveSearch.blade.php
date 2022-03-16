@extends('layouts.adminLayout')
@section('title')
ADMIN - search - users
@endsection
@section('center')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="site-section">
      <div class="container">
        <div class="row">
        <div class="col">
   <div class="panel panel-default">
   <div id="message"></div>
    <div class="panel-body">
     <div class="p-5 bg-light">
     <div class="panel-heading">Pretraga korisnika po imenu ili email-u</div>
      <input type="text" name="search" id="search" class="form-control" placeholder="Pretraga ..." />
     </div>
     <div class="table-responsive">
      <h5 align="center">Ukupno registrovanih korisnika : <span id="total_records"></span></h5>
      <table class="table table-striped table-bordered">
       <thead class="thead-dark">
        <tr>
         <th>ID</th>
         <th scope="col">Korisnicko ime</th>
         <th scope="col">Email</th>           
         <th scope="col">Obriši</th> 
        </tr>
       </thead>
       <tbody>
       </tbody>
      </table>
     </div>
    </div>    
   </div>
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
          </div>
        </div>
      </div>
</div>
@endsection