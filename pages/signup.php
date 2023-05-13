<?php
require_once '../classes/account_user_plan_action.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job hunt</title>
    
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
            <h2 class="indicator">Sign up<br><span>1/3</span></h2>
            <label for="">Firstname:</label>
            <input name="firstname" class="form-control" type="text" placeholder="Firstname" required>
            <label for="">Lastname:</label>
            <input name="lastname" class="form-control" type="text" placeholder="Lastname" required>
            <label for="">Birthdate:</label>
            <input name="birthdate" class="form-control" type="date" required>
            <label for="">Sex:</label>
            <select name="sex" id="" class="form-control" required>
                <option value="" selected hidden></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <label for="">Address:</label>
            <input name="address" class="form-control" type="text" placeholder="Address" required>
            <input class="btn" type="submit" name="next1" value="Next">
        </form>
    </div>
</body>

</html>