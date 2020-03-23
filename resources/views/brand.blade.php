<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Cars</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
          <meta name="csrf-token" content="{{ csrf_token() }}">


    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="{URL::to('/dashboard')}">Rental Mobil</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
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
                        <h1 class="mt-4">Brands</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Brands</li>
                        </ol>
                      
                        <button class="btn btn-primary" style="margin-bottom: 10px" data-toggle="modal" data-target="#formModal" id="add-brand">Add</button>
                        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Brand Data</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="10%">Photo</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th>Action</th>
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
                <form method="post" enctype="multipart/form-data" id="brandForm">
                       <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="form-title">Add Car</h4>
                    </div>
                    <div class="modal-body">
                      <input type="hidden" name="id"  id="brand-id">     
 
                    <div class="form-group">
                        <label for="brand">Brand Name:</label>
                        <input type="text" class="form-control" id="brand-name" required="required" name="name">
                      </div>
                      <div class="form-group">
                        <label for="pwd">Category:</label>
                         <select class="form-control" name="category" required="required" name="category" id="category">
                             <option value="">Select Category</option>
                             <option value="Convertible">Convertible</option>
                             <option value="Coupe">Coupe</option>
                             <option value="Hatcback">Hatcback</option>
                             <option value="Minivan">Minivan</option>
                             <option value="Sedan">Sedan</option>
                             <option value=" MPV">MPV</option>
                             <option value="SUV">SUV</option>
                             <option value="Wagon">Wagon</option>
                            <option value="Another">Another</option>
                         </select>
                      </div>
                      <div class="form-group">
                        <label for="brand">Rental Price(per/day):</label>
                        <input type="number" class="form-control" id="price" min="0" step='1000' required="required" name="price">
                      </div>

                    <div class="form-group">
                     <label for="brand">Photo:</label><br>
                      <input type="file"  name="photo" accept="image/*" onchange="loadFile(event)" >
                          <img src="{{URL::to('gambar/Merek.jpg')}}" style="width: 200px; height: 200px; margin: 5px;" id="fotodisplay">
                    </div>

                    </div>

                  
                
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"  value="add-brand" id="btn-save" >Save</button>
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
                url: '{!! route('show.brand') !!}',
                type: 'GET',
            },
        columns: [
          {data: 'photo', name: 'photo', orderable: false,
              render: function( data, type, full, meta ) {
        
                       data ="{{ URL::to('/gambar/mobil') }}/"+data;
                       return "<center><img src='" + data + "' height='150' width='150'  /></center>";
                      
                    }

           },
           { data: 'brand_name', name: 'brand_name' },
           { data: 'category', name: 'category' },
           { data: 'price', name: 'price' },
           {data: 'action', name: 'action', orderable: false},

        ]});

  if ($("#brandForm").length > 0) {
      $("#brandForm").validate({
       submitHandler: function(form) {
          var actionType = $('#btn-save').val();
          var actionURL ="{{URL::to('/brand/edit')}}";
          var msg ="Data Berhasil Diubah";
          var msgError ="Data Gagal Diubah";
         if(actionType=="add-brand"){
         actionURL="{{ route('add.brand') }}";
         }
      $('#btn-save').html('Sending..');
      $.ajax({
          data: new FormData($("#brandForm")[0]),
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
var deleteBrand = function(id) { swal({
  title: "Are You Sure?",
  text: "Data Can,t Be Restored!!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
       $.ajax({
            url: "{{URL::to('brand/delete')}}/"+id,
             type: "delete",
             dataType: 'json',

             headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function (data) {
            var oTable = $('#dataTable').dataTable(); 
            oTable.fnDraw(false);
              swal("Selesai!", "Data Telah Berhasil Dihapus!", "success");
            },
            error: function (data) {
           
                  swal("Gagal!", "Gagal Menghapus Data!", "error");
            }
        });
  } 
});
};

  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('fotodisplay');
      output.src = reader.result;
        $("#fotodisplay").width(200).height(200);
    };
    reader.readAsDataURL(event.target.files[0]);
  };
 
   /* When click edit BRAND */
    $('body').on('click', '.edit-brand', function () {
      var id = $(this).data('id');
      $('#adminForm').trigger("reset");
      $.get('{{ URL::to("/brand/profile") }}/'+id, function (data) {
        console.log(data);
         $('#brand-id').val(id);
          $('#form-title').html("Edit Brand");
          $('#btn-save').val("edit-brand");
          $('#brand-name').val(data.brand_name);
          $('#price').val(data.price);
          $('#category').val(data.category);
          $('#btn-save').html('Edit');
          if(data.photo==null){
             data.photo="{{ URL::to('/gambar/car.jpg') }}"
           }

           $('#fotodisplay').attr('src',"{{ URL::to('/gambar/mobil') }}/"+data.photo);
   
         })
    });
  $('#add-brand').click(function () {
        $("#form-title").html("Add Brand");
        $('#brandForm').trigger("reset");
        $('#btn-save').val("add-brand");
        $("#btn-save").html('Tambah');
        $('#fotodisplay').attr('src',"{{URL::to('gambar/car.jpg')}}");
        console.log("{{URL::to('gambar/car.jpg')}}")
         
              
    });

</script>
 
 
</html>
