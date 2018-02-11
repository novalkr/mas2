<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FillFilial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $filial = new App\Model\Filial();
        $filial->setAttribute( 'Name' , 'Головной' );
        $filial->setAttribute( 'Adress' , 'Карява д.1 оф. 133' );
        $filial->setAttribute( 'DateBegin' , date('Y-m-d') );
        
        $filial->save();

        $filial = new App\Model\Filial();
        $filial->setAttribute( 'Name' , 'Дальний' );
        $filial->setAttribute( 'Adress' , 'Кушки д.45 оф. 4' );
        $filial->setAttribute( 'DateBegin' , date('Y-m-d') );
        $filial->save();
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
