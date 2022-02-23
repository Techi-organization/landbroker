@include('FrontEnd.header')
<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="#">Home</a> / Contact Us</span>
    <h2>Contact Us</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row contact">
  <div class="col-lg-6 col-sm-6 ">
    <form class="" action="{{route('contact-user')}}" method="post" role="form">
        @if (Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif

        @if (Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
        @csrf

                <input type="text" class="form-control" name="name" placeholder="Full Name">
                <span class="text-danger">@error('name'){{$message}}

                    @enderror</span>
                <input type="email" class="form-control" name="email" placeholder="Email Address">
                <span class="text-danger">@error('email'){{$message}}

                    @enderror</span>
                <input type="text" class="form-control" name="contact_no" placeholder="Contact Number">
                <span class="text-danger">@error('contact_no'){{$message}}

                    @enderror</span>
                <textarea rows="6" class="form-control" name="mesgg" placeholder="Message"></textarea>
                <span class="text-danger">@error('mesgg'){{$message}}

                    @enderror</span>
      <button type="submit" class="btn btn-success" name="Submit">Send Message</button>


    </form>

        </div>
  <div class="col-lg-6 col-sm-6 ">
  <div class="well"><iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Pulchowk,+Patan,+Central+Region,+Nepal&amp;aq=0&amp;oq=pulch&amp;sll=37.0625,-95.677068&amp;sspn=39.371738,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Pulchowk,+Patan+Dhoka,+Patan,+Bagmati,+Central+Region,+Nepal&amp;ll=27.678236,85.316853&amp;spn=0.001347,0.002642&amp;t=m&amp;z=14&amp;output=embed"></iframe></div>
  </div>
</div>
</div>
</div>

@include('FrontEnd.footer')
