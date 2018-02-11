<?php

namespace App\Model;



class Usluga extends \App\ModelLayer
{
    protected $table = 'Usluga';
    protected $primaryKey = 'guid';
    
    public function validSave( array $param ){
        
    }
    
    public function parseData( array $param ){
        $return = array();
        $tesField = array( 'Name' );
        foreach( $param as $key => $value ){
            if( in_array( $key , $tesField ) ){
                $return[ $key ] = $value;
            }
        }
        return  $return;
    }
    
}
