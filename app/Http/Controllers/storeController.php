<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class storeController extends Controller
{
    /*** METHODES ECOMMERCE ***/

    public function showIndex(){
        return view('ustora.index');
    }

    public function checkout(){
        return view('ustora.checkout');
    }

    public function cart(){
        return view('ustora.cart');
    }

    public function shop(){
        return view('ustora.shop');
    }

    public function showProduct(){
        return view('ustora.single-product');
    }

    public function newProduct(){

        return view('ustora.new-product');
    }

    public function newProductService(Request $request)
    {
        $r = $request->all();
        dump($request);
        die();
    }
}
