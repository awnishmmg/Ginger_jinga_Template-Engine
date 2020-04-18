<?php 


  $data =  array(
            'title' => 'Welcome | Home',
            'pagename' => 'home',
            'content' => 'false',
            'vardate' => " | ".date('h:i:s'),    
            'loadfooter' => staticload('footer'), 
            'loadcss' => loadcss(),
            'authorname' => 'awisoft.net', 
            'formaction' => '"home?action=add"',        
        ); 
# use render function to load the Templates 
// render() 1.@parameter : public html page name with extension [Mendatory] 
// render() 2.@parameter : to bind the data in the template file [optional] 
 render('home.html',$data);

# for handling form 

$form=new Formloader();
$form->processform('submit');
$form->display();







 
 ?>