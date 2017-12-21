<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewProductRequest;
use App\Product;
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

    public function newProductService(NewProductRequest $request)
    {
        $r = $request->all();
//        dump($r);
//        die();
        $title = $r['title'];
        $description = $r['description'];
        $prix = $r['prix'];
        $reference = $r['reference'];
        $tva = $r['tva'];
        $stock = $r['stock'];

        $product = new Product();
        $product->title = $title;
        $product->description = $description;
        $product->prix = $prix;
        $product->tva = $tva;
        $product->reference = $reference;
        $product->stock = $stock;
        $product->save();

        // ce redirect nous renvoie sur la page précédente (il s'avère ici que c'est le get qui porte le même attention!!)
        //la méthode with enregistre en session un message qui une fois affiché s'effacera de la session (donc il ne peut être qu'afficher une seule fois).
        return redirect()->back()->with('message','Your product has been correctly registered');
    }
}
