<?php

#function to execute the JINGA-Technique
include 'routes/routes-manager.php';
include 'reserved-functions.php';

function render($filename,$data=""){
  
  $BASE="routes/includes";

  $includes=scandir($BASE);
  
  foreach($includes as $key => $values){
      if(in_array($values,['.','..','.htaccess','server.php'])){
          continue;
      }else{
         require $BASE."/".$values;
      }
  }
  
    $template = file_get_contents("public/$filename");
    $template = preg_replace('/{%/i', '<?php ', $template);
    $template = preg_replace('/%}/i', ' ?>', $template);
    foreach($data as $key => $value)
       {
         $template = str_replace("{{".$key."}}", $value, $template);
       }
    
    file_put_contents('public/index.php',$template);
    require 'public/index.php';
}

?>