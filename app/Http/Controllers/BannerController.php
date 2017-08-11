<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Home_banner;
use App\Testimonial;
use App\Portfolio;
use App\poprtfolio_type;
use App\website_settings;
use App\User;
use App\Job_vacency;
use Auth;
use Image;

class BannerController extends Controller
{
    public function index(){
    	return view('dashboard.home_banner_page');
    }

    public function home_silder_view(){
    	$fetch_details = Home_banner::all();

    	return view('dashboard.home_slider_banner')->with('fetch_details',$fetch_details);
    }

    public function banner_submit(Request $request){
    	Validator::make($request->all(),[
    		'header1' => 'required',
    		'header2' => 'required',
    		'exampleInputFile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		], [
		    'header1.required' => 'Please enter header1',
    		'header2.required' => 'Please enter header1',
    		'exampleInputFile.required' => 'Please choose heder image',
    		'exampleInputFile.image|mimes:jpeg,png,jpg,gif,svg' => 'Please choose proper image type',
    		'exampleInputFile.max:2048' => 'Maximum file size should be 2 MB'
		])->validate();

    	if($request->hasFile('exampleInputFile')) {
          $file = $request->file('exampleInputFile') ;

          $fileName = time().'_'.$file->getClientOriginalName() ;

          //thumb destination path
          
          $destinationPath_2 = public_path().'/upload/banner/resize' ;

          $img = Image::make($file->getRealPath());

          
          $img->resize(1920, 500, function ($constraint){
              $constraint->aspectRatio();
          })->save($destinationPath_2.'/'.$fileName);

          //original destination path
          $destinationPath = public_path().'/upload/banner/original/' ;
          $file->move($destinationPath,$fileName);
        }
        else {
          $fileName = '';
        }

    	//getting value from view page
  		$header1 = $request->header1;
  		$header2 = $request->header2;

  		//insert data into the database with create object fo model
  		$obj = new Home_banner();
  		$obj->banner1 = $header1;
  		$obj->banner2 = $header2;
  		$obj->banner_image = $fileName;
  		$obj->status = '1';

  		$save = $obj->save();

  		if($save){
  			$request->session()->flash("submit-status", "Added successfully.");
  			return redirect('/banner_form');
  		}

    }

    public function banner_edit($banner_id){
      $id = base64_decode($banner_id);
      //fetch query for edit
      $banner_list = Home_banner::find($id)->toArray();

      return view('dashboard.home_banner_page_edit')->with('banner_list',$banner_list);
    } 

    public function banner_edit_submit(Request $request, $banner_id){
      $id = base64_decode($banner_id);

      Validator::make($request->all(),[
        'header1' => 'required',
        'header2' => 'required',
        'exampleInputFile' => 'required_with|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
      ], [
        'header1.required' => 'Please enter header1',
        'header2.required' => 'Please enter header1',
        'exampleInputFile.required_with' => 'Please choose heder image',
        'exampleInputFile.image|mimes:jpeg,png,jpg,gif,svg' => 'Please choose proper image type',
        'exampleInputFile.max:2048' => 'Maximum file size should be 2 MB'
      ])->validate();

      if($request->hasFile('exampleInputFile')) {
        $file = $request->file('exampleInputFile') ;

        $fileName = time().'_'.$file->getClientOriginalName() ;

        //thumb destination path
        
        $destinationPath_2 = public_path().'/upload/banner/resize' ;

        $img = Image::make($file->getRealPath());

        
        $img->resize(1920, 500, function ($constraint){
            $constraint->aspectRatio();
        })->save($destinationPath_2.'/'.$fileName);

        //original destination path
        $destinationPath = public_path().'/upload/banner/original/' ;
        $file->move($destinationPath,$fileName);
      }
      else {
        $fileName = $request->header_image;
      }

      //update
      $banner_list = Home_banner::find($id);
      $banner_list->banner1 = $request->header1;
      $banner_list->banner2 = $request->header2;
      $banner_list->banner_image = $fileName;
      $banner_list->save();

      if($banner_list->save()){
        $request->session()->flash("submit-status", "Edit successfully.");
        return redirect('/home_page_slider');
      }
    }
    

    public function banner_edit_delete(Request $request,$banner_id){
      $id = base64_decode($banner_id);

      $banner_list = Home_banner::find($id);
      //for delete query
      if($banner_list->delete()) {
        $request->session()->flash("submit-status", "Banner deleted successfully");
        return redirect('/home_page_slider');
      }

    }

    public function testimonial_form(){
      return view('dashboard.testimonial_form');
    }

    public function testimonial_submit(Request $request){
      validator::make($request->all(),[
        'header1' => 'required',
        'client_name' => 'required',
        'company_name' => 'required'
      ], [
        'header1.required' => 'Please enter what client say about us',
        'client_name.required' => 'Please enter client name',
        'company_name.required' => 'Please enter company name'
      ])->validate();

      //getting value from view page
      $header1 = $request->header1;
      $client_name = $request->client_name;
      $company_name = $request->company_name;

      //insert data into the database with create object fo model
      $obj = new Testimonial();
      $obj->client_name = $client_name;
      $obj->company_name = $company_name;
      $obj->client_sdays = $header1;
      $obj->status = '1';

      $save = $obj->save();

      if($save){
        $request->session()->flash("submit-status", "Testimonial added successfully.");
        return redirect('/testimonial_form');
      }
    }

    public function testimonial_listings(){
      $fetch_all_testimonial = Testimonial::all();

      return view('dashboard.testimonial_listings')->with('fetch_all_testimonial', $fetch_all_testimonial);
    }

    public function testimonial_edit($testimonial_id){
      $id = base64_decode($testimonial_id);

      $fetch_details = Testimonial::find($id)->toArray();
      return view('dashboard.testimonial_edit')->with('fetch_details',$fetch_details);
    }

    public function testimonial_edit_submit(Request $request, $testimonial_id){
      $id = base64_decode($testimonial_id);

      validator::make($request->all(),[
        'header1' => 'required',
        'client_name' => 'required',
        'company_name' => 'required'
      ],[
        'header1.required' => 'Please enter client says',
        'client_name.required' => 'Please enter client name',
        'company_name.required' => 'Please enter company name'
      ])->validate();

      $testimonial_list = Testimonial::find($id);
      $testimonial_list->client_sdays = $request->header1;
      $testimonial_list->client_name = $request->client_name;
      $testimonial_list->company_name = $request->company_name;

      if($testimonial_list->save()){
        $request->session()->flash("submit-status", "Edit successfully.");
        return redirect('/testimonial_listings');
      }
    }

    public function testimonial_delete(Request $request, $testimonial_id){
      $id = base64_decode($testimonial_id);

      $testimonial_list = Testimonial::find($id);
      if($testimonial_list->delete()){
        $request->session()->flash("submit-status", "Testimonial deleted successfully");
        return redirect('/testimonial_listings');
      }
    }

    public function protfolio_form(){
      //fetch condition by whrer clause and order by
      $fetch_portfolio_type_details = poprtfolio_type::where('status','1')->orderby('id','desc')
                                                                          ->get()->toArray();
                                                                          
      return view('dashboard.portfolio')->with('fetch_portfolio_type_details',$fetch_portfolio_type_details);
    }

    public function portfolio_form_submit(Request $request){
      Validator::make($request->all(),[
        'portfolio_name' => 'required',
        'portfolio_url' => 'required',
        'portfolio_type' => 'required',
        'portfolio_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
      ], [
        'portfolio_name.required' => 'Please enter portfolio name',
        'portfolio_url.required' => 'Please enter portfolio url',
        'portfolio_type.required' => 'Please select portfolio type',
        'portfolio_image.required' => 'Please choose portfolio image',
        'portfolio_image.image|mimes:jpeg,png,jpg,gif,svg' => 'Please choose proper image type',
        'portfolio_image.max:2048' => 'Maximum file size should be 2 MB'
      ])->validate();

      if($request->hasFile('portfolio_image')) {
        $file = $request->file('portfolio_image') ;

        $fileName = time().'_'.$file->getClientOriginalName() ;

        //thumb destination path
        
        $destinationPath_2 = public_path().'/upload/banner/resize' ;

        $img = Image::make($file->getRealPath());

        
        $img->resize(350, 262, function ($constraint){
            $constraint->aspectRatio();
        })->save($destinationPath_2.'/'.$fileName);

        //original destination path
        $destinationPath = public_path().'/upload/banner/original/' ;
        $file->move($destinationPath,$fileName);
      }
      else {
        $fileName = '';
      }

      //getting value from view page
      $portfolio_name = $request->portfolio_name;
      $portfolio_type = $request->portfolio_type;

      //insert data into the database with create object fo model
      $obj = new Portfolio();
      $obj->portfolio_type = $portfolio_type;
      $obj->portfolio_url = $portfolio_url;
      $obj->portfolio_name = $portfolio_name;
      $obj->portfolio_image = $fileName;
      $obj->status = '1';

      $save = $obj->save();

      if($save){
        $request->session()->flash("submit-status", "Added successfully.");
        return redirect('/protfolio_form');
      }
    }

    public function protfolio_type(){
      return view('dashboard.portfolio_type');
    }

    public function portfolio_type_submit(Request $request){
      Validator::make($request->all(),[
        'portfolio_type' => 'required'
      ], [
        'portfolio_type.required' => "Please enter portfolio type"
      ])->validate();

      $obj = new poprtfolio_type();
      $obj->portfolio_type = $request->portfolio_type;
      $obj->status = '1';
      $save = $obj->save();

      if($save){
        $request->session()->flash("submit-status", "Add successfully.");
        return redirect('/protfolio_type');
      }
    }

    public function portfolio_type_listings(){
      $all_portfolio_types = poprtfolio_type::where('status','1')->orderby('id','desc')
                                                                ->get()->toArray();

      return view('dashboard.portfolio_type_listings')->with('all_portfolio_types', $all_portfolio_types);
    }

    public function portfolio_type_edit($portfolio_type_id){
      $id = base64_decode($portfolio_type_id);

      $details = poprtfolio_type::where('id', $id)->get()->toArray();

      return view('dashboard.portfolio_type_edit')->with('portfolio_details', $details[0]);
    }

    public function portfolio_type_edit_submit(Request $request, $portfolio_type_id){
      $id = base64_decode($portfolio_type_id);

      Validator::make($request->all(), [
        'portfolio_type' => 'required'
      ], [
        'portfolio_type.required' => "Please enter your portfolio type"
      ])->validate();

      //edit record
      $details = poprtfolio_type::find($id);
      $details->portfolio_type = $request->portfolio_type;
      if($details->save()){
        $request->session()->flash("submit-status", "Edit successfully.");
        return redirect('/portfolio_listings');
      }

    }

    public function portfolio_type_delete(Request $request,$portfolio_type_id){
      $id = base64_decode($portfolio_type_id);

      $portfolio_delete = poprtfolio_type::find($id);
      if($portfolio_delete->delete()){
        $request->session()->flash("submit-status", "Delete successfully.");
        return redirect('/portfolio_listings');
      }
    }

    public function website_settings_listings(){
      $all_website_detials = website_settings::all();
      return view('dashboard.website_settings_listings')->with('all_website_detials',$all_website_detials);
    }

    public function website_settings_edit($website_id){
      $id = base64_decode($website_id);

      $details = website_settings::find($id)->toArray();
      return view('dashboard.website_settings_edit')->with('website_settings_details', $details);
    }

    public function website_details_submit(Request $request, $id){
      $id = base64_decode($id);

      $company_name = $request->company_name;
      $company_email = $request->company_email;
      $company_phone_no = $request->company_phone_no;
      $company_addresss = $request->company_addresss;
      $company_aboutus = $request->company_aboutus;
      $company_fb_link = $request->company_fb_link;
      $company_twiter_link = $request->company_twiter_link;
      $company_linkin_link = $request->company_linkin_link;

      $fetch_record = website_settings::find($id);

      $fetch_record->company_name = $company_name;
      $fetch_record->company_email = $company_email;
      $fetch_record->company_phone_no = $company_phone_no;
      $fetch_record->company_address = $company_addresss;
      $fetch_record->company_aboutus = $company_aboutus;
      $fetch_record->company_fb_link = $company_fb_link;
      $fetch_record->company_twiter_link = $company_twiter_link;
      $fetch_record->company_linkin_link = $company_linkin_link;

      if($fetch_record->save()){
        echo 1;
        exit();
      }else{
        echo 2;
        exit();
      }
    }

    public function show_profile(){
      //'admin' is middleware name. It is user for session Auth.....
      $email = Auth::guard('admin')->user()->email;

      $fetch_admin_details = User::where('email',$email)->get()->toArray();

      return view('dashboard.profile')->with('fetch_admin_details', $fetch_admin_details[0]);
    }

    public function profile_submit(Request $request, $user_id){
      $id = base64_decode($user_id);

      $name = $request->inputName;
      $phone_no = $request->phone_number;
      $address = $request->address;
      

      if($file = $request->file('profile_image')) {
        $file = $request->file('profile_image') ;

        $fileName = time().'_'.$file->getClientOriginalName() ;

        //thumb destination path
        
        $destinationPath_2 = public_path().'/upload/profile_image/resize' ;

        $img = Image::make($file->getRealPath());

        
        $img->resize(128, 128, function ($constraint){
            $constraint->aspectRatio();
        })->save($destinationPath_2.'/'.$fileName);

        //original destination path
        $destinationPath = public_path().'/upload/profile_image/original/' ;
        $file->move($destinationPath,$fileName);
      }
      else {
        $fileName = $request->exit_profile_image;
      }

      $obj = User::find($id);
      $obj->name = $name;
      $obj->phone_number = $phone_no;
      $obj->profile_image = $fileName;
      $obj->address = $address;

      if($obj->save()){
        echo 1;
        exit;
      }else{
        echo 2;
        exit;
      }

    }

    public function portfolios_listings(){
      $details_portfolio = Portfolio::where('status','1')->get()->toArray();

      foreach ($details_portfolio as $key => $value) {
        $type = $value['portfolio_type'];

        $name_of_type = poprtfolio_type::where('id', $type)->get()->toArray();
        $name_of_portfolio_type = $name_of_type[0]['portfolio_type'];

        $details_portfolio[$key]['portfolio_type_name'] = $name_of_portfolio_type;
      }

      return view('dashboard.portfolios_listings')->with('details_portfolio',$details_portfolio);
    }

    public function portfolios_edit_page($portfolio_id){
      $id = base64_decode($portfolio_id);
      $portfolio = Portfolio::find($id)->toArray();

      $fetch_portfolio_type_details = poprtfolio_type::where('status','1')->orderby('id','desc')
                                                                          ->get()->toArray();


      return view('dashboard.portfolio_edit_page')->with('portfolio',$portfolio)
                                                  ->with('fetch_portfolio_type_details',$fetch_portfolio_type_details);

    }

    public function portfolios_edit_page_submit(Request $request, $portfolios_edit_id){
      $id = base64_decode($portfolios_edit_id);

      Validator::make($request->all(),[
        'portfolio_name' => 'required',
        'portfolio_url' => 'required',
        'portfolio_type' => 'required',
        'portfolio_image' => 'required_with|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
      ], [
        'portfolio_name.required' => 'Please enter portfolio name',
        'portfolio_url.required' => 'Please enter portfolio url',
        'portfolio_type.required' => 'Please select portfolio type',
        'portfolio_image.required_with' => 'Please choose portfolio image',
        'portfolio_image.image|mimes:jpeg,png,jpg,gif,svg' => 'Please choose proper image type',
        'portfolio_image.max:2048' => 'Maximum file size should be 2 MB'
      ])->validate();

      if($request->hasFile('portfolio_image')) {
        $file = $request->file('portfolio_image') ;

        $fileName = time().'_'.$file->getClientOriginalName() ;

        //thumb destination path
        
        $destinationPath_2 = public_path().'/upload/banner/resize' ;

        $img = Image::make($file->getRealPath());

        
        $img->resize(350, 262, function ($constraint){
            $constraint->aspectRatio();
        })->save($destinationPath_2.'/'.$fileName);

        //original destination path
        $destinationPath = public_path().'/upload/banner/original/' ;
        $file->move($destinationPath,$fileName);
      }
      else {
        $fileName = $request->portfolio_image;
      }

      $portfolio_name = $request->portfolio_name;
      $portfolio_type = $request->portfolio_type;

      $fetch_portfolios = Portfolio::find($id);
      $fetch_portfolios->portfolio_name = $portfolio_name;
      $fetch_portfolios->portfolio_url = $portfolio_url;
      $fetch_portfolios->portfolio_type = $portfolio_type;
      $fetch_portfolios->portfolio_image = $fileName;
      $fetch_portfolios->status = 1;

      if($fetch_portfolios->save()){
        $request->session()->flash("submit-status", "Added successfully.");
        return redirect('/prtfolios_listings');
      }

    }

    public function portfolios_listings_delete(Request $request,$portfolio_id){
      $id = base64_decode($portfolio_id);

      $fetch = Portfolio::find($id);
      $fetch->status = 5;

      if($fetch->save()){
        $request->session()->flash("submit-status", "Delete successfully.");
        return redirect('/prtfolios_listings');
      }

    }

    public function job_vacency_listings(){
      $fetch_all_job_vacency = Job_vacency::where('status',1)->orderby('id', 'desc')
                                                            ->get()->toArray();

      return view('dashboard.job_vacency_listings')->with('fetch_all_job_vacency', $fetch_all_job_vacency);
    }

    public function add_job_list(){
      return view('dashboard.job_list_add');
    }

    public function job_vacency_add (Request $request) {
      Validator::make($request->all(),[
        'recruit_for' => 'required',
        'exp' => 'required',
        'salary_range' => 'required',
        'location' => 'required',
        'editor1' => 'required',
        'tech_skills' => 'required',
        'soft_skills' => 'required',
        'qualifications' => 'required'
      ],[
        'recruit_for.required' => 'Please enter title.',
        'exp.required' => 'Please enter experience.',
        'salary_range.required' => 'Please enter salary range.',
        'location.required' => 'Please enter location.',
        'editor1.required' => 'Please enter desired candidate profile.',
        'tech_skills.required' => 'Please enter technical skills.',
        'soft_skills.required' => 'Please enter soft skills.',
        'qualifications.required' => 'Please enter qualification.'
      ])->validate();

      $add = new Job_vacency();
      $add->recruit_title = $request->recruit_for;
      $add->experience = $request->exp;
      $add->location = $request->location;
      $add->salary_range = $request->salary_range;
      $add->desired_candidate_profile = $request->editor1;
      $add->technical_skills = $request->tech_skills;
      $add->soft_skills = $request->soft_skills;
      $add->qualification_needed = $request->qualifications;
      $add->status = 1;

      if($add->save()){
        $request->session()->flash("submit-status", "Job added successfully.");
        return redirect('/job_vacency_list');
      }
    }

    public function job_vacency_edit($job_id){
      $id = base64_decode($job_id);

      $fetch_job_details = Job_vacency::find($id)->toArray();

      return view('dashboard.job_vacency_edit_page')->with('fetch_job_details', $fetch_job_details);
    }

    public function job_vacency_edit_submit(Request $request, $job_id) {
      $id = base64_decode($job_id);

      Validator::make($request->all(),[
        'recruit_for' => 'required',
        'exp' => 'required',
        'salary_range' => 'required',
        'location' => 'required',
        'editor1' => 'required',
        'tech_skills' => 'required',
        'soft_skills' => 'required',
        'qualifications' => 'required'
      ],[
        'recruit_for.required' => 'Please enter title.',
        'exp.required' => 'Please enter experience.',
        'salary_range.required' => 'Please enter salary range.',
        'location.required' => 'Please enter location.',
        'editor1.required' => 'Please enter desired candidate profile.',
        'tech_skills.required' => 'Please enter technical skills.',
        'soft_skills.required' => 'Please enter soft skills.',
        'qualifications.required' => 'Please enter qualification.'
      ])->validate();

      $edit = Job_vacency::find($id);
      $edit->recruit_title = $request->recruit_for;
      $edit->experience = $request->exp;
      $edit->location = $request->location;
      $edit->salary_range = $request->salary_range;
      $edit->desired_candidate_profile = $request->editor1;
      $edit->technical_skills = $request->tech_skills;
      $edit->soft_skills = $request->soft_skills;
      $edit->qualification_needed = $request->qualifications;

      if($edit->save()){
        $request->session()->flash("submit-status", "Job edit successfully.");
        return redirect('/job_vacency_list');
      }
    }

    public function job_vacency_delete(Request $request, $job_id) {
      $id = base64_decode($job_id);

      $delete = Job_vacency::find($id);
      $delete->status = 5;

      if($delete->save()){
        $request->session()->flash("submit-status", "Job deleted successfully.");
        return redirect('/job_vacency_list');
      }
    }

    public function service_page_list(){
      $fetch_list = website_settings::select('id','software_development','mobile_application','web_development','created_at')->get()->toArray();

      return view('dashboard.service_page_listings')->with('fetch_service_list',$fetch_list);
    }

    public function add_services_view(){
      return view('dashboard.add_services_view');
    }

    public function services_add_submit(Request $request){
      validator::make($request->all(),[
        'sofware_service' => 'required',
        'mobile_application' => 'required',
        'web_service' => 'required'
      ],[
        'sofware_service.required' => 'Please enter software service deatils',
        'mobile_application.required' => 'Please enter mobile application deatils',
        'web_service.required' => 'Please enter web service deatils'
      ])->validate();

      $fetch_details_of_wrc = website_settings::find('1');
      $fetch_details_of_wrc->software_development = $request->sofware_service;
      $fetch_details_of_wrc->mobile_application = $request->mobile_application;
      $fetch_details_of_wrc->web_development = $request->web_service;

      if($fetch_details_of_wrc->save()){
        $request->session()->flash("submit-status", "Services added successfully.");
        return redirect('/service_page_list');
      }
    }

    public function service_page_edit($service_id){
      $id = base64_decode($service_id);

      $fetch_details = website_settings::select('id','software_development','mobile_application','web_development')->where('id',$id)->get()->toArray();

      return view('dashboard.service_page_edit')->with('fetch_details',$fetch_details[0]);
    }

    public function services_page_edit_submit(Request $request,$service_id){
      $id = base64_decode($service_id);

      validator::make($request->all(),[
        'sofware_service' => 'required',
        'mobile_application' => 'required',
        'web_service' => 'required'
      ],[
        'sofware_service.required' => 'Please enter software service deatils',
        'mobile_application.required' => 'Please enter mobile application deatils',
        'web_service.required' => 'Please enter web service deatils'
      ])->validate();

      $details = website_settings::find($id);
      $details->software_development = $request->sofware_service;
      $details->mobile_application = $request->mobile_application;
      $details->web_development = $request->web_service;

      if($details->save()){
        $request->session()->flash("submit-status", "Services edit successfully.");
        return redirect('/service_page_list');
      }
    }
}
