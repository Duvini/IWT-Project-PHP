<?php
$dbhost ='localhost';
$dbuser='root';
$dbpass ='';
$dbname='BilLmE';

$connection=mysqli_connect('localhost','root','','BilLmE');

if (mysqli_connect_errno()){
    die('Database Connection failed'.mysqli_connect_error());
}
?>