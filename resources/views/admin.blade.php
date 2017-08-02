<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WRC | Log in</title>
 
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  {!! Html::style('storage/admin/bootstrap/dist/css/bootstrap.min.css') !!}
  
  
  {!! Html::style('storage/admin/font-awesome/css/font-awesome.min.css') !!}
  
  {!! Html::style('storage/admin/Ionicons/css/ionicons.min.css') !!}
  
  {!! Html::style('storage/admin/dist/css/AdminLTE.min.css') !!}
  
  {!! Html::style('storage/admin/plugins/iCheck/square/blue.css') !!}

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
  @yield('content')
{!! Html::script('storage/admin/jquery/dist/jquery.min.js') !!}

{!! Html::script('storage/admin/bootstrap/dist/js/bootstrap.min.js') !!}


{!! Html::script('storage/admin/plugins/iCheck/icheck.min.js') !!}


<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>

</html>
