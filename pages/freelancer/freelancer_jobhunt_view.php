<?php
require_once "../../classes/job_list_getter.php";
require_once "../../classes/freelancer_page_validator.php";
require_once "../../classes/predefined_function.php";
require_once "../../classes/member_fee.php";;
if (!isset($_GET['jobid'])) {
    header('Location: freelancer_jobhunt.php');
}
$job = new Job_collection;
$memfee = new MembershipFee;
$item = $job->freelancerJobHuntView($_GET['jobid']);
if (empty($item)) {
    session_id();
    $_SESSION['errorid'] = 1;
    header('Location: ../error.php');
}
if (isset($_GET['notifid'])) {
    require_once '../../classes/notificaton_class.php';
    $notification = new Notification;
    $notification->unreadNotification($_GET['notifid']);
}
require_once "../../classes/proposal_action.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job hunt</title>
    <?php require_once '../linklist.php'; ?>
    <link rel="stylesheet" href="../../css/freelancer_jobhunting.css">
    <style>
        .mm {
            padding: 20px;
            border: 1px solid #00732c;
        }
        .avail{
            width: 100%;
            padding: 6px;
            background-color: #00732c;
            border: none;
            color: #fff;
            font-weight: 500;
            margin-top: 20px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <?php require_once 'freelancer_navbar.php' ?>
    <div style="margin-top: 80px;">
    </div>
    <div class="margin-side">
        <?php require_once "../notification.php"; ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8" id="renderer">

                    <div class="job-content">
                        <div class="job-basic-info">
                            <div class="content-info">
                                <img src="../../assets/profilepicture/<?php echo $item[0]['profile_pic']; ?>" alt="Avatar" class="owner-avatar">
                                <div>
                                    <h6 class="owner-name"><?php echo $item[0]['fullname']; ?></h6>
                                    <p class="job-category">Category: <?php echo $item[0]['cattitle']; ?> | Level: <?php echo $item[0]['level'] ?></p>
                                </div>
                            </div>
                            <p class="time">Posted <?php echo get_time_ago(strtotime($item[0]['date_created'])); ?></p>
                        </div>
                        <div class="job-primary-info">
                            <div class="job-main-content">
                                <h5 class="job-title"><?php echo $item[0]['jobtitle']; ?></h5>
                                <p class="job-desc"><?php echo $item[0]['descriptions']; ?></p>
                                <Label class="required-label">Required Skills:</Label>
                                <pre>
<?php echo $item[0]['required_skills']; ?>
</pre>
                            </div>
                        </div>
                        <div class="job-others-info">
                            <p class="budjet">Estimated Budget: <?php echo decimal($item[0]['budget']); ?></p>
                            <p class="due">Due Date: <?php echo date_format(new DateTime($item[0]['due_date']), "F d, Y"); ?></p>
                        </div>

                    </div>
                    <?php if (empty($yourproposal)) { ?>
                        <h5 class="proposal-page">You don't have proposal yet.</h5>
                    <?php } else { ?>
                        <h5 class="proposal-page">Your proposal</h5>
                        <div class="proposal-content">
                            <h5 class="proposa-title">
                                <?php echo $yourproposal[0]['proposal_title'] ?>
                            </h5>
                            <hr>
                            <div class="desc-container">
                                <p class="proposal-label">Proposal Description:</p>

                                <pre>
<?php echo $yourproposal[0]['proposal_desc'] ?>
                                </pre>
                            </div>

                            <div class="proposal-constraints">

                                <p class="duration">
                                    Duration: <?php echo $yourproposal[0]['proposal_duration']; ?>
                                </p>
                                <p class="price">
                                    Price: <?php echo decimal($yourproposal[0]['proposal_price']); ?>
                                </p>


                            </div>


                        </div>
                    <?php } ?>
                </div>
                <div class="col-md-4">
                    <?php if ($_SESSION['member'] === "YES") { ?>
                        <?php
                        $isDeclined = false;

                        if (!empty($yourproposal)) {
                            if ($yourproposal[0]['proposal_status'] === '2') {
                                $isDeclined = true;
                            }
                        }
                        if (!$isDeclined) {
                        ?>
                            <button class="btn-addproposal" data-bs-toggle="modal" data-bs-target="#exampleModal"> <?php echo  empty($yourproposal) ? "Add a " : "Update a "; ?>proposal</button>
                            <a href="messages.php?validate=<?php echo $item[0]['userid'];
                                                            ?>" class="message">
                                <div class="btn-message">
                                    Messages client
                                </div>
                            </a>
                        <?php } else { ?>
                            <div class="declined-container">
                                <h6>Your proposal was declined by the owner. Try to delete the proposal for you be able to create a new one based on the owner remarks.</h6>

                            </div>
                            <p class="remarks-label">Remarks:</p>
                            <p class="remarks-content"><?php echo $yourproposal[0]['remarks']; ?></p>
                            <br>
                            <form action="" method="post">
                                <input type="hidden" name="proposalid" value="<?php echo $yourproposal[0]['id']; ?>">
                                <input type="submit" name="delete-proposal" value="Delete proposal" class="btn-addproposal">
                            </form>
                        <?php }
                    } else { ?>
                        <h6 class="mm">You need to have membership for you be able to add proposal.</h6>
                        <?php if (!empty($memfee->checkIfhavePayment())) { ?>
                            <h6 style="text-align: center;padding-top:20px">Waiting for payment...</h6>
                        <?php } else { ?>
                            <a href="freelancer_payment.php"><button class="avail">Avail</button></a>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create a proposal</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input required type="hidden" value="<?php echo $_GET['jobid']; ?>" name="jobid" class="form-control">
                                        <input required type="hidden" value="<?php echo $item[0]['userid']; ?>" name="jobownerid" class="form-control">
                                        <label class="form-label">*Proposal Title:</label>
                                        <input required type="text" name="title" class="form-control" placeholder="Eg. Expert Web Developer for your website...">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">*Price:</label>
                                        <input required type="number" name="price" min="1" class="form-control" placeholder="0.00">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">*Proposal Descriptions: (Make it short but detailed to have a big chance to approved.)</label>
                                        <textarea required class="form-control" name="desc" rows="6" placeholder="Your proposal description..."></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">*Duration:</label>
                                        <input required type="text" name="duration" class="form-control" placeholder="Eg. 3 days">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Related documents:(.pdf,.doc,.pptx,.dcox)</label>
                                        <input type="file" class="form-control" id="document" name="document" accept=".pdf,.doc,.docx">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="Submit" name="add-proposal" class="submit-proposal">Submit proposal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="../../js/predefined.js"></script>
</body>

</html>