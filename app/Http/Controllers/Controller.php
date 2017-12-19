<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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

}
