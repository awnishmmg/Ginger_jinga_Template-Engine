<?php 

  $data =  array(
    'title' => 'Know About us',
    'pagename' => 'About us',
        ); 
# use render function to load the Templates 
// render() 1.@parameter : public html page name with extension [Mendatory] 
// render() 2.@parameter : to bind the data in the template file [optional] 
 	render('about.html',$data); 
 ?>