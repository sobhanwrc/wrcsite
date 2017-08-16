@include('header')
@include('left_sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Portfolio Type Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Portfolio Type Details</li>
      </ol>
    </section>
    
    @if(Session::has('submit-status'))
      <p class="login-box-msg" style="color: green;">{{ Session::get('submit-status') }}</p>
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
                  <th> Portfolio Type</th>
                  <th>Added Date</th>
                  <th>Actione</th>
                </tr>
                </thead>
                  @if($all_portfolio_types)
                    @foreach($all_portfolio_types as $value)
                      <tr>
                        <td>{{$value['portfolio_type']}}</td>
                        <td>{{$value['created_at']}}</td>
                        <td><a href="/portfolio_type_edit/{{base64_encode($value['id'])}}" >Edit</a>&nbsp;|&nbsp;<a href="/portfolio_type_delete/{{base64_encode($value['id'])}}" onclick="return confirm('Are you sure?')">Delete</a></td>
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