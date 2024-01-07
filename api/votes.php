<?php
session_start();
include("connect.php");
$gvotes= $_POST['gvotes'];
$gid= $_POST['gid'];
$id= $_SESSION['id'];
$gvotes=$gvotes+1;  
$gupdate=execQuery("oth","UPDATE user SET votes='$gvotes' WHERE id='$gid'");
$vupdate=execQuery("oth","UPDATE user SET status='1', votegiven='$gid' WHERE id='$id'");
if($gupdate AND $vupdate){
    echo'
    <script>
    alert("Voted Successfully");
    window.location="../routes/dashboard.php";
    </script>
    ';
}

?>