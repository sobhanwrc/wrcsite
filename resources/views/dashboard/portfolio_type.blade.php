@include('header')
@include('left_sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Portfolio Type Page
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Portfolio Type Page</li>
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
            <form role="form" method="post" name="portfolio_type_submit" id="portfolio_type_submit" action="/portfolio_type_submit" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group {{ $errors->has('portfolio_type') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Portfolio Type :</label>

                  <input type="text" name="portfolio_type" class="form-control" placeholder="Portfolio Type">
                  <span class="text-danger">{{ $errors->first('portfolio_type') }}</span>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" id="submit" class="btn btn-primary">Add</button>
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