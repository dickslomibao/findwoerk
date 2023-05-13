<?php 
 
    require_once '../../classes/categories.php';
    require_once '../../classes/client_page_validator.php';
    require_once '../../classes/job_action.php';
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Jobs</title>
    <?php require_once '../linklist.php';?>
    <link rel="stylesheet" href="../../css/client_createjobs.css">
</head>
<body>
    <?php include 'client_navbar.php' ?>
    <div class="container" style="margin: 80px auto;">
    <?php require_once '../notification.php';?>
        <div class="row">
            <div class="col-md-8">
                <div class="create-job-content">
                    <h4 class="content-title">Create a job</h4>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label class="form-label">Job title:</label>
                            <input type="text" class="form-control" id="title" placeholder="" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Descriptions:</label>
                            <textarea class="form-control" id="desc" rows="5" name="descriptions" required></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Category:</label>
                                    <select class="form-control" name="category">
                                        <option value="" selected hidden>Select category</option>
                                        <?php 
                                            foreach ($categoryList as $value) {
                                                echo '<option value="'.$value['id'].'">'.$value['title'].'</option>';
                                            }
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Level:</label>
                                    <select class="form-control" name="level">
                                    <option value="" selected hidden>Select level</option>
                                        <option value="Entry">Entry</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Expert">Expert</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Required Skills:</label>
                            <textarea class="form-control" id="desc" rows="5" name="skills" required></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Possible budgets:</label>
                                    <input type="number" class="form-control" name="budget" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Job due date:</label>
                                    <input type="date" class="form-control" name="due" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" name="add-job" class="btn btn-addjob">Post Job</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="../../js/predefined.js"></script>
</body>

</html>