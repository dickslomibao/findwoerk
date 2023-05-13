<?php 
require_once "job_list_getter.php";
if(isset($_POST['display_job'])){
    $job = new Job_collection;
    echo json_encode($job->getAllJobOnGoingForBid());
}
?>