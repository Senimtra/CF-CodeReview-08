<?php
// session_start();


require_once '../../components/db_connect.php' ;


if ($_POST) {    
    $recipe = $_POST['recipe'];
    // $week = $_POST['week']; Woche holen wir über das Datum
    $date = $_POST['date'];
    $servings = $_POST['servings'];
    $mealtime = $_POST['time'];
    $id = $_POST['weekplanId'];
    //variable for upload images errors is initialized
    $uploadError = '';

     
    $sql = "UPDATE weekplan SET fk_recipeid = $recipe, date = '$date', number_serv = $servings, time = '$mealtime' WHERE pk_weekplan = {$id}";

    if ($connect->query($sql) === TRUE) {
        $class = "success";
        $message = "The record was successfully updated";
        //Automatic Redirect after 2 sec
        header("refresh:2;url=../planner.php");
        // $uploadError = ($image->error !=0)? $image->ErrorMessage :'';
    } else {
        $class = "danger";
        $message = "Error while updating record : <br>" . $connect->error;
        // $uploadError = ($image->error !=0)? $image->ErrorMessage :'';
    }
    $connect->close();    
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update summary mealplan</title>
       <?php require_once '../../css/CSS_bootst_fonts.php' ?>
        <style>
        <?php include '../../css/style.css'; ?>
            fieldset {
                    margin: auto;
                    margin-top: 100px;
                    width: 70% ;
                }    
            .img-thumbnail{
                width: 70px !important;
                    height: 70px !important;
            }    
        </style>
    </head>
    <body>

        <div class="container">
            <div class="mt-5 mb-3">
                <h2>Update request response</h2>
            </div>
            <div class="alert alert-<?php echo $class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../planner_update.php?id=<?=$id;?>'><button class="btn btn-warning" type='button'>Back</button></a>
                <a href='../planner.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>