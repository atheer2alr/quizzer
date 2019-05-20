<?php include 'database.php';?>
<?php session_start(); ?>
<?php 
    //Check to see if score is  set_error_handeler
    if(!isset($_SESSION['score'])){
        $_SESSION['score']=0;
    }

    if($_POST){
        
        $number = $_POST['number'];
        $selected_choice = $_POST['choice'];
        $next =(int) $number+1; 
       

    /*
    *Get total question
    */
    $query="SELECT * FROM `questions`";
    //Get result 
        $results = $mysqli->query($query) or die ($mysqli->error.'<br>');
        $total = $results->num_rows;


    /*
    *Get correct choice
    */
    $query="SELECT * FROM `choices`
                WHERE `question_number` = $number AND `is_correct` =1";
                // var_dump($query);
                // exit;
    //Get result 
        $result = $mysqli->query($query) or die ($mysqli->error.'<br>');

    //Get row
        $row = $result->fetch_assoc();
    

    //Set correct choice
        $correct_choice= $row['id'];

    //Compare
        if($correct_choice==$selected_choice){
            //Answer is correct 
            $_SESSION['score']++;
        }

    //Cheack if last question
        if($number==$total){
            header("Location: final.php");
            exit();
        } 
        else {
            header("Location: question.php?n=".$next); 
        }


        // print_r($_POST);
        // echo $number.'<br>';
        // echo $selected_choice;
    }

?>

