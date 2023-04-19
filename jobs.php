<!doctype html>


<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/jobsConnect.svg" type="image/x-icon">

  <title> JobsConnect | Job Listings </title>

  <link href="css/simpleGridTemplate.css" rel="stylesheet" type="text/css">
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="css/Animate.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link href="css/Animate.css" rel="stylesheet" type="text/css">
  <link href="css/animate.min.css" rel="stylesheet" type="text/css">


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
      font-family: Sora;
    }

    .textDarkShadow {
      text-shadow: 0px 0px 3px #000, 3px 3px 5px #003333;
    }

    /*-------------------------------------------*/
    .btn {
      cursor: pointer;
      transition: 0.8s;
    }

    .btn:hover {
      transform: scale(1.1);
    }

    /*-------------------------------------------------*/
    .dm {
      padding-top: 100px;
    }

    /*------------------------------------------------------*/
    .mbbtn {
      width: 120px;
      height: 40px;
      background-color: #e9c46a;
      color: black;
      transition: 0.4s;
    }

    .mbbtn:hover {
      transform: scale(1.08);
      background-color: #e9c46a;
      color: black;
    }

    /*------------------------------------------------------------*/
    .floating {
      animation-name: floating;
      animation-duration: 3s;
      animation-iteration-count: infinite;
      animation-timing-function: ease-in-out;
      margin-left: 30px;
      margin-top: 5px;
    }

    @keyframes floating {
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

    /* ---------------------------------------------------------------------*/
    .crd {
      height: 320px;
      width: 460px;
      border-radius: 20px;
      cursor: pointer;
      transition: 0.8s;
    }

    .crd:hover {
      transform: scale(1.05);
    }

    /* -------------------------------------------------------------------------------------- */
  </style>


<body onload="logoBeat()" style="font-family: 'Sora', sans-serif;">

  <?php
  include 'navBar.php';
  include 'signinEmployerModals.php';
  ?>

  <!-- Main Container -->
  <div class="container-fluid" style=" background-color: #18303B; background-position: center; background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">

    <div class="hero" style=" color:whitesmoke; height: 1700px;">
      <br>
      <br>

      <div style="width: 100%" class="row">
        <div class="col-md-9">
          <div style=" margin-top: 30px; padding-left: 50px;">
            <h1 id="jbs">Find jobs</h1>
            <form class="example" action="jobs.php">
              <input style="color:#000; height:45px; width:800px; border-radius:30px 0px 0px 30px;" type="text" placeholder="     Search For Jobs.." name="q">
              <button type="submit" style="height:45px; width:160px; border-radius:0px 30px 30px 0px; background-color: #257059; "><i class="fa fa-search bb"></i></button>
            </form>
          </div>


          <div class="container" style="padding-left:50px; padding-top:50px; padding-bottom:50px;">

            <!----------------------SUM OF POSTS & ACTIVE USERS USING VIEW TABLES--------------------------->

            <!-- sum of posts -->
            <?php
            include 'connect.php';
            $sql = "select * from `totalposts`";
            $totalresult = $conn->query($sql);
            if ($totalresult->num_rows > 0) {
              while ($row = $totalresult->fetch_assoc()) {
                $numberofposts = $row['AllPosts'];
            ?>
                <h3 style="font-family: 'Schoolbell', cursive; font-family: 'Vollkorn', serif; color: #f2cc8f; padding-left:4px;"> Total Job Posts Available: <?php echo $numberofposts; ?> </h3>
            <?php }
            } ?>

            <!-- active users -->
            <?php
            include 'connect.php';
            $sql = "select * from `totalactiveusers`";
            $userresult = $conn->query($sql);
            if ($userresult->num_rows > 0) {
              while ($row = $userresult->fetch_assoc()) {
                $numberofusers = $row['TotalActiveUsers'];
            ?>
                <h3 style="font-family: 'Schoolbell', cursive; font-family: 'Vollkorn', serif; color: #f2cc8f; padding-left:4px;"> Active Users: <?php echo $numberofusers; ?> </h3>
            <?php }
            } ?>
            <!--------------------------------------------------------------------------------------------->



            <div class="row">
              <?php $name = $category = $minexp = $salary = $industry = $desc = $role = $eType = $status = "";

              include 'connect.php';
              $sql = "select *,(select name from employer where id=post.eid)as ename from post  order by date";
              if (isset($_GET['q'])) {
                $sql = "select *,(select name from employer where id=post.eid)as ename from post where name LIKE '%" . $_GET['q'] . "%' order by date";
              }
              if (isset($_GET['industry'])) {
                $sql = "select *,(select name from employer where id=post.eid)as ename from post where industry='" . $_GET['industry'] . "' order by date";
              }
              if (isset($_GET['category'])) {
                $sql = "select *,(select name from employer where id=post.eid)as ename from post where category='" . $_GET['category'] . "' order by date";
              }

              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $pid = $row['id'];
                  $jobtitle = $row['name'];
                  $category = $row['category'];
                  $minexp = $row['minexp'];
                  $salary = $row['salary'];
                  $industry = $row['industry'];
                  $desc = $row['desc'];
                  $role = $row['role'];
                  $ename = $row['ename'];
                  $status = $row['status'];
              ?>


                  <div class="col-md-4 crd" style="margin: 20px; background-color:#257059; padding: 20px;">

                    <h3 style="color: #e9c46a"> <b> <?php echo $jobtitle; ?> <b> </h3>
                    <!-- ------------------------------------------------------------------ -->
                    <h5 style="color:#99D98C">By <?php echo $ename; ?> </h5> <br>
                    <!-- ------------------------------------------------------------------ -->
                    <h5> <b style="color:#F8D4A7">Job Description:</b> <br> </h5>
                    <h5><?php echo $desc; ?></h5>
                    <!-- ------------------------------------------------------------------ -->
                    <h5><b style="color:#F8D4A7">Experience Required:</b>
                      <?php echo $minexp; ?> years </h5>
                    <!-- ------------------------------------------------------------------ -->
                    <h5><b style="color:#F8D4A7">Salary:</b>
                      <?php echo $salary; ?> </h5> <br>
                    <!-- ------------------------------------------------------------------ -->
                    <a href="applyJob.php?id=<?php echo $pid; ?>" class="pull-right" style="font-family: 'Sora', sans-serif; color:#e9c46a;">
                      <h3><strong>Apply</strong></h3>
                    </a>
                  </div>

                  <!--      ------------------------------------------------------------------------------------->
                  <!--     Error message  -->

              <?php }
              } else {
                echo '<div class="" style="justify-content:center;">';
                echo ' <img src="img/err.svg" width=600px /> ';
                echo '</div>';
              } ?>

            </div>
          </div>
        </div>

        <div style=" height: 100vh; " class="col-md-3">

          <br><br>
          <div class="animated slideInRight dm">
            <img class="floating" src="img/rytsrc.svg" style="width:300px; height: 300px;" />
          </div>

          <br><br>
          <div style="padding-top:10px; padding-right:30px;">
            <h3>Jobs By Category</h3>
            <form>

              <div>
                <select class="form-control" name='category' style="border-radius:0px;">
                  <?php include "categoryOptions.php"; ?>
                </select><br>
                <input class=" btn-success pull-right mbbtn" type="submit" value="Search" style="border-radius:0px;" />
              </div>

            </form>
          </div><br><br>

          <br><br>
          <div style="padding-top:10px; padding-right:30px;">
            <h3>Jobs By Industry</h3>

            <form>
              <select class="form-control" name='industry' style="border-radius:0px;">
                <?php include "industryOptions.php"; ?>
              </select><br>
              <input class=" btn-success pull-right mbbtn" type="submit" value="Search" style="border-radius:0px;" />
            </form>
          </div>

        </div>
      </div>
    </div>

  </div>


  <!--first row -->
  <script src="js/tilt.jquery.min.js"></script>
  <script src="js/signinModal.js"></script>

  <button style="display:none;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#msgModal" id="msgModalBtn">Open Modal</button>

  <!-- Modal -->
  <div id="msgModal" class="modal fade" role="dialog">

    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <?php if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            if ($msg == 'success') {
              echo  "<h4 class='modal-title'>Job Applied Successfully!</h4>";
            } else if ($msg == 'error') {
              echo  "<h4 class='modal-title'>Some Error occured Pls try again later!</h4>";
            } else if ($msg == 'dup') {
              echo "<h4 class='modal-title'>You have already applied for this job.\n "
                . "Check your application status in 'Jobs Applied' section</h4>";
            }
          } ?>
        </div>
      </div>
    </div>
  </div>


  <?php
  if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'login') {
  ?>

      <script>
        $('#loginAnchor').trigger("click");
      </script>
    <?php } else {
    ?>
      <script>
        $('#msgModalBtn').trigger("click");
      </script>
  <?php
    }
  } ?>
</body>

</html>