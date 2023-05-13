$(document).ready(function () {
    function displayCategory() {
        $.ajax({
            type: "POST",
            url: "../../classes/categories_action.php",
            data: {
                'display-category': ''
            },
            success: function (result) {
                $("#example").DataTable().destroy();
                $('#example').DataTable({
                    data: jQuery.parseJSON(result),
                    order: [],
                    columns: [{
                        data: 'id'
                    },
                    {
                        data: 'title'
                    },
                    {
                        data: 'descriptions'
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
                            return `<button class='btn btn-action btn-edit' data-id='` + data.id + `'>Edit</button>
                                        <button class='btn btn-action btn-delete' data-id='` + data.id + `'>Delete</button>`;
                        }
                    }

                    ]
                });

            }
        });
    };

    $("#add-form").submit(function (e) {
        e.preventDefault();
        var formData = {
            'insert-category': "",
            'title': $("#title").val(),
            'descriptions': $("#desc").val(),
        };
        $.ajax({
            type: "POST",
            url: "../../classes/categories_action.php",
            data: formData,
            success: function (result) {
                if (result === '200') {
                    $("#addCategoryModal").modal('hide');
                    $("#title").val("");
                    $("#desc").val("");
                    swal("Successfully Inserted!", "", "success");
                }
            }
        });
        displayCategory();
    });
    let id;
    $(document).on('click', '.btn-edit', function () {
        id = $(this).attr('data-id');
        $.ajax({
            type: "POST",
            url: "../../classes/categories_action.php",
            data: {
                'single-category': '',
                'id': id,
            },
            success: function (result) {
                let data = jQuery.parseJSON(result);
                $("#u-title").val(data[0].title);
                $("#u-desc").val(data[0].descriptions);
                $("#updateCategoryModal").modal('show');
            }
        });
    })
    $(document).on('click', '.btn-delete', function () {
        id = $(this).attr('data-id');
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this category!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: "../../classes/categories_action.php",
                        data: {
                            'delete-category': '',
                            'id': id,
                        },
                        success: function (result) {
                            if (result === '200') {
                                swal("Successfully deleted.", {
                                    icon: "success",
                                });
                            }
                        }
                    });
                    displayCategory();
                }
            })
    })
    $(document).on('submit', '#update-form', function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "../../classes/categories_action.php",
            data: {
                'update-category': '',
                'id': id,
                'title': $("#u-title").val(),
                'descriptions': $("#u-desc").val(),
            },
            success: function (result) {
                if (result === '200') {
                    $("#updateCategoryModal").modal('hide');
                    $("#u-title").val("");
                    $("#u-desc").val("");
                    swal("Successfully Updated!", "", "success");
                }
            }
        });
        displayCategory();
    });
    displayCategory();
});
;
