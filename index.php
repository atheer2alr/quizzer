<?php include 'database.php'; ?>
<?php
/*
*Get total Questions
*/
$query ="SELECT * FROM `questions`";
//Get results
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $results->num_rows;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>PHP Quizzer</title>
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
                <h2> Test Your PHP Knowledge </h2>
                <ul>
                    <li><strong>Number of Question:</strong><?php echo $total;?></li>
                    <li><strong>Type</strong>Multiple Choice</li>
                    <li><strong>Estimated Time:</strong><?php echo $total * .5;?>Minutes</li>
                </ul>
                <a href="question.php?n=1" class="start"> Start Quiz </a>
            </div>
        </main>

        <footer>
        <div class="footer">
                Copyright &copy; 2017 ,PHP Quizzer 
            </div>  
        </footer>
    </body>
</html>