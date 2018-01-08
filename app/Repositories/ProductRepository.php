<?php

namespace App\Repositories;

use App\Product;

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

}