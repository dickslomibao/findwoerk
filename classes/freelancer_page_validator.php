<?php 

    if(!isset($_SESSION['ownerid'])){
        header("Location: ../login.php");
    }
    if($_SESSION['usertype'] !== '2'){
        header("Location: ../login.php");
    }  
?>