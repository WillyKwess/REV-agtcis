<?php

namespace bin\epaphrodite\env;

use bin\epaphrodite\env\config\GeneralConfig;

class env extends GeneralConfig
{
    protected $chaine_translate;

    /**
     * Tronquer le nombre de mot du text ou de la phrase
     * 
     * @param string|null $string
     * @param int|1 $limit
     * 
     * @return string
     *  */
    public function truncate(?string $string = null, ?int $limit = 1, $separator = '...')
    {
        if (strlen($string) > $limit) {
            $newlimit = $limit - strlen($separator);
            $finalchaine = substr($string, 0, $newlimit + 1);
            return preg_replace("/&#039;/", "'", (substr($finalchaine, 0, strrpos($finalchaine, ' ')))) . $separator;
        }

        return $this->chaine($string);
    }

    /**
     * Renvoyer la date sous forme de chaine de caractere 
     * @return date
     */
    public function date_chaine($date )
    {
        $locale = 'fr_FR.utf8';
        $formatter = new \IntlDateFormatter($locale, \IntlDateFormatter::FULL, \IntlDateFormatter::NONE);
        $timestamp = strtotime($date);

        return $formatter->format($timestamp);
    }

    /**
     * Transforme code ISO
     *
     * @param string|null $chaine
     * @return mixed
     */
    public function chaine(?string $chaine = null)
    {

        $pattern = ["/&#039;/", "/&#224;/", "/&#225;/", "/&#226;/", "/&#227;/", "/&#228;/", "/&#230;/", "/&#231;/", "/&#232;/", "/&#233;/", "/&#234;/", "/&#235;/", "/&#238;/", "/&#239;/", "/&#244;/", "/&#251;/", "/&amp;/"];

        $rep_pat = ["'", "à", "á", "â", "ã", "ä", "æ", "ç", "è", "é", "ê", "ë", "î", "ï", "ô", "û", "&"];

        return !empty($chaine) ? preg_replace($pattern, $rep_pat, $chaine) : NULL;
    }

    /**
     * For transcoding values in an Excel generated (french)
     *
     * @param string $chaine
     * @return string
     */
    public function translate_fr(string $chaine)
    {

        $this->chaine_translate = iconv('Windows-1252', 'UTF-8//TRANSLIT', $chaine);

        return $this->chaine_translate;
    }

    /**
     * @param array|[] $target
     * @param array|[] $files
     * @return bool
    */
    public function UplaodFiles(?array $target = [] , ?array $files =[])
    {
        foreach( $files as $key => $value ){
            
            move_uploaded_file($this->GetFiles($key), $target[$key] . '/' . $value);
        }

        return true;
    }

    /**
     * Vider un repertoire
     *
     * @param string $Directory
     * @param string $Extension
     * @return void
     */
    public function DeleteDirectoryFiles(string $Directory, string $Extension)
    {
        if(is_dir($Directory)===true){

            array_map('unlink', glob($Directory . '*' . $Extension));
            return true;
            
        }else{
            return false;
        }
    }

    /**
     * Supprimer un fichier
     *
     * @param string $Directory
     * @param string $FileName
     * @return void
     */   
    public function DeleteFiles( string $Directory, string $FileName ){
        
        if(file_exists($Directory . $FileName)===true){
    
            unlink($Directory . $FileName);
            return true;

        }else{
            return false;
        }
    }    

    /**
     * Nettoyer les espaces entre les lettres
     *
     * @param string $chaines|null
     * @return string
     */
    public function no_space(?string $chaines = null)
    {

        return str_replace(' ', '', $chaines);
    }

    public function nbre_format($num, $dec, $separator)
    {
        return number_format($num, $dec, $separator, ' ');
    }

    /**
     * Nettoyer les espaces entre les lettres
     *
     * @param string $chaines|null
     * @return string
     */
    public function reel(?string $chaines = null)
    {

        $chaines = str_replace(' ', '', $chaines);

        return str_replace(',', '.', $chaines);
    }

    /**
     * Nettoyer les espaces entre les lettres
     *
     * @param string|null $datas
     * @param string|null $separator
     * @param int|0 $nbre
     * @return string
     */
    public function explode_datas(?string $datas = null, ?string $separator = '', ?int $nbre = 0)
    {

        $chaines = explode($separator, $datas);

        return $chaines[$nbre];
    }

    /**
     * @param mixed $number
     * @param mixed $pad_length
     * @param mixed $pad_string
     * @return string
     */
    public function strpad($number, $pad_length, $pad_string)
    {
        return str_pad($number, $pad_length, $pad_string, STR_PAD_LEFT);
    }

    /**
     * Rename files
     * @param string|null $files
     * @param string|null $extension
     * @return string
    */
    public function RenameFiles(?string $files = null , ?string $extension = null){

        return md5( date("Y-m-d H:i:s").$files).".".$extension;
    }    
}
