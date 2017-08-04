<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\website_settings;
use Illuminate\Support\Facades\Mail;
use App\Mail\wrc_email;

class PageController extends Controller
{
    protected function contact_us_submit(Request $request) {

    	$first_name =  $request['data']['myFisrtname'];
    	$last_name = $request['data']['myLastname'];
    	$email = $request['data']['myEmail'];
    	$phone_number = $request['data']['myPhone'];
    	$comment = $request['data']['myComments'];

    	$total_name = $first_name.' '.$last_name;

    	$obj = new Contact();
    	$obj->first_name = $first_name;
    	$obj->last_name = $last_name;
    	$obj->email_id = $email;
    	$obj->mobile_no = $phone_number;
    	$obj->comment = $comment;

    	$save = $obj->save();
    	if($save){
    		//for email//
    		$to_email = 'info@wrctechnologies.com';
    		try{
    			Mail::to($to_email)->send(new wrc_email($total_name,$phone_number,$comment,$email));
    			return response()->json(['code'=>100,'message'=>'succeess']);
    		}catch(\Exception $e){

			    return response()->json(['code'=>500,'message'=>'error']);
			}
    		
    		
    	}

    	
    }

    public function wrc_website_details(){
    	$fetch_details = website_settings::all();
    	return response()->json(['code'=>100 , 'message'=>'fetch successfully','contact_details'=>$fetch_details]);
    }

    protected function load_home_content(Request $request) {
        $banner_details = \App\Home_banner::where('status','1')->get();
        $testimonial_details = \App\Testimonial::where('status','1')->get();
        $portfolio_details = \App\Portfolio::where('status','1')->get();
        return response()->json(['banner_details'=>$banner_details,'testimonial_details'=>$testimonial_details, 'portfolio_details'=>$portfolio_details]);
    }

    protected function job_vacency_details (Request $request) {
        $vacency_details = \App\Job_vacency::where('status', '1')->get();

        return response()->json(['job_details'=>$vacency_details]);
    }

    protected function view_individuals_job_details(Request $request){
        $details = \App\Job_vacency::find($request->job_id);
        
        return response()->json(['details'=>$details]);
    }

   
}
