
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="stylesheets/nav_bar.css" rel="stylesheet">
    <title>FoodOrg Home</title>
</head>
<body>
    <nav>
        <div class="nav_bar">
            <div>
                <a href="home.php" class="small_logo"><img src="img/Logo_small.svg" alt="Nice Logo"></a>
                <a href="home.php" class="logo"><img src="img/Logo.svg" alt="Nice Logo"></a>
            </div>
            <ul class="nav_links">
                <li>
                    <a href="search.php">Search</a>
                </li>
                <li>
                    <a href="shoping_list.php">Checklist</a>
                </li>
                <li>
                    <a href="statistics.php">Statistics</a>
                </li>
                <?php
                if(isset($_SESSION['email']))
                {
                    echo '<li>
                            <a href="logout.php">Logout</a>
                            </li>';
                }
                else{
                    echo '<li>
                    <a href="login.php">Login</a>
                </li>';
                }
                ?>
                
                
            </ul>
            <ul class="phone_links">
                <li>
                    <a href="search.php"><img src="img/Search.svg" alt="Search"></a>
                </li>
                <li>
                    <a href="#"><img src="img/Checklist.svg" alt="Checklist"></a>
                </li>
                <li>
                    <a href="#"><img src="img/Statistics.svg" alt="Statistics"></a>
                </li>
                <li>
                    <a href="#"><img src="img/Profile.svg" alt="Profile"></a>
                </li>
            </ul>
        </div>
    </nav>
</body>
