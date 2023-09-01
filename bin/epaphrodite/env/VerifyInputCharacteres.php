<?php

namespace bin\epaphrodite\env;

class VerifyInputCharacteres extends MatchCharactere{

    /* 
      Verify if is only character and number
    */     
    public function only_number_and_character( $InputCharacteres , $nbre )
    {

      return $this->WithoutNumberAndCharacters( $InputCharacteres ) === false && $this->CountCharacterNumber( $InputCharacteres ) < $nbre ? false : true ;
    }

    /* 
      Verify if is only number
    */     
    public function only_number( $InputCharacteres , $nbre )
    {

      return $this->WithoutNumber( $InputCharacteres ) === false && $this->CountCharacterNumber( $InputCharacteres ) < $nbre ? false : true;
    }

    /* 
      Verify if is only character
    */    
    public function only_character( $InputCharacteres , $nbre )
    {
        
      return $this->WithoutCharacters( $InputCharacteres ) === false && $this->CountCharacterNumber( $InputCharacteres ) < $nbre ? false : true;
    }    
}