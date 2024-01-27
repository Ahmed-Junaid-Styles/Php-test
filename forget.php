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
        
        form div{
            display: flex;
            justify-content: center;
        }
        h2{
            margin-top: 4vh;
            text-align: center;
        }
        span span{
            font-size: 13.6px;
            width: 190px;
            display: flex;
            flex-wrap: wrap;
        }
        .sub{
            margin-left: 60px;
            margin-bottom: 2vh;
        }
    </style>
</head>

<body>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
        <h2>This form will help you to recover your Id </h2><br>
        <div>
            <span>
                <label> Enter your username: </label><br>
                <input type="text" name="name"><br><br>
                <label> Enter your email: </label><br>
                <input type="email" name="email"><br><br>
                <input class="sub" type="submit"  name="sub" value="Submit">
                <span>
                    We will send you a verification mail to ensure that this email belongs to you
                </span>
            </span>
        </div>
        <form>
</body>

</html>
<?php
    if(isset($_POST["sub"])){
        
        if(!empty($_POST["name"]) && !empty($_POST["email"]))
        header("location: login.php");
    }
?>
<?php
include("foot.html");
?>