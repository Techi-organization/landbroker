
@include('FrontEnd.loginheader')


    <div class="container">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="row">
              <div class="col-sm-6 login">
              <h4>Login</h4>
                <form class="" action="{{route('login-user')}}" method="post" role="form">
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif

                    @if (Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf

              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail2">Email address</label>
                <input type="email" class="form-control" name="emailid" id="exampleInputEmail2" placeholder="Enter email" value="{{old('emailid')}}">
                <span class="text-danger">@error('emailid'){{$message}}

                    @enderror</span>
            </div>
              <div class="form-group">
                <label class="sr-only" for="exampleInputPassword2">Password</label>
                <input type="password" class="form-control" name="passwd" id="exampleInputPassword2" placeholder="Password">
                <span class="text-danger">@error('passwd'){{$message}}

                    @enderror</span>
            </div>
              {{-- <div class="checkbox">
                <label>
                  <input type="checkbox"> Remember me
                </label>
              </div> --}}
              <button type="submit" class="btn btn-success">Sign in</button>
            </form>
              </div>
              <div class="col-sm-6">
                <h4>New User Sign Up</h4>
                <p>Join today and get updated with all the properties deal happening around.</p>
                <button type="submit" class="btn btn-info"  onclick="window.location.href='register'">Join Now</button>
                <button type="submit" class="btn btn-info"  onclick="window.location.href='home'">Back to Home</button>
              </div>

            </div>
          </div>
        </div>
      </div>


@include('FrontEnd.footer')
