<?php
include("database.php");
?>
<?php
session_start();
include("head.html");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form,
        table {
            display: flex;
            justify-content: center;
        }

        h1 {
            color: red;
            text-shadow: 1px 1px green;
            font-size: 2vw;
        }

        table {
            font-size: 24px;
        }

        .centers {
            text-align: center;
        }

        form {
            margin: 2vh;
        }

        .img-cnt {
            display: flex;
            justify-content: center;
        }

        .img {
            height: 12vw;
            width: 30vw;
        }

        .sub {
            margin: 8px 0px 7px 0;
            padding: 6px 12px;
            font-size: 16px;
            color: white;
            background-color: rgb(73, 96, 200);
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .sub:hover {
            scale: 1.1;
        }

        td input {
            font-size: 1vw;
        }

        td a {
            font-size: 16px;
        }
    </style>
</head>

<body>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
        <div>
            <h1>PLEASE LOG IN TO FAKEBOOK</h1><br>
            <table>
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="name" placeholder="Please enter username"></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="pass" placeholder="Please enter password"></td>
                </tr>
                <tr>
                    <td colspan="2" class="centers">
                        <input class="sub" type="submit" name="sub" value="Log in">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="centers"><a href="forget.php">Forgot password</a></td>
                </tr>
                <tr>
                    <td colspan="2" class="centers">
                        <a href="create.php" class="gap"> Don't have any account? create one. </a>
                    </td>
                </tr>
            </table>
        </div>
    </form><br>
    <div class="img-cnt">
        <img src="fakebook.jpg" class="img">
    </div>
</body>

</html>
<?php
if (isset($_POST["sub"])) {
    $nam = $_POST["name"];
    $_SESSION['name'] = $nam;
    $pass = $_POST["pass"];
    // $hash = password_hash($pass, PASSWORD_DEFAULT);
    if (!empty($nam) && !empty($pass)) {
        $s = "SELECT * FROM userss WHERE username = '$nam'";
        // $s = "SELECT * FROM userss WHERE username = '$nam' AND password = '$pass' ";
        $result = mysqli_query($conn, $s);
        $count = mysqli_num_rows($result);
        echo $count;
        if ($count > 0) {
            $row = mysqli_fetch_assoc($result);
            $hashed = $row['password'];
            if (password_verify($pass, $hashed)) {
                header("location: home.php");
            } else {
                echo "<center style='color:red; font-size: 1.3vw;'>Incorrect username or password</center>";
            }
            $gen = $row['gender'];
            if ($gen == 'male') {
                $_SESSION['gen'] = 'Mr.';
            } elseif ($gen == 'female') {
                $_SESSION['gen'] = 'Miss';
            }
            // header('location: home.php');
            // exit();
        } else {
            echo "<center style='color:red; font-size: 1.3vw;'>Incorrect username or password</center>";
        }
    } else {
        echo "<center style='color:red'>Please enter username and password to continue</center>";
    }
}
?>
<?php
include("foot.html");
?>