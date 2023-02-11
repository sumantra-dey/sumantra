<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Redirect;

use App\Rules\EndTimeRule;


class TestController extends Controller
{
     public function index(){
		 
		 return view("test");
	 }
	
	 public function test(Request $request){
		 	
		 $validator = Validator::make($request->all(), [
           'pickup_date' => 'required|date_format:Y-m-d|after:now',
           'dropoff_date' => 'required|date_format:Y-m-d|after_or_equal:pickup_date',
           'pickup_time' => 'required|date_format:H.i',
           'dropoff_time' => ['required', 'date_format:H.i',new EndTimeRule($request->pickup_date,
		   $request->dropoff_date,$request->pickup_time,$request->dropoff_time)]]);
		
		# Validate the required fields
		if($validator->fails()){
			
			return Redirect::back()->withErrors($validator)->withInput();
		}
		else{
			
			return Redirect::back()->with("success", "Thank you for form submission");
		}
		
		
	
	 }
	
}
