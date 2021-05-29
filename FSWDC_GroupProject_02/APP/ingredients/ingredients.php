<?php

session_start();

// ### Add components ###

require_once '../components/db_connect.php';
require_once '../components/sessions.php';

// ### Select all records from ingredients + join allergens/nutrients ###



if (isset($_POST["searchBtn"])) {
    //Was über Suchfeld kommt
    $searchIng = "%" . strip_tags($_POST["ingSearch"]) . "%";

    echo $searchIng;

    $sql = "SELECT ingredient_name, nutrient_name, calories_per_unit, unit, allergen, pk_ingredientsid
    FROM ingredients INNER JOIN nutrient ON fk_nutrient = pk_nutrient INNER JOIN allergen ON fk_allergenid = pk_allergenid 
    WHERE ingredients.ingredient_name LIKE '$searchIng' ORDER BY ingredient_name";
} else {
    $sql = "SELECT ingredient_name, nutrient_name, calories_per_unit, unit, allergen, pk_ingredientsid
    FROM ingredients INNER JOIN nutrient ON fk_nutrient = pk_nutrient INNER JOIN allergen ON fk_allergenid = pk_allergenid ORDER BY ingredient_name";
}

// $sql = "SELECT ingredient_name, nutrient_name, calories_per_unit, unit, allergen, pk_ingredientsid
// FROM ingredients INNER JOIN nutrient ON fk_nutrient = pk_nutrient INNER JOIN allergen ON fk_allergenid = pk_allergenid ORDER BY ingredient_name";
$result = mysqli_query($connect, $sql);
$tbody = '';

// ### Check present data ###

if (mysqli_num_rows($result)  > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

        // ### Building up table rows ###

        $tbody .= "<tr>
            <td>" . $row['ingredient_name'] . "</td>
            <td>" . $row['nutrient_name'] . "</td>
            <td>" . $row['calories_per_unit'] . "</td>
            <td>" . $row['unit'] . "</td>
            <td>" . $row['allergen'] . "</td>
            <th></th>
            <td><a href='ingredient_update.php?id=" . $row['pk_ingredientsid'] . "'><button class='btn colorBtn btn-sm' type='button'>Edit</button></a>
            <a href='ingredient_delete.php?id=" . $row['pk_ingredientsid'] . "'><button class='btn colorBtn text-danger btn-sm' type='button'>Delete</button></a>
            <a href='ingredient_details.php?id=" . $row['pk_ingredientsid'] . "'><button class='btn colorBtn text-success btn-sm' type='button'><i class='fas fa-info'></i></button></a></td>
            </tr>";
    };
} else {
    $tbody =  "<tr><td colspan='6'><center>No Data Available</center></td></tr>";
}

// ### Closing connection ###

$connect->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Our Ingredients</title>

    <!-- ### Add Bootstrap / Font-Awesome icons ### -->
    <?php require_once "../css/CSS_bootst_fonts.php" ?>

    <!-- ### Include CSS stylesheet ### -->
    <style>
        <?php include "../css/style.css" ?>
    </style>

</head>

<body>

    <!-- ### Add navbar section ###-->
    <?php require_once '../sections/navbar.php'; ?>

    <div class="container p-5">

        <!-- ### Content starts here ### -->

        <p class='h2'>Our Ingredients</p>
        <table class='table tableColor  table-hover'>
        <thead>
            <th><a href="ingredient_create.php"><button class='btn colorBtn' type="button">Add Ingredient</button></a></th>

            <!--Search function:-->
            
            <td colspan="6">
             <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data"> 
                
                        <td><input class="form-control" type="text" name="ingSearch" placeholder="Ingredient"></td>
                        <td><button class='btn colorBtn btn-sm ms-2 me-1' type="submit" name="searchBtn" type="submit">Search</button>
                        <a href='ingredients.php'><button class='btn btn-sm colorBtn text-warning ms-1 text-nowrap' type='button'>All ingredients</button></a></td>
                    
                    </form>
                 </td>
                 </thead>
            </table>
            <table class='table tableColor  table-hover'>
            <thead class='table-light'>
                <tr>
                    <th>Ingredient</th>
                    <th>Nutrient</th>
                    <th>Calories/Unit</th>
                    <th>Unit</th>
                    <th>Allergen</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                <!-- ### Loop-content goes here ### -->

                <?= $tbody; ?>
            </tbody>
        </table>
    </div>
<!-- Footer Start -->
<?php require_once '../sections/footer.php'; ?>
  <!-- Footer End -->
    <!-- ### Add Bootstrap 5.0 JavaScript-bundle ### -->
    <?php require_once '../js/JS_bootst.php' ?>
</body>

</html>