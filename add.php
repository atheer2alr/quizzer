<?php include 'database.php';?>
<?php 
if(isset($_POST['submit'])){ 
//Get post variables 
$question_number= $_POST['question_number'];
$question_text = $_POST['question_text'];
$correct_choice = $_POST['correct_choice'];
//Choices array

$choices = Array();
$choices[1] = $_POST['choice1'];
$choices[2] = $_POST['choice2'];
$choices[3] = $_POST['choice3'];
$choices[4] = $_POST['choice4'];
$choices[5] = $_POST['choice5'];

//Question query
$query="INSERT INTO `questions` (question_number,`text`)
        VALUES('$question_number','$question_text') ";

//Run Query
$insert_row = $mysqli->query($query) or die($mysqli->error.'<br>');

//Validate $insert
    if($insert_row){ 
        foreach($choices as $choice =>$value){
            if($value!=''){
                if($correct_choice == $choice){
                    $is_correct =1;
                }
                    else{
                       $is_correct=0;
                    }
            //Choice query
            $query="INSERT INTO `choices` (question_number, is_correct, text)
                VALUES('$question_number','$is_correct' , '$value') ";

            //Run Query
            $insert_row = $mysqli->query($query) or die($mysqli->error.'<br>');  
                        //Validate $insert
                            if($insert_row){ 
                                continue; 
                            }
                                else{
                                    die('Error : ('.$mysqli->errno .') '. $mysqli->error);
                                }
            }

        }
        $msg= 'Question has been added';
    }

}

/*
*Get total question
*/
$query="SELECT * FROM `questions`";
//Get result 
    $questions = $mysqli->query($query) or die ($mysqli->error.'<br>');
    $total = $questions->num_rows;
    $next = $total+1; 
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
                <h2> Add Question </h2>
                <?php
                if(isset($msg)){
                    echo '<p>'.$msg.'</p>';
                } ?>
               <form method="post" action="add.php">
                    <p> 
                        <label> Question Number: </label>
                        <input  type="number" value="<?php echo $next;?>" name="question_number"/> 
                    </p>

                    <p> 
                        <label> Question text: </label>
                        <input name="question_text" type="text"/> 
                    </p>

                    <p> 
                        <label> Choice #1 :</label>
                        <input name="choice1" type="text"/> 
                    </p>

                    <p> 
                        <label> Choice #2 :</label>
                        <input name="choice2" type="text"/> 
                    </p>

                    <p> 
                        <label> Choice #3 :</label>
                        <input name="choice3" type="text"/> 
                    </p>

                    <p> 
                        <label> Choice #4 :</label>
                        <input name="choice4" type="text"/> 
                    </p>

                    <p> 
                        <label> Choice #5 :</label>
                        <input name="choice5" type="text"/> 
                    </p>

                    <p> 
                        <label> Correct Choice Number :</label>
                        <input name="correct_choice" type="number"/> 
                    </p>

                    <p> 
                        <input name="submit" type="submit" value="submit"/> 
                    </p>
               </form>
            </div>
        </main>


        <footer>
        <div class="container">
                Copyright &copy; 2017 ,PHP Quizzer 
            </div>  
        </footer>
    </body>
</html>