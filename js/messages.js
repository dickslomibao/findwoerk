$(document).ready(() => {

    $firstload = true;
    let mouseover = false;

    $('#convolist').mouseenter(function () {
        mouseover = true;
    })
        .mouseleave(function () {
            mouseover = false;
        });

    let msgListScrolling = false;

    $('#msg-list').on('scroll', function () {
        if ($(this).scrollTop() +
            $(this).innerHeight() >=
            $(this)[0].scrollHeight) {

            msgListScrolling = true;
        }
        else {
            msgListScrolling = false;
        }
    });


    const DisplayMessegerInfo = (() => {
        $.ajax({
            url: "../../classes/messages_action.php",
            method: "POST",
            data: {
                'messger-info': "",
                'convoid': $('#sendme').attr('data-id')
            },
            success: function (data) {
                $('#msgr-info').html(data);

            }
        });
    });
    DisplayMessegerInfo();
    const display = (() => {
        $.ajax({
            url: "../../classes/messages_action.php",
            method: "POST",
            data: { 'dispaly-convo-list': "" },
            success: function (data) {
                $('#convolist').html(data);

            }
        });
    });

    const dislayConvoMsg = (() => {
        $.ajax({
            url: "../../classes/messages_action.php",
            method: "POST",
            data: {
                'dispaly-convo-msg': "",
                'convoid': $('#sendme').attr('data-id')
            },
            success: function (data) {
                $('#msg-list').html(data);
                if (msgListScrolling) {
                    $('#msg-list').animate({
                        scrollTop: $('#msg-list')[0].scrollHeight
                    }, "fast");
                }
                if ($firstload) {
                    $('#msg-list').animate({
                        scrollTop: $('#msg-list')[0].scrollHeight
                    }, "fast");
                    $firstload = false;
                }

            }
        });
    });

    $('#sendme').click(function () {
        $.ajax({
            url: "../../classes/messages_action.php",
            method: "POST",
            data: {
                'add-convo-msg': "",
                'convoid': $(this).attr('data-id'),
                'msg': $.trim($('#msg-content').val())
            },
            success: function (data) {

            }
        });
        $('#msg-content').val("");
        dislayConvoMsg();
    });
    $('#upload-file').submit(function (e) {
        e.preventDefault();
        $("#exampleModal").modal('hide');
        let data = new FormData(this);
        data.append('convoid',$('#sendme').attr('data-id'));
        $.ajax({
            url: "../../classes/messages_action.php",
            type: "POST",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function (ss) {
                console.log(ss);
            },
            error: function () { }
        });
      
    });
    setInterval(() => {
        if (!mouseover) {
            display();
        }
        dislayConvoMsg();
        DisplayMessegerInfo();
    }, 1000);
    display();
    dislayConvoMsg();
});