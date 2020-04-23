<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                           
                               <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body ">
                                        <div class="row">
                                      <div class="col-sm-3"><i class="fa fa-users fa-3x" aria-hidden="true"></i></div>
                                       <div class="col-sm-7">
                                           <div class="row">
                                               <div class="col-sm-12">
                                                   <h5>Customer</h5>
                                               </div>
                                                 <div class="col-sm-12">
                                                   <h5>{{$customers}}</h5>
                                               </div>
                                           </div>

                                       </div>
                                        </div>
                                  

                                   </div>
                                  
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ route('customerexport') }}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body ">
                                        <div class="row">
                                      <div class="col-sm-3"><i class="fa fa-car fa-3x" aria-hidden="true"></i></div>
                                       <div class="col-sm-7">
                                           <div class="row">
                                               <div class="col-sm-12">
                                                   <h5>Available Car</h5>
                                               </div>
                                                 <div class="col-sm-12">
                                                   <h5>{{$cars_available}}</h5>
                                               </div>
                                           </div>

                                       </div>
                                        </div>
                                  

                                   </div>
                                  
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{route('exportcaravailable')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                         <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body ">
                                        <div class="row">
                                      <div class="col-sm-3"><i class="fa fa-car fa-3x" aria-hidden="true"></i></div>
                                       <div class="col-sm-8">
                                           <div class="row">
                                               <div class="col-sm-12">
                                                   <h5>Unavailable Car</h5>
                                               </div>
                                                 <div class="col-sm-12">
                                                   <h5>{{$cars_unavailable}}</h5>
                                               </div>
                                           </div>

                                       </div>
                                        </div>
                                  

                                   </div>
                                  
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{route('exportcarunavailable')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>


                         <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body ">
                                        <div class="row">
                                      <div class="col-sm-3"><i class="fa fa-dollar-sign fa-3x" aria-hidden="true"></i></div>
                                       <div class="col-sm-8">
                                           <div class="row">
                                               <div class="col-sm-12">
                                                   <h5>Monthly Income</h5>
                                               </div>
                                                 <div class="col-sm-12">
                                                   <h5>{{$income}}</h5>
                                               </div>
                                           </div>

                                       </div>
                                        </div>
                                  

                                   </div>
                                  
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#" data-toggle="modal" data-target="#formModal" id="Export-Income">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                      
                    </div>
                        <!-- Modal -->
              <div class="modal fade" id="formModal" role="dialog">
                <div class="modal-dialog">
                <form method="GET" enctype="multipart/form-data" id="incomeForm" action="{{route('export.income')}}">
                       <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="form-title">Income Report</h4>
                    </div>
                    <div class="modal-body">
                      <input type="hidden" name="id"  id="Income-id">     

                       
                
             
                      <div class="form-group">
                        <label for="Income">Start:</label>
                        <input type="date" class="form-control" id="start_date" required="required" name="start_date" >
                      </div>

                      <div class="form-group">
                        <label for="Income">End:</label>
                        <input type="date" class="form-control" id="end_date" required="required" name="end_date" >
                      </div>
                     
                     
                  
                
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"  value="add-Income" id="btn-save" >Export</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                    </div>
                  </div>
                  
                </form>
               
                </div>
              </div>
                </main>
                
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

    </body>
</html>
