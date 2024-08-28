<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

        <div class="box1">
        <h2>All Students</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD STUDENTS</button>
        </div>
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First_Name</th>
                    <th>Last_Name</th>
                    <th>Age</th>
                    <th>Update</th> 
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

                <?php

                $query="select * from `students` ";
                $result= mysqli_query($connection, $query);

                if(!$result){
                    die("connection failed".mysqli_error());
                }
                else{
                    while($row=mysqli_fetch_assoc($result)){
                        ?>
                    <tr>
                        <td> <?php echo $row['ID']; ?> </td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['Age']; ?></td>
                        <td><a href="update-page-1.php?id=<?php echo $row['ID']; ?>" class="btn btn-success">Update</a></td>
                        <td><a href="delete-page.php?id=<?php echo $row['ID']; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php
                    }
                }
                ?>
            </tbody>
        </table>

        <?php
        if(isset($_GET['message'])){
            echo "<h6>".$_GET['message'] . "</h6>";
        }
        ?>

        <?php
        if(isset($_GET['message_ins'])){
            echo "<h5>".$_GET['message_ins'] . "</h5>";
        }
        ?>

        <?php
        if(isset($_GET['update-msg'])){
            echo "<h5>".$_GET['update-msg'] . "</h5>";
        }
        ?>

        <?php
        if(isset($_GET['dlt-msg'])){
            echo "<h6>".$_GET['dlt-msg'] . "</h6>";
        }
        ?>


<form action="insert-data.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD STUDENT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="form-group">
            <label for="f_name">First Name</label>
            <input type="text" name="f_name" class="form-control" >
        </div>
      
        <div class="form-group">
            <label for="l_name">Last Name</label>
            <input type="text" name="l_name" class="form-control" >
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="text" name="age" class="form-control" >
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-success" name="add-students" value="ADD">
        </div>

      </div>
    </div>
  </div>
</div>
</form>
<?php include('footer.php') ?>
