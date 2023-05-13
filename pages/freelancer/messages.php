<?php

require_once '../../classes/accountinformation.php';
require_once '../../classes/freelancer_page_validator.php';
require_once '../../classes/messages_class.php';
$msg = new Messages;
if (isset($_GET['validate'])) {
    $tempConvo = $msg->conversationExits([
        $_SESSION['ownerid'] . '-' . $_GET['validate'],
        $_GET['validate'] . '-' . $_SESSION['ownerid'],
    ]);

    if (count($tempConvo) === 0) {
        $msg->setUsers($_SESSION['ownerid'] . '-' . $_GET['validate']);
        $msg->insert();
    }

    $convo = $msg->conversationExits([
        $_SESSION['ownerid'] . '-' . $_GET['validate'],
        $_GET['validate'] . '-' . $_SESSION['ownerid']
    ]);

    header('Location: messages.php?convoid=' . $convo[0]['id']);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once '../linklist.php'; ?>
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/js/uikit-icons.min.js"></script>
    <link rel="stylesheet" href="../../css/message.css">
</head>

<body>
    <?php require_once 'freelancer_navbar.php' ?>
    <div style="margin-top: 80px;">
    </div>

    <?php require_once '../notification.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="container-message-list">
                    <div class="header-msg">
                        <h5 class="page-msg-title">Messages</h5>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                    <div class="message-list-container">
                        <p class="convo-label">Conversation list:</p>
                        <div class="main-msg-list-container" id="convolist">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <?php if (isset($_GET['convoid'])) { ?>
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
                                <button type="submit" class="btn-send" data-id="<?php echo isset($_GET['convoid']) ? $_GET['convoid'] : ""; ?>" id="sendme"><i class="fa-regular fa-paper-plane"></i>Send</button>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <h6 style="text-align: center;margin-top:calc(100vh - 60vh)">Conversation will appear here.</h6>
                <?php } ?>
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