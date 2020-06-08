<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search results</title>
</head>
<body>
    <header>
         <?php
            include("nav_bar.php");
        ?>
    </header>
   <main>
                   
          <?php 
            include('Includere/connection.php');

            $category_string = " AND category = :category ";
            $price_string = " AND price <= :price ";
            $season_string = " AND season = :season ";
            $diet_string = " AND diet = :diet ";
            $allergens_string = "";
            // $allergens_string = " AND allergens IN (:allergens) ";

            $category_q = $_GET['category'];
            $season_q = $_GET['season'];
            $diet_q = $_GET['diet'];


            if ($category_q == "all") {
                $category_string = "";
            }            
            if ($season_q == "all") {
                $season_string = "";
            }
            if ($diet_q == "none") {               
                $diet_string = "";
            }
            
            
            $query = "SELECT * FROM `products`
                WHERE name = :name " . $category_string . $price_string . $season_string . $diet_string . $allergens_string . ";";
            $stmt = $dbh->prepare($query);
            $stmt->bindParam(':name', $name);        
            $stmt->bindParam(':price', $price);
            // $stmt->bindParam(':allergens', $allergens);

            if ($category_q != "all") {
                $stmt->bindParam(':category', $category);
            }
            if ($season_q != "all") {
                $stmt->bindParam(':season', $season);
            }
            if ($diet_q != "none") {               
                $stmt->bindParam(':diet', $diet);
            }
            

            $name = $_GET['name'];
            $category = $category_q;
            $price = $_GET['price'];
            $season = $_GET['season'];
            $diet = $_GET['diet'];
            // $allergens = $_GET['allergens'];


            $stmt->execute();

            $count = $stmt->rowCount();
            if($count){
                while ($row = $stmt->fetch()) {
                    echo "<p>".$row['name']."</p>";
                }
            }
            else echo 'no results';
            
            
        ?>
   </main>
</body>
</html>