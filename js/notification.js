$(document).ready(async function () {

    let userid = await getuserid();
    let data = await getNotification(userid);

    callNotif(data);
    if (data.length === 0) {
        $("#render-notification").append("<p class='no-notif'> No notification</p>");
    }

    $("#notification-toggle").click(function () {
        $("a").remove('.notif-link');
        if ($("#render-notification").hasClass("hide")) {
            $("#render-notification").removeClass("hide");
        } else {
            $("#render-notification").addClass("hide")
        }
        callNotif(data);
       
    });
});
function callNotif(data) {

    data.forEach(element => {
        renderNotification(element);
    });

}
async function getNotification(id) {


    let result = await $.ajax({
        type: "POST",
        url: "../../classes/notification_action.php",
        data: {
            'display-notification': '',
            'ownerid': id,
        }
    });

    data = JSON.parse(result);
    return data;

}
function renderNotification(element) {
    let name = element['from_id'] == "63c8f1ffd668573741095238" ? "" : element['fullname'];
    let html = `<a href="` + element['redirect_link'] + `&notifid=` + element['id'] + `" class="notif-link" target="_blank">
                    <div class="notif-content `+ element['status'] + `">
                        <p class="content">
                        `+ name+ ` ` + element['content'] + `
                        </p>
                        <p class='status-notif'>`+ timeAgo(new Date(element['date_created'])) + ` | ` + element['status'] + `</p>
                    </div>
                </a>`;

    $("#render-notification").append(html);
}
async function getuserid() {
    let result = await $.ajax({
        type: "POST",
        url: "../../classes/notification_action.php",
        data: {
            'get_userid': '',
        }
    });

    return result;
}