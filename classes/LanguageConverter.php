<?php
# Created By OpenSoft <info@opensoft.org.ge>
# Licensed under MIT License
# http://opensoft.org.ge

class LanguageConverter{
    function geoLatToUtf8($str, $mbInternalEncoding='UTF-8'){
        mb_internal_encoding($mbInternalEncoding);
        
        $latin_to_utf8=array(
            'a'=>'ა',
            'b'=>'ბ',
            'g'=>'გ',
            'd'=>'დ',
            'e'=>'ე',
            'v'=>'ვ',
            'z'=>'ზ',
            'T'=>'თ',
            'i'=>'ი',
            'k'=>'კ',
            'l'=>'ლ',
            'm'=>'მ',
            'n'=>'ნ',
            'o'=>'ო',
            'p'=>'პ',
            'J'=>'ჟ',
            'r'=>'რ',
            's'=>'ს',
            't'=>'ტ',
            'u'=>'უ',
            'f'=>'ფ',
            'q'=>'ქ',
            'R'=>'ღ',
            'y'=>'ყ',
            'S'=>'შ',
            'C'=>'ჩ',
            'c'=>'ც',
            'Z'=>'ძ',
            'w'=>'წ',
            'W'=>'ჭ',
            'x'=>'ხ',
            'j'=>'ჯ',
            'h'=>'ჰ'
        );
        
        $strUtf8="";
        $tmpChar=null;
        $strLength=mb_strlen($str);
        $strNew=array();
        
        while($strLength){
        
            $strNew[]=mb_substr($str, 0, 1, $mbInternalEncoding);
            $str=mb_substr($str, 1, $strLength, $mbInternalEncoding);
            $strLength=mb_strlen($str);
        }
        for($i=0; $i<count($strNew); $i++){
            $tmpChar=$strNew[$i];	
            if(isset($latin_to_utf8[$tmpChar])){
                $strUtf8.=$latin_to_utf8[$tmpChar]; 
            }else {
                $strUtf8.=$tmpChar;
            }
        }
        return $strUtf8;
        }
}  
?>
