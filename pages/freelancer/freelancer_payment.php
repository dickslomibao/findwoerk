<?php
require_once '../../classes/account_user_plan_action.php';
require_once '../../classes/freelancer_page_validator.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FindWork CLIENT_HOME</title>
    
    <?php require_once '../linklist.php'; ?>
    <link rel="stylesheet" href="../../css/login.css">
    <style>
        body,
        .btn {
            background-color: #00732c;
        }

        h1 {
            text-align: center;
            font-size: 30px;
            font-weight: 600;
            color: #00732c;
        }
        h3{
            text-align: center;
        }
        p{
            font-weight: 500;
            text-align: center;
            margin: 15px 0;
        }
        .login-container {
            padding-top: 20px;
            padding-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <form action="" method="post">
            <br>
            <h3>Payment</h3>
            <p>Scan the G-CASH QR CODE to pay 150 and Enter the reference number in provided textfield</p>
            <label for="">Reference Number:</label>
            <input type="text" name="refnumber" id="" class="form-control" required><br>
            <input type="submit" value="Submit" name="payment" class=" w-100 btn btn-success">
        </form>
    </div>
</body>

</html>