<?php
require_once 'classes/LanguageConverter.php';
$languageConverter=new LanguageConverter();


$str="gamarjoba samyaro!";
echo $languageConverter->convertString($str, 'geolat2utf8')."\n";

$languageConverter->addCharMap('geolat2utf8MixTest', array('a'=>'A','b'=>'B','g'=>'G','d'=>'დ','e'=>'ე','v'=>'ვ','z'=>'ზ','T'=>'თ','i'=>'ი','k'=>'კ','l'=>'ლ','m'=>'მ','n'=>'ნ','o'=>'ო','p'=>'პ','J'=>'ჟ','r'=>'რ','s'=>'ს','t'=>'ტ','u'=>'უ','f'=>'ფ','q'=>'ქ','R'=>'ღ','y'=>'ყ','S'=>'შ','C'=>'ჩ','c'=>'ც','Z'=>'ძ','w'=>'წ','W'=>'ჭ','x'=>'ხ','j'=>'ჯ','h'=>'ჰ'));

echo $languageConverter->convertString($str, 'geolat2utf8MixTest', 'utf-8')."\n";

echo "\n";
echo $languageConverter->convertStringByIndex('ÂÀÌÀÒãÏÁÀ ÓÀÌÚÀÒÏ', 'georgia', 'stlat', 'utf8')."\n";

$languageConverter->addCharMapByIndex('georgia', 'ascii_1', array('A','B','g','d','e','v','z','T','i','k','l','m','n','o','p','J','r','s','t','u','f','q','R','y','S','C','c','Z','w','W','x','j','h'));

echo $languageConverter->convertStringByIndex('ÂÀÌÀÒãÏÁÀ ÓÀÌÚÀÒÏ', 'georgia', 'stlat', 'ascii_1')."\n";
?>
