<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJurnal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Jurnal', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string( 'guid' , 100 );
            $table->dateTime( 'DateInit' ); 
            $table->integer( 'TimeInit' );
            $table->dateTime( 'DateBegin' )->nullable(); 
            $table->integer( 'TimeBegin' )->nullable();
            $table->string( 'fk_Client' , 100 );             
            $table->string( 'fk_Filial' , 100 );             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Jurnal');
    }
}
