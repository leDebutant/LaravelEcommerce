<?php

namespace App\Repositories;

use App\Product;
use Illuminate\Support\Facades\DB;

class ProductRepository extends BaseRepository
{
    public function __construct(Product $product)
    {
        $this->entity = $product;
    }

    public function testing()
    {
        return "ceci vient de mon repo";
    }


    /*** Eloquent -> on va utiliser les classes model/entity qui sont les suivantes:
     * Product, Order, OrderProduct
     * ***/
    public function selectMyProduct($id){
        return Product::find($id);
        //Product::all();
        /** l'avantage de cette méthode c'est qu'elle nous permet d'appeler ultérieurement les classes qui lui sont liées et ce sans faire de jointures. Par contre il faut les mettres en lien dans les modèles */
    }

    public function selectProductByPriceInferiorTo($price){
        $product = Product::where('prix','<',$price)
            ->take(4) //seulement 4 résultats
            ->orderBy('prix', 'desc')
            ->get();

        return $product;
    }

    public function productsPriceBetween($min,$max){
        $product = Product::whereBetween('prix',array($min,$max))
            ->orderBy('prix', 'desc')
            ->get();

        return $product;
    }

    public function selectWithDB()
    {
        $products = DB::select("SELECT * FROM products WHERE prix < :prix",array('prix'=>200));
        return $products;
    }

    public function updateWithDB(){
        return DB::update("UPDATE products SET title=:title WHERE id=:id",array(
            'title'=>'testing',
            'id'=>1
        ));
    }

    public function insertWithDB(){
        return DB::insert('INSERT INTO categories SET category =:category',array(
           'category'=>'Riggx8'
        ));
    }

    public function deleteWithDB(){
        return DB::delete('DELETE FROM categories WHERE category=:category',array(
            'category'=>'Riggx8'
        ));
    }

    public function statementWithDB(){
        //pour des statement typiques de mysql que vous passeriez dans mysqlWorkBench par exemple
        DB::statement('ALTER TABLE products AUTO_INCREMENT=1');
        DB::raw('SELECT * product WHERE id=1');
    }

}