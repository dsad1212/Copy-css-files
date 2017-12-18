<?php 
ini_set('display_errors', 'On');
error_reporting(E_ALL);
ini_set('memory_limit', '-1');
require_once "core/load.php";
        // create curl resource 
        $ch = curl_init(); 

        $website = ""; // here you write the website !
    curl_setopt($ch, CURLOPT_URL, $website); 
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        
$output = curl_exec($ch); 
$file = fopen("copy.html","w");

fwrite($file,$output);
$html = file_get_contents("copy.html");
$html =  htmlspecialchars($html);
$css = new findCss($html);
$getDirectory = $css->getDirectory();
for($x=0;$x<sizeof($getDirectory)-2;$x++){

 $folder = new folder($html,$getDirectory[$x],$website);

}
// :) !!! thats it !!!!
