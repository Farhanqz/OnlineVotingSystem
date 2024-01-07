<?php
include("connect.php");
//print_r($_POST);
$name= $_POST['uname'];
$mobile= $_POST['mobile'];
$password= $_POST['password'];
$cpassword= $_POST['confirmpassword'];
$address= $_POST['address'];
$image= $_FILES['photo']['name'];
$tmp_name=$_FILES['photo']['tmp_name'];
$role=$_POST['role'];
if($password==$cpassword){
    move_uploaded_file($tmp_name,"../uploads/$image");
    $insert=execQuery("oth","INSERT INTO user(name,mobile,address,password,photo,role,status,votes) values ('$name','$mobile','$address','$password','$image','$role',0,0)");
if($insert){
    echo'
    <script>
    alert("registration successful");
    window.location="../";
    </script>
    ';

}
else{
    echo'
    <script>
    alert("some error occured");
    window.location="../routes/register.html";
    </script>
    ';

}
    
}
else{
    echo'
    <script>
    alert("password and confirm password does not match!");
    window.location="../routes/register.html";
    </script>
    ';
}