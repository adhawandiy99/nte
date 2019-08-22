<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

  <title>@yield('title')</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">
  <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!-- Core stylesheets -->
  <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="/css/pixeladmin.min.css" rel="stylesheet" type="text/css">
  <link href="/css/widgets.min.css" rel="stylesheet" type="text/css">

  <!-- Theme -->
  <link href="/css/themes/purple-hills.min.css" rel="stylesheet" type="text/css">

  <!-- Pace.js -->
  <script src="/pace/pace.min.js"></script>
  @yield('css')
</head>
<body>
  <!--1:admin;2:sdi;3:warroom;4:sales:5:optima;6:HD PROV;7:HS;0:view;-->
  <!-- Nav -->
  <nav class="px-nav px-nav-left px-nav-fixed">
    <button type="button" class="px-nav-toggle" data-toggle="px-nav">
      <span class="px-nav-toggle-arrow"></span>
      <span class="navbar-toggle-icon"></span>
      <span class="px-nav-toggle-label font-size-11">HIDE MENU</span>
    </button>

    <ul class="px-nav-content">
      <li class="px-nav-item px-nav-dropdown {{ (Request ::segment(1)=='do'||Request ::segment(1)=='out'||Request ::segment(1)=='opname')?'px-open active' : '' }}">
        <a href="#"><i class="px-nav-icon ion-iphone"></i><span class="px-nav-label">Transaksional Gudang</span></a>
        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item {{ (Request ::segment(1)=='do')?'active' : '' }}"><a href="/do"><span class="px-nav-label">Input DO</span></a></li>
        </ul>
        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item {{ (Request ::segment(1)=='out')?'active' : '' }}"><a href="/out"><span class="px-nav-label">Input Pengeluaran</span></a></li>
        </ul>
        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item {{ (Request ::segment(1)=='opname')?'active' : '' }}"><a href="/opname"><span class="px-nav-label">Stok Opname</span></a></li>
        </ul>
      </li>
      <li class="px-nav-item px-nav-dropdown {{ str_contains(Request ::segment(1), ['info','search'])?'px-open active' : '' }}">
        <a href="#"><i class="px-nav-icon ion-clipboard"></i><span class="px-nav-label">Info Gudang</span></a>
        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item {{ Request ::segment(1) == 'infostok'?'active' : '' }}"><a href="/infostok"><span class="px-nav-label">Stok</span></a></li>
        </ul>
        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item {{ Request ::segment(1) == 'infoout'?'active' : '' }}"><a href="/infoout"><span class="px-nav-label">Pengeluaran</span></a></li>
        </ul>
        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item {{ Request ::segment(1) == 'searchdo'?'active' : '' }}"><a href="/searchdo"><span class="px-nav-label">Search DO</span></a></li>
        </ul>
        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item {{ Request ::segment(1) == 'searchitem'?'active' : '' }}"><a href="/searchitem"><span class="px-nav-label">Search Item</span></a></li>
        </ul>
      </li>
      <li class="px-nav-item px-nav-dropdown">
        <a href="#"><i class="px-nav-icon ion-ios-plus"></i><span class="px-nav-label">Admin</span></a>
        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item"><a href="/teknisi"><span class="px-nav-label">Teknisi</span></a></li>
          <li class="px-nav-item"><a href="/material"><span class="px-nav-label">Material</span></a></li>
          <li class="px-nav-item"><a href="/order"><span class="px-nav-label">Order</span></a></li>
        </ul>
      </li>
      <li class="px-nav-item px-nav-dropdown">
        <a href="#"><i class="px-nav-icon ion-iphone"></i><span class="px-nav-label">Teknisi</span></a>
        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item"><a href="/inbox_order"><span class="px-nav-label">Inbox Order</span></a></li>
        </ul>
      </li>
      <li class="px-nav-item px-nav-dropdown">
        <a href="#"><i class="px-nav-icon ion-clipboard"></i><span class="px-nav-label">Reporting</span></a>
        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item"><a href="/report1/all"><span class="px-nav-label">Report1</span></a></li>
        </ul>
      </li>
      <li class="px-nav-item px-nav-dropdown">
        <a href="#"><i class="px-nav-icon ion-ios-person"></i><span class="px-nav-label">{{ session('auth')->Username }} </span></a>

        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item"><a href="/logout"><span class="px-nav-label">Logout</span></a></li>
        </ul>
      </li>
    </ul>
  </nav>

  <!-- Navbar -->
  <nav class="navbar px-navbar">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">Judul</a>
    </div>

    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#px-navbar-collapse" aria-expanded="false"><i class="navbar-toggle-icon"></i></button>

    <div class="collapse navbar-collapse" id="px-navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="#">Link</a></a>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            {{ session('auth')->Username }}
          </a>
          <ul class="dropdown-menu">
            <li><a href="#">First item</a></li>
            <li class="divider"></li>
            <li><a href="/logout">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  <div class="px-content">
    <div class="page-header {{ Request::path() == '/' ? 'text-center' : ''}}">
    
      <h3>@yield('header')</h3>
    </div>

  <!-- Content -->
    <div>
      @yield('content')
    </div>
  </div>
  
  

  <!-- Footer -->
  <footer class="px-footer px-footer-bottom px-footer-fixed">
      Judul
  </footer>

  <!-- ==============================================================================
  |
  |  SCRIPTS
  |
  =============================================================================== -->

  <!-- Load jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Core scripts -->
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/pixeladmin.min.js"></script>

  <!-- Your scripts -->
  <script src="/js/app.js"></script>
  @yield('js')
</body>
</html>
