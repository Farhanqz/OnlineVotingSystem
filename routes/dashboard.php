<?php
session_start();
include("../api/connect.php");
$name= $_SESSION['name'];
$mobile= $_SESSION['mobile'];
$id= $_SESSION['id'];
$address= $_SESSION['address'];
$roles= $_SESSION['role'];
$photo= $_SESSION['photo'];
$res=execQuery("sel","SELECT * FROM user WHERE id='$id'");
$status=$res[0]['status'];
$vgid=$res[0]['votegiven'];
if($vgid!=0){
    $res=execQuery("sel","SELECT name FROM user WHERE id='$vgid'");
    $votegivento=$res[0]['name'];
}else
{
    $votegivento='NA';
}
$stat= ($status==1)?"<label style='color:green'><b>Voted</b></label>":"<label style='color:red'><b>Not Voted</b></label>";  
$groupres=execQuery("sel","SELECT * FROM user WHERE role<>'1'");
$rowStr="";
$disabled="";
$voteval='Vote';
if($groupres)
{
    foreach($groupres as $row)
    {  
            $gname=$row['name'];
            $gphoto=$row['photo'];
            $votes= $row['votes']; 
            $gid= $row['id']; 
            if($status=='1'){
                $disabled='disabled';
                $voteval='Voted';
            }else
            {
                $disabled='';
                $vateval='Vote';
            }
            $rowStr.="
            <div class='row'>
                <div class='column' style='text-align:left;margin-top:10px;'>
                <label><b>Group Name</b>:$gname</label><br><br>
                <label>Votes:$votes</label><br><br>
                <form method='POST' action='../api/votes.php'>
                <input type='hidden' name='gvotes' value='$votes'>
                <input type='hidden' name='gid' value='$gid'>
                <button type='submit' style='background-color:green;color:white;' $disabled>$voteval</button>
                </form>
                </div>
                <div class='column'>
                <image src='../uploads/".$gphoto."' height='100' width='100'>
                </div>
            </div><hr>
            ";
        

    }
}
?>
<html>
<head>
<title>Online Voting System</title>
<link rel="stylesheet" href="../css/stylesheet.css">
</head>
    <body>
        <a href="../api/logout.php"><input type="button" id="logoutbtn" name="logout" value="LogOut"></a>
        <h1> Online Voting System</h1>
        <hr>
        <div id="profile" style="margin-top:30px;">
            <div style="border:1px solid black;background-color:black;color:white;padding:10px;"><label>PROFILE DETAILS</label></div>
            <div class='row'>
                <div><?php echo "<image src='../uploads/".$photo."' height='100' width='100'>" ?></div>
            </div>
<hr>
            <div class='row'>
                <div class="column">Name</div>
                <div class="column"><?php echo $name; ?></div>
            </div><br>
            <div class='row'>
                <div class="column">Mobile</div>
                <div class="column"><?php echo $mobile; ?></div>
            </div><br>
            <div class='row'>
                <div class="column">Address</div>
                <div class="column"><?php echo $address; ?></div>
            </div><br>
            <div class='row'>
                <div class="column">Vote Given To</div>
                <div class="column" ><?php echo $votegivento; ?></div>
            </div><br>
            <div class='row'>
                <div class="column">Status</div>
                <div class="column" ><?php echo $stat; ?></div>
            </div>
            
        </div>
  
            <div id="grouplist" style="margin-top:30px;height:57%; overflow-y:auto;">
            <div style="border:1px solid black;background-color:black;color:white;padding:10px;"><label>GROUP LIST</label>
            </div>
            <?php
                echo $rowStr;
            ?>
            </div>

    </body>
</html>
