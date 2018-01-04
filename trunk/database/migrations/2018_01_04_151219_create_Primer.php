<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrimer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Primer', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string( 'guid' , 100 );
            $table->string( 'fk_Worker' ,  200 );           
            $table->string( 'fk_Role' , 100 );
            $table->string( 'fk_Filial' ,  200 );           
            $table->dateTime( 'DateBegin' ); 
            $table->dateTime( 'DateEnd' )->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Primer');
    }
}
