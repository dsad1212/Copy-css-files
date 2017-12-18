<?php
class findCss {

private $content;
private $directory = array('cssLink' => '','length' => '');
private $sumCss = 0;
private $length=0;
public function __construct($content){
	$this->content = $content;
    $this->searchCss();

}
public function searchCss(){
     
	$this->content = str_split($this->content);

 for($x=0;$x<sizeof($this->content);$x++){
 	if($this->content[$x]=='l'){
       
 		if($this->content[$x+1]=='i'){
 			$this->checkRel($x);


 		}
 	}

 }


}
public function checkRel($x){

	if($this->content[$x+5]=='r'&&$this->content[$x+6]=='e'&&$this->content[$x+7]=='l')
	{
		$this->findStyleSheet($x);
		return 0;
	}
	

	
	

}
public function findStyleSheet($x){

		if($this->content[$x+15]=='s'){
		$this->findHref($x);
		
	}
	

}
public function findHref($x){

	for($y=$x;$y<sizeof($this->content);$y++){
		if($this->content[$y]=="h"){
			if($this->content[$y+1]=="r"&&$this->content[$y+2]=="e"&&$this->content[$y+3]=="f"){
				$this->checkCss($x);
				return 0;
			}
		}
		

	}
	
}

public function checkCss($y){

       for($x=$y;$x<sizeof($this->content);$x++){



                if($this->content[$x]=='.'){
               	if($this->content[$x+1]=='c'&&$this->content[$x+2]=="s"&$this->content[$x+3]=='s'){
               		$this->directory[$this->length]['length'] = $x+3;
               		$this->length++;
               		$this->copyCssLink($x+3);

               	return 0;
               }


               }
       }

}
public function copyCssLink($x){
$cssLink= '';
for($y=0;sizeof($this->content)>$y;$y--){

$cssLink = $cssLink.$this->content[$x];
	$x=$x-1;


	if($this->content[$x]=="="){

		
		
		 
		$cssLink = strrev($cssLink);
		$this->directory[$this->sumCss]['cssLink'] = $cssLink;
		$this->sumCss++;
		return 0;
	}
	if($this->content[$x]=='/'){
        
		$cssLink = strrev($cssLink);
	    $this->directory[$this->sumCss]['cssLink'] = $cssLink;
		$this->sumCss++;
		return 0;

	}
}
}
public function getDirectory(){
	return $this->directory;
}
}