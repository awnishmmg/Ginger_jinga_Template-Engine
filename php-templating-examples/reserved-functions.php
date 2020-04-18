<?php

# To print static string
function staticload($file){
    global $templates;
    $filename="public/".$templates."/".$file.".html";
    if(file_exists($filename)){
        return file_get_contents($filename);
    }//end of if
    else{
        return "<b> <mark>static content</mark> not found. </b>";
    }
} //end of load

# To print static string
function staticprint($str){
    return $str;
}

# to load static css  
function loadcss(){
    global $css;
    $filename="public/".$css;

    if($css==""){
        echo "<b> static css not found. </b>";
        exit();
    }
    if(file_exists($filename)):

    $strcode="";
    $cssdir = scandir($filename);
    foreach( $cssdir as $key => $value ){
        if(in_array($value , ['.','..'])){
            continue;           
        }
        $strcode .= "<link type='text/css' href='".$filename."/".$value."?ver=".time()."' rel='stylesheet' /> \n";
    }
    return $strcode;
    else:
        return "<b> <mark> public/$css </mark>  not found. </b>";
    endif;

} //end of css

# To load static js
function loadjs(){
    global $js;
    $filename="public/".$js;
    
    if($js==""){
        echo "<b> static js not found. </b>";
        exit();
    }

    if(file_exists($filename)):

    $jsdir = scandir($filename);
    $strcode="";
    foreach( $jsdir as $key => $value ){
        if(in_array($value , ['.','..'])){
           continue;
        }
        $strcode .= "<script type='text/javascript' src='".$filename."/".$value."?ver=".time()."' > </script> \n";
    }
    return $strcode;
    else:
    return "<b>  <mark> public/$js </mark>  not found. </b>";
    endif;
} //end of js


#form handling functions
class Formloader{
private $formarr=array();
function processform($submit_name){
    
    if(isset($_POST[$submit_name])){

        unset($_POST[$submit_name]);
        
        $this->formarr=$_POST;    
    }
}

function display(){
    foreach ( $this->formarr as $key => $value) {
        echo $key ." : " .$value;
        echo "<br/>";
    }
}

}//end of class

?>