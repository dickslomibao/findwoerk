<?php

require_once '../../classes/dashboard_data.php';
require_once '../../classes/admin_page_validator.php';
require_once '../../classes/predefined_function.php';
$dash = new Dashboard;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FindWork ADMIN_HOME</title>
    <link rel="stylesheet" href="../../css/body_config.css">
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
    <link rel="stylesheet" href="../../css/navbar.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../../css/admin_category.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function() {
            function openModal() {
                $("#updateCategoryModal").modal("show");
            }
        });
    </script>

    <style>
        .boxbox {
            padding: 20px;
            background-color: white;
            box-shadow: 0px 10px 20px 2px rgba(0, 0, 0, 0.25);
        }

        .boxbox h6 {
            font-size: 20px;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .boxbox p {
            font-size: 25px;
            font-weight: 500;
        }

        body * {
            margin: 0;
        }

        .dash {
            width: 100%;
            height: 180px;
            background-color: #00732c;
            padding-top: 20px;
        }

        .txt-dash {
            color: #fff;
            font-weight: 600;

        }

        .overv {
            color: #fff;
            margin-top: 30px;
        }
    </style>
</head>
<?php
$users = $dash->userList();
$memUsers = $dash->memberedUsers();
$roiData = $dash->roiData();
$weektoday = date('W', strtotime(date('Y-m-d H:i:s')));
$yearToday = date('Y', strtotime(date('Y-m-d H:i:s')));
$regUsers = array(
    array("y" => 0, "label" => "Sunday"),
    array("y" => 0, "label" => "Monday"),
    array("y" => 0, "label" => "Tuesday"),
    array("y" => 0, "label" => "Wednesday"),
    array("y" => 0, "label" => "Thursday"),
    array("y" => 0, "label" => "Friday"),
    array("y" => 0, "label" => "Saturday"),
);

$availedUser = array(
    array("y" => 0, "label" => "Sunday"),
    array("y" => 0, "label" => "Monday"),
    array("y" => 0, "label" => "Tuesday"),
    array("y" => 0, "label" => "Wednesday"),
    array("y" => 0, "label" => "Thursday"),
    array("y" => 0, "label" => "Friday"),
    array("y" => 0, "label" => "Saturday"),
);

$monthlyRoi = array(
    array("y" => 0, "label" => "Jan"),
    array("y" => 0, "label" => "Feb"),
    array("y" => 0, "label" => "Mar"),
    array("y" => 0, "label" => "Apr"),
    array("y" => 0, "label" => "May"),
    array("y" => 0, "label" => "Jun"),
    array("y" => 0, "label" => "Jul"),
    array("y" => 0, "label" => "Aug"),
    array("y" => 0, "label" => "Sep"),
    array("y" => 0, "label" => "Oct"),
    array("y" => 0, "label" => "Nov"),
    array("y" => 0, "label" => "Dec")
);

foreach ($users as $key => $user) {
    if ($yearToday == date('Y', strtotime($user['date_created']))) {
        if ($weektoday == date('W', strtotime($user['date_created']))) {
            $day = date('w', strtotime($user['date_created']));
            $regUsers[$day]['y'] += 1;
        }
    }
}

foreach ($memUsers as $key => $mem) {
    if ($yearToday == date('Y', strtotime($mem['date_purchased']))) {
        if ($weektoday == date('W', strtotime($mem['date_purchased']))) {
            $day = date('w', strtotime($mem['date_purchased']));
            $availedUser[$day]['y'] += 1;
        }
    }
}

foreach ($roiData as $key => $roi) {
    if ($yearToday == date('Y', strtotime($roi['date_created']))) {
        $day = date('n', strtotime($roi['date_created']));
        $monthlyRoi[$day - 1]['y'] += $roi['amount'];
    }
}
?>
<script>
    window.onload = function() {
        var ruser = new CanvasJS.Chart("registereduser", {
            title: {
                text: "Registered user for this week"
            },
            axisY: {
                title: "Number of users"
            },
            data: [{
                type: "line",
                dataPoints: <?php echo json_encode($regUsers, JSON_NUMERIC_CHECK); ?>
            }]
        });
        ruser.render();

        var memberuser = new CanvasJS.Chart("memberuser", {
            title: {
                text: "Availed membership for this week"
            },
            axisY: {
                title: "Number of users"
            },
            data: [{
                type: "line",
                dataPoints: <?php echo json_encode($availedUser, JSON_NUMERIC_CHECK); ?>
            }]
        });
        memberuser.render();

        var chart = new CanvasJS.Chart("roiSales", {
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "Commission income every month."
            },
            axisY: {
                title: "Commision income"
            },
            data: [{
                type: "column",
                yValueFormatString: "#,##0.## ROI",
                dataPoints: <?php echo json_encode($monthlyRoi, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
    }
</script>

<body>
    <?php include 'admin_navbar.php' ?>
    <div class="dash" style="margin-top: 55px;">
        <div class="margin-side">
            <h4 class="txt-dash">My Dashboard</h4>

            <h5 class="overv">Overview</h5>
        </div>
    </div>
    <div class="margin-side" style="margin-top: -50px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="boxbox">
                        <h6>Total clients:</h6>
                        <p><?php echo $dash->user(1); ?></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="boxbox">
                        <h6>Total Freelancer:</h6>
                        <p><?php echo $dash->user(2); ?></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="boxbox">
                        <h6>Commission Income:</h6>
                        <p><?php echo decimal($dash->roi(2)); ?></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="boxbox">
                        <h6>Membership Income:</h5>
                            <p><?php echo decimal($dash->memberfee()); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div id="registereduser" style="height: 300px; width: 100%;margin:auto"></div>
                </div>
                <div class="col-md-6">
                    <div id="memberuser" style="height: 300px; width: 100%;margin:auto"></div>
                </div>

                <div class="col-md-12">
                    <br><br>
                    <div id="roiSales" style="height: 370px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</body>

</html>