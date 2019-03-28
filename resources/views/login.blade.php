<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  
  <title>Sign In</title>

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">
  <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!-- Pace.js -->

  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/pixeladmin.min.css" rel="stylesheet" type="text/css">
  <link href="css/widgets.min.css" rel="stylesheet" type="text/css">

  <!-- Theme -->
  <link href="css/themes/asphalt.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styling -->
  <style>
    .page-signin-header {
      box-shadow: 0 2px 2px rgba(0,0,0,.05), 0 1px 0 rgba(0,0,0,.05);
    }

    .page-signin-header .btn {
      position: absolute;
      top: 12px;
      right: 15px;
    }

    html[dir="rtl"] .page-signin-header .btn {
      right: auto;
      left: 15px;
    }

    .page-signin-container {
      width: auto;
      margin: 30px 10px;
    }

    .page-signin-container form {
      border: 0;
      box-shadow: 0 2px 2px rgba(0,0,0,.05), 0 1px 0 rgba(0,0,0,.05);
    }

    @media (min-width: 544px) {
      .page-signin-container {
        width: 350px;
        margin: 60px auto;
      }
    }

    .page-signin-social-btn {
      width: 40px;
      padding: 0;
      line-height: 40px;
      text-align: center;
      border: none !important;
    }

    #page-signin-forgot-form { display: none; }
  </style>
  <!-- / Custom styling -->
</head>
<body>
  <div class="page-signin-header p-a-2 text-sm-center bg-white">
    <a class="px-demo-brand px-demo-brand-lg text-default" href="#"><span class="px-demo-logo bg-primary m-t-0"><span class="px-demo-logo-1"></span><span class="px-demo-logo-2"></span><span class="px-demo-logo-3"></span><span class="px-demo-logo-4"></span><span class="px-demo-logo-5"></span><span class="px-demo-logo-6"></span><span class="px-demo-logo-7"></span><span class="px-demo-logo-8"></span><span class="px-demo-logo-9"></span></span>Warehouse Admin</a>
  </div>

  <!-- Sign In form -->

  <div class="page-signin-container" id="page-signin-form">
    <h2 class="m-t-0 m-b-4 text-xs-center font-weight-semibold font-size-20">Sign In Form</h2>

    <form method="post" class="panel p-a-4">
      <fieldset class=" form-group form-group-lg {{ $errors->has('username')?'has-error':'' }}"">
        <input type="text" class="form-control rounded" placeholder="Username" name="username">
        <small class="form-message light">
          @foreach($errors->get('username') as $msg)
              {{ $msg }}
          @endforeach
        </small>
      </fieldset>

      <fieldset class=" form-group form-group-lg {{ $errors->has('password')?'has-error':'' }}">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <small class="form-message light">
          @foreach($errors->get('password') as $msg)
              {{ $msg }}
          @endforeach
        </small>
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


    <div class="text-xs-center">
      <a href="#" class="page-signin-social-btn btn btn-success btn-rounded" data-toggle="tooltip" title="Facebook">N</a>&nbsp;&nbsp;
      <a href="#" class="page-signin-social-btn btn btn-warning btn-rounded" data-toggle="tooltip" title="Twitter">T</a>&nbsp;&nbsp;
      <a href="#" class="page-signin-social-btn btn btn-success btn-rounded" data-toggle="tooltip" title="Google+">E</a>
    </div>
  </div>

  <!-- / Sign In form -->

  <!-- Reset form -->

  <div class="page-signin-container" id="page-signin-forgot-form">
    <h2 class="m-t-0 m-b-4 text-xs-center font-weight-semibold font-size-20">Password reset</h2>

    <form action="index.html" class="panel p-a-4">
      <fieldset class="form-group form-group-lg">
        <input type="email" class="form-control" placeholder="Your Email">
      </fieldset>

      <button type="submit" class="btn btn-block btn-lg btn-primary m-t-3">Send password reset link</button>
      <div class="m-t-2 text-muted">
        <a href="#" id="page-signin-forgot-back">&larr; Back</a>
      </div>
    </form>
  </div>

  <!-- / Reset form -->

  <!-- ==============================================================================
  |
  |  SCRIPTS
  |
  =============================================================================== -->

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/pixeladmin.min.js"></script>
  <script src="/pace/pace.min.js"></script>

  <script type="text/javascript">
    $(function(){
      var alertExist = <?= json_encode(Session::has('alerts')); ?>;
      if(alertExist){
        toastr.options = {
          "closeButton": true,
          "positionClass": "toast-top-center",
          "onclick": null,
          "timeOut": "200000"
        }
        var msg = <?= json_encode(session('alerts')[0]); ?>;
        toastr.info(msg.text);
      }
    });

  </script>
</body>
</html>
