<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="hash.php" method="POST">
        Password: <br>
        <input type="password" name="pass"><br><br>
        <input type="submit" name="sub" value="Submit">
    </form>
</body>
</html>
<?php
    if(isset($_POST["sub"])){
        $pass1 = "asdf";
        $hash1 = password_hash($pass1, PASSWORD_DEFAULT);

        $pass = $_POST["pass"];
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        if(password_verify($pass, $hash1)){
            echo "Your password is correct <br>";
            echo $hash1 . "<br>";
        }else{
            echo $hash . "<br>";
            echo "incorrect password";
        }
    }
?>