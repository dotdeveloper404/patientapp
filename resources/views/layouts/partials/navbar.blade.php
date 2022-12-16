  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)" role="button"
                        onclick="document.getElementById('logout-form').submit()">
                        <b>Logout</b>
                    </a>
                </li>
            </ul>
            <form action="{{ route('logout') }}" method="post" id="logout-form">
                @csrf
            </form>

  </nav>
  <!-- /.navbar -->

 