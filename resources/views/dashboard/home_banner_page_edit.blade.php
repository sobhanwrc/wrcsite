@include('header')
@include('left_sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Home Page Banner Edit
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Home Page Banner Edit</li>
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
              <p class="login-box-msg" style="color: red;">{{ Session::get('submit-status') }}</p>
            @endif

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" name="banner_edit_submit" id="banner_edit_submit" action="/banner_edit_submit/{{ base64_encode($banner_list['id']) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group {{ $errors->has('header1') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Header 1</label>
                  <textarea cols="" rows="" class="form-control" id="exampleInputEmail1" placeholder="Header 1" name="header1">{{ $banner_list['banner1'] }}</textarea>
                  <span class="text-danger">{{ $errors->first('header1') }}</span>
                </div>
                <div class="form-group {{ $errors->has('header2') ? 'has-error' : '' }}">
                  <label for="exampleInputPassword1">Header 2</label>
                  <textarea cols="" rows="" class="form-control" id="exampleInputPassword1" placeholder="Header 2" name="header2">{{ $banner_list['banner2'] }}</textarea>
                  <span class="text-danger">{{ $errors->first('header2') }}</span>
                </div>
                <div class="form-group {{ $errors->has('exampleInputFile') ? 'has-error' : '' }}">
                  <label for="exampleInputFile">Header Image</label>
                  <input type="file" id="exampleInputFile" name="exampleInputFile" class="form-group">
                  <span class="text-danger">{{ $errors->first('exampleInputFile') }}</span>
                  @if($banner_list['banner_image'])
                  <img src="/upload/banner/resize/{{$banner_list['banner_image']}}" width="150" height="150" class="form-group">
                  <input type="hidden" name="header_image" id="header_image" value="{{$banner_list['banner_image']}}">
                  @endif
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