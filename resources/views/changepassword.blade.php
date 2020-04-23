<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login Sewa Mobil</title>
        <link href="{{URL::to('css/styles.css')}}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>


    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                     
                    <div class="container">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                          @if ($message = Session::get('success'))
                              <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                  <strong>{{ $message }}</strong>
                              </div>
                          @endif
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Reset Password</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('change.password') }}">
                                             {{ csrf_field() }}

                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Old Password</label><input class="form-control py-4" type="password" placeholder="Enter  old password"  name="current_password" required="" />
                                            </div>

                                            <div class="form-group"><label class="small mb-1" for="inputPassword"> Password</label><input class="form-control py-4" type="password" placeholder="Enter  password" name="new_password" required="" />
                                            </div>

                                            <div class="form-group"><label class="small mb-1" for="inputPassword"> Retype Password</label><input class="form-control py-4" id="inputPassword" type="password" placeholder="Retype  password" name="new_confirm_password" required="" />
                                            </div>


                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <input class="btn btn-primary" type="submit" name="submit" value="Reset">
                                        </div>
                                        </form>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Sewa Mobil 2019</div>
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
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
