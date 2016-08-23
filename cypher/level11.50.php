<?php
session_start();
//CHANGE THESE WHEN USING ONLINE
$dbhost = "localhost";
$dbuser = "themaote_admin";
$dbpass = "world12";
$dbname = "cypher73";
date_default_timezone_set("Asia/Calcutta");
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$lvl=11.50;
    if(!(isset($_SESSION["username"])))
    {
        header("Location: http://cypher.thematrixclan.com"); 
        exit;
    }
    if($_SESSION['lvl']==11.375)
    {	
    	$_SESSION["lvl"] = 12;
    	$d = date("Y-m-d G:i:s");
    	$ins="INSERT INTO userResponses (`username`, `lvl`, `response`, `time`) VALUES ('{$_SESSION["username"]}', '{$lvl}', 'attempted', '{$d}')";
    	$query="UPDATE users SET lvl='{$_SESSION["lvl"]}', tlc='{$d}' WHERE username='{$_SESSION["username"]}'";
    	mysqli_query($conn,$query);
        mysqli_query($conn,$ins);
        header("Location: http://cypher.thematrixclan.com/level".$_SESSION['lvl'].".php");
        exit;   
    }
    else if($_SESSION['lvl']!=11.375)
    {
        header("Location: http://cypher.thematrixclan.com/level".$_SESSION['lvl'].".php"); 
        exit;    
    }
    ?>
    <?php
mysqli_close($conn);
?>