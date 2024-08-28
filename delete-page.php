<?php include('dbcon.php'); ?>

<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }
    $query="delete from `students` where `id`='$id' ";
    $result=mysqli_query($connection, $query);

    if(!$result){
        die("failed to delete".mysqli_error());
    }
    else{
        header('location:index.php?dlt_msg=One Entry deleted successfully');
    }
?>