<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        /**
         * Voyez la liste des contraintes ici
         * https://laravel.com/docs/5.5/validation
         */
        return [
            'title'         =>'required|max:20',
            'description'   =>'required',
            /** unique:produits ira chercher dans le champs reference des entités produits et vérifiera si reference est unique. Si ça ne l'est pas -> erreur **/
            'reference'     =>'required|unique:products|alpha_num',
            'prix'        =>'required|numeric',
//            'file'          =>'required',
        ];
    }


}
