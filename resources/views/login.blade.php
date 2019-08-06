<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  
  <title>Login Page</title>

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

  <!-- Custom styling -->
  <style>
    .page-signin-modal {
      position: relative;
      top: auto;
      right: auto;
      bottom: auto;
      left: auto;
      z-index: 1;
      display: block;
    }

    .page-signin-form-group { position: relative; }

    .page-signin-icon {
      position: absolute;
      line-height: 21px;
      width: 36px;
      border-color: rgba(0, 0, 0, .14);
      border-right-width: 1px;
      border-right-style: solid;
      left: 1px;
      top: 9px;
      text-align: center;
      font-size: 15px;
    }

    html[dir="rtl"] .page-signin-icon {
      border-right: 0;
      border-left-width: 1px;
      border-left-style: solid;
      left: auto;
      right: 1px;
    }

    html:not([dir="rtl"]) .page-signin-icon + .page-signin-form-control { padding-left: 50px; }
    html[dir="rtl"] .page-signin-icon + .page-signin-form-control { padding-right: 50px; }

    #page-signin-forgot-form {
      display: none;
    }

    /* Margins */

    .page-signin-modal > .modal-dialog { margin: 30px 10px; }

    @media (min-width: 544px) {
      .page-signin-modal > .modal-dialog { margin: 60px auto; }
    }
  </style>
  <!-- / Custom styling -->
</head>
<body>
  
<div class="page-signin-modal modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="box m-a-0">
          <div class="box-row">

            <div class="box-cell col-md-5 bg-primary p-a-4">
              <div class="text-xs-center text-md-left">
                <a class="px-demo-brand px-demo-brand-lg" href="index.html"><span class="px-demo-logo bg-primary m-t-0"><span class="px-demo-logo-1"></span><span class="px-demo-logo-2"></span><span class="px-demo-logo-3"></span><span class="px-demo-logo-4"></span><span class="px-demo-logo-5"></span><span class="px-demo-logo-6"></span><span class="px-demo-logo-7"></span><span class="px-demo-logo-8"></span><span class="px-demo-logo-9"></span></span><span class="font-size-20 line-height-1">Judul</span></a>
                <div class="font-size-15 m-t-1 line-height-1">Judul</div>
              </div>
              <ul class="list-group m-t-3 m-b-0 visible-md visible-lg visible-xl">
                <li class="list-group-item p-x-0 p-b-0 b-a-0"><i class="list-group-icon fa fa-heart text-white"></i> Judul</li>
                <li class="list-group-item p-x-0 p-b-0 b-a-0"><i class="list-group-icon fa fa-sitemap text-white"></i> Judul</li>
                <li class="list-group-item p-x-0 p-b-0 b-a-0"><i class="list-group-icon fa fa-file-text-o text-white"></i> Judul</li>
                <li class="list-group-item p-x-0 p-b-0 b-a-0"><i class="list-group-icon fa fa-outdent text-white"></i> Judul</li>
              </ul>
            </div>

            <div class="box-cell col-md-7">

              <!-- Sign In form -->

              <form method="post" class="p-a-4" id="page-signin-form">
                <h4 class="m-t-0 m-b-4 text-xs-center font-weight-semibold">Sign In to your Account</h4>

                <fieldset class="page-signin-form-group form-group form-group-lg">
                  <div class="page-signin-icon text-muted"><i class="ion-person"></i></div>
                  <input type="text" class="page-signin-form-control form-control" placeholder="Username or Email" name="username">
                </fieldset>

                <fieldset class="page-signin-form-group form-group form-group-lg">
                  <div class="page-signin-icon text-muted"><i class="ion-asterisk"></i></div>
                  <input type="password" class="page-signin-form-control form-control" placeholder="Password" name="password">
                </fieldset>

                <div class="clearfix">
                  <label class="custom-control custom-checkbox pull-xs-left">
                    <input type="checkbox" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    Remember me
                  </label>
                  <a href="#" class="font-size-12 text-muted pull-xs-right" id="page-signin-forgot-link">Forgot your password?</a>
                </div>

                <button type="submit" class="btn btn-block btn-lg btn-primary m-t-3">Sign In</button>
              </form>


              <!-- / Sign In form -->

              <!-- Reset form -->

              <form action="index.html" class="p-a-4" id="page-signin-forgot-form">
                <h4 class="m-t-0 m-b-4 text-xs-center font-weight-semibold">Password reset</h4>

                <fieldset class="page-signin-form-group form-group form-group-lg">
                  <div class="page-signin-icon text-muted"><i class="ion-at"></i></div>
                  <input type="email" class="page-signin-form-control form-control" placeholder="Your Email">
                </fieldset>

                <button type="submit" class="btn btn-block btn-lg btn-primary m-t-3">Send password reset link</button>
                <div class="m-t-2 text-muted">
                  <a href="#" id="page-signin-forgot-back">&larr; Back</a>
                </div>
              </form>

              <!-- / Reset form -->

            </div>
          </div>
        </div>
      </div>

      <!--<div class="text-xs-center m-t-2 font-weight-bold font-size-14 text-white" id="px-demo-signup-link">
        Not a member? <a href="/register" class="text-white"><u>Sign Up now</u></a>
      </div>-->
    </div>
  </div>
  <div class="px-responsive-bg"><div class="px-responsive-bg-overlay" style="background: rgb(0, 0, 0); opacity: 0.2;"></div><img alt="" src="/images/1.jpg" style="width: 100%; height: 1067px; top: -137px; left: 0px;"></div>
  <!-- / Sign In form -->

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
  <script type="text/javascript">
    $(function() {
      $('#responsive-bg-example').pxResponsiveBg();
    });
  </script>
</body>
</html>
