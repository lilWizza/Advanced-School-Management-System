<?php

session_start();

if ($_SESSION["login_admin"] == null) {


    header("location: index.php");
} else {



    $connection = mysqli_connect("localhost", "root", "", "sms6");





    ///////////////////////////////////////////////////////// delete edit record



    //////////////delete admin record

    if (isset($_POST["deleteid"])) {

        $id = $_POST["deleteid"];
        $un = $_POST["u_id"];

        $query = " DELETE from admin_tb WHERE admin_id='$id' ";

        mysqli_query($connection, $query);

        $query = "DELETE from login_tb WHERE id='$un'";
        mysqli_query($connection, $query);
    }



    /////////////////delete student record

    if (isset($_POST["delete_std_id"])) {

        $id = $_POST["delete_std_id"];
        $p_id = $_POST["p_id"];

        $un = $_POST["u_id"];

        $query = " DELETE from marks_table WHERE student_id='$id' ";
        mysqli_query($connection, $query);

        $query = " DELETE from attendance_tb WHERE student_id='$id' ";
        mysqli_query($connection, $query);


        $query = " DELETE from student_tb WHERE student_id='$id' ";
        mysqli_query($connection, $query);



        $query = " SELECT * FROM parent_tb where parent_id='$p_id'";
        $query_run = mysqli_query($connection, $query);

        $row = mysqli_fetch_assoc($query_run);

        $username = $row["username"];


        $query1 = "SELECT * FROM login_tb where username='$username'";
        $query_run1 = mysqli_query($connection, $query1);
        $row1 = mysqli_fetch_assoc($query_run1);

        $p_un = $row1["id"];


        $query = " DELETE from parent_tb WHERE parent_id='$p_id' ";
        mysqli_query($connection, $query);


        $query = "DELETE from login_tb WHERE id='$p_un'";
        mysqli_query($connection, $query);



        $query = "DELETE from login_tb WHERE id='$un'";
        mysqli_query($connection, $query);
    }




    //////////////delete teacher record

    if (isset($_POST["delete_t_id"])) {

        $id = $_POST["delete_t_id"];
        $un = $_POST["u_id"];

        $query = " DELETE from teacher_tb WHERE teacher_id='$id' ";
        $query_run = mysqli_query($connection, $query);

        $query = "DELETE from login_tb WHERE id='$un'";
        mysqli_query($connection, $query);

        if ($query_run) {
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
            $message = "hello";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }


    //////////////delete section record


    if (isset($_POST["delete_sec_id"])) {

        $id = $_POST["delete_sec_id"];

        $query = " DELETE from section WHERE section_id='$id' ";

        $query_run = mysqli_query($connection, $query);
    }


    //////////////////delete subject record

    if (isset($_POST["delete_sub_id"])) {

        $id = $_POST["delete_sub_id"];

        $query = " DELETE from subject_tb WHERE subject_id='$id' ";

        $query_run = mysqli_query($connection, $query);
    }

    ////////////////delete class id

    if (isset($_POST["delete_class_id"])) {

        $id = $_POST["delete_class_id"];

        $query = " DELETE from class_tb WHERE class_id='$id' ";

        $query_run = mysqli_query($connection, $query);
    }

    //////////////////////////delete news


    if (isset($_POST["delete_news_id"])) {

        $id = $_POST["delete_news_id"];

        $query = " DELETE from news WHERE id='$id' ";

        $query_run = mysqli_query($connection, $query);
    }





    ////////////////////////////Delete fee record

    ////////////////

    if (isset($_POST["delete_fee_id"])) {

        $id = $_POST["delete_fee_id"];

        $query = " DELETE from fee_tb WHERE fee_id='$id' ";
        mysqli_query($connection, $query);
    }










    //////////////////////////////////////////////////////////////////Get data





    /////////get admin data from admin table in modal

    if (isset($_POST['id']) && isset($_POST['id']) != "") {


        $admin_id = $_POST['id'];


        $query = " SELECT * FROM admin_tb WHERE admin_id= '$admin_id' ";

        if (!$result = mysqli_query($connection, $query)) {

            exit(mysqli_error("  admin query not run update record line 35"));
        }

        $response = array();

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {

                $response = $row;
            }
        } else {

            $response['status'] = 200;
            $response['message'] = "Data not found!";
        }

        echo json_encode($response);
    }





    ////////get student data in modal

    if (isset($_POST['s_id']) && isset($_POST['s_id']) != "") {


        $student_id = $_POST['s_id'];

        $query = " SELECT * FROM student_tb WHERE student_id= '$student_id' ";

        if (!$result = mysqli_query($connection, $query)) {

            exit(mysqli_error("  student query not run update record "));
        }

        $response = array();

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {

                $response = $row;
            }
        } else {

            $response['status'] = 200;
            $response['message'] = "Data not found!";
        }

        echo json_encode($response);
    }


    /////////get teacher data from teacher table in modal

    if (isset($_POST['t_id']) && isset($_POST['t_id']) != "") {


        $teacher_id = $_POST['t_id'];

        $query = " SELECT * FROM teacher_tb WHERE teacher_id= '$teacher_id' ";

        if (!$result = mysqli_query($connection, $query)) {

            exit(mysqli_error("  teacehr select query not run update record "));
        }

        $response = array();

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {

                $response = $row;
            }
        } else {

            $response['status'] = 200;
            $response['message'] = "Data not found!";
        }

        echo json_encode($response);
    }

    /////////////////////Get parent Data

    if (isset($_POST['p_id']) && isset($_POST['p_id']) != "") {


        $parent_id = $_POST['p_id'];

        $query = " SELECT * FROM parent_tb WHERE parent_id= '$parent_id' ";

        if (!$result = mysqli_query($connection, $query)) {

            exit(mysqli_error("  parent select query not run update record "));
        }

        $response = array();

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {

                $response = $row;
            }
        } else {

            $response['status'] = 200;
            $response['message'] = "Data not found!";
        }

        echo json_encode($response);
    }







    ////////////////////get section data


    if (isset($_POST['sec_id']) && isset($_POST['sec_id']) != "") {


        $section_id = $_POST['sec_id'];

        $query = " SELECT * FROM section WHERE section_id= '$section_id' ";

        if (!$result = mysqli_query($connection, $query)) {

            exit(mysqli_error("  section select query not run update record "));
        }

        $response = array();

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {

                $response = $row;
            }
        } else {

            $response['status'] = 200;
            $response['message'] = "Data not found!";
        }

        echo json_encode($response);
    }

    /////////////////////get class data




    if (isset($_POST['cl_id']) && isset($_POST['cl_id']) != "") {


        $class_id = $_POST['cl_id'];

        $query = " SELECT class_name, class_price FROM class_tb WHERE class_id= '$class_id' ";

        if (!$result = mysqli_query($connection, $query)) {

            exit(mysqli_error("  class select query not run update record "));
        }

        $response = array();

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {

                $response = $row;
            }
        } else {

            $response['status'] = 200;
            $response['message'] = "Data not found!";
        }

        echo json_encode($response);
    }

    ////////////////////get subj data

    if (isset($_POST['get_sub_id']) && isset($_POST['get_sub_id']) != "") {


        $subject_id = $_POST['get_sub_id'];

        $query = " SELECT * FROM subject_tb WHERE subject_id= '$subject_id' ";

        if (!$result = mysqli_query($connection, $query)) {

            exit(mysqli_error("  subject select query not run update record "));
        }

        $response = array();

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {

                $response = $row;
            }
        } else {

            $response['status'] = 200;
            $response['message'] = "Data not found!";
        }

        echo json_encode($response);
    }



    ////////get Fee data in modal

    if (isset($_POST['fee_id'])  && isset($_POST['fee_id']) != "") {

        $fee_id = $_POST['fee_id'];
        $query = " SELECT * FROM fee_tb WHERE fee_id= '$fee_id' ";

        if (!$result = mysqli_query($connection, $query)) {

            exit(mysqli_error("  student query not run update record "));
        }

        $response = array();

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {

                $response = $row;
            }
        } else {

            $response['status'] = 200;
            $response['message'] = "Data not found!";
        }
        echo json_encode($response);
    }










    //////////////////////////////////////////////////////////////////////////////////////////////UPDATE



    /////////////////Update admin table


    if (isset($_POST['admin_uid'])) {

        $admin_id = $_POST['admin_uid'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];


        $username = $_POST['username'];
        $password = $_POST['password'];

        $user_id = $_POST["user_id"];

        $query = "INSERT INTO login_tb (username,password) values('$username','$password') ";
        mysqli_query($connection, $query);


        $query2 = "UPDATE admin_tb SET admin_id='$admin_id', adminname='$name', admin_email='$email', admin_phone='$phone', username='$username',password='$password' WHERE admin_id='$admin_id'";
        $query_run2 = mysqli_query($connection, $query2);

        $query = "DELETE FROM login_tb WHERE id='$user_id' ";
        mysqli_query($connection, $query);
    }







    /////////////////Update student table

    if (isset($_POST['std_id'])) {

        $student_id = $_POST['std_id'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $rel = $_POST['rel'];

        $class_id = $_POST['class_id'];
        $section_id = $_POST['section_id'];


        $parent_id = $_POST['parent_id'];
        $parent = $_POST['parent'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];


        $username = $_POST['username'];
        $password = $_POST['password'];

        $user_id = $_POST["user_id"];




        $query = "INSERT INTO login_tb (username,password) values('$username','$password') ";
        mysqli_query($connection, $query);

        $query = "UPDATE student_tb SET student_name='$name', gender='$gender', religion='$rel', class_id='$class_id', section_id='$section_id', parent_name='$parent', parent_phone='$phone', parent_email='$email',username='$username',password='$password' WHERE student_id='$student_id'";
        $query_run = mysqli_query($connection, $query);





        $query = "UPDATE parent_tb SET name='$parent', phone='$phone', email='$email' WHERE parent_id='$parent_id'";
        $query_run = mysqli_query($connection, $query);


        $query = "DELETE FROM login_tb WHERE id='$user_id' ";
        mysqli_query($connection, $query);





        if ($query_run) {

            header("Location:AddStudent.php");
        } else {
            header("Location:AddStudent.php");
        }
    }



    /////

    ///////////////// Update teacher table


    if (isset($_POST['teach_id'])) {

        $teacher_id = $_POST['teach_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $user_id = $_POST["user_id"];
        $username = $_POST['username'];
        $password = $_POST['password'];



        $query = "INSERT INTO login_tb (username,password) values('$username','$password') ";
        mysqli_query($connection, $query);

        $query = "UPDATE teacher_tb SET  teacher_name='$name', email='$email', phone='$phone', username='$username',password='$password' WHERE teacher_id='$teacher_id'";

        $query_run = mysqli_query($connection, $query);

        $query = "DELETE FROM login_tb WHERE id='$user_id' ";
        mysqli_query($connection, $query);



        if ($query_run) {

            header("Location:AddTeacher.php");
        }
    }


    //////////////////////////////Update Parent Table

    // if (isset($_POST['parent_id'])) {

    //     $parent_id = $_POST['admin_id'];
    //     $name = $_POST['name'];
    //     $email = $_POST['email'];
    //     $phone = $_POST['phone'];


    //     $username = $_POST['username'];
    //     $password = $_POST['password'];

    //     $user_id = $_POST["user_id"];

    //     $query = "INSERT INTO login_tb (username,password) values('$username','$password') ";
    //     mysqli_query($connection, $query);


    //     $query2 = "UPDATE admin_tb SET admin_id='$admin_id', admin_name='$name', admin_email='$email', admin_phone='$phone', username='$username',password='$password' WHERE admin_id='$admin_id'";
    //     $query_run2 = mysqli_query($connection, $query2);

    //     $query = "DELETE FROM login_tb WHERE id='$user_id' ";
    //     mysqli_query($connection, $query);

    // }











    ///////////////// Update Sec table


    if (isset($_POST['sec_id'])) {

        $sec_id = $_POST['sec_id'];
        $sec_id = $_POST['sec_name'];
        $class_id = $_POST['class_name'];
        $teacher_id = $_POST['teacher_name'];

        // $id = $_POST["delete_sec_id"];

        // $query = " DELETE from section WHERE section_id='$section_id' ";

        // $query_run = mysqli_query($connection, $query);

        ///fetch the correspondind section name

        // $c_n = 0;

        // $query = " SELECT class_name as '$c_n' FROM class_tb WHERE class_id='$class_id' ";
        // $query_run = mysqli_query($connection, $query);
        // $result = mysqli_fetch_assoc($query_run);

        // $class_name = $result["$c_n"];


        $query = "UPDATE section SET  section_name='$section_name', class_id='$class_id', teacher_id='$teacher_id' WHERE section_id='$section_id'";

        $query_run = mysqli_query($connection, $query);
    }

    ////////////////Update class


    if (isset($_POST['class_hid'])) {

        $class_id = $_POST['class_hid'];
        $class_name = $_POST['classn'];
        $class_price = $_POST['classp'];

        $query = "UPDATE class_tb SET  class_name='$class_name', class_price='$class_price' WHERE class_id='$class_id'";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {

            header("Location:manageClasses.php");
        }
    }

    ////////////////Update subject


    if (isset($_POST['sub_id'])) {

        $subject_id = $_POST['sub_id'];
        $subject_name = $_POST['sub_name'];
        $class_id = $_POST['class_id'];
        $teacher_id = $_POST['teacher_id'];


        $query = "UPDATE subject_tb SET  subject_name='$subject_name',class_id='$class_id', teacher_id='$teacher_id'  WHERE subject_id='$subject_id'";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {

            header("Location:manageClasses.php");
        }
    }




    /////////////////Update fee table


    if (isset($_POST['fee_i_id'])) {

        $fee_i_id = $_POST['fee_i_id'];
        $amount = $_POST['amount'];
        $status = $_POST['status'];
        $month = $_POST['month'];
        $date = $_POST['date'];




        $query = "UPDATE fee_tb SET amount='$amount', status='$status', month='$month', date='$date' WHERE fee_id='$fee_i_id'";

        $query_run = mysqli_query($connection, $query);


        if ($query_run) {

            header("Location:Fees.php");
        }
    }








    ////////////////////////////////////////////////////////////////////////////////////////////////



    ////////// For adding admins to the admin_tb

    if (isset($_POST["btn-add-admin"])) {

        $admin_name = $_POST["admin-name"];
        $email = $_POST["email-name"];
        $phone = $_POST["phone-name"];
        $username = $_POST["user-name"];
        $password = $_POST["password-name"];

        $query = "SELECT * FROM login_tb where username='$username'";
        $query_run = mysqli_query($connection, $query);

        if (mysqli_num_rows($query_run) == 0) {


            $query1 = "INSERT INTO login_tb(username,password) Values('$username','$password')";
            $query_run1 = mysqli_query($connection, $query1);



            $query = "INSERT INTO admin_tb (adminname,admin_email,admin_phone,username,password) VALUES ('$admin_name','$email','$phone','$username','$password')";

            $query_run = mysqli_query($connection, $query);

            if ($query_run) {

                header("Location:AddAdmin.php");
            } else {
                echo 'Not inserted into Admin table';
            }
        } else {
            echo "username is not unique";
        }
    }



    //////////////for adding student to student table

    if (isset($_POST["btn-add-std"])) {

        $student_name = $_POST["student-name"];
        $gender = $_POST["gender-name"];
        $religion = $_POST["religion-name"];

        $class_id = $_POST["class-name"];
        $section_name = $_POST["section-name"];


        ///fetch the correspondind class name

        $c_n = 0;

        $query = " SELECT class_name as '$c_n' FROM class_tb WHERE class_id='$class_id' ";
        $query_run = mysqli_query($connection, $query);
        $result = mysqli_fetch_assoc($query_run);

        $class_name = $result["$c_n"];



        //////////////Fetching section id

        $s_id = 0;
        $query = " SELECT section_id as '$s_id' FROM section WHERE section_name='$section_name' and class_id='$class_id' ";
        $query_run = mysqli_query($connection, $query);
        $result = mysqli_fetch_assoc($query_run);
        $section_id = $result["$s_id"];



        $parent_name = $_POST["parent-name"];
        $parent_phone = $_POST["parent-phone-name"];
        $parent_email = $_POST["parent-email-name"];

        $username = $_POST["user-name"];
        $password = $_POST["password-name"];

        $query = "SELECT * FROM login_tb where username='$username'";

        $query_run = mysqli_query($connection, $query);

        if (mysqli_num_rows($query_run) == 0) {




            $query = "SELECT section_id from section where class_id='$class_id' and section_name='$section_name' ";
            $query_run = mysqli_query($connection, $query);

            if (mysqli_num_rows($query_run) > 0) {


                ///////////////////////////////////////////////////////////////////////////////////////////////////////

                $query1 = "INSERT INTO login_tb(username,password) Values('$username','$password')";
                $query_run1 = mysqli_query($connection, $query1);

                //////parent
                $username1 = $username . "p";

                $query1 = "INSERT INTO login_tb(username,password) Values('$username1','$password')";
                $query_run1 = mysqli_query($connection, $query1);



                ///////////////////////////////////////////////////////////////////////////////////////////////////////


                $count_query = "SELECT COUNT(*) as total FROM parent_tb"; /// for counting the total number of rows in parent table for determing what should be the next parent ID
                $query_run = mysqli_query($connection, $count_query);
                $count_id = mysqli_fetch_assoc($query_run);

                if ($count_id == 0) {
                    $parent_id = 0;
                } else {
                    $parent_id = $count_id['total'] + rand(1,100); ///incrementing parent id to one for the next parent
                }


                $query2 = "INSERT INTO parent_tb (parent_id,name,phone,email,username,password) Values('$parent_id','$parent_name','$parent_phone','$parent_email','$username1','$password')";
                $query_run2 = mysqli_query($connection, $query2);



                /////////////////////////////////////////////////////////////////////////////////////////////////////////////


                $query = "INSERT INTO student_tb (student_name, gender, religion, class_id, section_id, parent_id, parent_name, parent_phone, parent_email, username, password) 
    
    Values('$student_name','$gender','$religion','$class_id','$section_id','$parent_id','$parent_name', '$parent_phone','$parent_email','$username','$password')";

                $query_run = mysqli_query($connection, $query);


                if ($query_run2) {

                    if ($query_run) {
                        header("location: AddStudent.php");
                    } else {
                        echo " <h1>Username is not unique</h1>std not excute " . "Class id " . $class_id . " class name " . $class_name;
                    }
                } else {
                    echo "Parent Query  <h1>Username is not unique</h1>" . "$parent_id-$parent_name-$parent_phone-$parent_email-$username1-$password";
                }
            } else {
                echo "<h1>Section is not created</h1>";
                // echo "<hr> $class_id<hr> $section_id ";
            }
        } else {
            echo "Username is not unique";
        }
    }


    //////////////////for add teacher by admin


    if (isset($_POST["btn-add-teacher"])) {

        $name = $_POST["teacher-name"];
        $email = $_POST["email-name"];
        $phone = $_POST["phone-name"];
        $username = $_POST["user-name"];
        $password = $_POST["password-name"];

        $query = "SELECT * FROM login_tb where username='$username'";
        $query_run = mysqli_query($connection, $query);

        if (mysqli_num_rows($query_run) == 0) {




            $query1 = "INSERT INTO login_tb(username,password) Values('$username','$password')";
            $query_run1 = mysqli_query($connection, $query1);



            $query = "INSERT INTO teacher_tb(teacher_name, email, phone, username,password) Values('$name','$email','$phone','$username','$password')";

            $query_run = mysqli_query($connection, $query);

            if ($query_run1) {
                header("location: AddTeacher.php");
            } else {
                echo 'Not inserted into teacher table';
            }
        } else {
            echo "username is not unique";
        }
    }

    ////////////////for add parent by admin




    ////////////for adding classes to the class_tb

    if (isset($_POST["btn-add-class"])) {

        $class = $_POST["class-name"];
        $price = $_POST["class-price"];

        $query = "INSERT INTO class_tb (class_name, class_price) Values('$class', $price)";

        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            header("location: manageClasses.php");
        } else {
            echo "Not inserted into class table";
        }
    }


    ///////////////for adding section to the section_tb

    if (isset($_POST["btn-add-section"])) {

        $section_id = $_POST["section-name"];
        $class_id = $_POST["class-name"];
        $teacher_id = $_POST["teacher-name"];


        ///fetch the correspondind class name

        $c_n = 0;

        $query = " SELECT class_name as '$c_n' FROM class_tb WHERE class_id='$class_id' ";
        $query_run = mysqli_query($connection, $query);
        $result = mysqli_fetch_assoc($query_run);

        $class_name = $result["$c_n"];


        ///fetch the correspondind teacher name

        $t_n = 0;

        $query = " SELECT teacher_name as '$t_n' FROM teacher_tb WHERE teacher_id='$teacher_id' ";
        $query_run = mysqli_query($connection, $query);
        $result = mysqli_fetch_assoc($query_run);

        $teacher_name = $result["$t_n"];



        $query = " SELECT class_id, section_id  FROM section WHERE class_id='$class_id' AND section_id='$section_id' ";
        $query_run = mysqli_query($connection, $query);



        if (mysqli_num_rows($query_run) > 0) {

            // header("location: manageSection.php");
            echo "Class and section is Alredy Present               " . "class id " . $class_id . " Section id " . $section_id;
        } else {

            if ($section_id == "0") {
                $section_name = "A";
            } elseif ($section_id == "1") {
                $section_name = "B";
            } elseif ($section_id == "2") {
                $section_name = "C";
            } elseif ($section_id == "3") {
                $section_name = "D";
            } elseif ($section_id == "4") {
                $section_name = "E";
            } elseif ($section_id == "5") {
                $section_name = "F";
            } elseif ($section_id == "6") {
                $section_name = "G";
            }

            $c = 0;
            $b = 0;
            while ($section_id >= 0) {

                $query = " SELECT class_id, section_id  FROM section WHERE class_id='$class_id' AND section_id='$section_id' AND section_name='$section_name' ";
                $query_run = mysqli_query($connection, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    $c++;
                    break;
                }

                $query = "INSERT INTO section (section_id,section_name, class_id, teacher_id) Values('$section_id','$section_name','$class_id','$teacher_id')";

                $query_run = mysqli_query($connection, $query);
                $section_id++;
                if ($query_run) {
                    $b++;
                    break;
                }
            }

            if ($c > 0) {
                echo "Class and section is Alredy Present   else c= $c  b=  $b   class id " . $class_id . " Section id " . $section_id . " Section name " . $section_name;
                // }
            } else {
                header("location: manageSection.php");
            }
        }
    }



    //////////////////for adding subjects to subject table

    if (isset($_POST["btn-add-subject"])) {

        $subject = $_POST["subject-name"];
        $class_id = $_POST["class-name"];
        $teacher_id = $_POST["teacher-name"];


        $query = " SELECT subject_name  FROM subject_tb WHERE subject_name='$subject' ";

        $query_run = mysqli_query($connection, $query);

        if (mysqli_num_rows($query_run) > 0) {
            echo "<h2> subject alredy assigned</h2>";
        } else {


            $query1 = "INSERT INTO subject_tb(subject_name,class_id,teacher_id) VALUES('$subject','$class_id','$teacher_id')";

            $query_run1 = mysqli_query($connection, $query1);

            if ($query_run1) {
				 header("Location: manageSubject.php?subjectAdded");
            } else {
                echo "Not inserted into subject table   $subject-$class_id-$teacher_id";
            }
        }
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



    /////////////////// Schedule Class



    







    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /////////////////////Make Payment fee

    if (isset($_POST["btn-submit-payment"])) {


        $class_id = $_POST["class-id-name"];

        $section_id = $_POST["section-id-name"];

        $title = $_POST["title-name"];
        $desc = $_POST["desc-name"];
        $month = $_POST["month-name"];
        $payment = $_POST["payment-name"];
        $status = $_POST["status-name"];
        $date = $_POST["date-name"];



        // Check if any option is selected 
        if (isset($_POST["students-name"])) {
            // Retrieving each selected option 
            foreach ($_POST['students-name'] as $value) {

                $query = "SELECT * FROM student_tb where student_id='$value'";
                $query_run = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($query_run)) {

                    $student_id = $row["student_id"];
                    $student_name = $row["student_name"];


                    $query1 = "INSERT INTO fee_tb (student_id,class_id,section_id,amount,status,month,date)
            
            VALUES('$student_id','$class_id','$section_id','$payment','$status','$month','$date')";

                    $query_run1 = mysqli_query($connection, $query1);
                }
            }
        } else {
            echo "<h2>Student is not specified</h2>";
        }

        echo "<h2>Payment is made</h2>";
    }
}
