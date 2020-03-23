<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Customer</title>
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
                        <h1 class="mt-4">customers</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">customers</li>
                        </ol>
                      
                        <button class="btn btn-primary" style="margin-bottom: 10px" data-toggle="modal" data-target="#formModal" id="add-customer">Add</button>
                        
                    <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Customer Data</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                              <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>NIK</th>
                                                <th width="15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>NIK</th>
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
                <form method="post" enctype="multipart/form-data" id="customerForm">
                       <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="form-title">Add Customer</h4>
                    </div>
                    <div class="modal-body">
                      <input type="hidden" name="id"  id="customer-id">     
 
                    <div class="form-group">
                        <label for="customer">Name:</label>
                        <input type="text" class="form-control" id="name" required="required" name="name">
                      </div>
             
                      <div class="form-group">
                        <label for="customer">Email:</label>
                        <input type="email" class="form-control" id="email" required="required" name="email">
                      </div>

                    <div class="form-group">
                        <label for="customer">NIK:</label>
                   <input type="number" name="nik" required="required" class="form-control" minlength="16" id="nik">
                      </div>
                  <div class="form-group">
                        <label for="customer">Phone:</label>
                   <input type="text" name="phone" required="required" class="form-control" id="phone">
                      </div>

                    <div class="form-group">
                        <label for="Address">Address:</label>
                           <textarea class="form-control" name="address" class="form-control" id="address">
                             
                           </textarea>
                      </div>

              
                    </div>

                  
                
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"  value="add-customer" id="btn-save" >Save</button>
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

  $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
          ajax: {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: '{!! route('show.customer') !!}',
                type: 'GET',
            },
        columns: [
    
           { data: 'name', name: 'name' },
           { data: 'email', name: 'email' },
           { data: 'phone', name: 'phone' },
           { data: 'address', name: 'address' },
           { data: 'nik', name: 'nik' },
           {data: 'action', name: 'action', orderable: false}

        ]});

 
var deleteCus = function(id) { swal({
  title: "Are You Sure?",
  text: "Data Can,t Be Restored!!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
       $.ajax({
            url: "{{URL::to('customer/delete')}}/"+id,
             type: "delete",
             dataType: 'json',

             headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function (data) {
            var oTable = $('#dataTable').dataTable(); 
            oTable.fnDraw(false);
              swal("Finish!",data, "success");
            },
            error: function (data) {
           
                  swal("Failed!","danjuk", "error");
            }
        });
  } 
});
};


   /* When click edit Car */
    $('body').on('click', '.edit-cus', function () {
      var id = $(this).data('id');
      $('#carForm').trigger("reset");
      $.get('{{ URL::to("customer/profile") }}/'+id, function (data) {
         
          $('#customer-id').val(id);
          $('#form-title').html("Edit Customer");
          $("#name").val(data.name);
          $("#email").val(data.email);
          $("#phone").val(data.phone);
          $("#nik").val(data.nik);
          $("#address").val(data.address);
          $('#btn-save').val("edit-car");
          
          
   
         })
    });

  if ($("#customerForm").length > 0) {
      $("#customerForm").validate({
       submitHandler: function(form) {
          var actionType = $('#btn-save').val();
          var actionURL ="{{Route('edit.customer')}}";
          var msg ="Data Berhasil Diubah";
          var msgError ="Data Gagal Diubah";
          var action="Edit"
         if(actionType=="add-customer"){
         actionURL="{{ route('add.customer') }}";
         action="Add"
         }
      $('#btn-save').html('Sending..');
      $.ajax({
          data: new FormData($("#customerForm")[0]),
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

              swal("Failed!",data.responseText, "error");
              $('#btn-save').html(action);
            }
        });
      }
    })
  }
 

</script>
 
 
</html>
