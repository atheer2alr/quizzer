<?php include 'database.php';
session_start();

//set Question number
if(isset($_GET["n"]))
{
    $number = (int)$_GET['n']; 

/*
*Get total question
*/

$query="SELECT * FROM `questions`";
// //Get results
    $results = $mysqli->query($query) or die ($mysqli->error._LINE_);
    $total = $results->num_rows;

/*
*Get Question 
*/
$getQuestion = "SELECT * FROM `questions`
          WHERE question_number = $number"; 
//Get result 
$result = $mysqli->query($getQuestion) or die($mysqli->error.'<br>');

$question = $result->fetch_assoc();

/*
*Get Choices  
*/
$getChoices = "SELECT * FROM `choices`
          WHERE question_number = $number";
//Get result 
$choices = $mysqli->query($getChoices) or die($mysqli->error.'<br>');

}
else {
    echo'تأكد من رقم السؤال';
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Quizzer</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script src="main.js"></script>
    </head>

    <body>
        <header>
            <div class="container">
                <h1>PHP Quizzer</h1>
            </div>
        </header>

        <main>
            <div class="container">
                <div class="current"> Question <?php echo $question['question_number'];?> of <?php echo $total; ?></div>
                <p class="question"> 
                 <?php echo $question['text'];?> 
                </p>
                <form method="post" action="process.php">
                    <ul class="choicess">

                        <?php while ($row = $choices->fetch_assoc()): ?>
                        <li>
                <input name="choice" type="radio" value="<?php echo $row['id']; ?>" /> 
                                              <?php echo htmlspecialchars($row['text'], ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php endwhile ?>

                    </ul>
                    <input type="submit" value="submit"/>
                    <input type="hidden" name="number" value="<?php echo $question['question_number']; ?>"/>
                </form>
              
            </div>
        </main>

        <footer>
        <div class="footer">
                Copyright &copy; 2017 ,PHP Quizzer 
            </div>  
        </footer>
    </body>
</html>

