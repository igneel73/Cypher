<?php
session_start();
//CHANGE THESE WHEN USING ONLINE
$dbhost = "localhost";
$dbuser = "themaote_admin";
$dbpass = "world12";
$dbname = "cypher73";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if(!(isset($_SESSION['username']))){
	header("Location: http://cypher.thematrixclan.com");
	exit;
}
$query="SELECT * FROM users WHERE username='{$_SESSION['username']}'";
$result=mysqli_query($conn,$query);
$data=mysqli_fetch_assoc($result);
$_SESSION['lvl'] = $data['lvl'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <link rel="icon" href="favicon.png">
        <title>Cypher | Home</title>
        <link rel="stylesheet" href="css/home.css">
        <!--
 _____ _           ___  ___      _        _        _____ _             
|_   _| |          |  \/  |     | |      (_)      /  __ | |            
  | | | |__   ___  | .  . | __ _| |_ _ __ ___  __ | /  \| | __ _ _ __  
  | | | '_ \ / _ \ | |\/| |/ _` | __| '__| \ \/ / | |   | |/ _` | '_ \ 
  | | | | | |  __/ | |  | | (_| | |_| |  | |>  <  | \__/| | (_| | | | |
  \_/ |_| |_|\___| \_|  |_/\__,_|\__|_|  |_/_/\_\  \____|_|\__,_|_| |_|
        
Looking for something, Agent Smith?
Always remember, THE MATRIX HAS YOU!
-->
</head>

<body>
    <nav>
        <ul>
            <li><a href="http://cypher.thematrixclan.com" class="my-nav-text-anchor">Play</a></li>
            <li><a href="http://cypher.thematrixclan.com/lead.php" class="my-nav-text-anchor">LeaderBoard</a></li>
            <li><a href="http://cypher.thematrixclan.com/rules.html" class="my-nav-text-anchor">Rules</a></li>
            <li><a href="https://www.facebook.com/itookaredpillinibiza" target="_blank" class="my-nav-text-anchor">TheOracle</a></li>
        </ul>
    </nav>
        	<section class="my-first">
		    <div class="school-info">
		        <h1 class="my-heading">Dashboard</h1>
                <p>
                    School Name :
                    <?php echo htmlentities($data['scl_name']);?><br>
                    Level :
                    <?php echo htmlentities($data['lvl']);?>
                </p>
                <a href="http://cypher.thematrixclan.com/level<?php echo htmlentities($data['lvl'])?>.php">Start</a>
                <a href="http://cypher.thematrixclan.com/logout.php">Logout</a>
            </div>
        </section>
    </body>
<?php
mysqli_close($conn);
?>
</html>
