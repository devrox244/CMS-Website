<?php
$DSN = 'mysql:host = localhost; dbname=cms';

$conn = new PDO($DSN,'root','Somatic');

if(!$conn){
    die("Connection error: ".mysqli_connect_error());
}
?>