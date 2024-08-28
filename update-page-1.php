<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

        <?php
        if(isset($_GET['id'])){
            $id=$_GET['id'];
        
        $query="select * from `students` where `id`='$id'";
        $result= mysqli_query($connection, $query);

            if(!$result){
                die("connection failed".mysqli_error());
            }
            else{

                $row=mysqli_fetch_assoc($result);
                //print_r($row);
            }
        }
        ?>

        <?php
        if(isset($_POST['update-students'])){

            if(isset($_GET['id_new'])){
                $idnew=$_GET['id_new'];
            }
            $fname=$_POST['f_name'];
            $lname=$_POST['l_name'];
            $age=$_POST['age'];

            $query="update `students` set 
            `first_name`='$fname' , `last_name`='$lname', `Age`='$age' 
            where `id`='$idnew' ";

            $result= mysqli_query($connection, $query);

            if(!$result){
                die("connection failed".mysqli_error());
            }
            else{
                header('location:index.php?update-msg=successfully updated');
            }
        }
        ?>

        <form action="update-page-1.php?id_new= <?php echo $id; ?>" method="post">
        <div class="form-group">
            <label for="f_name">First Name</label>
            <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name'] ?>" >
        </div>
      
        <div class="form-group">
            <label for="l_name">Last Name</label>
            <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name'] ?>" >
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="text" name="age" class="form-control" value="<?php echo $row['Age'] ?>" >
        </div>

        <input type="submit" class="btn btn-success" name="update-students" value="UPDATE">

        </form>

<?php include('footer.php') ?>