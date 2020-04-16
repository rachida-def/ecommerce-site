<?php
session_start();
$database_name="id12769673_dbproduct";
$con = mysqli_connect("localhost","id12769673_root","Sanabil1999@",$database_name);
   if(!$con){
   	die('vérifier votre connection!'.mysqli_error());
   }

?>

<?php

    if(isset($_POST['login'])){
    	if(empty($_POST['uname'])||empty($_POST['password'])){
               
               header("location:connect.php?Empty=Fill in the blanks");
    	}else{
              $query="select * from clients where email='".$_POST['uname']."'and password='".$_POST['password']."'";
              $result=mysqli_query($con, $query);
              if(mysqli_fetch_assoc($result)){
              	$_SESSION['user']=$_POST['uname'];
                header("location:welcome.php");
              }else{
              	header("location:connect.php?invalid=please enter correct username and password");
              }
    	}

}

?>