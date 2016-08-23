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
$lvl=1;
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
    if(isset($_POST['submit']))
    {
        if($_POST['answer']=="forint")
        {
            $_SESSION["lvl"] = 2;
            $d = date("Y-m-d G:i:s");
            $answer = mysqli_real_escape_string($conn,$_POST['answer']);
            $ins="INSERT INTO userResponses (`username`, `lvl`, `response`, `time`) VALUES ('{$_SESSION["username"]}', '{$lvl}', '{$answer}', '{$d}')";
            $query="UPDATE users SET lvl='{$_SESSION["lvl"]}', tlc='{$d}' WHERE username='{$_SESSION["username"]}'";
            mysqli_query($conn,$query);
            mysqli_query($conn,$ins);
            header("Location: http://cypher.thematrixclan.com/level".$_SESSION['lvl'].".php");
            exit;
        }
        else
        {
            $d = date("Y-m-d G:i:s");
            $ins="INSERT INTO userResponses (`username`, `lvl`, `response`, `time`) VALUES ('{$_SESSION["username"]}', '{$lvl}', '{$_POST['answer']}', '{$d}')";
            mysqli_query($conn,$ins);
            $check="incorrect";    
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Cypher | Level 1</title>
        <link rel="icon" href="favicon.png">
        <link rel="stylesheet" href="css/levels.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    $("input[type=text]").removeClass("incorrect");
                }, 1000);
            });
        </script>
    </head>

    <body>
        <nav>
            <ul>
                <li><a href="http://cypher.thematrixclan.com/level<?php echo htmlentities($_SESSION['lvl'])?>.php" class="my-nav-text-anchor">Play</a></li>
                <li><a href="http://cypher.thematrixclan.com/lead.php" class="my-nav-text-anchor">LeaderBoard</a></li>
                <li><a href="http://cypher.thematrixclan.com/rules.html" class="my-nav-text-anchor">Rules</a></li>
                <li><a href="http://cypher.thematrixclan.com/logout.php" class="my-nav-text-anchor">Logout</a></li>
            </ul>
        </nav>
        <section class="my-first">
            <div class="my-question">
                <h1 class="my-heading">Level 1</h1>
                <p>
                    <a href="http://cypher.thematrixclan.com/files/paisa_mp3_de_dana_dan.rar">Clue</a>
                </p>
                <form action="http://cypher.thematrixclan.com/level1.php" method="post">
                    <input class="<?php echo htmlentities($check)?>" type="text" autocomplete="off" name="answer" placeholder="answer" />
                    <input name="submit" type="submit" value="Check" />
                </form>
            </div>
        </section>
    </body>
    <?php
mysqli_close($conn);
?>

    </html>
