<?php require_once '../../classes/accountinformation.php';
require_once '../../classes/freelancer_page_validator.php';
require_once '../../classes/job_income.php';
require_once '../../classes/predefined_function.php';
$income = new JobIncome;
$account = new AccountInfo;



$info = $account->getImportantInfo($_SESSION['ownerid']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once '../linklist.php'; ?>
    <style>
        .header-profile {
            width: 100%;
            height: 220px;
            background-color: #00732c;
        }

        .img-profile {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            object-fit: cover;
            border: 10px solid #fff;
        }

        .resume-content {
            margin: auto;
            border: 1px solid rgba(0, 0, 0, .1);
            border-radius: 10px;
            padding: 30px
        }

        .bio {
            padding: 20px;
            white-space: pre-wrap;
            font-size: 15px;
            font-weight: 500;
        }

        .center {
            padding: 0;
        }

        .educaton {
            border: 1px solid rgba(0, 0, 0, .1)
        }

        .label {
            font-weight: 500;
            margin: 20px 0;
            color: #00732c;
            font-size: 18px;
        }

        .right-side-profile {
            width: 350px;
            position: fixed;
        }

        .right-side-profile p {
            margin-top: 20px;
            font-weight: 500;
            font-size: 18px;
        }

        .btn-success {
            background-color: #fff;
            color: #00732c;
            font-weight: 500;
        }

        .t-title {
            margin: 20px 0;
            color: #00732c;
        }

        .profile-info {
            color: #fff;
            padding: 20px;
            background-color: #00732c;
        }

        .profile-info h6 {
            color: #fff;
        }
        .profile-info h5 {
            color: #fff;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <?php require_once 'freelancer_navbar.php' ?>
    <div style="margin-top: 80px;">
    </div>
    <div class="margin-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="right-side-profile">
                        <center>
                            <img src="../../assets/profilepicture/<?php echo $info[0]['profile_pic']; ?>" alt="" srcset="" class="img-profile">
                            <h5><?php echo $info[0]['fullname']; ?>"</h5>
                            <!-- <h6>Web Developer</h6> -->
                        </center>
                        <!-- 
                        <button class="btn btn-success w-100 mt-3">Messages</button>
                        <p>Total Completed Jobs: 20</p> -->
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="profile-info">
                        <h5>Your Available Balance: <?php echo decimal($income->FreelancerAvailableBalance($_SESSION['ownerid'])); ?></h5>
                        <h6>Total success work: <?php echo count($income->freelancerjobdone($_SESSION['ownerid'])) ?></h6>
                        <h6>Total Earnings: <?php echo decimal($income->FreelancerEarnings($_SESSION['ownerid'])); ?></h6>

                    </div>
                    <h5 style="margin: 20px 0;">Freelancer Resume</h5>
                    <div class="resume-content">
                        <pre class="bio center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores eos est suscipit mollitia beatae? Earum nisi libero, aspernatur aliquid cum quia voluptatibus quae incidunt laudantium animi! Neque voluptatum placeat provident?s ! Neque voluptatum placeat provident?ss</pre>
                        <p class="label">Educational Attaintment</p>
                        <pre class="bio educaton">
ELEMENTARY (2020-2020)   -   ALITAYA ELEMENTARY SCHOOL
SECONDARY (2020-2020)    -   MANGALDAN NATIONAL HIGH SCHOOL
TERTIARY (2020-2020)    -   PANGASINAN STATE UNIVERSITY (URDANETA CAMPUS)
</pre>

                        <p class="label">Work Experience</p>
                        <pre class="bio educaton">
JAVA DEVELOPER - Mars
PHP DEVELOPER - Jupiter
FLUTTER DEVELOPER - Earth</pre>

                        <p class="label">Skills</p>
                        <pre class="bio educaton">
PHP
C#
JAVASCRIPT
REACT
FLUTTER</pre>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="height: 200px;"></div>
</body>

</html>