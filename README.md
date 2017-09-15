# converter-i18n

Converter for internationalization support. 

Possibility the conversion for many language  support.

კოდირების გადამყვანი რომელიც მრავალენოვანი კოდირების შექმნის შესაძლებლობას გაძლევთ. 

იმისათვის რომ დაამატოთ თქვენთვის სასურველი კოდირება, საკმარისია განსაზღვროთ მასივი:

### კოდში სხვა კოდირების დამატების მაგალითი:

```sh
<?php
private $charMapByIndex = array(
	'georgia' => array(
			'ascii' => array('a', 'b', 'g', 'd', 'e', 'v', 'z', 'T', 'i', 'k', 'l', 'm', 'n', 'o', 'p', 'J', 'r', 's', 't', 'u', 'f', 'q', 'R', 'y', 'S', 'C', 'c', 'Z', 'w', 'W', 'x', 'j', 'h'), 
			'utf8' => array('ა', 'ბ', 'გ', 'დ', 'ე', 'ვ', 'ზ', 'თ', 'ი', 'კ', 'ლ', 'მ', 'ნ', 'ო', 'პ', 'ჟ', 'რ', 'ს', 'ტ', 'უ', 'ფ', 'ქ', 'ღ', 'ყ', 'შ', 'ჩ', 'ც', 'ძ', 'წ', 'ჭ', 'ხ', 'ჯ', 'ჰ'), 
			'stlat' => array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Ö', '×', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'Þ', 'ß', 'à', 'á', 'ã', 'ä')
			)
		),
	// სხვა კოდირება
	'otherlanguage' => array(
			'ascii' => array('a', 'b', 'g', 'd', 'e', 'v', 'z', 'T', 'i', 'k', 'l', 'm', 'n', 'o', 'p', 'J', 'r', 's', 't', 'u', 'f', 'q', 'R', 'y', 'S', 'C', 'c', 'Z', 'w', 'W', 'x', 'j', 'h'), 
			'utf8' => array(...)
			)
		);
?>
```

### Sample code make custom coding Array:

```sh
<?php
private $charMapByIndex = array(
	'georgia' => array(
			'ascii' => array('a', 'b', 'g', 'd', 'e', 'v', 'z', 'T', 'i', 'k', 'l', 'm', 'n', 'o', 'p', 'J', 'r', 's', 't', 'u', 'f', 'q', 'R', 'y', 'S', 'C', 'c', 'Z', 'w', 'W', 'x', 'j', 'h'), 
			'utf8' => array('ა', 'ბ', 'გ', 'დ', 'ე', 'ვ', 'ზ', 'თ', 'ი', 'კ', 'ლ', 'მ', 'ნ', 'ო', 'პ', 'ჟ', 'რ', 'ს', 'ტ', 'უ', 'ფ', 'ქ', 'ღ', 'ყ', 'შ', 'ჩ', 'ც', 'ძ', 'წ', 'ჭ', 'ხ', 'ჯ', 'ჰ'), 
			'stlat' => array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Ö', '×', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'Þ', 'ß', 'à', 'á', 'ã', 'ä')
			)
		),
	// custom coding
	'otherlanguage' => array(
			'ascii' => array('a', 'b', 'g', 'd', 'e', 'v', 'z', 'T', 'i', 'k', 'l', 'm', 'n', 'o', 'p', 'J', 'r', 's', 't', 'u', 'f', 'q', 'R', 'y', 'S', 'C', 'c', 'Z', 'w', 'W', 'x', 'j', 'h'), 
			'utf8' => array(...)
			)
		);
?>
```

### Sample code:
```sh
<?php
require_once 'classes/EncodingConverter.php';
$encodingConverter=new EncodingConverter();


$str="Gamarjoba samyaro!";
echo $encodingConverter->convertString($str, 'geolat2utf8')."\n";

$encodingConverter->addCharMap('geolat2utf8MixTest', array('a'=>'A','b'=>'B','g'=>'G','d'=>'დ','e'=>'ე','v'=>'ვ','z'=>'ზ','T'=>'თ','i'=>'ი','k'=>'კ','l'=>'ლ','m'=>'მ','n'=>'ნ','o'=>'ო','p'=>'პ','J'=>'ჟ','r'=>'რ','s'=>'ს','t'=>'ტ','u'=>'უ','f'=>'ფ','q'=>'ქ','R'=>'ღ','y'=>'ყ','S'=>'შ','C'=>'ჩ','c'=>'ც','Z'=>'ძ','w'=>'წ','W'=>'ჭ','x'=>'ხ','j'=>'ჯ','h'=>'ჰ'));

echo $encodingConverter->convertString($str, 'geolat2utf8MixTest', 'utf-8')."\n";

echo "\n";
echo $encodingConverter->convertStringByIndex($str, 'georgia', 'ascii', 'utf8')."\n";

$encodingConverter->addCharMapByIndex('georgia', 'ascii_1', array('A','B','G','D','E','V','Z','T','I','K','L','M','N','O','P','J','R','S','T','U','F','Q','R','Y','S','C','C','Z','W','W','X','J','H'));
echo "\n";
echo $encodingConverter->convertStringByIndex('ÂÀÌÀÒãÏÁÀ ÓÀÌÚÀÒÏ', 'georgia', 'ascii_1', 'stlat')."\n";
?>
```

### Result:
```sh
გამარჯობა სამყარო!
GAმAრჯოBA სAმყAრო!

გამარჯობა სამყარო!

ÂÀÌÀÒãÏÁÀ ÓÀÌÚÀÒÏ

```
