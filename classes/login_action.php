<?php 
    
    require_once 'accountinformation.php';
    require_once 'plan_class.php';
    require_once 'notificaton_class.php';
    if(isset($_POST['signin'])){
        $account = new AccountInfo;
        $account->setUsername($_POST['username']);
        $account->setPassword(md5($_POST['password']));
        $user = $account->login();
        if(count($user) === 1){
            $plan = new Plan;
            $_SESSION['ownerid'] =$user[0]['owner_id'];
            $_SESSION['username']=$user[0]['username'];
            $_SESSION['usertype'] = strval($user[0]['type']);
            $plan->setOwnerId($user[0]['owner_id']);
            $status = $plan->isExpired();

            if($status === 0){
                $_SESSION['member']= "NO";
            }else if($status){
                $notification = new Notification;
                $notification->setFrom('63c8f1ffd668573741095238');
                $notification->setTo($_SESSION['ownerid']);
                $notification->setContent('Your subscription is already expired.');
                $notification->setRLink('#');
                $notification->insert();
                $_SESSION['member']= "NO";
            }else{
                $_SESSION['member']= "YES";
            }
            $account->updateStatus();         
            if($_SESSION['usertype'] === '1'){
                header("Location: client/client_home.php");
            }
            if($_SESSION['usertype'] === '2'){
                header("Location: freelancer/freelancer_home.php");
            }
            if($_SESSION['usertype'] === '3'){
                header("Location: admin/admin_category.php");
            }

        }else{
            $error = "Invalid account.";
        }
    }
    
?>