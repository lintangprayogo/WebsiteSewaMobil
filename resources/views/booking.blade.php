<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Booking</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
          <meta name="csrf-token" content="{{ csrf_token() }}">


    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="{{URL::to('/dashboard')}}">Rental Mobil</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            >

         @include('setting')
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
               @include("slide")
            </div>
            <div id="layoutSidenav_content">
                  <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Bookings</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Bookings</li>
                        </ol>
                      
                        <button class="btn btn-primary" style="margin-bottom: 10px" data-toggle="modal" data-target="#formModal" id="add-Booking">Add</button>
                        
                    <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Booking Data</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                              <tr>
                                                <th>Renter</th>
                                                <th>Brand</th>
                                                <th>Police Number</th>
                                                <th>Start</th>
                                                <th>End</th>
                                                <th>Total</th>
                                                <th width="15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Renter</th>
                                                <th>Brand</th>
                                                <th>Police Number</th>
                                                <th>Start</th>
                                                <th>End</th>
                                                <th>Total</th>
                                                <th width="15%">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        
                                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

                  <!-- Modal -->
              <div class="modal fade" id="formModal" role="dialog">
                <div class="modal-dialog">
                <form method="post" enctype="multipart/form-data" id="BookingForm">
                       <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="form-title">Add Booking</h4>
                    </div>
                    <div class="modal-body">
                      <input type="hidden" name="id"  id="booking-id">     

                       
                  
             
                      <div class="form-group">
                        <label for="Booking">Customer Email:</label>
                        <input type="email" class="form-control" id="email" required="required" name="email" >
                      </div>
                      <div class="form-group">
                        <label for="Booking">Select Brand:</label>

                       <select id="brands" name="brand_id" class="form-control" onchange="calculate()" required="required" >
                        <option value="">Select Brand</option>
                         @foreach ($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                         @endforeach

                       </select>
                      

                      </div>

                    <div class="form-group">
                        <label for="Booking">Start Rent:</label>
                   <input type="date" name="start_date" required="required" class="form-control"  id="start_date"  onchange="changeDate()">
                      </div>
                    <div class="form-group">
                        <label for="Booking">End Rent :</label>
                   <input type="date" name="end_date" required="required" class="form-control" id="end_date" onchange="changeDate()">
                      </div>
                  <div class="form-group">
                        <label for="Booking">Total:</label>
                   <input type="hidden" name="total" id="total-input">
                   <input type="number" name="total" required="required" class="form-control" id="total" value="0"  disabled>
                      </div>

              
              
                    </div>

                  
                
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"  value="add-Booking" id="btn-save" >Save</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                    </div>
                  </div>
                  
                </form>
               
                </div>
              </div>
                 <!-- END FORM TAMBAH -->             
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2019</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
       
    
    <!-- Bootstrap core JavaScript-->



  <!-- Core plugin JavaScript-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Custom scripts for all pages-->

  <script src="//code.jquery.com/jquery.js"></script>
   <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script src="js/scripts.js"></script>

        <script type="text/javascript">


minDate();
  $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
          ajax: {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: '{!! route('show.trans') !!}',
                type: 'GET',
            },
        columns: [
    
           { data: 'customer', name: 'customer' },
           { data: 'brand_name', name: 'brand_name' },
           { data: 'police_number', name: 'police_number' },
           { data: 'start', name: 'start' },
           { data: 'end', name: 'end' },
           { data: 'total', name: 'total' },
           {data: 'action', name: 'action', orderable: false},

        ]
        
        }

        );



function calculate(){
  var brands= @json($brands);
  var position=$("#brands").prop('selectedIndex')-1;
  var start_date= new Date($("#start_date").val());
  var end_date=   new Date($("#end_date").val());
  var oneDay  = 24*60*60*1000;
  var diffDays = (end_date.getDate() - start_date.getDate());
  if(position>=0){
     $("#total").val(brands[position].price*diffDays);
     $("#total-input").val(brands[position].price*diffDays);
  }
  
}


function changeDate(){
    var start_date= new Date($("#start_date").val());
    var end_date=   new Date($("#end_date").val());
    var oneDay  = 24*60*60*1000;
    var diffDays = (end_date.getDate() - start_date.getDate());
    var dd = start_date.getDate();
    var mm = start_date.getMonth()+1; //January is 0!
    var yyyy = start_date.getFullYear();
    if(diffDays==0){
      nextDay = yyyy+'-'+mm+'-'+(dd+1);
      $("#end_date").val(nextDay);
      document.getElementById("end_date").setAttribute("min", nextDay);
    }
    calculate();
}


 function minDate() {
   var today = new Date();
   var dd = today.getDate();
   var mm = today.getMonth()+1; //January is 0!
   var yyyy = today.getFullYear();
     if(dd<10){
            dd='0'+dd
        } 
        if(mm<10){
            mm='0'+mm
        } 

    today = yyyy+'-'+mm+'-'+dd;
    nextDay = yyyy+'-'+mm+'-'+(dd+1);
    $("#start_date").val(today);
    $("#end_date").val(nextDay);
    document.getElementById("start_date").setAttribute("min", today);
    document.getElementById("end_date").setAttribute("min", nextDay);
 }


  if ($("#BookingForm").length > 0) {
      $("#BookingForm").validate({
       submitHandler: function(form) {
          var actionType = $('#btn-save').val();
          var actionURL ="{{Route('edit.customer')}}";
          var msg ="Data Berhasil Diubah";
          var msgError ="Data Gagal Diubah";
          var action="Edit"
         if(actionType=="add-Booking"){
         actionURL="{{ route('add.book') }}";
         action="Add"
         }
      $('#btn-save').html('Sending..');
      $.ajax({
          data: new FormData($("#BookingForm")[0]),
          url: actionURL ,
          type: "POST",
          headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
           dataType: "json",
           async: false,
          cache: false,
          contentType: false,
          enctype: 'multipart/form-data',
           processData: false,
          success: function (data) {
         
              $('#btn-save').html('Add');
              var oTable = $('#dataTable').dataTable();
              oTable.fnDraw(false);
              swal("Finish!",data, "success");
              $('#formModal').trigger('click');
          },
          error: function (data) {
             console.log(data);
              swal("Failed!",data.responseText, "error");
              $('#btn-save').html(action);
            }
        });
      }
    })
  }


   /* When click edit Car */
    $('body').on('click', '.edit-trans', function () {
      var id = $(this).data('id');
      $('#BookingForm').trigger("reset");
      $.get('{{ URL::to("Booking/profile") }}/'+id, function (data) {
          $("#customer").val(data.customer); 
          $("#email").val(data.email);
          $("#email").attr('disabled', 'disabled');
          $("#start_date").val(data.start);
          $("#brands").attr("disabled","disabled");
          $("#brands").val(data.brand_id);
          $("#start_date").attr("disabled", "disabled");
          $("#end_date").val(data.end);
          $("#total").val(data.total);
          $("#end_date").setAttribute("min",data.end);
         })
    });

var deleteBook = function(id) { swal({
  title: "Are You Sure?",
  text: "Data Cannot Be Restored!!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
       $.ajax({
            url: "{{URL::to('/Booking/Delete/')}}/"+id,
             type: "delete",
             dataType: 'json',
             headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}"},
          success: function (data) {
              $('#btn-save').html('Add');
              var oTable = $('#dataTable').dataTable();
              oTable.fnDraw(false);
              swal("Finish!",data, "success");
              $('#formModal').trigger('click');
          },
          error: function (data) {

              swal("Failed!",data.responseText, "error");
              $('#btn-save').html(action);
            }
        });
  } 
});
};

var markDone = function(id) { swal({
  title: "Are You Sure To Finish This Booking?",
  text: "Data Cannot Be Changed Anymore!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDone) => {
  if (willDone) {
       $.ajax({
            url: "{{URL::to('/Booking/MarkDone/')}}/"+id,
             type: "post",
             dataType: 'json',
             headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}"},
          success: function (data) {
              $('#btn-save').html('Add');
              var oTable = $('#dataTable').dataTable();
              oTable.fnDraw(false);
              swal("Finish!",data, "success");
              $('#formModal').trigger('click');
          },
          error: function (data) {

              swal("Failed!",data.responseText, "error");
              $('#btn-save').html(action);
            }
        });
  } 
});
};
</script>
 
 
</html>
