<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            //le premier chiffre est le nombre total de chiffres
            // le suivant (ici le 2) sera le nombre de décimaux
            $table->float('prix',8,2);
            $table->float('tva',4,2);
            $table->string('reference');
            $table->integer('stock')->default(0);
            //timestamps nous créera automatiquement created_at, updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
