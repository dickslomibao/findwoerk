<?php
require_once '../../classes/job_list_getter.php';
require_once '../../classes/client_page_validator.php';
require_once '../../classes/predefined_function.php';
require_once '../../classes/proposal.php';

$job_collection = new Job_collection;
$joblist = $job_collection->getAllJobsOFClient();
$proposal = new Proposal;


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
                            <?php if (empty($joblist)) { ?>
                                <h5>You don't job yet.</h5>
                            <?php } else { ?>
                                <?php foreach ($joblist as $job) if($job['status'] == 3){ ?>
                                    <div class="job-content">
                                        <a href="client_started_jobview.php?jobid=<?php echo $job['id']; ?>" class="jobs-link">
                                            <div class="job-box">
                                                <div class="header-content">
                                                    <h5 class="job-category"><?php echo $job['category'] ?></h5>
                                                    <!-- <p class="date-posted">
                                                        Posted <?php echo get_time_ago(strtotime($job['date_created'])); ?>
                                                    </p> -->
                                                </div>
                                                <p class="level">Level: <?php echo $job['level'] ?></p>
                                                <h5 class="job-title"><?php echo $job['title'] ?></h5>
                                                <div class="job-detailed-container">
                                                    <p class="label">Job Descriptions:</p>
                                                    <p class="desc">
                                                        <?php echo $job['descriptions'] ?>
                                                    </p>
                                                </div>

                                                <div class="bottom-content">
                                                    <p class="status">
                                                        Estimated Budget: <?php echo decimal($job['budget']) ?>
                                                    </p>
                                                    <!-- <p class="proposal">
                                                        <?php if (empty($proposal->jobForPayment($job['id']))) { ?>
                                                            Total Poposal: <?php echo $proposal->jobProposalCount($job['id'])[0]['total'] ?>
                                                    </p><?php } else { ?>
                                                        <i class="fa-regular fa-clock" style="font-size: 15px;color:#fff;margin-right:10px"></i> Waiting for payment
                                                    </p><?php } ?> -->
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- <h6>Notification:</h6> -->
                </div>
            </div>
        </div>
    </div>
    <script src="../../js/predefined.js"></script>

</body>

</html>