<?php

declare(strict_types=1);

namespace bin\epaphrodite\Extension\Filters;

use Twig\Extension\AbstractExtension;
use bin\epaphrodite\constant\EpaphClass;

class SetTwigFilters extends AbstractExtension
{

    /**
     * Return Generate Main class
     * 
    */
    protected function GenerateEpaphClass() 
    { 
        return EpaphClass::class; 
    }

    public function twig_strptad($number, $pad_length, $pad_string)
    {
        return $this->GenerateEpaphClass()::env()->strpad($number, $pad_length, $pad_string);
    }  
    
    /**
     * Transforme code ISO
     * @return string
     */
    public function isoPath_twig($string)
    {

        return $this->GenerateEpaphClass()::env()->chaine($string);
    }
    

}