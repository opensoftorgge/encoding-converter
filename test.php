<?php
require_once 'classes/LanguageConverter.php';
$languageConverter=new LanguageConverter();
$str="gamarjoba samyaro!";
echo $languageConverter->convertString($str, 'geolat2utf8', 'utf-8');
?>
