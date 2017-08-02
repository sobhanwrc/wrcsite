@include('header')
@include('left_sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Home Page Banner Sider Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Home Page Banner Sider Details</li>
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
                  <th>Heading 1</th>
                  <th>Heading 2</th>
                  <th>Heading Images</th>
                  <th>Added Date</th>
                  <th>Actione</th>
                </tr>
                </thead>
                  @if($fetch_details)
                    @foreach($fetch_details as $value)
                      <tr>
                        <td>{{$value->banner1}}</td>
                        <td>{{$value->banner2}}</td>
                        <td><img src="{{ url('/upload/banner/resize/' .$value->banner_image)}}" width="100" height="100" alt="{{$value->banner_image}}"></td>
                        
                         <td> {{$value->created_at}} </td>
                        <td><a href="/home_banner_edit/{{base64_encode($value->id)}}" >Edit</a>&nbsp;|&nbsp;<a href="/home_banner_delete/{{base64_encode($value->id)}}" onclick="return confirm('Are you sure?')">Delete</a></td>
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