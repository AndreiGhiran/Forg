<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodOrg Home</title>
    <link href="stylesheets/search.css" rel="stylesheet">
    <link href="stylesheets/nav_bar.css" rel="stylesheet">
</head>
<body>
    <?php
        include("nav_bar.php");
    ?>

    <main>
        <div class="logo-big">
            <img src="img/Logo_medium.svg" alt="Big Nice Logo">
       </div>
       <form action="search_process.php" method ="GET" class="radio">
           <p class="main_search">Searh recipe</p>

           <input type="text" class="main_textbox" id="recipe_input">

           <div class="filters_container">
               <div class="filter">
                    <p class="filter_name">Category</p>
                    <div class="label_choice">
                        <input type="radio" id="all" name="category" value="all" checked>
                        <label for="all">All</label>
                    </div>
                    <div class="label_choice">
                        <input type="radio" id="breakfast" name="category" value="breakfast">
                        <label for="breakfast">Breakfast</label>
                    </div>
                    <div class="label_choice">
                        <input type="radio" id="lunch" name="category" value="lunch">
                        <label for="lunch">Lunch</label>
                    </div>
                    <div class="label_choice">
                        <input type="radio" id="dinner" name="category" value="dinner">
                        <label for="dinner">Dinner</label>
                    </div>
                    <div class="label_choice">
                        <input type="radio" id="dessert" name="category" value="dessert">
                        <label for="dessert">Dessert</label>
                    </div>
               </div>

                <div class="filter">
                    <p class="filter_name">Price Range</p>
                    <div class="slider_container">
                        <p class="slider_values">0$</p>
                        <input type="range" min="1" max="100" value="10" class="slider" id="myRange" onchange="updateTextInput(this.value);">
                        <p class="slider_values">100$</p>
                        <p class="label_choice">Value:</p>
                        <input type="text" id="textInput" value="10" class="small_value">
                    </div>
                </div>

                <div class="filter">
                    <p class="filter_name">Season</p>
                    <div class="label_choice">
                        <input type="radio" id="all" name="season" value="all" checked>
                        <label for="all">All</label>
                    </div>
                    <div class="label_choice">
                        <input type="radio" id="winter" name="season" value="winter">
                        <label for="winter">Winter</label>
                    </div>
                    <div class="label_choice">
                        <input type="radio" id="spring" name="season" value="spring">
                        <label for="spring">Spring</label>
                    </div>
                    <div class="label_choice">
                        <input type="radio" id="summer" name="season" value="summer">
                        <label for="summer">Summer</label>
                    </div>
                    <div class="label_choice">
                        <input type="radio" id="fall" name="season" value="fall">
                        <label for="fall">Fall</label>
                    </div>
                </div>

                <div class="filter">
                    <p class="filter_name">Diet</p>
                    <div class="label_choice">
                        <input type="radio" id="all" name="diet" value="all" checked>
                        <label for="all">All</label>
                    </div>
                    <div class="label_choice">
                        <input type="radio" id="gluten-free" name="diet" value="gluten-free">
                        <label for="gluten-free">Gluten-free</label>
                    </div>
                    <div class="label_choice">
                        <input type="radio" id="vegan" name="diet" value="vegan">
                        <label for="vegan">Vegan</label>
                    </div>
                </div>

                <div class="filter">
                    <p class="filter_name">Ingredient filter</p>
                    <input type="text" class="small_textbox" id="ingredient_input">
                </div>

                <div class="filter">
                    <p class="filter_name">Allergens</p>
                    <input type="text" class="small_textbox" id="allergen_input">
                </div>

           </div>

       </form>
    </main>
    <script>
    function updateTextInput(val) {
          document.getElementById('textInput').value=val;
        }
    </script>
</body>
</html>
