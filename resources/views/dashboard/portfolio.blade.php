@include('header')
@include('left_sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Portfolio
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Portfolio</li>
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
            <form role="form" method="post" name="portfolio_form" id="portfolio_form" action="/portfolio_form_submit" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group {{ $errors->has('portfolio_name') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Portfolio Name:</label>
                  <input type="text" class="form-control" name="portfolio_name" id="portfolio_name" value="{{ old('portfolio_name') }}">
                  <span class="text-danger">{{ $errors->first('portfolio_name') }}</span>
                </div>

                <div class="form-group {{ $errors->has('portfolio_url') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Portfolio URL:</label>
                  <input type="text" class="form-control" name="portfolio_url" id="portfolio_url" value="http://">
                  <span class="text-danger">{{ $errors->first('portfolio_url') }}</span>
                </div>

                <div class="form-group {{ $errors->has('portfolio_type') ? 'has-error' : '' }}">
                  <label for="exampleInputPassword1">Portfolio Type:</label>
                  <select class="form-control" name="portfolio_type" id="portfolio_type">
                    <option value="0">All</option>

                    @foreach($fetch_portfolio_type_details as $value)
                      <option value="{{$value['id']}}">{{$value['portfolio_type']}}</option>
                    @endforeach
                    
                  </select>
                  <span class="text-danger">{{ $errors->first('portfolio_type') }}</span>
                </div>
                <div class="form-group {{ $errors->has('portfolio_image') ? 'has-error' : '' }}">
                  <label for="exampleInputFile">Portfolio Image</label>
                  <input type="file" id="portfolio_image" name="portfolio_image">
                  <span class="text-danger">{{ $errors->first('portfolio_image') }}</span>
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