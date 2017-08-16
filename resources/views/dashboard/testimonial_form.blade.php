@include('header')
@include('left_sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Testimonial Page
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Slider Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            
            @if(Session::has('submit-status'))
              <p class="login-box-msg" style="color: green;">{{ Session::get('submit-status') }}</p>
            @endif

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" name="testimonial_submit" id="testimonial_submit" action="/testimonial_submit" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group {{ $errors->has('header1') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Client Says:</label>
                  <textarea cols="" rows="" class="form-control" id="exampleInputEmail1" placeholder="Header 1" name="header1">{{ old('header1') }}</textarea>
                  <span class="text-danger">{{ $errors->first('header1') }}</span>
                </div>
                <div class="form-group {{ $errors->has('client_name') ? 'has-error' : '' }}">
                  <label for="exampleInputPassword1">Client Name:</label>
                  <input type="text" class="form-control" name="client_name" id="client_name" placeholder="Client Name" value="{{ old('client_name') }}">
                  <span class="text-danger">{{ $errors->first('client_name') }}</span>
                </div>
                <div class="form-group {{ $errors->has('company_name') ? 'has-error' : '' }}">
                  <label for="exampleInputPassword1">Company Name:</label>
                  <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Company Name" value="{{ old('company_name') }}">
                  <span class="text-danger">{{ $errors->first('company_name') }}</span>
                </div>

                <div class="form-group {{ $errors->has('short_by') ? 'has-error' : '' }}">
                  <label for="exampleInputPassword1">Short By:</label>
                  <input type="text" class="form-control" name="short_by" id="short_by" placeholder="Short By" value="{{ old('short_by') }}">
                  <span class="text-danger">{{ $errors->first('short_by') }}</span>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>

        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('footer')