<?php
require_once 'classes/LanguageConverter.php';
$languageConverter=new LanguageConverter();
$str="gamarjoba samyaro!";
echo $languageConverter->geoLatToUtf8($str);
?>
