<?php include('dbcon.php'); ?>
<?php

    if(isset($_POST['add-students'])){
        $fname= $_POST['f_name'];
        $lname= $_POST['l_name'];
        $age= $_POST['age'];

    }
    if($fname=="" || empty($fname) || $lname=="" || empty($lname) || $age=="" || empty($age)){
        header('location:index.php?message=Please Enter All The Informations');
    }
    else{
        $query="insert into `students` (`first_name`,`last_name`,`Age`) values ('$fname','$lname','$age')";
        $result=mysqli_query($connection, $query);

        if(!$result){
        die("query failed".mysqli_error());
        }
        else{
            header('location:index.php?message_ins=data successfully inserted');
        }
    }
?>
