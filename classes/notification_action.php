<?php 

require_once "notificaton_class.php";
if(isset($_POST['display-notification'])){
    $notifation = new Notification;
    echo json_encode($notifation->getUserNotification($_POST['ownerid']));
    return;
}
if(isset($_POST['get_userid'])){
    echo $_SESSION['ownerid'];
    return;
}

?>