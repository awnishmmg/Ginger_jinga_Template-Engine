<?php

$host='localhost';
$user='root';
$pass='';
$dbname='practise';

$conn=mysqli_connect($host,$user,$pass,$dbname);
if(!$conn){
    echo "connection Error";
}

?>