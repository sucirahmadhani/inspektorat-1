<!DOCTYPE html>
<html lang="en">
<head>
<!-- CSS Libraries -->
<link rel="stylesheet" href="../node_modules/ionicons201/css/ionicons.min.css">
<!-- Page Specific JS File -->
<script src=".../assets/js/page/modules-ion-icons.js"></script>
</head>
<body>
<div class="main-sidebar sidebar-style-2" >
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="/dashboard">Menu</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="/dashboard">INSP</a>
      </div>
      <ul class="sidebar-menu">
         <li <?php echo (strpos($_SERVER['REQUEST_URI'], '/dashboard') !== false) ? 'class="active"' : ''; ?>>
            <a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
         </li>

        <li <?php echo (strpos($_SERVER['REQUEST_URI'], '/editlhp') !== false) ? 'class="active"' : ''; ?>>
          <a class="nav-link" href="/editlhp"><i class="far fa-edit"></i> <span>Edit LHP</span></a>
        </li>
        <li <?php echo (strpos($_SERVER['REQUEST_URI'], '/datapegawai') !== false) ? 'class="active"' : ''; ?> >
          <a class="nav-link" href="/datapegawai ">
            <i class="fas fa-users" ></i>
            <span>Data Pegawai</span>
          </a>
        </li>
        <li <?php echo (strpos($_SERVER['REQUEST_URI'], '/data_user') !== false) ? 'class="active"' : ''; ?> >
            <a class="nav-link" href="/data_user ">
              <i class="fas fa-user" ></i>
              <span>Data User</span>
            </a>
          </li>
        </aside>

  </div>


</html>
