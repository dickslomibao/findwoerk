<?php 
    require_once '../classes/login_action.php';
?>

<!DOCTYPE html>
<html>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <?php require_once 'linklist.php'; ?>
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
            margin-bottom: 10px;
        }
        p{
            text-align: center;
            color: red;
        }
    </style>
</head>
<body>
    <div class="login-container" style="padding: 40px;">
        <form method="POST" action="">
            <h1>FindWork</h1>
            <h2 class="indicator">Sign in</h2>
            <label >Username:</label>
            <input   name= "username"class="form-control" type="text" placeholder="Username" required>
            <label for="">Password:</label>
            <input  name= "password" class="form-control" type="password" placeholder="Password" required>
            <?php if(isset($error)) echo "<p>$error</p>" ?>
            <button class="btn"  name="signin" type="submit">Sign in</button>
            <center>
                <a href="signup.php">Create an account</a>
            </center>
        </form>
    </div>
</body>

</html>