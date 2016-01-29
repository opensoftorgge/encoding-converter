<?php
require_once 'classes/LanguageConverter.php';
$languageConverter=new LanguageConverter();
$str="gamarjoba samyaro!";
echo $languageConverter->stringConverter($str, 'geolat2utf8', 'utf-8');
?>
