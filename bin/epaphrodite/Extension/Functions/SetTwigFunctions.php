<?php

declare(strict_types=1);

namespace bin\epaphrodite\Extension\Functions;

use bin\epaphrodite\Extension\Filters\SetTwigFilters;

class SetTwigFunctions extends SetTwigFilters
{

    /**
     * Return Qrcode datas
     * 
     * @param mixed $datas
     * @return string
     */
    public function QRcodes_twig($datas)
    {
        $this->GenerateEpaphClass()::QRCodes()->GenerateQRCodeDatas($datas);
    }    

    /**
     * Generate Google Qrcode datas
     * 
     * @param mixed $datas
     * @return string
     */
    public function GoogleQRCodes_twig($datas){

        $this->GenerateEpaphClass()::QRCodes()->GenerateGoogleQRCode($datas);
    }

    /**
     * Return input of token csrf
     * 
     * @return string
     */
    public function csrf_token_twig()
    {

        $this->GenerateEpaphClass()::crsf()->input_field();
    }

    /**
     * Return image paths
     * 
     */
    public function imagePath_twig($img)
    {
        
        echo  $this->GenerateEpaphClass()::path()->img($img);
    }

    /**
     * Return css paths
     * 
     */
    public function cssPath_twig($css)
    {

        echo  $this->GenerateEpaphClass()::path()->css($css);
    }

    /**
     * Return css paths
     * 
     */
    public function pdfPath_twig($pdf)
    {

        echo  $this->GenerateEpaphClass()::path()->pdf($pdf);
    }

    /**
     * Return css paths
     * 
     */
    public function cssfontPath_twig($css)
    {

        echo  $this->GenerateEpaphClass()::path()->font($css);
    }

    /**
     * Return css paths
     * 
     */
    public function cssiconfontPath_twig($css)
    {

        echo  $this->GenerateEpaphClass()::path()->icofont($css);
    }

    /**
     * Return bootstrap icon paths
     * 
     */
    public function cssbsicontPath_twig($css)
    {

        echo  $this->GenerateEpaphClass()::path()->bsicon($css);
    }

    /**
     * Return javascript paths
     * 
     */
    public function jsPath_twig($js)
    {

        echo  $this->GenerateEpaphClass()::path()->js($js);
    }

    /**
     * Return javascript paths
     * 
     */
    public function mainPath_twig(?string $dir = null, ?string $page = null)
    {

        if ($this->GenerateEpaphClass()::auth()->login() != false && $this->GenerateEpaphClass()::auth()->id() != false) {

            echo  $this->GenerateEpaphClass()::path()->admin($dir, $page);
        } else {

            echo  $this->GenerateEpaphClass()::path()->main($dir);
        }
    }

    /**
     * Return javascript paths
     * 
     */
    public function mainidPath_twig(?string $folder = null, ?string $url = null, ?string $action = null, ?string $id = null)
    {

        if ($this->GenerateEpaphClass()::auth()->login() != false && $this->GenerateEpaphClass()::auth()->id() != false) {

            echo  $this->GenerateEpaphClass()::path()->admin_id($folder, $url, $action, $id);
        } else {

            echo  $this->GenerateEpaphClass()::path()->main($folder);
        }
    }


    /**
     * Return javascript paths
     * 
     */
    public function hostPath_twig()
    {

        if ($this->GenerateEpaphClass()::auth()->login() != false && $this->GenerateEpaphClass()::auth()->id() != false) {

            echo  $this->GenerateEpaphClass()::path()->dashboard();
        } else {

            echo  $this->GenerateEpaphClass()::path()->gethost();
        }
    }

    /**
     * Return javascript paths
     * 
     */
    public function dbPath_twig()
    {

        echo  $this->GenerateEpaphClass()::path()->db();
    }

    /**
     * Return javascript paths
     * 
     */
    public function logoutPath_twig()
    {

        echo  $this->GenerateEpaphClass()::path()->logout();
    }

    /**
     * Tronquer le nombre de mot du text ou de la phrase
     * @return string
     */
    public function truncatePath_twig($string, $limit)
    {

        return $this->GenerateEpaphClass()::env()->truncate($string, $limit);
    }

    public function replace_funct($search, $replace, $datas)
    {
        return str_replace($search, $replace, $datas);
    }

    /**
     * Explode and returne datas element
     * @return string
     */
    public function datasExplode(?string $datas = null, ?string $separator = '', ?int $nbre = 0)
    {

        return $this->GenerateEpaphClass()::env()->explode_datas($datas, $separator, $nbre);
    }

    public function ifformat_twig($num, $dec, $separator)
    {

        return $this->GenerateEpaphClass()::env()->nbre_format($num, $dec, $separator);
    }

    /**
     * Get message
     * @param string|error_text $msg
     * @return string
     */
    public function msgPath_twig(?string $msg = 'error_text')
    {

        return $this->GenerateEpaphClass()::messages()->answers($msg);
    }

    /**
     * Return login paths
     * 
     */
    public function login_twig()
    {

        echo  $this->GenerateEpaphClass()::auth()->login();
    }

    /**
     * Return login paths
     * 
     */
    public function typeusers_twig()
    {

        echo  $this->GenerateEpaphClass()::auth()->type();
    }

    /**
     * Return yedidiah paths
     * 
     */
    public function datas_twig(?string $key = null, ?string $value = null)
    {

        echo NULL;
    }

    /**
     * Return login paths
     * 
     */
    public function menu_twig(?string $key = null)
    {

        return NULL;
    }

    /**
     * Return login paths
     * 
     */
    public function ifmodules_twig(?string $module = null)
    {

        echo  NULL;
    } 


}