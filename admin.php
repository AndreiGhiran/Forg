<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodorg Admin</title>
    <link rel="stylesheet" href="/stylesheets/admin.css">
    <link rel="stylesheet" href="stylesheets/nav_bar.css">
</head>
<body>
    <header>
        <?php
            include("nav_bar.php");
        ?>
    </header>
<script>
    
    function banuser() {
        
        var ceva = document.getElementById("myform");
        console.log("hello");
        var rawFile = new XMLHttpRequest();
        rawFile.open("GET", "form_user.txt", false);
        rawFile.onreadystatechange = function ()
        {
            if(rawFile.readyState === 4)
            {
                console.log("if ready");
                if(rawFile.status === 200 || rawFile.status == 0)
                {
                    var allText = rawFile.responseText;
                    ceva.innerHTML=allText;
                    // console.log(allText);
                }
                else ceva.innerHTML = "Something wrong";
            }
        }
        rawFile.send(null);
    }

    function additem() {
        
    }
</script>
    <main>
        <button onclick="banuser()">Ban user</button>
        <div id="myform">
        </div>
        <button onClick="additem()">Add Item</button>
        <div id="myitem">

        </div>
    </main>
</body>
</html>
