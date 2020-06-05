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
                    <th>Produce</th>
                    <th>Times it was added to someones list</th>
                </tr>
                <?php
                include('Includere/connection.php');
                $stmt = $dbh->prepare("SELECT * FROM `statistics`;");
                $stmt->execute();
                while ($row = $stmt->fetch()) {
                    echo '<tr>
                            <td>' . $row['produce_id'] . '</td>
                            <td>'.$row['popularity'].'</td>
                        </tr>';
                  }
                ?>
            </table> 
       </div>
    </main>

</body>
</html>
