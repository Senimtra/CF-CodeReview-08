<?php
session_start();
require_once '../components/db_connect.php';
require_once '../components/sessions.php';


$recipe = "";
$result = mysqli_query($connect, "SELECT * FROM recipes");

while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $recipe .=
        "<option value='{$row['pk_recipeid']}'>{$row['recipe_name']}</option>";
}

# file where a user & admin can add a new meal plan (daily/weekly)
# user can choose between all available meals, pick a date and time and add them to the planner
# add filter function to select recipe/meal type (i.e. paleo, vegetarian, vegan, etc.)

# when user clicks on delete "Save changes" button -- the meal plan will be created
# when user clicks on "go back" button -- he/she will be re-directed to ../user/profile.php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new mealplan</title>
    <!-- adding CSS, Bootstrap, Fonts & Awesome Icons to file -->
    <?php require_once '../css/CSS_bootst_fonts.php' ?>
    <style>
        <?php include '../css/style.css'; ?>fieldset {
            margin: auto;
            margin-top: 100px;
            width: 70%;
        }

        .img-thumbnail {
            width: 70px !important;
            height: 70px !important;
        }
    </style>
</head>

<body>

    <!-- Navbar Start-->
    <?php require_once '../sections/navbar.php'; ?>
    <!-- Navbar End-->

    <fieldset></fieldset>
    <div class="container p-5">

        <h2 class='h2'>Add Mealplan</h2>
        <form action="actions/a_create.php" method="post" enctype="multipart/form-data">
            <table class='table tableColor  table-hover'>
                <tr>
                    <th>Recipe</th>
                    <td>
                        <select select class="form-select" name="recipe" aria-label="Default select example">
                            <?php echo  $recipe; ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <th>Date</th>
                    <td><input class="form-control" type="date" name="date" placeholder="Date" /></td>
                </tr>
                <tr>
                    <th>Servings</th>
                    <td><input class="form-control" type="number" name="servings" step="any" min="0" placeholder="Servings" /></td>
                </tr>
                <tr>
                    <th>Mealtime</th>
                    <td>
                        <select select class="form-select" name="time" aria-label="Default select example">
                            <option value="breakfast">Breakfast</option>
                            <option value="lunch">Lunch</option>
                            <option value="dinner">Dinner</option>
                        </select>
                    </td>
                </tr>

                <!-- <tr>
                        <th>Image</th>
                        <td><input class='form-control' type="file" name="image" /></td>
                    </tr> -->
                <tr>
                    <td><button class='btn colorBtn text-light' type="submit">Add Mealplanner Entry</button></td>
                    <td><a href="planner.php"><button class='btn colorBtn text-dark' type="button">All Entries</button></a></td>
                </tr>
            </table>
        </form>
    </div>
    </fieldset>
<!-- Footer Start -->
<?php require_once '../sections/footer.php'; ?>
  <!-- Footer End -->
    <!-- adding JS Bootstrap to file -->
    <?php require_once '../js/JS_bootst.php'; ?>
</body>

</html>