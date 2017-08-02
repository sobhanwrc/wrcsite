@include('header')
@include('left_sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
            <?php if(empty($fetch_admin_details['profile_image'])){?>
              <img class="profile-user-img img-responsive img-circle" src="{{ url('/upload/profile_image/default.png')}}" alt="User profile picture">
            <?php }else{ ?>
              <img class="profile-user-img img-responsive img-circle" src="{{ url('/upload/profile_image/resize/' .$fetch_admin_details['profile_image'])}}" alt="User profile picture">
            <?php } ?>

              <h3 class="profile-username text-center">{{$fetch_admin_details['name']}}</h3>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              {{-- <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
              <li><a href="#timeline" data-toggle="tab">Timeline</a></li> --}}
              <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">

              <div class="tab-pane active" id="settings">
                <form class="form-horizontal" method="post" name="profile_submit" id="profile_submit" action="javscript:void(0)">
                {{ csrf_field() }}
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" value="{{$fetch_admin_details['name']}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input readonly="" type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" value="{{$fetch_admin_details['email']}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Phone Number</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Phone Number" value="{{$fetch_admin_details['phone_number']}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="{{$fetch_admin_details['address']}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Profile Image</label>

                    <div class="col-sm-10">
                      <input type="file" class="form-control" name="profile_image" id="profile_image" placeholder="Profile Image">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button id="submit" name="submit" type="submit" class="btn btn-danger">Edit</button>
                      <input type="hidden" name="user_id" id="user_id" value="{{base64_encode($fetch_admin_details['id'])}}" >
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('footer')

<script type="text/javascript">
	$(document).ready(function(){
		$('#profile_submit').validate({
			rules:{
				inputName:{
					required: true
				},
				inputEmail:{
					required: true,
					email: true
				},
				phone_number:{
					required: true,
					number: true,
					minlength: 10,
					maxlength: 10
				},
				address:{
					required: true
				},
        profile_image:{
          required: true
        }
			},
			messages:{
				inputName:{
					required: "<font color='red'>Please enter your name</font>"
				},
				inputEmail:{
					required: "<font color='red'>Please enter your email</font>",
					email: "<font color='red'>Please enter valid email</font>"
				},
				phone_number:{
					required: "<font color='red'>Please enter your phone nmuber</font>",
					number: "<font color='red'>Phone number should be a digit</font>",
					minlength: "<font color='red'>Phone number should be a 10 digit</font>",
					maxlength: "<font color='red'>Phone number should be a 10 digit</font>"
				},
				address:{
					required: "<font color='red'>Please enter your address</font>"
				},
        profile_image:{
          required: "<font color='red'>Please select your profile image</font>"
        }
			}
		});

		$('#submit').on('click',function(){
			var valid = $('#profile_submit').valid();
			if(valid){
        var id = $('#user_id').val();
				var image = $('#profile_image').prop('files')[0];
				var file_ext = image.name.split('.').pop();

        var form_data = new FormData($("#profile_submit").get(0));

				if(file_ext != 'jpg' && file_ext != 'jpeg' && file_ext != 'png'){
					$.alert({
						title: "Alert !",
						content: "File extansion should be jpg or jpeg or png",
						buttons: {
              OK: function () {
                	
              }
          	}
					});
				}else{
					$.ajax({
						type: "POST",
						url: "/profile_submit/" + id,
						data:form_data,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,

            success: function(data){
              if(data == 1){
                $.confirm({
                    title: 'Confirmation!',
                    content: 'Edit successfully',
                    buttons: {
                        OK: function () {
                          window.location.reload();  
                        },
                        cancel: function () {
                        }
                    }
                });
              }

              if(data == 2){
                $.alert({
                  title: 'Alert!',
                  content: 'Edit failed',
                  buttons: {
                      OK: function () {
                          
                      }
                  }
                });
              }
            }
					});
				}



			}
		});
	});
</script>