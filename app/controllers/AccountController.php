<?PHP

	class AccountController extends Controller {
		
		/* Get Create Account */
		public function getcreate(){
			return View::make('create-account');	
		}
		
		/* Post Create Account */
		public function postcreate(){
			$rules = array(
				'username' 				=> 'required|max:20|unique:users', 
				'email'					=> 'required|max:50|email|unique:users',
				'password' 				=> 'required|max:60|min:3',
				'password_confirmation' => 'required|max:60|min:3|same:password'
			);
			
			$validator = Validator::make(Input::all(), $rules);
			
			if($validator -> fails()){
				return Redirect::route('account-create')->withErrors($validator);
			} else {
				$username 	= Input::get('username');
				$email 		= Input::get('email');
				$password 	= Input::get('password');	
				$code 		= str_random(60);
				
				$user = User::create(array(
					'email' => $email,
					'username' => $username,
					'password' => Hash::make($password),
					'code' => $code,
					'active' => 0
				));
				if($user){
					
					Mail::send('emails.auth.account-activate', array('link' => URL::route('account-activate', $code), 'username' => $username), function($message) use ($user){
						$message->to($user->email, $user->username)->subject('Activate your account');
						});
					
					return Redirect::route('home')
						->with('global', 'You account has been created, check your email for verication.');	
				}
			}
		}
		
		/* Get Account Activation */
		public function getactivate($code){
			$user = User::where('code', '=', $code)->where('active', '=', '0');
			if($user->count()){
					$user = $user->first();
					
					$user->active	= 1;
					$user->code		= '';
					if($user->save()){
						return Redirect::route('home')->with('global','We activated your account !');	
					} 
			}

			return Redirect::route('home')->withErrors('We could not activate your account');
		}
		
		/* Get Change Account Password */
		public function getchangepassword(){
			return View::make('change-password');			
		}
		
		/* Post Change Account Password */
		public function postchangepassword(){
			
			$validator = Validator::make(Input::all(), array(
				'old_password' 				=> 'required',
				'new_password' 				=> 'required|min:4',
				'password_confirmation' 	=> 'required|same:new_password'
			));
			
			if($validator->fails()){
				return Redirect::route('change-password')
					->withErrors($validator);
			} else {
				
				$user = User::find(Auth::user()->id);
				$oldpassword = Input::get('old_password');
				$newpassword = Input::get('new_password');
				
				if(Hash::check($oldpassword, $user->GetAuthPassword())){
					if($user->save()){
						return Redirect::route('change-password')
							->with('global', 'Your password has been changed');
					}	
				} 		
			}
			return Redirect::route('change-password')
				->withErrors('There was a problem changing your password.');
		}
		
	}

?>