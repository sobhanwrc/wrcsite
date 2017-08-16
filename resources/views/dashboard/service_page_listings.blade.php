@include('header')
@include('left_sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Service Page List Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Service Page List Details</li>
      </ol>
    </section>
    
    @if(Session::has('submit-status'))
      <p class="login-box-msg" style="color: green;">{{ Session::get('submit-status') }}</p>
    @endif

    <div class="box-footer">
      <a href="/add_services_view"><button type="submit" class="btn btn-primary">Add Services</button></a>
    </div>

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
                  <th>Software Development</th>
                  <th>Mobile Application</th>
                  <th>Web Service</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
                </thead>
                  @if($fetch_service_list)
                    @foreach($fetch_service_list as $value)
                      <tr>
                        <td>{{substr($value['software_development'], 0, 100)}}</td>
                        <td>{{substr($value['mobile_application'], 0, 100)}}</td>
                        <td>{{substr($value['web_development'], 0, 100)}}</td>
                        <td>{{$value['created_at']}}</td>
                        <td><a href="/service_page_edit/{{base64_encode($value['id'])}}" >Edit</a></td>
                      </tr>
                    
                    @endforeach
                  
                  @endif
                <tbody>
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