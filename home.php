<?php
session_start();
$rec = $_SESSION['name'];
$gend = $_SESSION['gen']
?>
<?php
include("fb left.html");
include("fb right.html");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin:0;
        }
        h1{
            margin-top: 2vh;
            color: green;
            text-align: center;
        }
        form{
            display: flex;
            justify-content: center;
        }
        a{
            text-align: center;
        }
        .sub{
            padding: 4px 8px;
            font-size: 18px;
            color: white;
            background-color: red;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1>
        Welcome to the Home page <br><br>
    </h1>
    <!-- <div href="#">Hi <?php echo $rec;?> </div> -->
    <?php echo "<center style='font-size: 20px'> Hi {$gend} {$rec} </center>";?><br>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
    <div>
        <input type="submit" class="sub" name="logout" value="log out">
    </div>
    </form>
</body>

</html>
<?php
    if(isset($_POST["logout"])){
        session_destroy();
        echo '<script>window.location.reload()</script>';
        header("location: login.php");
    }
?>
<!-- <?php
    // include("foot.html");
?> -->

