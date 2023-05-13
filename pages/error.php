<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once 'linklist.php'; ?>

    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        h1 {
        
            color: forestgreen;
            font-size: 25px;
            margin-bottom: 20px;
        }
        a,a:hover{
            padding: 6px 40px;
            font-weight: 500;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            background-color: forestgreen;
        }
    </style>
</head>

<body>
    <div>
        <?php 
            session_start();
            if(!isset($_SESSION['errorid'])){
                header("Location: freelancer/freelancer_jobhunt.php");
            }
            if($_SESSION['errorid'] == 1){
                echo "<center>
                <h1>Error: The job cannot found.</h1>
                <a href='freelancer/freelancer_jobhunt.php'>Return</a></center>
                ";
            }else{
                echo "<center>
                <h1>Error: ".$_SESSION['errorid']."</h1>
                ";
            }
            unset($_SESSION['errorid']);
        ?>
    </div>
</body>
</html>

