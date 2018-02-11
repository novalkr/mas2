<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Filial extends \App\ModelLayer
{
    protected $table = 'Filial';
    protected $primaryKey = 'guid';    
    
    //gg"><script>alert('Упс')</script><"
    public function parseData( array $param ){
        $return = array();
        $tesField = array( 'Name' , 'Adress' );
        foreach( $param as $key => $value ){
            if( in_array( $key , $tesField ) ){
                $return[ $key ] = $value;
            }
        }
        return  $return;
    }
    
}
