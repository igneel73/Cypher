<?php
session_start();
//CHANGE THESE WHEN USING ONLINE
$dbhost = "localhost";
$dbuser = "themaote_admin";
$dbpass = "world12";
$dbname = "cypher73";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$query = "SELECT * FROM users WHERE 1";
$result = mysqli_query($conn,$query);
                $no = 1;
                $data = mysqli_fetch_assoc($result);
                $arr = array($data);
                while($data = mysqli_fetch_assoc($result))
                {
                array_push($arr,$data);
                $no++;
                }
                usort($arr, function($item1,$item2){
                if ($item1['lvl']==$item2['lvl'])
                {
                	return $item1['tlc']>$item2['tlc']?1:-1;
                }
                else
                {
                return $item1['lvl']>$item2['lvl']?-1:1;
                }
                });
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cypher | Leaderboard</title>
    <link rel="icon" href="favicon.png">
    <link rel="stylesheet" href="css/leader.css">
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
            <li><a href="http://cypher.thematrixclan.com/" class="my-nav-text-anchor">Play</a></li>
            <li><a href="http://cypher.thematrixclan.com/lead.php" class="my-nav-text-anchor">LeaderBoard</a></li>
            <li><a href="http://cypher.thematrixclan.com/rules.html" class="my-nav-text-anchor">Rules</a></li>
            <?php
            	if(isset($_SESSION["username"]))
    		{
       		 echo "<li><a href=\"http://cypher.thematrixclan.com/logout.php\" class=\"my-nav-text-anchor\">Logout</a></li>";
       		}
            ?>
        </ul>
    </nav>
    <section class="my-first">
        <div class="my-table-container">
            <h1 class="my-heading">Leaderboard</h1>
            <table>
                <tr>
                    <th>Rank</th>
                    <th>School Code</th>
                    <th>Level</th>
                    <th>Time Completed</th>
                </tr>
                <tr>
                	<td colspan="4">NC = Non-competitive</td>
                </tr>
                <?php
                $rank = 0;
                for($x=0;$x<$no;$x++)
                {
                	echo "<tr>";
                	echo "<td>".$rank."</td>";
                	echo "<td>".$arr[$x]['scl_name']."</td>";
                	echo "<td>".$arr[$x]['lvl']."</td>";
                	echo "<td>".$arr[$x]['tlc']."</td>";
                	echo "</tr>";
                	$rank++;
                }
                ?>
            </table>
        </div>
    </section>
</body>
<?php
mysqli_close($conn);
?>
</html>
