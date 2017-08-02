@include('header')
@include('left_sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Job Vacency Add Page
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Job Vacency Add Page</li>
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
            <form role="form" method="post" name="banner_edit_submit" id="banner_edit_submit" action="/job_vacency_add" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group {{ $errors->has('recruit_for') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Recruit For:</label>
                  <input type="text" name="recruit_for" id="recruit_for" class="form-control">

                  <span class="text-danger">{{ $errors->first('recruit_for') }}</span>
                </div>

                <div class="form-group {{ $errors->has('exp') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Experience:</label>
                  <input type="text" name="exp" id="exp" class="form-control">

                  <span class="text-danger">{{ $errors->first('exp') }}</span>
                </div>

                <div class="form-group {{ $errors->has('salary_range') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Salary Range:</label>
                  <input type="text" name="salary_range" id="salary_range" class="form-control">

                  <span class="text-danger">{{ $errors->first('salary_range') }}</span>
                </div>

                <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Loaction:</label>
                  <input type="text" name="location" id="location" class="form-control">

                  <span class="text-danger">{{ $errors->first('location') }}</span>
                </div>

                <div class="form-group {{ $errors->has('editor1') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Desired Candidate Profile:</label>
                  <textarea rows="7" class="form-control" id="editor1" name="editor1" ></textarea>

                  <span class="text-danger">{{ $errors->first('editor1') }}</span>
                </div>


                <div class="form-group {{ $errors->has('tech_skills') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Technical Skills:</label>
                  <textarea rows="7" class="form-control" id="tech_skills" name="tech_skills" ></textarea>

                  <span class="text-danger">{{ $errors->first('tech_skills') }}</span>
                </div>


                <div class="form-group {{ $errors->has('soft_skills') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Soft Skills:</label>
                  <textarea rows="7" class="form-control" id="soft_skills" name="soft_skills" ></textarea>

                  <span class="text-danger">{{ $errors->first('soft_skills') }}</span>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Add</button>
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