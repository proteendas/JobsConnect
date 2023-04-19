<?php include 'authorizeAdmin.php'; ?>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/jobsConnect.svg" type="image/x-icon">
    <title> Account | Admin</title>

    <link href="css/simpleGridTemplate.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/Animate.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <link href="css/Animate.css" rel="stylesheet" type="text/css">
    <link href="css/animate.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">

    <!--FONTS-->
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@200&display=swap" rel="stylesheet">
    <style>
        .tiltContain {
            margin-top: 0%;
        }

        .btnTilt {
            height: 75px;
            background: rgba(225, 225, 225, 0.2);
            color: white;
            font-family: Comfortaa;
        }

        .textDarkShadow {
            text-shadow: 0px 0px 3px #000, 3px 3px 5px #003333;
        }

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
    </style>

<body onload="logoBeat()" style="font-family: 'Sora', sans-serif;">

    <?php
    include 'navBar.php';

    ?>
    <!-- Main Container -->
    <div class="container-fluid" style="background-color:#a0c4ff; padding-right: 50px; padding-left: 50px;">
        <?php
        include 'connect.php';

        $sqlA = "select * from admin where id = '$aid' ;";



        $resultA = $conn->query($sqlA);
        if ($resultA->num_rows > 0) {
            // output data of each row
            if ($rowA = $resultA->fetch_assoc()) {
                $name =  $rowA["name"];
                $email =  $rowA["email"];
                $fileName = $rowA["logo"];
            }
        }

        ?>


        <div class="hero">
            <div style="width: 100%; padding-left: 50px; padding-right: 50px; " class="row">
                <div class="col">
                    <div class="col-md-6" style="padding-top:50px;">
                        <img src="img/2.jpg" class="img-circle pc" width="200" style="margin: 20%; box-shadow: 0px 0px 20px #1e1e1e;">
                    </div>
                    <div style="padding-left: 500px; padding-top: 90px;">

                        <div>
                            <h4 style="margin-top:100px;">User Name</h4>
                            <h3><b><?php echo $name; ?></b></h3>
                        </div>

                        <div style="padding-top: 30px;">
                            <h4>Email</h4>
                            <h3><strong><?php echo $email; ?></strong></h3>
                        </div>

                    </div>
                </div>

                <div style=" height: 100vh; margin-top:0px;" class="col-md-12">
                    <div>
                        <h3 style="padding-bottom:30px;">Jobs Posted:</h3>
                    </div>
                    <table class="table table-hover table-responsive table-striped" id='postTable'>
                        <thead>
                            <th>Post Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Min Experience</th>
                            <th>Salary</th>
                            <th>Status</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>

                            <?php
                            $sql = "select * from post";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row['id'];
                                    $title = $row['name'];
                                    $category = $row['category'];
                                    $minexp = $row['minexp'];
                                    $salary = $row['salary'];
                                    $industry = $row['industry'];
                                    $desc = $row['desc'];
                                    $role = $row['role'];

                                    $status = $row['status'];

                            ?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td><?php echo $desc; ?></td>
                                        <td><?php echo $minexp; ?></td>
                                        <td><?php echo $salary; ?></td>
                                        <td><?php echo $status; ?></td>
                                        <td>
                                            <a href="deletePost.php?id=<?php echo $id; ?>"> <span class="glyphicon glyphicon-trash"></span></a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>

                </div>
            </div>






        </div>

    </div>


    <!--first row -->

    <script src="js/tilt.jquery.min.js"></script>
    <script src="js/signinModal.js"></script>
    <script>
        $(document).ready(function() {
            $('#postTable').DataTable();
        });
    </script>
</body>

</html>