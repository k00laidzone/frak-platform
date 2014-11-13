<?PHP

	class ProfileController extends Controller {
		
		public function getshowprofile($username){	
			$user = User::where('username', '=', $username);
			if($user->count()){
				return View::make('profile.showprofile');
			}
			return View::make('home')->withErrors('That user does not exist in our system');
		}
		
		public function geteditprofile($username){
			$user = User::where('username', '=', $username);
			if($user->count()){
				return View::make('profile.editprofile');
			}
			return View::make('home')->withErrors('That user does not exist in our system');
		}
		
		public function postprofile($username){
			$user = User::where('username', '=', $username)->first();
			if($user->count()){
				$validator = Validator::make(Input::all(), array(
					'first_name' 	=> 'max:35|min:2',
					'last_name'		=> 'max:35|min:2',
					'username' 		=> 'unique:users|max:30|min:3',
					'email' 		=> 'unique:users|email|max:50'
				));
				
				if($validator->fails()){
					return Redirect::route('profile-edit', array('username' => Auth::user()->username))
						->withErrors($validator);
				} 
				
				if (Input::has('first_name'))	{$user->first_name 	= Input::get('first_name');}
				if (Input::has('last_name'))	{$user->last_name 	= Input::get('last_name');}
				if (Input::has('username'))		{$user->username 	= Input::get('username');}
				if (Input::has('email'))		{$user->email 		= Input::get('email');}

				$image = Input::file('image');
				if(!empty($image)){
					$filename = $image->getClientOriginalName();
					$destinationPath = '/upload/'. Auth::user()->username .'/avatar/';
					$user->avatar = $destinationPath.$filename;
				}

				if($user->save()){
					if(!empty($image)){
						Input::file('image')->move(public_path().$destinationPath, $filename);
					}
					return Redirect::route('profile-show', array('username' => $user->username))
						->with('global', 'You have updated your account.');
				}
			
			return Redirect::route('profile-edit', array('username' => Auth::user()->username))
				->withErrors($validator);
			}
		}
		
		public function geteditavatar($username){
			$user = User::where('username', '=', $username)->first();
			return View::make('upload.avataredit');
		}
		
		public function posteditavatar($username){

			
			$image = Input::file('image');
			$filename = $image->getClientOriginalName();
			$destinationPath = '/upload/'. Auth::user()->username .'/avatar/';
			
			$user = User::where('username', '=', $username)->first();
			$user->avatar = $destinationPath.$filename;
						
			if($user->save()){
				Input::file('image')->move(public_path().$destinationPath, $filename);
				return Redirect::route('home')
					->with('global', 'Its worked');	
			} 
			return Redirect::route('home')
				->withErrors($avatar);	
		}
	}