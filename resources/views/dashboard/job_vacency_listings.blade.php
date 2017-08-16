@include('header')
@include('left_sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Job Vacency List Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Job Vacency List Details</li>
      </ol>
    </section>
    
    @if(Session::has('submit-status'))
      <p class="login-box-msg" style="color: green;">{{ Session::get('submit-status') }}</p>
    @endif

    <div class="box-footer">
      <a href="/add_job_list"><button type="submit" class="btn btn-primary">Add Job List</button></a>
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
                  <th>Recruit For</th>
                  <th>Exp</th>
                  <th>Salary Range</th>
                  <th>Qualification Need</th>
                  <th>Location</th>
                  <th>Status</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
                </thead>
                  @if($fetch_all_job_vacency)
                    @foreach($fetch_all_job_vacency as $value)
                      <tr>
                        <td>{{$value['recruit_title']}}</td>
                        <td>{{$value['experience']}}</td>
                        <td>{{$value['salary_range']}}</td>
                        <td>{{$value['qualification_needed']}}</td>
                        <td>{{$value['location']}}</td>
                        <td>{{$value['status'] == 1 ? 'Active' : 'Inactive'}}</td>
                        <td>{{$value['created_at']}}</td>
                        <td><a href="/job_vacency_edit/{{base64_encode($value['id'])}}" >Edit</a>&nbsp;|&nbsp;<a href="/job_vacency_delete/{{base64_encode($value['id'])}}" onclick="return confirm('Are you sure?')">Delete</a></td>
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