@include('header')
@include('left_sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Portfolios Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Portfolios Details</li>
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
                  <th> Portfolio Name</th>
                  <th> Portfolio Image</th>
                  <th> Portfolio Type</th>
                  <th> Added Date</th>
                  <th> Actione</th>
                </tr>
                </thead>
                  @if($details_portfolio)
                    @foreach($details_portfolio as $value)
                      <tr>
                        <td>{{$value['portfolio_name']}}</td>
                        <td><img src="{{url('upload/banner/resize/'.$value['portfolio_image'])}}" width="100" height="100"></td>
                        <td>{{$value['portfolio_type_name']}}</td>
                        <td>{{$value['created_at']}}</td>
                        <td><a href="/portfolios_listings_edit/{{base64_encode($value['id'])}}" >Edit</a>&nbsp;|&nbsp;<a href="/portfolios_listings_delete/{{base64_encode($value['id'])}}" onclick="return confirm('Are you sure?')">Delete</a></td>
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