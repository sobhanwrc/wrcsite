@include('header')
@include('left_sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Company Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Company Details</li>
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
            <form role="form" method="post" name="website_edit_submit" id="website_edit_submit" action="javascript:void(0)" enctype="multipart/form-data">
            {{-- {{ csrf_field() }} --}}

              <div class="box-body">
                <div class="form-group {{ $errors->has('company_name') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Company Name:</label>
                  
                  <input type="text" name="company_name" id="company_name" value="{{$website_settings_details['company_name']}}" class="form-control">

                  <span class="text-danger">{{ $errors->first('company_name') }}</span>
                </div>
                <div class="form-group {{ $errors->has('company_email') ? 'has-error' : '' }}">
                  <label for="exampleInputPassword1">Company Email:</label>
                  <input type="text" class="form-control" name="company_email" id="company_email" placeholder="Client Name" value="{{ $website_settings_details['company_email'] }}">
                  <span class="text-danger">{{ $errors->first('company_email') }}</span>
                </div>
                <div class="form-group {{ $errors->has('company_phone_no') ? 'has-error' : '' }}">
                  <label for="exampleInputPassword1">Company Phone Number:</label>
                  <input type="text" class="form-control" name="company_phone_no" id="company_phone_no" placeholder="Company Name" value="{{ $website_settings_details['company_phone_no'] }}">
                  <span class="text-danger">{{ $errors->first('company_phone_no') }}</span>
                </div>

                <div class="form-group {{ $errors->has('company_addresss') ? 'has-error' : '' }}">
                  <label for="exampleInputPassword1">Company Address:</label>
                  <textarea cols="" rows="" class="form-control" id="company_addresss" placeholder="Header 1" name="company_addresss">{{$website_settings_details['company_address']}}</textarea>
                  
                  <span class="text-danger">{{ $errors->first('company_addresss') }}</span>
                </div>

                <div class="form-group {{ $errors->has('company_aboutus') ? 'has-error' : '' }}">
                  <label for="exampleInputPassword1">Company AboutUs:</label>
                  <textarea cols="" rows="" class="form-control" id="company_aboutus" placeholder="Header 1" name="company_aboutus">{{$website_settings_details['company_aboutus']}}</textarea>
                  
                  <span class="text-danger">{{ $errors->first('company_aboutus') }}</span>
                </div>

                <div class="form-group {{ $errors->has('company_fb_link') ? 'has-error' : '' }}">
                  <label for="exampleInputPassword1">Company FB Link:</label>
                  <input type="text" class="form-control" name="company_fb_link" id="company_fb_link" placeholder="Company FB Link" value="{{ $website_settings_details['company_fb_link'] }}">
                  <span class="text-danger">{{ $errors->first('company_fb_link') }}</span>
                </div>

                <div class="form-group {{ $errors->has('company_twiter_link') ? 'has-error' : '' }}">
                  <label for="exampleInputPassword1">Company Twiter Link:</label>
                  <input type="text" class="form-control" name="company_twiter_link" id="company_twiter_link" placeholder="Company FB Link" value="{{ $website_settings_details['company_twiter_link'] }}">
                  <span class="text-danger">{{ $errors->first('company_twiter_link') }}</span>
                </div>

                <div class="form-group {{ $errors->has('company_linkin_link') ? 'has-error' : '' }}">
                  <label for="exampleInputPassword1">Company Linkedin Link:</label>
                  <input type="text" class="form-control" name="company_linkin_link" id="company_linkin_link" placeholder="Company FB Link" value="{{ $website_settings_details['company_linkin_link'] }}">
                  <span class="text-danger">{{ $errors->first('company_linkin_link') }}</span>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" id="website_details_submit" class="btn btn-primary">Edit</button>
                <input type="hidden" name="website_details_id" id="website_details_id" value="{{ base64_encode($website_settings_details['id'])}}">
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
  $(document).ready(function(){
    $('#website_edit_submit').validate({
      rules:{
        company_name:{
          required: true
        },
        company_email:{
          required: true,
          email: true
        },
        company_phone_no:{
          required: true,
          number: true,
          maxlength: 10,
          minlength: 10
        },
        company_addresss:{
          required: true
        },
        company_aboutus:{
          required: true
        },
        company_fb_link:{
          required: true
        },
        company_twiter_link:{
          required: true
        },
        company_linkin_link:{
          required: true
        }
      },
      messages:{
        company_name:{
          required: "<font color='red'>Please enter company name</font>"
        },
        company_email:{
          required: "<font color='red'>Please enter company email</font>",
          email: "<font color='red'>Email is invalid</font>"
        },
        company_phone_no:{
          required: "<font color='red'>Please enter company phone number</font>",
          number: "<font color='red'>Phone number should be digit</font>",
          maxlength: "<font color='red'>Please enter 10 digit phone number</font>",
          minlength: "<font color='red'>Please enter 10 digit phone number</font>"
        },
        company_addresss:{
         required: "<font color='red'>Please enter company address</font>"
        },
        company_aboutus:{
          required: "<font color='red'>Please enter company about us</font>"
        },
        company_fb_link:{
          required: "<font color='red'>Please enter company facebook link</font>"
        },
        company_twiter_link:{
          required: "<font color='red'>Please enter company twiter link</font>"
        },
        company_linkin_link:{
          required: "<font color='red'>Please enter company linkedin link</font>"
        }
      }
    });

    $('#website_details_submit').on('click',function(){

      var valid = $('#website_edit_submit').valid();
      if(valid){
        // for ajax submit we need to send csrf token in data (syntex:_token: "{{ csrf_token() }}")
        var id = $('#website_details_id').val();
        var company_name = $('#company_name').val();
        var company_email = $('#company_email').val();
        var company_phone_no = $('#company_phone_no').val();
        var company_addresss = $('#company_addresss').val();
        var company_aboutus = $('#company_aboutus').val();
        var company_fb_link = $('#company_fb_link').val();
        var company_twiter_link = $('#company_twiter_link').val();
        var company_linkin_link = $('#company_linkin_link').val();

        $.ajax({
          type: "POST",
          url: "/website_details_submit/" + id,
          data:{
            company_name: company_name,
            company_email: company_email,
            company_phone_no: company_phone_no,
            company_addresss: company_addresss,
            company_aboutus: company_aboutus,
            company_fb_link: company_fb_link,
            company_twiter_link: company_twiter_link,
            company_linkin_link: company_linkin_link,
            _token: "{{ csrf_token() }}"
          },
          success: function(data){
            if(data == 1){
              $.confirm({
                  title: 'Confirmation!',
                  content: 'Edit successfully',
                  buttons: {
                      OK: function () {
                        window.location.href="/website_settings_listings";  
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
      

    });

  });
</script>