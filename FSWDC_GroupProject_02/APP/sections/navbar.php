<?php
//defining base URL for the root of the project
// this is an individual URL - please adapt the sequence '/CF21-exercises/WF-BackEnd-7/APP/' to your folder structure
// echo $_SERVER['HTTP_HOST'];
define('BASE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/CF21-exercises/WF-BackEnd-7/APP/');

// Gregors Link
// define('BASE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/PHP/WF-BackEnd-7/APP/');

// Marios Link
// define('BASE_URL' , 'http://'.$_SERVER['HTTP_HOST'].'/week14/WF-Backend-7/WF-BackEnd-7/APP/');

//Yasmin
// define('BASE_URL' , 'http://'.$_SERVER['HTTP_HOST'].'/final-team-7/WF-BackEnd-7/APP/');


//Natalia
// define('BASE_URL' , 'http://'.$_SERVER['HTTP_HOST'].'/CF21-exercises/WF-BackEnd-7/APP/');


$buttons = '';
$navButtons = '';
$profileBtn = '';

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
  $buttons = '
  <li class="menu-item">
    <a class="" href="' . BASE_URL . 'user/login.php?action=signin">Already a member? Sign in.</a>
  </li>
  <li class="menu-item">
    <a class="" href="' . BASE_URL . 'user/login.php?action=signup">Sign Up</a>
  </li>
  ';
  $navButtons = '
  <li class="menu-item">
    <a class="" href="' . BASE_URL . 'recipies/recipies.php">Recipes</a>
  </li>
  ';
} elseif (isset($_SESSION['adm'])) {
  $buttons = '
  <li class="menu-item">
    <a class="" href="' . BASE_URL . 'user/logout.php?logout">Log out</a>
  </li>
  ';

  $profileBtn = '
  <li class="menu-item">
    <a href="' . BASE_URL . 'user/dashboard.php">Dashboard</a>
  </li>

  ';

  $navButtons = '
    <li class="menu-item">
      <a href="#0">Recipes</a>
      <ol class="sub-menu">
        <li class="menu-item"><a href="' . BASE_URL . 'recipies/recipies.php">See recipes</a></li>
        <li class="menu-item"><a href="' . BASE_URL . 'recipies/recipe_create.php">Add recipes</a></li>
      </ol>
    </li>

    <li class="menu-item">
      <a href="#0">Planner</a>
      <ol class="sub-menu">
        <li class="menu-item"><a href="' . BASE_URL . 'planner/planner.php">See planners</a></li>
        <li class="menu-item"><a href="' . BASE_URL . 'planner/planner_create.php">Add planner</a></li>
      </ol>
    </li>

    <li class="menu-item">
      <a href="#0">Ingredients</a>
      <ol class="sub-menu">
        <li class="menu-item"><a href="' . BASE_URL . 'ingredients/ingredients.php">See ingredients</a></li>
        <li class="menu-item"><a  href="' . BASE_URL . 'ingredients/ingredient_create.php">Add planner</a></li>
      </ol>
    </li>
  ';
} elseif (isset($_SESSION['user'])) {
  $buttons = '
  <li class="menu-item">
    <a class="" href="' . BASE_URL . 'user/logout.php?logout">Log out</a>
  </li>
  ';

  $profileBtn = '
  <li class="menu-item">
    <a href="' . BASE_URL . 'user/profile.php">Profile</a>
  </li>
  ';

  $navButtons = '
    <li class="menu-item">
      <a href="#0">Recipes</a>
      <ol class="sub-menu">
        <li class="menu-item"><a href="' . BASE_URL . 'recipies/recipies.php">See recipes</a></li>
        <li class="menu-item"><a href="' . BASE_URL . 'recipies/recipe_create.php">Add recipes</a></li>
      </ol>
    </li>

    <li class="menu-item">
      <a href="#0">Planner</a>
      <ol class="sub-menu">
        <li class="menu-item"><a href="' . BASE_URL . 'planner/planner.php">See planners</a></li>
        <li class="menu-item"><a href="' . BASE_URL . 'planner/planner_create.php">Add planner</a></li>
      </ol>
    </li>
    ';
}

?>

<style>
  .menu {
    background: #BFAB93;
    height: 4rem;
  }

  .menu ol {
    list-style-type: none;
    margin: 0 auto;
    padding: 0;
  }

  .menu>ol {
    max-width: 1000px;
    padding: 0 2rem;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
  }

  .menu>ol>.menu-item {
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
    padding: 0.75rem 0;
  }

  .menu>ol>.menu-item:after {
    content: '';
    position: absolute;
    width: 4px;
    height: 4px;
    border-radius: 50%;
    bottom: 5px;
    left: calc(50% - 2px);
    background: #FECEAB;
    will-change: transform;
    -webkit-transform: scale(0);
    transform: scale(0);
    -webkit-transition: -webkit-transform 0.2s ease;
    transition: -webkit-transform 0.2s ease;
    transition: transform 0.2s ease;
    transition: transform 0.2s ease, -webkit-transform 0.2s ease;
  }

  .menu>ol>.menu-item:hover:after {
    -webkit-transform: scale(1);
    transform: scale(1);
  }

  .menu-item {
    position: relative;
    line-height: 2.5rem;
    text-align: center;
  }

  .menu-item a {
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    display: block;
    color: #FFF;
  }

  .sub-menu .menu-item {
    padding: 0.75rem 0;
    background: #BFAB93;
    opacity: 0;
    -webkit-transform-origin: bottom;
    transform-origin: bottom;
    -webkit-animation: enter 0.2s ease forwards;
    animation: enter 0.2s ease forwards;
  }

  .sub-menu .menu-item:nth-child(1) {
    -webkit-animation-duration: 0.2s;
    animation-duration: 0.2s;
    -webkit-animation-delay: 0s;
    animation-delay: 0s;
  }

  .sub-menu .menu-item:nth-child(2) {
    -webkit-animation-duration: 0.3s;
    animation-duration: 0.3s;
    -webkit-animation-delay: 0.1s;
    animation-delay: 0.1s;
  }

  .sub-menu .menu-item:nth-child(3) {
    -webkit-animation-duration: 0.4s;
    animation-duration: 0.4s;
    -webkit-animation-delay: 0.2s;
    animation-delay: 0.2s;
  }

  .sub-menu .menu-item:hover {
    background: #F8B195;
  }

  .sub-menu .menu-item a {
    padding: 0 0.75rem;
  }

  @media screen and (max-width: 780px) {
    .sub-menu .menu-item {
      background: #C06C84;
    }
  }

  @media screen and (max-width: 780px) {

    /* .menu {
		z-index: -1;
    position: relative;
  } */
    .menu {
      position: relative;
    }

    .menu:hover {
      z-index: 1;
    }

    /* hamburger menu */
    .menu:after {
      content: '';
      position: absolute;
      top: calc(50% - 2px);
      right: 1rem;
      width: 30px;
      height: 4px;
      background: #FFF;
      -webkit-box-shadow: 0 10px #FFF, 0 -10px #FFF;
      box-shadow: 0 10px #FFF, 0 -10px #FFF;
    }

    .menu>ol {
      display: none;
      background: #BFAB93;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -ms-flex-direction: column;
      flex-direction: column;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      justify-content: center;
      height: 0vh;
      -webkit-animation: fade 0.2s ease-out;
      animation: fade 0.2s ease-out;
    }

    .menu>ol:hover {
      height: 100vh;
    }

    .menu>ol>.menu-item {
      -webkit-box-flex: 0;
      -ms-flex: 0;
      flex: 0;
      opacity: 0;

      -webkit-animation: enter 0.3s ease-out forwards;
      animation: enter 0.3s ease-out forwards;
    }

    /* .menu > ol > .menu-item:hover {
		background: yellow;
	} */

    .menu>ol>.menu-item:nth-child(1) {
      -webkit-animation-delay: 0s;
      animation-delay: 0s;
    }

    .menu>ol>.menu-item:nth-child(2) {
      -webkit-animation-delay: 0.1s;
      animation-delay: 0.1s;
    }

    .menu>ol>.menu-item:nth-child(3) {
      -webkit-animation-delay: 0.2s;
      animation-delay: 0.2s;
    }

    .menu>ol>.menu-item:nth-child(4) {
      -webkit-animation-delay: 0.3s;
      animation-delay: 0.3s;
    }

    .menu>ol>.menu-item:nth-child(5) {
      -webkit-animation-delay: 0.4s;
      animation-delay: 0.4s;
    }

    .menu>ol>.menu-item+.menu-item {
      margin-top: 0.75rem;
    }

    .menu>ol>.menu-item:after {
      left: auto;
      right: 1rem;
      bottom: calc(50% - 2px);
    }

    /* .menu > ol > .menu-item {
		z-index: -1;
		background: white;
	}

  .menu > ol > .menu-item:hover {
    z-index: 1;
  } */

    .menu:hover>ol {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
    }

    .menu:hover:after {
      -webkit-box-shadow: none;
      box-shadow: none;
      z-index: -10;
      display: none;
    }

    ol>li>a {
      display: none;
      visibility: hidden;
      z-index: -100;
    }

    ol:hover>li>a {
      visibility: visible;
    }
  }

  .sub-menu {
    position: absolute;
    width: 100%;
    top: 100%;
    left: 0;
    display: none;
    z-index: 1;
  }

  .menu-item:hover>.sub-menu {
    display: block;
  }

  @media screen and (max-width: 780px) {
    .sub-menu {
      width: 100vw;
      left: -2rem;
      top: 50%;
      -webkit-transform: translateY(-50%);
      transform: translateY(-50%);
    }
  }

  * {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
  }

  *:before,
  *:after {
    -webkit-box-sizing: inherit;
    box-sizing: inherit;
  }

  a {
    text-decoration: none;
  }

  @-webkit-keyframes enter {
    from {
      opacity: 0;
      -webkit-transform: scaleY(0.98) translateY(10px);
      transform: scaleY(0.98) translateY(10px);
    }

    to {
      opacity: 1;
      -webkit-transform: none;
      transform: none;
    }
  }

  @keyframes enter {
    from {
      opacity: 0;
      -webkit-transform: scaleY(0.98) translateY(10px);
      transform: scaleY(0.98) translateY(10px);
    }

    to {
      opacity: 1;
      -webkit-transform: none;
      transform: none;
    }
  }

  @-webkit-keyframes fade {
    from {
      opacity: 0;
    }

    to {
      opacity: 1;
    }
  }

  @keyframes fade {
    from {
      opacity: 0;
    }

    to {
      opacity: 1;
    }
  }

  /*# sourceMappingURL=styles.css.map */
</style>

<nav class="menu">
  <ol class="d-flex justify-content-center" id="menu">
    <li class="d-flex align-self-center">
      <img style="height:50px;" src="https://img.icons8.com/wired/64/ffffff/omlette.png" />
    </li>
    <li class="menu-item">
      <a href="<?php echo BASE_URL; ?>home.php">Home</a>
    </li>
    <!-- buttons for profile/dashboard -->
    <?php echo $profileBtn; ?>

    <!-- buttons for recipes, mealplanner, ingredients-->
    <?php echo  $navButtons; ?>

    <li class="menu-item">
      <a href="<?php echo BASE_URL; ?>about-us.php">About us</a>
    </li>

    <!-- signup/login/logout-->
    <?php echo $buttons; ?>
  </ol>
</nav>