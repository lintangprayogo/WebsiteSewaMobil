 <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link " href="{{ route('dashboard') }}"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a
                            >
                            <div class="sb-sidenav-menu-heading">Records</div>
                            
                            <a class="nav-link " href="{{ route('brand') }}"
                                ><div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
                                Brand</a>
                             <a class="nav-link" href="{{ route('customer') }}"
                                ><div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Customer</a>

                        <a class="nav-link" href="{{ route('booking') }}"
                                ><div class="sb-nav-link-icon"><i class="fa fa-book"></i></div>
                                Booking</a>
                           
                         
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{Auth::User()->name}}
                    </div>
                </nav>