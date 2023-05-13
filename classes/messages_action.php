<?php
require_once 'messages_class.php';
require_once 'accountinformation.php';
require_once 'predefined_function.php';
require_once 'conversation.php';
$msg = new Messages;
$info = new AccountInfo;
$convo = new Conversation;


if (isset($_POST['add-convo-msg'])) {
    $id = $_POST['convoid'];
    $msg = $_POST['msg'];
    try {
        $convo->insert([
            $id,
            $msg,
            $_SESSION['ownerid'],
            'normal',
            'unread',
            date("Y-m-d H:i:s")

        ]);
        echo '200';
    } catch (PDOException $ex) {
        echo $ex;
    }
}
if (isset($_FILES['fileupload'])) {
    $extensionName =  pathinfo($_FILES['fileupload']['name'], PATHINFO_EXTENSION);
    $fullFileName =  uniqid() . time() . "." . $extensionName;
    if (move_uploaded_file($_FILES['fileupload']['tmp_name'], '..\\assets\\msg\\' . $fullFileName)) {
        try {
            $convo->insert([
                $_POST['convoid'],
                $fullFileName,
                $_SESSION['ownerid'],
                $extensionName,
                'unread',
                date("Y-m-d H:i:s")

            ]);
            echo '200';
        } catch (PDOException $ex) {
            echo $ex;
        }
    }
}

if (isset($_POST['messger-info'])) {
    $cv = $msg->conversationInfo($_POST['convoid']);
    $users = explode('-', $cv[0]['users']);
    $user = $users[0] === $_SESSION['ownerid'] ? $users[1] :  $users[0];
    $messagerInfo = $info->getImportantInfo($user);
    $active = get_time_ago(strtotime($messagerInfo[0]['user_status']));
    if (strpos($active, 'sec')) {
        $active = 'Active Now';
    } else {

        $active = 'Active  ' . $active . ' ago';
    }
    echo '
        <img src="../../assets/profilepicture/' . $messagerInfo[0]['profile_pic'] . '" alt="" class="user-msg-avatar">
        <div class="user-information-msg">
            <h5>' . $messagerInfo[0]['fullname'] . '</h5>
            <p>' . $active . '</p>
        </div>';
}

if (isset($_POST['dispaly-convo-msg'])) {
    $info->updateStatus();
    $data = $convo->getMessageListOfConvo($_POST['convoid']);
    foreach ($data as $key => $value) {
        $add = "";
        $content = "";

        if ($value['type'] === 'normal') {
            $content = htmlspecialchars($value['content']);
        } else if ($value['type'] === 'jpg' || $value['type'] === 'jpeg' || $value['type'] === 'png' || $value['type'] === 'webp' ||  $value['type'] === 'gif') {
            $content = "<a href='../../assets/msg/".$value['content']."'><img src= '../../assets/msg/" . $value['content'] . "' class='img-fluid img-msg'></a>";
        } else {
            $content = "<a href='../../assets/msg/".$value['content']."'>".$value['content']."</a>";
        }
        if ($value['sender'] === $_SESSION['ownerid']) {
            $add = 'owner';
        }
        echo '<div class="convo-content ' . $add . '">
        <div class="convo-content-list">
            <pre>
' . $content . '
</pre>
            <p class="msg-interval">' . get_time_ago(strtotime($value['date_created'])) . ' ago</p>
        </div>

    </div>';
    }
}
if (isset($_POST['dispaly-convo-list'])) {
    $data = $msg->getUserConvo($_SESSION['ownerid']);
    foreach ($data as $key => $item) {
        $users = explode('-', $item['users']);
        $user = $users[0] === $_SESSION['ownerid'] ? $users[1] :  $users[0];
        $messagerInfo = $info->getImportantInfo($user);
        $last = $convo->getLastMsg($item['id']);
        if (count($last) != 0) {
            echo '
            <a href="messages.php?convoid=' . $item['id'] . '" class="msg-link">
                <div class="message-list">
                    <div class="side-content">
                        <img src="../../assets/profilepicture/' . $messagerInfo[0]['profile_pic'] . '" alt="">
                        <div class="message-content">
                            <h6>' . $messagerInfo[0]['fullname'] . '</h6>
                            <div class="temp-message">
                                <p>' . htmlspecialchars($last[0]['content']) . '</p>
                            </div>
                        </div>
                    </div>
                    <span>' . get_time_ago(strtotime($item['status'])) . '</span>
                </div>
            </a>
            ';
        }
    }
}
