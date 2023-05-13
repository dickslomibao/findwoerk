<?php
require_once '../../classes/job_list_getter.php';
require_once '../../classes/freelancer_page_validator.php';
require_once '../../classes/categories.php';
$category = new Categories;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job hunt</title>
    <?php require_once '../linklist.php'; ?>
    <link rel="stylesheet" href="../../css/freelancer_jobhunting.css">
    <style>
        .form-control:focus {
            box-shadow: none;
        }
    </style>
</head>

<body>
    <?php require_once 'freelancer_navbar.php' ?>
    <div style="margin-top: 80px;">
    </div>

    <div class="margin-side" style="position: relative;">
        <?php require_once '../notification.php'; ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8" id="renderer">
                    <h5 class="page-title">Job Hunting</h5>
                </div>
                <div class="col-md-4" style="position: relative;">
                    <div id="side-filter" style="display: none;">
                        <h6 class="filter-title">Search:</h6>
                        <input type="text" id="search" class="form-control" placeholder="Enter keyword..." style="margin-bottom:20px">
                        <h6 class="filter-title" style="margin-left:15px">Filter By Categories:</h6>
                        <div class="category-filter">
                            <div class="row">
                                <?php foreach ($category->displayOrderByName() as $item) { ?>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input category-checkbox" type="checkbox" value="" id="<?php echo $item['id'] ?>">
                                            <label class="form-check-label text-truncate" for="flexCheckDefault">
                                                <?php echo $item['title'] ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="level-filter">
                            <h6 class="filter-title">Filter By Level:</h6>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input level-checkbox" type="checkbox" id="Basic">
                                        <label class="form-check-label text-truncate" for="flexCheckDefault">
                                            Basic
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input level-checkbox" type="checkbox" id="Intermediate">
                                        <label class="form-check-label text-truncate" for="flexCheckDefault">
                                            Intermediate
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-check">
                                        <input class="form-check-input level-checkbox" type="checkbox" id="Expert">
                                        <label class="form-check-label text-truncate" for="flexCheckDefault">
                                            Expert
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="filter-budget-container">
                            <div class="filter-budget">
                                <input class="form-check-input" type="checkbox" id="filter-budget">
                                <h6 class="filter-title">Filter By Budget:</h6>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label">From:</label>
                                    <input type="number" disabled class="form-control" value="1000.00" id="from">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">To:</label>
                                    <input type="number" disabled class="form-control" value="10000.00" id="to">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="filter-budget-container">
                            <div class="filter-budget">
                                <input class="form-check-input" type="checkbox" id="filter-budget">
                                <h6 class="filter-title">Filter By Due date:</h6>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label">From:</label>
                                    <input type="date" disabled class="form-control">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">To:</label>
                                    <input type="date" disabled class="form-control">
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>

        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <!-- <img src="..." class="rounded me-2" alt="..."> -->
                    <strong class="me-auto">Notification</strong>
                    <small>Just now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <a href="" class="job-link">
                    <div class="toast-body">
                        Dick Lomibao added proposal in your job entitled Looking for developer who is great in php
                    </div>
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="../../js/freelancer_jobhunting.js"></script>
    <script src="../../js/predefined.js"></script>
</body>

</html>