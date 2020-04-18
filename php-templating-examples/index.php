<?php

$request = basename($_SERVER['REQUEST_URI']);

$querystr=explode("&",$_SERVER['QUERY_STRING']);
# this is the newcontroller array to hold the static values

$newcontrollers=array();
#this is newquerystring array();
$newqueryallowed=array();

foreach( $controllers as $key => $value){

    $key="/".$key."([^\?]+)(\?.*)?/";
    $newcontrollers[$key]=$value;

}

foreach( $queryallowed as $key => $value){

    if($key==""){
        $value='';
    }
    else{
        $value=$key."=".$value;
        $newqueryallowed[]=$value;    
    }
}


$querystr=$querystr[0];

if(!in_array($querystr,$newqueryallowed) && $querystr!=''){
    die("<h4>This Query string is not allowed</h4>");
}


#handle request variable
$requestarr=explode("?",$request);
$request=$requestarr[0];
foreach($newcontrollers as $key => $value){
    if($request==basename(__DIR__)){
        die("<b> GINGER_JINGA Template Engine by awnish kumar &copy; awisoft.net {{PHP}} </b><hr noshade>
        <samp style='color:blue;font-size:13px;font-family:rockwell'>Welcome to <b><mark>jinja Template Engine</mark></b> set up home template in <mark> public/xyz.html </mark> and add url and you are ready to rock.</samp>");
    }
    if(in_array($request,array_keys($controllers))){
            if(preg_match($key,$request)){
            require_once $request.'.controller.php';
            break;    
        }
    }else{
        require 'public/404.php';
        exit;
    }
}

?>