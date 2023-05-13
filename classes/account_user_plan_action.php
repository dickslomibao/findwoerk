<?php
require_once 'accountinformation.php';
require_once 'userinformation.php';
require_once 'member_fee.php';
require_once 'notificaton_class.php';
$error = "";
$userinfo = [];
$accountInfo = [];
if (isset($_POST['next1'])) {

    $userinfoPOST = array(
        'firstname',
        'lastname',
        'birthdate',
        'sex',
        'address'
    );

    foreach ($userinfoPOST as $value) {
        array_push($userinfo, $_POST[$value]);
    }

    $_SESSION["userinfo"] = $userinfo;
    header("Location: signup2.0.php");
}

if (isset($_POST['next2'])) {
    $accountinfoPOST = array(
        'username',
        'password',
        'retype',
        'email',
        'type'
    );

    foreach ($accountinfoPOST as $value) {
        array_push($accountInfo, $_POST[$value]);
    }
    if ($accountInfo[1] == $accountInfo[2]) {
        $_SESSION["accountinfo"] = $accountInfo;
        header("Location: signup3.0.php");
    } else {
        $error = "Password didn't match.";
    }
}

if(isset($_POST['payment'])){
    try {
        $plan = new MembershipFee;
        $plan->setOwnerId($_SESSION['ownerid']);
        $plan->setRefNo($_POST['refnumber']);
        $plan->insert();
        $notification = new Notification;
        $notification->setFrom('63c8f1ffd668573741095238');
        $notification->setTo($_SESSION['ownerid']);
        $notification->setContent('Your payment was pending.');
        $notification->setRLink('#');
        $notification->insert();
        if ($_SESSION['usertype'] === '1') {
            header("Location: client_home.php");
        }
        if ($_SESSION['usertype'] === '2') {
            header("Location: freelancer_home.php");
        }
    } catch (\Throwable $th) {
        $_SESSION['errorid'] = "Unexpected things happend. Try to repeat the proccess.";
        header('Location: ../error.php');
    }


}

if (isset($_POST['signup'])) {

    $extensionName =  pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION);
    $fullFileName =  uniqid() . "." . $extensionName;
    //validate if the profile pic is successfully uploaded.
    if (move_uploaded_file($_FILES['profile']['tmp_name'], '..\\assets\\profilepicture\\' . $fullFileName)) {
        try {
            $id = uniqid() . time();
            $user = new User;
            $account = new AccountInfo;
            $user->setID($id);
            $user->setFirstName($_SESSION["userinfo"][0]);
            $user->setLastname($_SESSION["userinfo"][1]);
            $user->setBirthdate($_SESSION["userinfo"][2]);
            $user->setSex($_SESSION["userinfo"][3]);
            $user->setAddress($_SESSION["userinfo"][4]);
            $user->insert();
            $account->setOwnerid($id);
            $account->setUsername($_SESSION["accountinfo"][0]);
            $account->setPassword(md5($_SESSION["accountinfo"][1]));
            $account->setEmail($_SESSION["accountinfo"][3]);
            $account->setType($_SESSION["accountinfo"][4]);
            $account->setProfilepic($fullFileName);
            $account->insert();
            $_SESSION['ownerid'] = $id;
            $_SESSION['username'] = $_SESSION["accountinfo"][0];
            $_SESSION['usertype'] = $_SESSION["accountinfo"][4];
            $_SESSION['member']= "NO";
            unset($_SESSION['accountinfo']);
            unset($_SESSION['userinfo']);
            if ($_POST['selected-plan'] === '2') {
                header("Location: freelancer/freelancer_payment.php");
            }else {
                if ($_SESSION['usertype'] === '1') {
                    header("Location: client/client_home.php");
                }
                if ($_SESSION['usertype'] === '2') {
                    header("Location: freelancer/freelancer_home.php");
                }
            }
            exit();
        } catch (PDOException $ex) {
      
        }
    }
}
