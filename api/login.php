<?php
session_start();
include("connect.php");
$mobile=$_POST["mobile"];
$password=$_POST["password"];

$result=execQuery("sel","SELECT * FROM user WHERE mobile='$mobile' AND password='$password'");
if($result)
{
    
    foreach($result as $row)
    {
        $_SESSION['name']=$row['name'];
        $_SESSION['mobile']=$row['mobile'];
        $_SESSION['address']=$row['address'];
        $_SESSION['role']=$row['role'];
        $_SESSION['id']=$row['id'];
        $_SESSION['photo']=$row['photo'];
    }
   //print_r($row['name']);
    $dashURL='../routes/dashboard.php';
    header('Location:'.$dashURL );

}


?>
