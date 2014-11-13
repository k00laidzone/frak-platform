<?PHP

class AuthController extends Controller {
	public function getlogin(){
		return 	View::make('login');	
	}
	
		
	public function getlogout(){
		Auth::logout();
		return Redirect::route('home');	
	}
	
	public function postlogin(){
		$rules = array('username' => 'required', 'password' => 'required');
		$validator = Validator::make(Input::all(), $rules);
		
		if($validator -> fails()){
			return Redirect::route('login')->withErrors($validator);
			
		}
		
		$auth = Auth::attempt(
		array(	
		'username' => Input::get('username'),
		'password' => Input::get('password')
		), false);
		
		
		
		if(!$auth){
			return Redirect::route('login')->withErrors(array(
				'Invalid Login Information Supplied'
			));
			
		}
		
		return Redirect::route('home');
		
	}
}

?>