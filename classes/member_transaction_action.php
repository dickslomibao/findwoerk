<?php 

require_once 'member_fee.php';
require_once 'notificaton_class.php';
require_once 'plan_class.php';
require_once 'income_from_memberfee.php';
$memberfee = new MembershipFee;
$plan = new Plan;
$income = new  FeeIncome;
if(isset($_POST['display-payment'])){
    echo json_encode( $memberfee->display());
}

if(isset($_POST['update-payment'])){
    $memberfee ->setId($_POST['id']);
    $memberfee ->setRemarks($_POST['remarks']);
    $memberfee->cancelPayment();
    $notification = new Notification;
    $notification->setFrom($_SESSION['ownerid']);
    $notification->setTo($_POST['owner_id']);
    $notification->setContent('Your payment was cancelled.');
    $notification->setRLink('#');
    $notification->insert();
    echo "200";
}
if(isset($_POST['accept-payment'])){
    $memberfee ->setId($_POST['id']);
    $memberfee->acceptPayment();
    $plan->setOwnerId($_POST['owner_id']);
    $plan->insert($_POST['owner_id']);
    $income->setFromId($_POST['owner_id']);
    $income->insert();
    $notification = new Notification;
    $notification->setFrom($_SESSION['ownerid']);
    $notification->setTo($_POST['owner_id']);
    $notification->setContent('Your payment already accepted. Your subscription is valid for 30 days only.');
    $notification->setRLink('#');
    $notification->insert();
    echo "200";
}
?>