<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Client', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string( 'guid' , 100 );
            $table->string( 'FIO' , 200 );            
            $table->string( 'Adress' , 200 );            
            $table->string( 'Telefon' , 20 );            
            $table->string( 'fk_users' , 100 );            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Client');
    }
}
