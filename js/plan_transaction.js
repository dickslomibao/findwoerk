$(document).ready(function () {
    function displayCategory() {
        $.ajax({
            type: "POST",
            url: "../../classes/member_transaction_action.php",
            data: {
                'display-payment': ''
            },
            success: function (result) {

                 $("#example").DataTable().destroy();
                $('#example').DataTable({
                    data: jQuery.parseJSON(result),
                    order: [],
                    columns: [
                    {
                        className: 'transact_id',
                        data: 'id'
                    },
                    {
                        data: 'owner_id'
                    },
                    {
                        className: 'transact_fullname',
                        data: 'fullname'
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
                            return `<button class='btn btn-action btn-cancel ` + data.status + `' data-owner_id='`+data.owner_id+`' data-id='` + data.id + `'>Cancel</button>
                                        <button class='btn btn-action btn-accept ` + data.status + `' data-owner_id='`+data.owner_id+`' data-id='` + data.id + `'>Accept</button>`;
                        }
                    }

                    ]
                });
                $('.transact_id').hide();
                $('.transact_fullname').hide();
                $('.Cancelled').hide();
            }
        });
       
    };
    let owner_id;
    let id;
    $(document).on('click', '.btn-cancel', function () {
        id = $(this).attr('data-id');
        owner_id = $(this).attr('data-owner_id');
        $("#cancel-modal").modal('show');
    })
    $(document).on('submit', '#update-form', function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "../../classes/member_transaction_action.php",
            data: {
                'update-payment': '',
                'id': id,
                'owner_id':owner_id,
                'remarks':$("#remarks").val()
            },
            success: function (result) {
                if (result === '200') {
                    $("#cancel-modal").modal('hide');
                    $("#remarks").val("");
                    swal("Successfully Cancelled!", "", "success");
                }
            }
        });
        displayCategory();
    });

    $(document).on('click', '.btn-accept', function () {
        id = $(this).attr('data-id');
        owner_id = $(this).attr('data-owner_id');
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
                        url: "../../classes/member_transaction_action.php",
                        data: {
                            'accept-payment': '',
                            'id': id,
                            'owner_id':owner_id,
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
                    displayCategory();
                }
            })
    })
    displayCategory();
});
;
