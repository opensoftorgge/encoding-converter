<?php
# Created By OpenSoft <info@opensoft.org.ge>
# Licensed under MIT License
# Projects Web Site: http://opensoft.org.ge
# Software Projects Web Site: http://opensoft.ge
# Git Projects: https://github.com/opensoftge
# version 1.1

class LanguageConverter{

	private $mbInternalEncoding='UTF-8';

	private $charMap=array(
		'geolat2utf8'=>array(
            'a'=>'ა','b'=>'ბ','g'=>'გ','d'=>'დ','e'=>'ე','v'=>'ვ','z'=>'ზ','T'=>'თ','i'=>'ი','k'=>'კ','l'=>'ლ','m'=>'მ','n'=>'ნ','o'=>'ო','p'=>'პ','J'=>'ჟ','r'=>'რ','s'=>'ს','t'=>'ტ','u'=>'უ','f'=>'ფ','q'=>'ქ','R'=>'ღ','y'=>'ყ','S'=>'შ','C'=>'ჩ','c'=>'ც','Z'=>'ძ','w'=>'წ','W'=>'ჭ','x'=>'ხ','j'=>'ჯ','h'=>'ჰ'
        ),
        'geostlat2utf8'=>array('À'=>'ა','Á'=>'ბ','Â'=>'გ','Ã'=>'დ','Ä'=>'ე','Å'=>'ვ','Æ'=>'ზ','È'=>'თ','É'=>'ი','Ê'=>'კ','Ë'=>'ლ','Ì'=>'მ','Í'=>'ნ','Ï'=>'ო','Ð'=>'პ','Ñ'=>'ჟ','Ò'=>'რ','Ó'=>'ს','Ô'=>'ტ','Ö'=>'უ','×'=>'ფ','Ø'=>'ქ','Ù'=>'ღ','Ú'=>'ყ','Û'=>'შ','Ü'=>'ჩ','Ý'=>'ც','Þ'=>'ძ','ß'=>'წ','à'=>'ჭ','á'=>'ხ','ã'=>'ჯ','ä'=>'ჰ'
        )
	);
		
	private $charMapByIndex=array(
	'georgia'=>array(
			'ascii'=>array('a','b','g','d','e','v','z','T','i','k','l','m','n','o','p','J','r','s','t','u','f','q','R','y','S','C','c','Z','w','W','x','j','h'),
			'utf8'=>array('ა','ბ','გ','დ','ე','ვ','ზ','თ','ი','კ','ლ','მ','ნ','ო','პ','ჟ','რ','ს','ტ','უ','ფ','ქ','ღ','ყ','შ','ჩ','ც','ძ','წ','ჭ','ხ','ჯ','ჰ'),
			'stlat'=>array('À','Á','Â','Ã','Ä','Å','Æ','È','É','Ê','Ë','Ì','Í','Ï','Ð','Ñ','Ò','Ó','Ô','Ö','×','Ø','Ù','Ú','Û','Ü','Ý','Þ','ß','à','á','ã','ä')
			)
		);
		
	
	public function setMbInternalEncoding($encoding){
		$this->mbInternalEncoding=$encoding;
	}
	
	public function getMbInternalEncoding(){
		return $this->mbInternalEncoding;
	}
	
	public function setCharMap($charMapKey=null, $charMap=array()){
		if(!is_null($charMapKey) && $charMapKey!=='' && isset($this->charMap[$charMapKey])){
			$this->charMap[$charMapKey]=$charMap;
		}
	}
	
	public function getCharMap(){
		return $this->charMap;
	}
	
	public function setCharMapByIndex($charMapKeyIndex=null, $charMapLayout=null, $charMapValues=array()){
		if(!is_null($charMapKeyIndex) && $charMapKeyIndex!=='' && isset($this->charMapByIndex[$charMapKeyIndex])){
			if(!is_null($charMapLayout) && $charMapLayout!=='' && isset($this->charMapByIndex[$charMapKeyIndex][$charMapLayout])){
				$this->charMapByIndex[$charMapKeyIndex][$charMapLayout]=$charMapValues;
			}
		}
	}
	
	public function getCharMapByIndex($charMapKeyIndex=null, $charMapLayout=null){
		if(!is_null($charMapKeyIndex) && $charMapKeyIndex!=='' && isset($this->charMapByIndex[$charMapKeyIndex])){
			if(!is_null($charMapLayout) && $charMapLayout!=='' && isset($this->charMapByIndex[$charMapKeyIndex][$charMapLayout])){
				return $this->charMapByIndex[$charMapKeyIndex][$charMapLayout];
			}
			return $this->charMapByIndex[$charMapKeyIndex];
		}
		return $this->charMapByIndex;
	}	
	
	public function addCharMap($charMapKey=null, $charMapValue=array()){		
		if(!is_null($charMapKey) && $charMapKey!=='' && !isset($this->charMap[$charMapKey])){
			$this->charMap[$charMapKey]=$charMapValue;
		}
	}
	
	public function addCharMapByIndex($charMapKeyIndex=null, $charMapLayout=null, $charMapValues=array()){
		if(!is_null($charMapKeyIndex) && $charMapKeyIndex!==''){
			if(!isset($this->charMapByIndex[$charMapKeyIndex])){
				if(!is_null($charMapLayout) && $charMapLayout!==''){					
					$this->charMapByIndex=array(
						$charMapKeyIndex=>array($charMapLayout=>$charMapValues)
					);
				}
			}else{
				if(!is_null($charMapLayout) && $charMapLayout!=='' && !isset($this->charMapByIndex[$charMapKeyIndex][$charMapLayout])){					
					$this->charMapByIndex[$charMapKeyIndex][$charMapLayout]=$charMapValues;
				}
			}		
		}
	}
	
    function convertString($str, $mapName){
		$mbInternalEncoding=$this->getMbInternalEncoding();
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
	
	function convertStringByIndex($str, $charMapKeyIndex, $charMapLayoutFrom, $charMapLayoutTo){
		$mbInternalEncoding=$this->getMbInternalEncoding();
        mb_internal_encoding($mbInternalEncoding);
        
        $charMapFrom=$this->getCharMapByIndex($charMapKeyIndex, $charMapLayoutFrom);
		$charMapTo=$this->getCharMapByIndex($charMapKeyIndex, $charMapLayoutTo);
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
            $index=array_search($tmpChar, $charMapFrom);	
            if($index!==false && isset($charMapTo[$index])){
                $convertedString.=$charMapTo[$index];
            }else {
                $convertedString.=$tmpChar;
            }
        }
        return $convertedString;
	}
}  
?>
