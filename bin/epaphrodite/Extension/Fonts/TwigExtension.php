<?php

declare(strict_types=1);

namespace bin\epaphrodite\Extension\Fonts;

use Twig\TwigFilter;
use Twig\TwigFunction;
use bin\epaphrodite\Extension\Functions\SetTwigFunctions;

class TwigExtension extends SetTwigFunctions
{
    public function getFunctions():array
    {
        return 
        [
            new TwigFunction('__csrf' , [ $this , 'csrf_token_twig']),
            new TwigFunction('__QRCodes' , [ $this , 'QRcodes_twig']),
            new TwigFunction('__GoogleQRCodes' , [ $this , 'GoogleQRCodes_twig']),
            new TwigFunction('__truncate' , [ $this , 'truncatePath_twig']),
            new TwigFunction('__path' , [ $this , 'mainPath_twig']),
            new TwigFunction('__pathId' , [ $this , 'mainidPath_twig']),
            new TwigFunction('__host' , [ $this , 'hostPath_twig']),
            new TwigFunction('__dbpath' , [ $this , 'dbPath_twig']),
            new TwigFunction('__logout' , [ $this , 'logoutPath_twig']),
            new TwigFunction('__login', [ $this , 'login_twig']),
            new TwigFunction('__yedidiah', [ $this ,'datas_twig']),
            new TwigFunction('__menus', [ $this , 'menu_twig']),
            new TwigFunction('__ifmodules', [ $this , 'ifmodules_twig']),
            new TwigFunction('__libmodules', [ $this , 'libmodules_twig']),
            new TwigFunction('__msg', [ $this , 'msgPath_twig']),
            new TwigFunction('__toiso', [ $this ,'isoPath_twig']),
            new TwigFunction('__img', [ $this , 'imagePath_twig']),
            new TwigFunction('__css', [ $this , 'cssPath_twig']),
            new TwigFunction('__docs', [ $this , 'pdfPath_twig']),
            new TwigFunction('__cssfont', [ $this , 'cssfontPath_twig']),
            new TwigFunction('__cssiconfont', [ $this , 'cssiconfontPath_twig']),
            new TwigFunction('__cssbsico', [ $this , 'cssbsicontPath_twig']),
            new TwigFunction('__js', [ $this , 'jsPath_twig']),            
        ]; 
    }  

    public function getFilters(): array
    {
        return
        [
            new TwigFilter('strpad', [ $this , 'twig_strptad']),
            new TwigFilter('toiso', [ $this , 'isoPath_twig']),
        ];
    }      

}