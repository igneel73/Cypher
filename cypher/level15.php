<?php
session_start();
//CHANGE THESE WHEN USING ONLINE
$dbhost = "localhost";
$dbuser = "themaote_admin";
$dbpass = "world12";
$dbname = "cypher73";
date_default_timezone_set("Asia/Calcutta");
$check="nil";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$lvl=15;
    if(!(isset($_SESSION["username"])))
    {
        header("Location: http://cypher.thematrixclan.com"); 
        exit;
    }
    if($_SESSION['lvl']!=$lvl)
    {
        header("Location: http://cypher.thematrixclan.com/level".$_SESSION['lvl'].".php"); 
        exit;    
    }
    else{
    	header("Location: http://cypher.thematrixclan.com/bye.html"); 
        exit;
    }
    ?>
    <?php
mysqli_close($conn);
?>