<?php
include("database.php");

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
        $user = $_POST["name"];
        $pass = $_POST["pass"];

        if(empty($user) or empty($pass)){
            echo "username or password is missing";
        }else{
            $sql = "INSERT INTO users (user, passwords) 
                    VALUES ('$user', '$pass')";
            mysqli_query($conn, $sql);
            echo "You are registered";
        }
    }
?>