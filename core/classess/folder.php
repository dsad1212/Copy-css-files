<?php
class folder{
private $content;
private $file;
private $webstie;

public function __construct($content,$file,$webstie){

$this->content = $content;
$this->file = $file;
$this->webstie = $webstie;
$this->numberFolder();

}
public function numberFolder(){

$this->content = str_split($this->content);
$numberOfFolders =0;
 for($x=$this->file['length'];$x>0;$x--)
 {
            if($this->content[$x]=='/')
            {
            	$numberOfFolders=$numberOfFolders+1;
            }
            if($this->content[$x]=="="){
            
            	$this->createFolderPath($numberOfFolders,$x);
            	return 0;
            }
 	

 }
}
public function createFolderPath($numberOfFolders,$x){
$folderPath='';
$sum=0;
$sum1=0;
if($this->content[$x+7]=='h'&&$this->content[$x+8]=='t'&&$this->content[$x+9]=='t'&&$this->content[$x+10]=='p'){
	return 0;

}
else if($this->content[$x+7]=="/"){
	for($folder=$x+8;$folder<sizeof($this->content);$folder++){
     $folderPath = $folderPath.$this->content[$folder];
     if($this->content[$folder]=="/"){
     	$sum++;
     	if($sum==$numberOfFolders-1){
     		$this->createFolder($folderPath);
     		return 0;
     	}
     }

	}
	
	
}

else{
	for($folder=$x+7;$folder<sizeof($this->content);$folder++){
		$folderPath = $folderPath.$this->content[$folder];
		if($this->content[$folder]=="/"){
			$sum1++;
			if($sum1==$numberOfFolders){
     		$this->createFolder($folderPath);
     		return 0;
     	}
		}
			
		
	
}
$this->createCss();
			return 0;
}
}
public function createFolder($filePath){
	
	if(!file_exists($filePath)){
	mkdir($filePath,0777,true);
	$this->downloadFile($filePath);
	return 0;
}
$this->downloadFile($filePath);
return 0;
}
public function downloadFile($filePath){
	$ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL,$this->webstie."/".$filePath."/".$this->file['cssLink']); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        
$output = curl_exec($ch); 
$file = fopen($filePath."/".$this->file['cssLink'],"w");

fwrite($file,$output);
return 0;
}
public function createCss(){
	$cssFile =  $this->file['cssLink'];
	$cssFile1='';
	for($x=6;$x<strlen($cssFile);$x++)
	{
	$cssFile1=$cssFile1.$cssFile[$x];
	
}
	$ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL,$this->webstie."/".$cssFile1); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        
$output = curl_exec($ch); 
$file = fopen($cssFile1,"w");

fwrite($file,$output);
return 0;

}
}