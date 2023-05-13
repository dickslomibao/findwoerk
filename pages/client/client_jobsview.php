<?php
require_once '../../classes/job_list_getter.php';
require_once '../../classes/client_page_validator.php';
require_once '../../classes/predefined_function.php';
require_once '../../classes/proposal.php';

$job_collection = new Job_collection;
$proposal = new Proposal;
$joblist = $job_collection->getAllJobsOFClient($_GET['jobid']);
if (empty($joblist)) {
    $_SESSION['errorid'] = "Unexpected error occurs. job not found";
    header("Location: ../error.php");
}
if (!isset($_GET['jobid'])) {
    $_SESSION['errorid'] = "Unexpected error occurs.";
    header("Location: ../error.php");
}
$proposal_list = $proposal->getAllJobProposal($_GET['jobid']);
require_once '../../classes/proposal_action.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FindWork CLIENT_HOME</title>
    <?php require_once '../linklist.php'; ?>
    <link rel="stylesheet" href="../../css/client_jobslist.css">
    <style>
        .btn-payment {
            width: 100%;
            padding: 6px;
            margin-top: 10px;
            border-radius: 5px;
            text-align: center;
            background-color: #00732c;
            border: none;
            color: #fff;
            font-weight: 500;
        }

        .info {
            font-weight: 500;
            font-size: 16px;
            text-align: center;
            background-color: #00732c;
            padding: 20px;
            color: #fff;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <?php include 'client_navbar.php' ?>
    <div class="margin-side">
        <div class="container-fluid" style="margin-top: 80px;">
            <?php require_once '../notification.php'; ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <?php foreach ($joblist as $job) { ?>
                                <div class="job-content">
                                    <div class="job-box">
                                        <div class="header-content">
                                            <h5 class="job-category"><?php echo $job['category'] ?></h5>

                                            <p class="date-posted">
                                                Posted <?php echo get_time_ago(strtotime($job['date_created'])); ?>
                                            </p>
                                        </div>
                                        <p class="level">Level: <?php echo $job['level'] ?></p>
                                        <h5 class="job-title"><?php echo $job['title'] ?></h5>

                                        <div class="job-detailed-container">
                                            <p class="label">Descriptions:</p>

                                            <p class="desc">
                                                <?php echo $job['descriptions'] ?>
                                            </p>
                                            <p class="label" style="margin-top: 10px;">Required Skills:</p>
                                            <pre class="skills">
<?php echo $job['required_skills'] ?>
</pre>
                                        </div>
                                        <div class="bottom-content">
                                            <p class="status">
                                                Estimated Budget: <?php echo decimal($job['budget']) ?>
                                            </p>
                                            <p class="status">
                                                Due date: <?php echo date_format(new DateTime($job['due_date']), "F d, Y") ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (empty($proposal->jobForPayment($job['id']))) { ?>
                                <h5 class="txt-prompt"><?php echo empty($proposal_list) ? "No proposal yet." : "List Of Proposal: " . $proposal->jobProposalCount($job['id'])[0]['total'] ?></h5>
                            <?php } else { ?>
                                <h5 class="txt-prompt">Your Selected Proposal</h5>

                            <?php } ?>
                            <div id="render_proposal">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php if (!empty($proposal->jobForPayment($job['id']))) {
                        if ($proposal->jobForPayment($job['id'])[0]['status'] != 'canceled') { ?>
                            <center>
                                <i class="fa-regular fa-clock" style="font-size: 100px;color:#00732c"></i>
                                <br><br>
                                <h5>Already waiting for the acceptance of payment</h5>
                            </center>
                        <?php } else { ?>
                            <center>
                                <h6 style="padding: 20px;border: 1px solid red">Your payment was declined. Try to update based on the remarks.</h6>
                            </center>
                            <p style="font-weight: 500;margin:10px 0 0 0">Remarks:</p>
                            <p style="font-weight: 500;"><?php echo $proposal->jobForPayment($job['id'])[0]['remarks']; ?></p>
                            <button class="btn-payment" data-bs-toggle="modal" data-bs-target="#paymentModal">Update Payment</button>
                            <!-- Modal -->
                            <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="" method="post">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Payment</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="info">Please send the <?php echo $proposal->jobForPayment($job['id'])[0]['price']; ?> pesos total amount to continue the transaction.</p>
                                                <div class="mb-3">
                                                    <input type="hidden" name='id' class="form-control" value="<?php echo $proposal->jobForPayment($job['id'])[0]['id']; ?>" required>
                                                    <label for="exampleFormControlInput1" class="form-label" style="font-weight: 500;">Gcash Reference Number: </label>
                                                    <input type="text" class="form-control" name="refno" id="exampleFormControlInput1" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="updatepaymentproposal" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <script src="../../js/client_jobsview.js"></script>
    <script src="../../js/predefined.js"></script>
</body>

</html>