   <ul class="navbar-nav ml-auto ml-md-10">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{route('reset')}}">Change Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Logout</a>
                    </div>
                </li>
            </ul>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> 
    @csrf                                   
  </form>
