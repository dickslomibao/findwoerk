<?php 
require_once '../classes/account_user_plan_action.php';
if(!isset($_SESSION['userinfo'])){
    header('Location: signup.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/body_config.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Prosto+One&display=swap');
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prosto+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,900;1,100;1,300;1,400;1,500;1,900&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,900;1,100;1,300;1,400;1,500;1,900&display=swap');
    </style>
    <link rel="stylesheet" href="../css/login.css">
    <style>
        body,.btn{
            background-color: #00732c;
        }
        h1{
            text-align: center;
            font-size: 30px;
            font-weight: 600;
            color: #00732c;
        }
        p{
            text-align: center;
            color: red;
        }
        .login-container{
            padding-top: 20px;
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <form method="POST" action="">
            <h1>FindWork</h1>
            <h2 class="indicator">Sign up<br><span>2/3</span></h2>
            <label for="">Username:</label>
            <input name="username" class="form-control" type="text" placeholder="Username" required>
            <label for="">Password:</label>
            <input name="password" class="form-control" type="password" placeholder="Password" required>
            <label for="">Re-type password:</label>
            <input name="retype" class="form-control" type="password" placeholder="Re-type Password" required>
            <label for="">Email:</label>
            <input name="email" class="form-control" type="email" placeholder="Email" required>
            <label for="">Join as a:</label>
            <select name="type" id="" class="form-control" required>
                <option value="" selected hidden>Select type</option>
                <option value="1">Client</option>
                <option value="2">Freelancer</option>
            </select>
            <?php if($error != "") echo '<p class="error">'.$error.'</p>';?>
            <input class="btn" type="submit" name="next2" value="Next">
        </form>
    </div>
</body>
</html>