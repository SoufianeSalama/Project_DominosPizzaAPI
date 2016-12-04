<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeveringenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leveringen', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('ordernr');
            $table->string('bedrag');
            $table->string('naam');
            $table->string('adres');
            $table->string('telefoon');
            $table->string('nota');
            $table->string('betaling');
            $table->string('bestelling');
            $table->string('timestamp');

/**/            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
