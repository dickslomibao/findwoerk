$(document).ready(function () {
    function displayPayment() {
        $.ajax({
            type: "POST",
            url: "../../classes/proposal_action.php",
            data: {
                'display-job-payement-pending': ''
            },
            success: function (result) {

                $("#example").DataTable().destroy();
                $('#example').DataTable({
                    data: jQuery.parseJSON(result),
                    order: [],
                    columns: [
                        {
                            className: 'trnsact_id',
                            data: 'id'
                        },
                        {
                            visible: false,
                            data: 'owner'
                        },
                        {
                            visible: false,
                            data: 'owner_id'
                        },
                        {
                            className: 'job_id',
                            visible: false,
                            data: 'job_id'
                        },
                        {
                            className: 'proposal_id',
                            visible: false,
                            data: 'proposal_id'
                        },
                        {
                            data: function (data) {
                                return parseFloat(data.price).toFixed(2);
                            }
                        },
                        {
                            data: 'reference_no'
                        },
                        {
                            data: 'remarks'
                        },
                        {
                            data: 'status'
                        },

                        {
                            data: function (data) {
                                const today = new Date(data.date_created)
                                const year = today.getFullYear()
                                const month = today.getMonth()
                                const day = today.getDate()
                                const finalDate = new Date(year, month, day);
                                return finalDate.toDateString();
                            }
                        },
                        {
                            data: function (data) {
                                return `<button class='btn btn-action btn-cancel' data-jobid='` + data.job_id + `' data-owner_id='` + data.owner_id + `' data-proposal_owner='` + data.owner + `' data-payment='` + data.id + `'>Cancel</button>
                                        <button class='btn btn-action btn-accept' data-jobid='` + data.job_id + `' data-owner_id='` + data.owner_id + `' data-proposal_owner='` + data.owner + `' data-payment='` + data.id + `'>Accept</button>`;
                            }
                        }

                    ]
                });

            }

        });


    };

    let owner_id;
    let id;
    let proposal_owner;
    let jobid;
    $(document).on('click', '.btn-cancel', function () {
        id = $(this).attr('data-payment');
        owner_id = $(this).attr('data-owner_id');
        proposal_owner = $(this).attr('data-proposal_owner');
        jobid=$(this).attr('data-jobid');
        $("#cancel-modal").modal('show');
    })

    $(document).on('submit', '#update-form', function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "../../classes/proposal_action.php",
            data: {
                'declined-payment': '',
                'id': id,
                'owner_id': owner_id,
                'jobid': jobid,
                'remarks': $("#remarks").val()
            },
            success: function (result) {
                if (result === '200') {
                    $("#cancel-modal").modal('hide');
                    $("#remarks").val("");
                    swal("Successfully Cancelled!", "", "success");
                }
            }
        });
        displayPayment();
    });
    $(document).on('click', '.btn-accept', function () {
        id = $(this).attr('data-payment');
        owner_id = $(this).attr('data-owner_id');
        proposal_owner = $(this).attr('data-proposal_owner');
        jobid=$(this).attr('data-jobid');
        swal({
            title: "Are you sure want to accept?",
            text: "Double check the reference number!",
            icon: "warning",
            buttons: true,
            dangerMode: false,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: "../../classes/proposal_action.php",
                        data: {
                            'accept-proposal-payment': '',
                            'id': id,
                            'jobid': jobid,
                            'owner_id':owner_id,
                            'proposal_owner':proposal_owner,
                        },
                        success: function (result) {
                            console.log(result);
                            if (result === '200') {
                                swal("Successfully accpeted.", {
                                    icon: "success",
                                });
                            }
                        }
                    });
                    displayPayment();
                }
            })
    })
    displayPayment();
});