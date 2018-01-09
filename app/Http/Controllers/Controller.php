<?php

namespace App\Http\Controllers;

use App\Product;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request; //Cet objet gère toutes les requêtes HTTP
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $productRepo;
    private $orderRepo;

    public function __construct(ProductRepository $productRepo,OrderRepository $orderRepo)
    {
        $this->productRepo = $productRepo;
        $this->orderRepo = $orderRepo;
    }

    public function aliasMethod(){

        return redirect()->route('giraffe',array(
            'page'=>34
        ));
//        return "ceci est la méthode alias";
    }

    public function otherMethod($page=''){

        return "ceci est un autre page alias $page";
    }

    public function renderTemplate(){

        $array = array(
            'nom'=>'Alfonso',
            'futurville'=>'Paris',
            'logement'=>'Boulogne'
        );

        $ville = array("New York","Paris","Barcelone","Le Soler");

        return view('myTemplate',array(
            'param'=>$array,
            'ville'=>$ville
        ));
    }

    public function homeMethod(){
        return view('ustora.home');
    }

    /*** MODEL: CREATE READ UPDATE DELETE ***/

    public function crud(){

        /*** CREATE ***/
//        $product = new Product();
//        $product->title = "Iphone 8";
//        $product->description = "Super téléphone";
//        $product->prix = 899;
//        $product->tva = 0.2;
//        $product->reference = "ARNAQUE";
//        $product->stock = 10;
//        $product->save();

        /*** SELECT ***/
        /**
         * find par défaut cherche par id
         */
        $product = Product::find(30);
        dump($product);

        /*** UPDATE ***/
        $product = Product::find(31); //le 31 c'est notre iphone
        $product->title = 'iphone X';
        $product->prix = 1899;
        $product->save();

        /*** DELÈTE ***/
        $product = Product::find(32);
        $product->delete();

        die("page crud");
    }


    /****  CRUD CATEGORIES ****/
    public function queriesDatabase()
    {
        //RETRIEVE DATA FROM THE DATABASE
        /**  1) **/
        //$product = Product::find(2);
        /**  2) **/
        //$product = Product::all();

        /**
         * Attention cette methode ::all() retournera une collection d'objet Product
         * et elle sera traité comme un array. Ce sera cet array qui contriendra les dit objets.
         * dump($product[0])
         *
         * Pour aller chercher une propriété par exemple title
         * dump($product[0]->title);
         *
         * $product[0] = Product();
         */

        /**  3) **/
        /**
         * la clause where nous permet de faire une selection selon un paramètre spécific, en l'occurence "title"
         */
        //$product = Product::where('title',"Iphone 8")->get();
        //$product = $this->productRepo->getMyProduct(2);
        /***
         * Avec les relation entre entité nous pouvons faire appel au entité qui ont une relation avec la première entité appellée.
         */
//        $order = $this->orderRepo->getById(2);
//
//        foreach($order->commandeproducts as $cp){
//            dump($cp->product->title);
//        }
        /**
         * Appel à des produits avec conditions
         */
        $products = $this->productRepo->insertWithDB();
        dump($products);

        die();
    }

    /*** SESSION ***/
    public function session(Request $request){

        //A l'ancienne
        $request->session()->put('key','value');
        $request->session()->put('name','alfonso');

//        $_SESSION['name']='alfonso';
//
        //En statique - pour celui la on a pas besoin de l'objet Request
        // mais de l'objet session use Illuminate\Support\Facades\Session;
//        Session::put('name','alfonso');

        dump($request->session()->get('name'));
        die();
        return "ici c'est les sessions";
    }




}
