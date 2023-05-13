$(document).ready(async function () {
    let data = await displayJob();
    $('#side-filter').css('display', 'block');
    let categories = [];
    let level = [];
    let budgetIsChecked = false;
    let from = 0;
    let to = 0;

    // $("#liveToast").addClass('show').show().delay(10000).fadeOut();

    for (let i = 0; i < data.length; i++) {
        render(data[i]);
    }
    $(document).on('click', '.category-checkbox', function () {
        let catid = $(this).attr('id');
        if ($(this).prop("checked") === true) {
            if (!categories.includes(catid)) {
                categories.push(catid);
            }
        } else {
            let catIndex = categories.indexOf(catid);
            categories.splice(catIndex, 1);
        }
        triggerFillter();
    });
    $(document).on('click', '.level-checkbox', function () {
        let catid = $(this).attr('id');
        if ($(this).prop("checked") === true) {
            if (!level.includes(catid)) {
                level.push(catid);
            }
        } else {
            let catIndex = level.indexOf(catid);
            level.splice(catIndex, 1);
        }
        triggerFillter();
    });
    const disablerInput = (flag) => {
        $('#from').prop('disabled', flag);
        $('#to').prop('disabled', flag);
    }
    $(document).on('click', '#filter-budget', function () {
        if ($(this).prop("checked") === true) {
            disablerInput(false);
        } else {
            disablerInput(true);
            $('#from').val("5000.00");
            $('#to').val("10000.00");
        }
        budgetIsChecked = $(this).prop("checked");
        triggerFillter();
    });
    $(document).on('keyup', '#from', function () {
        triggerFillter();
    });
    $(document).on('keyup', '#search', function () {
        triggerFillter();
    });
    $(document).on('keyup', '#to', function () {
        triggerFillter();
    });
    const validateBudgetInput = () => {
        from = parseFloat($("#from").val());
        to = parseFloat($("#to").val());
        return from <= to;
    }
    const budgetCheckedRenderer = (element) => {
        if (validateBudgetInput()) {
            let budget = element['budget'];
            if (budget >= from && budget <= to) {
                render(element);
            }
        } else {
            if ($("#nodata").length === 0) {
                $("#renderer").append('<h6 id="nodata">Invalid budget input</h6>');
            }
        }
    }
    const triggerFillter = () => {
        $("div").remove('.job-content');
        let search = $('#search').val();
        $("#nodata").remove();
        console.log(search);
        if (categories.length > 0 || level.length > 0) {
            data.forEach(element => {
                let isValid = false;
                if (categories.length > 0 && level.length > 0) {
                    if (categories.includes(element['catid']) && level.includes(element['level'])) {
                        isValid = true;
                    }
                } else if (categories.length > 0 && level.length == 0) {
                    if (categories.includes(element['catid'])) {
                        isValid = true;
                    }
                } else {
                    if (level.includes(element['level'])) {
                        isValid = true;
                    }
                }
                if (isValid) {
                    if (search == "") {
                        if (budgetIsChecked) {
                            budgetCheckedRenderer(element);
                        } else {
                            render(element);
                        }
                    } else {
                        if (element['jobtitle'].includes(search)) {
                            if (budgetIsChecked) {
                                budgetCheckedRenderer(element);
                            } else {
                                render(element);
                            }
                        }
                    }

                }
            });
        } else {
            data.forEach(
                element => {
                    if (search == "") {
                        if (budgetIsChecked) {
                            budgetCheckedRenderer(element);
                        } else {
                            render(element);
                        }
                    } else {
                        if (element['jobtitle'].includes(search)) {
                            if (budgetIsChecked) {
                                budgetCheckedRenderer(element);
                            } else {
                                render(element);
                            }
                        }
                    }

                }
            );
        }
        if ($("#renderer div").length == 0 && $("#nodata").length === 0) {
            $("#renderer").append('<h6 id="nodata">No data found</h6>');
        }
    }
});
function render(data) {
    let html = `
            <div class="job-content">
                <a href="freelancer_jobhunt_view.php?jobid=`+ data['jobid'] + `" class="job-link">
                    <div class="job-basic-info">
                        <div class="content-info">
                            <img src="../../assets/profilepicture/`+ data['profile_pic'] + `" alt="Avatar" class="owner-avatar">
                            <div>
                                <h6 class="owner-name">`+ data['fullname'] + `</h6>
                                <p class="job-category">Category: `+ data['cattitle'] + ` | Level: ` + data['level'] + `</p>
                            </div>
                        </div>
                        <p class="time">Posted `+ timeAgo(new Date(data['date_created'])) + `</p>
                    </div>
                    <div class="job-primary-info">
                        <div class="job-main-content">
                            <h5 class="job-title">`+ data['jobtitle'] + `</h5>
                            <p class="job-desc" id ="`+ data['jobid'] + `"></p>
                        </div>
                    </div>
                    <div class="job-others-info">
                        <p class="budjet">Estimated Budget: P`+ parseFloat(data['budget']).toFixed(2) + `</p>
                        <p class="due">Due: `+ moment(new Date(data['due_date'])).format('MMMM DD, YYYY') + `</p>
                    </div>
                </a>
            </div>
        `;
    $("#renderer").append(html);
    $(`#` + data['jobid'] + ``).text(data['descriptions']);
}

async function displayJob() {
    let data;
    let result = await $.ajax({
        type: "POST",
        url: "../../classes/freelancer_jobhunting_action.php",
        data: {
            'display_job': ''
        }
    });
    data = JSON.parse(result);
    return data;
}