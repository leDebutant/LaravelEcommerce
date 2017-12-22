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

    public function showProduct($id=''){
        $product = Product::find($id);
        return view('ustora.single-product',array(
            'product'=>$product
        ));
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
        $file = $r['file'];

        //ceci donne l'extension .jpeg, .png
        $extension = $file->extension();
        //le nom avec lequel on upload le fichier
        $originalName = $file->getClientOriginalName();
        //le code suivant nous donne le nombre de secondes depuis 1 janvier 1970
        $time = date('U');

        //un hash: fasljgf892r1nacs9823rnsa.jpg
        //on hash car il faut que le nom du fichier soit unique
        $name = hash('md5',$time.$originalName).".".$extension;
        $file->move('uploads',$name);

        $product = new Product();
        $product->title = $title;
        $product->description = $description;
        $product->prix = $prix;
        $product->tva = $tva;
        $product->reference = $reference;
        $product->stock = $stock;
        $product->picture = $name;
        $product->save();

        // ce redirect nous renvoie sur la page précédente (il s'avère ici que c'est le get qui porte le même attention!!)
        //la méthode with enregistre en session un message qui une fois affiché s'effacera de la session (donc il ne peut être qu'afficher une seule fois).
        return redirect()->back()->with('message','Your product has been correctly registered');
    }
}
