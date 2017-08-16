@include('header')
@include('left_sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Job Vacency Edit Page
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Job Vacency Edit Page</li>
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
            <form role="form" method="post" name="job_vacency_edit_submit" id="job_vacency_edit_submit" action="/job_vacency_edit_submit/{{base64_encode($fetch_job_details['id'])}}" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group {{ $errors->has('recruit_for') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Recruit For:</label>
                  <input type="text" name="recruit_for" id="recruit_for" class="form-control" value="{{$fetch_job_details['recruit_title']}}">

                  <span class="text-danger">{{ $errors->first('recruit_for') }}</span>
                </div>

                <div class="form-group {{ $errors->has('exp') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Experience:</label>
                  <input type="text" name="exp" id="exp" class="form-control" value="{{$fetch_job_details['experience']}}">

                  <span class="text-danger">{{ $errors->first('exp') }}</span>
                </div>

                <div class="form-group {{ $errors->has('salary_range') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Salary Range:</label>
                  <input type="text" name="salary_range" id="salary_range" class="form-control" value="{{$fetch_job_details['salary_range']}}">

                  <span class="text-danger">{{ $errors->first('salary_range') }}</span>
                </div>

                <div class="form-group {{ $errors->has('qualifications') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Qualification Need:</label>
                  <input type="text" name="qualifications" id="qualifications" class="form-control" value="{{$fetch_job_details['qualification_needed']}}">

                  <span class="text-danger">{{ $errors->first('qualifications') }}</span>
                </div>

                <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Loaction:</label>
                  <input type="text" name="location" id="location" class="form-control" value="{{$fetch_job_details['location']}}">

                  <span class="text-danger">{{ $errors->first('location') }}</span>
                </div>

                <div class="form-group {{ $errors->has('editor1') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Desired Candidate Profile:</label>
                  <textarea rows="7" class="form-control" id="editor1" name="editor1" >
                    {{$fetch_job_details['desired_candidate_profile']}}
                  </textarea>

                  <span class="text-danger">{{ $errors->first('editor1') }}</span>
                </div>


                <div class="form-group {{ $errors->has('tech_skills') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Technical Skills:</label>
                  <textarea rows="7" class="form-control" id="tech_skills" name="tech_skills" >
                    {{$fetch_job_details['technical_skills']}}
                  </textarea>

                  <span class="text-danger">{{ $errors->first('tech_skills') }}</span>
                </div>


                <div class="form-group {{ $errors->has('soft_skills') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Soft Skills:</label>
                  <textarea rows="7" class="form-control" id="soft_skills" name="soft_skills" >
                    {{$fetch_job_details['soft_skills']}}
                  </textarea>

                  <span class="text-danger">{{ $errors->first('soft_skills') }}</span>
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
     CKEDITOR.replace('editor1');
     CKEDITOR.replace('tech_skills');
     CKEDITOR.replace('soft_skills');    
</script>