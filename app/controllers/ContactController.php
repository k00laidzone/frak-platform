<?php

class ContactController extends BaseController {
	public function home(){
		return View::make('contact');
	}
public function SendMail(){
 
            //Get all the data and store it inside Store Variable
            $data = Input::all();
 
            //Validation rules
            $rules = array (
                'inputName' => 'required|alpha',
                'inputEmail' => 'required|email',
                'inputMessage' => 'required|min:10'
            );
 
            //Validate data
            $validator  = Validator::make ($data, $rules);
 
            //If everything is correct than run passes.
            if ($validator -> passes()){
 
                //Send email using Laravel send function
                Mail::send('sendmail', $data, function($message) use ($data)
                {
//email 'From' field: Get users email add and name
                    $message->from($data['inputEmail'] , $data['inputName']);
//email 'To' field: cahnge this to emails that you want to be notified.                    
$message->to('shawnpick@gmail.com', 'Shawn Picker')->cc('info@shawnpick.com')->subject('contact request');
 
                });
 
                //return View::make('contact');  
				return Redirect::to('/');
            }else{
//return contact form with errors
                return Redirect::to('/contact')->withErrors($validator);
            }
        }
}
