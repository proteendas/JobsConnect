<?php


// Create connection

include 'authorizeEmployer.php';
$id = 0;
$name = $category = $minexp = $salary = $industry = $desc = $role = $eType = $status = $msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET') {
    include 'connect.php';
    if (isset($_GET['update']) && isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "select * from post where eid=$eid and id=$id";
        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $category = $row['category'];
            $minexp = $row['minexp'];
            $salary = $row['salary'];
            $industry = $row['industry'];
            $desc = $row['desc'];
            $role = $row['role'];
            $eType = $row['eType'];
            $status = $row['status'];
        }
    }

    if (isset($_POST['submitPost'])) {

        $id = $_POST['id'];
        $name = $_POST['name'];
        $category = $_POST['category'];
        $minexp = $_POST['minexp'];
        $salary = $_POST['salary'];
        $industry = $_POST['industry'];
        $desc = $_POST['desc'];
        $role = $_POST['role'];
        $eType = $_POST['eType'];
        $status = $_POST['status'];

        if ($id > 0) {
            $sql = "Update `post` set `date`=CURRENT_DATE(),"
                . "`name`='$name', "
                . "`category`='$category', "
                . "`minexp`='$minexp', "
                . "`desc`='$desc', "
                . "`salary`='$salary', "
                . "`industry`='$industry', "
                . "`role`='$role', "
                . "`employmentType`='$eType', "
                . "`status`= '$status' "
                . "where id=$id and eid=$eid;";
        } else {
            $sql = "INSERT INTO `post` (`id`, `date`, `eid`, `name`, `category`, `minexp`, `desc`, `salary`, `industry`, `role`, `employmentType`, `status`) "
                . "VALUES (NULL, CURRENT_DATE(), '$eid', '$name', '$category', '$minexp', '$desc', '$salary', '$industry', '$role', '$eType', '$status');";
        }

        if ($conn->query($sql) === TRUE) {
            if ($_GET['update']) {
                header('location: employerAccount.php');
            } else {
                $msg = "New Post has been created successfully";
            }
        } else {
            $msg = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>


<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/jobsConnect.svg" type="image/x-icon">
    <title> Post A Job | Employer</title>

    <link href="css/simpleGridTemplate.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/Animate.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/Animate.css" rel="stylesheet" type="text/css">
    <link href="css/animate.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Kodchasan" rel="stylesheet">
    <!--FONTS-->
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@200&display=swap" rel="stylesheet">


    <style>
        .pc {
            animation-name: pc;
            animation-duration: 3s;
            animation-iteration-count: infinite;
            animation-timing-function: ease-in-out;
            margin-left: 30px;
            margin-top: 5px;
        }

        @keyframes pc {
            0% {
                transform: translate(0, 0px);
            }

            50% {
                transform: translate(0, 15px);
            }

            100% {
                transform: translate(0, -0px);
            }
        }

        .pstjb {
            width: 400px;
        }

        .bbb {
            padding-top: 30px;
        }
    </style>

<body onload="logoBeat()" style="font-family: 'Sora', sans-serif;">

    <?php
    include 'navBar.php';

    ?>
    <!-- Main Container -->
    <div class="container-fluid" style="background-color: #e9c46a;">
        <!--background-image: url('img/4.png');-->
        <?php
        include 'connect.php';
        $eid = $_SESSION["eid"];
        $sqlE = "select * from employer where id = '$eid' ;";



        $resultE = $conn->query($sqlE);
        if ($resultE->num_rows > 0) {
            // output data of each row
            if ($rowE = $resultE->fetch_assoc()) {
                $ename =  $rowE["name"];
                $email =  $rowE["email"];
            }
        }


        ?>


        <div class="hero">

            <h3 class="pc" style="padding-top: 120px; font-size: 90px; text-align: center;"><b>POST A JOB</b></h3>

            <div class="container contact-form" style=" background-color: #2a9d8f; width: 700px; height: 1100px; box-shadow: 0px 0px 25px #1e1e1e; 
                 align-items: center; justify-content: center; display: flex; padding: 0px; ">
                <form method="post">

                    <div class="row">

                        <div class="col">


                            <input type='hidden' value="<?php echo $id; ?>" name='id' />

                            <div class="form-group">
                                <label for="name">Job Title:</label>
                                <input type="text" name="name" class="form-control" style="border-radius:0px; height: 50px;" placeholder="Enter Job Title" value="<?php echo $name; ?>" />
                            </div>

                            <div class="form-group">
                                <label for="category">Job Category</label>
                                <select type="text" name="category" class="form-control" style="border-radius:0px; height: 50px;" placeholder="Category"> <?php include 'categoryOptions.php'; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="minexp">Minimum Experiance</label>
                                <input type="text" name="minexp" class="form-control" style="border-radius:0px; height: 50px;" placeholder="Enter Minimum Expireince" value="<?php echo $minexp; ?>" />
                            </div>

                            <div class="form-group">
                                <label for="salary">Salary Budget</label>
                                <input type="text" name="salary" class="form-control" style="border-radius:0px; height: 50px;" placeholder="Enter Salary" value="<?php echo $salary; ?>" />
                            </div>

                            <div class="form-group">
                                <label for="industry">Job industry</label>
                                <select type="text" name="industry" class="form-control" style="border-radius:0px; height: 50px;" placeholder="Industry"> <?php include 'industryOptions.php'; ?>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="desc">Job requirements</label>
                                <input type="text" name="desc" class="form-control" style="border-radius:0px; height: 50px;" placeholder="Description" value="<?php echo $desc; ?>" />
                            </div>

                            <div class="form-group">
                                <label for="role">Role</label>
                                <input type="text" name="role" class="form-control" style="border-radius:0px; height: 50px;" placeholder="Enter Role" value="<?php echo $role; ?>" />
                            </div>

                            <div class="form-group">
                                <label for="eType">Employment Type</label>
                                <select type="text" name="eType" class="form-control" style="border-radius:0px; height: 50px;">
                                    <option>Permanent</option>
                                    <option>Part-Time</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="eType">Status</label>
                                <select type="text" name="status" class="form-control" style="border-radius:0px; height: 50px;">
                                    <option>Open <?php if ($status == 'open') {
                                                        echo "checked='true'";
                                                    } ?> </option>
                                    <option>Close <?php if ($status == 'closed') {
                                                        echo "checked='true'";
                                                    } ?> </option>
                                </select>
                            </div>

                            <div class="form-group bbb">

                                <button type="submit" name="submitPost" class="btn" style="background-color: #001219; color: #e9d8a6;
                            box-shadow: none; border-radius: 0px; height: 50px; width: 500px;"> <b> POST A JOB </b> </button>

                                <!--display message-->
                                <div style="font-family: Sora; font-size: 15px; color: #ffd6a5; padding-top: 15px;">
                                    <b><?php echo $msg; ?></b>
                                </div>

                            </div>

                        </div>
                    </div>
                </form>
            </div>






        </div>



    </div>




    <!--first row -->

    <script src="js/tilt.jquery.min.js"></script>
    <script src="js/signinModal.js"></script>
</body>

</html>