<?php
include("database.php");
?>
<?php
include("head.html");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1 {
            margin: 3vh 0;
            text-align: center;
            text-transform: uppercase;
            color: red;
            text-shadow: 1px 1px green;
        }

        .log {
            height: 22vw;
            background-color: aqua;
            margin: 0 30vw;
            padding: 1vw;
        }

        td {
            font-size: 1.2vw;
            padding: 5px;
        }

        table {
            display: flex;
            justify-content: center;
        }

        .sub {
            margin-top: 3vh;
            color: white;
            background-color: rgb(73, 96, 200);
            font-size: 1.1vw;
            padding: 4px 8px;
            border-radius: 7px;
            border: none;
            cursor: pointer;
        }
        .sub:hover{
            scale: 1.1;
        }
    </style>
</head>

<body>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
        <h1> Please create an account</h1>
        <div class="log">
            <table>
                <tr>
                    <td>
                        Full Name:
                    </td>
                    <td>
                        <input type="text" name="name" placeholder="Enter your Full Name">
                    </td>
                </tr>
                <tr>
                    <td>
                        Username:
                    </td>
                    <td>
                        <input type="text" name="username" placeholder="Enter your Username">
                    </td>
                </tr>
                <tr>
                    <td>
                        email:
                    </td>
                    <td>
                        <input type="email" name="email" placeholder="Enter your Email">
                    </td>
                </tr>
                <tr>
                    <td>
                        Date of Birth:
                    </td>
                    <td>
                        <input type="date" name="birth">
                    </td>
                </tr>
                <tr>
                    <td>
                        Password:
                    </td>
                    <td>
                        <input type="password" name="pass" placeholder="Enter your Password">
                    </td>
                </tr>
                <tr>
                    <td>
                        Confirm Password:
                    </td>
                    <td>
                        <input type="password" name="c-pass" placeholder="Re-enter your Password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">Select your Gender</td>
                </tr>
                <tr>
                    <td align="center"><input type="radio" value="male" name="gender">Male</td>
                    <td align="center"><input type="radio" value="female" name="gender">Female</td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input class="sub" type="submit" name="sub" value="Submit">
                    </td>
                </tr>
            </table>
            <div>

            </div>
        </div>
    </form>

</body>

</html>
<?php
if (isset($_POST["sub"])) {
    $pass = $_POST["pass"];
    $c_pass = $_POST["c-pass"];
    if ($pass == $c_pass) {
        if (!empty($_POST["name"]) && !empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["c-pass"])) {
            $name = $_POST["name"];
            $user = $_POST["username"];
            $email = $_POST["email"];
            $pass = $_POST["pass"];
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $gender = $_POST["gender"];
            try {
                $sql = "INSERT INTO userss (name, username, email, password, gender) VALUES ('$name', '$user', '$email', '$hash', '$gender')";
                mysqli_query($conn, $sql);
                echo "<script>window.location.href='login.php';</script>";
            } catch (mysqli_sql_exception) {
                echo "<center style='color:red'>This username or email is already taken</center>";
            }
        } else {
            echo "<center style='color:red; font-size:1vw;'>Please fill all the required informations</center>";
        }
    }else{
        echo "<center style='color:red; font-size:1vw;'>Your password doesn't match. Please fill the form correctly</center>";
    }
}
?>

<?php
include("foot.html");
?>