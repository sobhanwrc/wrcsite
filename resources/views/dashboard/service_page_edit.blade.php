@include('header')
@include('left_sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Services Edit
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Services Edit</li>
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
            <form role="form" method="post" name="services_page_edit_submit" id="services_page_edit_submit" action="/services_page_edit_submit/{{base64_encode($fetch_details['id'])}}" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="box-body">

                <div class="form-group {{ $errors->has('sofware_service') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Software Services:</label>
                  <textarea rows="7" class="form-control" id="sofware_service" name="sofware_service" >{{$fetch_details['software_development']}}</textarea>

                  <span class="text-danger">{{ $errors->first('sofware_service') }}</span>
                </div>


                <div class="form-group {{ $errors->has('mobile_application') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Mobile Application:</label>
                  <textarea rows="7" class="form-control" id="mobile_application" name="mobile_application" >{{$fetch_details['mobile_application']}}</textarea>

                  <span class="text-danger">{{ $errors->first('mobile_application') }}</span>
                </div>


                <div class="form-group {{ $errors->has('web_service') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Web Services:</label>
                  <textarea rows="7" class="form-control" id="web_service" name="web_service" >{{$fetch_details['web_development']}}</textarea>

                  <span class="text-danger">{{ $errors->first('web_service') }}</span>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Edit</button>
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
<script type="text/javascript">
     CKEDITOR.replace('sofware_service');
     CKEDITOR.replace('mobile_application');
     CKEDITOR.replace('web_service');    
</script>