# converter-i18n
Converter for internationalization support.

Possible many language conversion support.


### Sample code:
```sh
<?php
require_once 'classes/LanguageConverter.php';
$languageConverter=new LanguageConverter();


$str="Gamarjoba samyaro!";
echo $languageConverter->convertString($str, 'geolat2utf8')."\n";

$languageConverter->addCharMap('geolat2utf8MixTest', array('a'=>'A','b'=>'B','g'=>'G','d'=>'დ','e'=>'ე','v'=>'ვ','z'=>'ზ','T'=>'თ','i'=>'ი','k'=>'კ','l'=>'ლ','m'=>'მ','n'=>'ნ','o'=>'ო','p'=>'პ','J'=>'ჟ','r'=>'რ','s'=>'ს','t'=>'ტ','u'=>'უ','f'=>'ფ','q'=>'ქ','R'=>'ღ','y'=>'ყ','S'=>'შ','C'=>'ჩ','c'=>'ც','Z'=>'ძ','w'=>'წ','W'=>'ჭ','x'=>'ხ','j'=>'ჯ','h'=>'ჰ'));

echo $languageConverter->convertString($str, 'geolat2utf8MixTest', 'utf-8')."\n";

echo "\n";
echo $languageConverter->convertStringByIndex($str, 'georgia', 'ascii', 'utf8')."\n";

$languageConverter->addCharMapByIndex('georgia', 'ascii_1', array('A','B','G','D','E','V','Z','T','I','K','L','M','N','O','P','J','R','S','T','U','F','Q','R','Y','S','C','C','Z','W','W','X','J','H'));
echo "\n";
echo $languageConverter->convertStringByIndex('ÂÀÌÀÒãÏÁÀ ÓÀÌÚÀÒÏ', 'georgia', 'ascii_1', 'stlat')."\n";
?>
```

### Result:
```sh
გამარჯობა სამყარო!
GAმAრჯოBA სAმყAრო!

გამარჯობა სამყარო!

ÂÀÌÀÒãÏÁÀ ÓÀÌÚÀÒÏ

```
