<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodOrg Statistics</title>
    <link href="stylesheets/statistics.css" rel="stylesheet">
</head>
<body>
    <header>
        <?php
            include("nav_bar.php");
        ?>
    </header>

    <main>
       <div class="headlines">
            <h1>Most Popular Items</h1>
            <table style="width:100%" class = "statistics_table">
                <tr>
                    <th>Product</th>
                    <th>Popularity</th>
                </tr>
                <?php
                include('Includere/connection.php');
                $stmt = $dbh->prepare("SELECT name, popularity FROM `products` order by popularity DESC;");
                $stmt->execute();
                while ($row = $stmt->fetch()) {
                        if(count(explode("_", $row['name'])) > 1){
                            echo '<tr>
                                <td>';
                            $words = explode("_", $row['name']);
                            for ($i = 0; $i< count($words)-1;$i++){
                                echo  ucfirst($words[$i]) . " ";
                            }
                            echo ucfirst($words[count($words)-1]) . "</td> 
                                <td>".$row['popularity']."</td>
                            </tr>";
                        }
                        else{
                            echo '<tr>
                                <td>' .  ucfirst($row['name']) . '</td>
                                <td>'.$row['popularity'].'</td>
                            </tr>';
                        }
                  }
                ?>
            </table> 
       </div>
    </main>

</body>
</html>
