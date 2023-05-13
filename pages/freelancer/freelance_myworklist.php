<?php
require_once '../../classes/job_list_getter.php';
require_once '../../classes/freelancer_page_validator.php';
require_once '../../classes/predefined_function.php';
require_once '../../classes/proposal.php';






$job_collection = new Job_collection;
$proposal = new Proposal;
$proposallist = $proposal->getWorkListOfFreelancer();

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
    <link rel="stylesheet" href="../../css/freelancer_jobhunting.css">
</head>

<body>
    <?php include 'freelancer_navbar.php' ?>
    <div class="margin-side">
        <div class="container-fluid" style="margin-top: 80px;">
            <?php require_once '../notification.php'; ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Your Work list</h5>
                            <br>
                            <?php foreach ($proposallist as $list) {
                                // print_r($list);
                                $job = $job_collection->getWorkListOfFreelancer($list['job_id']);
                                // print_r($job);
                                if (!empty($job)) {
                                    if ($job[0]['status'] == 3) { ?>
                                        <a href="freelancer_jobstart_view.php?jobid=<?php echo $list['job_id']; ?>" class="jobs-link">
                                            <div class="job-content">
                                                <div class="job-basic-info">
                                                    <div class="content-info">
                                                        <img src="../../assets/profilepicture/<?php echo $job[0]['profile_pic']; ?>" alt="Avatar" class="owner-avatar">
                                                        <div>
                                                            <h6 class="owner-name"><?php echo $job[0]['fullname']; ?></h6>
                                                            <p class="job-category">Category: <?php echo $job[0]['cattitle']; ?> | Level: <?php echo $job[0]['level'] ?></p>
                                                        </div>
                                                    </div>
                                                    <!-- <p class="time">Posted <?php echo get_time_ago(strtotime($job[0]['date_created'])); ?></p> -->
                                                </div>
                                                <div class="job-primary-info">
                                                    <div class="job-main-content">
                                                        <h5 class="job-title"><?php echo $job[0]['jobtitle']; ?></h5>
                                                        <p class="job-desc"><?php echo $job[0]['descriptions']; ?></p>
                                                        <Label class="required-label">Required Skills:</Label>
                                                        <pre>
<?php echo $job[0]['required_skills']; ?>
</pre>
                                                    </div>
                                                </div>
                                                <div class="job-others-info">
                                                    <p class="budjet">Estimated Budget: <?php echo decimal($job[0]['budget']); ?></p>
                                                    <p class="due">Due Date: <?php echo date_format(new DateTime($job[0]['due_date']), "F d, Y"); ?></p>
                                                </div>

                                            </div>
                                        </a>
                            <?php }
                                }
                            } ?>

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