
<?php
require_once("../components/db_connect.php");
$sql = "SELECT i.ingredient_name FRom weekplan w 
INNER JOIN recipeingredient ri ON w.fk_recipeid = ri.fk_recipe
INNER JOIN ingredients i ON i.pk_ingredientsid = ri.fk_ingredient
WHERE w.fk_userid = ".$id ." AND WEEK( w.date,1)= ".$week;

$result = mysqli_query($connect, $sql);

$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
$row = array_column($rows, "ingredient_name");
// $inarray = MYSQLI_ASSOC ($resulti);

//    // Store values into the variables
//    $week=$row['week'];
//    $user = $row['fk_userid'];
//      $ingredient = $row['ingredient_name'];

mysqli_close($connect);


