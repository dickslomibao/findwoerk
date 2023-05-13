<?php

require_once '../classes/account_user_plan_action.php';

if (!isset($_SESSION['accountinfo'])) {
    header('Location: signup2.0.php');
}

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/body_config.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Prosto+One&display=swap');
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prosto+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,900;1,100;1,300;1,400;1,500;1,900&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,900;1,100;1,300;1,400;1,500;1,900&display=swap');
    </style>
    <link rel="stylesheet" href="../css/login.css">
    <style>
        .select-txt {
            margin-bottom: 30px;
            color: rgba(0, 0, 0, .7);
            font-weight: 500;
        }

        .plan {
            box-shadow: 0px 10px 20px 2px rgba(0, 0, 0, 0.25);
            padding: 20px;
            cursor: pointer;
        }

        .login-container {
            width: 700px;
            padding: 40px 50px;
        }

        .plan-title {
            text-align: center;
            color: #4caf50;
            font-weight: 600;
            margin-top: 20px;
        }

        .form-control {
            padding-left: 12px;
            padding-top: 5px;
        }

        .fff {
            padding: 10px;
            height: 150px;
            text-align: center;
            border: 1px solid #00732c;
        }
    </style>
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

        /* p{
            text-align: center;
       
        } */
        .login-container {
            padding-top: 20px;
            padding-bottom: 20px;
        }

        p {
            margin-bottom: 0;
            font-weight: 500;
        }

        h5 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 0;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <form method="POST" action="" enctype="multipart/form-data">
            <h2 class="indicator">Sign up<br><span>3/3</span></h2>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Profile Picture:</label><br>
                            <input class="form-control" type="file" id="formFile" name="profile">
                        </div>
                    </div>

                    <?php if ($_SESSION['accountinfo'][4] === '2') { ?>
                        <h6 class="select-txt">Select Plan</h6>
                        <div class="col-md-5 plan">

                            <div class="fff">
                                <p>Job hunting</p>
                                <p>Advance Search</p>
                                <p>Messaging</p>
                                <p>Notifaction</p>
                            </div>
                            <h5>FREE</h5>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-md-5 plan">

                            <div class="fff">
                                <p>Add proposal</p>
                                <p>Job hunting</p>
                                <p>Advance Search</p>
                                <p>Messaging</p>
                                <p>Notifaction</p>
                            </div>
                            <h5>150/Month</h5>
                        </div>
                        <div class="col-md-5">
                            <center>
                                <input type="radio" value="1" name="selected-plan" id="" required>
                                <label class="plan-title">Basic</label>
                            </center>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-md-5">
                            <center>
                                <input type="radio" value="2" name="selected-plan" id="" required>
                                <label class="plan-title">Premium</label>
                            </center>
                        </div>
                    <?php } ?>
                </div>

            </div>
            <button class="btn" name="signup" type="submit">Sign up</button>
        </form>
    </div>
</body>

</html>