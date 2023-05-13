<?php 

    require_once 'job.php';
    $job = new Job;
    $category= new Categories;
    $categoryList = $category->display();
    if(isset($_POST['add-job'])){
        try{
            $job->setId(uniqid().time());
            $job->setOwnerId($_SESSION['ownerid']);
            $job->setTitle($_POST['title']);
            $job->setDescriptions($_POST['descriptions']);
            $job->setCategory_id($_POST['category']);
            $job->setLevel($_POST['level']);
            $job->setSkills($_POST['skills']);
            $job->setBudget($_POST['budget']);
            $job->setDueDate($_POST['due']);
            $job->setStatus(1);
            $job->insert();
            header("Location: client_jobs.php");
        }
        catch(PDOException $ex){
            
        }   
    }
?>