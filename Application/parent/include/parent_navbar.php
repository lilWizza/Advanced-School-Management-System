<?php


$connection = mysqli_connect("localhost", "root", "", "sms6");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title> SMS</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style15.css">
    <!-- <script src="js/d6b292a560.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>



    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">

                <h3>Sesian Smart School</h3>
                <strong>ZS</strong>

            </div>

            <ul class="list-unstyled components ">

                <li>
                    <a href="#">
                        <i class="glyphicon glyphicon-th-list"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="ViewSubjects.php">
                        <i class="glyphicon glyphicon-file"></i>
                        <!--  <i class="fas fa-thumbs-up fa-1x"></i> -->
                        View Subjects
                    </a>
                    <a href="ViewMarks.php">
                        <i class="glyphicon glyphicon-duplicate"></i>
                        View Marks
                    </a>
                    <!--  <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="#">Page 1</a></li>
                            <li><a href="#">Page 2</a></li>
                            <li><a href="#">Page 3</a></li>
                        </ul> -->
                </li>
                <li>
                    <a href="ViewAttendance.php">
                        <i class="glyphicon glyphicon-user"></i>
                        View Attendance
                    </a>
                </li>


                <li>
                    <a href="ViewNews.php">
                        <i class="glyphicon glyphicon-user"></i>
                        View News
                    </a>
                </li>

                <li>
                    <a href="ViewDiary.php">
                        <i class="glyphicon glyphicon-user"></i>
                        View Diary
                    </a>
                </li>

                <li>
                    <a href="ViewSchedule.php">
                        <i class="glyphicon glyphicon-user"></i>
                        View Schedule
                    </a>
                </li>

                <li>
                    <a href="ViewStudent.php">
                        <i class="glyphicon glyphicon-user"></i>
                        View Student
                    </a>
                </li>

                <li>

                    <a href="ViewFee.php">
                        <i class="glyphicon glyphicon-send"></i>
                        Fees
                    </a>

                </li>

                <li>

                    <a href="MakePayment.php">
                        <i class="glyphicon glyphicon-send"></i>
                        Fees Payment
                    </a>

                </li>
                <li>

                    <a href="Message.php">
                        <i class="glyphicon glyphicon-send"></i>
                        Send Message
                    </a>

                </li>
                <li>

                    <a href="viewMessage.php">
                        <i class="glyphicon glyphicon-send"></i>
                        View Report
                    </a>

                </li>

            </ul>
            
            

           
        </nav>


        <!-- Page Content Holder -->
        <div id="content">
            <div class="row" style=" width:1100px">
                <nav class="navbar navbar-default ">
                    <div class="container-fluid ">

                        <div class="col-lg-1.0">
                            <div class="navbar-header ">
                                <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                    <i class="			
								glyphicon glyphicon-resize-horizontal"></i>
                                    <span></span>
                                </button>

                            </div>

                            <div class="col-lg-9">
                                <div class="zab">
                                    <h2>ABC School</h2>
                                </div>
                            </div>

                            <?php



                            $username = $_SESSION['login_parent'];
                            $query = "SELECT * FROM parent_tb WHERE username='$username'";
                            $query_run = mysqli_query($connection, $query);
                            if (mysqli_num_rows($query_run) == 1) {
                                $row = mysqli_fetch_assoc($query_run);
                                $parent_name = $row["name"];
                            }

                            ?>


                            <a href="../../logout.php" id="destroy" class="btn btn-danger btn-sm" style="float: right;">
                                <span class="glyphicon glyphicon-log-out"></span> Logout
                            </a>



                            <div class="col-lg-1.5">
                                <div class="chip navbar-right col-xs-3 ">
                                    <img src="avatar.png">
                                    <?php echo  $parent_name ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
            <!--  Bootstrap Js CDN -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('#sidebarCollapse').on('click', function() {
                        $('#sidebar').toggleClass('active');
                    });
                });
            </script>
