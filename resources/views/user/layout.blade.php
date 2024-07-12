<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Inspektorat Daerah Kota Padang</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/codemirror/lib/codemirror.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/codemirror/theme/duotone-dark.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script src="{{ asset('js/app.js') }}"></script>

  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
          <div class="judul-navbar">
            <div class="text-white-all"> <b> INSPEKTORAT DAERAH KOTA PADANG</b></div>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <div class="d-sm-none d-lg-inline-block">Hi,
              @if (Auth::check())
              {{ Auth::user()->name }}
            @else
              Guest
            @endif
          </div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-divider"></div>
              <a href="/login" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>

      <!-- Sidebar -->
      <div class="main-sidebar sidebar-style-2" >
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="/dashboard">Menu</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="/dashboard">INSP</a>
          </div>
          <ul class="sidebar-menu">
             <li <?php echo (strpos($_SERVER['REQUEST_URI'], '/dashboardd') !== false) ? 'class="active"' : ''; ?>>
                <a class="nav-link" href="/dashboardd"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
             </li>
            <li class="nav-item dropdown">
              <li <?php echo (strpos($_SERVER['REQUEST_URI'], '/postlhp') !== false) ? 'class="active"' : ''; ?>>
                <a class="nav-link has-dropdown" href="#"><i class="far fa-file-alt"></i> <span>Pengajuan LHP</span></a>
                <ul class="dropdown-menu">
                  <li <?php echo (strpos($_SERVER['REQUEST_URI'], '/postlhp') !== false) ? 'class="active"' : ''; ?> >
                    <a class="nav-link" href="/postlhp">Unggah LHP</a></li>
                  <li <?php echo (strpos($_SERVER['REQUEST_URI'], '/hasillhp') !== false) ? 'class="active"' : ''; ?> >
                    <a class="nav-link" href="/hasillhp">Hasil Pengajuan LHP</a></li>
                </ul>
              </li>
            </li>

            </aside>
        </div>
      <!-- /Sidebar -->

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            @yield('page-title')
          </div>
        </section>
        @yield('content')
      </div>

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2024 <div class="bullet"></div> Project KP Inspektorat Kota Padang
        </div>
        <div class="footer-right">
          <!-- Footer Right Content -->
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/modules/popper.js') }}"></script>
  <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>
  <script src="{{ asset('assets/modules/tooltip.js') }}"></script>

  <!-- JS Libraries -->
  <script src="{{ asset('assets/modules/cleave-js/dist/cleave.min.js') }}"></script>
  <script src="{{ asset('assets/modules/cleave-js/dist/addons/cleave-phone.us.js') }}"></script>
  <script src="{{ asset('assets/modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
  <script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
  <script src="{{ asset('assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
  <script src="{{ asset('assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
  <script src="{{ asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
  <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
  <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
  <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
  <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
  <script src="{{ asset('assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}""></script>
  <script src="{{ asset('assets/modules/codemirror/lib/codemirror.js') }}""></script>
  <script src="{{ asset('assets/modules/codemirror/mode/javascript/javascript.js') }}""></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('assets/js/page/forms-advanced-forms.js') }}"></script>
  <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
  <script src="{{ asset('assets/js/page/components-table.js') }}"></script>

  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

  <!-- Additional Scripts -->
  @stack('page-scripts')
</body>
</html>
