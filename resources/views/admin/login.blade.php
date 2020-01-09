<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Smart Shop | Admin Login</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('admin/')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
 
  <!-- Custom styles for this template-->
  <link href="{{asset('admin/')}}/css/sb-admin.css" rel="stylesheet">


</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Please log in</div>
      <div class="card-body">
        <!-- <form class="form-horizontal" method="POST" action="{{ route('login') }}">
          @csrf -->
          {!!Form::open(['url'=>'/login','method'=>'POST'])!!}
          
          <div class="form-group">
            
             <!--  <input type="email" id="inputEmail" class="form-control" value="{{ old('remember') ? 'checked' : '' }}" placeholder="Email address" required="required" autofocus="autofocus"> -->
              
              {{Form::email('email',null,['class'=>'form-control' ,'placeholder'=>'Enter your email'])}}
              
              @error('email')
              <p class="text-danger">{{$errors->first('email')}}</p>
              @enderror
          </div>

          <div class="form-group{{$errors->has('password') ? 'has-error' : ''}}">
            
              <!-- <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required"> -->
              
              {{Form::password('password',['class'=>'form-control','placeholder'=>'Enter your password'])}}

              @error('password')
              <p class="text-danger">{{$errors->first('password')}}</p>
              @enderror
          </div>

          <div class="form-group">
            <div class="checkbox">
              <label>
                <!-- <input type="checkbox" value="remember-me"> -->
              {{Form::checkbox('name','remeberMe')}}
                Remember Password
              </label>
            </div>
          </div>
          <div class="form-group">
              {{Form::submit('Login',['class'=>'btn btn-primary btn-block','name'=>'btn'])}}
          </div>
        {!!Form::close()!!}
        <div class="text-center">
          <a class="d-block small mt-3" href="{{url('/register')}}">Register an Account</a>
          <a class="d-block small" href="{{url('/forgot-password')}}">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('admin/')}}/vendor/jquery/jquery.min.js"></script>
  <script src="{{asset('admin/')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('admin/')}}/vendor/jquery-easing/jquery.easing.min.js"></script>
  
</body>

</html>
