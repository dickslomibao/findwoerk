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
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form action="" method="post">
                    <br>
                    <h3>Payment</h3>
                    <p>Scan the G-CASH QR CODE to pay and enter the reference number in provided text field</p>
                    <br>
                    <label for="">Reference Number:</label>
                    <input type="text" name="refnumber" id="" class="form-control" required><br>
                    <input type="submit" value="Submit" name="payment" class=" w-100 btn btn-success">
                </form>
            </div>
        </div>
    </div>


</body>

</html>