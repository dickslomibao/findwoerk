<?php
require_once "proposal.php";
require_once "notificaton_class.php";
require_once 'porposal_paymet_class.php';
require_once 'job.php';
require_once 'job_income.php';
$proposal = new  Proposal;
$notification = new Notification;
$paymentProposal = new ProposalPayment;
$income = new JobIncome;
$Jobs = new Job;
if (isset($_POST['display-proposal'])) {
    echo json_encode($proposal->getAllJobProposal($_POST['jobid']));
    return;
}
if (isset($_POST['display-job-payement-pending'])) {
    echo json_encode($paymentProposal->getAllProposalPaymentPending());
    return;
}
if(isset($_POST['accept-proposal-payment'])){

    $paymentProposal->acceptPorposalPayment([$_POST['id']]);
    $notification->setFrom($_SESSION['ownerid']);
    $notification->setTo($_POST['owner_id']);
    $notification->setContent('Your job payment already accepted. And its already started');
    $notification->setRLink('client_started_jobview.php?jobid=' . $_POST['jobid']);
    $notification->insert();

    $notification->setFrom($_SESSION['ownerid']);
    $notification->setTo($_POST['proposal_owner']);
    $notification->setContent('Your job already started.');
    $notification->setRLink('freelancer_jobstart_view.php?jobid=' . $_POST['jobid']);
    $notification->insert();
    $Jobs->startjob($_POST['jobid']);
    echo "200";
    header("");
}
if(isset($_POST['updatepaymentproposal'])){
    $paymentProposal->updatePayment([$_POST['refno'],$_POST['id']]);
    // $notification->setFrom($_SESSION['ownerid']);
    // $notification->setTo($_POST['owner_id']);
    // $notification->setContent('Your job payment was declined. You can update it based on the remarks.');
    // $notification->setRLink('client_jobsview.php?jobid=' . $_POST['jobid']);
    // $notification->insert();
    // echo "200";
    header("");
}
if(isset($_POST['declined-payment'])){
    $paymentProposal->declinedProposal([$_POST['remarks'],$_POST['id']]);
    $notification->setFrom($_SESSION['ownerid']);
    $notification->setTo($_POST['owner_id']);
    $notification->setContent('Your job payment was declined. You can update it based on the remarks.');
    $notification->setRLink('client_jobsview.php?jobid=' . $_POST['jobid']);
    $notification->insert();
    echo "200";
}
if (isset($_POST['paymentproposal'])) {
    try {
        $id = uniqid() . time();
        $proposalData = $proposal->getSingleProposal($_POST['id']);
        $Jobs->updateJobStatus($proposalData[0]['job_id']);
        $notification->setFrom($_SESSION['ownerid']);
        $notification->setTo($proposalData[0]['owner']);
        $notification->setContent('was accepted your proposal let\'s wait for the payment.');
        $notification->setRLink('freelancer_jobhunt_view.php?jobid=' . $proposalData[0]['job_id']);
        $notification->insert();
        $paymentProposal->insert([
            $id,
            $proposalData[0]['job_id'],
            $_POST['id'],
            $proposalData[0]['proposal_price'],
            $_POST['refno'],
            '',
            'pending',
            date('Y-m-d H:i:s')
        ]);
        $proposalList = $proposal->getAllJobProposal($proposalData[0]['job_id']);
        foreach ($proposalList as $key => $value) {
            if ($value['owner'] !== $proposalData[0]['owner']) {
                $notification->setFrom($_SESSION['ownerid']);
                $notification->setTo($value['owner']);
                $notification->setContent('have already selected proposal. Thank you and better luck next time.');
                $notification->setRLink("#");
                $notification->insert();
            }
        }
        $proposal->deleteAllJobProposal([$proposalData[0]['job_id'],$proposalData[0]['owner']]);
    } catch (PDOException $ex) {
        $_SESSION['errorid'] = "Unexpected things happend. Try to repeat the proccess." . $ex;
        header('Location: ../error.php');
    }
}
if (isset($_POST['declined-proposal'])) {
    try {
        $proposal->declinedProposal($_POST['remarks'], $_POST['proposalid']);
        $notification->setFrom($_SESSION['ownerid']);
        $notification->setTo($_POST['ownerid']);
        $notification->setContent('declined your job proposal.');
        $notification->setRLink('freelancer_jobhunt_view.php?jobid=' . $_POST['jobid']);
        $notification->insert();
        $declined = true;
    } catch (PDOException $ex) {
        $_SESSION['errorid'] = "Unexpected things happend. Try to repeat the proccess.";
        header('Location: ../error.php');
    }
}
if (isset($_POST['delete-proposal'])) {
    try {
        $proposal->deleteProposal($_POST['proposalid']);
        header("");
    } catch (PDOException $ex) {
        $_SESSION['errorid'] = "Unexpected things happend. Try to repeat the proccess.";
        header('Location: ../error.php');
    }
}
if(isset($_POST['rcv-order'])){
    $income->insert([
        uniqid().time(),
        $_POST['jobid'],
        $_SESSION['ownerid'],
        $_POST['freelancer'],
        $_POST['price'],
        date("Y-m-d H:i:s")
    ]);
    $income->insertRoi($_POST['price']);
    $income->insertFreelancerMoney($_POST['price'],$_POST['freelancer']);
    $notification->setFrom($_SESSION['ownerid']);
    $notification->setTo( $_POST['freelancer']);
    $notification->setContent('already receive your output.');
    $notification->setRLink('freelancer_jobstart_view.php?jobid='.$_POST['jobid']);
    $notification->insert();
    echo '200';
}
if(isset($_POST['delever-item'])){

    if (!empty($_FILES['fileupload']['name'])) {
        $filename = uniqid() . time() . $_FILES['fileupload']['name'];
        move_uploaded_file($_FILES['fileupload']['tmp_name'], "../../assets/deliver/" . $filename);
    }
    try {
        $proposal->deliverTheProposal([$filename,$_POST['proposalid']]);
        $notification->setFrom($_SESSION['ownerid']);
        $notification->setTo($_POST['clientid']);
        $notification->setContent('already send the output of your work.');
        $notification->setRLink('client_started_jobview.php?jobid=' . $_POST['jobid']);
        $notification->insert();
        header('');
    } catch (\Throwable $th) {
        $_SESSION['errorid'] = "Unexpected things happend. Try to repeat the proccess.".$th;
        header('Location: ../error.php');
    }
}
if (isset($_POST['add-proposal'])) {
    $proposal_id = uniqid() . time();
    $filename = "";
    $proposal->setId($proposal_id);
    $proposal->setJobId($_POST['jobid']);
    $proposal->setTitle($_POST['title']);
    $proposal->setDesc($_POST['desc']);
    $proposal->setPrice($_POST['price']);
    $proposal->setDuration($_POST['duration']);
    $proposal->setOwnerId($_SESSION['ownerid']);
    $proposal->setOtherInfo("");
    if (!empty($_FILES['document']['name'])) {
        $filename = uniqid() . time() . $_FILES['document']['name'];
        move_uploaded_file($_FILES['document']['tmp_name'], "../../assets/otherdocs/" . $filename);
        $proposal->setOtherInfo($filename);
    }
    try {

        $proposal->insert();
        $notification->setFrom($_SESSION['ownerid']);
        $notification->setTo($_POST['jobownerid']);
        $notification->setContent('submitted a proposal in your job.');
        $notification->setRLink('client_proposalview.php?proposalid=' . $proposal_id);
        $notification->insert();
        header('');
    } catch (\Throwable $th) {
        $_SESSION['errorid'] = "Unexpected things happend. Try to repeat the proccess.";
        header('Location: ../error.php');
    }
}
if (isset($_GET['jobid'])) {
    $proposal->setJobId($_GET['jobid']);
    $proposal->setOwnerId($_SESSION['ownerid']);
    $yourproposal = $proposal->getProposal();
}
