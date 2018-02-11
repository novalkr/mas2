<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * Description of ModelLayer
 *
 * @author any
 */
class ModelLayer extends Model{
   
    public function getId(){
        return $this->getAttributeFromArray( $this->getKeyName()  );
    }
    
    public function setFieldAll( array $param ){
        foreach( $param as $key => $value ){
            $this->setAttribute($key , $value);
        }
    }
    
    public function save( array $options = [] ){
        
        
        if ($this->exists) {
        }
        else{
            $guid = $this->generateId();
            $this->setAttribute($this->getKeyName() , $guid);                       
            $this->setAttribute( 'DateBegin' , date('Y-m-d') );
        }
        return parent::save( $options  );
    }
    
    protected function generateId(){
        $mtimeParts = explode(" ",microtime());
        $base = $mtimeParts[1];
        $mtimeParts = explode(".",$mtimeParts[0]);
        $base .= $mtimeParts[1];

        $rand1 = rand ( 1000 , 5000);
        $rand2 = rand ( 1000 , 5000);

        $base .= ($rand1+$rand2);

        $Id = sprintf('%02X%02X%02X%02X-%02X%02X-%02X%02X-%02X%02X-%02X%02X%02X%02X%02X%02X%02X%02X%02X%02X', 10+$base[0], 10+$base[1],10+$base[2], 10+$base[3], 10+$base[4], 10+$base[5], 10+$base[6], 10+$base[7],10+$base[8],10+$base[9],10+$base[10],10+$base[11],
            10+$base[12],10+$base[13],10+$base[14],10+$base[15],10+$base[18],10+$base[19],10+$base[20],
            10+$base[21]);
        return $Id;
    }
    
}
