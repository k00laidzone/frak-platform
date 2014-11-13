<?php

class HomeController extends BaseController {
	public function home(){
		$products = Product::all();
		
		return View::make('home', array(
			'products' => $products
		));
	}
}
