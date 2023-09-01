<?php
declare(strict_types=1);
namespace bin\epaphrodite\QRCodes;

use bin\epaphrodite\constant\StaticArray;

class GetQRcode extends StaticArray{

    /**
     * @param mixed $datas
     * @var QROptions $options
     * @return mixed
     */
    protected function Qrcode($datas)
    {

        $options = new $this->QrCodes['qroptions'](
          [
              'eccLevel' => $this->QrCodes['qrcode']::ECC_L,
              'outputType' => $this->QrCodes['qrcode']::OUTPUT_MARKUP_SVG,
              'version' => 5,
          ]
        );
          
      return (new $this->QrCodes['qrcode']($options))->render($datas);
    }

    /**
     * @param mixed $datas
     * @var QROptions $options
     * @return mixed
     */    
    protected function FpdfQRCode($datas){

      $options = new $this->QrCodes['qroptions']([
          'version'      => 7,
          'outputType'   => $this->QrCodes['qrcode']::OUTPUT_FPDF,
          'eccLevel'     => $this->QrCodes['qrcode']::ECC_L,
          'scale'        => 5,
          'imageBase64'  => false,
          'moduleValues' => [
              1536 => [0, 63, 255], 
              6 => [255, 255, 255], 
              // light (false), white is the transparency color and is enabled by default
              // alignment
              2560 => [255, 0, 255],
              10   => [255, 255, 255],
              // timing
              3072 => [255, 0, 0],
              12   => [255, 255, 255],
              // format
              3584 => [67, 191, 84],
              14   => [255, 255, 255],
              // version
              4096 => [62, 174, 190],
              16   => [255, 255, 255],
              // data
              1024 => [0, 0, 0],
              4    => [255, 255, 255],
              // darkmodule
              512  => [0, 0, 0],
              // separator
              8    => [255, 255, 255],
              // quietzone
              18   => [255, 255, 255],
          ],
      ]);

      \header('Content-type: application/pdf');

      echo (new $this->QrCodes['qrcode']($options))->render($datas);
    }

    /**
     * @param mixed $datas
     * @return mixed
     */
    protected function GoogleQRCode($datas){

      return "http://chart.apis.google.com/chart?cht=qr&chs=125x125&chl=$datas";
    }
}