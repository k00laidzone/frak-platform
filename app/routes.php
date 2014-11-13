<?php
	Route::get('/', array(
		'as' => 'home',
		'uses' => 'HomeController@home'
	));
	
	Route::get('/crew', array(	
		'as' => 'crew',
		'uses' => 'CrewController@home'
	));
	
	
	
	
	/* Products Page */	
	Route::get('products-show', array(
		'as' => 'products',
		'uses' => 'ProductsController@home'
	));
	
	
	Route::get('/product-showcase/{productid}', array(
		'as' => 'product-showcase',
		'uses' => 'ProductsController@getproductshowcase'
	));
	
	
	
	/* CONTACT PAGE */
	Route::get('/contact', array(
		'as' => 'contact',
		'uses' => 'ContactController@home'
	));
	
	Route::post('/contact-post', array(
		'as' => 'contact-post',
		'uses' => 'ContactController@SendMail'
	));
	
	
	
	/* Logout */
	Route::get('logout', array(
		'as' => 'logout',
		'uses' => 'AuthController@getlogout'
	));
	
	
	
	
	/* Account Activate */
	Route::get('/account/account-activate/{code}', array(
		'as' => 'account-activate',
		'uses' => 'AccountController@getactivate'
	));
	
	
	
	/* Create Account Post */
	Route::post('/account/create', array('uses' => 'AccountController@postcreate'));
	
	
	
	
	/* 
	| Group Before->Guest 
	*/ 
	Route::group(array('before' => 'guest'), function() {
	
		/* LOGIN */
		Route::get('login', array(
			'as' => 'login',
			'uses' => 'AuthController@getlogin'
		));
		
		/* Account Create */
		Route::get('/account/create', array(
			'as' => 'account-create',
			'uses' => 'AccountController@getcreate'
		));
		
		Route::group(array('before' => 'csrf'), function() {
			/* LOGIN POST */
			Route::post('login', array(
				'uses' => 'AuthController@postlogin'
			));
			
		});	
	});
	
	/* 
	| Group Before->Auth 
	*/
	Route::group(array('before' => 'auth'), function($uname){
		
		/* Get Profile */
		$data['username'] = $uname;
		Route::get('/user/{username}', array(
			'as' => 'profile-show',
			'uses' => 'ProfileController@getshowprofile'
		));	
		
		$data['username'] = $uname;
		Route::get('/user/edit/{username}', array(
			'as' => 'profile-edit',
			'uses' => 'ProfileController@geteditprofile'
		));	
		
		/* Prooducts Page */
		$product['product'] = $uname;
		Route::get('products/edit/{product}', array(
			'as' => 'product-edit',
			'uses' => 'ProductsController@getproductsedit'
		));
		
		/* Prooducts Page NEW */
		Route::get('products/new', array(
			'as' => 'product-new',
			'uses' => 'ProductsController@getnewproducts'
		));
		
		Route::post('products/new', array(
			'uses' => 'ProductsController@getnewproductssave'
		));
		
		Route::get('/products/delete/{product}', array(
			'as' => 'product-delete',
			'uses' => 'ProductsController@getproductsdelete'
		));
		
		
		/* Get Avatar Page */
		Route::get('user/edit/{username}/avatar/edit',array(
			'as' => 'avatar-edit',
			'uses'=> 'ProfileController@geteditavatar'
		));
		
		/* Post Avatar */
		Route::post('user/edit/{username}/avatar/edit', array(
			'uses' => 'ProfileController@posteditavatar'
		));
		
		
		
		
		
		
		/* Get Change Password */
		Route::get('account-change-password', array(
			'as' => 'change-password',
			'uses' => 'AccountController@getchangepassword'
		));
		
		
		
		
		
		
			Route::group(array('before' => 'csrf'), function($uname){
	
				/* Post Change Password */
				Route::post('account-change-password', array(
					'uses' => 'AccountController@postchangepassword'
				));
				
				$data['username'] = $uname;
				Route::post('/user/edit/{username}', array(
					'uses' => 'ProfileController@postprofile'
				));
				
				$data['productid'] = $uname;
				Route::post('products/edit/{productid}', array(
					'uses' => 'ProductsController@posteditproduct'
				));

				
			});
			
			
	/*End Script*/	
	});
	