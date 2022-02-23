@include('FrontEnd.logoutheader')
<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="index.php">Home</a> / Buy, Sale & Rent</span>
    <h2>Buy, Sale & Rent</h2>
</div>
</div>
<!-- banner -->


<div class="container">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="row">
          <div class="col-sm-6 login">
          <h4>Property Details</h4>
            <form class="" action="{{route('sale-user')}}" method="POST" role="form" enctype="multipart/form-data">
                @if (Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif

                @if (Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf

                <div class="form-group">
                    <label class="sr-only" for="ownername">Owner Name</label>
                    <input type="text" name="owner_name" class="form-control" placeholder="Owner Name">
                    <span class="text-danger">@error('owner_name'){{$message}}

                        @enderror</span>
                </div>

                <div class="form-group">
                    <label class="sr-only" for="emailid">Owner Email_Id</label>
                    <input type="text" name="owner_email" class="form-control" placeholder="Owner Email_Id">
                    <span class="text-danger">@error('owner_email'){{$message}}

                        @enderror</span>
                </div>
          <div class="form-group">
            <label class="sr-only" for="titlename">Property details</label>
            <input type="text" name="property_name" class="form-control" placeholder="Properties Name">
            <span class="text-danger">@error('Property_name'){{$message}}

                @enderror</span>
        </div>
          <div class="form-group">
            <select class="form-control" name="property_method">

                <option>Rent</option>
                <option>Sale</option>
                <option>Pg</option>
              </select>
            <span class="text-danger">@error('property_method'){{$message}}

                @enderror</span>
        </div>

        <div class="form-group">
            <select class="form-control" name="price">
                <option>Price</option>
                <option>$150,000 - $200,000</option>
                <option>$200,000 - $250,000</option>
                <option>$250,000 - $300,000</option>
                <option>$300,000 - above</option>
              </select>

            <span class="text-danger">@error('price'){{$message}}

                @enderror</span>
        </div>
        <div class="form-group">
            <label class="sr-only" for="image">Images Uplaod</label>
            <input type="file" name="image[]" multiple id="examplemultiImage" class="form-control" >
            <span class="text-danger">@error('images'){{$message}}

                @enderror</span>
        </div>
        <div class="form-group">

            <textarea type="address" name="address" class="form-control" placeholder="Property Located Address" ></textarea>
            <span class="text-danger">@error('address'){{$message}}

                @enderror</span>
        </div>

          <button type="submit" name="upload" class="btn btn-success">Submit</button>
        </form>


          </div>


        </div>
      </div>
    </div>
  </div>


@include('FrontEnd.footer')
