<?php
session_start();
if(!isset($_SESSION['email']))
{
	 echo "<script>location.href = 'login.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodOrg Statistics</title>
    <link href="stylesheets/shoping_list.css" rel="stylesheet">
</head>
<body>
    <header>
        <?php
            include("nav_bar.php");
        ?>
    </header>

    <main>
       <div class="headlines">
            <h1>Your Sopping List</h1>
        </div>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <?php
                include('Includere/connection.php');
                $stmt = $dbh->prepare("SELECT id FROM `users` where email = :email;");

                $stmt->bindParam(':email', $email);
                $email = $_SESSION['email'];

                $stmt->execute();
                
                
                    $usr_id =  $stmt->fetch()['id'];

                    $stmt = $dbh->prepare("SELECT name, quantity, product_id  FROM shoping_lists s JOIN products p on p.id = s.product_id WHERE user_id = :id;");

                    $stmt->bindParam(':id', $id);

                    $id=$usr_id;

                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        echo $stmt->rowCount();
                        echo '<table style="width:100%" class = "statistics_table">
                        <tr>
                            <th>Product</th>
                            <th>Quantiti</th>
                            <th>Checked</th>
                        </tr>';

                    $items = array();
                    while ($row = $stmt->fetch()) {
                        $items[] =  ucfirst($row['name']) . '_check';
                        if(count(explode("_", $row['name'])) > 1){
                            echo '<tr>
                                <td>';
                            $words = explode("_", $row['name']);
                            for ($i = 0; $i< count($words)-1;$i++){
                                echo  ucfirst($words[$i]) . " ";
                            }
                            echo ucfirst($words[count($words) - 1]) . '</td> 
                                <td>'.$row['quantity'].'</td>
                                <td><input type="checkbox" id="productcheck" name="' .  ucfirst($row['name']) . '_check" value= '. $row['product_id'] . ' ></td>
                            </tr>';
                        }
                        else{
                            echo '<tr>
                                <td>' .  ucfirst($row['name']) . '</td>
                                <td>'.$row['quantity'].'</td>
                                <td><input type="checkbox" id="productcheck" name="' .  ucfirst($row['name']) . '_check" value= '. $row['product_id'] . ' ></td>
                            </tr>';
                        }
                    }

                    $dbh = null;
                    echo ' </table> 
                
                    <input type="submit" name="submit" class="main_button" value="Remove Checked Items">';
                    
                }
                else{
                    echo '</form>
                    <div class="headlines2">
                        <h3>Your Sopping List Appears to be Empty. <a href="search.php">Search</a> for what you want and add it to your list.</h3>
                    </div>';
                }
                ?>
           
		    
        
       
    </main>

</body>
</html>

<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		include('Includere/connection.php');
        
        
        for($i = 0; $i< count($items); $i++){
            if(isset($_POST[$items[$i]])){
                $stmt = $dbh->prepare("DELETE FROM shoping_lists WHERE user_id=:id AND product_id = :pr_id;");

                $stmt->bindParam(':id', $u_id);
                $stmt->bindParam(':pr_id', $p_id);

                $u_id = $usr_id;
                $p_id = $_POST[$items[$i]];

                $stmt->execute();
            }
        }

        $dbh = null;
        echo "<script>location.href = 'shoping_list.php'</script>";
	}
?>

