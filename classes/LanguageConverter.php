<?php
# Created By OpenSoft <info@opensoft.org.ge>
# Licensed under MIT License
# Software Projects Web Site: http://opensoft.ge
# Git Projects: https://github.com/opensoftge

class LanguageConverter{

	private $charMap=array(
		'geolat2utf8'=>array(
            'a'=>'ა','b'=>'ბ','g'=>'გ','d'=>'დ','e'=>'ე','v'=>'ვ','z'=>'ზ','T'=>'თ','i'=>'ი','k'=>'კ','l'=>'ლ','m'=>'მ','n'=>'ნ','o'=>'ო','p'=>'პ','J'=>'ჟ','r'=>'რ','s'=>'ს','t'=>'ტ','u'=>'უ','f'=>'ფ','q'=>'ქ','R'=>'ღ','y'=>'ყ','S'=>'შ','C'=>'ჩ','c'=>'ც','Z'=>'ძ','w'=>'წ','W'=>'ჭ','x'=>'ხ','j'=>'ჯ','h'=>'ჰ'
        )
	);
	
	public function setCharMap($charMap=array()){
		$this->charMap=$charMap;
	}
	
	public function getCharMap(){
		return $this->charMap;
	}
	
	public function addCharMap($charMapKey, $charMapValue=array()){
		$this->charMap[$charMapKey]=$charMapValue;
	}
	
    function convertString($str, $mapName, $mbInternalEncoding='UTF-8'){
        mb_internal_encoding($mbInternalEncoding);
        
        $charMap=$this->getCharMap();

        $convertedString="";
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
            if(isset($charMap[$mapName][$tmpChar])){
                $convertedString.=$charMap[$mapName][$tmpChar]; 
            }else {
                $convertedString.=$tmpChar;
            }
        }
        return $convertedString;
        }
}  
?>
