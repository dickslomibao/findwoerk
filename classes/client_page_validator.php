<?php 

    if(!isset($_SESSION['ownerid'])){
        header("Location: ../login.php");
    }
    if($_SESSION['usertype'] !== '1'){
        header("Location: ../login.php");
    }
    
?>