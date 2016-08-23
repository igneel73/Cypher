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
$lvl=6;
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
        if($_POST['answer']=="copypasta")
        {
            $_SESSION["lvl"] = 7;
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
        <title>Cypher | Level 6</title>
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
                <h1 class="my-heading">Level 6</h1>
                <p>
                    This is the question. But what is a question. Should you choose to answer it, you'll be rekt beyond measure. Otherwise you'll just win at life, but what is life? That is the question. To be or not to be, that is unfortunately or fortunately ,depending on your opinions, not the question, contrary to popular opinion. The answer is 42 according to the lovely people at code warriors but the question here is not 6*9. Now you may be wondering hmmm 6*9 is not 42 tf is wrong with the answer contained in this question, but that would mean that you don't understand the question or life for that matter. THE BASE GODDAMNIT, THE BASE IS DIFFERENT. But what is the base? No no don't answer that. It's a rhetorical question. If you're a eco pleb you won't know what it means anyway, so don't even bother. I actually have a very important question I really need an answer to. Why do.... people.... type like... this... I mean usually eliipsis indicate a pause. So does that mean that these people are so retarded that they need to pause after every word. Anyway, coming back to the question. But that reminds me, why do people use anyways so much. Anyways is not a word. How dumb can people be. Dumb reminds me of these hyper sensitive dumb millenials, grow some balls people, and no that is in no way misogynistic you SJW. It's a saying, blame the creator I just use it. Another random thing I've always wondered about is why are cliches bad. I mean, obviously if you look at cliched things where creativity is encouraged it's a bad thing. But cliched things that actually make sense and are extremely appropriate are wrongly badmouthed. But then again they are cliches for precisely the same reason. What's up with hashtags? It's so #sad to see that something that could've been so useful logically, was dumbed down by the general populus through overuse. But I think we should cut them some slack (see what I did there). And who is "I" and "we" in this context anyway. You guys probably thought it ended at that right? well guess you were wrong. What all this crap about 'the question' you might be thinking. That's the question my friend, it's all about regrets and mishaps and all the other crazy stuff in the world, whether it be sixteen candles or anime. Which reminds me Tokyo Ghoul sucks. The manga's good tho. So where was I. Are you even reading all this woah you must be pretty stupid then. As I was saying the question I think of many a times is how do you get so dumb as to read all this, is it genes? is it your upbringing? wtf is it? But you just might not be stupid. who knows maybe you're on the write track just cause you read all of this. anyhow ....ohhhh damnit. I forgot the question. Sorry folks you'll have to make do with this only. It's an original not copied from anywhere.
                </p>
                <form action="http://cypher.thematrixclan.com/level6.php" method="post">
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
