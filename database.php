<?php 
//Create connection credentials
$db_host='localhost';
$db_user='root';
$db_pass='12345';
$db_name='quizzer';

//Create mysqli object 
// $mysqli = new mysqli ($db_host, $db_name, $db_user, $db_pass);
$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);

//Eeeor Handler
if($mysqli->connect_error){
    printf("Connect failed: %s\n" ,$mysqli->connect_error);
    exit();   
}
?>