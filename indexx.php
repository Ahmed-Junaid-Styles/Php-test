<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="POST">
    <label>Username: </label><br>
    <input type="text" name="name"><br>
    <label>Password: </label><br>
    <input type="password" name="pass"><br>
    <input type="submit" name="sub" value="Submit">
    </form>
</body>
</html>

<?php
   if(isset($_POST["sub"])){
       if(!empty($_POST["name"]) && !empty($_POST["pass"])){
        $_SESSION["name"] = $_POST["name"];
        $_SESSION["pass"] = $_POST["pass"];
        header("location: home.php");
    }
   }
?>