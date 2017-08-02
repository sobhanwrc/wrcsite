@include('header')
@include('left_sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Website Settings Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Website Settings Details</li>
      </ol>
    </section>
    
    @if(Session::has('submit-status'))
      <p class="login-box-msg" style="color: red;">{{ Session::get('submit-status') }}</p>
    @endif

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Company Name</th>
                  <th>Company Email</th>
                  <th>Company Phone Number</th>
                  <th>Company Address</th>
                  <th>Company AboutUs</th>
                  <th>Company FB Link</th>
                  <th>Company Twiter Link</th>
                  <th>Company Linkin Link</th>
                  <th>Action</th>
                </tr>
                </thead>
                  
                <tbody>
                  @if($all_website_detials)
                    @foreach($all_website_detials as $value)
                      <tr>
                        <td>{{$value->company_name}}</td>
                        <td>{{$value->company_email}}</td>
                        <td>{{$value->company_phone_no}}</td>
                        <td>{{$value->company_address}}</td>
                        <td>{{$value->company_aboutus}}</td>
                        <td>{{$value->company_fb_link}}</td>
                        <td>{{$value->company_twiter_link}}</td>
                        <td>{{$value->company_linkin_link}}</td>
                        <td><a href="/website_settings_edit/{{base64_encode($value->id)}}" >Edit</a>&nbsp;</td>
                      </tr>
                    
                    @endforeach
                  
                  @endif
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('footer')