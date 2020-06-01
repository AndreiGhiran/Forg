<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodOrg Home</title>
    <link href="stylesheets/home.css" rel="stylesheet">
</head>
<body>
    <header>
        <?php
            include("nav_bar.php");
        ?>
    </header>

    <main>
       <div class="logo-big">
            <img src="img/Logo_Big.svg" alt="Big Nice Logo">
       </div>
       <div class="headlines">
            <h1>Organize your foods. Search ingredients, save recipes, make checklists</h1>
            <h2>All one place.</h2>
       </div>
       <div class="buttons">
            <a href="search.php"><button class="main_button">
                SEARCH FOOD
            </button></a>
            <a href="register.php"><button class="second_button">
                CREATE ACCOUNT
            </button></a>
       </div>
    </main>

</body>
</html>
