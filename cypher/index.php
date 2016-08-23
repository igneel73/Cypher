<?php
session_start();
//CHANGE THESE WHEN USING ONLINE
$dbhost = "localhost";
$dbuser = "themaote_admin";
$dbpass = "world12";
$dbname = "themaote_register";
$check = "nil";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if(isset($_SESSION['username']))
	{
	header("Location: /letsplay.php");
	exit;
	}
function attempt_login($unm,$pass,$conn)
        {
        $query = "SELECT COUNT(*) as number FROM table1 WHERE Username='{$unm}' AND Password='{$pass}'";
        $result = mysqli_query($conn,$query);
        $data = mysqli_fetch_assoc($result);
        if($data['number']==1)
            {
            return true;
            }
        return false;
        };
if(isset($_POST['submit']))
    {
    $user = isset($_POST['username'])?mysqli_real_escape_string($conn, $_POST['username']):"";
    $pass = isset($_POST['password'])?mysqli_real_escape_string($conn, $_POST['password']):"";
    $userFound = attempt_login($user,$pass,$conn);
    if($userFound)
    {
        $_SESSION['username'] = $user;
        header("Location: /letsplay.php");
        exit;
    }
    else
    {
    $check="wrong";
    }
}
?>
    <!DOCTYPE html>
    <html>
	
    <head>
<meta charset="UTF-8">
    	<link rel="icon" href="favicon.png">
        <title>Cypher | Login</title>
	<link rel="stylesheet" href="css/index.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    $("input[type=text],input[type=password]").removeClass("wrong");
                }, 1000);
            });

        </script>
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
				<li><a href="http://cypher.thematrixclan.com/rules.html" class="my-nav-text-anchor">Rules</a></li>
				<li><a href="http://cypher.thematrixclan.com/lead.php" class="my-nav-text-anchor">LeaderBoard</a></li>
			</ul>
		</nav>
		
		<section class="my-first">
            <form action="http://cypher.thematrixclan.com/" method="POST">
                <h1 class="my-event-heading">Cypher</h1>
		        <h2 class="my-event-tagline">Ignorance is Bliss</h2>
                <h1 class="my-heading">Login</h1>
                <input class="<?php echo htmlentities($check);?>" autocomplete="off" type="text" name="username" required="required" placeholder="username" />
                <input class="<?php echo htmlentities($check);?>" autocomplete="off" type="password" name="password" placeholder="password" />
                <input type="submit" name="submit" value="Login" />
            </form>
        </section>
        
    </body>
    <?php
mysqli_close($conn);
?>
</html>