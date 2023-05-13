<?php
require_once '../../classes/job_list_getter.php';
require_once '../../classes/freelancer_page_validator.php';
require_once '../../classes/predefined_function.php';
require_once '../../classes/proposal.php';
require_once '../../classes/accountinformation.php';
require_once '../../classes/messages_class.php';
require_once '../../classes/proposal_action.php';
require_once '../../classes/job_income.php';
$job_collection = new Job_collection;
$proposal = new Proposal;
$info = new AccountInfo;
$msg = new Messages;
$income = new  JobIncome;
if (!isset($_GET['jobid'])) {
    header("Location: freelance_myworklist.php");
}
$joblist = $job_collection->getFreelancerStarted($_GET['jobid']);

if (empty($joblist)) {
    header("Location: freelance_myworklist.php");
}

$propos = $proposal->getProposalforView($_GET['jobid']);
$freelancer = $info->getImportantInfo($joblist[0]['owner_id']);

$tempConvo = $msg->conversationExits([
    $_SESSION['ownerid'] . '-' . $freelancer[0]['id'],
    $freelancer[0]['id'] . '-' . $_SESSION['ownerid'],
]);

if (count($tempConvo) === 0) {
    $msg->setUsers($_SESSION['ownerid'] . '-' . $freelancer[0]['id']);
    $msg->insert();
}

$convo = $msg->conversationExits([
    $_SESSION['ownerid'] . '-' . $freelancer[0]['id'],
    $freelancer[0]['id'] . '-' . $_SESSION['ownerid']
]);

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
    <link rel="stylesheet" href="../../css/message.css">
    <style>
        .avatar {
            height: 100px;
            width: 100px;
            border-radius: 50%;
        }

        .boxbox {
            width: 100%;
            padding: 20px;
            border: 1px solid #00732c;
        }

        .priceprice {
            padding: 10px;
            background-color: #00732c;
            margin: 0 0 20px 0;
            color: white;
            border-radius: 5px;
        }

        .btn-final {
            border: 1px solid #00732c;
            width: 100%;
            background-color: #00732c;
            padding: 6px;
            border-radius: 5px;
            color: #fff;
            font-weight: 500;
        }

        .box-rcv {
            text-align: center;
            border: 1px solid #00732c;
            padding: 20px;
        }

        .box-rcv i {
            font-size: 30px;
            margin-bottom: 10px;
            color: #00732c;
        }

        .view-btn {
            text-decoration: none;
            width: 100%;
            border: 1px solid #00732c;
            background-color: #00732c;
            padding: 6px;
            border-radius: 5px;
            color: #fff;
            transition: 1s;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <?php include 'freelancer_navbar.php' ?>
    <div style="max-width: 1300px;margin:auto">
        <div class="container-fluid" style="margin-top: 80px;">
            <?php require_once '../notification.php'; ?>
            <div class="row">
                <div class="col-md-3">
                    <h6 class="priceprice">Final Price: <?php echo $propos[0]['proposal_price']; ?></h6>

                    <h6>About the projects</h6>
                    <br>

                    <div class="boxbox">
                        <h6>Title: <?php echo $joblist[0]['title']; ?></h6>
                        <h6>Owner: <?php echo $info->getImportantInfo($joblist[0]['owner_id'])[0]['fullname'] ?></h6>
                        <h6>Budget: <?php echo $joblist[0]['budget']; ?></h6>
                        <h6>Category: <?php echo $joblist[0]['category']; ?></h6>
                    </div>
                    <br>
                    <h6>About Your proposal</h6>
                    <br>
                    <div class="boxbox">
                        <h6>Title: <?php echo $propos[0]['proposal_title']; ?></h6>
                        <h6>Price: <?php echo $propos[0]['proposal_price']; ?></h6>
                        <h6>Duration: <?php echo $propos[0]['proposal_duration']; ?></h6>
                    </div>
                    <br>
                    <?php if ($propos[0]['delivered'] != 1) { ?>
                        <button class="btn-final" data-bs-toggle="modal" data-bs-target="#deleverModal">Deliver</button>
                    <?php } ?>
                </div>
                <div class="col-md-6">
                    <div class="conversation-side">
                        <div class="conversation-info" id="msgr-info">
                        </div>
                        <div class="conv-msg-list" id="msg-list">
                        </div>
                        <div class="input-msg">
                            <div class="form-msg">
                                <button class="second-btn btn-emoji"><i class="fa-solid fa-icons second-btn"></i></button>
                                <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="addfile-btn"><i class="fa-solid fa-plus"></i></button>
                                <textarea type="text" id="msg-content" rows="1" class="form-control two" placeholder="Enter your message..."></textarea>
                                <button type="submit" class="btn-send" data-id="<?php echo $convo[0]['id']; ?>" id="sendme"><i class="fa-regular fa-paper-plane"></i>Send</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <?php if (empty($income->checkIfDone($_GET['jobid']))) {
                        if ($propos[0]['delivered'] == 1) { ?>
                            <div class="box-rcv">
                                <i class="fa-regular fa-clock"></i>
                                <h6>Already send the output. Waiting for the client to recieve the order.</h6>
                            </div>
                        <?php } else { ?>
                            <div class="box-rcv">
                                <i class="fa-regular fa-clock"></i>
                                <h6>Do it our client already waiting for the output.</h6>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="box-rcv">
                            <i class="fa-solid fa-thumbs-up"></i>
                            <h6>Job Already Done. Thank you for your effort.</h6>
                            <br>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post" id="upload-file" enctype='multipart/form-data'>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Select a file to upload</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="file" name="fileupload" id="fileupload" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="file-upload" class="btn btn-primary">Upload file</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- for delivery -->
    <div class="modal fade" id="deleverModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post" enctype='multipart/form-data'>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="jobid" value="<?php echo $_GET['jobid']; ?>" id="">
                        <input type="hidden" name="proposalid" value="<?php echo $propos[0]['id']; ?>" id="">
                        <input type="hidden" name="clientid" value="<?php echo $joblist[0]['owner_id']; ?>" id="">
                        <label for="" style="font-weight: 500;margin-bottom:10px">Project Content:</label><br>
                        <input type="file" name="fileupload" id="fileupload">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="delever-item" class="btn btn-primary">Deliver</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../../js/predefined.js"></script>
    <script src="../../js/vanillaEmojiPicker.js"></script>
    <script>
        new EmojiPicker({
            trigger: [{
                selector: '.second-btn',
                insertInto: '.two',
            }],
            closeButton: true,
        });
    </script>
    <script src="../../js/messages.js"></script>
</body>

</html>