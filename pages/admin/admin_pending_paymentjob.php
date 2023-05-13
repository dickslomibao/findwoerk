<?php

require_once '../../classes/dashboard_data.php';
require_once '../../classes/admin_page_validator.php';
require_once '../../classes/predefined_function.php';
$dash = new Dashboard;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FindWork ADMIN_HOME</title>
    <link rel="stylesheet" href="../../css/body_config.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Prosto+One&display=swap');
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prosto+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,900;1,100;1,300;1,400;1,500;1,900&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,900;1,100;1,300;1,400;1,500;1,900&display=swap');
    </style>
    <link rel="stylesheet" href="../../css/navbar.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../../css/admin_category.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function() {
            function openModal() {
                $("#updateCategoryModal").modal("show");
            }
        });
    </script><style>
        .btn-cancel,.btn-cancel:hover{
            border: 1px solid red;
            color: red;
            padding: 4px 10px;
            font-size: 15px;
            font-weight: 500;
        }
        .btn-accept,.btn-accept:hover{
            background-color:forestgreen;
            color: white;
            padding: 4px 10px;
            font-size: 15px;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <?php include 'admin_navbar.php' ?>
    <div class="container-fluid p-5" style="margin-top:  10px;">
        <div class="row">
            <div class="category-first-row">
                <h4 class="page-title">Pending payment for job</h5>
            </div>
            <div class="line"></div>
            <div class="col-md-12">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Transaction id</th>
                            <th>Owner id</th>
                            <th>Owner</th>
                            <th>jobid</th>
                            <th>proposalid</th>
                            <th>price</th>
                            <th>Reference No</th>
                            <th>remarks</th>
                            <th>status</th>
                            <th>Date Created</th>
                            <th class="center-action"width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody id="transaction-content">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- udpate Modal -->
    <div class="modal fade" id="cancel-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="update-form" action="" method="POST">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cancel payment</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Remarks:</label>
                            <input type="text" class="form-control" id="remarks" placeholder="" name="u-title" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="update-category" class="btn btn-insert">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../js/pending_payment_job.js"></script>
</body>

</html>