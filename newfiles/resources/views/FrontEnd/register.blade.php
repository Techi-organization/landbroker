

@include('FrontEnd.header')
<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="home">Home</a> / Register</span>
    <h2>Register</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
<form action="{{route('create')}}" method="post">
@if (Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif

@if (Session::has('fail'))
<div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif

    <input type="text" class="form-control" placeholder="Full Name" name="form_name" value="{{old('form_name')}}">
    <span class="text-danger">@error('form_name'){{$message}}

    @enderror</span>
    <input type="text" class="form-control" placeholder="Enter Email" name="form_email" value="{{old('form_email')}}">
    <span class="text-danger">@error('form_email'){{$message}}

        @enderror</span>
    <input type="password" class="form-control" placeholder="Password" name="form_pass">
    <span class="text-danger">@error('form_pass'){{$message}}

        @enderror</span>

    <input type="text" class="form-control" placeholder="Contact Number" name="form_phone">
    <span class="text-danger">@error('form_phone'){{$message}}

        @enderror</span>


    <input type="hidden" name="_token" value="<?=csrf_token()?>" >
<button type="submit" class="btn btn-success" name="Submit">Register</button>

<a href="login" ><span class="btn btn-info"  >Already Registered User, Login!</span></a>


</div>

</div>
</div>
</div>

@include('FrontEnd.footer')
