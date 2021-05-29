<?php 


require_once '../../components/db_connect.php';

if  ($_POST) {
   $id = $_POST[ 'id'];
//    $picture = $_POST['picture'];
//    ($picture =="product.png")?: unlink("../pictures/$picture" );

   $sql = "DELETE FROM weekplan WHERE pk_weekplan = {$id}";
   if ($connect->query($sql) === TRUE) {
       $class = "success";
       $message = "Successfully Deleted!";
       header("refresh:2;url=../planner.php");
   } else {
       $class = "danger";
       $message = "The entry was not deleted due to: <br>" . $connect->error;
   }
   $connect->close();
} else {
   header("location: ../error.php");
}
?>


<!DOCTYPE html>
<html lang= "en">
   <head>
       <meta  charset="UTF-8">
       <title>Delete summary mealplan</title>
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
       <div  class="container">
           <div class="mt-3 mb-3" >
               <h2>Delete request response</h2>
           </div>
            <div class="alert alert-<?=$class;?>" role="alert">
               <p><?=$message;?></p >
               <a href ='../planner.php'><button class= "btn btn-success" type='button'> All Entries</button></a>
            </div>
       </div >
   </body>
</html>