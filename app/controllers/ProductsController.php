<?php

class ProductsController extends BaseController {
	
	public function home(){
		$products = Product::all();
		return View::make('products.productsshow', array(
			'products' => $products
		));
	}
	
	public function getproductshowcase($productid){
		$product = Product::where('id', $productid)->first();
		return View::make('products.productshowcase', array(
			'product' => $product
		));
	}
	
	public function getproductsedit($productid){
		$product = Product::where('id', $productid)->first();
		return View::make('products.productsedit',array(
			'product' => $product
		));
	}
	
	public function posteditproduct($productid){
		$product = Product::where('id', '=', $productid)->first();
		
		$rules = array(
			'title' 	=> 'required',
			'text' 		=> 'required'
		);
		
		$v = Validator::make(Input::all(),$rules);
		if($v->fails()){
			return Redirect::route('product-edit',array('id'=>$productid))
				->withErrors($v);	
		} else {
			$product->title	 = Input::get('title');
			$product->text	 = Input::get('text');
			$image = Input::file('image');

			if(!empty($image)){
				$filename = $image->getClientOriginalName();
				$destinationPath = '/upload/products/';
				$product->image = $destinationPath.$filename;
			}
			
			if($product->save()){
				if(!empty($image)){
					Input::file('image')->move(public_path().$destinationPath, $filename);
				}
				return Redirect::route('products')
					->with('global','The product has been updated');	
			} else {
				return Redirect::route('products')
					->withErrors('The product could not be saved');	
			}
		}
	}
	
	
	public function getnewproducts(){
		return View::make('products.productsnew');
	}
	
	public function getproductsdelete($productid){
		$product = Product::where('id','=',$productid);
		if($product->delete()){
			return Redirect::route('products')
				->with('global','Product Deleted');
		}
		return Redirect::route('products')
			->withErrors($product);
	}
	
	public function getnewproductssave(){
		$product = New Product;
		$rules = array(
			'title' 	=> 'required',
			'text' 		=> 'required'
		);
		
		$v = Validator::make(Input::all(),$rules);
		if($v->fails()){
			return Redirect::route('product-new')
				->withErrors($v);	
		} else {
			$product->title	 = Input::get('title');
			$product->text	 = Input::get('text');
			$image = Input::file('image');

			if(!empty($image)){
				$filename = $image->getClientOriginalName();
				$destinationPath = '/upload/products/';
				$product->image = $destinationPath.$filename;
			}
			
			if($product->save()){
				if(!empty($image)){
					Input::file('image')->move(public_path().$destinationPath, $filename);
				}
				return Redirect::route('products')
					->with('global','The product has been saved');	
			} else {
				return Redirect::route('products')
					->withErrors('The product could not be saved');	
			}
		}
	}


}


?>
