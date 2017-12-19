<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

/**
 * Ceci est une route
 */

Route::get('/about',function(){

    $array= array(
        'alfonso'=>'parametre',
        'stephane'=>'json',
    );

    return $array;
//    return "Ceci est la rubrique à propos";
});

/**
 * Route avec paramètres
 *
 *  Si vous voulez vérifier le parametre employé la methode where
 * Et si vous voulez rendre le paramètre optionnel employé le symbole ?
 * et dans les paramètre $nom=''
 */
Route::get('/route-parameter/{parameter}/{nom?}',function($parameter,$nom=''){
    return $parameter." ".$nom;
})->where('parameter','\d+');

/**
 * Route avec un alias!! -> les alias sont important pour les redirect et les liens.
 */
Route::get('/ma-route',array(
    'as'=>'monAlias',
    'uses'=>'Controller@aliasMethod'
));

Route::get('/mon-autre-route/{page?}',array(
    'as'=>'giraffe',
    'uses'=>'Controller@otherMethod'
));


Route::get('/mon-template',array(
   'as'=>'monTemplate',
   'uses'=>'Controller@renderTemplate'
));

Route::get('/home-exemple',array(
    'as'=>'home-example',
    'uses'=>'Controller@homeMethod'
));



/**** ROUTE ECOMMERCE ****/

Route::get('/', array(
    'as'=> 'home',
    'uses'=>'storeController@showIndex'
));

Route::get('/checkout',array(
    'as'=> 'checkout',
    'uses'=>'storeController@checkout'
));

Route::get('/cart',array(
    'as'=> 'cart',
    'uses'=>'storeController@cart'
));

Route::get('/shop',array(
    'as'=> 'shop',
    'uses'=>'storeController@shop'
));

Route::get('/show-product',array(
    'as'=> 'show-product',
    'uses'=>'storeController@showProduct'
));




