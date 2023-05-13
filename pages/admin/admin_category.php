<?php 

    require_once '../../classes/categories.php';
    require_once '../../classes/admin_page_validator.php';

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
    </script>
</head>

<body>
    <?php include 'admin_navbar.php' ?>
    <div style="max-width: 1200px; margin:auto;">
        <div class="container-fluid" style="margin-top: 55px;">
            <div class="row">
                <div class="category-first-row">
                    <h4 class="page-title">Categories</h5>
                        <button type="button" class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Add Category</button>
                </div>
                <div class="line"></div>
                <div class="col-md-12">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th width="400">Description</th>
                                <th>Date Created</th>
                                <th class="center-action">Action</th>
                            </tr>
                        </thead>
                        <tbody id="category-content">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--add Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="add-form">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" class="form-control" id="title" placeholder="" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Descriptions:</label>
                            <textarea class="form-control" id="desc" rows="3" name="descriptions" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="insert-category" class="btn btn-insert">Insert Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- udpate Modal -->
    <div class="modal fade" id="updateCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="update-form">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" class="form-control" id="u-title" placeholder="" name="u-title" required>
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Descriptions:</label>
                            <textarea class="form-control" id="u-desc" rows="3" name="u-descriptions" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="update-category" class="btn btn-insert">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../js/category.js"></script>
</body>

</html>