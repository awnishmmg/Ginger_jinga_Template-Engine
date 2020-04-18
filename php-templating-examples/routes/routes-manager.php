<?php

include '__init__.php';

$dirlist=scandir(".");

foreach($controllers as $key => $values){
    if(in_array("$values.controller.php",$dirlist)){
        
    }else{
        /*
        if(rename("$values.php","$values.controller.php")){
            die('')
        }else{

        }
        */
        $fptr = fopen("$values.controller.php",'w');
        $code="";
        $code.="<?php \n\n\n\n ";
        $code.=' $data = ';
        $code.=" array(
            'key_1' => 'data_1',
            'key_2' => 'data_2',
            'key_3' => 'data_3',
            'key_n' => 'data_n',
        ); \n";
        $code.="# use render function to load the Templates \n";
        $code.="// render() 1.@parameter : public html page name with extension [Mendatory] \n";
        $code.="// render() 2.@parameter : to bind the data in the template file [optional] \n";
        $code.=" render('index.html',";
        $code.='$data); ';
        $code.="\n \n ?>";
        fwrite($fptr,$code);

        fclose($fptr);
    }
}

?>