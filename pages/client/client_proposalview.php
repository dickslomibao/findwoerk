<?php
require_once '../../classes/proposal.php';
require_once '../../classes/client_page_validator.php';
require_once '../../classes/predefined_function.php';
require_once '../../classes/proposal_action.php';

$proposal = new Proposal;

if (!isset($_GET['proposalid'])) {
    header('Location: client_jobs.php');
    return;
}

if (isset($_GET['notifid'])) {
    require_once '../../classes/notificaton_class.php';
    $notification = new Notification;
    $notification->unreadNotification($_GET['notifid']);
}
$notAccepted = true;
if (count($paymentProposal->getSinglePayment($_GET['proposalid'])) >= 1) {
    $notAccepted = false;
}

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
    <link rel="stylesheet" href="../../css/client_proposalview.css">
</head>

<body>
    <?php if (isset($declined)) {
    ?>
        <script>
            swal("Successfully Declined", "", "success");
        </script>

    <?php
        header("Refresh: 3, URL = client_jobs.php");
        return;
    }
    $item = $proposal->getSingleProposal($_GET['proposalid']);
    if (empty($item)) {
        $_SESSION['errorid'] = "Unexpected error occurs. Proposal not found. Maybe it's already deleted or declined";
        header("Location: ../error.php");
    }
    ?>

    <?php require_once 'client_navbar.php' ?>
    <div style="margin-top: 80px;">

    </div>
    <div class="margin-side">
        <?php require_once '../notification.php' ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8" id="renderer">
                    <?php if (!$notAccepted) { ?>
                        <div style="width: 100%; border :1px solid #00732c;padding:20px;margin-bottom:20px">
                            <center>
                                <i class="fa-regular fa-clock" style="font-size: 50px;color:#00732c;margin-bottom:10px"></i>
                                <h5>
                                    Already waiting for the acceptance of payment.</h5>
                            </center>
                        </div>
                    <?php } ?>
                    <div class="proposal-content">
                        <h5 class="proposa-title">
                            <?php echo $item[0]['proposal_title'] ?>
                        </h5>
                        <p class="date-created">Posted <?php echo get_time_ago(strtotime($item[0]['date_created'])) ?></p>
                        <hr>
                        <div class="desc-container">
                            <p class="proposal-label">Proposal Description:</p>

                            <pre>
<?php echo $item[0]['proposal_desc'] ?>
                                </pre>
                        </div>
                        <div class="proposal-constraints">

                            <p class="duration">
                                Duration: <?php echo $item[0]['proposal_duration']; ?>
                            </p>
                            <p class="price">
                                Price: <?php echo decimal($item[0]['proposal_price']); ?>
                            </p>
                        </div>
                        <hr>
                        <?php if ($item[0]['proposal_otherinfo'] !== "") { ?>
                            <div class="other-info-proposal">
                                <p class="other-ref">Other Reference:</p>
                                <a href="../../assets/otherdocs/<?php echo $item[0]['proposal_otherinfo'] ?>" target="_blank">View reference</a>
                            </div>
                            <hr>
                        <?php } ?>

                        <div class="btn-proposal-bottom">
                            <?php if ($notAccepted) { ?>
                                <button class="btn-addproposal declined-proposal" data-bs-toggle="modal" data-bs-target="#exampleModal">Decline proposal</button>
                                <button class="btn-acceptproposal">Accept proposal</button>
                            <?php } else { ?>

                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- <?php print_r($item[0]) ?> -->
                    <center>
                        <img src="../../assets/profilepicture/<?php echo $item[0]['profile_pic']; ?>" class="avatar-freelancer" alt="" srcset="">
                        <h5 class="proposal-name"><?php echo $item[0]['fullname'] ?></h5>
                        <h6>Web Developer</h5>
                    </center>
                    <button class="btn-addproposal">Message freelancer</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Declined Propsal</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <input required type="hidden" value="<?php echo $item[0]['id']; ?>" name="proposalid" class="form-control">
                                <input required type="hidden" value="<?php echo $item[0]['owner']; ?>" name="ownerid" class="form-control">
                                <input required type="hidden" value="<?php echo $item[0]['job_id']; ?>" name="jobid" class="form-control">

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Remarks:(Please provide short remarks)</label>
                                        <textarea required class="form-control" name="remarks" rows="6" placeholder="Your remarks here..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="Submit" name="declined-proposal" class="submit-proposal">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Payment</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="info">Please send the <?php echo $item[0]['proposal_price']; ?> pesos total amount to continue the transaction.</p>
                        <div class="mb-3">
                            <input type="hidden" name='id' class="form-control" value="<?php echo $item[0]['id']; ?>" required>
                            <label for="exampleFormControlInput1" class="form-label" style="font-weight: 500;">Gcash Reference Number: </label>
                            <input type="text" class="form-control" name="refno" id="exampleFormControlInput1" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="paymentproposal" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script src="../../js/predefined.js"></script>
    <script>
        $(document).on('click', '.btn-acceptproposal', function() {
            // id = $(this).attr('data-id');
            // owner_id = $(this).attr('data-owner_id');
            swal({
                    title: "Are you sure want to accept the proposal?",
                    text: "Please check the provided price if you already satiesfied.",
                    icon: "info",
                    buttons: true,
                    dangerMode: false,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $("#paymentModal").modal('show');
                    }
                })
        })
    </script>
</body>

</html>