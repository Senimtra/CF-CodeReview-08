<?php
session_start();

require_once '../../components/db_connect.php' ;


if ($_POST) {   
    $recipe = $_POST['recipe'];
    // $week = $_POST['week']; commented, because we can get weeknumber from date
    $date = $_POST['date'];
    $servings = $_POST['servings'];
    $mealtime = $_POST['time'];
    
    //to display only weekday for date:
    $dateF = DateTime::createFromFormat('Y-m-d', $date);

    // get weeknumber from date
    // $week = $dateF->format('W');
    // $weekday = $dateF->format('l');
  

    if (isset($_SESSION['user'])) {
        $uid = $_SESSION['user'];
     } 
     else {
         $uid = $_SESSION['adm'];
     }




    // $uploadError = '';
    // //this function exists in the service file upload.
    // $image = file_upload($_FILES['image'], 'animal');  // "hotel" -> for the upload function (hotels-level)
   
    $sql = "INSERT INTO weekplan (fk_userid,fk_recipeid, date, number_serv, time) VALUES ($uid, $recipe, '$date', $servings, '$mealtime')";

    if ($connect->query($sql) === true) {
        $class = "success";
        $message = "The entry below was successfully created <br>
            <table class='table w-50'><tr>
            <td> $recipe </td>
            <td>".$dateF->format('l')." </td>
            <td>".$dateF->format('d.m.Y')."</td>
            <td>week ".$dateF->format('W')." </td>
            <td> $mealtime</td>
            </tr></table><hr>";
        // $uploadError = ($image->error !=0)? $image->ErrorMessage :'';
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error;
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
        <title>Create</title>
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
            <!--Navbar-component-->
 
        <div class="container">
            <div class="mt-3 mb-3">
                <h2>Add summary mealplan</h2>
            </div>
            <div class="alert alert-<?=$class;?> " role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../planner.php'><button class="btn btn-warning" type='button'>All Entries</button></a>
            </div>
        </div>
        <!--Footer-component-->
       
    </body>
</html>